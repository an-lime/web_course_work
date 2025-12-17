<?php

// ORDER_ITEMS
$payload = [];
if (!empty($order_items)) {
    foreach ($order_items as $oid => $items) {
        foreach ($items as $it) {
            $payload[$oid][] = [
                'name'   => $it['name_product'],
                'photo'  => $it['photo'],
                'price'  => (int)$it['price'],
                'amount' => (int)$it['amount'],
                'sum'    => (int)$it['price'] * (int)$it['amount'],
                'id'     => (int)$it['id_product'],
            ];
        }
    }
}
$ORDER_ITEMS_JSON = json_encode($payload, JSON_UNESCAPED_UNICODE);

// ORDER_META
$meta = [];
if ($sql_orders && $sql_orders->num_rows > 0) {
    mysqli_data_seek($sql_orders, 0);
    foreach ($sql_orders as $ord) {
        $meta[$ord['id_order']] = [
            'date'  => date('d.m.Y H:i', strtotime($ord['date'])),
            'status' => $ord['status'],
            'total' => (int)$ord['total'],
            'count' => (int)$ord['items_count'],
        ];
    }
    // вернем указатель, чтобы ниже можно было ещё раз пройти foreach по $sql_orders
    mysqli_data_seek($sql_orders, 0);
}
$ORDER_META_JSON = json_encode($meta, JSON_UNESCAPED_UNICODE);
?>

<?php
$active_tab = isset($_GET['tab']) ? $_GET['tab'] : 'account-orders';
?>


<!-- breadcrumbs area start -->
<div class="breadcrumbs_aree breadcrumbs_bg mb-110" data-bgimg="assets/img/bg/testimonial-bg.png">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumbs_text">
                    <h1>Профиль</h1>
                    <ul>
                        <li><a href="index.php?page=main">Главная </a></li>
                        <li> // Профиль</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumbs area end -->
