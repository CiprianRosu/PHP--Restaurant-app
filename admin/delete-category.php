<?php

include('../config/consts.php');

$id = $_GET['id'];
 

$query = "DELETE FROM category WHERE id=$id";


$result = mysqli_query($connection, $query);

if($result==true){
    
    $_SESSION['delete']= "<div class='green'>the selected category was succesfully deleted</div>";
    
    header('location:'.SITEURL.'admin/category-management.php');
}
else{
    

    $_SESSION['delete']="<div class='red'>You have failed to delete the selected category</div>";
    header('location:'.SITEURL.'admin/category-management.php');
}

?>