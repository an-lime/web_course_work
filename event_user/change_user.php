<?php
session_start();

$name = $_POST['name'];
$surname = $_POST['surname'];
$email = $_POST['email'];
$password1 = $_POST['password1'] ?? null;
$password2 = $_POST['password2'] ?? null;

require('../connect.php');

$sql_current_user = $link->query("SELECT * FROM `Users` WHERE `email` = '$email'");

if (mysqli_num_rows($sql_current_user) > 0 && $email != $_SESSION['user']['email']) {
    $_SESSION['error_email'] = 'Такой email уже используется';
} else {
    
    $sql_str = "UPDATE `Users` SET `name` = '$name', `surname` = '$surname', `email` = '$email'";

    if (!empty($password1)) {
        if ($password1 !== $password2) {
            $_SESSION['error_password'] = 'Пароли не совпадают';
            header("Location: ../index.php?page=my-account");
            exit;
        } else {
            $password_hash = md5($password1);
            $sql_str .= ", `password` = '$password_hash'";
        }
    }
    
    $id_user = (int)$_SESSION['user']['id_user'];
    $sql_str .= " WHERE `id_user` = $id_user";

    try {
        mysqli_query($link, $sql_str);
        $_SESSION['change_success'] = 'Данные успешно изменены';
        
        $_SESSION['user']['name'] = $name;
        $_SESSION['user']['surname'] = $surname;
        $_SESSION['user']['email'] = $email;
        
    } catch (\Throwable $th) {
        $_SESSION['error'] = 'Ошибка при обновлении данных';
    }
}

header("Location: ../index.php?page=my-account");