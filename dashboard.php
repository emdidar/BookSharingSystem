<?php
	include 'inc/header.php';
?>
<?php
	include 'inc/dashboardSidebar.php';
?>

    <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Dashboard</h4>
                <hr>
                <?php
                    if($vUserType!='carrier')
                {?>
                    <h3>Pending List for your Approval</h3>
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Product Name</th>
                                <th>Image</th>
                                <th>Price</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $query="select iAutoId,vUserId,vProductId,vProductName,dDate, 
                            (select vImage1 from tbproductinfo where iAutoId=a.vProductId)vImage1,vUploadBy,vPrice,vStatus 
                            from tbcheckout a where vUploadBy='$vUserId' and vStatus='pending for user Approval' ";
                            $selectData=$db->select($query);
                            if($selectData)
                            {
                                    while($result=$selectData->fetch_assoc())
                                    {
                                        $vUploadBy=$result['vUploadBy'];
                                        $vProductId=$result['vProductId'];
                                ?>
                                <tr>
                                    <td><?php echo $result['dDate'];?></td>
                                    <td><?php echo $result['vProductName'];?></td>
                                    <td><img style=" width: 80px; height: 50px;" src="<?php echo $result['vImage1'];?>" alt=""/></td>
                                    <td>Tk. <?php echo $result['vPrice'];?></td>
                                    <td><?php echo $result['vStatus'];?></td>
                                    <td><a href="pendingProductForApproval.php?id=<?php echo $result['iAutoId'];?>">VIEW</a></td>
                                </tr>
                               <?php
                                    }
                            }
                        ?>
                        </tbody>
                        <tfoot>
                            <tr>             
                                <th>Date</th>
                                <th>Product Name</th>
                                <th>Image</th>
                                <th>Price</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                    <br/>
                
                    <h3>Pending List for Carrier Approval</h3>
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Product Name</th>
                                <th>Image</th>
                                <th>Price</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $query="select iAutoId,vUserId,vProductId,vProductName,dDate, 
                            (select vImage1 from tbproductinfo where iAutoId=a.vProductId)vImage1,vUploadBy,vPrice,vStatus 
                            from tbcheckout a where vUploadBy='$vUserId' and vStatus!='pending for user Approval' ";
                            $selectData=$db->select($query);
                            if($selectData)
                            {
                                    while($result=$selectData->fetch_assoc())
                                    {
                                        $vUploadBy=$result['vUploadBy'];
                                        $vProductId=$result['vProductId'];
                                ?>
                                <tr>
                                    <td><?php echo $result['dDate'];?></td>
                                    <td><?php echo $result['vProductName'];?></td>
                                    <td><img style=" width: 80px; height: 50px;" src="<?php echo $result['vImage1'];?>" alt=""/></td>
                                    <td>Tk. <?php echo $result['vPrice'];?></td>
                                    <td><?php echo $result['vStatus'];?></td>
                                    <td><a href="pendingProductForApproval.php?id=<?php echo $result['iAutoId'];?>">VIEW</a></td>
                                </tr>
                               <?php
                                    }
                            }
                        ?>
                        </tbody>
                        <tfoot>
                            <tr>             
                                <th>Date</th>
                                <th>Product Name</th>
                                <th>Image</th>
                                <th>Price</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                
                <?php
                    }
                else 
                {
                ?>
                    <br/>
                
                    <h3>Pending List for your Approval</h3>
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Product Name</th>
                                <th>Image</th>
                                <th>Price</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $query="select iAutoId,vUserId,vProductId,vProductName,dDate, 
                            (select vImage1 from tbproductinfo where iAutoId=a.vProductId)vImage1,vUploadBy,vPrice,vStatus 
                            from tbcheckout a where vCarrierId='$vUserId' and vStatus='pending for carrier Approval' ";
                            $selectData=$db->select($query);
                            if($selectData)
                            {
                                    while($result=$selectData->fetch_assoc())
                                    {
                                        $vUploadBy=$result['vUploadBy'];
                                        $vProductId=$result['vProductId'];
                                ?>
                                <tr>
                                    <td><?php echo $result['dDate'];?></td>
                                    <td><?php echo $result['vProductName'];?></td>
                                    <td><img style=" width: 80px; height: 50px;" src="<?php echo $result['vImage1'];?>" alt=""/></td>
                                    <td>Tk. <?php echo $result['vPrice'];?></td>
                                    <td><?php echo $result['vStatus'];?></td>
                                    <td><a href="pendingProductForCarrierApproval.php?id=<?php echo $result['iAutoId'];?>">VIEW</a></td>
                                </tr>
                               <?php
                                    }
                            }
                        ?>
                        </tbody>
                        <tfoot>
                            <tr>             
                                <th>Date</th>
                                <th>Product Name</th>
                                <th>Image</th>
                                <th>Price</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                    <br/>
                
                    <h3>Pending List for Delivery</h3>
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Product Name</th>
                                <th>Image</th>
                                <th>Price</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $query="select iAutoId,vUserId,vProductId,vProductName,dDate, 
                            (select vImage1 from tbproductinfo where iAutoId=a.vProductId)vImage1,vUploadBy,vPrice,vStatus 
                            from tbcheckout a where vCarrierId='$vUserId' and vStatus='accept' ";
                            $selectData=$db->select($query);
                            if($selectData)
                            {
                                    while($result=$selectData->fetch_assoc())
                                    {
                                        $vUploadBy=$result['vUploadBy'];
                                        $vProductId=$result['vProductId'];
                                ?>
                                <tr>
                                    <td><?php echo $result['dDate'];?></td>
                                    <td><?php echo $result['vProductName'];?></td>
                                    <td><img style=" width: 80px; height: 50px;" src="<?php echo $result['vImage1'];?>" alt=""/></td>
                                    <td>Tk. <?php echo $result['vPrice'];?></td>
                                    <td><?php echo $result['vStatus'];?></td>
                                    <td><a href="pendingProductForCarrierDelivery.php?id=<?php echo $result['iAutoId'];?>">VIEW</a></td>
                                </tr>
                               <?php
                                    }
                            }
                        ?>
                        </tbody>
                        <tfoot>
                            <tr>             
                                <th>Date</th>
                                <th>Product Name</th>
                                <th>Image</th>
                                <th>Price</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                
                <?php 
                }
                ?>
                
            </div>
        </div>
    </div>

            
<?php
	include 'inc/dashboardFooter.php';
	include 'inc/footer.php';
?>