<?php include('partials/menu.php'); ?>
<?php 
     
    if(isset($_GET['id']))
    {
        
        $id = $_GET['id'];

        
        $query2 = "SELECT * FROM food WHERE id=$id";
        
        $result2 = mysqli_query($connection, $query2);

        
        $row2 = mysqli_fetch_assoc($result2);

        
        $title = $row2['title'];
        $description = $row2['description'];
        $price = $row2['price'];
        $current_image = $row2['image_name'];
        $current_category = $row2['category_id'];
        $active = $row2['active'];

    }
    else
    {
        
        header('location:'.SITEURL.'admin/food-management.php');
    }
?>
<div class="container">
<br><br><br>
        <h1>Update Food</h1>
        <br><br>

        <form action="" method="POST" enctype="multipart/form-data">
        
        <table class="tbl-30">

            <tr>
                <td>Title: </td>
                <td>
                    <input type="text" class="form-control" name="title" value="<?php echo $title; ?>">
                </td>
            </tr>

            <tr>
                <td>Description: </td>
                <td>
                    <textarea name="description" class="form-control" cols="30" rows="5"><?php echo $description; ?></textarea>
                </td>
            </tr>

            <tr>
                <td>Price: </td>
                <td>
                    <input type="number" name="price" class="form-control" value="<?php echo $price; ?>">
                </td>
            </tr>

            <tr>
                <td>Current Image: </td>
                <td>
                    <?php 
                        if($current_image == "")
                        {
                            
                            echo "<div class='red'>Image not Available.</div>";
                        }
                        else
                        {
                            
                            ?>
                            <img src="<?php echo SITEURL; ?>images/food/<?php echo $current_image; ?>" width="150px">
                            <?php
                        }
                    ?>
                </td>
            </tr>

            <?php 
        
        if(isset($_POST['submit']))
        {
            
            $id = $_POST['id'];
            $title = $_POST['title'];
            $description = $_POST['description'];
            $price = $_POST['price'];
            $current_image = $_POST['current_image'];
            $category = $_POST['category'];
            $active = $_POST['active'];
 
            if(isset($_FILES['image']['name']))
            {
                
                $image_name = $_FILES['image']['name']; 
   
                if($image_name!="")
                {
  
                    $source_path = $_FILES['image']['tmp_name']; 
                    $destination_path = "../images/food/".$image_name; 
    
                    $upload = move_uploaded_file($source_path, $destination_path);
    
                    if($upload==false)
                    {
                        
                        $_SESSION['upload'] = "<div class='red'>Failed to Upload new Image.</div>";
                         
                        header('location:'.SITEURL.'admin/food-management.php');
                        
                        die();
                    }
                    
                    if($current_image!="")
                    {
                        
                        $remove_path = "../images/food/".$current_image;

                        $remove = unlink($remove_path);

                        
                        if($remove==false)
                        {
                            
                            $_SESSION['remove-failed'] = "<div class='red'>Faile to remove current image.</div>";
                            
                            header('location:'.SITEURL.'admin/food-management.php');
                            
                            die();
                        }
                    }
                }
                else
                {
                    $image_name = $current_image; 
                }
            }
            else
            {
                $image_name = $current_image; 
            }

            $query3 = "UPDATE food SET 
                title = '$title',
                description = '$description',
                price = $price,
                image_name = '$image_name',
                category_id = '$category',
                active = '$active'
                WHERE id=$id
            ";

            
            $result3 = mysqli_query($connection, $query3);

             
            if($result3==true)
            {
                
                $_SESSION['update'] = "<div class='green'>Food Updated Successfully.</div>";
                header('location:'.SITEURL.'admin/food-management.php');
            }
            else
            {
                
                $_SESSION['update'] = "<div class='red'>Failed to Update Food.</div>";
                header('location:'.SITEURL.'admin/food-management.php');
            }

            
        }
    
?>
            <tr>
                <td>Select New Image: </td>
                <td>
                    <input type="file" name="image">
                </td>
            </tr>

            <tr>
                <td>Category: </td>
                <td>
                    <select name="category" class="form-control">

                        <?php 
                            
                            $query = "SELECT * FROM category WHERE active='Yes'";
                            
                            $result = mysqli_query($connection, $query);
                            
                            $count = mysqli_num_rows($result);

                            
                            if($count>0)
                            {
                                
                                while($row=mysqli_fetch_assoc($result))
                                {
                                    $category_title = $row['title'];
                                    $category_id = $row['id'];
                                    
                                    
                                    ?>
                                    <option <?php if($current_category==$category_id){echo "selected";} ?> value="<?php echo $category_id; ?>"><?php echo $category_title; ?></option>
                                    <?php
                                }
                            }
                            else
                            {
                                
                                echo "<option value='0'>Category Not Available.</option>";
                            }

                        ?>

                    </select>
                </td>
            </tr>
   
            
            <tr>
                <td>Active: </td>
                <td>
                    <input <?php if($active=="Yes") {echo "checked";} ?> type="radio" name="active" value="Yes"> Yes 
                    <input <?php if($active=="No") {echo "checked";} ?> type="radio" name="active" value="No"> No 
                </td>
            </tr>

            <tr>
                <td>
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">

                    <input type="submit" name="submit" value="Update Food" class="btn btn-primary">
                </td>
            </tr>
        
        </table>
        
        </form>



    
</div>
<?php include('partials/footer.php');?>
