<?php include('partials/menu.php'); ?>



    
    <div class="container">
    </br>
    </br>
    </br>
    <div class="text-center">
    <h1>Admin management</h1>
</div>
    </br>
    </br>
    </br>

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

        if(isset($_SESSION['user-not-found']))
        {
            echo $_SESSION['user-not-found'];
            unset($_SESSION['user-not found']);
        }

     

       
    
    ?>
    <br>
    <br>
    <br>
   <a href="add-admin.php" class="btn btn-primary">Add Admin</a>
</br>
</br>
</br>
   <table class="table">
       <thead class= "thead-dark">
        <tr>

        <th>S.N.</th>
        <th>Fullname</th>
        <th>Username</th>
        <th>Actions</th>

        </tr>
    </thead>
        <?php
             
                $query = "SELECT * FROM admin";
            
            $result= mysqli_query($connection, $query);
            
           
            if($result== TRUE)
            {
                
                $count = mysqli_num_rows($result);
                    
                    if($count>0)
                    {
                        $nr_id = 1; 
                         
                        while($rows=mysqli_fetch_assoc($result)) 
                        {

                            
                            $id=$rows['id'];
                            $fullname=$rows['fullname'];
                            $username=$rows['surname'];

                           
                             ?>
                                <tr>
            <td><?php echo $nr_id++; ?></td>
            <td><?php echo $fullname;?></td>
            <td><?php echo $username;?></td>
            <td>
              
                <a href="<?php echo SITEURL; ?>admin/update-admin.php?id=<?php echo $id; ?>" class="btn btn-secondary">update admin</a> 
                <a href="<?php echo SITEURL; ?>admin/delete-admin.php?id=<?php echo $id; ?>" class="btn btn-delete">delete admin</a>
            </td>

        </tr>
                             <?php

                        }
                    }
                    else
                    {
                            
                    }

            }


        ?>

        
       
       
    </table>


    </div>
    </div>



<?php include('partials/footer.php') ?>