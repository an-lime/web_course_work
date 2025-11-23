<?php

require('connect.php');
require('page/header.php');

// получение всех продуктов

$sql_all_products = "SELECT * FROM `Products` p";

$sql_product = $link->query("$sql_all_products");

// перенаправление по адресу

$routers = [
    'main' => 'page/main.php',
    'about' => 'page/about.php',
    'catalog' => 'page/catalog.php',
];

if (!isset($_GET['page'])) {
    require('page/main.php');
} else {
    try {
        require($routers[$_GET['page']]);
    } catch (\Throwable $th) {
        echo "<h1><br>Страница не найдена </h1>";
    }
}

require('page/footer.php');
