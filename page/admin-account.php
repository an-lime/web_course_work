<?php
$admin_active_tab = isset($_GET['tab']) ? $_GET['tab'] : 'users';
?>


<!-- Breadcrumbs area start -->
<div class="admin-breadcrumbs breadcrumbs_aree mb-110" data-bgimg="assets/img/bg/testimonial-bg.png">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumbs_text">
                    <h1>Админ панель</h1>
                    <ul>
                        <li><a href="index.php?page=main">Главная</a></li>
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
                        <a class="admin-nav-link <?php echo ($admin_active_tab == 'users') ? 'active' : ''; ?>"
                            id="users-tab"
                            data-bs-toggle="tab"
                            href="#users"
                            role="tab">
                            <i class="fa fa-users me-2"></i>Пользователи
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="admin-nav-link <?php echo ($admin_active_tab == 'orders') ? 'active' : ''; ?>"
                            id="orders-tab"
                            data-bs-toggle="tab"
                            href="#orders"
                            role="tab">
                            <i class="fa fa-shopping-cart me-2"></i>Заказы/Заявки
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="admin-nav-link <?php echo ($admin_active_tab == 'catalog') ? 'active' : ''; ?>"
                            id="catalog-tab"
                            data-bs-toggle="tab"
                            href="#catalog"
                            role="tab">
                            <i class="fa fa-th-large me-2"></i>Каталог товаров
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($admin_active_tab == 'account-details') ? 'active' : ''; ?>"
                            id="account-details-tab"
                            data-bs-toggle="tab"
                            href="#account-details"
                            role="tab">Данные аккаунта</a>
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

                    <!-- Users Tab -->
                    <div class="tab-pane fade <?php echo ($admin_active_tab == 'users') ? 'show active' : ''; ?>"
                        id="users"
                        role="tabpanel">
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
                    <div class="tab-pane fade <?php echo ($admin_active_tab == 'orders') ? 'show active' : ''; ?>"
                        id="orders"
                        role="tabpanel">
                        <div class="myaccount-content">
                            <h4 class="small-title mb-4">Заказы и заявки</h4>

                            <div class="filter-section mb-3">
                                <form method="get">
                                    <input type="hidden" name="page" value="admin-account">
                                    <input type="hidden" name="tab" value="orders">
                                    <div class="row g-2">
                                        <div class="col-md-3">
                                            <label class="form-label fw-bold">Пользователь</label>
                                            <select class="form-select" name="order_admin_user">
                                                <option value="0">Все пользователи</option>
                                                <?php if ($order_admin_users_for_filter): ?>
                                                    <?php foreach ($order_admin_users_for_filter as $u): ?>
                                                        <option value="<?php echo $u['id_user']; ?>"
                                                            <?php if ($order_admin_f_user === (int)$u['id_user']) echo 'selected'; ?>>
                                                            <?php echo $u['surname'] . ' ' . $u['name']; ?>
                                                        </option>
                                                    <?php endforeach; ?>
                                                <?php endif; ?>
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <label class="form-label fw-bold">Дата</label>
                                            <input type="date"
                                                class="form-control"
                                                name="order_admin_date"
                                                value="<?php echo htmlspecialchars($order_admin_f_date); ?>">
                                        </div>
                                        <div class="col-md-3">
                                            <label class="form-label fw-bold">Статус</label><br>
                                            <select class="form-select" name="order_admin_status">
                                                <option value="">Все статусы</option>
                                                <?php
                                                $order_admin_statuses = ['Новый', 'В процессе', 'Выполнен', 'Отменён'];
                                                foreach ($order_admin_statuses as $st):
                                                ?>
                                                    <option value="<?php echo $st; ?>"
                                                        <?php if ($order_admin_f_status === $st) echo 'selected'; ?>>
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
                                        <?php if ($order_admin_sql_orders && $order_admin_sql_orders->num_rows > 0): ?>
                                            <?php foreach ($order_admin_sql_orders as $order_admin_row): ?>
                                                <tr>
                                                    <td>#<?php echo $order_admin_row['id_order']; ?></td>
                                                    <td><?php echo $order_admin_row['surname'] . ' ' . $order_admin_row['name']; ?></td>
                                                    <td><?php echo date('d.m.Y H:i', strtotime($order_admin_row['date'])); ?></td>
                                                    <td><?php echo (int)$order_admin_row['total']; ?> ₽ за <?php echo (int)$order_admin_row['items_count']; ?> шт.</td>
                                                    <td>
                                                        <?php
                                                        $order_admin_statusClass = [
                                                            'Новый'      => 'bg-primary',
                                                            'В процессе' => 'bg-warning',
                                                            'Выполнен'   => 'bg-success',
                                                            'Отменён'    => 'bg-danger'
                                                        ][$order_admin_row['status']] ?? 'bg-secondary';
                                                        ?>
                                                        <span class="badge <?php echo $order_admin_statusClass; ?> status-badge">
                                                            <?php echo $order_admin_row['status']; ?>
                                                        </span>
                                                    </td>
                                                    <td>
                                                        <button
                                                            class="btn btn-sm btn-outline-primary action-btn btn-admin-order-view"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#adminOrderModal"
                                                            data-id="<?php echo $order_admin_row['id_order']; ?>">Просмотр</button>

                                                        <button
                                                            class="btn btn-sm btn-outline-success action-btn btn-admin-order-status"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#adminStatusModal"
                                                            data-id="<?php echo $order_admin_row['id_order']; ?>"
                                                            data-status="<?php echo $order_admin_row['status']; ?>">Изменить статус</button>
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
                    <div class="tab-pane fade <?php echo ($admin_active_tab == 'catalog') ? 'show active' : ''; ?>"
                        id="catalog"
                        role="tabpanel">
                        <div class="myaccount-content">
                            <h4 class="small-title mb-4">Управление каталогом</h4>
                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <h5>Товары / Услуги</h5>
                                </div>
                                <div class="col-md-6 text-end">
                                    <button class="btn btn-success btn-lg"
                                        data-bs-toggle="modal"
                                        data-bs-target="#productCreateModal">
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
                                            <th>Действия</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if ($admin_products && $admin_products->num_rows > 0): ?>
                                            <?php foreach ($admin_products as $prod): ?>
                                                <tr>
                                                    <td>#<?php echo $prod['id_product']; ?></td>
                                                    <td><?php echo htmlspecialchars($prod['name_product']); ?></td>
                                                    <td><?php echo (int)$prod['price']; ?> ₽</td>
                                                    <td><?php echo htmlspecialchars($prod['name_category']); ?></td>
                                                    <td>
                                                        <button
                                                            class="btn btn-sm btn-outline-primary action-btn btn-product-edit"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#productEditModal"
                                                            data-id="<?php echo $prod['id_product']; ?>"
                                                            data-name="<?php echo htmlspecialchars($prod['name_product'], ENT_QUOTES); ?>"
                                                            data-price="<?php echo (int)$prod['price']; ?>"
                                                            data-category="<?php echo (int)$prod['category']; ?>"
                                                            data-size="<?php echo (int)$prod['size']; ?>"
                                                            data-short="<?php echo htmlspecialchars($prod['short_description'], ENT_QUOTES); ?>"
                                                            data-desc="<?php echo htmlspecialchars($prod['description'], ENT_QUOTES); ?>"
                                                            data-photo="<?php echo htmlspecialchars($prod['photo'], ENT_QUOTES); ?>">Редактировать</button>

                                                        <button
                                                            class="btn btn-sm btn-outline-danger action-btn btn-product-delete"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#productDeleteModal"
                                                            data-id="<?php echo $prod['id_product']; ?>"
                                                            data-name="<?php echo htmlspecialchars($prod['name_product'], ENT_QUOTES); ?>">Удалить</button>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <tr>
                                                <td colspan="6" class="text-center text-muted py-3">Позиций пока нет</td>
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade <?php echo ($admin_active_tab == 'account-details') ? 'show active' : ''; ?>"
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

