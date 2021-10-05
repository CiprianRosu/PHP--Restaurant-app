<?php include('partials/menu.php'); ?>

<div class="container">
<br /><br /><br />
<div class="text-center">
        <h1>Manage Offers</h1>
</div>
        <br /><br />

                
                <a href="<?php echo SITEURL; ?>admin/add-offers.php" class="btn btn-primary">Add Offer</a>

                <br /><br /><br />

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

                    if(isset($_SESSION['upload']))
                    {
                        echo $_SESSION['upload'];
                        unset($_SESSION['upload']);
                    }

                    if(isset($_SESSION['unauthorize']))
                    {
                        echo $_SESSION['unauthorize'];
                        unset($_SESSION['unauthorize']);
                    }

                    if(isset($_SESSION['update']))
                    {
                        echo $_SESSION['update'];
                        unset($_SESSION['update']);
                    }
                
                ?>

                <table class="table">
                    <thead class="thead-dark">
                    <tr>
                        <th>S.N.</th>
                        <th>Title</th>
                        <th>Price</th>
                        <th>Image</th>
                        
                        <th>Active</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                    <?php 
                       
                        $query = "SELECT * FROM offers";

                        
                        $result = mysqli_query($connection, $query);

                        
                        $count = mysqli_num_rows($result);

                        
                        $sn=1;

                        if($count>0)
                        {
                            
                            while($row=mysqli_fetch_assoc($result))
                            {
                                
                                $id = $row['id'];
                                $title = $row['title'];
                                $price = $row['price'];
                                $image_name = $row['image_name'];
                                
                                $active = $row['active'];
                                ?>

                                <tr>
                                    <td><?php echo $sn++; ?>. </td>
                                    <td><?php echo $title; ?></td>
                                    <td>$<?php echo $price; ?></td>
                                    <td>
                                        <?php  
                                            
                                            if($image_name=="")
                                            {
                                                
                                                echo "<div class='red'>Image not Added.</div>";
                                            }
                                            else
                                            {
                                               
                                                ?>
                                                <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>" width="100px">
                                                <?php
                                            }
                                        ?>
                                    </td>
                                    
                                    <td><?php echo $active; ?></td>
                                    <td>
                                        <a href="<?php echo SITEURL; ?>admin/update-offers.php?id=<?php echo $id; ?>" class="btn btn-secondary">Update Offers</a>
                                        <a href="<?php echo SITEURL; ?>admin/delete-offers.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="btn btn-delete">Delete Offers</a>
                                    </td>
                                </tr>

                                <?php
                            }
                        }
                        else
                        {
                            
                            echo "<tr> <td colspan='7' class='red'> Offers not Added. </td> </tr>";
                        }

                    ?>

                    
                </table>
    
    
</div>

<?php include('partials/footer.php'); ?>