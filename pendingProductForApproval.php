<?php
	include 'inc/header.php';
?>
<?php
	include 'inc/dashboardSidebar.php';
?>

    <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Pending Product List for Approval</h4>
                <hr>
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>#SL</th>
                                <th>Product Name</th>
                                <th>Image</th>
                                <th>Price</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $i=1;
                            $query="select iAutoId,vUserId,vProductId,vProductName,
                            (select vImage1 from tbproductinfo where iAutoId=a.vProductId)vImage1,vUploadBy,vPrice,vStatus 
                            from tbcheckout a where vUploadBy='$vUserId' ";
                            $selectData=$db->select($query);
                            if($selectData)
                            {
                                    $i=1;
                                    while($result=$selectData->fetch_assoc())
                                    {
                                        $vUploadBy=$result['vUploadBy'];
                                        $vProductId=$result['vProductId'];
                                ?>
                                <tr>
                                    <td><?php echo $i;?></td>
                                    <td><?php echo $result['vProductName'];?></td>
                                    <td><img style=" width: 80px; height: 50px;" src="<?php echo $result['vImage1'];?>" alt=""/></td>
                                    <td>Tk. <?php echo $result['vPrice'];?></td>
                                    <td><?php echo $result['vStatus'];?></td>
                                    <td><a href="pendingProductForApproval.php?id=<?php echo $result['iAutoId'];?>">VIEW</a></td>
                                </tr>
                               <?php $i++;
                                }
                            }
                        ?>
                        </tbody>
                        <tfoot>
                            <tr>                                
                                <th>#SL</th>
                                <th>Product Name</th>
                                <th>Image</th>
                                <th>Price</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
            </div>
        </div>
    </div>

            
<?php
	include 'inc/dashboardFooter.php';
	include 'inc/footer.php';
?>