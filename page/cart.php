<!-- breadcrumbs area start -->
<div class="breadcrumbs_aree breadcrumbs_bg mb-110" data-bgimg="assets/img/bg/testimonial-bg.png">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumbs_text">
                    <h1>Корзина</h1>
                    <ul>
                        <li><a href="index.php?page=main">Главная</a></li>
                        <li> // Корзина</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumbs area end -->
<div class="cart-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <?php if ($total_price != 0): ?>
                    <form action="#">
                        <div class="table-content table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="product_remove">Удалить</th>
                                        <th class="product-thumbnail">Изображение</th>
                                        <th class="cart-product-name">Товар</th>
                                        <th class="product-price">Цена за ед.</th>
                                        <th class="product-quantity">Количество</th>
                                        <th class="product-subtotal">Сумма</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($sql_product_in_cart as $product_in_cart): ?>
                                        <tr>
                                            <td class="product_remove">
                                                <a href="event_cart/remove_cart.php?id_product_del=<?php echo $product_in_cart['id_product'] ?>">
                                                    <i class="pe-7s-close" title="Remove"></i>
                                                </a>
                                            </td>
                                            <td class="product-thumbnail">
                                                <a href="index.php?page=product&id_product=<?php echo $product_in_cart['id_product'] ?>">
                                                    <img src="<?php echo $product_in_cart['photo'] ?>"
                                                        alt="Cart Thumbnail">
                                                </a>
                                            </td>
                                            <td class="product-name"><a href="index.php?page=product&id_product=<?php echo $product_in_cart['id_product'] ?>"><?php echo $product_in_cart['name_product'] ?></a>
                                            </td>
                                            <td class="product-price"><span class="amount"><?php echo $product_in_cart['price'] ?> р.</span></td>
                                            <td class="product_pro_button quantity">
                                                <div class="pro-qty border">
                                                    <input type="text" value="<?php echo $product_in_cart['qty'] ?>">
                                                </div>
                                            </td>
                                            <td class="product-subtotal"><span class="amount"><?php echo $product_in_cart['qty'] * $product_in_cart['price'] ?> р.</span></td>
                                        </tr>

                                    <?php endforeach; ?>

                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-md-5 ml-auto">
                                <div class="cart-page-total">
                                    <h2>Итоги</h2>
                                    <ul>
                                        <li>Всего к оплате: <span><?php echo $total_price ?> р.</span></li>
                                    </ul>
                                    <a href="index.php?page=checkout">Оформить заказ</a>
                                </div>
                            </div>
                        </div>
                    </form>
                <?php else: ?>
                    <h3>Корзина пуста!</h3>
                <?php endif ?>
            </div>
        </div>
    </div>
</div>