<?php include 'inc/header.php';?>
<?php
if(!isset($_GET['deleteid']) || $_GET['deleteid']==NULL)
{
    header("Location:inbox.php");
}
else
{
    $deleteid=$_GET['deleteid'];

    $delquery = "delete from tbInbox where iAutoId = '$deleteid'";
    $deldata = $db->delete($delquery);

    if($deldata)
    {
        echo "<script>window.location = 'inbox.php'; </script>";
        echo "<script>alert('Information Deleted Successfully !!')</script>";
    }
    else
    {
        echo "<script>alert('Information Not Deleted !!')</script>";
        echo "<script>window.location = 'inbox.php'; </script>";
    }
}


?>


