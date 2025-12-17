<?php
require '../connect.php';
session_start();

$id_order = (int)$_POST['id_order'];
$status   = $_POST['status'];

// обновление статуса
$link->query("UPDATE Orders SET status = '$status' WHERE id_order = $id_order");

// редирект обратно на вкладку заказов
header('Location: ../index.php?page=admin-account&tab=orders');
exit;
