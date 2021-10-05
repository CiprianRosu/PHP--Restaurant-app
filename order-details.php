<?php include('frontend-partials/menu.php');?>

<?php
if(isset($_GET["action"]))
{
	if($_GET["action"] == "delete")
	{
		foreach($_SESSION["shopping_cart"] as $keys => $values)
		{
			if($values["item_id"] == $_GET["id"])
			{
				unset($_SESSION["shopping_cart"][$keys]);
				echo '<script>alert("Item Removed")</script>';
				
			}
		}
	}
    elseif($_GET["action"] == "Buy")
	{
      $results=array();
    $customer_name = $_GET['full-name'];
    $customer_contact = $_GET['contact'];
    $customer_email = $_GET['email'];
    $customer_address = $_GET['address'];
		foreach($_SESSION["shopping_cart"] as $keys => $values)
		{
			$food = $values["title"];
            $price = $values["price"];
            $qty= $values["qty"];
            $total = $price * $qty;
            $order_date = date("Y-m-d h:i:sa"); 
            $status = "Ordered";
            $query2 = "INSERT INTO order_table SET 
            food = '$food',
            price = $price,
            quantity = $qty,
            total = $total,
            order_date = '$order_date',
            status = '$status',
            name = '$customer_name',
            contact = '$customer_contact',
            email = '$customer_email',
            address = '$customer_address'
        ";
    
        
    
        
        $result2 = mysqli_query($connection, $query2);
            array_push($results , $result2);
            
       	
			
		}
        for($var = 0; $var < sizeof($results); $var++){
            if($results[$var]==false){
                
                 $_SESSION['order-offers'] = "<div class='red text-center'>Failed to complete the order .</div>";
          header('location:'.SITEURL);
            }
            
        }
       
        $_SESSION['order-offers'] = "<div class='green text-center'>The order is completed.</div>";
                header('location:'.SITEURL);

        
		
			
				unset($_SESSION["shopping_cart"]);
				
				
			
		
	}
}

?>


			<div class="container">
			<h1>Order Details</h1>
			<div class="table-responsive">
				<table class="table table-bordered">
					<tr>
						<th width="40%">Item Name</th>
						<th width="10%">Quantity</th>
						<th width="20%">Price</th>
						<th width="15%">Total</th>
						<th width="5%">Action</th>
					</tr>
					<?php
					if(!empty($_SESSION["shopping_cart"]))
					{
						$total = 0;
						foreach($_SESSION["shopping_cart"] as $keys => $values)
						{
					?>
					<tr>
						<td><?php echo $values["title"]; ?></td>
						<td><?php echo $values["qty"]; ?></td>
						<td>$ <?php echo $values["price"]; ?></td>
						<td>$ <?php echo number_format($values["qty"] * $values["price"], 2);?></td>
						<td><a href="order-details.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Remove</span></a></td>
					</tr>
					<?php
							$total = $total + ($values["qty"] * $values["price"]);
						}
					?>
					<tr>
						<td colspan="3" align="right">Total</td>
						<td align="right">$ <?php echo number_format($total, 2); ?></td>
						<td></td>
					</tr>
					<?php
					}
					?>
                
                </table>
                <form method="GET">
                <fieldset>
                    <legend>Delivery Details</legend>
                    <div class="order-label">Full Name</div>
                    <input type="text" class="form-control" name="full-name" class="input-responsive" required>

                    <div class="order-label">Phone Number</div>
                    <input type="tel" class="form-control" name="contact" class="input-responsive" required>

                    <div class="order-label">Email</div>
                    <input type="email" class="form-control" name="email" class="input-responsive" required>

                    <div class="order-label">Address</div>
                    <textarea name="address" class="form-control" rows="10" class="input-responsive" required></textarea>
						<br><br>
                    <input type="submit" name="action" value="Buy" class="btn btn-primary">
                </fieldset>
                </form>
                </div>
				</div>


























<?php include('frontend-partials/footer.php');?>