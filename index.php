<?php

session_start();

require 'connect.php';

// Для количества товаров корзины в хедере
$sql_product_in_cart = null;
$total_price = 0;

if (isset($_SESSION['user']['id_user'])) {
    $id_user = (int)$_SESSION['user']['id_user'];

    $sql_product_in_cart = $link->query("
        SELECT p.*, c.qty, cat.name_category, s.name_size 
        FROM Carts c 
        JOIN Products p ON c.id_product = p.id_product
        JOIN Categories cat ON cat.id_category = p.category
        JOIN Sizes s ON s.id_size = p.size
        WHERE c.id_user = $id_user
    ");

    if ($sql_product_in_cart && $sql_product_in_cart->num_rows > 0) {
        foreach ($sql_product_in_cart as $product_in_cart) {
            $total_price += $product_in_cart['price'] * $product_in_cart['qty'];
        }
    }
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

// Страница всех заказов пользователя
$sql_orders = null;
$order_items = [];

if (isset($_SESSION['user']['id_user'])) {
    $id_user = (int)$_SESSION['user']['id_user'];

    $sql_orders = $link->query("
        SELECT 
            o.id_order,
            MIN(o.date) AS date,
            MIN(o.status) AS status,
            SUM(o.amount) AS items_count,
            SUM(o.amount * p.price) AS total
        FROM Orders o 
        JOIN Products p ON p.id_product = o.id_product 
        WHERE o.id_user = $id_user 
        GROUP BY o.id_order 
        ORDER BY date DESC, id_order DESC
    ");

    // товары всех заказов
    $sql_order_items = $link->query("
        SELECT 
            o.id_order,
            o.amount,
            o.id_product,
            p.name_product,
            p.photo,
            p.price
        FROM Orders o 
        JOIN Products p ON p.id_product = o.id_product 
        WHERE o.id_user = $id_user 
        ORDER BY o.id_order DESC, p.name_product
    ");

    // сгруппируем товары по id_order
    if ($sql_order_items && $sql_order_items->num_rows) {
        foreach ($sql_order_items as $it) {
            $order_items[$it['id_order']][] = $it;
        }
    }
}

// АДМИН ПАНЕЛЬ
if (isset($_SESSION['user']['id_user'])) {
    $id_user = (int)$_SESSION['user']['id_user'];

    $sql_users = $link->query("
        SELECT * 
        FROM Users 
        ORDER BY 
            CASE WHEN id_user = $id_user THEN 0 ELSE 1 END, 
            is_admin DESC,
            id_user ASC
    ");
} else {
    $sql_users = null;
}

// ----- АДМИН: фильтры заказов -----
$order_admin_f_user   = isset($_GET['order_admin_user'])   ? (int)$_GET['order_admin_user']   : 0;
$order_admin_f_date   = isset($_GET['order_admin_date'])   ? $_GET['order_admin_date']        : '';
$order_admin_f_status = isset($_GET['order_admin_status']) ? $_GET['order_admin_status']      : '';

// пользователи для фильтра
$order_admin_users_for_filter = $link->query("
    SELECT id_user, surname, name
    FROM Users
    ORDER BY surname, name
");

// ----- АДМИН: агрегированный список заказов -----
$order_admin_where = [];

if ($order_admin_f_user > 0) {
    $order_admin_where[] = "o.id_user = $order_admin_f_user";
}

if ($order_admin_f_date !== '') {
    $order_admin_date_safe = mysqli_real_escape_string($link, $order_admin_f_date);
    $order_admin_where[] = "DATE(o.date) = '$order_admin_date_safe'";
}

if ($order_admin_f_status !== '') {
    $order_admin_status_safe = mysqli_real_escape_string($link, $order_admin_f_status);
    $order_admin_where[] = "o.status = '$order_admin_status_safe'";
}

$order_admin_where_sql = $order_admin_where
    ? 'WHERE ' . implode(' AND ', $order_admin_where)
    : '';

$order_admin_sql_orders = $link->query("
    SELECT
        o.id_order,
        MIN(o.date)   AS date,
        MIN(o.status) AS status,
        SUM(o.amount)           AS items_count,
        SUM(o.amount * p.price) AS total,
        u.email,
        u.name,
        u.surname
    FROM Orders o
    JOIN Products p ON p.id_product = o.id_product
    JOIN Users   u  ON u.id_user    = o.id_user
    $order_admin_where_sql
    GROUP BY o.id_order, u.email, u.name, u.surname
    ORDER BY date DESC, o.id_order DESC
");

// ----- АДМИН: товары всех заказов -----
$order_admin_sql_order_items = $link->query("
    SELECT
        o.id_order,
        o.amount,
        o.id_product,
        p.name_product,
        p.photo,
        p.price
    FROM Orders o
    JOIN Products p ON p.id_product = o.id_product
    ORDER BY o.id_order DESC, p.name_product
");

$order_admin_items = [];
if ($order_admin_sql_order_items && $order_admin_sql_order_items->num_rows) {
    foreach ($order_admin_sql_order_items as $it) {
        $order_admin_items[$it['id_order']][] = $it;
    }
}

// АДМИН: каталог продуктов
$admin_products = $link->query("
    SELECT p.*, c.name_category, s.name_size
    FROM Products p
    LEFT JOIN Categories c ON c.id_category = p.category
    LEFT JOIN Sizes s      ON s.id_size    = p.size
    ORDER BY p.id_product DESC
");

// для селектов в формах
$admin_categories = $link->query("SELECT id_category, name_category FROM Categories ORDER BY name_category");
$admin_sizes      = $link->query("SELECT id_size, name_size FROM Sizes ORDER BY name_size");

// РОУТЕР
$routers = [
    'main' => 'page/main.php',
    'about' => 'page/about.php',
    'catalog' => 'page/catalog.php',
    'product' => 'page/product.php',
    'login' => 'page/login.php',
    'register' => 'page/register.php',
    'my-account' => 'page/my-account.php',
    'admin-account' => 'page/admin-account.php',
    'cart' => 'page/cart.php',
    'checkout' => 'page/checkout.php',
    'faq' => 'page/faq.php',
    'contact' => 'page/contact.php',
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
