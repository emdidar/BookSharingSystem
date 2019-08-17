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
    function getUserIP()
    {
        // Get real visitor IP behind CloudFlare network
        if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
                  $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
                  $_SERVER['HTTP_CLIENT_IP'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
        }
        $client  = @$_SERVER['HTTP_CLIENT_IP'];
        $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
        $remote  = $_SERVER['REMOTE_ADDR'];

        if(filter_var($client, FILTER_VALIDATE_IP))
        {
            $ip = $client;
        }
        elseif(filter_var($forward, FILTER_VALIDATE_IP))
        {
            $ip = $forward;
        }
        else
        {
            $ip = $remote;
        }

        return $ip;
    }
    $vUserIp = getUserIP();

    $iCartValue=0;
    $query="select count(iAutoId)iCartValue from tbcart where vUserIp='$vUserIp' ";
    $data=$db->select($query);
    while($productResult=$data->fetch_assoc())
    {
        $iCartValue=$productResult['iCartValue'];
    }
?>

<?php
    header("Cache-Control: no-cache, must-revalidate");
    header("Pragma: no-cache"); 
    header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
    header("Cache-Control: max-age=2592000");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Book Sharing System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#03a6f3">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:200,300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/styles.css">
    
	<link href="css/dataTables.bootstrap.min.css" rel="stylesheet" />
    
</head>

<body>
    <header>		
        <div class="main-menu">
            <div class="container">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="navbar-brand" href="index.php">Book Sharing System</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto">
                            <!--<li class="navbar-item active">-->
                            <li class="navbar-item">
                                <a href="index.php" class="nav-link">Home</a>
                            </li>
                            <li class="navbar-item">
                                <a href="shop.php" class="nav-link">Shop</a>
                            </li>
                            <li class="navbar-item">
                                <a href="about.php" class="nav-link">About</a>
                            </li>
                            <li class="navbar-item">
                                <a href="faq.php" class="nav-link">FAQ</a>
                            </li>
                            <li class="navbar-item">
                                <a href="search.php" class="nav-link">Search</a>
                            </li>
                            <?php
                                $login = Session::get("login");
                                if($login==true)
                                {?>
                                    <li class="navbar-item">
                                        <a href="dashboard.php" class="nav-link">Dashboard</a>
                                    </li>
                            <?php } ?>
                            <?php
                                if(isset($_GET['action']) && $_GET['action']=="logout")
                                {
                                    Session::destroy();
                                    echo "<script>location='login.php'</script>";
                                }
                            ?>
                            <li class="navbar-item">
                                <?php
                                $login = Session::get("login");
                                if($login==false)
                                {?>
                                    <a href="login.php" class="nav-link">Login</a>
                                <?php 
                                } 
                                else 
                                { ?>
                                    <a href="?action=logout" class="nav-link">Logout</a>
                                <?php 
                                } ?>
                            </li>
                        </ul>
                        
                        
                        
                        <!--<div class="cart my-2 my-lg-0">
                            <form class="form-inline my-2 my-lg-0">
                                <input class="form-control mr-sm-2" type="search" placeholder="Search here..." aria-label="Search">
                                <span class="fa fa-search"></span> 
                            </form>
                        </div>-->
                    </div>
                </nav>
            </div>
        </div>
    </header>