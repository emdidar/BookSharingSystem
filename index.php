<?php
	include 'inc/header.php';
	include 'inc/slider.php';
?>
    <section class="recent-book-sec">
        <div class="container">
            <div class="title">
                <h2>LATEST PRODUCTS</h2>
                <hr>
            </div>
            <div class="row">
                <?php
                    $query="select iAutoId,vProductName,vImage1,vPrice from tbProductinfo where status='active' limit 20";
                    $data=$db->select($query);
                    while($productResult=$data->fetch_assoc())
                    {
                ?>
                <div class="col-lg-2 col-md-3 col-sm-4">
                    <div class="item">
                        <a href="product-single.php?id=<?php echo $productResult['iAutoId']; ?>"><img src="<?php echo $productResult['vImage1']; ?>" alt="img"></a>
                        
                        <h3><a href="product-single.php?id=<?php echo $productResult['iAutoId']; ?>"><?php echo $productResult['vProductName']; ?></a></h3>
                        <h6><span class="price">TK <?php echo $productResult['vPrice']; ?></span> / <a href="product-single.php?id=<?php echo $productResult['iAutoId']; ?>">View</a></h6>
                    </div>
                </div>
                
                <?php 
                    }
                ?>
            </div>
            <div class="btn-sec">
                <a href="shop.php" class="btn gray-btn">view all books</a>
            </div>
        </div>
    </section>
    <section class="about-sec">
        <div class="about-img">
            <figure style="background:url(./images/about-img.jpg)no-repeat;"></figure>
        </div>
        <div class="about-content">
            <h2>About Book Sharing System,</h2>
            <p>To manage book for poor student who can't buy the book.Find nearest books location. </p>
            <p>To Save money for user.Find those books which are not available in the library</p>
            <div class="btn-sec">
                <a href="shop.php" class="btn yellow">shop books</a>
                <!--<a href="login.php" class="btn black">subscriptions</a>-->
            </div>
        </div>
    </section>
    
    <!--<section class="recomended-sec">
        <div class="container">
            <div class="title">
                <h2>highly recommendes books</h2>
                <hr>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="item">
                        <img src="images/img1.jpg" alt="img">
                        <h3>how to be a bwase</h3>
                        <h6><span class="price">tk149</span> / <a href="product-single.php">Buy Now</a></h6>
                        <div class="hover">
                            <a href="product-single.php">
                            <span><i class="fa fa-long-arrow-right" aria-hidden="true"></i></span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="item">
                        <img src="images/img2.jpg" alt="img">
                        <h3>How to write a book...</h3>
                        <h6><span class="price">tk119</span> / <a href="product-single.php">Buy Now</a></h6>
                        <span class="sale">Sale !</span>
                        <div class="hover">
                            <a href="product-single.php">
                            <span><i class="fa fa-long-arrow-right" aria-hidden="true"></i></span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="item">
                        <img src="images/img3.jpg" alt="img">
                        <h3>7-day self publish...</h3>
                        <h6><span class="price">tk149</span> / <a href="product-single.php">Buy Now</a></h6>
                        <div class="hover">
                            <a href="product-single.php">
                            <span><i class="fa fa-long-arrow-right" aria-hidden="true"></i></span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="item">
                        <img src="images/img4.jpg" alt="img">
                        <h3>wendy doniger</h3>
                        <h6><span class="price">tk49</span> / <a href="product-single.php">Buy Now</a></h6>
                        <div class="hover">
                            <a href="product-single.php">
                            <span><i class="fa fa-long-arrow-right" aria-hidden="true"></i></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>-->
    
<?php
	include 'inc/footer.php';
?>