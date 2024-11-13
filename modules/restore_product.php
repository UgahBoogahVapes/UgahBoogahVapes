<?php
    include("../helpers/crud.php");

    $id = $_POST["id"];
    
    $crud->update("inventory", $id, [
        "archived" => 0
    ]);

    header("Location: ../index.php?page=inventory&tab=archive&status=updated");
    exit;
?>
