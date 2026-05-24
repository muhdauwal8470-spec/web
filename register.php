<?php
require_once "connect.php";

if($_SERVER['REQUEST_METHOD']=="POST"){

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$city = $_POST['city'];
$phone = $_POST['phone'];
$dob = $_POST['dob'];

$stmt = $conn->prepare("INSERT INTO users (name, email, password, city, phone, dob) VALUES (?,?,?,?,?,?)"); 
$stmt->bind_param("ssssis", $name,$email,$password,$city,$phone,$dob);

if ($stmt->execute()){
    echo"user successfuly registered";
}else{
    echo"error occured";
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
</head>
<body>
    <form method="post" action="#">
       <label>Name: </label>
       <input type="text" name="name" placeholder="Name"><br /><br />

        <label>Email: </label>
       <input type="email" name="email" placeholder="Email Address"><br /><br />

        <label>Password: </label>
       <input type="password" name="password" placeholder="Password"><br /><br />

       <label>Phone: </label>
       <input type="number" name="phone" placeholder="081737372"><br /><br />

        <label>City: </label>
       <input type="text" name="city" placeholder="City Name"><br /><br />

        <label>Date of Birth: </label>
       <input type="date" name="dob" placeholder="DOB"><br /><br />

        <input type="submit" name="submit" value="Register" style="background-color:blue;color:aliceblue; padding:0%;">

    </form>
</body>
</html>