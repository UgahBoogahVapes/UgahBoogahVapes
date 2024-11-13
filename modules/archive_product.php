<?php
    include("../helpers/crud.php");

    $id = $_POST["id"];
    
    $crud->update("inventory", $id, [
        "archived" => 1,
    ]);

    header("Location: ../index.php?page=inventory&status=updated");
    exit;
?>
