<?php
    $vUserId=Session::get('snUserId');
    $vEmployeeName=Session::get('snEmployeeName');
    $vUserType=Session::get('snUserType');
    $vPassword=Session::get('snPassword');
    Session::checkSession();
    $newMessage='';
    
    $query="select count(*)newMessage from tbInbox where vStatus='unread' ";
    $selectData=$db->select($query);
    if($selectData)
    {
        while($result=$selectData->fetch_assoc())
        {
            $newMessage=$result['newMessage'];
        }
    }
?>

<div class="breadcrumb">
        <div class="container">
            <a class="breadcrumb-item" href="index.php">Home</a>
            <span class="breadcrumb-item active">Dashboard</span>
        </div>
    </div>
    <section class="static about-sec">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <h4 style="font-size: 15px; " class="card-title">Menu : Login as <?php echo $vUserType ?> </h4>
                            <hr>
                            <div class="panel-body">
                                <ul class="list-group">
                                    <li class="list-group-item <?php if(basename($_SERVER['SCRIPT_NAME']) == 'dashboard.php'){echo 'active'; }else { echo ''; } ?>"> <a href="dashboard.php"><i class="fa fa-home"></i>	Dashboard</a> </li>
                            <?php
                                if($vUserType=='admin')
                                {?>                                    
                                    <li class="list-group-item <?php if(basename($_SERVER['SCRIPT_NAME']) == 'userInfo.php'){echo 'active'; }else { echo ''; } ?>"> <a href="userInfo.php"><i class="fa fa-arrow-circle-o-right"></i>	User Info</a> </li>

                                    <li class="list-group-item <?php if(basename($_SERVER['SCRIPT_NAME']) == 'categoryAdd.php'){echo 'active'; }else { echo ''; } ?>"> <a href="categoryAdd.php"><i class="fa fa-arrow-circle-o-right"></i>	CategoryInfo</a> </li>

                                    <li class="list-group-item <?php if(basename($_SERVER['SCRIPT_NAME']) == 'productAdd.php'){echo 'active'; }else { echo ''; } ?>"> <a href="productAdd.php"><i class="fa fa-arrow-circle-o-right"></i>	Product Info</a> </li>
                            <?php
                                }
                            ?>
                                    
                            <?php
                                if($vUserType=='user')
                                {?>
                                    <li class="list-group-item <?php if(basename($_SERVER['SCRIPT_NAME']) == 'productAdd.php'){echo 'active'; }else { echo ''; } ?>"> <a href="productAdd.php"><i class="fa fa-arrow-circle-o-right"></i>	Product Info</a> </li>
                                    <li class="list-group-item <?php if(basename($_SERVER['SCRIPT_NAME']) == 'myOrderList.php'){echo 'active'; }else { echo ''; } ?>"> <a href="myOrderList.php"><i class="fa fa-arrow-circle-o-right"></i>	My Order List</a> </li>
                            <?php
                                }
                            ?>
                                    
                            <?php
                                if($vUserType=='carrier')
                                {?>
                                    
                            <?php
                                }
                            ?>


                                    <li class="list-group-item <?php if(basename($_SERVER['SCRIPT_NAME']) == 'profile.php'){echo 'active'; }else { echo ''; } ?>"> <a href="profile.php"><i class="fa fa-arrow-circle-o-right"></i>	Profile</a> </li>

                                    <li class="list-group-item <?php if(basename($_SERVER['SCRIPT_NAME']) == 'changePassword.php'){echo 'active'; }else { echo ''; } ?>"> <a href="changePassword.php"><i class="fa fa-arrow-circle-o-right"></i>	Change Password</a> </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>