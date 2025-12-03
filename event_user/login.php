<?php
session_start();

$email = $_POST['email'];
$password_hash = md5($_POST['password']);

require('../connect.php');
$sql_user_login = $link->query("SELECT * FROM `Users` WHERE `email` = '$email' and `password` = '$password_hash'");

if (mysqli_num_rows($sql_user_login) > 0) {
    $sql_user = mysqli_fetch_assoc($sql_user_login);

    $_SESSION['user'] = [
        'id_user' => $sql_user['id_user'],
        'name' => $sql_user['name'],
        'surname' => $sql_user['surname'],
        'email' => $sql_user['email'],
        'is_admin' => $sql_user['is_admin']
    ];

    header("Location:../index.php?page=main");
} else {
    $_SESSION['error_login']  = 'Введён неверный логин или пароль';
    header("Location:../index.php?page=login");
}
