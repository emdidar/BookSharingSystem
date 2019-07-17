<?php
    $vUserId=Session::get('snUserId');
    $vEmployeeName=Session::get('snEmployeeName');
    Session::checkSession();
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
                    <div class="panel panel-basic">
                        <div class="panel-heading">
                            <!--<h3 class="panel-title">Menu Item</h3>-->
                        </div>
                        <div class="panel-body">
                        <?php
                            $hidden="hidden";
                            $hidden="";
                        ?>
                            <ul class="list-group">
                                <li class="list-group-item <?php echo $hidden; ?><?php if(basename($_SERVER['SCRIPT_NAME']) == 'dashboard.php'){echo 'active'; }else { echo ''; } ?>"> <a href="dashboard.php"><i class="fa fa-home"></i>	Dashboard</a> </li>

                                <li class="list-group-item <?php if(basename($_SERVER['SCRIPT_NAME']) == 'categoryAdd.php'){echo 'active'; }else { echo ''; } ?>"> <a href="categoryAdd.php"><i class="fa fa-arrow-circle-o-right"></i>	CategoryInfo</a> </li>

                                <li class="list-group-item <?php if(basename($_SERVER['SCRIPT_NAME']) == 'productAdd.php'){echo 'active'; }else { echo ''; } ?>"> <a href="productAdd.php"><i class="fa fa-arrow-circle-o-right"></i>	Product Info</a> </li>
                                
								<li class="list-group-item <?php if(basename($_SERVER['SCRIPT_NAME']) == 'profile.php'){echo 'active'; }else { echo ''; } ?>"> <a href="profile.php"><i class="fa fa-arrow-circle-o-right"></i>	Profile</a> </li>
                                
								<li class="list-group-item <?php if(basename($_SERVER['SCRIPT_NAME']) == 'changePassword.php'){echo 'active'; }else { echo ''; } ?>"> <a href="changePassword.php"><i class="fa fa-arrow-circle-o-right"></i>	Change Password</a> </li>

                            </ul>
                        </div>
                    </div>
                </div>