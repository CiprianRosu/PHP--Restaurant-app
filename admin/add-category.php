<?php include('partials/menu.php') ?>


<div class="container">
<br><br><br>
        <h1>Add Category</h1>

        <br><br>

        <?php
    if(isset($_SESSION['add']))  
    {
        echo $_SESSION['add']; 
        unset($_SESSION['add']); 

    }
    if(isset($_SESSION['upload'])) 
    {
        echo $_SESSION['upload']; 
        unset($_SESSION['upload']); 

    }

?>

<form action="" method="POST" enctype="multipart/form-data">

<table class="tbl-30">
<div class="form-group">
            
            <label for="tile">Title:</label>
        <input type="text" name="title" placeholder="category title" class="form-control" style="width: 350px;">
</div>

    
    <label for="image">Select Image:</label>
    <div class="form-group">
        <input type="file" name="image" style="width: 350px;">       
    </td>
    </tr>

    <td>Active</td>

    <td>
        <input type="radio" name="active" value="Yes">yes
        <input type="radio" name="active" value="No">no
    </td>
    <tr>
    <td colspan="2">
        <input type="submit" name="submit" value="Add Category" class="btn btn-primary">
    </td>
    </tr>
</form>

<?php 

if(isset($_POST['submit']))
{

   $title = $_POST['title'];
     
    $active = $_POST['active'];  
    if(isset($_FILES['image']['name']))
    {

        
        $image_name= $_FILES['image']['name'];

        if($image_name != "")
        {   
            $source_path = $_FILES['image']['tmp_name'];
            $destination_path = "../images/category/".$image_name;
            $upload = move_uploaded_file($source_path , $destination_path); 
            
            if($upload==false)
            {
                $_SESSION['upload'] = "<div class='red'>Img was not uploaded</div>";
                header('location:'.SITEURL.'admin/add-category.php');
                
                die();

            }
        }
    }
    else
    {
        
        $image_name="";
    }

    $query = "INSERT INTO `category` SET
        title='$title',
        image_name='$image_name',
        active='$active'
    
    ";

    
    $result = mysqli_query($connection, $query) or die(mysqli_error());

   
    if($result==TRUE)
    {
  
        $_SESSION['add'] ="<div class='green'>a new category was Added Successfully</div>";
    
        header("location:".SITEURL.'admin/category-management.php');
    }
    else
    {
    
        $_SESSION['add'] ="You have failed to Add Admin ";
     
        header("location:".SITEURL.'admin/add-category.php');

    }
}

?>


</div>

<?php include('partials/footer.php') ?>