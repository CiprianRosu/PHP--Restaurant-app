<?php

include('../config/consts.php');


$id = $_GET['id'];

$query = "DELETE FROM admin WHERE id=$id";

$result = mysqli_query($connection, $query);

if($result==true){
    
    $_SESSION['delete']= "<div class='green'>deleted</div>";
    
    header('location:'.SITEURL.'admin/admin-management.php');
}
else{
   

   
    header('location:'.SITEURL.'admin/admin-management.php');
}

?>