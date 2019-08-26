<?php
	include 'inc/header.php';
?>
<?php
    $vUserId=Session::get('snUserId');
    $vEmployeeName=Session::get('snEmployeeName');
    $vUserType=Session::get('snUserType');
    $vPassword=Session::get('snPassword');
    Session::checkSession();
?>

<?php
    $vGrandTotal=0;
    $vUploadBy='';
    $vSharingType='';
    $vProductId='';
    $ishidden='';

?>
    <div class="breadcrumb">
        <div class="container">
            <a class="breadcrumb-item" href="index.php">Home</a>
            <span class="breadcrumb-item active">Checkout</span>
        </div>
    </div>
    <section class="static about-sec">
        <div class="container-fluid">
            
            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 style="font-size: 15px; " class="card-title">Product Info</h4>
                            <hr>
                            <div class="panel-body">
                                <table id="example" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>#SL</th>
                                            <th>Product Name</th>
                                            <th>Type</th>
                                            <th>Image</th>
                                            <th>Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $i=1;
                                        $query="select iAutoId,vUserIp,vProductId,vProductName,
                                        (select vImage1 from tbproductinfo where iAutoId=a.vProductId)vImage1,vUploadBy,vPrice,vSharingType 
                                        from tbcart a where vUserIp='$vUserIp' ";
                                        $selectData=$db->select($query);
                                        if($selectData)
                                        {
                                                $i=1;
                                                while($result=$selectData->fetch_assoc())
                                                {
                                                    $vUploadBy=$result['vUploadBy'];
                                                    $vSharingType=$result['vSharingType'];
                                                    $vProductId=$result['vProductId'];
                                                    $vGrandTotal=$vGrandTotal+$result['vPrice'];
                                                    
                                                    if ($vSharingType=='Borrow') 
                                                    {
                                                        $ishidden='hidden';
                                                    }
                                            ?>
                                            <tr>
                                                <td><?php echo $i;?></td>
                                                <td><?php echo $result['vProductName'];?></td>
                                                <td><?php echo $result['vSharingType'];?></td>
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
                                            <th></th>
                                            <th>Grand Total :</th>
                                            <th>Tk. <?php echo $vGrandTotal;?></th>
                                        </tr>
                                    </tfoot>
                                </table>
                                
                                <!--<span class="required-star">*</span>
                                <h1>Please </h1>-->
                                
                                <div style="text-align: center;" class="shopping">
                                    <?php

                                    if ($_SERVER['REQUEST_METHOD'] == 'POST') 
                                    {
                                        $vBkashNo=mysqli_real_escape_string($db->link,$_POST['vBkashNo']);
                                        $vTransactionId=mysqli_real_escape_string($db->link,$_POST['vTransactionId']);

                                        if ($vSharingType!='Borrow') 
                                        {
                                            if (!empty($vBkashNo)) 
                                            {
                                                if (!empty($vTransactionId)) 
                                                {
                                                    $query = "insert into tbcheckout (vUserId, vProductId, vProductName, vUploadBy, vBkashNo, vTransactionId, vPrice, dDate, vSharingType ) select '$vUserId', vProductId, vProductName, vUploadBy, '$vBkashNo', '$vTransactionId', vPrice, dDate, vSharingType from tbcart a where vUserIp='$vUserIp'";
                                                    
                                                    $dataInsert = $db->insert($query);
                                                    if ($dataInsert) 
                                                    {
                                                        $query = "update tbproductinfo set 
                                                        status='inactive' where iAutoId='$vProductId' ";

                                                        $dataUpdate= $db->update($query);

                                                        echo "<span style='color:green;font-size:18px;'>All Information Inserted Successfully go to Dashboard.</span>";
                                                    } 
                                                    else {
                                                        echo "<span style='color:red;font-size:18px;'>All Information Not Inserted !</span>";
                                                    }
                                                }
                                                else{
                                                    echo "<span style='color:red;font-size:18px;'>Please provide Transaction No.. !</span>";
                                                }
                                            }
                                            else{
                                                echo "<span style='color:red;font-size:18px;'>Please provide Bkash No.. !</span>";
                                            }
                                        } 
                                        else 
                                        {
                                            $query = "insert into tbcheckout (vUserId, vProductId, vProductName, vUploadBy, vBkashNo, vTransactionId, vPrice, dDate, vSharingType )  
                                            select '$vUserId', vProductId, vProductName, vUploadBy, 'N/A', 'N/A', vPrice, dDate, vSharingType from tbcart a where vUserIp='$vUserIp'"; 
                                            
                                            $dataInsert = $db->insert($query);
                                            if ($dataInsert) 
                                            {
                                                $query = "update tbproductinfo set 
                                                status='inactive' where iAutoId='$vProductId' ";

                                                $dataUpdate= $db->update($query);

                                                echo "<span style='color:green;font-size:18px;'>All Information Inserted Successfully go to Dashboard.</span>";
                                            } 
                                            else {
                                                echo "<span style='color:red;font-size:18px;'>All Information Not Inserted !</span>";
                                            }
                                        }
                                    }
                                    ?>
                                    <?php 
                                    /*if ($vSharingType='Borrow') {
                                        $ishidden='hidden';
                                    }*/
                                    ?>
                                    <form class="form-horizontal" action="" method="POST" role="form">
                                        <div <?php echo $ishidden ?> class="form-group row">
                                            <label class="col-sm-4 col-form-label">Bkash No</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" placeholder="Bkash No" name="vBkashNo">
                                            </div>
                                        </div>
                                        <div <?php echo $ishidden ?> class="form-group row">
                                            <label class="col-sm-4 col-form-label">Transaction Id</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" placeholder="Bkash Transaction Id" name="vTransactionId">
                                            </div>
                                        </div>
                                            <button type="submit" class="btn btn-primary">Checkout</button>
                                    </form>
                                    <!--<a href="checkout.php"> <img src="images/check.png" alt="" /></a>-->
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 style="font-size: 15px; " class="card-title">Your Shipping Info</h4>
                            <hr>
                            <div class="panel-body">
                                <?php
                                    $query="select * from tblogin where iAutoId='$vUserId' order by iAutoId desc";
                                    $branch=$db->select($query);
                                    while($result=$branch->fetch_assoc())
                                    {

                                ?> 

                                <form class="form-horizontal" action="" method="POST" role="form">
                                    <div hidden class="form-group row">
                                        <label class="col-sm-3 col-form-label">User ID: </label>
                                        <div class="col-sm-9">
                                            <input readonly type="text" value="<?php echo $vUserId;?>" class="form-control" placeholder="User ID" name="vUserId" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Full Name</label>
                                        <div class="col-sm-9">
                                            <input readonly type="text" value="<?php echo $result['vEmployeeName']; ?>" class="form-control" placeholder="Full Name" name="vEmployeeName" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Country</label>
                                        <div class="col-sm-9">
                                            <input readonly type="text" value="<?php echo $result['vCountry']; ?>" class="form-control" placeholder="Country" name="vCountry" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">City</label>
                                        <div class="col-sm-9">
                                            <input readonly type="text" value="<?php echo $result['vCity']; ?>" class="form-control" placeholder="City" name="vCity" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Zip Code</label>
                                        <div class="col-sm-9">
                                            <input readonly type="text" value="<?php echo $result['vZipCode']; ?>" class="form-control" placeholder="Zip Code" name="vZipCode" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Mobile</label>
                                        <div class="col-sm-9">
                                            <input readonly type="text" value="<?php echo $result['vMobile']; ?>" class="form-control" placeholder="Mobile" name="vMobile" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Address</label>
                                        <div class="col-sm-9">
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
                            <h4 style="font-size: 15px; " class="card-title">Supplier Info</h4>
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
                                        <label class="col-sm-3 col-form-label">User ID: </label>
                                        <div class="col-sm-9">
                                            <input readonly type="text" value="<?php echo $vUploadBy;?>" class="form-control" placeholder="User ID" name="vUserId" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Full Name</label>
                                        <div class="col-sm-9">
                                            <input readonly type="text" value="<?php echo $result['vEmployeeName']; ?>" class="form-control" placeholder="Full Name" name="vEmployeeName" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Country</label>
                                        <div class="col-sm-9">
                                            <input readonly type="text" value="<?php echo $result['vCountry']; ?>" class="form-control" placeholder="Country" name="vCountry" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">City</label>
                                        <div class="col-sm-9">
                                            <input readonly type="text" value="<?php echo $result['vCity']; ?>" class="form-control" placeholder="City" name="vCity" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Zip Code</label>
                                        <div class="col-sm-9">
                                            <input readonly type="text" value="<?php echo $result['vZipCode']; ?>" class="form-control" placeholder="Zip Code" name="vZipCode" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Mobile</label>
                                        <div class="col-sm-9">
                                            <input readonly type="text" value="<?php echo $result['vMobile']; ?>" class="form-control" placeholder="Mobile" name="vMobile" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Address</label>
                                        <div class="col-sm-9">
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
                    
                    <!--<div class="card">
                        <div class="card-body">
                            <h4 style="font-size: 15px; " class="card-title">Supplier Info</h4>
                            <hr>
                            <div class="panel-body">
                                
                            </div>
                        </div>
                    </div>-->
                </div>
                
            </div>
        </div>
    </section>
<?php
	include 'inc/footer.php';
?>