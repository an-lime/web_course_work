<!-- breadcrumbs area start -->
<div class="breadcrumbs_aree breadcrumbs_bg mb-100" data-bgimg="assets/img/others/breadcrumbs-bg.png">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumbs_text">
                    <h1>Single Product</h1>
                    <ul>
                        <li><a href="index.html">Home </a></li>
                        <li> // Default Style</li>
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
                    <div class="product_gallery_inner d-flex">
                        <div class="product_gallery_main_img">
                            <img data-image="assets/img/product/product5.png"
                                src="<?php echo $sql_product_id['photo'] ?>" alt="product-img">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="product_details_sidebar">
                    <h2 class="product__title"><?php echo $sql_product_id['name_product'] ?></h2>
                    <div class="price_box">
                        <span class="current_price"><?php echo $sql_product_id['price'] ?> р.</span>
                    </div>
                    <div class="quickview__info mb-0">
                        <p class="product_review d-flex align-items-center">
                            <span class="review_icon d-flex">
                                <i class="ion-ios-star"></i>
                                <i class="ion-ios-star"></i>
                                <i class="ion-ios-star"></i>
                                <i class="ion-ios-star"></i>
                                <i class="ion-ios-star"></i>
                            </span>
                            <span class="review__text"> (5 отзывов)</span>
                        </p>
                    </div>
                    <p class="product_details_desc"><?php echo $sql_product_id['short_description'] ?></p>
                    <div class="product_pro_button quantity d-flex align-items-center">
                        <div class="pro-qty border">
                            <input type="text" value="1" id="qty-input">
                        </div>
                        
                        <a id="add-to-cart-link" class="add_to_cart " href="event_cart/add_cart.php?id_product_add=<?php echo $sql_product_id['id_product'] ?>">Добавить в корзину</a>
                        <a class="wishlist__btn" href="#"><i class="pe-7s-like"></i></a>
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
                            <a class="active" data-bs-toggle="tab" href="#description"
                                aria-controls="description">Описание</a>
                        </li>
                        <li>
                            <a data-bs-toggle="tab" href="#aditional" aria-controls="aditional">Информация</a>
                        </li>
                        <li>
                            <a data-bs-toggle="tab" href="#reviews" aria-controls="reviews">Отзывы</a>
                        </li>
                    </ul>
                </div>
                <div class="product_page_content_inner tab-content">
                    <div class="tab-pane fade show active" id="description" role="tabpanel">
                        <div class="product_tab_desc">
                            <p><?php echo $sql_product_id['description'] ?></p>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="aditional" role="tabpanel">
                        <div class="product_d_information">
                            <form action="#">
                                <table class="border-top">
                                    <tbody>
                                        <tr>
                                            <td class="first_child">Compositions</td>
                                            <td>Polyester</td>
                                        </tr>
                                        <tr>
                                            <td class="first_child">Styles</td>
                                            <td>Girly</td>
                                        </tr>
                                        <tr>
                                            <td class="first_child">Properties</td>
                                            <td>Short Dress</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </form>
                        </div>
                        <div class="product_info_desc">
                            <p class="mb-0">Fashion has been creating well-designed collections since 2010. The
                                brand offers feminine designs delivering stylish separates and statement dresses
                                which have since evolved into a full ready-to-wear collection in which every
                                item is
                                a vital part of a woman's wardrobe. The result? Cool, easy, chic looks with
                                youthful
                                elegance and unmistakable signature style. All the beautiful pieces are made in
                                Italy and manufactured with the greatest attention. Now Fashion extends to a
                                range
                                of accessories including shoes, hats, belts and more!</p>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="reviews" role="tabpanel">
                        <div class="reviews__wrapper">
                            <h2>Write Your Own Review</h2>
                            <div class="customer__reviews d-flex justify-content-between mb-20">
                                <div class="customer_reviews_left">
                                    <div class="comment__title">
                                        <h2>Add a review </h2>
                                        <p>Your email address will not be published. Required fields are marked
                                        </p>
                                    </div>
                                    <div class="reviews__ratting">
                                        <h3>Your rating</h3>
                                        <ul class="d-flex">
                                            <li><a href="#"><i class="ion-ios-star"></i></a></li>
                                            <li><a href="#"><i class="ion-ios-star"></i></a></li>
                                            <li><a href="#"><i class="ion-ios-star"></i></a></li>
                                            <li><a href="#"><i class="ion-ios-star"></i></a></li>
                                            <li><a href="#"><i class="ion-ios-star"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="customer_reviews_right">
                                    <h2 class="reviews__title">Customer Reviews</h2>
                                    <div class="reviews__ratting">
                                        <ul class="d-flex">
                                            <li><a href="#"><i class="ion-ios-star"></i></a></li>
                                            <li><a href="#"><i class="ion-ios-star"></i></a></li>
                                            <li><a href="#"><i class="ion-ios-star"></i></a></li>
                                            <li><a href="#"><i class="ion-ios-star"></i></a></li>
                                            <li><a href="#"><i class="ion-ios-star"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="reviews__desc">
                                        <h3>Lorem ipsum dolor sit amet</h3>
                                        <span>Deate on July 22, 2020</span>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                            eiusmod
                                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
                                            veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex
                                            ea
                                            commodo consequat.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="product_review_form">
                                <form action="#">
                                    <div class="row">
                                        <div class="col-12">
                                            <label for="review_comment">Your review </label>
                                            <textarea class="border" name="comment" id="review_comment"></textarea>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <label for="author">Name</label>
                                            <input class="border" id="author" type="text">

                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <label for="email">Email </label>
                                            <input class="border" id="email" type="text">
                                        </div>
                                    </div>
                                    <button class="btn custom-btn text-white" data-hover="Submit"
                                        type="submit">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- product tab section end -->

