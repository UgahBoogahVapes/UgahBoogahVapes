<?php
    include("../helpers/crud.php");

    $id = $_POST["id"];
    
    $crud->update("users", $id, [
        "archived" => 1,
    ]);

    header("Location: ../index.php?page=manage&status=updated");
    exit;
?>
