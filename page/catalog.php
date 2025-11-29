<!-- page search box -->
<div class="page_search_box">
    <div class="search_close">
        <i class="ion-close-round"></i>
    </div>
    <form class="border-bottom" action="#">
        <input class="border-0" placeholder="Search products..." type="text">
        <button type="submit"><span class="pe-7s-search"></span></button>
    </form>
</div>

<!-- breadcrumbs area start -->
<div class="breadcrumbs_aree breadcrumbs_bg mb-100" data-bgimg="assets/img/others/breadcrumbs-bg.png">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumbs_text">
                    <h1>Products</h1>
                    <ul>
                        <li><a href="index.html">Home </a></li>
                        <li> // Shop Left Sidebar</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumbs area end -->

<!-- product page section start -->
<div class="product_page_section mb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 order-2 order-lg-1">
                <div class="product_sidebar product_widget">
                    <div class="widget__list widget_filter wow fadeInUp" data-wow-delay="0.1s"
                        data-wow-duration="1.1s">
                        <h3>Фильтр</h3>
                        <div class="widget__list category wow fadeInUp">
                            <h4>По размеру</h4>
                            <ul>
                                <li>
                                    <a href="index.php?page=catalog&id_cat=<?php echo $filter_category ?>&id_size=0&orderby=<?php echo $orderby ?>"
                                        class="<?php echo $filter_size == 0 ? 'active-filter' : '' ?>">
                                        Все размеры (<?php echo $all_product_for_filter['all_qty'] ?>)
                                    </a>
                                </li>
                                <?php foreach ($sql_size as $size): ?>
                                    <li>
                                        <a href="index.php?page=catalog&id_size=<?php echo $size['id_size'] ?>&id_cat=<?php echo $filter_category ?>&orderby=<?php echo $orderby ?>"
                                            class="<?php echo $filter_size == $size['id_size'] ? 'active-filter' : '' ?>">
                                            <?php echo $size['name_size'] ?> (<?php echo $size['amount'] ?>)
                                        </a>
                                    </li>
                                <?php endforeach; ?>


                            </ul>
                        </div>

                        <div class="widget__list category wow fadeInUp" data-wow-delay="0.2s" data-wow-duration="1.2s">
                            <h4>По категории</h4>
                            <div class="widget_category">
                                <ul>
                                    <li>
                                        <a href="index.php?page=catalog&id_cat=0&id_size=<?php echo $filter_size ?>&orderby=<?php echo $orderby ?>"
                                            class="<?php echo $filter_category == 0 ? 'active-filter' : '' ?>">
                                            Все категории<span>(<?php echo $all_product_for_filter['all_qty'] ?>)</span>
                                        </a>
                                    </li>
                                    <?php foreach ($sql_categori as $categori): ?>
                                        <li>
                                            <a href="index.php?page=catalog&id_cat=<?php echo $categori['id_category'] ?>&id_size=<?php echo $filter_size ?>&orderby=<?php echo $orderby ?>"
                                                class="<?php echo $filter_category == $categori['id_category'] ? 'active-filter' : '' ?>">
                                                <?php echo $categori['name_category'] ?><span>(<?php echo $categori['amount'] ?>)</span>
                                            </a>
                                        </li>
                                    <?php endforeach; ?>

                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-lg-9 order-1 order-lg-2">
                <div class="product_page_wrapper">
                    <!--shop toolbar area start-->
                    <div class="product_sidebar_header mb-60 d-flex justify-content-between align-items-center">
                        <div class="page__amount border">
                            <p>Продуктов найдено:
                                <span>
                                    <?php
                                    if ($sql_product->num_rows > 0) {
                                        $firstRow = $sql_product->fetch_assoc();
                                        echo $firstRow['filtered_count'];
                                        $sql_product->data_seek(0);
                                    } else {
                                        echo '0';
                                    }
                                    ?>
                                </span>
                            </p>
                        </div>

                        <div class="product_header_right d-flex align-items-center">
                            <div class="sorting__by d-flex align-items-center">
                                <span>Сортировать:</span>
                                <ul class="sorting_list d-flex ms-3">
                                    <li>
                                        <a href="index.php?page=catalog&id_cat=<?php echo $filter_category; ?>&id_size=<?php echo $filter_size; ?>&orderby=1"
                                            class="<?php echo $orderby === 1 ? 'active-filter' : ''; ?>">
                                            По умолчанию
                                        </a>
                                    </li>
                                    <li>
                                        <a href="index.php?page=catalog&id_cat=<?php echo $filter_category; ?>&id_size=<?php echo $filter_size; ?>&orderby=2"
                                            class="<?php echo $orderby === 2 ? 'active-filter' : ''; ?>">
                                            Цена по возрастанию
                                        </a>
                                    </li>
                                    <li>
                                        <a href="index.php?page=catalog&id_cat=<?php echo $filter_category; ?>&id_size=<?php echo $filter_size; ?>&orderby=3"
                                            class="<?php echo $orderby === 3 ? 'active-filter' : ''; ?>">
                                            Цена по убыванию
                                        </a>
                                    </li>
                                    <li>
                                        <a href="index.php?page=catalog&id_cat=<?php echo $filter_category; ?>&id_size=<?php echo $filter_size; ?>&orderby=4"
                                            class="<?php echo $orderby === 4 ? 'active-filter' : ''; ?>">
                                            По названию А → Я
                                        </a>
                                    </li>
                                    <li>
                                        <a href="index.php?page=catalog&id_cat=<?php echo $filter_category; ?>&id_size=<?php echo $filter_size; ?>&orderby=5"
                                            class="<?php echo $orderby === 5 ? 'active-filter' : ''; ?>">
                                            По названию Я → А
                                        </a>
                                    </li>
                                </ul>
                            </div>

                            <div class="ms-3">
                                <a href="index.php?page=catalog&id_cat=0&id_size=0&orderby=1"
                                    class="btn btn-sm btn-outline-secondary reset-filters-btn">
                                    Сбросить фильтры
                                </a>
                            </div>
                        </div>
                    </div>


                    <!--shop toolbar area end-->


                    <!--shop gallery start-->
                    <div class="product_page_gallery">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="list">
                                <div class="list__product">

                                    <?php foreach ($sql_product as $product): ?>

                                        <article class="product_list_items border-bottom wow fadeInUp">
                                            <figure class="product_list_flex d-flex align-items-center">
                                                <div class="product_thumb">
                                                    <a href="index.php?page=product&id_product=<?php echo $product['id_product'] ?>">
                                                        <img src="<?php echo $product['photo'] ?>" alt="">
                                                    </a>
                                                    <div class="action_links">
                                                        <ul class="d-flex justify-content-center">
                                                            <li class="add_to_cart"><a href="cart.html" title="Add to cart">
                                                                    <span class="pe-7s-shopbag"></span></a></li>
                                                            <li class="wishlist"><a href="#" title="Add to Wishlist">
                                                                    <span class="pe-7s-like"></span></a></li>
                                                            <li class="quick_button"><a href="#" title="Quick View"
                                                                    data-bs-toggle="modal" data-bs-target="#modal_box">
                                                                    <span class="pe-7s-look"></span></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <figcaption class="product_list_content">
                                                    <h4><a href="index.php?page=product&id_product=<?php echo $product['id_product'] ?>"><?php echo $product['name_product'] ?></a></h4>
                                                    <div class="product__ratting">
                                                        <ul class="d-flex">
                                                            <li><a href="#"><i class="ion-ios-star"></i></a></li>
                                                            <li><a href="#"><i class="ion-ios-star"></i></a></li>
                                                            <li><a href="#"><i class="ion-ios-star"></i></a></li>
                                                            <li><a href="#"><i class="ion-ios-star"></i></a></li>
                                                            <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="price_box">
                                                        <span class="current_price"><?php echo $product['price'] ?> р.</span>
                                                    </div>
                                                    <div class="product__desc">
                                                        <p><?php echo $product['short_description'] ?></p>
                                                    </div>
                                                    <div class="action_links product_list_action">
                                                        <ul class="d-flex">
                                                            <li class="add_to_cart"><a href="cart.html" title="Add to cart">
                                                                    <span class="pe-7s-shopbag"></span></a></li>
                                                            <li class="wishlist"><a href="#" title="Add to Wishlist">
                                                                    <span class="pe-7s-like"></span></a></li>
                                                        </ul>
                                                    </div>
                                                </figcaption>
                                            </figure>
                                        </article>

                                    <?php endforeach ?>

                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Пагинация -->
                    <div class="pagination poduct_pagination">
                        <ul>
                            <?php if ($catalog_page > 1): ?>
                                <li class="prev">
                                    <a href="index.php?page=catalog&catalog_page=<?= $catalog_page - 1 ?>&id_cat=<?= $filter_category ?>&id_size=<?= $filter_size ?>&orderby=<?= $orderby ?>">
                                        <i class="ion-chevron-left"></i>
                                    </a>
                                </li>
                            <?php endif; ?>

                            <?php
                            $max_visible_pages = 3;
                            $start_page = max(1, $catalog_page - floor($max_visible_pages / 2));
                            $end_page = min($total_pages, $start_page + $max_visible_pages - 1);
                            $start_page = max(1, $end_page - $max_visible_pages + 1);
                            ?>

                            <?php if ($start_page > 1): ?>
                                <li class="<?= 1 == $catalog_page ? 'current' : '' ?>">
                                    <a href="index.php?page=catalog&catalog_page=1&id_cat=<?= $filter_category ?>&id_size=<?= $filter_size ?>&orderby=<?= $orderby ?>">1</a>
                                </li>
                                <?php if ($start_page > 2): ?>
                                    <li class="dots"><span>...</span></li>
                                <?php endif; ?>
                            <?php endif; ?>

                            <?php for ($i = $start_page; $i <= $end_page; $i++): ?>
                                <li class="<?= $i == $catalog_page ? 'current' : '' ?>">
                                    <a href="index.php?page=catalog&catalog_page=<?= $i ?>&id_cat=<?= $filter_category ?>&id_size=<?= $filter_size ?>&orderby=<?= $orderby ?>"><?= $i ?></a>
                                </li>
                            <?php endfor; ?>

                            <?php if ($end_page < $total_pages): ?>
                                <?php if ($end_page < $total_pages - 1): ?>
                                    <li class="dots"><span>...</span></li>
                                <?php endif; ?>
                                <li class="<?= $total_pages == $catalog_page ? 'current' : '' ?>">
                                    <a href="index.php?page=catalog&catalog_page=<?= $total_pages ?>&id_cat=<?= $filter_category ?>&id_size=<?= $filter_size ?>&orderby=<?= $orderby ?>"><?= $total_pages ?></a>
                                </li>
                            <?php endif; ?>

                            <?php if ($catalog_page < $total_pages): ?>
                                <li class="next">
                                    <a href="index.php?page=catalog&catalog_page=<?= $catalog_page + 1 ?>&id_cat=<?= $filter_category ?>&id_size=<?= $filter_size ?>&orderby=<?= $orderby ?>">
                                        <i class="ion-chevron-right"></i>
                                    </a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </div>

                    <!--shop gallery end-->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- product page section end -->