


<?php


if(!isset($_SESSION['user']))
{

    
$_SESSION['no-login-message'] = "<div class = 'red text-center'>You have to login to be able to acces the Adm Panel</div>";

header('location:'.SITEURL.'admin/loginsystem.php');
}
?>