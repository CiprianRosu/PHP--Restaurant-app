<?php include('partials/menu.php')?>


<div class="container">
<br /><br /><br />
<div class="text-center">  
<h1>Categories management</h1>
</div>

<?php
 if(isset($_SESSION['add']))
 {
     echo $_SESSION['add']; 
     unset($_SESSION['add']); 
 }

 if(isset($_SESSION['delete']))
 {
     echo $_SESSION['delete']; 
     unset($_SESSION['delete']); 
 }
 if(isset($_SESSION['no-category-found']))
 {
     echo $_SESSION['no-category-found']; 
     unset($_SESSION['no-category-found']); 
 }
 if(isset($_SESSION['update']))
 {
     echo $_SESSION['update']; 
     unset($_SESSION['update']); 
 }
 if(isset($_SESSION['upload']))
 {
     echo $_SESSION['upload']; 
     unset($_SESSION['upload']); 
 }
 if(isset($_SESSION['failed-remove']))
 {
     echo $_SESSION['failed-remove']; 
     unset($_SESSION['failed-remove']);
 }

?>

</br>
    </br>
    </br>
   <a href="<?php echo SITEURL; ?>admin/add-category.php" class="btn btn-primary">Add Category</a>
</br>
</br>
</br>
   <table class="table">
       <thead class="thead-dark">
        <tr>

        <th>S.N.</th>
        <th>Title</th>
        <th>image</th>
        <th>Active</th>
        <th>Actions</th>

        </tr>

        <?php
        $query = "SELECT * FROM category";

        $result = mysqli_query($connection , $query);

        $count = mysqli_num_rows($result);

        $sn=1;

        
        if($count>0)
        {
            
            while($row=mysqli_fetch_assoc($result))
            {
                $id = $row['id'];
                $title = $row['title'];
                $image_name = $row['image_name'];
                $active = $row['active'];

                ?>
                <tr>
            <td><?php echo $sn++;?></td>
            <td><?php echo $title;?></td>
            <td>
            
            <?php 
         
            if($image_name!="")
            {
                
                ?>
                <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name ?>" width="100px">
                <?php
            }
            else
            {
                
                echo "<div class='red'>Img was not uploaded</div>";
            }
  
            ?>
      
            </td>
            
            <td><?php echo $active;?></td>
            
            <td>
                <a href="<?php echo SITEURL; ?>admin/update-category.php?id=<?php echo $id; ?>" class="btn btn-secondary">update category</a>                                                                                 
                <a href="<?php echo SITEURL; ?>admin/delete-category.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="btn btn-delete">delete category</a>
            </td>

        </tr>


                <?php

            }
        }
        else
        {

            ?>
            
            <tr>
            
            <td colspan="6"><div class="red">you did not add any category</div></td>
            </tr>
            <?php
                        
        }
        
        ?>
    </table>

</div>
</div>



<?php include('partials/footer.php')?>


