<?php include('../config/constants.php'); ?>
<?php  
    $id = $_GET['id'];
    //echo $id;

    //SQL query to Delete record
    $sql = "DELETE FROM tbl_admin WHERE 
            id = $id";

    $res = mysqli_query($conn,$sql) or die(mysqli_error($conn));

    //check response
    if ($res==TRUE) {
        $_SESSION['delete'] = 'Admin Deleted';
        //redirect to admin page
        header("location:".SITEURL."admin/manage-admin.php");
    }
    else 
    {
        echo "Failed";
    }
?>