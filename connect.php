<?php
$conn = new mysqli("localhost", "root", "", "flowdiary");

if($conn->connect_error){
    die("connection error");
}

?>