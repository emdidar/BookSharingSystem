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

                if ($_SERVER['REQUEST_METHOD'] == 'POST') 
                {
                    $vProductName=mysqli_real_escape_string($db->link,$_POST['vProductName']);
                    $vCategory=mysqli_real_escape_string($db->link,$_POST['vCategory']);
                    $vSharingType=mysqli_real_escape_string($db->link,$_POST['vSharingType']);
                    $vAuthorName=mysqli_real_escape_string($db->link,$_POST['vAuthorName']);
                    $vUploadBy=mysqli_real_escape_string($db->link,$_POST['vUploadBy']);
                    $vPrice=mysqli_real_escape_string($db->link,$_POST['vPrice']);
                    $vDescription=mysqli_real_escape_string($db->link,$_POST['vDescription']);
                    $vCarrierCost=mysqli_real_escape_string($db->link,$_POST['vCarrierCost']);
                    $vDuration=mysqli_real_escape_string($db->link,$_POST['vDuration']);
                    
                    //$vCarrierCost=(20/100)*$vPrice;
		
                    $file_name1 = $_FILES['image1']['name'];
                    $file_temp1 = $_FILES['image1']['tmp_name'];

                    $div1 = explode('.', $file_name1);
                    $file_ext1 = strtolower(end($div1));
                    $unique_image1 = "imgOne".substr(md5(time()), 0, 10).'.'.$file_ext1;
                    $uploaded_image1 = "images/upload/".$unique_image1;
                    move_uploaded_file($file_temp1, $uploaded_image1);
                    
                    
		
                    $file_name2 = $_FILES['image2']['name'];
                    $file_temp2 = $_FILES['image2']['tmp_name'];

                    $div2 = explode('.', $file_name2);
                    $file_ext2 = strtolower(end($div2));
                    $unique_image2 = "imgTwo".substr(md5(time()), 0, 10).'.'.$file_ext2;
                    $uploaded_image2 = "images/upload/".$unique_image2;
                    move_uploaded_file($file_temp2, $uploaded_image2);
                    
                    
		
                    $file_name3 = $_FILES['image3']['name'];
                    $file_temp3 = $_FILES['image3']['tmp_name'];

                    $div3 = explode('.', $file_name3);
                    $file_ext3 = strtolower(end($div3));
                    $unique_image3 = "imgThree".substr(md5(time()), 0, 10).'.'.$file_ext3;
                    $uploaded_image3 = "images/upload/".$unique_image3;
                    move_uploaded_file($file_temp3, $uploaded_image3);
                    
                    
                    
                    
                    $query = "insert into tbProductinfo (vProductName, vCategory, vSharingType, vAuthorName, vUploadBy, vPrice, vImage1, vImage2, vImage3, vDescription,dDate,vCarrierCost,vDuration) 
                            values(
                            '$vProductName',
                            '$vCategory',
                            '$vSharingType',
                            '$vAuthorName',
                            '$vUploadBy',
                            '$vPrice',
                            '$uploaded_image1',
                            '$uploaded_image2',
                            '$uploaded_image3',
                            '$vDescription',CURDATE(),
                            '$vCarrierCost',
                            '$vDuration')";

                    $dataInsert = $db->insert($query);
                    if ($dataInsert) 
                    {
                        echo "<span style='color:green;font-size:18px;'>Product Information Inserted Successfully.</span>";
                    } 
                    else {
                        echo "<span style='color:red;font-size:18px;'>Product Information Not Inserted !</span>";
                    }
                }
                ?>
                
                <form class="form-horizontal" action="" method="POST" role="form" enctype="multipart/form-data">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Product Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="Product Name" name="vProductName" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Category</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="vCategory">
                                <?php
                                $query="select iAutoId,vCategoryName from tbcategoryinfo";
                                $selectData=$db->select($query);
                                if($selectData)
                                {
                                    while($result=$selectData->fetch_assoc())
                                    {
                                ?>
                                    <option value="<?php echo $result['iAutoId']; ?>"><?php echo $result['vCategoryName']; ?></option>
                                <?php
                                    }
                                }
                            ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Sharing Type</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="vSharingType">
                                <option value="Sale">Sale</option>
                                <option value="Donate">Donate</option>
                                <option value="Borrow">Borrow</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Author Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="Author Name" name="vAuthorName" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Description</label>
                        <div class="col-sm-10">
                            <textarea name="vDescription" class="form-control" rows="5"></textarea>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Upload By: </label>
                        <div class="col-sm-10">
                            <input readonly type="text" value="<?php echo $vUserId;?>" class="form-control" placeholder="Upload By" name="vUploadBy" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Duration</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" placeholder="Duration" name="vDuration" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Price</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" placeholder="Price" name="vPrice" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Carrier Cost</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" placeholder="Carrier Cost" name="vCarrierCost" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Images</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control" name="image1" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control" name="image2" >
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control" name="image3" >
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                
                <br>
                
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Product Name</th>
                            <th>Author Name</th>
                            <th>Sharing Type</th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $userId="%";
                            if($vUserType!='admin')
                            {
                                $userId=$vUserId;
                            }
                        $query="select iAutoId,dDate,vProductName,vAuthorName,vSharingType,vPrice from tbProductinfo where vUploadBy like '$userId' ";
                        $selectData=$db->select($query);
                        if($selectData)
                        {
                            while($result=$selectData->fetch_assoc())
                            {
                                
                        ?>
                            <tr>
                                <td><?php echo $result['dDate']; ?></td>
                                <td><?php echo $result['vProductName']; ?></td>
                                <td><?php echo $result['vAuthorName']; ?></td>
                                <td><?php echo $result['vSharingType']; ?></td>
                                <td><?php echo $result['vPrice']; ?></td>
                                <td><a href="productEdit.php?id=<?php echo $result['iAutoId'];?>">Edit</a> || <a onclick="return confirm('Are you sure to Delete! ');" href="productDelete.php?deleteid=<?php echo $result['iAutoId'];?>">Delete</a></td>
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
                            <th>Author Name</th>
                            <th>Sharing Type</th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
                
            </div>
        </div>
    </div>


                <script>
                    $(document).ready(function() {
                        $('#example').DataTable();
                    } );
                </script>   
<?php
	include 'inc/dashboardFooter.php';
	include 'inc/footer.php';
?>