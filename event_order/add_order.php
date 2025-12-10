<?php
session_start();
require('../connect.php');

if (isset($_SESSION['user'])) {
    $id_user = $_SESSION['user']['id_user'];

    $sql_product_in_cart = $link->query(" SELECT p.*, c.qty, cat.name_category, s.name_size 
FROM Carts c 
JOIN Products p ON c.id_product = p.id_product, Categories cat, Sizes s
WHERE c.id_user = $id_user AND cat.id_category = p.category AND s.id_size = p.size
");

    if (mysqli_num_rows($sql_product_in_cart) > 0) {
        $city = $_POST['city'];
        $adress = $_POST['adress'];
        $country = $_POST['country'];

        $sql_id_last_order = $link->query("SELECT id_order FROM Orders ORDER BY id_order DESC LIMIT 1");
        $id_last_order = $sql_id_last_order->fetch_assoc()['id_order'];

        if (!isset($id_last_order)) {
            $id_last_order = 1;
        } else {
            $id_last_order += 1;
        }

        foreach ($sql_product_in_cart as $product) {
            $id_product = $product['id_product'];
            $amount = $product['qty'];
            echo $adress;

            mysqli_query($link, "INSERT INTO `Orders` (`id_order`, `id_product`, `id_user`, `amount`, `status`, `city`, `adress`, `country`) 
        VALUES ('$id_last_order', '$id_product', '$id_user', '$amount', 'Новый', '$city', '$adress', '$country')");

            mysqli_query($link, "DELETE FROM Carts 
        WHERE id_user = $id_user AND id_product = $id_product");
        }
        header("Location:../index.php?page=my-account");
    } else {
        header("Location:../index.php?page=checkout");
    }
} else {
    $_SESSION['error_order'] = "Авторизуйтесь для оформления заказа";
    header("Location:../index.php?page=login");
}
