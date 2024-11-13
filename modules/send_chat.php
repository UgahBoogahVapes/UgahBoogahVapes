<?php
    include("../helpers/crud.php");

    $crud->create("chat", [
        "sender_id" =>  $_SESSION['user_id'],
        "receiver_id" => $_POST['receiver_id'],
        "text" => $_POST['text'],
        "datetime" => date("Y-m-d H:i:s")
    ]);
    header("Location: ../index.php?page=chat&user=" . $_POST['receiver_id']);
?>