<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Bucker</title>
    <meta name="description"
        content="240+ Best Bootstrap Templates are available on this website. Find your template for your project compatible with the most popular HTML library in the world." />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <link rel="canonical" href="Replace_with_your_PAGE_URL" />

    <!-- Open Graph (OG) meta tags are snippets of code that control how URLs are displayed when shared on social media  -->
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="Bucker –  Bakery Shop Bootstrap 5 Template" />
    <meta property="og:url" content="PAGE_URL" />
    <meta property="og:site_name" content="Bucker –  Bakery Shop Bootstrap 5 Template" />
    <!-- For the og:image content, replace the # with a link of an image -->
    <meta property="og:image" content="#" />
    <meta property="og:description" content="Bucker –  Bakery Shop Bootstrap 5 Template" />

    <!-- Add site Favicon -->
    <link rel="icon" href="https://hasthemes.com/wp-content/uploads/2019/04/cropped-favicon-32x32.png" sizes="32x32" />
    <link rel="icon" href="https://hasthemes.com/wp-content/uploads/2019/04/cropped-favicon-192x192.png"
        sizes="192x192" />
    <link rel="apple-touch-icon" href="https://hasthemes.com/wp-content/uploads/2019/04/cropped-favicon-180x180.png" />
    <meta name="msapplication-TileImage"
        content="https://hasthemes.com/wp-content/uploads/2019/04/cropped-favicon-270x270.png" />

    <!-- CSS 
    ========================= -->
    <link rel="stylesheet" href="assets/css/vendor/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/slick.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/pe-icon-7-stroke.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet" href="assets/css/nice-select.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/jquery-ui.min.css">
    <!-- Main Style CSS -->
    <link rel="stylesheet" href="assets/css/style.css">

    <!--modernizr min js here-->
    <script src="assets/js/vendor/modernizr-3.11.2.min.js"></script>


    <!-- Structured Data  -->
    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "WebSite",
            "name": "Replace_with_your_site_title",
            "url": "Replace_with_your_site_URL"
        }
    </script>
</head>

<body>

    <!--offcanvas menu area start-->
    <div class="body_overlay">

    </div>
    <div class="offcanvas_menu">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="offcanvas_menu_wrapper">
                        <div class="canvas_close">
                            <a href="javascript:void(0)"><i class="ion-android-close"></i></a>
                        </div>
                        <div class="welcome_text text-center">
                            <p>Добро пожаловать в магазин Bucker</p>
                        </div>
                        <div id="menu" class="text-left ">
                            <ul class="offcanvas_main_menu">
                                <li><a href="index.php?page=main">Главная</a></li>
                                <li><a href="index.php?page=about">О нас</a></li>
                                <li><a href="index.php?page=faq">FAQ</a></li>
                                <li><a href="index.php?page=catalog">Каталог</a></li>
                                <li><a href="index.php?page=contact">Связь с нами</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--offcanvas menu area end-->

    <!--header area start-->
    <header class="header_section">
        <div class="header_top">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="header_top_inner d-flex justify-content-between">
                            <div class="welcome_text">
                                <p>Абсолютно бесплатный возврат и бесплатная доставка</p>
                            </div>
                            <div class="header_top_sidebar d-flex align-items-center">
                                <ul class="d-flex">
                                    <li><i class="icofont-phone"></i> <a href="tel:+00123456789">+00 123 456 789</a>
                                    </li>
                                    <li><i class="icofont-envelope"></i> <a
                                            href="mailto:demo@example.com">demo@example.com</a></li>
                                    <?php if (!$_SESSION['user']): ?>
                                        <li><a href="index.php?page=login">Вход</a></li>
                                        <li><a href="index.php?page=register">Регистрация</a></li>
                                    <?php else: ?>
                                        <?php if ($_SESSION['user']['is_admin'] == 0): ?>
                                            <li><a href="index.php?page=my-account"><?php echo $_SESSION['user']['name'] . ' ' . $_SESSION['user']['surname'] ?></a></li>
                                        <?php else: ?>
                                            <li><a href="index.php?page=admin-account"><?php echo $_SESSION['user']['name'] . ' ' . $_SESSION['user']['surname'] ?></a></li>
                                        <?php endif ?>
                                    <?php endif ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="main_header d-flex justify-content-between align-items-center">
                        <div class="header_logo">
                            <a class="sticky_none" href="index.php?page=main"><img src="assets/img/logo/logo.png" alt=""></a>
                        </div>
                        <!--main menu start-->
                        <div class="main_menu d-none d-lg-block">
                            <nav>
                                <ul class="d-flex">
                                    <li><a href="index.php?page=main">Главная</a></li>
                                    <li><a href="index.php?page=about">О нас</a></li>
                                    <li><a href="index.php?page=faq">FAQ</a></li>
                                    <li><a href="index.php?page=catalog">Каталог</a></li>
                                    <li><a href="index.php?page=contact">Связь с нами</a></li>
                                </ul>
                            </nav>
                        </div>
                        <!--main menu end-->
                        <div class="header_account">
                            <ul class="d-flex">
                                <li class="shopping_cart"><a href="javascript:void(0)"><i class="pe-7s-shopbag"></i></a>
                                    <span class="item_count">
                                        <?php echo (int)$sql_product_in_cart->num_rows; ?>
                                    </span>
                                </li>
                            </ul>
                            <div class="canvas_open">
                                <a href="javascript:void(0)"><i class="ion-navicon"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!--mini cart-->
    <div class="mini_cart">
        <div class="cart_gallery">
            <div class="cart_close">
                <div class="cart_text">
                    <h3>Корзина</h3>
                </div>
                <div class="mini_cart_close">
                    <a href="javascript:void(0)"><i class="ion-android-close"></i></a>
                </div>
            </div>

            <?php foreach ($sql_product_in_cart as $product_in_cart): ?>

                <div class="cart_item">
                    <div class="cart_img">
                        <a href="index.php?page=product&id_product=<?php echo $product_in_cart['id_product'] ?>"><img src="<?php echo $product_in_cart['photo'] ?>" alt=""></a>
                    </div>
                    <div class="cart_info">
                        <a href="index.php?page=product&id_product=<?php echo $product_in_cart['id_product'] ?>"><?php echo $product_in_cart['name_product'] ?></a>
                        <p><?php echo $product_in_cart['qty'] ?> x <span> <?php echo $product_in_cart['price'] ?> р. </span></p>
                    </div>
                    <div class="cart_remove">
                        <a href="event_cart/remove_cart.php?id_product_del=<?php echo $product_in_cart['id_product'] ?>"><i class="ion-android-close"></i></a>
                    </div>
                </div>

            <?php endforeach ?>

        </div>
        <div class="mini_cart_table">
            <div class="cart_table_border">
                <div class="cart_total">
                    <span>Всего:</span>
                    <span class="price"> <?php echo $total_price; ?> р. </span>
                </div>
            </div>
        </div>
        <div class="mini_cart_footer">
            <div class="cart_button">
                <a href="index.php?page=cart">Открыть корзину</a>
            </div>
            <?php if (isset($_SESSION['user']) and strlen($product_in_cart) > 0) : ?>
                <div class="cart_button">
                    <a href="index.php?page=checkout"><i class="fa fa-sign-in"></i>Перейти к оформлению</a>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <!--mini cart end-->

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