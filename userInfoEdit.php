<?php
	include 'inc/header.php';
?>
<?php
	include 'inc/dashboardSidebar.php';
?>
<?php
	if(!isset($_GET['id']) || $_GET['id']==NULL)
	{
		header("Location:userInfo.php");
	}
	else
	{
		$editid=$_GET['id'];
	}
?>
    <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">User Information Edit</h4>
                <hr>
              <div class="panel-body">
                <?php

                if ($_SERVER['REQUEST_METHOD'] == 'POST') 
                { 
                    $vEmployeeName=mysqli_real_escape_string($db->link,$_POST['vEmployeeName']);
                    $vGender=mysqli_real_escape_string($db->link,$_POST['vGender']);
                    $vCountry=mysqli_real_escape_string($db->link,$_POST['vCountry']);
                    $vCity=mysqli_real_escape_string($db->link,$_POST['vCity']);
                    $vZipCode=mysqli_real_escape_string($db->link,$_POST['vZipCode']);
                    $vMobile=mysqli_real_escape_string($db->link,$_POST['vMobile']);
                    $vAddress=mysqli_real_escape_string($db->link,$_POST['vAddress']);
                    $vEmail=mysqli_real_escape_string($db->link,$_POST['vEmail']);
                    $vNationalId=mysqli_real_escape_string($db->link,$_POST['vNationalId']);
                    $vStatus=mysqli_real_escape_string($db->link,$_POST['vStatus']);
                    
                    $query = "update tbLogin set 
                        vEmployeeName='$vEmployeeName',
                        vGender='$vGender',
                        vCountry='$vCountry',
                        vCity='$vCity',
                        vZipCode='$vZipCode',
                        vMobile='$vMobile',
                        vAddress='$vAddress',
                        vEmail='$vEmail',
                        vStatus='$vStatus',
                        vNationalId='$vNationalId' where iAutoId='$editid' ";

                    $dataUpdate= $db->update($query);
                    if ($dataUpdate) 
                    {
                        $_SESSION['snEmployeeName'] = $vEmployeeName;
                        echo "<span style='color:green;font-size:18px;'>All Information Update Successfully.</span>";        
                    } 
                    else {
                        echo "<span style='color:red;font-size:18px;'>All Information Not Update !</span>";
                    }
                }
                ?>
                  
                <?php
					$query="select * from tblogin where iAutoId='$editid' order by iAutoId desc";
					$branch=$db->select($query);
					while($result=$branch->fetch_assoc())
					{
						
				?> 
                
                <form class="form-horizontal" action="" method="POST" role="form">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">User ID: </label>
                        <div class="col-sm-10">
                            <input readonly type="text" value="<?php echo $editid;?>" class="form-control" placeholder="User ID" name="vUserId" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Full Name</label>
                        <div class="col-sm-10">
                            <input type="text" value="<?php echo $result['vEmployeeName']; ?>" class="form-control" placeholder="Full Name" name="vEmployeeName" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Gender</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="vGender">
								<option<?php if($result['vGender']=='Male') { ?> selected="selected" <?php } ?> value="Male">Male</option>
								<option<?php if($result['vGender']=='Female') { ?> selected="selected" <?php } ?> value="Female">Female</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Country</label>
                        <div class="col-sm-10">
                            <input type="text" value="<?php echo $result['vCountry']; ?>" class="form-control" placeholder="Country" name="vCountry" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">City</label>
                        <div class="col-sm-10">
                            <input type="text" value="<?php echo $result['vCity']; ?>" class="form-control" placeholder="City" name="vCity" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Zip Code</label>
                        <div class="col-sm-10">
                            <input type="text" value="<?php echo $result['vZipCode']; ?>" class="form-control" placeholder="Zip Code" name="vZipCode" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Mobile</label>
                        <div class="col-sm-10">
                            <input type="text" value="<?php echo $result['vMobile']; ?>" class="form-control" placeholder="Mobile" name="vMobile" required>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Address</label>
                        <div class="col-sm-10">
                            <input type="text" value="<?php echo $result['vAddress']; ?>" class="form-control" placeholder="Address" name="vAddress" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" value="<?php echo $result['vEmail']; ?>" class="form-control" placeholder="Email" name="vEmail" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">National ID</label>
                        <div class="col-sm-10">
                            <input type="text" value="<?php echo $result['vNationalId']; ?>" class="form-control" placeholder="National ID" name="vNationalId" required>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Status</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="vStatus">
								<option<?php if($result['vStatus']=='active') { ?> selected="selected" <?php } ?> value="active">active</option>
								<option<?php if($result['vStatus']=='inactive') { ?> selected="selected" <?php } ?> value="inactive">inactive</option>
                            </select>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
                <?php
					}
				?>
                
                <br>
                
                
                
            </div>
        </div>
    </div>


<?php
	include 'inc/dashboardFooter.php';
	include 'inc/footer.php';
?>