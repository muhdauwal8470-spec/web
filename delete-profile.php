<?php
require_once "connect.php";

if(isset($_GET['id'])){
    $id = $_GET['id'];

if($_SERVER['REQUEST_METHOD']=="POST"){
    $delete = $_POST['confirm_delete'];

    if($delete=="Yes"){
        //goge a database
        $stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
        $stmt->bind_param("i", $id);
        if($stmt->execute()){
            echo"user successfully deleted";
        }else{
            echo"error occured";
        }
    }elseif($delete=="No"){
        //mu mayar da shi baya
        header("location: admin_dashboard.php");
    }else{
        //an samu kuskure, mayar da shi baya
        header("location: admin_dashboard.php");

    }


}

}else{
    echo"koma baya saboda na ga babu id";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
</head>
<body>
    <form method="post" action="#">
        Are you sure you want to delete this user?<br>
    <input type="radio" name="confirm_delete" value="Yes"> Delete<br>
    <input type="radio" name="confirm_delete" value="No"> Cancel<br>
    <input type="submit" name="submit" value="Submit">
    </form>
</body>
</html>