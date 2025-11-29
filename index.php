<?php
require 'connect.php';
require 'page/header.php';

// Размеры и категории
$sql_size = $link->query("SELECT s.id_size, s.name_size, COUNT(p.id_product) as amount FROM Sizes as s, Products as p WHERE p.size = s.id_size GROUP BY s.id_size");
$all_product_for_filter = $link->query("SELECT COUNT(*) as all_qty FROM Products");
$all_product_for_filter = $all_product_for_filter->fetch_assoc();
$sql_categori = $link->query("SELECT c.id_category, c.name_category, COUNT(p.id_product) as amount FROM Categories as c, Products as p WHERE p.category = c.id_category GROUP BY c.id_category");

// Пагинация и фильтры
$catalog_page = isset($_GET['catalog_page']) ? (int)$_GET['catalog_page'] : 1;
if ($catalog_page < 1) $catalog_page = 1;
$per_page = 5;
$offset = ($catalog_page - 1) * $per_page;

// Фильтры
$filter_category = isset($_GET['id_cat']) ? (int)$_GET['id_cat'] : 0;
$filter_size = isset($_GET['id_size']) ? (int)$_GET['id_size'] : 0;
$orderby = isset($_GET['orderby']) ? $_GET['orderby'] : '1';

// SQL условия для фильтров
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
?>

<?php
// РОУТЕР
$routers = [
    'main' => 'page/main.php',
    'about' => 'page/about.php',
    'catalog' => 'page/catalog.php',
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
?>
