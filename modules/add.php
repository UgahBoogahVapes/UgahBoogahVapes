<?php
include("../helpers/crud.php");

$inputs = $_POST;
$table = $_POST['table'];

$data = array();

foreach ($inputs as $key => $value) {
    if ($key != "location" && $key != "table") {
        $data[$key] = $value;
    }
}

$crud->create($table, $data);
header("Location: ../index.php?page=" . $_POST['location'] . "&status=success");
