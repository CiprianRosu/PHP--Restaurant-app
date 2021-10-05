<?php include('partials/menu.php')?>
<br>
<br>
<br>
<div class="container" >

    <h1>Add Admin</h1>

<br><br>

<?php
    if(isset($_SESSION['add'])) 
    {
        echo $_SESSION['add']; 
        unset($_SESSION['add']); 

    }

?>

<form action="" method="POST">
    <div class="form-group">         
                <input type="fullname" class="form-control" id="fullname" placeholder="Enter fullname" name="fullname" style="width: 350px;" >      
</div>
<div class="form-group">          
                <input type="username" class="form-control" id="username" placeholder="Enter username" name="username" style="width: 350px;">     
</div>
<div class="form-group">
        
                <input type="password" class="form-control" id="username" placeholder="Enter paswword" name="password" style="width: 350px;">       
</div>
       
                <button type="submit" name="submit" value="Add Admin" class="btn btn-primary">Add admin</button>
       
</form>


   
</div>

<?php include('partials/footer.php')?>

<?php

if(isset($_POST['submit']))
{
    
   $fullname = $_POST['fullname'];
     $username = $_POST['username'];
    $password = md5($_POST['password']);  

    $query = "INSERT INTO `admin` SET
        fullname='$fullname',
        surname='$username',
        password='$password'
    
    ";
    $result = mysqli_query($connection, $query) or die(mysqli_error());
    if($result==TRUE)
    {        
        $_SESSION['add'] ="admin added";
        
        header("location:".SITEURL.'admin/admin-management.php');
    }
    else
    {
             
         
        header("location:".SITEURL.'admin/add-admin.php');

    }
}

?>