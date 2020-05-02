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
                <h3 class="page-header text-uppercase">Add User</h3>
                <?php
                    if (isset($_POST['submit'])) {
                        $username =mysqli_real_escape_string($dbconn, $_POST['username']);
                        $user_firstname=mysqli_real_escape_string($dbconn,$_POST['user_firstname']) ;
                        $user_lastname =mysqli_real_escape_string($dbconn,$_POST['user_lastname']) ;


                        $p_img = $_FILES['user_images'];
                        $p_img_name = $p_img['name'];
                        $p_img_temp =  $p_img['tmp_name'];
                        $post_image_des = "upload/user/".$p_img_name;
                        move_uploaded_file($p_img_temp,$post_image_des);
                        if(empty($user_images)) {
                             $post_image_des = "upload/user/admin.png";
                        }


                        $user_email =mysqli_real_escape_string($dbconn,$_POST['user_email']) ;
                        $user_password =mysqli_real_escape_string($dbconn,$_POST['user_password']) ;
                        $user_role = $_POST['user_role'];
                        //$date = date("Y-m-d h:i:s-a");
                        //$post_comment_count = 4;

                        $sql = "INSERT INTO users( username, user_firstname,user_lastname,user_images, user_email, user_password,user_role) VALUES ('$username','$user_firstname','$user_lastname','$post_image_des', '$user_email','$user_password','$user_role')";
                        $result = mysqli_query($dbconn,$sql);
                        if (!$result) {
                            die("Query Failed " .mysqli_error($dbconn));
                        }else {
                            ?>
                            <script>alert('User Created!')</script>
                            <?php
                        }
                    }
                 ?>
                 <form action="" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
                     <div class="form-group">
                        <label class="form-control-label">Username</label>
                         <input type="text" class="form-control" name="username" >
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
                        <label class="form-control-label">Role</label>
                         <select name="user_role" class="form-control">
                             <option value="Subscriber">Select option</option>
                             <option value="Admin">Admin</option>
                             <option value="Subscriber">Subscriber</option>
                         </select>
                     </div>
                     <div class="form-group">
                        <label class="form-control-label">Password</label>
                         <input type="password" class="form-control" name="user_password" >
                     </div>
                     <div class="form-group">
                        <input type="submit" class="btn btn-primary" name="submit" value="Add User">   </div>
                 </form>
            </div>
        </div>
    </div>

</div>
    <!-- /.container-fluid -->