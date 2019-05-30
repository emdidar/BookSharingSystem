<?php
    include 'lib/Session.php';
    Session::init();
    include 'lib/Database.php';
	include 'helpers/Format.php';

	spl_autoload_register(function($class){
		include_once "classes/".$class.".php";
	});

	$db  = new Database();
	$fm  = new Format();


?>

<?php
  header("Cache-Control: no-cache, must-revalidate");
  header("Pragma: no-cache"); 
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
  header("Cache-Control: max-age=2592000");
?>

<!DOCTYPE.php>
<html lang="en">
  <head>
      
    
    <!--preloader1 Start-->
    <style>
    .no-js #loader { display: none;  }
    .js #loader { display: block; position: absolute; left: 100px; top: 0; }
    .se-pre-con {
        position: fixed;
        left: 0px;
        top: 0px;
        width: 100%;
        height: 100%;
        z-index: 9999;
        background: url(images/loader-64x/Preloader_2.gif) center no-repeat #fff;
    }
    </style>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
    <script src="js/modernizr.js"></script>
    
    <script>
        $(window).load(function() {
            // Animate loader off screen
            $(".se-pre-con").fadeOut("slow");;
        });
    </script>    
    <!--preloader1 End-->
    
    
    
    
    

	<link rel="icon" type="image/png" href="images/favicon.ico">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Coding Help BD</title>
    
    
    <meta content='বাংলা ওয়েব এবং সফটওয়্যার ডেভেলপমেন্ট টিউটোরিয়াল।' name='description'/>
    <meta content='http://www.codinghelpbd.com/' property='og:url'/>
    <meta content='Coding Help BD' property='og:title'/>
    <meta content='বাংলা ওয়েব এবং সফটওয়্যার ডেভেলপমেন্ট টিউটোরিয়াল।' property='og:description'/>

    <meta content='Coding Help BD, live project tutorial, bangla coding tutorial, Training with Live Project, bangla java tutorial,java bangla tutorial youtube, php live project training, php bangla tutorial youtube, php bangla video tutorial, php mysql bangla tutorial , bangla tutorial blog, Dhaka, Bangla CodeIgniter tutorial, Bangla SEO tutorial, Bangla Graphic Design tutorial, Bangla Oracle Database tutorial, Bangla MySQL Database tutorial,বাংলা পিএইচপি (PHP OOP) টিউটোরিয়াল, বাংলা অবজেক্ট ওরিয়েন্টেড পিএইচপি,অবজেক্ট ওরিয়েন্টেড পিএইচপি,অবজেক্ট ওরিয়েন্টেড প্রোগ্রামিং' name='keywords'/>
    <meta content='index, follow' name='robots'/>
    <meta content='website' property='og:type'/>
    <meta content='Coding Help BD' property='og:site_name'/>
    <meta content='https://www.facebook.com/codinghelpbd' property='article:author'/>
    <meta content='https://www.twiter.com/codinghelpbd' property='article:publisher'/>


    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/animate.css">
	<link href="css/prettyPhoto.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet" />	
   
   
   <!--preloader2 Start-->
   
    <!--<link rel="stylesheet" href="css/fakeLoader.min.css">    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery3.3.1.min.js"></script>   
	<script src="js/jquery3.3.1.min.js"></script>
    <script src="js/fakeLoader.min.js"></script>
    <div class="fakeLoader"></div>

    <script>
        $(document).ready(function () {
            $.fakeLoader({
                bgColor: '#2ecc71',
                spinner:"spinner7"
            });
        });
    </script>-->
    
    <!--preloader2 End-->
    
    
  </head>
  <body>
      
    <!--preloader1 Start-->
    <div class="se-pre-con"></div>
    <script>
        $(window).load(function() {
		$(".se-pre-con").fadeOut("slow");;
	});  
    </script>
    <!--preloader1 End-->
    
    
    
	
	<header>		
		<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
			<div class="navigation">
				<div class="container">					
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse.collapse">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<div class="navbar-brand">
							<a href="index.php"><img class="logoSize" src="images/logo.png" alt="Coding Help BD"></a>
						</div>
					</div>
					
					<div class="navbar-collapse collapse">							
						<div class="menu">
							<ul class="nav nav-tabs" role="tablist">
								<li role="presentation"><a href="index.php" class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'index.php'){echo 'active'; }else { echo ''; } ?>">Home</a></li>
								
								<li role="presentation"><a href="courses.php" class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'courses.php'){echo 'active'; }else { echo ''; } ?>">Courses</a></li>
								
								<li role="presentation"><a href="blog.php" class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'blog.php'){echo 'active'; }else { echo ''; } ?>">Blog</a></li>
								
								<li role="presentation"><a href="about.php" class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'about.php'){echo 'active'; }else { echo ''; } ?>">About Us</a></li>
								
								<li role="presentation"><a href="contact.php" class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'contact.php'){echo 'active'; }else { echo ''; } ?>">Contact</a></li>	
								
								<!--<li role="presentation"><a href="services.php">Services</a></li>								
								<li role="presentation"><a href="portfolio.php">Portfolio</a></li>-->					
							</ul>
						</div>
					</div>						
				</div>
			</div>	
		</nav>		
	</header>