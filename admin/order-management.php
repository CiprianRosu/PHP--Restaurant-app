<?php include('partials/menu.php')?>

<div class="container">
<br /><br /><br />
<div class="text-center">
        <h1>Order management</h1>
</div>
                <br /><br /><br />

            
                <br><br>

                <table class="table">
                    <thead class="thead-dark">
                    <tr>
                        <th>S.N.</th>
                        <th>Food</th>
                        <th>Price</th>
                        <th>Qty.</th>
                        <th>Total</th>
                        <th>Order Date</th>
                        <th>Status</th>
                        <th>Customer Name</th>
                        <th>Contact</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                    <?php 
                        
                        $query = "SELECT * FROM order_table ORDER BY id DESC"; 
                        
                        $result = mysqli_query($connection, $query);
                       
                        $count = mysqli_num_rows($result);

                        $sn = 1; 

                        if($count>0)
                        {
                            
                            while($row=mysqli_fetch_assoc($result))
                            {
                                
                                $id = $row['id'];
                                $food = $row['food'];
                                $price = $row['price'];
                                $qty = $row['quantity'];
                                $total = $row['total'];
                                $order_date = $row['order_date'];
                                $status = $row['status'];
                                $customer_name = $row['name'];
                                $customer_contact = $row['contact'];
                                $customer_email = $row['email'];
                                $customer_address = $row['address'];
                                
                                ?>

                                    <tr>
                                        <td><?php echo $sn++; ?>. </td>
                                        <td><?php echo $food; ?></td>
                                        <td><?php echo $price; ?></td>
                                        <td><?php echo $qty; ?></td>
                                        <td><?php echo $total; ?></td>
                                        <td><?php echo $order_date; ?></td>

                                        <td>
                                            <?php 
                                               

                                                if($status=="Ordered")
                                                {
                                                    echo "<label>$status</label>";
                                                }
                                                elseif($status=="On Delivery")
                                                {
                                                    echo "<label style='color: brown;'>$status</label>";
                                                }
                                                elseif($status=="Delivered")
                                                {
                                                    echo "<label style='color: green;'>$status</label>";
                                                }
                                                elseif($status=="Cancelled")
                                                {
                                                    echo "<label style='color: red;'>$status</label>";
                                                }
                                            ?>
                                        </td>

                                        <td><?php echo $customer_name; ?></td>
                                        <td><?php echo $customer_contact; ?></td>
                                        <td><?php echo $customer_email; ?></td>
                                        <td><?php echo $customer_address; ?></td>
                                        <td>
                                            <a href="<?php echo SITEURL; ?>admin/update-order.php?id=<?php echo $id; ?>" class="btn btn-secondary">Update Order</a>
                                            <a href="<?php echo SITEURL; ?>admin/delete-oders.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="btn btn-delete">Delete Offers</a>
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