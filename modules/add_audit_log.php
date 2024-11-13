<?php
include("../helpers/crud.php");

$table = "audit_log";
var_dump($_POST);
for ($i = 0; $i < count($_POST['qty']); $i++) {
    $product = $crud->read("inventory", $_POST['recordID'][$i]);
    $crud->update("inventory", $_POST['recordID'][$i], [
        "stock" => (int)$product['stock'] - (int)$_POST['qty'][$i]
    ]);
    if (((int)$product['stock'] - (int)$_POST['qty'][$i]) < 10) {
        $crud->create("notifications", [
            "header" => "Stock Alert",
            "body" => $product['product_name']." is low at ".((int)$product['stock'] - (int)$_POST['qty'][$i]).". Restock needed.",
            "user" => "admin",
            "created_at" => date("Y-m-d H:i:s")
        ]);
    }
    $crud->create($table, [
        "product_id" => $_POST['recordID'][$i],
        "quantity" => $_POST['qty'][$i],
        "price" => (int)$_POST['qty'][$i] * (int)$product['price'],
        "datetime" => date("Y-m-d H:i:s")
    ]);
}

header("Location: ../index.php?page=audit_log&status=success");
