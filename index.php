<?php

require('connect.php');
require('page/header.php');

// получение всех категорий и размеров продуктов

$sql_size = $link->query("SELECT s.id_size, s.name_size, COUNT(p.id_product) as amount 
FROM Sizes as s, Products as p 
WHERE p.size = s.id_size 
GROUP BY s.id_size");

$all_product_for_filter = $link->query("SELECT COUNT(*) as all_qty FROM Products");

$sql_categori = $link->query("SELECT c.id_category, c.name_category, COUNT(p.id_product) as amount 
FROM Categories as c, Products as p 
WHERE p.category = c.id_category 
GROUP BY c.id_category;");

// получение всех продуктов с пагинацией

$catalog_page = isset($_GET['catalog_page']) ? (int)$_GET['catalog_page'] : 1;
if ($catalog_page < 1) $catalog_page = 1;

// Количество товаров на странице
$per_page = 5;

$offset = ($catalog_page - 1) * $per_page;

$count_result = $link->query("SELECT COUNT(*) as total FROM `Products`");
$total_products = $count_result->fetch_assoc()['total'];
$total_pages = ceil($total_products / $per_page);

// фильтрация

$filter_category = isset($_GET['id_cat']) ? $_GET['id_cat'] : '0';
$filter_size = isset($_GET['id_size']) ? $_GET['id_size'] : '0';
$where = [];
if ($filter_category > 0) $where[] = "p.category={$filter_category} ";
if ($filter_brand > 0) $where[] = "p.size = {$filter_brand}";

$where_condition = $where ? 'where' . implode(' and ', $where) : '';

// сортировка

$sort = isset($_GET['id_sort']) ? $_GET['id_sort'] : '0';
$orderByMap = [
    '0' => 'p.id_product ASC',
    '1' => 'p.price ASC',
    '2' => 'p.price DESC',
    '3' => 'p.name_product ASC',
    '4' => 'p.name_product DESC'
];

$orderBy = isset($orderByMap[$sort]) ? $orderByMap[$sort] : $orderByMap['0'];

// Получаем товары для текущей страницы
$sql_all_products = "SELECT *, (SELECT COUNT(*) FROM `Products` p $where_condition) as filtered_count 
FROM `Products` p 
$where_condition
ORDER BY $orderBy
LIMIT $per_page OFFSET $offset";

$sql_product = $link->query($sql_all_products);

// Проверяем, что страница существует
if ($catalog_page > $total_pages && $total_pages > 0) {
    header("Location: ?page=catalog&catalog_page=" . $total_pages);
    exit;
}

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
        require('page/404.php');
    }
}

require('page/footer.php');
