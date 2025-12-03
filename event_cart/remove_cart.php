<?php

session_start();

$id_del=$_GET['id_prod_del'];
unset($_SESSION['cart'][$id_del]);

header("Location:../index.php?page=cart");