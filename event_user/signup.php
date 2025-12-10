<?php
session_start();

// получение данных из формы
$name = $_POST['name'];
$surname = $_POST['surname'];
$email = $_POST['email'];
$password1 = $_POST['password1'];
$password2 = $_POST['password2'];

// Работа с базой
require('../connect.php');
$sql_current_user = $link->query("SELECT * FROM `Users` WHERE `email` = '$email'");

// валидация данных
if (mysqli_num_rows($sql_current_user) > 0) {
    $_SESSION['error_email'] = 'Такой email уже используется';
} elseif (strlen($password1) < 6) {
    $_SESSION['error_password'] = 'Длина пароля должна быть не менее 6 символов';
} elseif ($password1 !== $password2) {
    $_SESSION['error_password'] = 'Пароли не совпадают';
} else {
    $_SESSION['register_success'] = 'Регистрация прошла успешно';

    $password_hash = md5($password1);
    mysqli_query($link, "INSERT INTO `Users` (`name`, `surname`, `email`, `password`) VALUES ('$name', '$surname', '$email', '$password_hash')");
}

header("Location: ../index.php?page=register");
