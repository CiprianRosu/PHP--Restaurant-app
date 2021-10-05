<?php include('frontend-partials/menu.php');?>

   <?php 


if(isset($_POST['submit'])) 
{
    
    $customer_name = $_POST['full-name'];
    $persons = $_POST['persons'];
    $reservation_date = date("Y-m-d h:i:sa"); 
    $reservation_time = $_POST['appt'];
    $status = "Reserved"; 
    $customer_contact = $_POST['contact'];
    $customer_email = $_POST['email'];
    $customer_comment = $_POST['comment'];


    
    $query2 = "INSERT INTO reservation SET 
        name = '$customer_name',
        persons = $persons,  
        reservation_date = '$reservation_date',
        reservation_time = '$reservation_time',
        status = '$status',
        contact = '$customer_contact',
        email = '$customer_email',
        comment = '$customer_comment'
    ";
    
    $result2 = mysqli_query($connection, $query2);

    
    if($result2==true)
    {
        
        
        $_SESSION['reservation'] = "<div class='green text-center'>Reservation was made Successfully.</div>";
        header('location:'.SITEURL);
       
    }
    else
    {
        
        $_SESSION['reservation'] = "<div class='red text-center'>Failed to make reservation.</div>";
        header('location:'.SITEURL);
    }

}

?>
   
    
     <section class="food-search">
        <div class="container">
            
            <h2 class="text-center text-black">Fill out reservation form</h2>
                <br>
                <br>
                <br>
                <br>
            <form action="" method="POST" class="order">
                
                
                <fieldset>
                    
                    <div class="order-label">Full Name</div>
                    <input type="text" class="form-control" name="full-name" class="input-responsive" required>

                    <div class="order-label">Nr. of persons</div>
                    <input type="number" class="form-control" name="persons" class="input-responsive" value="1" required>

                    <div class="order-label"  for="appt">Select a time:</label>
                    <input type="time" id="appt" class="form-control" name="appt" class="input-responsive" required>

                    <div class="order-label">Phone Number</div>
                    <input type="tel" class="form-control" name="contact" class="input-responsive" required>

                    <div class="order-label">Email</div>
                    <input type="email" class="form-control" name="email" class="input-responsive" required>

                    <div class="order-label">Comment</div>
                    <textarea name="comment" class="form-control" rows="10" class="input-responsive" required></textarea>
                    <br>
                <br>
                    <input type="submit" name="submit" value="Send" class="btn btn-primary">
                </fieldset>

            </form>

            

        </div>
    </section> 

   

    




<?php include('frontend-partials/footer.php');?>