<!-- product section start -->
<div class="product_section mb-80">
    <div class="container">
        <div class="section_title text-center mb-55">
            <h2>Related Products</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod <br> tempor
                incididunt ut
                labore et dolore magna</p>
        </div>
        <div class="row product_slick slick_navigation slick__activation" data-slick='{
                "slidesToShow": 4,
                "slidesToScroll": 1,
                "arrows": true,
                "dots": false,
                "autoplay": false,
                "speed": 300,
                "infinite": true ,  
                "responsive":[ 
                  {"breakpoint":992, "settings": { "slidesToShow": 3 } }, 
                  {"breakpoint":768, "settings": { "slidesToShow": 2 } }, 
                  {"breakpoint":500, "settings": { "slidesToShow": 1 } }  
                 ]                                                     
            }'>
            <div class="col-lg-3">
                <article class="single_product">
                    <figure>
                        <div class="product_thumb">
                            <a href="single-product.html"><img src="assets/img/product/product1.png" alt=""></a>
                            <div class="action_links">
                                <ul class="d-flex justify-content-center">
                                    <li class="add_to_cart"><a href="cart.html" title="Add to cart"> <span
                                                class="pe-7s-shopbag"></span></a></li>
                                    <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><span
                                                class="pe-7s-like"></span></a></li>
                                    <li class="quick_button"><a href="#" title="Quick View" data-bs-toggle="modal"
                                            data-bs-target="#modal_box"> <span class="pe-7s-look"></span></a></li>
                                </ul>
                            </div>
                        </div>
                        <figcaption class="product_content text-center">
                            <h4><a href="single-product.html">Products Name Here</a></h4>
                            <div class="price_box">
                                <span class="current_price">$22.00</span>
                            </div>
                        </figcaption>
                    </figure>
                </article>
            </div>
            <div class="col-lg-3">
                <article class="single_product">
                    <figure>
                        <div class="product_thumb">
                            <a href="single-product.html"><img src="assets/img/product/product2.png" alt=""></a>
                            <div class="action_links">
                                <ul class="d-flex justify-content-center">
                                    <li class="add_to_cart"><a href="cart.html" title="Add to cart"> <span
                                                class="pe-7s-shopbag"></span></a></li>
                                    <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><span
                                                class="pe-7s-like"></span></a></li>
                                    <li class="quick_button"><a href="#" title="Quick View" data-bs-toggle="modal"
                                            data-bs-target="#modal_box"> <span class="pe-7s-look"></span></a></li>
                                </ul>
                            </div>
                        </div>
                        <figcaption class="product_content text-center">
                            <h4><a href="single-product.html">Lorem, ipsum dolor.</a></h4>
                            <div class="price_box">
                                <span class="current_price">$24.00</span>
                            </div>
                        </figcaption>
                    </figure>
                </article>
            </div>
            <div class="col-lg-3">
                <article class="single_product">
                    <figure>
                        <div class="product_thumb">
                            <a href="single-product.html"><img src="assets/img/product/product3.png" alt=""></a>
                            <div class="action_links">
                                <ul class="d-flex justify-content-center">
                                    <li class="add_to_cart"><a href="cart.html" title="Add to cart"> <span
                                                class="pe-7s-shopbag"></span></a></li>
                                    <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><span
                                                class="pe-7s-like"></span></a></li>
                                    <li class="quick_button"><a href="#" title="Quick View" data-bs-toggle="modal"
                                            data-bs-target="#modal_box"> <span class="pe-7s-look"></span></a></li>
                                </ul>
                            </div>
                        </div>
                        <figcaption class="product_content text-center">
                            <h4><a href="single-product.html">Praesentium vero nesciu.</a></h4>
                            <div class="price_box">
                                <span class="current_price">$28.00</span>
                            </div>
                        </figcaption>
                    </figure>
                </article>
            </div>
            <div class="col-lg-3">
                <article class="single_product">
                    <figure>
                        <div class="product_thumb">
                            <a href="single-product.html"><img src="assets/img/product/product4.png" alt=""></a>
                            <div class="action_links">
                                <ul class="d-flex justify-content-center">
                                    <li class="add_to_cart"><a href="cart.html" title="Add to cart"> <span
                                                class="pe-7s-shopbag"></span></a></li>
                                    <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><span
                                                class="pe-7s-like"></span></a></li>
                                    <li class="quick_button"><a href="#" title="Quick View" data-bs-toggle="modal"
                                            data-bs-target="#modal_box"> <span class="pe-7s-look"></span></a></li>
                                </ul>
                            </div>
                        </div>
                        <figcaption class="product_content text-center">
                            <h4><a href="single-product.html">Sit amet consectetur elit.</a></h4>
                            <div class="price_box">
                                <span class="current_price">$32.00</span>
                            </div>
                        </figcaption>
                    </figure>
                </article>
            </div>
            <div class="col-lg-3">
                <article class="single_product">
                    <figure>
                        <div class="product_thumb">
                            <a href="single-product.html"><img src="assets/img/product/product5.png" alt=""></a>
                            <div class="action_links">
                                <ul class="d-flex justify-content-center">
                                    <li class="add_to_cart"><a href="cart.html" title="Add to cart"> <span
                                                class="pe-7s-shopbag"></span></a></li>
                                    <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><span
                                                class="pe-7s-like"></span></a></li>
                                    <li class="quick_button"><a href="#" title="Quick View" data-bs-toggle="modal"
                                            data-bs-target="#modal_box"> <span class="pe-7s-look"></span></a></li>
                                </ul>
                            </div>
                        </div>
                        <figcaption class="product_content text-center">
                            <h4><a href="single-product.html">Atque earum ullam non.</a></h4>
                            <div class="price_box">
                                <span class="current_price">$35.00</span>
                            </div>
                        </figcaption>
                    </figure>
                </article>
            </div>
            <div class="col-lg-3">
                <article class="single_product">
                    <figure>
                        <div class="product_thumb">
                            <a href="single-product.html"><img src="assets/img/product/product6.png" alt=""></a>
                            <div class="action_links">
                                <ul class="d-flex justify-content-center">
                                    <li class="add_to_cart"><a href="cart.html" title="Add to cart"> <span
                                                class="pe-7s-shopbag"></span></a></li>
                                    <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><span
                                                class="pe-7s-like"></span></a></li>
                                    <li class="quick_button"><a href="#" title="Quick View" data-bs-toggle="modal"
                                            data-bs-target="#modal_box"> <span class="pe-7s-look"></span></a></li>
                                </ul>
                            </div>
                        </div>
                        <figcaption class="product_content text-center">
                            <h4><a href="single-product.html">Modi excepturi ut ipsam.</a></h4>
                            <div class="price_box">
                                <span class="current_price">$38.00</span>
                            </div>
                        </figcaption>
                    </figure>
                </article>
            </div>
            <div class="col-lg-3">
                <article class="single_product">
                    <figure>
                        <div class="product_thumb">
                            <a href="single-product.html"><img src="assets/img/product/product7.png" alt=""></a>
                            <div class="action_links">
                                <ul class="d-flex justify-content-center">
                                    <li class="add_to_cart"><a href="cart.html" title="Add to cart"> <span
                                                class="pe-7s-shopbag"></span></a></li>
                                    <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><span
                                                class="pe-7s-like"></span></a></li>
                                    <li class="quick_button"><a href="#" title="Quick View" data-bs-toggle="modal"
                                            data-bs-target="#modal_box"> <span class="pe-7s-look"></span></a></li>
                                </ul>
                            </div>
                        </div>
                        <figcaption class="product_content text-center">
                            <h4><a href="single-product.html">Provident odio, are Unde.</a></h4>
                            <div class="price_box">
                                <span class="current_price">$28.00</span>
                            </div>
                        </figcaption>
                    </figure>
                </article>
            </div>
            <div class="col-lg-3">
                <article class="single_product">
                    <figure>
                        <div class="product_thumb">
                            <a href="single-product.html"><img src="assets/img/product/product1.png" alt=""></a>
                            <div class="action_links">
                                <ul class="d-flex justify-content-center">
                                    <li class="add_to_cart"><a href="cart.html" title="Add to cart"> <span
                                                class="pe-7s-shopbag"></span></a></li>
                                    <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><span
                                                class="pe-7s-like"></span></a></li>
                                    <li class="quick_button"><a href="#" title="Quick View" data-bs-toggle="modal"
                                            data-bs-target="#modal_box"> <span class="pe-7s-look"></span></a></li>
                                </ul>
                            </div>
                        </div>
                        <figcaption class="product_content text-center">
                            <h4><a href="single-product.html">Products Name Here</a></h4>
                            <div class="price_box">
                                <span class="current_price">$22.00</span>
                            </div>
                        </figcaption>
                    </figure>
                </article>
            </div>
        </div>
    </div>
