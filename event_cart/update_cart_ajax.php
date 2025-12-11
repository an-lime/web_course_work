<?php
session_start();
require '../connect.php';

header('Content-Type: application/json');

if (!isset($_SESSION['user']['id_user'])) {
    echo json_encode(['success' => false, 'error' => 'Не авторизован']);
    exit;
}

$id_user = (int)$_SESSION['user']['id_user'];
$id_product = isset($_POST['id_product']) ? (int)$_POST['id_product'] : 0;
$qty = isset($_POST['qty']) ? (int)$_POST['qty'] : 1;

if ($qty < 1) $qty = 1;

if ($id_product > 0) {
    $result = $link->query("
        UPDATE Carts 
        SET qty = $qty 
        WHERE id_user = $id_user AND id_product = $id_product
    ");

    if ($result) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'error' => 'Ошибка БД']);
    }
} else {
    echo json_encode(['success' => false, 'error' => 'Неверный ID товара']);
}

header("Location: ../index.php?page=cart");