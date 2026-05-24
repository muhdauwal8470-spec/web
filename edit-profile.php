<?php 
require_once "connect.php";

if(isset($_GET['id'])){
    $id = $_GET['id'];
if($_SERVER['REQUEST_METHOD']=="POST"){
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);

    $stmt = $conn->prepare("UPDATE users SET name = ?, email = ? WHERE id=?"); 
    $stmt->bind_param("ssi", $name, $email, $id);
    if($stmt->execute()){
        echo"user details updated successfuly";
    }

}
}else{
    echo"no id found,go back please";
} ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User Profile</title>
</head>
<body>
    <form method="post" action="#">
        <label>Name:</label><input type="text" name="name" placeholder=""><br />

        <label>Email:</label><input type="email" name="email" placeholder=""><br />

        <input type="submit" name="submit" value="Update Now">

    </form>
</body>
</html>

