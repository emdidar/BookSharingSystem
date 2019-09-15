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
        
        $query = "update tbInbox set 
                vStatus='read'  where iAutoId='$editid' ";

            $dataUpdate= $db->update($query);
	}
?>
    <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Message</h4>
                <hr>
              <div class="panel-body">
                  
                <?php
					$query="select iAutoId, vName, vEmail, vMessage, vStatus, dDate from tbInbox where iAutoId='$editid' order by iAutoId desc";
					$branch=$db->select($query);
					while($result=$branch->fetch_assoc())
					{
						
				?> 
                
                <form class="form-horizontal" action="" method="POST" role="form">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Date</label>
                        <div class="col-sm-10">
                            <input type="text" value="<?php echo $result['dDate']; ?>" class="form-control" name="dDate" required>
                        </div>
                    </div>                    
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" value="<?php echo $result['vName']; ?>" class="form-control" name="vName" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="text" value="<?php echo $result['vEmail']; ?>" class="form-control" name="vEmail" required>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Message</label>
                        <div class="col-sm-10">
                            <input type="text" value="<?php echo $result['vMessage']; ?>" class="form-control" name="vMessage" required>
                        </div>
                    </div>
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