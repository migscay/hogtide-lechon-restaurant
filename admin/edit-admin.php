<?php 
    include('./partials/menu.php'); 
    //session_start(); 
    
    $id = $_GET['id'];
    //echo $id;

    //SQL query to Delete record
    $sql = "SELECT * FROM tbl_admin WHERE 
            id = $id";

    $res = mysqli_query($conn,$sql) or die(mysqli_error($conn));

    //check response
    if ($res==FALSE) {
        $_SESSION['update'] = 'Faile to retrieve Admin record.';
        //redirect to admin page
        header("location:".SITEURL."admin/manage-admin.php");
    }
    $row = mysqli_fetch_assoc($res);

    $full_name = $row['full_name'];
    $username = $row['username'];
?>
<!-- Main Content Section Starts -->
<div class="main-content">
    <div class="wrapper"> 
        <h1>Update Admin</h1>
        <br/><br/>
        <form action="" method="POST">
            <table class="tbl-50">
                <tr>
                    <td class="tbl-data">Full Name: </td>
                    <td><input type="text" name="full_name" value="<?php echo $full_name;?>" required></input></td>
                    <!-- <span class="error"> <?php echo $nameErr;?></span> -->
                </tr>
                <tr>
                    <td class="tbl-data">User Name: </td>
                    <td><input type="text" name="username" value=<?php echo $username; ?> required></input></td>
                </tr>
                <!-- <tr>
                    <td class="tbl-data">Password : </td>
                    <td><input type="password" name="password" placeholder="Enter your password" required></input></td>
                </tr> -->
                <tr>
                    <td><input type="submit" name="submit" value="Update Admin" class="btn-secondary"></input></td>
                    <td><a href='<?php echo SITEURL; ?>admin/manage-admin.php ?>' class='btn-primary'>Cancel</a></td>
                </tr>
            </table>
        </form>
    </div>
</div>
        <!-- Main Content Section Ends -->
<?php include('./partials/footer.php'); ?>


<?php

    //add form values into a tbl-admin record
    //check whether submit btn is clicked
    if (isset($_POST['submit'])) {

        //echo "Submit button clicked";
        //get the data from the form
        $full_name = $_POST['full_name'];
        $username = $_POST['username'];

        //SQL query to add record
        $sql = "UPDATE tbl_admin SET 
            full_name = '$full_name',
            username = '$username' WHERE 
            id = $id"; 

        //execute query
        $res = mysqli_query($conn,$sql) or die(mysqli_error($conn));
    
        //check response
        if ($res==TRUE) {
            $_SESSION['update'] = 'Admin Updated';
            //redirect to admin page
            header("location:".SITEURL."admin/manage-admin.php");
        }
        else 
        {
            echo "Failed";
        }

        }
?>