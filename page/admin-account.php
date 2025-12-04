<!-- Breadcrumbs area start -->
<div class="admin-breadcrumbs breadcrumbs_aree mb-110" data-bgimg="assets/img/others/breadcrumbs-bg.png">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumbs_text">
                    <h1>Админ панель</h1>
                    <ul>
                        <li><a href="index.php">Главная</a></li>
                        <li>// Админ панель</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumbs area end -->

<!-- Admin panel area -->
<div class="account-page-area admin-panel-area">
    <div class="container">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-lg-3">
                <ul class="nav admin-sidebar myaccount-tab-trigger" id="admin-tab" role="tablist">
                    <li class="nav-item">
                        <a class="admin-nav-link active" id="users-tab" data-bs-toggle="tab" href="#users" role="tab">
                            <i class="fa fa-users me-2"></i>Пользователи
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="admin-nav-link" id="orders-tab" data-bs-toggle="tab" href="#orders" role="tab">
                            <i class="fa fa-shopping-cart me-2"></i>Заказы/Заявки
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="admin-nav-link" id="catalog-tab" data-bs-toggle="tab" href="#catalog" role="tab">
                            <i class="fa fa-th-large me-2"></i>Каталог товаров
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="admin-nav-link" href="event_user/logout.php">
                            <i class="fa fa-sign-out me-2"></i>Выйти
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Content -->
            <div class="col-lg-9">
                <div class="tab-content myaccount-tab-content admin-tab-content" id="admin-tab-content">

                    <!-- Dashboard Tab -->
                    <!-- Users Tab -->
                    <div class="tab-pane fade active" id="users" role="tabpanel">
                        <div class="myaccount-content">
                            <h4 class="small-title mb-4">Управление пользователями</h4>
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Email</th>
                                            <th>Имя</th>
                                            <th>Фамилия</th>
                                            <th>Статус</th>
                                            <th>Действия</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($sql_users as $user): ?>
                                            <tr>
                                                <td>#<?php echo $user['id_user']; ?></td>
                                                <td><?php echo $user['email']; ?></td>
                                                <td><?php echo $user['name']; ?></td>
                                                <td><?php echo $user['surname']; ?></td>
                                                <td>
                                                    <?php if ($user['is_admin']): ?>
                                                        <span class="badge bg-primary status-badge">Администратор</span>
                                                    <?php else: ?>
                                                        <span class="badge bg-success status-badge">Пользователь</span>
                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <?php if ($user['id_user'] == $id_user): ?>
                                                        <span class="text-muted">Текущий пользователь</span>
                                                    <?php else: ?>
                                                        <button
                                                            class="btn btn-sm btn-outline-primary action-btn btn-edit-user"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#editUserModal"
                                                            data-id="<?php echo $user['id_user']; ?>"
                                                            data-email="<?php echo $user['email']; ?>"
                                                            data-name="<?php echo $user['name']; ?>"
                                                            data-surname="<?php echo $user['surname']; ?>"
                                                            data-is_admin="<?php echo $user['is_admin']; ?>">Редактировать</button>

                                                        <button
                                                            class="btn btn-sm btn-outline-danger action-btn btn-delete-user"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#deleteUserModal"
                                                            data-id="<?php echo $user['id_user']; ?>"
                                                            data-email="<?php echo $user['email']; ?>">Удалить</button>
                                                    <?php endif; ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>


                    <!-- Orders Tab -->
                    <div class="tab-pane fade" id="orders" role="tabpanel">
                        <div class="myaccount-content">
                            <h4 class="small-title mb-4">Заказы и заявки</h4>

                            <!-- фильтры пока статичные, можно позже сделать рабочими -->

                            <?php
                            // для фильтра по пользователю
                            $users_for_filter = $link->query("SELECT id_user, surname, name FROM Users ORDER BY surname, name");

                            // читаем выбранные значения
                            $f_user  = isset($_GET['user'])  ? (int)$_GET['user'] : 0;
                            $f_date  = isset($_GET['date'])  ? $_GET['date']      : '';
                            $f_status = isset($_GET['status']) ? $_GET['status']  : '';
                            ?>
                            <div class="filter-section mb-3">
                                <form method="get">
                                    <input type="hidden" name="page" value="admin-account">
                                    <input type="hidden" name="tab" value="orders">
                                    <div class="row g-2">
                                        <div class="col-md-3">
                                            <label class="form-label fw-bold">Пользователь</label>
                                            <select class="form-select" name="user">
                                                <option value="0">Все пользователи</option>
                                                <?php foreach ($users_for_filter as $u): ?>
                                                    <option value="<?php echo $u['id_user']; ?>"
                                                        <?php if ($f_user === (int)$u['id_user']) echo 'selected'; ?>>
                                                        <?php echo $u['surname'] . ' ' . $u['name']; ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <label class="form-label fw-bold">Дата</label>
                                            <input type="date" class="form-control" name="date"
                                                value="<?php echo htmlspecialchars($f_date); ?>">
                                        </div>
                                        <div class="col-md-3">
                                            <label class="form-label fw-bold">Статус</label><br>
                                            <select class="form-select" name="status">
                                                <option value="">Все статусы</option>
                                                <?php
                                                $statuses = ['Новый', 'В процессе', 'Выполнен', 'Отменён'];
                                                foreach ($statuses as $st):
                                                ?>
                                                    <option value="<?php echo $st; ?>"
                                                        <?php if ($f_status === $st) echo 'selected'; ?>>
                                                        <?php echo $st; ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="col-md-3 d-flex align-items-end">
                                            <button class="btn btn-primary w-100" type="submit">Применить фильтры</button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Пользователь</th>
                                            <th>Дата</th>
                                            <th>Сумма</th>
                                            <th>Статус</th>
                                            <th>Действия</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if ($sql_orders_admin && $sql_orders_admin->num_rows > 0): ?>
                                            <?php foreach ($sql_orders_admin as $order): ?>
                                                <tr>
                                                    <td>#<?php echo $order['id_order']; ?></td>
                                                    <td><?php echo $order['surname'] . ' ' . $order['name']; ?></td>
                                                    <td><?php echo date('d.m.Y H:i', strtotime($order['date'])); ?></td>
                                                    <td><?php echo (int)$order['total']; ?> ₽ за <?php echo (int)$order['items_count']; ?> шт.</td>
                                                    <td>
                                                        <?php
                                                        $statusClass = [
                                                            'Новый'      => 'bg-primary',
                                                            'В процессе' => 'bg-warning',
                                                            'Выполнен'   => 'bg-success',
                                                            'Отменён'    => 'bg-danger'
                                                        ][$order['status']] ?? 'bg-secondary';
                                                        ?>
                                                        <span class="badge <?php echo $statusClass; ?> status-badge">
                                                            <?php echo $order['status']; ?>
                                                        </span>
                                                    </td>
                                                    <td>
                                                        <button
                                                            class="btn btn-sm btn-outline-primary action-btn btn-admin-order-view"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#adminOrderModal"
                                                            data-id="<?php echo $order['id_order']; ?>">Просмотр</button>

                                                        <button
                                                            class="btn btn-sm btn-outline-success action-btn btn-admin-order-status"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#adminStatusModal"
                                                            data-id="<?php echo $order['id_order']; ?>"
                                                            data-status="<?php echo $order['status']; ?>">Изменить статус</button>

                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <tr>
                                                <td colspan="6" class="text-center text-muted py-3">Заказов пока нет</td>
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                    <!-- Catalog Tab -->
                    <div class="tab-pane fade" id="catalog" role="tabpanel">
                        <div class="myaccount-content">
                            <h4 class="small-title mb-4">Управление каталогом</h4>
                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <h5>Товары / Услуги</h5>
                                </div>
                                <div class="col-md-6 text-end">
                                    <button class="btn btn-success btn-lg">
                                        <i class="fa fa-plus me-2"></i>Добавить позицию
                                    </button>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Название</th>
                                            <th>Цена</th>
                                            <th>Категория</th>
                                            <th>Статус</th>
                                            <th>Действия</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>#001</td>
                                            <td>Консультация специалиста</td>
                                            <td>2 500 ₽</td>
                                            <td>Услуги</td>
                                            <td><span class="badge bg-success status-badge">Активен</span></td>
                                            <td>
                                                <a href="#" class="btn btn-sm btn-outline-primary action-btn">Редактировать</a>
                                                <a href="#" class="btn btn-sm btn-outline-danger action-btn">Удалить</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editUserModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <form class="modal-content" method="post" action="event_admin/update_user.php">
            <div class="modal-header">
                <h5 class="modal-title">Редактирование пользователя</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <input type="hidden" name="id_user" id="edit-id_user">

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" id="edit-email" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Имя</label>
                    <input type="text" class="form-control" name="name" id="edit-name" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Фамилия</label>
                    <input type="text" class="form-control" name="surname" id="edit-surname" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Пароль (если нужно сменить)</label>
                    <input type="password" class="form-control" name="password">
                </div>

                <div class="mb-3">
                    <label class="form-label">Роль</label><br>
                    <select class="form-select" name="is_admin" id="edit-is_admin">
                        <option value="0">Пользователь</option>
                        <option value="1">Администратор</option>
                    </select>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Отмена</button>
                <button type="submit" class="btn btn-primary">Сохранить</button>
            </div>
        </form>
    </div>
