<?php
header('Content-type: application/json');
include '../migration/user_migration.php';
$userTable = new UserTable();
$userTable->up();
echo $userTable->insert($_POST);




?>