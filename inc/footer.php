<footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="address">
                        <h4>Our Address</h4>
                        <h6>The Book Sharing System, Chittagong</h6>
                        <h6>Call : 800 1234 5678</h6>
                        <h6>Email : booksharinfo@.com</h6>
                    </div>
                    <div class="timing">
                        <h4>Timing</h4>
                        <h6>Mon - Fri: 9am - 10pm</h6>
                        <h6>Saturday: 9am - 10pm</h6>
                        <h6>Sunday: 9am - 10pm</h6>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="navigation">
                        <h4>Navigation</h4>
                        <ul>
                            <li><a href="index.php">Home</a></li>
                            <li><a href="about.php">About Us</a></li>
                            <li><a href="products.php">Products</a></li>
                        </ul>
                    </div>
                    <div class="navigation">
                        <h4>Help</h4>
                        <ul>
                            <li><a href="privacy-policy.php">Privacy</a></li>
                            <li><a href="faq.php">FAQ’s</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="form">
                        <h3>Quick Contact us</h3>
                        <h6></h6>
                        <?php
                        if ($_SERVER['REQUEST_METHOD'] == 'POST') 
                        {
                            $vName=mysqli_real_escape_string($db->link,$_POST['vName']);
                            $vEmail=mysqli_real_escape_string($db->link,$_POST['vEmail']);
                            $vMessage=mysqli_real_escape_string($db->link,$_POST['vMessage']);
                            $query = "insert into tbInbox (vName, vEmail, vMessage, dDate) 
                                    values('$vName','$vEmail','$vMessage',CURDATE())"; 
                            
                            if(!empty($vName) && !empty($vEmail) && !empty($vMessage))
                            {
                                $dataInsert = $db->insert($query);
                                if ($dataInsert) 
                                {
                                    echo "<span style='color:green;font-size:18px;'>Message send Successfully.</span>";
                                } 
                                else {
                                    echo "<span style='color:red;font-size:18px;'>Message Not send Successfully !</span>";
                                }
                            } 
                            
                        }
                        ?>
                        <form action="" method="post">
                            <div class="row">
                                <div class="col-md-6">
                                    <input placeholder="Name" name="vName" required>
                                </div>
                                <div class="col-md-6">
                                    <input type="email" placeholder="Email" name="vEmail" required>
                                </div>
                                <div class="col-md-12">
                                    <textarea placeholder="Messege" name="vMessage"></textarea>
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" class="btn black">Alright, Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="copy-right">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h5>(C) 2019. All Rights Reserved. </h5>
                    </div>
                    <div class="col-md-6">
                        <div class="share align-middle">
                            <span class="fb"><i class="fa fa-facebook"></i></span>
                            <span class="instagram"><i class="fa fa-instagram"></i></span>
                            <span class="twitter"><i class="fa fa-twitter"></i></span>
                            <span class="pinterest"><i class="fa fa-pinterest"></i></span>
                            <span class="google"><i class="fa fa-google-plus"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/owl.carousel.min.js"></script>
    <script src="js/custom.js"></script>
</body>

</html>