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
<?php
    if(isset($_SESSION['order']))
    {
        echo $_SESSION['order'];
        unset($_SESSION['order']);
    }
?>
<?php 
        
        if(isset($_GET['category_id']))
        {
            
            $category_id = $_GET['category_id'];
            
            $query = "SELECT title FROM category WHERE id=$category_id";

            
            $result = mysqli_query($connection, $query);

            
            $row = mysqli_fetch_assoc($result);
           
            $category_title = $row['title'];
        }
        else
        {
            
            header('location:'.SITEURL);
        }
    ?>


    



   
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>

            <?php 
            
                
                $query2 = "SELECT * FROM food WHERE category_id=$category_id";

              
                $result2 = mysqli_query($connection, $query2);

               
                $count2 = mysqli_num_rows($result2);

               
                if($count2>0)
                {
                   
                    while($row2=mysqli_fetch_assoc($result2))
                    {
                        $id = $row2['id'];
                        $title = $row2['title'];
                        $price = $row2['price'];
                        $description = $row2['description'];
                        $image_name = $row2['image_name'];
                        ?>
                        
                        <div class="food-menu-box">
                            <div class="food-menu-img">
                                <?php 
                                    if($image_name=="")
                                    {
                                        
                                        echo "<div class='red'>Image not Available.</div>";
                                    }
                                    else
                                    {
                                      
                                        ?>
                                        <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>" alt="Amaizing Burger" class="img-responsive img-curve">
                                        <?php
                                    }
                                ?>
                                
                            </div>

                            <div class="food-menu-desc">
                            <br>
                            <form method="post" >
                                  <div>
                                  <h4><?php echo $title; ?></h4>
                                  <p class="food-detail"><?php echo $description; ?> </p>
                                
                                  <p class="food-price">DK<?php echo $price; ?></p>
                                    <input type="hidden" name="id" value="<?php echo $id; ?>" />
                                    <input type="hidden" name="title" value="<?php echo $title; ?>" />
                                    <input type="hidden" name="price" value="<?php echo $price; ?>" />

                                    <input type="number" name="qty" class="input-responsive" style="width: 50px;" value="1" required>

                                    <input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success" value="Add" />

                                  </div>
                          </form>
                    <!-- <a href="<?php echo SITEURL; ?>order-details.php?food_id=<?php echo $id; ?>" class="btn btn-primary">Order Now</a>  -->
                        </div>
                        </div>

                        <?php
                    }
                }
                else
                {
                    //Food not available
                    echo "<div class='red'>Food not Available.</div>";
                }
            
            ?>

            

            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->

    <?php include('frontend-partials/footer.php');?>