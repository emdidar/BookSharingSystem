<?php include 'inc/header.php';?>
<?php
if(!isset($_GET['deleteid']) || $_GET['deleteid']==NULL)
{
    header("Location:productAdd.php");
}
else
{
    $deleteid=$_GET['deleteid'];
    
    
    $query="select vImage1,vImage2,vImage3 from tbProductinfo where iAutoId like '$deleteid' ";
    $selectData=$db->select($query);
    if($selectData)
    {
        while($result=$selectData->fetch_assoc())
        {
            if (file_exists($result['vImage1'])) 
            {
                unlink($result['vImage1']);
            }
            if (file_exists($result['vImage2'])) 
            {
                unlink($result['vImage2']);
            }
            if (file_exists($result['vImage3'])) 
            {
                unlink($result['vImage3']);
            }
        }
    }

    $delquery = "delete from tbproductinfo where iAutoId = '$deleteid'";
    $deldata = $db->delete($delquery);

    if($deldata)
    {
        echo "<script>window.location = 'productAdd.php'; </script>";
        echo "<script>alert('Event Deleted Successfully !!')</script>";
    }
    else
    {
        echo "<script>alert('Event Not Deleted !!')</script>";
        echo "<script>window.location = 'productAdd.php'; </script>";
    }
}


?>


