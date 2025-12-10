<!-- breadcrumbs area start -->
<div class="breadcrumbs_aree breadcrumbs_bg mb-110" data-bgimg="assets/img/bg/testimonial-bg.png"></div>
<!-- breadcrumbs area end -->
<div class="login-register-area">
    <div class="container">
        <div id="login-row" class="row">
            <div class="col-lg-6">
                <form action="event_user/login.php" method="POST">
                    <div class="login-form">
                        <h4 class="login-title">Авторизация</h4>
                        <div class="row">
                            <div class="col-lg-12">
                                <label>Электронная почта</label>
                                <input name="email" type="email" placeholder="Почта" required>
                            </div>
                            <div class="col-lg-12">
                                <label>Пароль</label>
                                <input name="password" type="password" placeholder="Пароль" required>
                            </div>
                            <div class="col-sm-12 mb-0">
                                <div class="have-account">
                                    <p class="text font-14">Нет аккаунта? <a class="link text-main text-decoration-underline  fw-500" href="index.php?page=register">Зарегистрироваться</a></p>
                                </div>
                            </div>

                            <?php
                            if (isset($_SESSION['error_login'])):
                            ?>
                                <div class="mb-2 font-18 font-heading fw-600 text-danger">
                                    <?php echo $_SESSION['error_login'];
                                    unset($_SESSION['error_login']);
                                    ?>
                                </div>

                            <?php endif ?>

                            <?php
                            if (isset($_SESSION['error_order'])):
                            ?>
                                <div class="mb-2 font-18 font-heading fw-600 text-danger">
                                    <?php echo $_SESSION['error_order'];
                                    unset($_SESSION['error_order']); ?>
                                </div>

                            <?php endif ?>

                            <div id="login-btn" class="col-lg-12 pt-5">
                                <button type="submit" class="btn custom-btn md-size">Войти</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>