<?php include_once "include/header.php" ?>
<?php include_once "include/nav.php" ?>

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
                <h3 class="page-header text-uppercase">Add Post Item</h3>
                <?php
                    if (isset($_POST['submit'])) {
                        $post_ctg_id = $_POST['post_ctg_id'];
                        $post_title= $_POST['post_title'];
                        $post_author = $_POST['post_author'];
                        $p_img = $_FILES['post_image'];

                        $p_img_name = $p_img['name'];
                        $p_img_temp =  $p_img['tmp_name'];
                        $post_image_des = "upload/".$p_img_name;
                        move_uploaded_file($p_img_temp,$post_image_des);

                        $post_content = $_POST['post_content'];
                        $post_tags = $_POST['post_tags'];
                        $post_status = $_POST['post_status'];
                        $date = date("Y-m-d h:i:s-a");
                        //$post_comment_count = 4;

                        $sql = "INSERT INTO posts( post_ctg_id, post_title,post_author,date,post_image, post_content, post_tags,post_status) VALUES ('$post_ctg_id','$post_title','$post_author',NOW(),'$post_image_des', '$post_content','$post_tags','$post_status')";
                        $result = mysqli_query($dbconn,$sql);
                        echo "<p class='bg-info'>Post has been Updated. <a target='blank' href='viewpost.php'>View Post</a></p>";
                        if (!$result) {
                            die("Query Failed " .mysqli_error($dbconn));
                        }else {
                            ?>
                            <script>alert('Post Added Successfully!')</script>
                            <?php
                        }
                    }
                 ?>
                 <form action="" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
                     <div class="form-group">
                        <label class="form-control-label">Post Category ID</label>
                        <select name="post_ctg_id" class="form-control" >
                        <?php 
                        $menuItem = $dbconn->query("SELECT * FROM `categories`");
                        while ($ctgRow = $menuItem->fetch_assoc()) {
                        ?>
                        <option value="<?php echo $ctgRow['ctg_title']; ?>"><?php echo $ctgRow['ctg_title']; ?></option>
                        <?php
                        }

                        ?>
                        </select>
                     </div>
                     <div class="form-group">
                        <label class="form-control-label">Post Title</label>
                         <input type="text" class="form-control" name="post_title" autocomplete="off">
                     </div>
                     <div class="form-group">
                        <label class="form-control-label">Post Author</label>
                         <input type="text" class="form-control" name="post_author" autocomplete="off">
                     </div>
                     <div class="form-group">
                        <label class="form-control-label">Post Images</label>
                         <input type="file" class="form-control" name="post_image" >
                     </div>
                     <div class="form-group">
                        <label class="form-control-label">Post Content</label>
                         <textarea name="post_content" style="width: 100%;" ></textarea>
                     </div>
                     <div class="form-group">
                        <label class="form-control-label">Post Tags</label>
                         <input type="text" class="form-control" name="post_tags" autocomplete="off">
                     </div>
                     <div class="form-group">
                        <label class="form-control-label">Post Status</label>
                         <select name="post_status" class="form-control">
                             <option value="Published">Published</option>
                             <option value="Draft">Draft</option>
                             <option value="Colse">Colse</option>
                         </select>
                     </div>
                     <div class="form-group">
                        <input type="submit" class="btn btn-primary" name="submit" value="Add Post">   </div>
                 </form>
            </div>
        </div>
    </div>

</div>
    <!-- /.container-fluid -->

<?php include_once "include/footer.php" ?>