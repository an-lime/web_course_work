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
            <div class="col-lg-6 pt-5 pt-lg-0">
                <form action="event_user/signup.php" method="POST">
                    <div class="login-form">
                        <h4 class="login-title">Регистрация</h4>
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <label>Имя</label>
                                <?php echo $name ?>
                                <input value="<?php isset($name) ? $name : '' ?>" name="name" type="text" placeholder="Имя" required>
                            </div>
                            <div class="col-md-6 col-12">
                                <label>Фамилия</label>
                                <input name="surname" type="text" placeholder="Фамилия" required>
                            </div>
                            <div class="col-md-12">
                                <label>Электронная почта</label>
                                <input name="email" type="email" placeholder="Почта" required>
                            </div>

                            <?php
                            if (isset($_SESSION['error_email'])):
                            ?>
                                <div class="mb-2 font-18 font-heading fw-600 text-danger">
                                    <?php echo $_SESSION['error_email'];
                                    unset($_SESSION['error_email']); ?>
                                </div>

                            <?php endif ?>

                            <div class="col-md-6">
                                <label>Пароль</label>
                                <input name="password1" type="password" placeholder="Пароль" required>
                            </div>
                            <div class="col-md-6">
                                <label>Повторите пароль</label>
                                <input name="password2" type="password" placeholder="Пароль" required>
                            </div>

                            <?php
                            if (isset($_SESSION['error_password'])):
                            ?>
                                <div class="mb-2 font-18 font-heading fw-600 text-danger">
                                    <?php echo $_SESSION['error_password'];
                                    unset($_SESSION['error_password']); ?>
                                </div>

                            <?php endif ?>

                            <?php
                            if (isset($_SESSION['register_success'])):
                            ?>
                                <div class="mb-2 font-18 font-heading fw-600 text-success">
                                    <?php echo $_SESSION['register_success'];

                                    unset($_SESSION['register_success']); ?>
                                </div>

                            <?php endif ?>

                            <div id="login-btn" class="col-12">
                                <button type="submit" id="register-form-btn" class="btn custom-btn md-size">Зарегистрироваться</button>
                            </div>

                            <div class="col-sm-12 mb-0">
                                <div class="have-account">
                                    <p class="text font-14">Есть аккаунт? <a class="link text-main text-decoration-underline  fw-500" href="index.php?page=login">Войти</a></p>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>