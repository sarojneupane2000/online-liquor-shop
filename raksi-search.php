
    <?php include('partials-front/menu.php'); ?>

<!-- raksi sEARCH Section Starts Here -->
<section class="raksi-search text-center">
    <div class="container">
        <?php 

            //Get the Search Keyword
            $search = $_POST['search'];
        
        ?>


        <h2><a href="#" class="text-white">raksis on Your Search "<?php echo $search; ?>"</a></h2>

    </div>
</section>
<!-- raksi sEARCH Section Ends Here -->



<!-- raksi MEnu Section Starts Here -->
<section class="raksi-menu">
    <div class="container">
        <h2 class="text-center">raksi Menu</h2>

        <?php 

            //SQL Query to Get raksis based on search keyword
            $sql = "SELECT * FROM tbl_raksi WHERE title LIKE '%$search%' OR description LIKE '%$search%'";

            //Execute the Query
            $res = mysqli_query($conn, $sql);

            //Count Rows
            $count = mysqli_num_rows($res);

            //Check whether raksi available of not
            if($count>0)
            {
                //raksi Available
                while($row=mysqli_fetch_assoc($res))
                {
                    //Get the details
                    $id = $row['id'];
                    $title = $row['title'];
                    $price = $row['price'];
                    $description = $row['description'];
                    $image_name = $row['image_name'];
                    ?>

                    <div class="raksi-menu-box">
                        <div class="raksi-menu-img">
                            <?php 
                                // Check whether image name is available or not
                                if($image_name=="")
                                {
                                    //Image not Available
                                    echo "<div class='error'>Image not Available.</div>";
                                }
                                else
                                {
                                    //Image Available
                                    ?>
                                    <img src="<?php echo SITEURL; ?>images/raksi/<?php echo $image_name; ?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
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
                //raksi Not Available
                echo "<div class='error'>raksi not found.</div>";
            }
        
        ?>

        

        <div class="clearfix"></div>

        

    </div>

</section>
<!-- raksi Menu Section Ends Here -->

<?php include('partials-front/footer.php'); ?>