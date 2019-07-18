<?php
	include 'inc/header.php';
?>
<?php
	include 'inc/dashboardSidebar.php';
?>

    <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Category Info</h4>
                <hr>
              <div class="panel-body">
                <?php

                if ($_SERVER['REQUEST_METHOD'] == 'POST') 
                {
                        
                    $vCategoryName=mysqli_real_escape_string($db->link,$_POST['vCategoryName']);
                    


                    $query = "insert into tbcategoryinfo (vCategoryName) 
                            values('$vCategoryName')";

                    $dataInsert = $db->insert($query);
                    if ($dataInsert) 
                    {
                        echo "<span style='color:green;font-size:18px;'>Category Information Inserted Successfully.</span>";
                    } 
                    else {
                        echo "<span style='color:red;font-size:18px;'>Category Information Not Inserted !</span>";
                    }
                }
                ?>
                
                <form class="form-horizontal" action="" method="POST" role="form">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Category Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="Category Name" name="vCategoryName">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                
                <br>
                
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>#SL</th>
                            <th>Category Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query="select iAutoId,vCategoryName from tbcategoryinfo";
                        $selectData=$db->select($query);
                        if($selectData)
                        {
                            $i=1;
                            while($result=$selectData->fetch_assoc())
                            {
                                
                        ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $result['vCategoryName']; ?></td>
                                <td><a href="categoryinfoEdit.php?id=<?php echo $result['iAutoId'];?>">Edit</a> || <a onclick="return confirm('Are you sure to Delete! ');" href="categoryDelete.php?deleteid=<?php echo $result['iAutoId'];?>">Delete</a></td>
                            </tr>
                           <?php $i++;
                            }
                        }
                    ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>#SL</th>
                            <th>Category Name</th>
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