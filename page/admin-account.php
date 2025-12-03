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
                                            <th>Дата регистрации</th>
                                            <th>Статус</th>
                                            <th>Действия</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>#001</td>
                                            <td>user@example.com</td>
                                            <td>Иванов Иван</td>
                                            <td>01.12.2025</td>
                                            <td><span class="badge bg-success status-badge">Активен</span></td>
                                            <td>
                                                <a href="#" class="btn btn-sm btn-outline-primary action-btn">Редактировать</a>
                                                <a href="#" class="btn btn-sm btn-outline-danger action-btn">Удалить</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- Заглушка для добавления пользователя -->
                            <div class="mt-4 text-end">
                                <button class="btn btn-primary btn-lg">
                                    <i class="fa fa-plus me-2"></i>Добавить пользователя
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Orders Tab -->
                    <div class="tab-pane fade" id="orders" role="tabpanel">
                        <div class="myaccount-content">
                            <h4 class="small-title mb-4">Заказы и заявки</h4>

                            <!-- Фильтры -->
                            <div class="filter-section">
                                <div class="row g-3">
                                    <div class="col-md-3">
                                        <label class="form-label fw-bold">Пользователь</label>
                                        <select class="form-select">
                                            <option>Все пользователи</option>
                                            <option>Иванов И.И.</option>
                                            <option>Петров П.П.</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label fw-bold">Дата</label>
                                        <input type="date" class="form-control">
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label fw-bold">Статус</label>
                                        <select class="form-select">
                                            <option>Все статусы</option>
                                            <option>Новый</option>
                                            <option>В обработке</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <button class="btn btn-primary w-100 mt-4">
                                            <i class="fa fa-search me-2"></i>Применить фильтры
                                        </button>
                                    </div>
                                </div>
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
                                        <tr>
                                            <td><a href="#" class="account-order-id">#001234</a></td>
                                            <td>Иванов И.И.</td>
                                            <td>03.12.2025</td>
                                            <td>12 500 ₽</td>
                                            <td><span class="badge bg-warning status-badge">В обработке</span></td>
                                            <td>
                                                <a href="#" class="btn btn-sm btn-outline-primary action-btn">Просмотр</a>
                                                <a href="#" class="btn btn-sm btn-outline-success action-btn">Изменить статус</a>
                                            </td>
                                        </tr>
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