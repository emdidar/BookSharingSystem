<?php include 'inc/header.php';?>
<?php
if(!isset($_GET['id']) || $_GET['id']==NULL)
{
    header("Location:cart.php");
}
else
{
    $deleteid=$_GET['id'];

    $delquery = "delete from tbcart where iAutoId = '$deleteid'";
    $deldata = $db->delete($delquery);

    if($deldata)
    {
        echo "<script>window.location = 'cart.php'; </script>";
        echo "<script>alert('All Information Deleted Successfully !!')</script>";
    }
    else
    {
        echo "<script>alert('All Information Not Deleted !!')</script>";
        echo "<script>window.location = 'cart.php'; </script>";
    }
}


?>


