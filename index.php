<?php include('partials-front/menu.php'); ?>

<!-- raksi sEARCH Section Starts Here -->
<section class="raksi-search text-center">
    <div class="container">
        
        <form action="<?php echo SITEURL; ?>raksi-search.php" method="POST">
            <input type="search" name="search" placeholder="Search raksis" required>
            <input type="submit" name="submit" value="Search" class="btn btn-primary">
        </form>

    </div>
</section>
<!-- raksi sEARCH Section Ends Here -->

<?php 
    if(isset($_SESSION['order']))
    {
        echo $_SESSION['order'];
        unset($_SESSION['order']);
    }
?>

<!-- CAtegories Section Starts Here -->
<section class="categories">
    <div class="container">
        <h2 class="text-center">Explore Various Raksi Categories</h2>

        <?php 
            //Create SQL Query to Display CAtegories from Database
            $sql = "SELECT * FROM tbl_category WHERE active='Yes' AND featured='Yes' ORDER BY id DESC LIMIT 3";
            //Execute the Query
            $res = mysqli_query($conn, $sql);
            //Count rows to check whether the category is available or not
            $count = mysqli_num_rows($res);

            if($count>0)
            {
                //CAtegories Available
                while($row=mysqli_fetch_assoc($res))
                {
                    //Get the Values like id, title, image_name
                    $id = $row['id'];
                    $title = $row['title'];
                    $image_name = $row['image_name'];
                    ?>
                    
                    <a href="<?php echo SITEURL; ?>category-raksis.php?category_id=<?php echo $id; ?>">
                        <div class="box-3 float-container">
                            <?php 
                                //Check whether Image is available or not
                                if($image_name=="")
                                {
                                    //Display MEssage
                                    echo "<div class='error'>Image not Available</div>";
                                }
                                else
                                {
                                    //Image Available
                                    ?>
                                    <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name; ?>" alt="Beer" class="img-responsive img-curve">
                                    <?php
                                }
                            ?>
                            

                            <h3 class="float-text text-white" ><mark style="background-color:white;"><?php echo $title; ?></mark></h3>
                        </div>
                    </a>

                    <?php
                }
            }
            else
            {
                //Categories not Available
                echo "<div class='error'>Category not Added.</div>";
            }
        ?>


        <div class="clearfix"></div>
    </div>
</section>
<!-- Categories Section Ends Here -->



<!-- raksi MEnu Section Starts Here -->
<section class="raksi-menu">
    <div class="container">
        <h2 class="text-center">Raksi Menu</h2>

        <?php 
        
        //Getting raksis from Database that are active and featured
        //SQL Query
        $sql2 = "SELECT * FROM tbl_raksi WHERE active='Yes' AND featured='Yes' LIMIT 6";

        //Execute the Query
        $res2 = mysqli_query($conn, $sql2);

        //Count Rows
        $count2 = mysqli_num_rows($res2);

        //CHeck whether raksi available or not
        if($count2>0)
        {
            //raksi Available
            while($row=mysqli_fetch_assoc($res2))
            {
                //Get all the values
                $id = $row['id'];
                $title = $row['title'];
                $price = $row['price'];
                $description = $row['description'];
                $image_name = $row['image_name'];
                ?>

                <div class="raksi-menu-box">
                    <div class="raksi-menu-img">
                        <?php 
                            //Check whether image available or not
                            if($image_name=="")
                            {
                                //Image not Available
                                echo "<div class='error'>Image not available.</div>";
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
            echo "<div class='error'>raksi not available.</div>";
        }
        
        ?>

        



        <div class="clearfix"></div>

        

    </div>

    <p class="text-center">
        <a href="#">See All raksis</a>
    </p>
</section>
<!-- raksi Menu Section Ends Here -->


<?php include('partials-front/footer.php'); ?>