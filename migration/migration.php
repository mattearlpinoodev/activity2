<?php
include '../migration/user_migration.php';
$userTable = new UserTable();
$userTable->up();
$userTable->insert($_POST);




?>