</div>

<div class="modal fade" id="deleteUserModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <form class="modal-content" method="post" action="event_admin/delete_user.php">
            <div class="modal-header">
                <h5 class="modal-title">Удаление пользователя</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <input type="hidden" name="id_user" id="delete-id_user">
                <p>Вы действительно хотите удалить пользователя
                    <strong id="delete-email"></strong>?
                </p>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Отмена</button>
                <button type="submit" class="btn btn-danger">Удалить</button>
            </div>
        </form>
    </div>
</div>

<div class="modal fade" id="adminOrderModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Заказ #<span id="a-order-id"></span></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered align-middle mb-0">
                    <thead>
                        <tr>
                            <th style="width:70px">Фото</th>
                            <th>Товар</th>
                            <th class="text-center" style="width:120px">Кол-во</th>
                            <th class="text-end" style="width:140px">Цена</th>
                            <th class="text-end" style="width:160px">Сумма</th>
                        </tr>
                    </thead>
                    <tbody id="a-order-items"></tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="adminStatusModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <form class="modal-content" method="post" action="event_admin/update_order_status.php">
            <div class="modal-header">
                <h5 class="modal-title">Изменение статуса заказа #<span id="s-order-id"></span></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <input type="hidden" name="id_order" id="s-order-id-input">
                <div class="mb-3">
                    <label class="form-label">Статус</label>
                    <select class="form-select" name="status" id="s-order-status">
                        <option value="Новый">Новый</option>
                        <option value="В процессе">В процессе</option>
                        <option value="Выполнен">Выполнен</option>
                        <option value="Отменён">Отменён</option>
                    </select>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Отмена</button>
                <button type="submit" class="btn btn-success">Сохранить</button>
            </div>
        </form>
    </div>
