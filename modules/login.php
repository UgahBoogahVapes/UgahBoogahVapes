<?php
require_once("../helpers/crud.php");

$user = $crud->login("users", $_POST['username'], $aes->encrypt($_POST['password']));

if ($user && (int)$user['archived'] == 0) {
    $_SESSION['user_id'] = $user['id'];

    header("Location: ../index.php");
    exit;
} else {
    header("Location: ../login.php?status=error");
    exit;
}

?>
