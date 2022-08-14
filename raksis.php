
    <?php include('partials-front/menu.php'); ?>

<!-- raksi sEARCH Section Starts Here -->
<section class="raksi-search text-center">
    <div class="container">
        
        <form action="<?php echo SITEURL; ?>raksi-search.php" method="POST">
            <input type="search" name="search" placeholder="Search for raksi.." required>
            <input type="submit" name="submit" value="Search" class="btn btn-primary">
        </form>

    </div>
</section>
<!-- raksi sEARCH Section Ends Here -->



<!-- raksi MEnu Section Starts Here -->
<section class="raksi-menu">
    <div class="container">
        <h2 class="text-center">Raksi Menu</h2>

        <?php 
            //Display raksis that are Active
            $sql = "SELECT * FROM tbl_raksi WHERE active='Yes'";

            //Execute the Query
            $res=mysqli_query($conn, $sql);

            //Count Rows
            $count = mysqli_num_rows($res);

            //CHeck whether the raksis are availalable or not
            if($count>0)
            {
                //raksis Available
                while($row=mysqli_fetch_assoc($res))
                {
                    //Get the Values
                    $id = $row['id'];
                    $title = $row['title'];
                    $description = $row['description'];
                    $price = $row['price'];
                    $image_name = $row['image_name'];
                    ?>
                    
                    <div class="raksi-menu-box">
                        <div class="raksi-menu-img">
                            <?php 
                                //CHeck whether image available or not
                                if($image_name=="")
                                {
                                    //Image not Available
                                    echo "<div class='error'>Image not Available.</div>";
                                }
                                else
                                {
                                    //Image Available
                                    ?>
                                    <img src="<?php echo SITEURL; ?>images/raksi/<?php echo $image_name; ?>" alt="Vodka Brand" class="img-responsive img-curve">
                                    <?php
                                }
                            ?>
                            
                        </div>

                        <div class="raksi-menu-desc">
                            <h4><?php echo $title; ?></h4>
                            <p class="raksi-price">Rs. <?php echo $price; ?></p>
                            <p class="raksi-detail">
                                <?php echo $description; ?>
                            </p>
                            <br>

                            <a href="<?php echo SITEURL; ?>order.php?raksi_id=<?php echo $id; ?>" class="btn btn-primary">Order Now</a>
                        </div>
                    </div>

                    <?php
                }
            }
            else
            {
                //raksi not Available
                echo "<div class='error'>raksi not found.</div>";
            }
        ?>

        

        

        <div class="clearfix"></div>

        

    </div>

</section>
<!-- raksi Menu Section Ends Here -->

<?php include('partials-front/footer.php'); ?>