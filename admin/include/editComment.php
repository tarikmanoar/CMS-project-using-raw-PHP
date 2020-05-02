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
                <h3 class="page-header">Update comment Item</h3>
                <?php 
                    if (isset($_GET['edit'])) {
                        $id = $_GET['edit'];
                        $result = mysqli_query($dbconn,"SELECT * FROM comments WHERE comment_id='$id'");
                        $row = mysqli_fetch_assoc($result);
                    }
                    if (isset($_POST['submit'])) {
                        $id = $_GET['edit'];
                        $comment_post_id= $_POST['comment_post_id'];
                        $comment_author = $_POST['comment_author'];

                        $comment_content = $_POST['comment_content'];
                        $comment_email = $_POST['comment_email'];
                        $comment_status = $_POST['comment_status'];
                        date_default_timezone_set("Asia/Dhaka"); 
                        $comment_time = date("Y-m-d h-i-s A"); 
                        $result = mysqli_query($dbconn,"UPDATE comments SET  comment_post_id = '$comment_post_id', comment_author = '$comment_author',comment_date = '$comment_time', comment_content = '$comment_content', comment_email = '$comment_email',  comment_status = '$comment_status' WHERE comment_id ='$id'");

                        if ($result) {
                        	header("Location: comment.php");
                        }else {
                        	die("SQL ERROR".mysqli_error($dbconn));
                        }
                    }
                 ?>
                 <form action="" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
                     <div class="form-group">
                        <label class="form-control-label">Comment ID</label>
                         <input required="on" type="number" class="form-control" name="comment_post_id" value="<?php echo $row['comment_post_id'] ?>">
                     </div>
                     <div class="form-group">
                        <label class="form-control-label">Comment Author</label>
                         <input required="on" type="text" class="form-control" name="comment_author" value="<?php echo $row['comment_author'] ?>">
                     </div>
                     <div class="form-group">
                        <label class="form-control-label">Comment Content</label>
                         <textarea required="on" name="comment_content" class="form-control" rows="10" ><?php echo $row['comment_content'] ?></textarea>
                     </div>
                     <div class="form-group">
                        <label class="form-control-label">Comment Mail</label>
                         <input required="on" type="text" class="form-control" name="comment_email" value="<?php echo $row['comment_email'] ?>">
                     </div>
                     <div class="form-group">
                        <label class="form-control-label">Comment Status</label>
                         <select required="on" name="comment_status" class="form-control">
                             <option value="APPROVED">APPROVED</option>
                             <option value="UNAPPROVED">UNAPPROVED</option>
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