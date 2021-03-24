<?php include('./partials/menu.php'); ?>
        <!-- Main Content Section Starts -->
        <div class="main-content">
            <div class="wrapper"> 
                <h1>Add Admin</h1>
                <br/><br/>
                <form action="" method="POST">
                    <table class="tbl-50">
                        <tr>                
                            <td class="tbl-data">Full Name: </td>
                            <td><input type="text" name="full_name" placeholder="Enter your name" required></input></td>
                            <!-- <span class="error"> <?php echo $nameErr;?></span> -->
                        </tr>
                        <tr>
                            <td class="tbl-data">User Name: </td>
                            <td><input type="text" name="username" placeholder="Enter your user name" required></input></td>
                        </tr>
                        <tr>
                            <td class="tbl-data">Password : </td>
                            <td><input type="password" name="password" placeholder="Enter your password" required></input></td>
                        </tr>
                        <tr>
                            <td><input type="submit" name="submit" value="Add Admin" class="btn-secondary"></input></td>
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

        //get the data from the form
        $full_name = $_POST['full_name'];
        $username = $_POST['username'];
        $password = md5($_POST['password']); //password encrypted with MD5

        if ($full_name == '') {
            $nameErr = "Name must be at least 3 characters.";
        }
        if ($nameErr == "") {
        //SQL query to add record
        $sql = "INSERT INTO tbl_admin SET 
            full_name = '$full_name',
            username = '$username',
            password = '$password'";
            
        //execute query
        $res = mysqli_query($conn,$sql) or die(mysqli_error($conn));
    
        //check response
        if ($res==TRUE) {
            $_SESSION['add'] = 'Admin Added';
            //redirect to admin page
            header("location:".SITEURL."admin/manage-admin.php");
        }
        else 
        {
            echo "Failed";
        }

        }
    }   
?>