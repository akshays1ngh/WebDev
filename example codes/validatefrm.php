<?php
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        if(empty($_POST["name"])){
            echo "Enter a name!";
        }
        else{
            echo "Name: ".$_POST["name"]."</br>";
            echo "Email: ".$_POST["email"]."</br>";
            echo "Password: ".$_POST["pwd"]."</br>";
            $name = $_POST["name"];
            $email = $_POST["email"];  
            $password = $_POST["password"];
            $servername="localhost";
            $username="root";
            $password= "";
            $dbname= "myDb";
            $conn = new mysqli($servername,$username,$password,$dbname);
            if ($conn->connect_error){
                die("Connection error". $conn->connect_error);
            }
            $sql = "SELECT * FROM Login";
            $result = $conn->query($sql);
            if($result->num_rows > 0){
                while( $row = $result->fetch_assoc() ){
                    echo "Name: ".$row['Name']."  Email".$row["Email"]."</br>";
                }
            }
        }
    }
?>
