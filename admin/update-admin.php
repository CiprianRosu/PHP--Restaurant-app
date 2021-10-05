<?php include('partials/menu.php'); ?>

<div class="container">
<br><br><br>
        <h1>Update Admin</h1>


        <br><br>
<?php
        
$id = $_GET['id'];

$query = "SELECT * FROM admin WHERE id=$id";

$result = mysqli_query($connection, $query);

if($result==true)
{
    
    $count = mysqli_num_rows($result);
    
    if($count==1)
    {
        
       $row=mysqli_fetch_assoc($result);
       $fullname=$row['fullname'];
       $username = $row['surname'];
    }
    else
    {
        
        header('location:'.SITEURL.'admin/admin-management.php');
    }
}

?>

    <form action="" method="POST">
        <div class="form-group">
            
        <label for="email">Fullname:</label>
                <input type="text" class="form-control" style="width: 350px;" name="fullname" value="<?php echo $fullname;?>">

</div>           
<div class="form-group"> 
<label for="email">Username:</label>
                <td><input type="text" class="form-control" style="width: 350px;" name="username" value="<?php echo $username;?>"></td>

</div>
       
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <input type="submit" name="submit" value="Update Admin" class="btn btn-primary">
                            
        </div>

    </form>

    </div>

<?php
// verify is submit button is pressed
if(isset($_POST['submit']))
{
   //fetch data from form to further updt

    $id = $_POST['id'];
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];

    $query= "UPDATE admin SET
    fullname = '$fullname',
    surname = '$username'
    WHERE id='$id'
    ";
    $result = mysqli_query($connection , $query);

    // verify if query execution is done or not
    if($result==true)
    {
        $_SESSION['update'] = "<div class='green'>updated</div>";
        
        header('location:'.SITEURL.'admin/admin-management.php');

    }
    else
    {
        $_SESSION['update'] = "<div class='red'>fail to update</div>";
      
        header('location:'.SITEURL.'admin/admin-management.php');  
    }
}

?>
<?php include('partials/footer.php'); ?>