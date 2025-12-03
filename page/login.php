<!-- breadcrumbs area start -->
<div class="breadcrumbs_aree breadcrumbs_bg mb-110" data-bgimg="assets/img/others/breadcrumbs-bg.png">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumbs_text">
                    <h1>Login | Register</h1>
                    <ul>
                        <li><a href="index.html">Home </a></li>
                        <li> // Login | Register</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
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
                            <div class="col-sm-4 pt-1 mt-md-0">
                                <div class="forgotton-password_info">
                                    <a href="#"> Забыли пароль?</a>
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