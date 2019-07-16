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
                }
                ?>
                
                <form class="form-horizontal" action="" method="POST" role="form">
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
                                    <option value="<?php echo $result['iAutoId']; ?>"><?php echo $result['iAutoId'].'-'.$result['vCategoryName']; ?></option>
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
                                <option value="Sale">Donate</option>
                                <option value="Sale">Borrow</option>
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
                        <label class="col-sm-2 col-form-label">Upload By: </label>
                        <div class="col-sm-10">
                            <input readonly type="text" value="<?php echo $vUserId.'-'.$vEmployeeName;?>" class="form-control" placeholder="Upload By" name="vUploadBy" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Price</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" placeholder="Price" name="vPrice" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Images</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control" name="vImage1" required>
                            <input type="file" class="form-control" name="vImage2" required>
                            <input type="file" class="form-control" name="vImage3" required>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                
                <br>
                
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Product Name</th>
                            <th>Author Name</th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query="select iAutoId,vProductName,vAuthorName,vPrice from tbProductinfo";
                        $selectData=$db->select($query);
                        if($selectData)
                        {
                            while($result=$selectData->fetch_assoc())
                            {
                                
                        ?>
                            <tr>
                                <td><?php echo $result['vProductName']; ?></td>
                                <td><?php echo $result['vAuthorName']; ?></td>
                                <td><?php echo $result['vPrice']; ?></td>
                                <td><a href="productinfoEdit.php?id=<?php echo $result['iAutoId'];?>">Edit</a> || <a onclick="return confirm('Are you sure to Delete! ');" href="productinfoDelete.php?deleteid=<?php echo $result['iAutoId'];?>">Delete</a></td>
                            </tr>
                           <?php 
                            }
                        }
                    ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Product Name</th>
                            <th>Author Name</th>
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