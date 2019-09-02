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
                <!--Pagination start-->
                <?php
                    /*How many records you want to show in a single page.*/
                    $limit = 20;
                    /*How may adjacent page links should be shown on each side of the current page link.*/
                    $adjacents = 2;
                    /*Get total number of records */
                    $sql = "SELECT COUNT(*) 'total_rows' FROM `tbproductinfo` where status='active'";
                    $result=$db->select($sql);
                    if($result!=false)
                    {
                        $value=mysqli_fetch_array($result);
                        $row=mysqli_num_rows($result);
                        if($row>0)
                        {
                            $total_rows = $value['total_rows'];
                        }
                    }
                    $total_pages = ceil($total_rows / $limit);


                    if(isset($_GET['page']) && $_GET['page'] != "") {
                        $page = $_GET['page'];
                        $offset = $limit * ($page-1);
                    } else {
                        $page = 1;
                        $offset = 0;
                    }
                ?>
                
                <?php
                    $query="select iAutoId,vProductName,vImage1,vPrice from tbProductinfo where status='active' limit $offset, $limit ";
                    $data=$db->select($query);
                    while($productResult=$data->fetch_assoc())
                    {
                ?>
                <div class="col-lg-2 col-md-3 col-sm-4">
                    <div class="item">
                        <a href="product-single.php?id=<?php echo $productResult['iAutoId']; ?>"><img src="<?php echo $productResult['vImage1']; ?>" style="width:130px; height:160px;" alt="img"></a>
                        
                        <h3><a href="product-single.php?id=<?php echo $productResult['iAutoId']; ?>"><?php echo $productResult['vProductName']; ?></a></h3>
                        <h6><span class="price">TK <?php echo $productResult['vPrice']; ?></span> / <a href="product-single.php?id=<?php echo $productResult['iAutoId']; ?>">View</a></h6>
                    </div>
                </div>
                
                <?php 
                    }
                ?>
            </div>
            <div class="btn-sec">
                <?php 
				//Checking if the adjacent plus current page number is less than the total page number.
				//If small then page link start showing from page 1 to upto last page.
				if($total_pages <= (1+($adjacents * 2))) {
					$start = 1;
					$end   = $total_pages;
				} else {
					if(($page - $adjacents) > 1) {				   //Checking if the current page minus adjacent is greateer than one.
						if(($page + $adjacents) < $total_pages) {  //Checking if current page plus adjacents is less than total pages.
							$start = ($page - $adjacents);         //If true, then we will substract and add adjacent from and to the current page number  
							$end   = ($page + $adjacents);         //to get the range of the page numbers which will be display in the pagination.
						} else {								   //If current page plus adjacents is greater than total pages.
							$start = ($total_pages - (1+($adjacents*2)));  //then the page range will start from total pages minus 1+($adjacents*2)
							$end   = $total_pages;						   //and the end will be the last page number that is total pages number.
						}
					} else {									   //If the current page minus adjacent is less than one.
						$start = 1;                                //then start will be start from page number 1
						$end   = (1+($adjacents * 2));             //and end will be the (1+($adjacents * 2)).
					}
				}
				//If you want to display all page links in the pagination then
				//uncomment the following two lines
				//and comment out the whole if condition just above it.
				/*$start = 1;
				$end = $total_pages;*/
				?>
                <?php if($total_pages > 1) { ?>
					<ul class="pagination pagination-sm justify-content-center">
						<!-- Link of the first page -->
						<li class='page-item <?php ($page <= 1 ? print 'disabled' : '')?>'>
							<a class='page-link' href='?page=1'>&lt;&lt;</a>
						</li>
						<!-- Link of the previous page -->
						<li class='page-item <?php ($page <= 1 ? print 'disabled' : '')?>'>
							<a class='page-link' href='?page=<?php ($page>1 ? print($page-1) : print 1)?>'>&lt;</a>
						</li>
						<!-- Links of the pages with page number -->
						<?php for($i=$start; $i<=$end; $i++) { ?>
						<li class='page-item <?php ($i == $page ? print 'active' : '')?>'>
							<a class='page-link' href='?page=<?php echo $i;?>'><?php echo $i;?></a>
						</li>
						<?php } ?>
						<!-- Link of the next page -->
						<li class='page-item <?php ($page >= $total_pages ? print 'disabled' : '')?>'>
							<a class='page-link' href='?page=<?php ($page < $total_pages ? print($page+1) : print $total_pages)?>'>&gt;</a>
						</li>
						<!-- Link of the last page -->
						<li class='page-item <?php ($page >= $total_pages ? print 'disabled' : '')?>'>
							<a class='page-link' href='?page=<?php echo $total_pages;?>'>&gt;&gt;</a>
						</li>
					</ul>
				<?php } ?>
                    
                <!--Pagination End-->
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