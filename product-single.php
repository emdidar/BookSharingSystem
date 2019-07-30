<?php
	include 'inc/header.php';
?>
<?php
	if(!isset($_GET['id']) || $_GET['id']==NULL)
	{
		header("Location:index.php");
	}
	else
	{
		//$id=$_GET['id'];
		$id=mysqli_real_escape_string($db->link,$_GET['id']);
        $categoryId="";
	}
?>
    <div class="breadcrumb">
        <div class="container">
            <a class="breadcrumb-item" href="index.php">Home</a>
            <span class="breadcrumb-item active">Product</span>
        </div>
    </div>
    <section class="product-sec">
        <div class="container">
        <?php
            $query="select *,(select vEmployeeName from tbLogin where iAutoId=a.vUploadBy)vEmployeeName from tbProductinfo a where iAutoId='$id' order by iAutoId desc";
            $data=$db->select($query);
            while($productResult=$data->fetch_assoc())
            {
                $categoryId=$productResult['vCategory'];
        ?> 
            <h1><?php echo $productResult['vProductName'];?></h1>
            <div class="row">
                <div class="col-md-6 slider-sec">
                    <!-- main slider carousel -->
                    <div id="myCarousel" class="carousel slide">
                        <!-- main slider carousel items -->
                        <div class="carousel-inner">
                            <div class="active item carousel-item" data-slide-number="0">
                                <img src="<?php echo $productResult['vImage1'];?>" class="img-fluid">
                            </div>
                            <div class="item carousel-item" data-slide-number="1">
                                <img src="<?php echo $productResult['vImage2'];?>" class="img-fluid">
                            </div>
                            <div class="item carousel-item" data-slide-number="2">
                                <img src="<?php echo $productResult['vImage3'];?>" class="img-fluid">
                            </div>
                        </div>
                        <!-- main slider carousel nav controls -->
                        <ul class="carousel-indicators list-inline">
                            <li class="list-inline-item active">
                                <a id="carousel-selector-0" class="selected" data-slide-to="0" data-target="#myCarousel">
                                <img src="<?php echo $productResult['vImage1'];?>" class="img-fluid">
                            </a>
                            </li>
                            <li class="list-inline-item">
                                <a id="carousel-selector-1" data-slide-to="1" data-target="#myCarousel">
                                <img src="<?php echo $productResult['vImage2'];?>" class="img-fluid">
                            </a>
                            </li>
                            <li class="list-inline-item">
                                <a id="carousel-selector-2" data-slide-to="2" data-target="#myCarousel">
                                <img src="<?php echo $productResult['vImage3'];?>" class="img-fluid">
                            </a>
                            </li>
                        </ul>
                    </div>
                    <!--/main slider carousel-->
                </div>
                <div class="col-md-6 slider-content">
                    <?php
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') 
                    {
                        if($_POST['mybutton'] == 'buyNow')
                        {

                            $queryDelete="delete from tbcart where vUserIp='$vUserIp'";
                            $deleteData=$db->delete($queryDelete);
                            
                            $vProductId=mysqli_real_escape_string($db->link,$_POST['vProductId']);
                            $vProductName=mysqli_real_escape_string($db->link,$_POST['vProductName']);
                            $vUploadBy=mysqli_real_escape_string($db->link,$_POST['vUploadBy']);
                            $vPrice=mysqli_real_escape_string($db->link,$_POST['vPrice']);

                            $query = "insert into tbcart (vUserIp,vProductId,vProductName,vUploadBy,vPrice) 
                                    values('$vUserIp','$vProductId','$vProductName','$vUploadBy','$vPrice')";

                            $dataInsert = $db->insert($query);
                            if ($dataInsert) 
                            {
                                echo "<script>location='cart.php'</script>";
                            } 
                            else {
                                echo "<script>location='index.php'</script>";
                            }
                        }
                    }
                    ?>
                    <form action="" method="post">
                        <p><?php echo $productResult['vDescription'];?></p>
                        <p><span>Author Name: </span> <?php echo $productResult['vAuthorName'];?></p>
                        <p><span>Upload by: </span><a href="userProfile.php?id=<?php echo $productResult['vUploadBy'];?>"><?php echo $productResult['vEmployeeName'];?></a>  </p>
                        <ul>
                            <li>
                                <span class="name">Price</span><span class="clm">:</span>
                                <span class="price final"><?php echo $productResult['vPrice'];?> Tk</span>
                            </li>
                        </ul>
                        <input type="hidden" name="vProductId" value="<?php echo $productResult['iAutoId']; ?>"/>
                        <input type="hidden" name="vProductName" value="<?php echo $productResult['vProductName']; ?>"/>
                        <input type="hidden" name="vAuthorName" value="<?php echo $productResult['vAuthorName']; ?>"/>
                        <input type="hidden" name="vUploadBy" value="<?php echo $productResult['vUploadBy']; ?>"/>
				        <input type="hidden" name="vPrice" value="<?php echo $productResult['vPrice']; ?>"/>
                        
                        <div class="btn-sec">
                            <button type="submit" name="mybutton" id="buyNow" value="buyNow" class="btn ">Buy Now</button>
                        </div>                    
                    </form>
                </div>
            </div>
            <?php }?>
        </div>
    </section>
    <section class="related-books">
        <div class="container">
            <h2>You may also like these book</h2>
            <div class="recomended-sec">
                <div class="row">
                <?php
                    $query="select * from tbProductinfo where vCategory='$categoryId' and status='active' and iAutoId!='$id' limit 4";
                    $data=$db->select($query);
                    while($productResult=$data->fetch_assoc())
                    {
                ?> 
                    <div class="col-lg-3 col-md-6">
                        <div class="item">
                            <img src="<?php echo $productResult['vImage1'];?>" alt="img">
                            <h3><?php echo $productResult['vProductName'];?></h3>
                            <h6><span class="price"><?php echo $productResult['vPrice'];?> tk</span></h6>
                            <div class="hover">
                                <a href="product-single.php?id=<?php echo $productResult['iAutoId']; ?>"><span><i class="fa fa-long-arrow-right" aria-hidden="true"></i></span></a>
                            </div>
                        </div>
                    </div>
                <?php
                    }
                ?>
                </div>
            </div>
        </div>
        
    </section>
<?php
	include 'inc/footer.php';
?>