<!-- Модалка редактирования пользователя -->
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

<!-- Модалка удаления пользователя -->
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

<!-- Модалка просмотра заказа -->
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


<!-- Модалка изменения статуса заказа -->
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
                    <label class="form-label">Статус</label><br>
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

<!-- Модалка создания продукта -->

<div class="modal fade" id="productCreateModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form class="modal-content" method="post" action="event_admin/product_create.php" enctype="multipart/form-data">
            <div class="modal-header">
                <h5 class="modal-title">Новый товар / услуга</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label">Название</label>
                    <input type="text" name="name_product" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Цена</label>
                    <input type="number" name="price" class="form-control" min="0" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Категория</label>
                    <br>
                    <select name="category" class="form-select" required>
                        <?php mysqli_data_seek($admin_categories, 0);
                        foreach ($admin_categories as $cat): ?>
                            <option value="<?php echo $cat['id_category']; ?>"><?php echo $cat['name_category']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <br>
                <div class="mb-3">
                    <label class="form-label">Размер</label>
                    <br>
                    <select name="size" class="form-select" required>
                        <?php mysqli_data_seek($admin_sizes, 0);
                        foreach ($admin_sizes as $sz): ?>
                            <option value="<?php echo $sz['id_size']; ?>"><?php echo $sz['name_size']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <br>
                <div class="mb-3">
                    <label class="form-label">Краткое описание</label>
                    <input type="text" name="short_description" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Описание</label>
                    <textarea name="description" class="form-control" rows="4"></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Фото (URL или файл)</label>
                    <input type="text" name="photo" class="form-control">
                    <!-- если нужен upload файлом — добавь input type="file" и обработку -->
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Отмена</button>
                <button type="submit" class="btn btn-success">Создать</button>
            </div>
        </form>
    </div>
