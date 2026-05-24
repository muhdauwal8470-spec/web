<?php 
require_once "connect.php";

$stmt = $conn->prepare("SELECT id, name, email, city, phone FROM users");
$stmt->execute();
$stmt->bind_result($id, $name, $email, $city, $phone);

while($stmt->fetch()){
    echo "<div style='background-color: lightblue; border-color: blue; padding: 2px; margin: 2px; border-radius: 10%;'>
    ID: $id<br/>
    $name<br />
    $email<br />
    $city<br />
    $phone<br />

    <a href='edit-profile.php?id=$id'>Edit</a> | <a href='delete-profile.php?id=$id'>Delete</a>
    
    </div>";
}


?>
