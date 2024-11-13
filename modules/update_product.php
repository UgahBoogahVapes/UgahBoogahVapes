<?php
    include("../helpers/crud.php");

    $inputs = $_POST;
    $id = $_POST["id"];
    $table = $_POST['table'];
    $product = $crud->read("inventory", $_POST['id']);

    // Initialize an array to store the updated data
    $data = array();

    // Iterate through the input data and filter out location and table key
    foreach ($inputs as $key => $value) {
        if ($key != "location" && $key != "table" && $key != "stock") {
            $data[$key] = $value;
        }
    }

    $data['stock'] = (int)$_POST['stock'] + (int)$product['stock']; 
    
    $crud->update($table, $id, $data);

    header("Location: ../index.php?page=" . $_POST['location'] . "&status=updated");
    exit;
?>
