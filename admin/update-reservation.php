<?php include('partials/menu.php'); ?>

<div class="container">
    
        <h1>Update Reservation</h1>
        <br><br>


        <?php 
        error_reporting(0);
            
            if(isset($_GET['id']))
            {
                
                $id=$_GET['id'];

              
                $query = "SELECT * FROM reservation WHERE id=$id";
                
                $result = mysqli_query($connection, $query);
                
                $count = mysqli_num_rows($result);

                if($count==1)
                {
                    
                    $row=mysqli_fetch_assoc($result);

                    
                                $customer_name = $row['full-name'];
                                $persons = $row['persons'];
                                $reservation_date = date("Y-m-d h:i:sa"); 
                                $reservation_time = $row['appt'];
                                $status = "Reserved";  
                                $customer_contact = $row['contact'];
                                $customer_email = $row['email'];
                                $customer_comment = $row['comment'];
                }
                else
                {
                   
                    header('location:'.SITEURL.'admin/reservation-management.php');
                }
            }
            else
            {
                
                header('location:'.SITEURL.'admin/reservation-management.php');
            }
        
        ?>
<?php 

            
            if(isset($_POST['submit']))
            {
               
                $id = $_POST['id'];
                $customer_name = $_POST['full-name'];
                $persons = $_POST['persons'];
                $reservation_date = date("Y-m-d h:i:sa");
                $reservation_time = $_POST['appt'];
                $status = "Reserved";  
                $customer_contact = $_POST['contact'];
                $customer_email = $_POST['email'];
                $customer_comment = $_POST['comment'];

                
                $query2 = "UPDATE reservation SET 
                         name = '$customer_name',
                        persons = $persons,  
                        reservation_date = '$reservation_date',
                        reservation_time = '$reservation_time',
                        status = '$status',
                        contact = '$customer_contact',
                        email = '$customer_email',
                        comment = '$customer_comment'
                    WHERE id=$id
                ";

                
                $result2 = mysqli_query($connection, $query2);

                
                if($result2==true)
                {
                   
                    $_SESSION['update'] = "<div class='green'>Reservation Updated Successfully.</div>";
                    header('location:'.SITEURL.'admin/reservation-management.php');
                }
                else
                {
                   
                    $_SESSION['update'] = "<div class='red'>Failed to Update Reservation.</div>";
                    header('location:'.SITEURL.'admin/reservation-management.php');
                }
            }
        ?>
        <form action="" method="POST">
        
            <table class="tbl-30">
                <tr>
                    <td>Customer Name</td>
                    <td><b> <?php echo $customer_name; ?> </b></td>
                </tr>

                <tr>
                    <td>Nr Persons</td>
                    <td>
                        <input type="number" class="form-control" name="qty" value="<?php echo $persons; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Status</td>
                    <td>
                        <select name="status">
                            <option <?php if($status=="Reserved"){echo "selected";} ?> value="Ordered">Ordered</option>
                            
                            <option <?php if($status=="Cancelled"){echo "selected";} ?> value="Cancelled">Cancelled</option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>Reservation Date: </td>
                    <td>
                        <input type="text" class="form-control" name="customer_name" value="<?php echo $reservation_date; ?>">
                    </td>
                </tr>

                
                <tr>
                    <td>Customer Contact: </td>
                    <td>
                        <input type="text" class="form-control" name="customer_contact" value="<?php echo $customer_contact; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Customer Email: </td>
                    <td>
                        <input type="text" class="form-control" name="customer_email" value="<?php echo $customer_email; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Customer Address: </td>
                    <td>
                        <textarea name="customer_address" class="form-control" cols="30" rows="5"><?php echo $customer_comment; ?></textarea>
                    </td>
                </tr>

                <tr>
                    <td clospan="2">
                        <input type="hidden" class="form-control" name="id" value="<?php echo $id; ?>">
                        <input type="hidden" class="form-control" name="price" value="<?php echo $price; ?>">

                        <input type="submit" class="form-control" name="submit" value="Update Order" class="btn btn-primary">
                    </td>
                </tr>
            </table>
        
        </form>


        


    </div>
</div>

<?php include('partials/footer.php'); ?>
