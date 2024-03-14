<?php
include '../migration/user_migration.php';
$data = new UserTable();
$search = $data->search($_GET);
echo json_encode($search);



?>