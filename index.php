<?php

session_start();

require 'connect.php';

// Для количества товаров корзины в хедере
$id_user = (int)$_SESSION['user']['id_user'];

$sql_product_in_cart = $link->query(" SELECT p.*, c.qty, cat.name_category, s.name_size 
FROM Carts c 
JOIN Products p ON c.id_product = p.id_product, Categories cat, Sizes s
WHERE c.id_user = $id_user AND cat.id_category = p.category AND s.id_size = p.size
");

$total_price = 0;
foreach ($sql_product_in_cart as $product_in_cart) {
    $total_price += $product_in_cart['price'] * $product_in_cart['qty'];
}

// и теперь подключаем header.php

require 'page/header.php';

$catalog_page = isset($_GET['catalog_page']) ? (int)$_GET['catalog_page'] : 1;
if ($catalog_page < 1) $catalog_page = 1;
$per_page = 5;
$offset = ($catalog_page - 1) * $per_page;

$filter_category = isset($_GET['id_cat']) ? (int)$_GET['id_cat'] : 0;
$filter_size = isset($_GET['id_size']) ? (int)$_GET['id_size'] : 0;
$orderby = isset($_GET['orderby']) ? $_GET['orderby'] : '1';

$whereMain = [];
if ($filter_category != 0) $whereMain[] = "p.category = $filter_category";
if ($filter_size != 0)     $whereMain[] = "p.size = $filter_size";
$where_condition     = !empty($whereMain) ? 'WHERE ' . implode(' AND ', $whereMain) : '';

$whereMainP2 = [];
if ($filter_category != 0) $whereMainP2[] = "p2.category = $filter_category";
if ($filter_size != 0)     $whereMainP2[] = "p2.size = $filter_size";
$where_conditionP2   = !empty($whereMainP2) ? 'WHERE ' . implode(' AND ', $whereMainP2) : '';


$sql_size_static = $link->query("
    SELECT s.id_size, s.name_size, COUNT(DISTINCT p.id_product) AS amount
    FROM Sizes s
    LEFT JOIN Products p ON p.size = s.id_size
    GROUP BY s.id_size
    ORDER BY s.name_size
");

$sql_categori_static = $link->query("
    SELECT c.id_category, c.name_category, COUNT(DISTINCT p.id_product) AS amount
    FROM Categories c
    LEFT JOIN Products p ON p.category = c.id_category
    GROUP BY c.id_category
    ORDER BY c.name_category
");

if ($filter_category != 0) {
    $sql_size = $link->query("
        SELECT s.id_size, s.name_size, COUNT(DISTINCT p.id_product) AS amount
        FROM Sizes s
        LEFT JOIN Products p ON p.size = s.id_size
        WHERE p.category = $filter_category
        GROUP BY s.id_size
        ORDER BY s.name_size
    ");
} else {
    $sql_size = $sql_size_static;
}

if ($filter_size != 0) {
    $sql_categori = $link->query("
        SELECT c.id_category, c.name_category, COUNT(DISTINCT p.id_product) AS amount
        FROM Categories c
        LEFT JOIN Products p ON p.category = c.id_category
        WHERE p.size = $filter_size
        GROUP BY c.id_category
        ORDER BY c.name_category
    ");
} else {
    $sql_categori = $sql_categori_static;
}

$all_product_for_filter = $link->query("SELECT COUNT(DISTINCT p.id_product) AS all_qty FROM Products p $where_condition");
$all_product_for_filter = $all_product_for_filter->fetch_assoc();

// SQL условия для основного запроса
$where = [];
if ($filter_category != 0) $where[] = "p.category = $filter_category";
if ($filter_size != 0) $where[] = "p.size = $filter_size";
$where_condition = !empty($where) ? 'WHERE ' . implode(' AND ', $where) : '';

$whereP2 = [];
if ($filter_category != 0) $whereP2[] = "p2.category = $filter_category";
if ($filter_size != 0) $whereP2[] = "p2.size = $filter_size";
$where_conditionP2 = !empty($whereP2) ? 'WHERE ' . implode(' AND ', $whereP2) : '';

// Сортировка
$orderByMap = [
    '1' => 'p.id_product DESC',
    '2' => 'p.price ASC',
    '3' => 'p.price DESC',
    '4' => 'p.name_product ASC',
    '5' => 'p.name_product DESC'
];
$orderBy = isset($orderByMap[$orderby]) ? $orderByMap[$orderby] : $orderByMap['1'];

// Подсчет общего количества с фильтрами
$count_result = $link->query("SELECT COUNT(*) as total FROM Products p $where_condition");
$total_products = $count_result->fetch_assoc()['total'];
$total_pages = ceil($total_products / $per_page);

// Основной запрос с фильтрами, сортировкой и пагинацией
$sql_all_products = "SELECT p.*, 
    (SELECT COUNT(*) FROM Products p2 $where_conditionP2) as filtered_count 
    FROM Products p 
    $where_condition 
    ORDER BY $orderBy 
    LIMIT $per_page OFFSET $offset";
$sql_product = $link->query($sql_all_products);

// Страница товара

if (isset($_GET['id_product'])) {
    $id_product = $_GET['id_product'];
    $sql_product_id = $link->query("SELECT p.*, c.name_category, s.name_size 
        FROM `Products` p 
        JOIN `Categories` c ON p.category = c.id_category
        JOIN `Sizes` s  on p.size = s.id_size
        WHERE p.`id_product` = $id_product");
    $sql_product_id = mysqli_fetch_assoc($sql_product_id);
};

// Корзина



// РОУТЕР
$routers = [
    'main' => 'page/main.php',
    'about' => 'page/about.php',
    'catalog' => 'page/catalog.php',
    'product' => 'page/product.php',
    'login' => 'page/login.php',
    'register' => 'page/register.php',
    'my-account' => 'page/my-account.php',
];

if (!isset($_GET['page'])) {
    require 'page/main.php';
} else {
    try {
        require $routers[$_GET['page']];
    } catch (Throwable $th) {
        require 'page/404.php';
    }
}
require 'page/footer.php';
