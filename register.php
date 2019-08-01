<?php
	include 'inc/header.php';
?>
    <div class="breadcrumb">
        <div class="container">
            <a class="breadcrumb-item" href="index.php">Home</a>
            <span class="breadcrumb-item active">Register</span>
        </div>
    </div>
    <section class="static about-sec">
        <div class="container">
            <h1>My Account / Register</h1>
            <p> </p>
            <div class="form">
                <?php

                if ($_SERVER['REQUEST_METHOD'] == 'POST') 
                {
                    $vUserType=mysqli_real_escape_string($db->link,$_POST['vUserType']);
                    $vEmployeeName=mysqli_real_escape_string($db->link,$_POST['vEmployeeName']);
                    $vCountry=mysqli_real_escape_string($db->link,$_POST['vCountry']);
                    $vCity=mysqli_real_escape_string($db->link,$_POST['vCity']);
                    $vZipCode=mysqli_real_escape_string($db->link,$_POST['vZipCode']);
                    $vAddress=mysqli_real_escape_string($db->link,$_POST['vAddress']);
                    $vMobile=mysqli_real_escape_string($db->link,$_POST['vMobile']);
                    $vEmail=mysqli_real_escape_string($db->link,$_POST['vEmail']);
                    $vPassword=mysqli_real_escape_string($db->link,$_POST['vPassword']);

                    $query="select * from tblogin where vEmail='$vEmail' or vMobile='$vMobile'  ";
                    $result=$db->select($query);
                    if($result!=false)
                    {
                        $value=mysqli_fetch_array($result);
                        $row=mysqli_num_rows($result);
                        if($row>0)
                        {
                            echo "<span style='color:red;font-size:18px;'>Email or mobile No. Already Exist !</span>";
                        }
                    }
                    else
                    {
                        if($vUserType!='Select User Type...')
                        {
                            $query = "insert into tblogin (vUserType, vEmployeeName, vCountry, vCity, vZipCode, vAddress, vMobile, vEmail, vPassword) values('$vUserType', '$vEmployeeName', '$vCountry', '$vCity', '$vZipCode', '$vAddress', '$vMobile', '$vEmail', '$vPassword')";

                            $dataInsert = $db->insert($query);
                            if ($dataInsert) 
                            {
                                echo "<span style='color:green;font-size:18px;'>All Information Inserted Successfully.</span>";
                            } 
                            else {
                                echo "<span style='color:red;font-size:18px;'>All Information Not Inserted !</span>";
                            }                            
                        }
                        else {
                            echo "<span style='color:red;font-size:18px;'>Please Select User Type !</span>";
                        }
                    }
                }
                ?>
                <form action="" method="POST">
                    <div class="row">					
                        <div class="col-md-4">
                            <!--oninvalid="this.setCustomValidity('Please Select User type')"-->
                            <select class="" name="vUserType" required >
								<option selected>Select User Type...</option>
								<option value="user">user</option>
								<option value="carrier">carrier</option>
							</select>
                        </div>
                        
                        <div class="col-md-4">
                            <input placeholder="Full Name" name="vEmployeeName" required>
                        </div>	
                        
                        <div class="col-md-4">
                            <input type="text" placeholder="Country" name="vCountry" required>
                        </div>
                        
                        <div class="col-md-4">
                            <input type="text" placeholder="City" name="vCity" required>
                        </div>
                        
                        <div class="col-md-4">
                            <input type="text" placeholder="Zip Code" name="vZipCode" required>
                        </div>
                        
                        <div class="col-md-4">
                            <input type="number" placeholder="Mobile" name="vMobile" required>
                        </div>
                        
                        <div class="col-md-4">
                            <input type="text" placeholder="Address" name="vAddress" required>
                        </div>
                        
                        <div class="col-md-4">
                            <input type="email" placeholder="Email" name="vEmail" required>
                        </div>
                        
                        <div class="col-md-4">
                            <input type="text" placeholder="Password" name="vPassword" required>
                        </div>
                        
                        <div class="col-lg-8 col-md-12">
                            <button type="submit" class="btn black">Register</button>
                            <h5>Already have an account? <a href="login.php">Login here</a></h5>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
<?php
	include 'inc/footer.php';
?>