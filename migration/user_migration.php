<?php
include '../database/db.php';
class UserTable extends Database{

    public function up(){
        $this->init();

       $this->conn->query("CREATE TABLE IF NOT EXISTS laptopsales(
        id int auto_increment primary key,
        model varchar(60) not null,
        brand varchar(60) not null UNIQUE,
        price int,
        token varchar(60)       
       )");
       
    }
    public function insert($params){

       if($_SERVER['REQUEST_METHOD'] != 'POST'){
        return json_encode([
       'code'=> 'POST METHOD IS REQUIRED',
   ]);
    }
        if(!isset($params['model']) || empty($params['model'])){
            return json_encode([
                'code'=> 'Model is required',
            ]);
        }
        if(!isset($params['brand']) || empty($params['brand'])){
            return json_encode([
                'code'=> 'brand is required',
            ]);
        }
        if(!isset($params['price']) || empty($params['price'])){
            return json_encode([
                'code'=> 'price is required',
            ]);
        }
        if(!isset($params['token']) || empty($params['token'])){
            return json_encode([
                'code'=> 'token is required',
            ]);
        }
        $model = $params['model'];
        $brand = $params['brand'];
        $price = $params['price'];
        $token = $params['token'];

        
       $sql = $this->conn->query("INSERT INTO laptopsales(model, brand, price, token) 
        VALUES('$model','$brand','$price','$token')");


        if($sql){
            return json_encode([
                'code' => 200,
                'message' => 'The laptop successfully added', 
            ]);
        }else {
            return json_encode([
                'code' => 500,
                'message' => $this->conn->getError(), 
            ]);

            
        }
    }

    public function search($search)
    {
        $this->init();
        if(empty($search['model']))
        {
            return json_encode([
                'code' => 422,
                'message' => 'please put model information first'
            ]);
        }

        $model = $search['model'] ?? '';
        $data = $this->conn->query("SELECT * FROM laptopsales WHERE model LIKE '%$model%'");

        if($data)
        {
            $result = $data->fetch_all(MYSQLI_ASSOC);
            return $result;
        } else {
            return json_encode([
                'message' => 'error'
            ]);
        }
    
    }
    
       
    }





?>