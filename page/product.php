<!-- breadcrumbs area start -->
<div class="breadcrumbs_aree breadcrumbs_bg mb-100" data-bgimg="assets/img/bg/testimonial-bg.png">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumbs_text">
                    <h1><?php echo htmlspecialchars($sql_product_id['name_product']); ?></h1>
                    <ul>
                        <li><a href="index.php">Главная</a></li>
                        <li> // <a href="index.php?page=catalog">Каталог</a></li>
                        <li> // <?php echo htmlspecialchars($sql_product_id['name_product']); ?></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumbs area end -->

<!-- single product section start-->
<div class="single_product_section mb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="single_product_gallery">
                    <div class="product_gallery_inner">
                        <div class="product_gallery_main_img">
                            <img src="<?php echo htmlspecialchars($sql_product_id['photo']); ?>"
                                alt="<?php echo htmlspecialchars($sql_product_id['name_product']); ?>"
                                class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="product_details_sidebar">
                    <h2 class="product__title"><?php echo htmlspecialchars($sql_product_id['name_product']); ?></h2>
                    <div class="price_box mb-3">
                        <span class="current_price"><?php echo (int)$sql_product_id['price']; ?> ₽</span>
                    </div>
                    <p class="product_details_desc mb-4"><?php echo htmlspecialchars($sql_product_id['short_description']); ?></p>
                    <div class="product_pro_button quantity d-flex align-items-center gap-2">
                        <div class="pro-qty border">
                            <input type="text" value="1" id="qty-input">
                        </div>
                        <a id="add-to-cart-link" class="add_to_cart"
                            href="event_cart/add_cart.php?id_product_add=<?php echo $sql_product_id['id_product']; ?>">
                            Добавить в корзину
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- product details section end-->

<!-- product tab section start -->
<div class="product_tab_section mb-80">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="product_tab_navigation">
                    <ul class="nav justify-content-center">
                        <li>
                            <a class="active" data-bs-toggle="tab" href="#description">Описание</a>
                        </li>
                    </ul>
                </div>
                <div class="product_page_content_inner tab-content">
                    <div class="tab-pane fade show active" id="description" role="tabpanel">
                        <div class="product_tab_desc">
                            <p><?php echo nl2br(htmlspecialchars($sql_product_id['description'])); ?></p>
                        </div>
                        <br>
                        <div class="product_d_information">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td class="fw-bold">Категория</td>
                                        <td><?php echo htmlspecialchars($sql_product_id['name_category'] ?? 'Не указана'); ?></td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">Размер</td>
                                        <td><?php echo htmlspecialchars($sql_product_id['name_size'] ?? 'Не указан'); ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="product_info_desc mt-3">
                            <p>Вся выпечка изготавливается из натуральных ингредиентов без консервантов и искусственных добавок.
                                Мы используем только качественную муку, фермерские яйца и сливочное масло.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- product tab section end -->

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const qtyInput = document.getElementById('qty-input');
        const addLink = document.getElementById('add-to-cart-link');

        if (!qtyInput || !addLink) return;

        addLink.addEventListener('click', function(e) {
            let qty = parseInt(qtyInput.value, 10);
            if (isNaN(qty) || qty < 1) qty = 1;

            const url = new URL(addLink.href, window.location.origin);
            url.searchParams.set('qty', qty);

            addLink.href = url.toString();
        });
    });
</script>