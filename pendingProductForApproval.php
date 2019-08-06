<?php
	include 'inc/header.php';
?>
<?php
	include 'inc/dashboardSidebar.php';
?>

<?php
	if(!isset($_GET['id']) || $_GET['id']==NULL)
	{
		header("Location:productAdd.php");
	}
	else
	{
		$editid=$_GET['id'];
	}
    $tmpImage1="";
    $tmpImage2="";
    $tmpImage3="";


?>

    <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Pending Product for Approval</h4>
                <hr>
              <div class="panel-body">
                <?php

                if ($_SERVER['REQUEST_METHOD'] == 'POST') 
                { 
                    
                    $query="select vImage1,vImage2,vImage3 from tbProductinfo where iAutoId like '$editid' ";
                    $selectData=$db->select($query);
                    if($selectData)
                    {
                        while($result=$selectData->fetch_assoc())
                        {
                            $tmpImage1=$result['vImage1'];
                            $tmpImage2=$result['vImage2'];
                            $tmpImage3=$result['vImage3'];
                        }
                    }
                    
                    $vProductName=mysqli_real_escape_string($db->link,$_POST['vProductName']);
                    $vCategory=mysqli_real_escape_string($db->link,$_POST['vCategory']);
                    $vSharingType=mysqli_real_escape_string($db->link,$_POST['vSharingType']);
                    $vAuthorName=mysqli_real_escape_string($db->link,$_POST['vAuthorName']);
                    $vDescription=mysqli_real_escape_string($db->link,$_POST['vDescription']);
                    $vUploadBy=mysqli_real_escape_string($db->link,$_POST['vUploadBy']);
                    $vPrice=mysqli_real_escape_string($db->link,$_POST['vPrice']);
                    $vDescription=mysqli_real_escape_string($db->link,$_POST['vDescription']);
		
                    $file_name1 = $_FILES['image1']['name'];
                    $file_temp1 = $_FILES['image1']['tmp_name'];

                    $div1 = explode('.', $file_name1);
                    $file_ext1 = strtolower(end($div1));
                    $unique_image1 = "imgOne".substr(md5(time()), 0, 10).'.'.$file_ext1;
                    $uploaded_image1 = "images/upload/".$unique_image1;
                    
                    
		
                    $file_name2 = $_FILES['image2']['name'];
                    $file_temp2 = $_FILES['image2']['tmp_name'];

                    $div2 = explode('.', $file_name2);
                    $file_ext2 = strtolower(end($div2));
                    $unique_image2 = "imgTwo".substr(md5(time()), 0, 10).'.'.$file_ext2;
                    $uploaded_image2 = "images/upload/".$unique_image2;
                    
                    
		
                    $file_name3 = $_FILES['image3']['name'];
                    $file_temp3 = $_FILES['image3']['tmp_name'];

                    $div3 = explode('.', $file_name3);
                    $file_ext3 = strtolower(end($div3));
                    $unique_image3 = "imgThree".substr(md5(time()), 0, 10).'.'.$file_ext3;
                    $uploaded_image3 = "images/upload/".$unique_image3;
                    
                    /*select iAutoId, vUserId, vProductId, vProductName, vUploadBy, vCarrierId, vBkashNo, vTransactionId, vStatus, vPrice, vSharingType, dDate from tbcheckout*/
                    
                    $query = "update tbProductinfo 
                        set vProductName='$vProductName', 
                        vCategory='$vCategory', 
                        vSharingType='$vSharingType', 
                        vAuthorName='$vAuthorName', 
                        vDescription='$vDescription', 
                        vUploadBy='$vUploadBy', 
                        vDescription='$vDescription', 
                        vPrice='$vPrice' where iAutoId='$editid' ";

                        $dataUpdate = $db->update($query);
                        if ($dataUpdate) 
                        {
                            echo "<span style='color:green;font-size:18px;'>Product Information update Successfully.</span>";
                        } 
                        else {
                            echo "<span style='color:red;font-size:18px;'>Product Information Not update !</span>";
                        }
                }
                ?>
                  
                <?php
                    $query="select * from tbProductinfo where iAutoId='$editid' order by iAutoId desc";
                    $data=$db->select($query);
                    while($productResult=$data->fetch_assoc())
                    {
                ?> 
                <form class="form-horizontal" action="" method="POST" role="form" enctype="multipart/form-data">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Product Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" value="<?php echo $productResult['vProductName']; ?>" name="vProductName" required>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
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