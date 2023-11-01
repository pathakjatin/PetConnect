<?php
session_start();
$conn = new mysqli("localhost","root","","petconnect"); 
if ($conn->connect_error){
    die('Connection failed:' .$conn->connect_error);}
// }else{
//     $stmt = $conn->prepare("insert into tb_user(name,username,email,password) values(?,?,?,?)");
//     $stmt->bind_param("ssss", $name, $username, $email,$number);
//     $stmt->execute();
//     echo"registered successfully!";
//     $stmt->close();
//     $conn->close();
// }
?>