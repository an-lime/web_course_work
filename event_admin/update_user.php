<?php
require '../connect.php';

$id_user  = (int)$_POST['id_user'];
$email    = mysqli_real_escape_string($link, $_POST['email']);
$name     = mysqli_real_escape_string($link, $_POST['name']);
$surname  = mysqli_real_escape_string($link, $_POST['surname']);
$is_admin = (int)$_POST['is_admin'];

if (!empty($_POST['password'])) {
    $password_hash = md5($_POST['password']);
    $sql = "UPDATE Users 
            SET email='$email', name='$name', surname='$surname',
                password='$password_hash', is_admin=$is_admin
            WHERE id_user=$id_user";
} else {
    $sql = "UPDATE Users 
            SET email='$email', name='$name', surname='$surname',
                is_admin=$is_admin
            WHERE id_user=$id_user";
}

$link->query($sql);
header('Location: ../index.php?page=admin-account&tab=users');
