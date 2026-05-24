<?php
require_once "connect.php";

if($_SERVER['REQUEST_METHOD']=="POST"){
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $stmt = $conn->prepare("SELECT email, password FROM users WHERE email=? AND password=?");
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows > 0){
        $_SESSION['email'] = $email;
        header("location:admin_dashboard.php");
    } else {
        echo "Invalid email or password";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form method="post" action="#">
        <label>Email: </label> <input type="email" name="email" placeholder="Enter your email"><br>

        <label>Password: </label> <input type="password" name="password" placeholder="Enter your password"><br>

        <input type="submit" name="submit" value="Login">

    </form>
</body>
</html>