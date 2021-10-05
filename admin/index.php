<?php include('partials/menu.php') ?>
<br>
<br>
<br>
<div class="text-center">
<h1>Dashboard</h1>
<br>
<br>
<br>
<br>
<br>
<br>
</div>
 
 <div class="container px-5 py-5">
            <div class="row">
                
                <br><br>
                <?php 
                    if(isset($_SESSION['login']))
                    {
                        echo $_SESSION['login'];
                        unset($_SESSION['login']);
                    }
                ?>
                <br><br>

                <div class="col mx-1">

                    <?php 
                         
                        $query = "SELECT * FROM category";
                        
                        $result = mysqli_query($connection, $query);
                        
                        $count = mysqli_num_rows($result);
                    ?>
                    <br />
                    <h1 class="color text-center"><?php echo $count; ?></h1>
                    <br />
                    <p class="p text-center">Categories</p>
                </div>

                <div class="col mx-1">

                    <?php 
                      
                        $query2 = "SELECT * FROM food";
                        
                        $result2 = mysqli_query($connection, $query2);
                        
                        $count2 = mysqli_num_rows($result2);
                    ?>
                    <br />
                    <h1 class="color text-center"><?php echo $count2; ?></h1>
                    <br />
                    <p class="p text-center">Foods</p>
                </div>

                <div class="col mx-1">
                    
                    <?php 
                         
                        $query3 = "SELECT * FROM order_table";     
                        $result3 = mysqli_query($connection, $query3);    
                        $count3 = mysqli_num_rows($result3);
                    ?>
                    <br />
                    <h1 class="color text-center"><?php echo $count3; ?></h1>
                    <br />
                    <p class="p text-center">Orders</p>
                </div>
                <div class="col mx-1">
                    
                    <?php 
                         
                        $query5 = "SELECT * FROM reservation";         
                        $result5 = mysqli_query($connection, $query5);        
                        $count5 = mysqli_num_rows($result5);
                    ?>
                    <br />
                    <h1 class="color text-center"><?php echo $count5; ?></h1>
                    <br />
                    <p class="p text-center">Reservations</p>
                </div>

                <div class="col mx-1">
                    
                    <?php 
                      
                        $query4 = "SELECT SUM(total) AS Total FROM order_table WHERE status='Delivered'";
                        $result4 = mysqli_query($connection, $query4);
                        $row4 = mysqli_fetch_assoc($result4);
                        $total_revenue = $row4['Total'];

                    ?>
                    <br />
                    <h1 class="color text-center">DK<?php echo $total_revenue; ?></h1>
                    <br />
                    <p class="p text-center">Profit</p>
                </div>

                

            </div>
        </div>
        

<?php include('partials/footer.php') ?>