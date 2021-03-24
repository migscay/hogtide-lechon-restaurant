<?php include('./partials/menu.php') ?>
        <!-- Main Content Section Starts -->
        <div class="main-content">
            <div class="wrapper"> 
                <h1>Manage Admin</h1>
                <br/><br/>
                <!-- Button to add admin -->
                <a href="add-admin.php" class="btn-primary">Add Admin</a> 
                <br/><br/><br/>
                <?php
                //echo "checking for messages";
                //check for messages
                if (isset($_SESSION['add'])) {
                    echo $_SESSION['add'];
                    unset($_SESSION['add']);
                }
                if (isset($_SESSION['delete'])) {
                    echo $_SESSION['delete'];
                    unset($_SESSION['delete']);
                }
                if (isset($_SESSION['update'])) {
                    echo $_SESSION['update'];
                    unset($_SESSION['update']);
                }
                ?>
                <table class="tbl-full">
                    <tr>
                        <th class="tbl-heading">S.N.</th>
                        <th class="tbl-heading">Fullname</th>
                        <th class="tbl-heading">Username</th>
                        <th class="tbl-heading">Actions</th> 
                    </tr>
                    <?php
                    //get admins from tbl-admin 
        

                    //SQL query to add record
                    $sql = "SELECT id,full_name,username FROM tbl_admin";  
            
                    //execute query
                    $res = mysqli_query($conn,$sql) or die(mysqli_error($conn));
    
                    // //check response
                    // if ($res==TRUE) {
                    //     echo "success";
                    // }
                    // else 
                    // {
                    //     echo "Failed";
                    // }

                    //get the data from the form
                    // $full_name = $_POST['full_name'];
                    // $username = $_POST['username'];
                    // $password = md5($_POST['password']); //password encrypted with MD5
                    $sn = 1;
                    while ($row = mysqli_fetch_assoc($res)) {
                        $id = $row['id'];
                        $full_name = $row['full_name'];
                        $username = $row['username'];
                    ?>                

                    <tr>
                        <td class='tbl-data'>
                            <?php echo $sn++; ?>
                        </td>
                        <td class='tbl-data'>
                            <?php echo $full_name; ?>
                        </td>
                        <td class='tbl-data'>
                            <?php echo $username; ?>
                        </td>
                        <td class='tbl-data'>
                            <a href='<?php echo SITEURL; ?>admin/chgpwd-admin.php?id=<?php echo $id; ?>' class='btn-primary'>Change Password</a>
                            <a href='<?php echo SITEURL; ?>admin/edit-admin.php?id=<?php echo $id; ?>' class='btn-secondary'>Update Admin</a>
                            <a href='<?php echo SITEURL; ?>admin/delete-admin.php?id=<?php echo $id; ?>' class='btn-danger'>Delete Admin</a>
                        </td>
                    </tr>

                    <?php
                    }
                    ?>
                </table>

                <div class="clearfix"></div>
            </div>
        </div>
        <!-- Main Content Section Ends -->
<?php include('./partials/footer.php') ?>


<?php
    //check whether submit btn is clicked
    if (isset($_POST['update'])) {
        echo "Update Admin button clicked";
        
        // //get the data from the form
        // $full_name = $_POST['full_name'];
        // $username = $_POST['username'];
        // $password = md5($_POST['password']); //password encrypted with MD5

        // //SQL query to add record
        // $sql = "INSERT INTO tbl_admin SET 
        //     full_name = '$full_name',
        //     username = '$username',
        //     password = '$password'";
            
        // //execute query
        // $res = mysqli_query($conn,$sql) or die(mysqli_error($conn));
    
        // //check response
        // if ($res==TRUE) {
        //     echo "success";
        // }
        // else 
        // {
        //     echo "Failed";
        // }
    }   
?>