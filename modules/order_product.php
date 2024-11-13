<?php
    include("../helpers/crud.php");

    $products = [];
    for($i = 0; $i < count($_POST['id']); $i++) {
        $data = [
            "product_id" => $_POST['id'][$i],
            "name" => $_POST['name'][$i],
            "quantity" => $_POST['quantity'][$i]
        ];
        array_push($products, $data);
    }
    
    $crud->create("product_order", [
        "user" => $_POST['user'],
        "products" => json_encode($products),
        "status" => "pending",
        "datetime" => date("Y-m-d H:i:s")
    ]);

    header("Location: ../index.php?page=inventory");
    exit;
?>
