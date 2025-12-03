<!-- breadcrumbs area start -->
<div class="breadcrumbs_aree breadcrumbs_bg mb-110" data-bgimg="assets/img/others/breadcrumbs-bg.png">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumbs_text">
                    <h1>Оформление заказа</h1>
                    <ul>
                        <li><a href="index.php">Главная</a></li>
                        <li> // Оформление заказа</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumbs area end -->

<div class="checkout-area">
    <div class="container">
        <div class="row">
            <form class="form_order" action="event_order/add_order.php" method="POST">
                <div class="col-lg-6 col-12">
                    <div class="checkbox-form">
                        <h3>Данные для доставки</h3>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="country-select clearfix">
                                    <label>Страна <span class="required">*</span></label>
                                    <select class="myniceselect nice-select wide" name="country">
                                        <option value="Россия" selected>Россия</option>
                                        <option value="Великобритания">Великобритания</option>
                                        <option value="Германия">Германия</option>
                                        <option value="Франция">Франция</option>
                                        <option value="Австралия">Австралия</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label>Имя <span class="required">*</span></label>
                                    <input type="text" name="first_name" value="<?php echo $_SESSION['user']['name'] ?>" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label>Фамилия <span class="required">*</span></label>
                                    <input type="text" name="last_name" value="<?php echo $_SESSION['user']['surname'] ?>" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="checkout-form-list">
                                    <label>Город <span class="required">*</span></label>
                                    <input type="text" name="city" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="checkout-form-list">
                                    <label>Адрес <span class="required">*</span></label>
                                    <input type="text" name="adress" placeholder="Улица, дом, корпус" required>
                                </div>
                            </div>
                            <div class="col">
                                <div class="col-md-6">
                                    <div class="checkout-form-list">
                                        <label>Email <span class="required">*</span></label>
                                        <input type="email" name="email" value="<?php echo $_SESSION['user']['email'] ?>" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="checkout-form-list">
                                        <label>Телефон <span class="required">*</span></label><br>
                                        <input type="tel" name="phone" value="<?php echo $_SESSION['user']['phone'] ?>" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-12">
                    <div class="your-order">
                        <h3>Ваш заказ</h3>
                        <div class="your-order-table table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="cart-product-name">Товар</th>
                                        <th class="cart-product-total">Сумма</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($sql_product_in_cart)): ?>
                                        <?php foreach ($sql_product_in_cart as $product_in_cart): ?>
                                            <tr class="cart-item">
                                                <td class="cart-product-name">
                                                    <a href="index.php?page=product&id_product=<?php echo $product_in_cart['id_product'] ?>">
                                                        <?php echo $product_in_cart['name_product'] ?>
                                                    </a>
                                                    <strong class="product-quantity"> x <?php echo $product_in_cart['qty'] ?></strong>
                                                </td>
                                                <td class="cart-product-total">
                                                    <span class="amount"><?php echo $product_in_cart['qty'] * $product_in_cart['price'] ?> р.</span>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="2" class="text-center py-4 text-muted">
                                                Корзина пуста
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                                <tfoot>
                                    <tr class="order-total">
                                        <td class="cart-product-name"><strong><span> Общая сумма заказа</span></strong></td>
                                        <td class="cart-product-total"><strong><span class="amount"><?php echo $total_price ?> р.</span></strong></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <div class="payment-method">
                            <div class="payment-accordion">
                                <div class="order-button-payment">
                                    <button type="submit" class="button btn btn-primary btn-lg w-100">
                                        Оформить заказ
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>