<?php
require('../connect.php');
session_start();

$id_add  = (int)$_GET['id_product_add'];
$id_user = (int)$_SESSION['user']['id_user'];
$qty     = (int)$_GET['qty'];

// проверяем, есть ли уже такой товар в корзине пользователя
$res = $link->query("
    SELECT qty 
    FROM Carts 
    WHERE id_user = $id_user AND id_product = $id_add
");

if ($res && $res->num_rows > 0) {
    // есть — увеличиваем количество
    $row      = $res->fetch_assoc();
    $new_qty  = $row['qty'] + $qty;

    $link->query("
        UPDATE Carts 
        SET qty = $new_qty 
        WHERE id_user = $id_user AND id_product = $id_add
    ");
} else {
    // нет — добавляем новую строку
    $link->query("
        INSERT INTO Carts (id_user, id_product, qty) 
        VALUES ($id_user, $id_add, $qty)
    ");
}

header("Location: ../index.php?page=product&id_product=$id_add");
