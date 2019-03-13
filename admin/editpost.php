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
                <h3 class="page-header">Update Post Item</h3>
                <?php 
                    if (isset($_GET['edit'])) {
                        $id = $_GET['edit'];
                        $result = mysqli_query($dbconn,"SELECT * FROM posts WHERE id='$id'");
                        $row = mysqli_fetch_assoc($result);
                    }
                    if (isset($_POST['submit'])) {
                        $id = $_GET['edit'];
                        $post_ctg_id = $_POST['post_ctg_id'];
                        $post_title= $_POST['post_title'];
                        $post_author = $_POST['post_author'];

                        

                        $p_img_name = $_FILES['post_image']['name'];
                        $p_img_temp = $_FILES['post_image']['tmp_name'];
                        $post_image_des = "upload/".$p_img_name;
                        move_uploaded_file($p_img_temp,$post_image_des);

                        $post_content = $_POST['post_content'];
                        $post_tags = $_POST['post_tags'];
                        $post_status = $_POST['post_status'];
                        $date = date("Y-m-d h:i:s-a");
                        $result = mysqli_query($dbconn,"UPDATE posts SET post_ctg_id = '$post_ctg_id', post_title= '$post_title', post_author= '$post_author',date = '$date', post_image= '$post_image_des', post_content= '$post_content', post_tags= '$post_tags',  post_status= '$post_status' WHERE id ='$id'");
                        echo "<p class='bg-info'>Post has been Updated. <a target='blank' href='../post.php?p_id={$id}'>View Post</a></p>";
                    }
                 ?>
                 <form action="" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                     <div class="form-group">
                        <label class="form-control-label">Post Category</label>
                        <select name="post_ctg_id" class="form-control">
                        <?php 
                        $menuItem = $dbconn->query("SELECT * FROM categories");
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
                         <input required="on" type="text" class="form-control" name="post_title" value="<?php echo $row['post_title'] ?>">
                     </div>
                     <div class="form-group">
                        <label class="form-control-label">Post Author</label>
                         <input required="on" type="text" class="form-control" name="post_author" value="<?php echo $row['post_author'] ?>">
                     </div>
                     <div class="form-group">
                        <label class="form-control-label">Post Images</label><br>
                        <img src="<?php echo $row['post_image'] ?>" alt="No Images Here" width="150px" > <br>
                         <input type="file" class="form-control" name="post_image" >
                     </div>
                     <div class="form-group">
                        <label class="form-control-label">Post Content</label>
                         <textarea required="on" name="post_content" class="form-control" rows="10" ><?php echo $row['post_content'] ?></textarea>
                     </div>
                     <div class="form-group">
                        <label class="form-control-label">Post Tags</label>
                         <input required="on" type="text" class="form-control" name="post_tags" value="<?php echo $row['post_tags'] ?>">
                     </div>
                     <div class="form-group">
                        <label class="form-control-label">Post Status</label>
                         <select required="on" name="post_status" class="form-control">
                             <option value="Publised">Publised</option>
                             <option value="Draft">Draft</option>
                             <option value="Colse">Colse</option>
                         </select>
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

<?php include_once "include/footer.php" ?>