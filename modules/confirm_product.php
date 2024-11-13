<?php
    include("../helpers/crud.php");

    $id = $_POST['order_id'];
    $order = $crud->read("product_order", $id);
    $products = json_decode($order['products'], true);

    foreach($products as $product) {
        $initialProd = $crud->read("inventory", $product['product_id']);
        $crud->update("inventory", $product['product_id'], [
            "stock" => (int)$initialProd['stock'] + (int)$product['quantity']
        ]);
    }
    
    $crud->update("product_order", $id, [
        "status" => "completed",
        "datetime" => date("Y-m-d H:i:s")
    ]);

    header("Location: ../index.php?page=inventory");
    exit;
?>
