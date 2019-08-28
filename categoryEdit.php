<?php
	include 'inc/header.php';
?>
<?php
	include 'inc/dashboardSidebar.php';
?>
<?php
	if(!isset($_GET['id']) || $_GET['id']==NULL)
	{
		header("Location:categoryInfo.php");
	}
	else
	{
		$editid=$_GET['id'];
	}
?>
    <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Edit Category Info</h4>
                <hr>
              <div class="panel-body">
                <?php

                if ($_SERVER['REQUEST_METHOD'] == 'POST') 
                {
                    $vCategoryName=mysqli_real_escape_string($db->link,$_POST['vCategoryName']);

                    $query = "update tbcategoryinfo set vCategoryName='$vCategoryName' where iAutoId='$editid'";

                    $dataInsert = $db->insert($query);
                    if ($dataInsert) 
                    {
                        echo "<span style='color:green;font-size:18px;'>Category Information Update Successfully.</span>";
                    } 
                    else {
                        echo "<span style='color:red;font-size:18px;'>Category Information Not Update !</span>";
                    }
                }
                ?>
                  
                <?php
					$query="select * from tbcategoryinfo where iAutoId='$editid' order by iAutoId desc";
					$branch=$db->select($query);
					while($result=$branch->fetch_assoc())
					{
						
				?> 
                <form class="form-horizontal" action="" method="POST" role="form">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Category Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" value="<?php echo $result['vCategoryName']; ?>"  name="vCategoryName">
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