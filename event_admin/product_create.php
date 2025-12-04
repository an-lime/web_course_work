<?php
require '../connect.php';
session_start();

// по-хорошему проверить, что пользователь админ

$name  = mysqli_real_escape_string($link, $_POST['name_product']);
$price = (int)$_POST['price'];
$cat   = (int)$_POST['category'];
$size  = (int)$_POST['size'];
$short = mysqli_real_escape_string($link, $_POST['short_description']);
$desc  = mysqli_real_escape_string($link, $_POST['description']);
$photo = mysqli_real_escape_string($link, $_POST['photo']);

$link->query("
    INSERT INTO Products (name_product, photo, price, short_description, description, category, size)
    VALUES ('$name', '$photo', $price, '$short', '$desc', $cat, $size)
");

header('Location: ../index.php?page=admin-account&tab=catalog');
exit;
