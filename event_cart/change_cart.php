<?php

session_start();

$id_plus = $_GET['id_plus'];
$id_minus = $_GET['id_minus'];

if (isset($id_plus)) {
    $_SESSION['cart'][$id_plus]['qty'] += 1;
} elseif (isset($id_minus) && $_SESSION['cart'][$id_minus]['qty'] > 1) {
    $_SESSION['cart'][$id_minus]['qty'] -= 1;
}

header("Location: ../index.php?page=cart");
