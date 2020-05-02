<?php include_once 'includes/dbconn.php' ?>
<?php include_once 'includes/header.php' ?>
<!-- Navigation -->
<?php include_once 'includes/nav.php' ?>
<!-- Page Content -->
<div class="container">
    <div class="row">
        <!-- Blog Entries Column -->

            <div class="col-xs-6 col-xs-offset-3">
                <div class="form-wrap">
                <h1>Register</h1>

                    <?php
                    if (isset($_POST['submit'])) {
                        $username = mysqli_real_escape_string($dbconn,$_POST['username']); 
                        $user_firstname= mysqli_real_escape_string($dbconn,$_POST['user_firstname']);
                        $user_lastname = mysqli_real_escape_string($dbconn,$_POST['user_lastname']);


                        $p_img = $_FILES['user_images'];
                        $p_img_name = $p_img['name'];
                        $p_img_temp =  $p_img['tmp_name'];
                        $post_image_des = "admin/upload/user/".$p_img_name;
                        move_uploaded_file($p_img_temp,$post_image_des);


                        $user_email = mysqli_real_escape_string($dbconn, $_POST['user_email']);
                        $user_password = mysqli_real_escape_string($dbconn, $_POST['user_password']);
                        $randQuery  = mysqli_query($dbconn,"SELECT randSalt FROM users");
                        while ($randRow = mysqli_fetch_array($randQuery)) {
                            $salt = $randRow['randSalt'];
                        }
                        $user_password = crypt($user_password,$salt);

                        $user_role = "Subscriber";
                        //$date = date("Y-m-d h:i:s-a");
                        if (!empty($username) && !empty($user_password) && !empty($user_email)) {
                            $sql = "INSERT INTO users( username, user_firstname,user_lastname,user_images, user_email, user_password,user_role) VALUES ('$username','$user_firstname','$user_lastname','$post_image_des', '$user_email','$user_password','$user_role')";
                            $result = mysqli_query($dbconn,$sql);
                            if (!$result) {
                                die("Query Failed " .mysqli_error($dbconn));
                            }else {
                                //$_SESSION['msg'] = "<script type='text/javascript'>swal('Good job!', 'Data successfully update!', 'success');</script>";
                                $_SESSION['msg'] = "<div class='col-md-12'><div class='alert alert-success alert-dismissable'>
                                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                                <h4>Data successfully update!</h4>
                                </div><div class='row'><div class='col-md-12'></div></div></div>";
                            //header("Location: registration.php");
                            }    
                        }else {
                            //$_SESSION['msg'] = "<script type='text/javascript'>swal('Good job!', 'Data successfully update!', 'error');</script>";
                            $_SESSION['msg'] = "<div class='col-md-12'><div class='alert alert-danger alert-dismissable'>
                                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                                <h4>Fields Can't be Empty!</h4>
                                </div><div class='row'><div class='col-md-12'></div></div></div>";

                        }
                        
                    }
                 ?>
                 <form action="" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
                    <div class="text-center">
                        <?php 
                        if (isset($_SESSION['msg'])) {
                            echo $_SESSION['msg']; 
                            unset($_SESSION['msg']);
                        } 
                        ?>
                        
                    </div>
                     <div class="form-group">
                        <label class="form-control-label">Username</label>
                         <input type="text" class="form-control" name="username"  >
                     </div>
                     <div class="form-group">
                        <label class="form-control-label">First Name</label>
                         <input type="text" class="form-control" name="user_firstname" >
                     </div>
                     <div class="form-group">
                        <label class="form-control-label">Last Name</label>
                         <input type="text" class="form-control" name="user_lastname" >
                     </div>
                     <div class="form-group">
                        <label class="form-control-label">Email</label>
                         <input type="email" class="form-control" name="user_email" >
                     </div>
                     <div class="form-group">
                        <label class="form-control-label">Images</label>
                         <input type="file" class="form-control" name="user_images" >
                     </div>
                     <div class="form-group">
                        <label class="form-control-label">Password</label>
                         <input type="password" class="form-control" name="user_password" >
                     </div>
                     <div class="form-group">
                        <input type="submit" class="btn btn-primary" name="submit" value="Register">   </div>
                 </form>
                 
                </div>
            </div> <!-- /.col-xs-12 -->
    </div>
<?php include_once 'includes/footer.php' ?>
