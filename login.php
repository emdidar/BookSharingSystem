<?php
	include 'inc/header.php';
?>
    <div class="breadcrumb">
        <div class="container">
            <a class="breadcrumb-item" href="index.php">Home</a>
            <span class="breadcrumb-item active">Login</span>
        </div>
    </div>
    <section class="static about-sec">
        <div class="container">
            <h1>My Account / Login</h1>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's printer took a galley of type and scrambled it to make a type specimen book. It has survived not only fiveLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem </p>
            <div class="form">
                <?php
                    if($_SERVER['REQUEST_METHOD']=='POST')
                    {
                        $vEmail=$fm->validation($_POST['vEmail']);
                        $vPassword=$_POST['vPassword'];

                        $query="select * from tblogin where vEmail='$vEmail' and vPassword='$vPassword' ";
                        $result=$db->select($query);
                        if($result!=false)
                        {
                            $value=mysqli_fetch_array($result);
                            $row=mysqli_num_rows($result);
                            if($row>0)
                            {
                                Session::set("login",true);
                                Session::set("snUserId",$value['iAutoId']);
                                Session::set("snEmployeeName",$value['vEmployeeName']);
                                Session::set("snUserType",$value['vUserType']);
                                Session::set("snEmail",$value['vEmail']);
                                header("Location:dashboard.php");
                            }
                            else
                            {
                                echo "<span style='color:red;font-size:18px;'>No Result found !!</span>";
                            }
                        }
                        else
                        {
                            echo "<span style='color:red;font-size:18px;'>Username or Passsword not matched !!</span>";
                        }
                    }
                ?>
                <form action="" method="post">
                    <div class="row">
                        <div class="col-md-5">
                            <input type="Email" placeholder="Email" name="vEmail" >
                            <span class="required-star">*</span>
                        </div>
                        <div class="col-md-5">
                            <input type="password" placeholder="Password" name="vPassword">
                            <span class="required-star">*</span>
                        </div>
                        <div class="col-lg-8 col-md-12">
                            <button class="btn black">Login</button>
                            <h5>Not Registered? <a href="register.php">Register here</a></h5>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
<?php
	include 'inc/footer.php';
?>