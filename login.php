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
            
            <?php
                if ($_SERVER['REQUEST_METHOD'] == 'POST') 
                {
                    /*$query="select vUserId, vPassword from tblogin-info where vUserId='$vUserId' and vPassword='$vPassword' ";
                    $selectData=$db->select($query);
                    if($selectData)
                    {
                        echo "<script>location='dashboard.php'</script>";
                    }*/
                    echo "<script>location='dashboard.php'</script>";
                }
            ?>
            <div class="form">
                <form action="dashboard.php" method="post">
                    <div class="row">
                        <div class="col-md-5">
                            <input type="Email" placeholder="Email" >
                            <span class="required-star">*</span>
                        </div>
                        <div class="col-md-5">
                            <input type="password" placeholder="Password" >
                            <span class="required-star">*</span>
                        </div>
                        <div class="col-lg-8 col-md-12">
                            <button class="btn black">Login</button>
                            <h5>not Registered? <a href="register.php">REgister here</a></h5>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
<?php
	include 'inc/footer.php';
?>