</div>

<!-- Модалка редактирования продукта -->

<div class="modal fade" id="productEditModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form class="modal-content" method="post" action="event_admin/product_update.php">
            <div class="modal-header">
                <h5 class="modal-title">Редактирование позиции</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <input type="hidden" name="id_product" id="p-edit-id">
                <div class="mb-3">
                    <label class="form-label">Название</label>
                    <input type="text" name="name_product" id="p-edit-name" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Цена</label>
                    <input type="number" name="price" id="p-edit-price" class="form-control" min="0" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Категория</label>
                    <br>
                    <select name="category" id="p-edit-category" class="form-select" required>
                        <?php mysqli_data_seek($admin_categories, 0);
                        foreach ($admin_categories as $cat): ?>
                            <option value="<?php echo $cat['id_category']; ?>"><?php echo $cat['name_category']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <br><br>
                <div class="mb-3">
                    <label class="form-label">Размер</label>
                    <br>
                    <select name="size" id="p-edit-size" class="form-select" required>
                        <?php mysqli_data_seek($admin_sizes, 0);
                        foreach ($admin_sizes as $sz): ?>
                            <option value="<?php echo $sz['id_size']; ?>"><?php echo $sz['name_size']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <br><br>
                <div class="mb-3">
                    <label class="form-label">Краткое описание</label>
                    <br>
                    <input type="text" name="short_description" id="p-edit-short" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Описание</label>
                    <textarea name="description" id="p-edit-desc" class="form-control" rows="4"></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Фото (URL)</label>
                    <input type="text" name="photo" id="p-edit-photo" class="form-control">
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Отмена</button>
                <button type="submit" class="btn btn-primary">Сохранить</button>
            </div>
        </form>
    </div>
</div>

<!-- Модалка удаления продукта -->

