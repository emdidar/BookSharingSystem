<?php
	include 'inc/header.php';
?>
<?php
$vGrandTotal=0;
?>
    <div class="breadcrumb">
        <div class="container">
            <a class="breadcrumb-item" href="index.php">Home</a>
            <span class="breadcrumb-item active">Cart</span>
        </div>
    </div>
    <section class="static about-sec">
        <div class="container">
            <div class="cartoption">		
                <div class="cartpage">
                    <h2>Your Cart</h2>
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>#SL</th>
                                <th>Product Name</th>
                                <th>Image</th>
                                <th>Price</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $i=1;
                            $query="select iAutoId,vUserIp,vProductId,vProductName,
                            (select vImage1 from tbproductinfo where iAutoId=a.vProductId)vImage1,vUploadBy,vPrice 
                            from tbcart a where vUserIp='$vUserIp' ";
                            $selectData=$db->select($query);
                            if($selectData)
                            {
                                    $i=1;
                                    while($result=$selectData->fetch_assoc())
                                    {
                                        $vGrandTotal=$vGrandTotal+$result['vPrice'];
                                ?>
                                <tr>
                                    <td><?php echo $i;?></td>
                                    <td><?php echo $result['vProductName'];?></td>
                                    <td><img style=" width: 80px; height: 50px;" src="<?php echo $result['vImage1'];?>" alt=""/></td>
                                    <td>Tk. <?php echo $result['vPrice'];?></td>
                                </tr>
                               <?php $i++;
                                }
                            }
                        ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th></th>
                                <th></th>
                                <th>Grand Total :</th>
                                <th>Tk. <?php echo $vGrandTotal;?></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <div style="text-align: center;" class="shopping">
                    <a href="checkout.php"> <img src="images/check.png" alt="" /></a>
                </div>
            </div>  
        </div>
    </section>
<?php
	include 'inc/footer.php';
?>