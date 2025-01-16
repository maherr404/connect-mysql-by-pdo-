<?php 

// connect mysql by pdo task

class dp{

    private $servername = "localhost";
    private $username = "root";
    private $password = "root";
    private $dp = "fuck" ;


    function connection(){

        try {
            $conn = new PDO("mysql:host=" . $this->servername . ";dbname=" . $this->dp, $this->username, $this->password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn ;
            // echo "Connected successfully";
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }

    }

}
// $obj = new dp;
// echo $obj->connection();

class user extends dp{
    function selectdata(){
        // return $this -> connection();
        $sql = "select * from lala";
        $stat = $this -> connection() -> query($sql);        //query()
        $fetch = $stat -> fetchAll(PDO::FETCH_ASSOC);
        return $fetch ;
    }

    function insertdata(){

        $sql = "insert into lala (name , email , password) values (?,?,?)";
        $statment = $this -> connection() -> prepare($sql);             // prepare()
        $x = $statment -> execute(['omar','omar@gmail','omar']);
        if($x){
            echo "inserted successfully";
        }

    }

}
// $obj1 = new user;
// print_r($obj1->insertdata());

$obj1 = new user;
print_r($obj1->selectdata());








?>
