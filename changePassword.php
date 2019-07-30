<?php
	include 'inc/header.php';
?>
<?php
	include 'inc/dashboardSidebar.php';
?>

    <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Change Password</h4>
                <hr>
              <div class="panel-body">
                <?php

                if ($_SERVER['REQUEST_METHOD'] == 'POST') 
                {
                    $vUserId=mysqli_real_escape_string($db->link,$_POST['vUserId']);
                    $vOldPassword=mysqli_real_escape_string($db->link,$_POST['vOldPassword']);
                    $vTypeOldPassword=mysqli_real_escape_string($db->link,$_POST['vTypeOldPassword']);
                    $vNewPassword=mysqli_real_escape_string($db->link,$_POST['vNewPassword']);
                    
                    if($vOldPassword==$vTypeOldPassword)
                    {
                        $query = "update tblogin set vPassword='$vNewPassword' where iAutoId='$vUserId' ";

                        $data = $db->update($query);
                        if ($data) 
                        {
                            $_SESSION['snPassword'] = $vNewPassword;
                            echo "<span style='color:green;font-size:18px;'>All Information Update Successfully.</span>";
                        } 
                        else {
                            echo "<span style='color:red;font-size:18px;'>All Information Not Update !</span>";
                        }
                    } 
                    else {
                        echo "<span style='color:red;font-size:18px;'>Old Password is not matched !</span>";
                    }
                }
                ?>
                  
                <?php
					$query="select * from tblogin where iAutoId='$vUserId' order by iAutoId desc";
					$branch=$db->select($query);
					while($result=$branch->fetch_assoc())
					{
						
				?> 
                <form class="form-horizontal" action="" method="POST" role="form">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">User ID: </label>
                        <div class="col-sm-10">
                            <input readonly type="text" value="<?php echo $vUserId;?>" class="form-control" name="vUserId" required>
                        </div>
                    </div>
                    <div hidden class="form-group row">
                        <label class="col-sm-2 col-form-label">Old Password</label>
                        <div class="col-sm-10">
                            <input readonly type="password" value="<?php echo $result['vPassword']; ?>" class="form-control" name="vOldPassword" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Old Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" name="vTypeOldPassword" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">New Password</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="New Password" name="vNewPassword" required>
                        </div>
                    </div>
					
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
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