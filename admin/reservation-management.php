<?php include('partials/menu.php')?>

<div class="container">
<br /><br /><br />
<div class="text-center">
        <h1>Reservation management</h1>
</div>
                <br /><br /><br />

                <?php 
                    if(isset($_SESSION['update']))
                    {
                        echo $_SESSION['update'];
                        unset($_SESSION['update']);
                    }

                    if(isset($_SESSION['delete']))
                    {
                        echo $_SESSION['delete']; 
                        unset($_SESSION['delete']); 
                    }
                ?>
                <br><br>

                <table class="table">
                    <thead class= "thead-dark">
                    <tr>
                        <th>S.N.</th>
                        <th>Name</th>
                        <th>Persons</th>
                        <th>Date</th>
                        <th>time</th>
                        <th>Status</th>
                        <th>Contact</th>
                        <th>Email</th>
                        <th>Comment</th>
                        <th>Actions</th>
                    </tr>
                    <thead>

                    <?php 
                        error_reporting(0);
                        
                        $query = "SELECT * FROM reservation ORDER BY id DESC"; 
                        
                        $result = mysqli_query($connection, $query);
                        
                        $count = mysqli_num_rows($result);

                        $sn = 1;

                        if($count>0)
                        {
                           
                            while($row=mysqli_fetch_assoc($result))
                            {
                                
                                $id = $row['id'];
                                $customer_name = $row['full-name'];
                                $persons = $row['persons'];
                                $reservation_date = date("Y-m-d h:i:sa");
                                $reservation_time = $row['appt'];
                                $status = "Reserved";  
                                $customer_contact = $row['contact'];
                                $customer_email = $row['email'];
                                $customer_comment = $row['comment'];
                                
                                ?>

                                    <tr>
                                        <td><?php echo $sn++; ?>. </td>
                                        <td><?php echo $customer_name; ?></td>
                                        <td><?php echo $persons; ?></td>
                                        <td><?php echo $reservation_date; ?></td>
                                        <td><?php echo $reservation_time; ?></td>
                                        

                                        <td>
                                            <?php 
                                                

                                                if($status=="Ordered")
                                                {
                                                    echo "<label>$status</label>";
                                                }
                                               
                                                elseif($status=="Reserved")
                                                {
                                                    echo "<label style='color: green;'>$status</label>";
                                                }
                                                elseif($status=="Cancelled")
                                                {
                                                    echo "<label style='color: red;'>$status</label>";
                                                }
                                            ?>
                                        </td>

                                        
                                        <td><?php echo $customer_contact; ?></td>
                                        <td><?php echo $customer_email; ?></td>
                                        <td><?php echo $customer_comment; ?></td>
                                        <td>
                                            <a href="<?php echo SITEURL; ?>admin/update-reservation.php?id=<?php echo $id; ?>" class="btn btn-secondary">Update Reservation</a>
                                            <a href="<?php echo SITEURL; ?>admin/delete-oders.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="btn btn-delete">Delete Reservation</a>
                                        </td>
                                    </tr>

                                <?php

                            }
                        }
                        else
                        {
                           
                            echo "<tr><td colspan='12' class='red'>Orders not Available</td></tr>";
                        }
                    ?>

 
                </table>
    
    
</div>



<?php include('partials/footer.php')?>