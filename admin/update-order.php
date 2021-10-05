<?php include('partials/menu.php'); ?>

<div class="container">
<br><br><br>
        <h1>Update Order</h1>
        <br><br>


        <?php 
        
            
            if(isset($_GET['id']))
            {
                
                $id=$_GET['id'];

                
                $query = "SELECT * FROM order_table WHERE id=$id";
                
                $result = mysqli_query($connection, $query);
                
                $count = mysqli_num_rows($result);

                if($count==1)
                {
                    
                    $row=mysqli_fetch_assoc($result);

                    $food = $row['food'];
                    $price = $row['price'];
                    $qty = $row['quantity'];
                    $status = $row['status'];
                    $customer_name = $row['name'];
                    $customer_contact = $row['contact'];
                    $customer_email = $row['email'];
                    $customer_address= $row['address'];
                }
                else
                {
                    
                    header('location:'.SITEURL.'admin/order-management.php');
                }
            }
            else
            {
                
                header('location:'.SITEURL.'admin/order-management.php');
            }
        
        ?>
<?php 
            
            if(isset($_POST['submit']))
            {
                
                $id = $_POST['id'];
                $price = $_POST['price'];
                $qty = $_POST['qty'];

                $total = $price * $qty;

                $status = $_POST['status'];

                $customer_name = $_POST['customer_name'];
                $customer_contact = $_POST['customer_contact'];
                $customer_email = $_POST['customer_email'];
                $customer_address = $_POST['customer_address'];

               
                $query2 = "UPDATE order_table SET 
                    quantity = $qty,
                    total = $total,
                    status = '$status',
                    name = '$customer_name',
                    contact = '$customer_contact',
                    email = '$customer_email',
                    address = '$customer_address'
                    WHERE id=$id
                ";

               
                $result2 = mysqli_query($connection, $query2);

               
                if($result2==true)
                {
                    
                    
                    header('location:'.SITEURL.'admin/order-management.php');
                }
                else
                {

                    header('location:'.SITEURL.'admin/order-management.php');
                }
            }
        ?>
        <form action="" method="POST">
        
            <table class="tbl-30">
                <tr>
                    <td>Food Name</td>
                    <td><b> <?php echo $food; ?> </b></td>
                </tr>

                <tr>
                    <td>Price</td>
                    <td>
                        <b> $ <?php echo $price; ?></b>
                    </td>
                </tr>

                <tr>
                    <td>Qty</td>
                    <td>
                        <input type="number" name="qty" class="form-control" value="<?php echo $qty; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Status</td>
                    <td>
                        <select name="status" class="form-control">
                            <option <?php if($status=="Ordered"){echo "selected";} ?> value="Ordered">Ordered</option>
                            <option <?php if($status=="On Delivery"){echo "selected";} ?> value="On Delivery">On Delivery</option>
                            <option <?php if($status=="Delivered"){echo "selected";} ?> value="Delivered">Delivered</option>
                            <option <?php if($status=="Cancelled"){echo "selected";} ?> value="Cancelled">Cancelled</option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>Customer Name: </td>
                    <td>
                        <input type="text" name="customer_name" class="form-control" value="<?php echo $customer_name; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Customer Contact: </td>
                    <td>
                        <input type="text" name="customer_contact" class="form-control" value="<?php echo $customer_contact; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Customer Email: </td>
                    <td>
                        <input type="text" name="customer_email" class="form-control" value="<?php echo $customer_email; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Customer Address: </td>
                    <td>
                        <textarea name="customer_address" class="form-control" cols="30" rows="5"><?php echo $customer_address; ?></textarea>
                    </td>
                </tr>

                <tr>
                    <td clospan="2">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="hidden" name="price" value="<?php echo $price; ?>">

                        <input type="submit" name="submit" value="Update Order" class="btn btn-primary">
                    </td>
                </tr>
            </table>
        
        </form>


        


    </div>
</div>

<?php include('partials/footer.php'); ?>
