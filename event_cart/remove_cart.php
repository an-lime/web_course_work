<?php

require "../connect.php";
session_start();

$id_del = (int)$_GET['id_product_del'];
$id_user = (int)$_SESSION['user']['id_user'];

$link->query("DELETE FROM Carts 
WHERE id_user = $id_user AND id_product = $id_del ");

header("Location: ../index.php?page=cart");
