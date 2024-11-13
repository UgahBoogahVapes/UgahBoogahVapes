<?php
    include("../helpers/crud.php");

    $id = $_POST["id"];
    $table = $_POST['table'];

    $image = $crud->read($table, $id)['image'] ? $crud->read($table, $id)['image'] : false;
    // Check if an image exists and delete it from the specified directory
    if ($image) {
        unlink('../assets/img/places/' . $image);
        unlink('../../MobileCT/assets/places/' . $image);
    }

    // Delete the record in the specified table with the provided ID
    $crud->delete($table, $id);

    header("Location: ../index.php?page=" . $_POST['location'] . "&status=deleted");
    exit;
?>
