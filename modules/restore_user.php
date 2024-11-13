<?php
    include("../helpers/crud.php");

    $id = $_POST["id"];
    
    $crud->update("users", $id, [
        "archived" => 0
    ]);

    header("Location: ../index.php?page=manage&tab=archive&status=updated");
    exit;
?>
