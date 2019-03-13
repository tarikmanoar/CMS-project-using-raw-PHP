<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Welcome
                    <small>admin</small>
                </h1>
            </div>
            <div class="col-lg-6 col-md-offset-3">
                <h3 class="page-header">Update Post Item</h3>
                <?php 
                    if (isset($_GET['edit'])) {
                        $id = $_GET['edit'];
                        $result = mysqli_query($dbconn,"SELECT * FROM users WHERE user_id='$id'");
                        $row = mysqli_fetch_assoc($result);
                    }
                    if (isset($_POST['submit'])) {
                        $id = $_GET['edit'];
                        $username= $_POST['username'];
                        $user_firstname = $_POST['user_firstname'];
                        $user_lastname = $_POST['user_lastname'];
                        $user_password = $_POST['user_password'];
                        $user_email = $_POST['user_email'];
                        $user_role = $_POST['user_role'];

                        //Images Upload
                        $user_images = $_FILES['user_images']['name'];
                        $user_images_temp = $_FILES['user_images']['tmp_name'];
                        $post_image_des = "upload/user/".$user_images;
                        move_uploaded_file($user_images_temp,$post_image_des);
                        if(empty($user_images)) {
                            $query = "SELECT * FROM users WHERE user_id = $id ";
                            $select_image = mysqli_query($dbconn,$query);
                            
                            while($row = mysqli_fetch_array($select_image)) {
                            
                                $user_images = $row['user_images'];
                        
                            }
                        }

                        //$date = date("Y-m-d h:i:s-a");
                        $result = mysqli_query($dbconn,"UPDATE users SET username='$username',user_password='$user_password',user_firstname='$user_firstname',user_lastname='$user_lastname',user_email='$user_email',user_images='$post_image_des',user_role='$user_role' WHERE user_id ='$id'");
                        if (!$result) {
                            die("Query Failed" . mysqli_error($dbconn));
                        }else {
                            header('Location: users.php');
                        }
                    }
                 ?>
                 <form action="" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                     <div class="form-group">
                        <label class="form-control-label">User First Name</label>
                         <input required="on" type="text" class="form-control" name="user_firstname" value="<?php echo $row['user_firstname'] ?>">
                     </div>
                     <div class="form-group">
                        <label class="form-control-label">User Last Name</label>
                         <input required="on" type="text" class="form-control" name="user_lastname" value="<?php echo $row['user_lastname'] ?>">
                     </div>
                     <div class="form-group">
                        <label class="form-control-label">Username</label>
                         <input required="on" type="text" class="form-control" name="username" value="<?php echo $row['username'] ?>">
                     </div>
                     <div class="form-group">
                        <label class="form-control-label">User Email Address</label>
                         <input required="on" type="email" class="form-control" name="user_email" value="<?php echo $row['user_email'] ?>">
                     </div>
                     <div class="form-group">
                        <label class="form-control-label">User Images</label><br>
                        <img src="<?php echo $row['user_images'] ?>" alt="No Images Here" width="150px" > <br>
                         <input type="file" class="form-control" name="user_images" required>
                     </div>
                     <div class="form-group">
                        <label class="form-control-label">User Role</label>
                        <select name="user_role" class="form-control">
                            <option value="Subscriber">Select option</option>
                            <option value="Admin">Admin</option>
                            <option value="Subscriber">Subscriber</option>
                        </select>
                     </div>
                     <div class="form-group">
                        <label class="form-control-label">User Password</label>
                         <input required="on" type="text" class="form-control" name="user_password" value="<?php echo $row['user_password'] ?>">
                     </div>
                     <div class="form-group">
                        <input type="submit" class="btn btn-primary" name="submit" value="Update Info">
                     </div>
                 </form>
            </div>
        </div>
    </div>

</div>
    <!-- /.container-fluid -->
