<?php include 'inc/header.php';?>
<?php
if(!isset($_GET['deleteid']) || $_GET['deleteid']==NULL)
{
    header("Location:categoryAdd.php");
}
else
{
    $deleteid=$_GET['deleteid'];

    $delquery = "delete from tbcategoryinfo where iAutoId = '$deleteid'";
    $deldata = $db->delete($delquery);

    if($deldata)
    {
        echo "<script>window.location = 'categoryAdd.php'; </script>";
        echo "<script>alert('All Information Deleted Successfully !!')</script>";
    }
    else
    {
        echo "<script>alert('All Information Not Deleted !!')</script>";
        echo "<script>window.location = 'categoryAdd.php'; </script>";
    }
}


?>


