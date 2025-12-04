<?php
require '../connect.php'; // подключение к БД

$id_user = (int)$_POST['id_user'];

$sql = "DELETE FROM Users WHERE id_user = $id_user";
try {
    $link->query($sql);
} catch (\Throwable $th) {
    echo $th;
}

header('Location: ../index.php?page=admin-account');
