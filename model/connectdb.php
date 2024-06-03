<?php
    function connectdb(){
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "duanmau1";
        $sport = "3306";

        try {
            $conn = new PDO("mysql:host=$servername;port=$sport;dbname=".$database, $username, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //echo "Connected successfully";
            return $conn;
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
    // function pdo_excute($sql){
    //     $sql_args= array_slice(func_get_args(), 1);
    //     try{
    //       $conn = pdo_get_connection();
    //       $stmt = $conn->prepare($sql);
    //       $stmt ->$conn->execute($sql_args);
    //     }catch(PDOException $e){
    //       throw $e;
    //     }finally{
    //       unset($conn);
    //     }
    //   }
    
?>
