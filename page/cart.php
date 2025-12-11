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
                    <form action="event_cart/update_cart_ajax.php" method="post">
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
                                    <?php if (isset($sql_product_in_cart)) : ?>
                                        <?php foreach ($sql_product_in_cart as $product_in_cart): ?>
                                            <tr class="cart-row" data-price="<?php echo $product_in_cart['price']; ?>">
                                                <td class="product_remove">
                                                    <a href="event_cart/remove_cart.php?id_product_del=<?php echo $product_in_cart['id_product'] ?>">
                                                        <i class="pe-7s-close" title="Remove"></i>
                                                    </a>
                                                </td>
                                                <td class="product-thumbnail">
                                                    <a href="index.php?page=product&id_product=<?php echo $product_in_cart['id_product'] ?>">
                                                        <img src="<?php echo $product_in_cart['photo'] ?>" alt="Cart Thumbnail">
                                                    </a>
                                                </td>
                                                <td class="product-name">
                                                    <a href="index.php?page=product&id_product=<?php echo $product_in_cart['id_product'] ?>">
                                                        <?php echo $product_in_cart['name_product'] ?>
                                                    </a>
                                                </td>
                                                <td class="product-price">
                                                    <span class="amount"><?php echo $product_in_cart['price'] ?> ₽</span>
                                                </td>
                                                <td class="product_pro_button quantity">
                                                    <div class="pro-qty border">
                                                        <input type="text"
                                                            class="qty-input"
                                                            name="id_product"
                                                            value="<?php echo $product_in_cart['qty'] ?>"
                                                            min="1"
                                                            data-product-id="<?php echo $product_in_cart['id_product']; ?>">
                                                    </div>
                                                </td>
                                                <td class="product-subtotal">
                                                    <span class="amount item-total"><?php echo $product_in_cart['qty'] * $product_in_cart['price'] ?> ₽</span>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php endif ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-md-5 ml-auto">
                                <div class="cart-page-total">
                                    <h2>Итоги</h2>
                                    <ul>
                                        <li>Всего к оплате: <span id="total-price"><?php echo $total_price ?> ₽</span></li>
                                    </ul>
                                    <a href="index.php?page=checkout">Оформить заказ</a>
                                </div>
                            </div>
                        </div>
                    </form>
                <?php else: ?>
                    <div class="text-center py-5">
                        <h3>Корзина пуста!</h3>
                        <a href="index.php?page=catalog" class="btn btn-primary mt-3">Перейти в каталог</a>
                    </div>
                <?php endif ?>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const totalPriceElement = document.getElementById('total-price');

        function updateRowTotal(input) {
            const row = input.closest('.cart-row');
            const price = parseFloat(row.getAttribute('data-price'));
            let qty = parseInt(input.value, 10);

            if (isNaN(qty) || qty < 1) {
                qty = 1;
                input.value = 1;
            }

            const itemTotal = price * qty;
            row.querySelector('.item-total').textContent = itemTotal + ' ₽';

            updateGrandTotal();
        }

        function updateGrandTotal() {
            let grandTotal = 0;
            document.querySelectorAll('.cart-row').forEach(function(row) {
                const price = parseFloat(row.getAttribute('data-price'));
                const qty = parseInt(row.querySelector('.qty-input').value, 10) || 1;
                grandTotal += price * qty;
            });

            totalPriceElement.textContent = grandTotal + ' ₽';
        }

        function updateCartInDB(productId, qty) {
            fetch('event_cart/update_cart_ajax.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: 'id_product=' + productId + '&qty=' + qty
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        console.log('Корзина обновлена');
                    }
                })
                .catch(error => {
                    console.error('Ошибка запроса:', error);
                });
        }

        // отслеживаем изменения во всех qty-input
        document.querySelectorAll('.qty-input').forEach(function(input) {
            let timeout;

            function handleUpdate() {
                updateRowTotal(input);

                clearTimeout(timeout);
                const productId = input.getAttribute('data-product-id');
                const qty = input.value;

                timeout = setTimeout(function() {
                    updateCartInDB(productId, qty);
                }, 500);
            }

            // вешаем оба события
            input.addEventListener('input', handleUpdate);
            input.addEventListener('change', handleUpdate);
        });

        // дополнительно: отслеживаем клики по всему документу на кнопки +/-
        document.addEventListener('click', function(e) {
            if (e.target.classList.contains('qty-btn') ||
                e.target.classList.contains('inc') ||
                e.target.classList.contains('dec')) {

                // небольшая задержка, чтобы значение инпута успело обновиться
                setTimeout(function() {
                    const proQty = e.target.closest('.pro-qty');
                    if (proQty) {
                        const input = proQty.querySelector('.qty-input');
                        if (input) {
                            updateRowTotal(input);

                            const productId = input.getAttribute('data-product-id');
                            updateCartInDB(productId, input.value);
                        }
                    }
                }, 50);
            }
        });
    });
</script>