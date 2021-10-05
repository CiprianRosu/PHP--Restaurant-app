<?php include('partials/menu.php'); ?>

<div class="container">
<br><br><br>
        <h1>Update Category</h1>

        <br><br>


        <?php 
        
            
            if(isset($_GET['id']))
            {
                
                $id = $_GET['id'];
                
                $query = "SELECT * FROM category WHERE id=$id";

                
                $result = mysqli_query($connection, $query);

                
                $count = mysqli_num_rows($result);

                if($count==1)
                {
                    
                    $row = mysqli_fetch_assoc($result);
                    $title = $row['title'];
                    $current_image = $row['image_name'];
                    $active = $row['active'];
                }
                else
                {
                    
                    $_SESSION['no-category-found'] = "<div class='red'>Category not Found.</div>";
                    header('location:'.SITEURL.'admin/category-management.php');
                }

            }
            else
            {
                
                header('location:'.SITEURL.'admin/category-management.php');
            }
        
        ?>

        <form action="" method="POST" enctype="multipart/form-data">

            <table class="tbl-30">
                <tr>
                    <td>Title: </td>
                    <td>
                        <input type="text" name="title" class="form-control" value="<?php echo $title; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Current Image: </td>
                    <td>
                        <?php 
                            if($current_image != "")
                            {
                                
                                ?>
                                <img src="<?php echo SITEURL; ?>images/category/<?php echo $current_image; ?>" width="150px">
                                <?php
                            }
                            else
                            {
                                
                                echo "<div class='red'>Image Not Added.</div>";
                            }
                        ?>
                    </td>
                </tr>

                <tr>
                    <td>New Image: </td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>

                <tr>
                    <td>Active: </td>
                    <td>
                        <input <?php if($active=="Yes"){echo "checked";} ?> type="radio" name="active" value="Yes"> Yes 

                        <input <?php if($active=="No"){echo "checked";} ?> type="radio" name="active" value="No"> No 
                    </td>
                </tr>

                <tr>
                    <td>
                        <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" value="Update Category" class="btn btn-primary">
                    </td>
                </tr>

            </table>

        </form>

        <?php 
        
            if(isset($_POST['submit']))
            {
               
                $id = $_POST['id'];
                $title = $_POST['title'];
                $current_image = $_POST['current_image'];
                $active = $_POST['active'];

                if(isset($_FILES['image']['name']))
                {
                    
                    $image_name = $_FILES['image']['name'];

                   
                    if($image_name != "")
                    {
                    
                        $source_path = $_FILES['image']['tmp_name'];

                        $destination_path = "../images/category/".$image_name;
 
                        $upload = move_uploaded_file($source_path, $destination_path);

                        
                        if($upload==false)
                        {
                            
                            $_SESSION['upload'] = "<div class='red'>Failed to Upload Image. </div>";
                            
                            header('location:'.SITEURL.'admin/category-management.php');
                            
                            die();
                        }

                        if($current_image!="")
                        {
                            $remove_path = "../images/category/".$current_image;

                            $remove = unlink($remove_path);

                            if($remove==false)
                            {
                                
                                $_SESSION['failed-remove'] = "<div class='red'>Failed to remove current Image.</div>";
                                header('location:'.SITEURL.'admin/category-management.php');
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

                
                $query2 = "UPDATE category SET 
                    title = '$title',
                    image_name = '$image_name',
                    active = '$active' 
                    WHERE id=$id
                ";

                
                $result2 = mysqli_query($connection, $query2);

                
                if($result2==true)
                {
                    
                    $_SESSION['update'] = "<div class='green'>Category Updated Successfully.</div>";
                    header('location:'.SITEURL.'admin/category-management.php');
                }
                else
                {
                    
                    $_SESSION['update'] = "<div class='red'>Failed to Update Category.</div>";
                    header('location:'.SITEURL.'admin/category-management.php');
                }

            }
        
        ?>

    
</div>

<?php include('partials/footer.php'); ?>