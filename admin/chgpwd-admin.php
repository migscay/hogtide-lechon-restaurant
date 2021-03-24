<?php 
    include('./partials/menu.php'); 
    
    $id = $_GET['id'];

    //SQL query to Delete record
    $sql = "SELECT * FROM tbl_admin WHERE 
            id = $id";

    $res = mysqli_query($conn,$sql) or die(mysqli_error($conn));

    //check response
    if ($res==FALSE) {
        $_SESSION['update'] = 'Failed to retrieve Admin record.';
        //redirect to admin page
        header("location:".SITEURL."admin/manage-admin.php");
    }
    $row = mysqli_fetch_assoc($res);

    $db_password = $row['password'];
?>
<!-- Main Content Section Starts -->
<div class="main-content">
    <div class="wrapper"> 
        <h1>Update Admin Password</h1>
        <br/><br/>
        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td class="tbl-data">Old Password: </td>
                    <td><input type="password
                    " name="old_password" required></input></td>
                </tr>
                <tr>
                    <td class="tbl-data">New Password: </td>
                    <td><input type="password" name="new_password" required></input></td>
                </tr>
                <tr>
                    <td><input type="submit" name="submit" value="Update Admin" class="btn-secondary"></input></td>
                    <td><a href='<?php echo SITEURL; ?>admin/manage-admin.php ?>' class='btn-primary'>Cancel</a></td>
                </tr>
            </table>
        </form>
    </div>
</div>
        <!-- Main Content Section Ends -->
<?php include('./partials/footer.php'); 
        if (isset($_POST['submit'])) {

            //get the data from the form
            $old_password = md5($_POST['old_password']);

            //old password should be equal to the password from tbl
            if ($db_password == $old_password) {
                $new_password = md5($_POST['new_password']); //password encrypted with MD5
        
                $sql = "UPDATE tbl_admin SET 
                     password = '$new_password'
                     WHERE 
                     id = $id"; 
                        
                //execute query
                $res = mysqli_query($conn,$sql) or die(mysqli_error($conn));
            
                //check response
                if ($res==TRUE) {
                    $_SESSION['update'] = 'Admin Password Changed';
                    //redirect to admin page
                    header("location:".SITEURL."admin/manage-admin.php");
                }
                else 
                {
                    echo "Failed";
                }
            }
            else
            //old password incorrect
            {
                echo "Old password not correct";
                //$_SESSION['failed'] = 'Old Password Incorrect';
            }    
        }       
?>