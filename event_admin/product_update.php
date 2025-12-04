<?php
require '../connect.php';
session_start();

$id    = (int)$_POST['id_product'];
$name  = mysqli_real_escape_string($link, $_POST['name_product']);
$price = (int)$_POST['price'];
$cat   = (int)$_POST['category'];
$size  = (int)$_POST['size'];
$short = mysqli_real_escape_string($link, $_POST['short_description']);
$desc  = mysqli_real_escape_string($link, $_POST['description']);
$photo = mysqli_real_escape_string($link, $_POST['photo']);

$link->query("
    UPDATE Products
    SET name_product='$name',
        photo='$photo',
        price=$price,
        short_description='$short',
        description='$desc',
        category=$cat,
        size=$size
    WHERE id_product=$id
");

header('Location: ../index.php?page=admin-account&tab=catalog');
exit;
