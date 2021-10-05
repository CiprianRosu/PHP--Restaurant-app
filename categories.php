<?php include('frontend-partials/menu.php');?>



 
  <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Menu</h2>

            <?php 

                
                $query = "SELECT * FROM category WHERE active='Yes'";

                
                $result = mysqli_query($connection, $query);

                $count = mysqli_num_rows($result);

              
                if($count>0)
                {
                    
                    while($row=mysqli_fetch_assoc($result))
                    {
                       
                        $id = $row['id'];
                        $title = $row['title'];
                        $image_name = $row['image_name'];
                        ?>
                        
                        <a href="<?php echo SITEURL; ?>category-foods.php?category_id=<?php echo $id; ?>">
                            <div class="box-3 float-container">
                                <?php 
                                    if($image_name=="")
                                    {
                                       
                                        echo "<div class='red'>Image not found.</div>";
                                    }
                                    else
                                    {
                                       
                                        ?>
                                        <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name; ?>" alt="Pizza" class="img-responsive img-curve">
                                        <?php
                                    }
                                ?>
                                

                                <h3 class="float-text text-white"><?php echo $title; ?></h3>
                            </div>
                        </a>

                        <?php
                    }
                }
                else
                {
                   
                    echo "<div class='red'>Category not found.</div>";
                }
            
            ?>
            

            <div class="clearfix"></div>
        </div>
    </section>
    

    <?php include('frontend-partials/footer.php');?>