<?php
require '../connect.php';
session_start();

$id = (int)$_POST['id_product'];

try {
    $link->query("DELETE FROM Products WHERE id_product = $id");

} catch (\Throwable $th) {
    echo $th;
}

header('Location: ../index.php?page=admin-account&tab=catalog');
exit;
