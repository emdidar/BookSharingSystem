<?php
	include 'inc/header.php';
?>
<?php
	include 'inc/dashboardSidebar.php';
?>

    <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Product Info</h4>
                <hr>
              <div class="panel-body">
                <?php

                /*if ($_SERVER['REQUEST_METHOD'] == 'POST') 
                {
                        
                    $vProductName=mysqli_real_escape_string($db->link,$_POST['vProductName']);
                    $vCategory=mysqli_real_escape_string($db->link,$_POST['vCategory']);
                    $vSharingType=mysqli_real_escape_string($db->link,$_POST['vSharingType']);
                    $vAuthorName=mysqli_real_escape_string($db->link,$_POST['vAuthorName']);
                    $vUploadBy=mysqli_real_escape_string($db->link,$_POST['vUploadBy']);
                    $vPrice=mysqli_real_escape_string($db->link,$_POST['vPrice']);
                    $vImage1=mysqli_real_escape_string($db->link,$_POST['vImage1']);
                    $vImage2=mysqli_real_escape_string($db->link,$_POST['vImage2']);
                    $vImage3=mysqli_real_escape_string($db->link,$_POST['vImage3']);
                    
                    $query = "insert into tbProductinfo (vProductName,vCategory,vSharingType,vAuthorName,vUploadBy,vPrice,vImage1,vImage2,vImage3) 
                            values(
                            '$vProductName',
                            '$vCategory',
                            '$vSharingType',
                            '$vAuthorName',
                            '$vUploadBy',
                            '$vPrice',
                            '$vImage1',
                            '$vImage2',
                            '$vImage3')";

                    $dataInsert = $db->insert($query);
                    if ($dataInsert) 
                    {
                        echo "<span style='color:green;font-size:18px;'>Product Information Inserted Successfully.</span>";
                    } 
                    else {
                        echo "<span style='color:red;font-size:18px;'>Product Information Not Inserted !</span>";
                    }
                }*/
                ?>
                
                <form class="form-horizontal" action="" method="POST" role="form">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Full Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="Name" name="vEmployeeName" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Gender</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="vCategory">
								<option value="Male">Male</option>
								<option value="Female">Female</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Address</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="Address" name="vAddress" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Mobile</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="Mobile" name="vMobile" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" placeholder="Email" name="vEmail" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">National ID</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="National ID" name="vNationalId" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Images</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control" name="vImage1" required>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
                
                <br>
                
                
                
            </div>
        </div>
    </div>


<?php
	include 'inc/dashboardFooter.php';
	include 'inc/footer.php';
?>