</div>
<!-- product section end -->

<!-- modal area start-->
<div class="modal fade" id="modal_box" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true"><i class="ion-android-close"></i></span>
            </button>
            <div class="modal_body">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5 col-md-5 col-sm-12">
                            <div class="modal_tab">
                                <div class="tab-content product-details-large">
                                    <div class="tab-pane fade show active" id="tab1" role="tabpanel">
                                        <div class="modal_tab_img">
                                            <a href="#"><img src="assets/img/product/product1.png" alt=""></a>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="tab2" role="tabpanel">
                                        <div class="modal_tab_img">
                                            <a href="single-product.html"><img src="assets/img/product/product2.png"
                                                    alt=""></a>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="tab3" role="tabpanel">
                                        <div class="modal_tab_img">
                                            <a href="#"><img src="assets/img/product/product3.png" alt=""></a>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="tab4" role="tabpanel">
                                        <div class="modal_tab_img">
                                            <a href="#"><img src="assets/img/product/product4.png" alt=""></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal_tab_button">
                                    <ul class="nav product_navactive owl-carousel" role="tablist">
                                        <li>
                                            <a class="nav-link active" data-toggle="tab" href="#tab1" role="tab"
                                                aria-controls="tab1" aria-selected="false"><img
                                                    src="assets/img/product/mini-product/product1.png" alt=""></a>
                                        </li>
                                        <li>
                                            <a class="nav-link" data-toggle="tab" href="#tab2" role="tab"
                                                aria-controls="tab2" aria-selected="false"><img
                                                    src="assets/img/product/mini-product/product2.png" alt=""></a>
                                        </li>
                                        <li>
                                            <a class="nav-link button_three" data-toggle="tab" href="#tab3"
                                                role="tab" aria-controls="tab3" aria-selected="false"><img
                                                    src="assets/img/product/mini-product/product3.png" alt=""></a>
                                        </li>
                                        <li>
                                            <a class="nav-link" data-toggle="tab" href="#tab4" role="tab"
                                                aria-controls="tab4" aria-selected="false"><img
                                                    src="assets/img/product/mini-product/product4.png" alt=""></a>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-7 col-sm-12">
                            <div class="modal_right">
                                <div class="modal_title mb-10">
                                    <h2>Donec Ac Tempus</h2>
                                </div>
                                <div class="modal_price mb-10">
                                    <span class="new_price">$64.99</span>
                                    <span class="old_price">$78.99</span>
                                </div>
                                <div class="modal_description mb-15">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia
                                        iste
                                        laborum ad impedit pariatur esse optio tempora sint ullam autem
                                        deleniti nam
                                        in quos qui nemo ipsum numquam, reiciendis maiores quidem aperiam,
                                        rerum vel
                                        recusandae </p>
                                </div>
                                <div class="variants_selects">
                                    <div class="variants_size">
                                        <h2>size</h2>
                                        <select class="select_option">
                                            <option selected value="1">s</option>
                                            <option value="1">m</option>
                                            <option value="1">l</option>
                                            <option value="1">xl</option>
                                            <option value="1">xxl</option>
                                        </select>
                                    </div>
                                    <div class="variants_color">
                                        <h2>color</h2>
                                        <select class="select_option">
                                            <option selected value="1">purple</option>
                                            <option value="1">violet</option>
                                            <option value="1">black</option>
                                            <option value="1">pink</option>
                                            <option value="1">orange</option>
                                        </select>
                                    </div>
                                    <div class="modal_add_to_cart">
                                        <form action="#">
                                            <input min="1" max="100" step="1" value="1" type="number">
                                            <button type="submit">add to cart</button>
                                        </form>
                                    </div>
                                </div>
                                <div class="modal_social">
                                    <h2>Share this product</h2>
                                    <ul>
                                        <li class="facebook"><a href="#"><i class="ion-social-facebook"></i></a>
                                        </li>
                                        <li class="twitter"><a href="#"><i class="ion-social-twitter"></i></a></li>
                                        <li class="pinterest"><a href="#"><i class="ion-social-pinterest"></i></a>
                                        </li>
                                        <li class="google-plus"><a href="#"><i
                                                    class="ion-social-googleplus"></i></a>
                                        </li>
                                        <li class="linkedin"><a href="#"><i class="ion-social-linkedin"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const qtyInput = document.getElementById('qty-input');
        const addLink = document.getElementById('add-to-cart-link');

        if (!qtyInput || !addLink) return;

        addLink.addEventListener('click', function(e) {


            let qty = parseInt(qtyInput.value, 10);
            if (isNaN(qty) || qty < 1) qty = 1;

            const url = new URL(addLink.href, window.location.origin);
            url.searchParams.append('qty', qty);

            addLink.href = url.toString();
        });
    });
</script>

<!-- modal area end-->