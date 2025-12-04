<?php
require '../connect.php';
session_start();

// здесь по-хорошему проверка, что пользователь админ

$id_order = (int)$_POST['id_order'];
$status   = mysqli_real_escape_string($link, $_POST['status']);

$allowed = ['Новый', 'В процессе', 'Выполнен', 'Отменён'];
if (!in_array($status, $allowed, true)) {
    header('Location: ../index.php?page=admin-account&tab=orders');
    exit;
}

$link->query("UPDATE Orders SET status = '$status' WHERE id_order = $id_order");

header('Location: ../index.php?page=admin-account&tab=orders');