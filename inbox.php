<?php
	include 'inc/header.php';
?>
<?php
	include 'inc/dashboardSidebar.php';
?>

    <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Inbox</h4>
                <hr>
              <div class="panel-body">
                
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>#SL</th>
                            <th>Date</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query="select iAutoId, vName, vEmail, vMessage, vStatus, dDate from tbInbox";
                        $selectData=$db->select($query);
                        if($selectData)
                        {
                            $i=1;
                            while($result=$selectData->fetch_assoc())
                            {
                        ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $result['dDate']; ?></td>
                                <td><?php echo $result['vName']; ?></td>
                                <td><?php echo $result['vEmail']; ?></td>
                                <td><?php echo $result['vStatus']; ?></td>
                                <td><a href="message.php?id=<?php echo $result['iAutoId'];?>">view</a> || <a onclick="return confirm('Are you sure to Delete! ');" href="messageDelete.php?deleteid=<?php echo $result['iAutoId'];?>">Delete</a></td>
                            </tr>
                           <?php $i++;
                            }
                        }
                    ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>#SL</th>
                            <th>Date</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Status</th>
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