<?php 
    
    include('../config/consts.php');

    if(isset($_GET['id']) && isset($_GET['image_name'])) 
    {
        
        $id = $_GET['id'];
        $image_name = $_GET['image_name'];

       
        if($image_name != "")
        {
            
            $path = "../images/food/".$image_name;

            $remove = unlink($path);
   
            if($remove==false)
            {
                
                $_SESSION['upload'] = "<div class='red'>Img not removed.</div>";
                
                header('location:'.SITEURL.'admin/food-management.php');
                
                die();
            }

        }
 
        $query = "DELETE FROM food WHERE id=$id";
        
        $result = mysqli_query($connection, $query);
 
        if($result==true)
        {
            
            $_SESSION['delete'] = "<div class='green'>Food Deleted .</div>";
            header('location:'.SITEURL.'admin/food-management.php');
        }
        else
        {
            
            $_SESSION['delete'] = "<div class='red'> Food not deleted.</div>";
            header('location:'.SITEURL.'admin/food-management.php');
        }


    }
    else
    {
        
        $_SESSION['unauthorize'] = "<div class='red'>Unauthorized Access.</div>";
        header('location:'.SITEURL.'admin/food-management.php');
    }

?>