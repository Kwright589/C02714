<?php
    include 'connect.php';
    
    $deltequery = "DELETE FROM users WHERE ID=?";
    $stmt = $mysqli->prepare($deletequery);
    $stmt->bind_param('s',$_GET['id']);
    $stmt->execute();
    
    header("location: display.php");
?>
