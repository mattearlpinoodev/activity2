<?php
include '../migration/user_migration.php';
$userTable = new UserTable();
$userTable->up();




?>