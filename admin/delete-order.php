<?php

include('../config/consts.php');

$id = $_GET['id'];
$query = "DELETE FROM order_table WHERE id=$id";
$result = mysqli_query($connection, $query);
if($result==true){
    $_SESSION['delete']= "<div class='green'>order deleted</div>";
    header('location:'.SITEURL.'admin/admin-management.php');
}
else{
    $_SESSION['delete']="<div class='red'>order not deleted</div>";
    header('location:'.SITEURL.'admin/admin-management.php');
}
?>