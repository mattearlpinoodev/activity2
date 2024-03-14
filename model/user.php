<?php
include '../database/db.php';
header ('Content-type: application/json');
class User extends Database{

    public function getAll(){
        $this->init();
        $data = $this->conn->query("SELECT * FROM laptopsales");
        $result = $data->fetch_all(MYSQLI_ASSOC);
        return $result;
    }
}


?>