</div>




<script>
    const ADMIN_ORDER_ITEMS = <?php echo json_encode($order_items_admin, JSON_UNESCAPED_UNICODE); ?>;
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const modalEl = document.getElementById('adminOrderModal');
        if (!modalEl) return;

        const modal = new bootstrap.Modal(modalEl);

        document.querySelectorAll('.btn-admin-order-view').forEach(function(btn) {
            btn.addEventListener('click', function() {
                const id = this.getAttribute('data-id');
                const items = ADMIN_ORDER_ITEMS[id] || [];

                document.getElementById('a-order-id').textContent = id;

                const tbody = document.getElementById('a-order-items');
                tbody.innerHTML = '';

                let totalQty = 0;
                let totalSum = 0;

                items.forEach(function(it) {
                    const qty = parseInt(it.amount, 10) || 0;
                    const price = parseInt(it.price, 10) || 0;
                    const sum = qty * price;

                    totalQty += qty;
                    totalSum += sum;

                    const tr = document.createElement('tr');
                    tr.innerHTML =
                        '<td><img src="' + it.photo + '" alt="" style="width:60px;height:auto;"></td>' +
                        '<td>' + it.name_product + '</td>' +
                        '<td class="text-center">' + qty + '</td>' +
                        '<td class="text-end">' + price + ' ₽</td>' +
                        '<td class="text-end">' + sum + ' ₽</td>';
                    tbody.appendChild(tr);
                });

                const trTotal = document.createElement('tr');
                trTotal.innerHTML =
                    '<td colspan="2"><strong>Итого</strong></td>' +
                    '<td class="text-center"><strong>' + totalQty + '</strong></td>' +
                    '<td></td>' +
                    '<td class="text-end"><strong>' + totalSum + ' ₽</strong></td>';
                tbody.appendChild(trTotal);

                modal.show();
            });
        });

        // модалка смены статуса
        const statusModalEl = document.getElementById('adminStatusModal');
        if (statusModalEl) {
            statusModalEl.addEventListener('show.bs.modal', function(event) {
                const btn = event.relatedTarget;
                const id = btn.getAttribute('data-id');
                const st = btn.getAttribute('data-status');

                document.getElementById('s-order-id').textContent = id;
                document.getElementById('s-order-id-input').value = id;
                document.getElementById('s-order-status').value = st;
            });
        }
    });
</script>