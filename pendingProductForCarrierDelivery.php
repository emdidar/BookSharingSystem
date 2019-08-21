<?php
	include 'inc/header.php';
?>
<?php
	include 'inc/dashboardSidebar.php';
?>

<?php
	if(!isset($_GET['id']) || $_GET['id']==NULL)
	{
		header("Location:dashboard.php");
	}
	else
	{
		$editid=$_GET['id'];
        $requestUser='';
        $vUploadBy='';
	}


?>

<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Pending Product for Carrier Delivery</h4>
            <hr>
          <div class="panel-body">
            <?php

            if ($_SERVER['REQUEST_METHOD'] == 'POST') 
            { 
                $vStatus=mysqli_real_escape_string($db->link,$_POST['vStatus']);

                /*select iAutoId, vUserId, vProductId, vProductName, vUploadBy, vCarrierId, vBkashNo, vTransactionId, vStatus, vPrice, vSharingType, dDate from tbcheckout*/

                $query = "update tbcheckout 
                    set vStatus='$vStatus' 
                    where iAutoId='$editid' ";

                    $dataUpdate = $db->update($query);
                    if ($dataUpdate) 
                    {
                        echo "<span style='color:green;font-size:18px;'>All Information update Successfully.</span>";
                    } 
                    else {
                        echo "<span style='color:red;font-size:18px;'>All Information Not update !</span>";
                    }
            }
            ?>

            <?php
                $query="select iAutoId, vUserId, vProductId, vProductName, vUploadBy, vCarrierId , 
                (select vEmployeeName from tblogin where iAutoId=a.vCarrierId )vEmployeeName ,
                (select vCity from tblogin where iAutoId=a.vCarrierId )vCity ,
                vBkashNo, vTransactionId, vStatus, vPrice, vSharingType, dDate from tbcheckout a  where iAutoId='$editid' ";
                $data=$db->select($query);
                while($productResult=$data->fetch_assoc())
                {
                    $requestUser=$productResult['vUserId'];
                    $vUploadBy=$productResult['vUploadBy'];
                    
            ?> 
            <form class="form-horizontal" action="" method="POST" role="form" enctype="multipart/form-data">
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Date</label>
                    <div class="col-sm-10">
                        <input readonly type="text" class="form-control" value="<?php echo $productResult['dDate']; ?>" name="dDate" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Product Name</label>
                    <div class="col-sm-10">
                        <input readonly type="text" class="form-control" value="<?php echo $productResult['vProductName']; ?>" name="vProductName" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Bkash No</label>
                    <div class="col-sm-10">
                        <input readonly type="text" class="form-control" value="<?php echo $productResult['vBkashNo']; ?>" name="vBkashNo" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Transaction ID</label>
                    <div class="col-sm-10">
                        <input readonly type="text" class="form-control" value="<?php echo $productResult['vTransactionId']; ?>" name="vTransactionId" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Sharing Type</label>
                    <div class="col-sm-10">
                        <input readonly type="text" class="form-control" value="<?php echo $productResult['vSharingType']; ?>" name="vSharingType" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Price</label>
                    <div class="col-sm-10">
                        <input readonly type="text" class="form-control" value="<?php echo $productResult['vPrice']; ?>" name="vPrice" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Carrier</label>
                    <div class="col-sm-10">
                        <input readonly type="text" class="form-control" value="<?php echo $productResult['vCity'].' ('.$productResult['vEmployeeName'].')'; ?>" name="vCarrierId" required>
                    </div>
                    
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Status</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="vStatus" required>                            
                            <option
                            <?php
                                if($productResult['vStatus']=='accept') { ?> selected="selected" <?php } ?> value="accept">accept
                            </option>
                            <option
                            <?php
                                if($productResult['vStatus']=='delivered') { ?> selected="selected" <?php } ?> value="delivered">delivered
                            </option>
                        </select>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            <?php 
                }
            ?>
        </div>
    </div>
</div>
<br/>


