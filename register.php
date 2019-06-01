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
                <form>
                    <div class="row">			
                        <div class="col-md-4">
                            <input placeholder="Full Name" required>
                            <span class="required-star">*</span>
                        </div>				
                        <div class="col-md-4">
                            <select class="custom-select">
								<option selected>Select User Type...</option>
								<option value="1">User</option>
								<option value="2">Carrier</option>
							</select>
                            <span class="required-star">*</span>
                        </div>			
                        <div class="col-md-4">
                            <input type="Number" placeholder="Mobile" required>
                            <span class="required-star">*</span>
                        </div>		
                        <div class="col-md-4">
                            <input type="Email" placeholder="Email" required>
                            <span class="required-star">*</span>
                        </div>
                        <div class="col-md-4">
                            <input type="password" placeholder="Password" required>
                            <span class="required-star">*</span>
                        </div>
                        <div class="col-md-4">
                            <input type="password" placeholder="Repeat Password" required>
                            <span class="required-star">*</span>
                        </div>
                        <div class="col-lg-8 col-md-12">
                            <button class="btn black">Register</button>
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