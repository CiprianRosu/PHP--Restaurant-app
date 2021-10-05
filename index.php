<?php include('frontend-partials/menu.php');?>
<?php
if(isset($_POST["add_to_cart"]))
{
	if(isset($_SESSION["shopping_cart"]))
	{
		$item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
		if(!in_array($_POST["id"], $item_array_id))
		{
			$count = count($_SESSION["shopping_cart"]);
			$item_array = array(
				'item_id'			=>	$_POST["id"],
				'qty'			=>	$_POST["qty"],
        'price'			=>	$_POST["price"],
        'title'			=>	$_POST["title"]
        
				
			);
			$_SESSION["shopping_cart"][$count] = $item_array;
		}
		else
		{
			echo '<script>alert("Item Already Added")</script>';
		}
	}
	else
	{
		$item_array = array(
      'item_id'			=>	$_POST["id"],
      'qty'			=>	$_POST["qty"],
      'price'			=>	$_POST["price"],
      'title'			=>	$_POST["title"]
		);
		$_SESSION["shopping_cart"][0] = $item_array;
	}
  
}
?>

<div style="height: 50%">
<br>


<div id="myCarousel" class=".carousel-fade" data-ride="carousel">   
    
    

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <img src="images/banner-pizza.jpg" alt="Pasta" style="height:600px; width:100%;">
        <div class="carousel-caption">
          
          <p></p>
        </div>      
      </div>

      <div class="item">
        <img src="images/pasta-banner.jpg" alt="Pizza" style="height:600px; width:100%;">
        <div class="carousel-caption">
          
          <p></p>
        </div>      
      </div>
    
      <div class="item">
        <img src="images/Beef-Burger-banner.jpg" alt="Burger" style="height:600px; width:100%;">
        <div class="carousel-caption">
          
          <p></p>
        </div>      
      </div>
    </div>

    <?php
 if(isset($_SESSION['order-offers']))  
 {
     echo $_SESSION['order-offers']; 
     unset($_SESSION['order-offers']); 

 }

?>
</div>
</div>
  
<section id="menu" class="parallax-section">
	<div class="container">
		<div class="row">
			<div class="col-md-offset-2 col-md-8 col-sm-12 text-center">
				<h1 class="heading">Breakfast Offers</h1>
				<hr>
			</div>
            
            

            <?php 
            $query2 = "SELECT * FROM offers WHERE active='Yes' LIMIT 13";
            $result2 = mysqli_query($connection, $query2);
            $count2 = mysqli_num_rows($result2);

            if($count2>0)
            {
                
                while($row=mysqli_fetch_assoc($result2))
                {
                    
                    $id = $row['id'];
                    $title = $row['title'];
                    $price = $row['price'];
                    $description = $row['description'];
                    $image_name = $row['image_name'];
                    ?>

                    
                        <div class="food-menu-img">
                    
                            
                        </div>
                        
				
			
                      <div class="col-md-6 col-sm-6"> 
                            
                            <br>
                            <form method="post" >
                                  <div>
                                  <h5><?php echo $title; ?> ............................................ <span><?php echo $price; ?>DK</span>
                                    <input type="submit" name="add_to_cart" style="margin-top:5px; float:right" class="btn btn-success" value="Add" /></h5>
				                            <h6><?php echo $description; ?><input type="number" name="qty" class="input-responsive" style="width: 50px; line-height: 1; float:right" value="1" required></h6>
                                   <h4> <input type="hidden" name="id" value="<?php echo $id; ?>" /></h4>
                                    <input type="hidden" name="title" value="<?php echo $title; ?>" />
                                    <input type="hidden" name="price" value="<?php echo $price; ?>" />
                                    
                                  </div>
                          </form>
                    <!-- <a href="<?php echo SITEURL; ?>order-details.php?food_id=<?php echo $id; ?>" class="btn btn-primary">Order Now</a>  -->
                        </div>
                    

                    <?php
                }
            }
            else
            {
                 
                echo "<div class='red'>Offer not available.</div>";
            }
            
            ?>

        </div>

  
			
		
		</div>
	</div>

    </section>
   

    <?php include('frontend-partials/footer.php');?>