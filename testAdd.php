
<?php
    include 'inc/header.php';
    include 'inc/dashboardSidebar.php';
 ?>
	
	

    <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
        <div class="panel panel-info">
              <div class="panel-heading">
                    <h3 class="panel-title">Student Info</h3>
              </div>
              <div class="panel-body">
                <?php

                if ($_SERVER['REQUEST_METHOD'] == 'POST') 
                {
                        
                    $vStudentId=mysqli_real_escape_string($db->link,$_POST['vStudentId']);
                    $vStudentName=mysqli_real_escape_string($db->link,$_POST['vStudentName']);
                    $vBatchNo=mysqli_real_escape_string($db->link,$_POST['vBatchNo']);
                    $vTrimester=mysqli_real_escape_string($db->link,$_POST['vTrimester']);
                    $vDepartment=mysqli_real_escape_string($db->link,$_POST['vDepartment']);
                    $vProgram=mysqli_real_escape_string($db->link,$_POST['vProgram']);
                    $vPassingYear=mysqli_real_escape_string($db->link,$_POST['vPassingYear']);
                    $vContact=mysqli_real_escape_string($db->link,$_POST['vContact']);
                    $vEmail=mysqli_real_escape_string($db->link,$_POST['vEmail']);
                    


                    $query = "insert into tbstudentinfo (vStudentId,vStudentName,vBatchNo,vTrimester,vDepartment,vProgram,vPassingYear,vContact,vEmail) 
                    values(
                    '$vStudentId',
                    '$vStudentName',
                    '$vBatchNo',
                    '$vTrimester',
                    '$vDepartment',
                    '$vProgram',
                    '$vPassingYear',
                    '$vContact',
                    '$vEmail')";

                    $dataInsert = $db->insert($query);
                    if ($dataInsert) 
                    {
                        echo "<span style='color:green;font-size:18px;'>Student Information Inserted Successfully.</span>";
                    } 
                    else {
                        echo "<span style='color:red;font-size:18px;'>Student Information Not Inserted !</span>";
                    }
                }
                ?>
                
                <form class="form-horizontal" action="" method="POST" role="form">
                    <div class="form-group">
                      <label class="control-label col-sm-2">Student ID:</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" placeholder="Student ID" name="vStudentId" required>
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label class="control-label col-sm-2">Student Name:</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" placeholder="Student Name" name="vStudentName" required>
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label class="control-label col-sm-2">Batch No:</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" placeholder="Batch No" name="vBatchNo" required>
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label class="control-label col-sm-2">Trimester:</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" placeholder="Trimester" name="vTrimester" required>
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label class="control-label col-sm-2">Department:</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" placeholder="Department Name" name="vDepartment" required>
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label class="control-label col-sm-2">Program:</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" placeholder="Program" name="vProgram" required>
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label class="control-label col-sm-2">Passing Year:</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" placeholder="Passing Year" name="vPassingYear" required>
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label class="control-label col-sm-2">vContact:</label>
                      <div class="col-sm-10">
                        <input type="number" class="form-control" placeholder="Contact" name="vContact" required>
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label class="control-label col-sm-2">Email:</label>
                      <div class="col-sm-10">
                        <input type="email" class="form-control" placeholder="Email" name="vEmail" required>
                      </div>
                    </div>


                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>

              </div>
        </div>
        
        <div class="panel panel-info">
          <div class="panel-heading">
             <h3 class="panel-title">Student List</h3>
          </div>
          <div class="panel-body">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Batch No.</th>
                        <th>Department</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query="select iAutoId,vStudentId,vStudentName,vBatchNo,vDepartment,vContact,vEmail from tbstudentinfo";
                    $selectData=$db->select($query);
                    if($selectData)
                    {
                        while($result=$selectData->fetch_assoc())
                        {
                    ?>
                        <tr>
                            <td><?php echo $result['vStudentId']; ?></td>
                            <td><?php echo $result['vStudentName']; ?></td>
                            <td><?php echo $result['vBatchNo']; ?></td>
                            <td><?php echo $result['vDepartment']; ?></td>
                            <td><a href="studentInfoEdit.php?id=<?php echo $result['iAutoId'];?>">Edit</a> || <a onclick="return confirm('Are you sure to Delete! ');" href="studentInfoDelete.php?deleteid=<?php echo $result['iAutoId'];?>">Delete</a></td>
                        </tr>
                       <?php
                        }
                    }
                ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Batch No</th>
                        <th>Department</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>
          

          </div>
        </div>
        <script>
            $(document).ready(function() {
                $('#example').DataTable();
            } );
        </script>
    </div>

	
<?php    
    include 'inc/dashboardFooter.php';
    include 'inc/footer.php';
 ?>