<div class="modal fade" id="productDeleteModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <form class="modal-content" method="post" action="event_admin/product_delete.php">
            <div class="modal-header">
                <h5 class="modal-title">Удаление позиции</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <input type="hidden" name="id_product" id="p-del-id">
                <p>Удалить позицию <strong id="p-del-name"></strong>?</p>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Отмена</button>
                <button type="submit" class="btn btn-danger">Удалить</button>
            </div>
        </form>
    </div>
</div>




<script>
    const ADMIN_ORDER_ITEMS = <?php echo json_encode($order_admin_items, JSON_UNESCAPED_UNICODE); ?>;
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {

        // ===== Просмотр заказа =====
        const adminOrderModalEl = document.getElementById('adminOrderModal');
        if (adminOrderModalEl) {
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

                    // строка итога
                    const trTotal = document.createElement('tr');
                    trTotal.innerHTML =
                        '<td colspan="2"><strong>Итого</strong></td>' +
                        '<td class="text-center"><strong>' + totalQty + '</strong></td>' +
                        '<td></td>' +
                        '<td class="text-end"><strong>' + totalSum + ' ₽</strong></td>';
                    tbody.appendChild(trTotal);
                });
            });
        }

        // ===== Изменение статуса =====
        const statusModalEl = document.getElementById('adminStatusModal');
        if (statusModalEl) {
            statusModalEl.addEventListener('show.bs.modal', function(event) {
                const btn = event.relatedTarget;
                const id = btn.getAttribute('data-id');
                const st = btn.getAttribute('data-status');

                document.getElementById('s-order-id').textContent = id;
                document.getElementById('s-order-id-input').value = id;
            });
        }

        // Работа с продуктами

        // редактирование
        const editModal = document.getElementById('productEditModal');
        if (editModal) {
            editModal.addEventListener('show.bs.modal', function(event) {
                const btn = event.relatedTarget;

                document.getElementById('p-edit-id').value = btn.getAttribute('data-id');
                document.getElementById('p-edit-name').value = btn.getAttribute('data-name');
                document.getElementById('p-edit-price').value = btn.getAttribute('data-price');
                document.getElementById('p-edit-category').value = btn.getAttribute('data-category');
                document.getElementById('p-edit-size').value = btn.getAttribute('data-size');
                document.getElementById('p-edit-short').value = btn.getAttribute('data-short');
                document.getElementById('p-edit-desc').value = btn.getAttribute('data-desc');
                document.getElementById('p-edit-photo').value = btn.getAttribute('data-photo');
            });
        }

        // удаление
        const delModal = document.getElementById('productDeleteModal');
        if (delModal) {
            delModal.addEventListener('show.bs.modal', function(event) {
                const btn = event.relatedTarget;

                document.getElementById('p-del-id').value = btn.getAttribute('data-id');
                document.getElementById('p-del-name').textContent = btn.getAttribute('data-name');
            });
        }

        // редактирование пользователя
        const editUserModal = document.getElementById('editUserModal');
        if (editUserModal) {
            editUserModal.addEventListener('show.bs.modal', function(event) {
                const btn = event.relatedTarget;

                document.getElementById('edit-id_user').value = btn.getAttribute('data-id');
                document.getElementById('edit-email').value = btn.getAttribute('data-email');
                document.getElementById('edit-name').value = btn.getAttribute('data-name');
                document.getElementById('edit-surname').value = btn.getAttribute('data-surname');
                document.getElementById('edit-is_admin').value = btn.getAttribute('data-isadmin');
            });
        }

        // удаление пользователя
        const deleteUserModal = document.getElementById('deleteUserModal');
        if (deleteUserModal) {
            deleteUserModal.addEventListener('show.bs.modal', function(event) {
                const btn = event.relatedTarget;

                document.getElementById('delete-id_user').value = btn.getAttribute('data-id');
                document.getElementById('delete-email').textContent = btn.getAttribute('data-email');
            });
        }


    });
</script>