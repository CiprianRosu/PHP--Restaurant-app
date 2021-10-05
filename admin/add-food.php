<?php include('partials/menu.php'); ?>
<?php 


if(isset($_POST['submit']))
{
  
    $title = $_POST['title'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $category = $_POST['category'];

   
    
    if(isset($_POST['active']))
    {
        $active = $_POST['active'];
    }
    else
    {
        $active = "No"; 
    }

    
    if(isset($_FILES['image']['name']))
    {
        
        $image_name = $_FILES['image']['name'];

        
        if($image_name!="")
        {
           

            
            $source = $_FILES['image']['tmp_name'];
          
            $destination = "../images/food/".$image_name;
         
            $upload = move_uploaded_file($source, $destination);
  
            if($upload==false)
            {
                
                $_SESSION['upload'] = "<div class='red'>Img not uploaded.</div>";
                header('location:'.SITEURL.'admin/add-food.php');
                
                die();
            }

        }

    }
    else
    {
        $image_name = ""; 
    }
 
    $query2 = "INSERT INTO food SET 
        title = '$title',
        description = '$description',
        price = $price,
        image_name = '$image_name',
        category_id = '$category',
        active = '$active'
    ";

   
    $result2 = mysqli_query($connection, $query2);

    if($result2 == true)
    {
        
        $_SESSION['add'] = "<div class='green'>Food Added .</div>";
        header('location:'.SITEURL.'admin/food-management.php');
    }
    else
    {
        
        $_SESSION['add'] = "<div class='red'>Food not added.</div>";
        header('location:'.SITEURL.'admin/food-management.php');
    }

    
}

?>
<div class="container">
<br><br><br>
        <h1>Add Food</h1>

        <br><br>

        <?php 
            if(isset($_SESSION['upload']))
            {
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }
        ?>

        <form action="" method="POST" enctype="multipart/form-data">
        
            <table class="tbl-30">

                <tr>
                    <td>Title: </td>
                    <td>
                        <input type="text" class="form-control" name="title" placeholder="Title of the Food">
                    </td>
                </tr>

                <tr>
                    <td>Description: </td>
                    <td>
                        <textarea name="description" cols="30" rows="5" class="form-control" placeholder="Description of the Food."></textarea>
                    </td>
                </tr>

                <tr>
                    <td>Price: </td>
                    <td>
                        <input type="number" name="price" class="form-control">
                    </td>
                </tr>

                <tr>
                    <td>Select Image: </td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>

                <tr>
                    <td>Category: </td>
                    <td>
                        <select name="category">

                            <?php 
                                
                                $query = "SELECT * FROM category WHERE active='Yes'";
                                
                                
                                $result = mysqli_query($connection, $query);        
                                $count = mysqli_num_rows($result);         
                                if($count>0)
                                {
                                    
                                    while($row=mysqli_fetch_assoc($result))
                                    {
                                        
                                        $id = $row['id'];
                                        $title = $row['title'];

                                        ?>

                                        <option value="<?php echo $id; ?>"><?php echo $title; ?></option>

                                        <?php
                                    }
                                }
                                else
                                {
                                    
                                    ?>
                                    <option value="0">No Category Found</option>
                                    <?php
                                }
                            

                                
                            ?>
 
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>Active: </td>
                    <td>
                        <input type="radio" name="active" value="Yes"> Yes 
                        <input type="radio" name="active" value="No"> No
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Food" class="btn btn-primary">
                    </td>
                </tr>

            </table>

        </form>

        
        


    
</div>

<?php include('partials/footer.php'); ?>