<?php
include '../model/user.php';
$getUser = new User();

$all = $getUser->getAll();

echo json_encode($all);

?>