<div class="account-page-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <ul class="nav myaccount-tab-trigger" id="account-page-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($active_tab == 'account-orders') ? 'active' : ''; ?>"
                            id="account-orders-tab"
                            data-bs-toggle="tab"
                            href="#account-orders"
                            role="tab">Заказы</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($active_tab == 'account-details') ? 'active' : ''; ?>"
                            id="account-details-tab"
                            data-bs-toggle="tab"
                            href="#account-details"
                            role="tab">Данные аккаунта</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="account-logout-tab" href="event_user/logout.php" role="tab">Выйти</a>
                    </li>
                </ul>
            </div>

            <div class="col-lg-9">
                <div class="tab-content myaccount-tab-content" id="account-page-tab-content">
                    <div class="tab-pane fade <?php echo ($active_tab == 'account-orders') ? 'show active' : ''; ?>"
                        id="account-orders"
                        role="tabpanel">
                        <div class="myaccount-orders">
                            <h4 class="small-title">Мои заказы</h4>
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <tbody>
                                        <tr>
                                            <th>ЗАКАЗ</th>
                                            <th>ДАТА</th>
                                            <th>СТАТУС</th>
                                            <th>СУММА</th>
                                            <th></th>
                                        </tr>
                                        <?php if ($sql_orders && $sql_orders->num_rows > 0): ?>
                                            <?php foreach ($sql_orders as $ord): ?>
                                                <tr>
                                                    <td>
                                                        <a class="account-order-id" href="javascript:void(0)">#<?php echo $ord['id_order'] ?></a>
                                                    </td>
                                                    <td><?php echo date('d.m.Y H:i', strtotime($ord['date'])) ?></td>
                                                    <td><?php echo $ord['status'] ?></td>
                                                    <td>
                                                        <?php echo (int)$ord['total'] ?> р. за <?php echo (int)$ord['items_count'] ?> шт.
                                                    </td>
                                                    <td>
                                                        <a href="javascript:void(0)"
                                                            class="btn btn-secondary btn-primary-hover btn-order-view"
                                                            data-id="<?php echo $ord['id_order'] ?>">
                                                            <span>Подробнее</span>
                                                        </a>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <tr>
                                                <td colspan="5" class="text-center text-muted py-4">У вас пока нет заказов</td>
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>

                            <!-- Modal: детали заказа -->
                            <div class="modal fade" id="orderModal" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Заказ <span id="m-order-id"></span></h5> <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div id="m-order-meta" class="mb-3">
                                                <div><strong>Дата:</strong> <span id="m-order-date"></span></div>
                                                <div><strong>Статус:</strong> <span id="m-order-status"></span></div>
                                                <div><strong>Итого:</strong> <span id="m-order-total"></span></div>
                                            </div>
                                            <div class="table-responsive">
                                                <table class="table align-middle">
                                                    <thead>
                                                        <tr>
                                                            <th style="width:70px">Фото</th>
                                                            <th>Товар</th>
                                                            <th class="text-center" style="width:120px">Кол-во</th>
                                                            <th class="text-end" style="width:140px">Цена</th>
                                                            <th class="text-end" style="width:160px">Сумма</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="m-order-items"> <!-- сюда JS вставит строки --> </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="modal-footer"> <button class="btn btn-secondary btn-primary-hover" data-bs-dismiss="modal">Закрыть</button> </div>
                                    </div>
                                </div>
                            </div>



                        </div>
                    </div>
                    <div class="tab-pane fade <?php echo ($active_tab == 'account-details') ? 'show active' : ''; ?>"
                        id="account-details"
                        role="tabpanel">
                        <div class="myaccount-details">
                            <form action="event_user/change_user.php" method="POST" class="myaccount-form">
                                <div class="myaccount-form-inner">
                                    <div class="single-input single-input-half">
                                        <label>Имя*</label>
                                        <input name="name" type="text" value="<?php echo $_SESSION['user']['name'] ?>" required>
                                    </div>
                                    <div class="single-input single-input-half">
                                        <label>Фамилия*</label>
                                        <input name="surname" type="text" value="<?php echo $_SESSION['user']['surname'] ?>" required>
                                    </div>
                                    <div class="single-input">
                                        <label>Почта*</label>
                                        <input name="email" type="email" value="<?php echo $_SESSION['user']['email'] ?>" required>
                                    </div>

                                    <?php
                                    if (isset($_SESSION['error_email'])):
                                    ?>
                                        <div class="mb-2 font-18 font-heading fw-600 text-danger">
                                            <?php echo $_SESSION['error_email'];
                                            unset($_SESSION['error_email']); ?>
                                        </div>

                                    <?php endif ?>

                                    <div class="single-input">
                                        <label>Новый пароль (Оставьте пустым, чтобы не менять)</label>
                                        <input name="password1" type="password">
                                    </div>

                                    <?php
                                    if (isset($_SESSION['error_password'])):
                                    ?>
                                        <div class="mb-2 font-18 font-heading fw-600 text-danger">
                                            <?php echo $_SESSION['error_password'];
                                            unset($_SESSION['error_password']); ?>
                                        </div>

                                    <?php endif ?>

                                    <div class="single-input">
                                        <label>Подтвердите пароль</label>
                                        <input name="password2" type="password">
                                    </div>

                                    <?php
                                    if (isset($_SESSION['change_success'])):
                                    ?>
                                        <div class="mb-2 font-18 font-heading fw-600 text-success">
                                            <?php echo $_SESSION['change_success'];

                                            unset($_SESSION['change_success']); ?>
                                        </div>

                                    <?php endif ?>

                                    <div class="single-input">
                                        <button class="btn custom-btn" type="submit">
                                            <span>Сохранить изменения</span>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    const ORDER_ITEMS = <?php echo $ORDER_ITEMS_JSON; ?>;
    const ORDER_META = <?php echo $ORDER_META_JSON; ?>;
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const modalEl = document.getElementById('orderModal');
        if (!modalEl) return;

        const modal = new bootstrap.Modal(modalEl);
        const buttons = document.querySelectorAll('.btn-order-view');
        if (!buttons.length) return;

        buttons.forEach(function(btn) {
            btn.addEventListener('click', function() {
                const id = this.getAttribute('data-id');
                const items = ORDER_ITEMS[id] || [];
                const meta = ORDER_META[id] || {
                    date: '',
                    status: '',
                    total: 0,
                    count: 0
                };

                // шапка модалки
                document.getElementById('m-order-id').textContent = '#' + id;
                document.getElementById('m-order-date').textContent = meta.date;
                document.getElementById('m-order-status').textContent = meta.status;
                document.getElementById('m-order-total').textContent =
                    meta.total + ' р. за ' + meta.count + ' шт.';

                // товары
                const tbody = document.getElementById('m-order-items');
                tbody.innerHTML = '';

                items.forEach(function(it) {
                    const tr = document.createElement('tr');
                    tr.innerHTML =
                        '<td><img src="' + it.photo + '" alt="" style="width:60px;height:auto;"></td>' +
                        '<td><a href="index.php?page=product&id_product=' + it.id + '">' + it.name + '</a></td>' +
                        '<td class="text-center">' + it.amount + '</td>' +
                        '<td class="text-end">' + it.price + ' р.</td>' +
                        '<td class="text-end">' + it.sum + ' р.</td>';
                    tbody.appendChild(tr);
                });

                modal.show();
            });
        });
    });
</script>