<div class="card">
    <div class="card-body">
        <!--<h4 style="font-size: 15px; " class="card-title">Shipping To</h4>-->
        <h4 class="card-title">Supplier info</h4>
        <hr>
        <div class="panel-body">
            <?php
                $query="select * from tblogin where iAutoId='$vUploadBy' order by iAutoId desc";
                $branch=$db->select($query);
                while($result=$branch->fetch_assoc())
                {

            ?> 

            <form class="form-horizontal" action="" method="POST" role="form">
                <div hidden class="form-group row">
                    <label class="col-sm-2 col-form-label">User ID: </label>
                    <div class="col-sm-10">
                        <input readonly type="text" value="<?php echo $vUserId;?>" class="form-control" placeholder="User ID" name="vUserId" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Full Name</label>
                    <div class="col-sm-10">
                        <input readonly type="text" value="<?php echo $result['vEmployeeName']; ?>" class="form-control" placeholder="Full Name" name="vEmployeeName" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Country</label>
                    <div class="col-sm-10">
                        <input readonly type="text" value="<?php echo $result['vCountry']; ?>" class="form-control" placeholder="Country" name="vCountry" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">City</label>
                    <div class="col-sm-10">
                        <input readonly type="text" value="<?php echo $result['vCity']; ?>" class="form-control" placeholder="City" name="vCity" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Zip Code</label>
                    <div class="col-sm-10">
                        <input readonly type="text" value="<?php echo $result['vZipCode']; ?>" class="form-control" placeholder="Zip Code" name="vZipCode" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Mobile</label>
                    <div class="col-sm-10">
                        <input readonly type="text" value="<?php echo $result['vMobile']; ?>" class="form-control" placeholder="Mobile" name="vMobile" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Address</label>
                    <div class="col-sm-10">
                        <input readonly type="text" value="<?php echo $result['vAddress']; ?>" class="form-control" placeholder="Address" name="vAddress" required>
                    </div>
                </div>
            </form>
            <?php
                }
            ?>

        </div>
    </div>
</div>
<br/>

<div class="card">
    <div class="card-body">
        <!--<h4 style="font-size: 15px; " class="card-title">Shipping To</h4>-->
        <h4 class="card-title">Shipping To</h4>
        <hr>
        <div class="panel-body">
            <?php
                $query="select * from tblogin where iAutoId='$requestUser' order by iAutoId desc";
                $branch=$db->select($query);
                while($result=$branch->fetch_assoc())
                {

            ?> 

            <form class="form-horizontal" action="" method="POST" role="form">
                <div hidden class="form-group row">
                    <label class="col-sm-2 col-form-label">User ID: </label>
                    <div class="col-sm-10">
                        <input readonly type="text" value="<?php echo $vUserId;?>" class="form-control" placeholder="User ID" name="vUserId" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Full Name</label>
                    <div class="col-sm-10">
                        <input readonly type="text" value="<?php echo $result['vEmployeeName']; ?>" class="form-control" placeholder="Full Name" name="vEmployeeName" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Country</label>
                    <div class="col-sm-10">
                        <input readonly type="text" value="<?php echo $result['vCountry']; ?>" class="form-control" placeholder="Country" name="vCountry" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">City</label>
                    <div class="col-sm-10">
                        <input readonly type="text" value="<?php echo $result['vCity']; ?>" class="form-control" placeholder="City" name="vCity" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Zip Code</label>
                    <div class="col-sm-10">
                        <input readonly type="text" value="<?php echo $result['vZipCode']; ?>" class="form-control" placeholder="Zip Code" name="vZipCode" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Mobile</label>
                    <div class="col-sm-10">
                        <input readonly type="text" value="<?php echo $result['vMobile']; ?>" class="form-control" placeholder="Mobile" name="vMobile" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Address</label>
                    <div class="col-sm-10">
                        <input readonly type="text" value="<?php echo $result['vAddress']; ?>" class="form-control" placeholder="Address" name="vAddress" required>
                    </div>
                </div>
            </form>
            <?php
                }
            ?>

        </div>
    </div>
</div>
</div>

        
  
<?php
	include 'inc/dashboardFooter.php';
	include 'inc/footer.php';
?>