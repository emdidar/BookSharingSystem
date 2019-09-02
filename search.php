<?php
	include 'inc/header.php';
?>
    <div class="breadcrumb">
        <div class="container">
            <a class="breadcrumb-item" href="index.php">Home</a>
            <span class="breadcrumb-item active">Search</span>
        </div>
    </div>
    <section class="static about-sec">
        <div class="container">
            <h1>Search your Book</h1>
            <p> </p>
            <div class="form">
                <?php
                    /*if($_SERVER['REQUEST_METHOD']=='POST')
                    {
                        $vCity=$fm->validation($_POST['vCity']);
                        $vThana=$_POST['vThana'];

                        echo "<script>location='searchResult.php'</script>";
                    }*/
                ?>
                <form action="searchResult.php" method="get">
                    <div class="row">
                        <div class="col-md-4">
                            <select class="" name="vCity" required >
								<option selected>Select City...</option>
                                <?php
                                    $query="select distinct vCity from tbLogin a where vStatus='active' and ifnull(vCity,'')!='' and iAutoId in (select vUploadBy from tbproductinfo where vUploadBy=a.iAutoId)";
                                    $selectData=$db->select($query);
                                    if($selectData)
                                    {
                                        while($result=$selectData->fetch_assoc())
                                        {
                                    ?>
                                        <option value="<?php echo $result['vCity']; ?>"><?php echo $result['vCity']; ?></option>
                                    <?php
                                        }
                                    }
                                ?>
							</select>
                        </div>
                        <div class="col-md-4">
                            <select class="" name="vThana" required >
								<option selected>Select Thana...</option>
                                <?php
                                    $query="select distinct vThana from tbLogin a where vStatus='active' and ifnull(vThana,'')!='' and iAutoId in (select vUploadBy from tbproductinfo where vUploadBy=a.iAutoId)";
                                    $selectData=$db->select($query);
                                    if($selectData)
                                    {
                                        while($result=$selectData->fetch_assoc())
                                        {
                                    ?>
                                        <option value="<?php echo $result['vThana']; ?>"><?php echo $result['vThana']; ?></option>
                                    <?php
                                        }
                                    }
                                ?>
							</select>
                        </div>                        
                        <div class="col-md-4">
                            <input type="text" placeholder="Book or Author Name" name="vProduct" required>
                        </div>
                        <div class="col-lg-8 col-md-12">
                            <button type="submit" class="btn black">Search</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
<?php
	include 'inc/footer.php';
?>