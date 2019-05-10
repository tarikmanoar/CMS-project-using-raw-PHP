<?php include_once 'includes/dbconn.php' ?>
<?php include_once 'includes/header.php' ?>
<!-- Navigation -->
<?php include_once 'includes/nav.php' ?>
<!-- Page Content -->
<div class="container">
    <div class="row">
        <!-- Blog Entries Column -->
        <div class="col-md-8">

            <?php
                if (isset($_GET['p_id'])) {
                    $p_id =$_GET['p_id'];
                
                $viewQuery = mysqli_query($dbconn , "UPDATE posts SET post_views_count = post_views_count + 1 WHERE id='$p_id' ");

                $postItem = $dbconn->query("SELECT * FROM posts WHERE id='$p_id'");
                while ($postRow = mysqli_fetch_assoc($postItem)) {
                    ?>
                    <!--Blog Post  -->
                        <h2><?php echo $postRow['post_title']; ?></h2>
                        <p class="lead">by <a href="index.php"><?php echo $postRow['post_author']; ?></a></p>
                        <p>
                            <span class="glyphicon glyphicon-time"></span> Posted on <?php echo $postRow['date']; ?>&nbsp;&nbsp;&nbsp;
                            <span class="glyphicon glyphicon-eye-open"> </span>&nbsp;&nbsp;<?php echo $postRow['post_views_count']; ?> Views &nbsp;&nbsp;&nbsp;
                            <span class="glyphicon glyphicon-comment"></span>&nbsp;&nbsp;<?php echo $postRow['post_comment_count']; ?> &nbsp; Comments
                        </p>
                        <hr>
                        <img style="max-height: 345px;width:100%;" class="img-responsive" src="admin/<?php echo $postRow['post_image']; ?>" alt='POST IMAGE ERROR'>
                        
                        <hr>
                        <p><?php echo $postRow['post_content']; ?></p>
                        <hr>
                    <?php
                    }
                }else{
                    header("Location: index.php");
                }
            ?>
        </div>
<!-- Blog Sidebar Widgets Column -->
<?php include_once 'includes/sidebar.php' ?>

</div>
<div class="row">
    <div class="col-lg-8">
        <!-- Comments Form -->
                <?php 

                    if (isset($_POST['submit_comment'])) {
                        $comment_post_id =$_GET['p_id'];
                        $commemt_author  =$_POST['commemt_author'];
                        $commemt_email =$_POST['commemt_email'];
                        $comment_content = $_POST['comment_content'];
                        date_default_timezone_set("Asia/Dhaka"); 
                        $comment_date = date("Y-m-d h-i-s A"); 

                        $result = mysqli_query($dbconn,"INSERT INTO comments(comment_post_id,comment_author, comment_date,comment_content,comment_email,comment_status) VALUES('$comment_post_id','$commemt_author','$comment_date ','$comment_content','$commemt_email','UNAPPROVED')");
                        if (!$result) {
                        die("QUERY FAILED" . mysqli_error($dbconn));
                        }
                        $post_comment_count = mysqli_query($dbconn,"UPDATE posts SET post_comment_count = post_comment_count +1 WHERE id = $comment_post_id ");
                    }


                 ?>
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form role="form" method="post" action="" >
                        <div class="form-group">
                            <input type="text" name="commemt_author" class="form-control" placeholder="Your Name" autocomplete="off" required >
                        </div>
                        <div class="form-group">
                            <input type="email" name="commemt_email" class="form-control" placeholder="example@mail.com" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" rows="3" name="comment_content"></textarea>
                        </div>
                        <button type="submit" name="submit_comment" class="btn btn-primary">Submit</button>
                    </form>
                </div>
                <hr>
                <!-- Posted Comments -->
                <!-- Comment -->
                <?php 
                    $p_id =$_GET['p_id'];
                    $comment_view = mysqli_query($dbconn,"SELECT * FROM comments WHERE comment_post_id = '$p_id' AND comment_status = 'APPROVED' ORDER BY comment_id DESC");
                    if (!$comment_view) {
                        die("QUERY FAILED" . mysqli_error($dbconn));
                    }
                    while ($cmt_row = mysqli_fetch_assoc($comment_view)):

                 ?>
                    <div class="media">
                        <a class="pull-left" href="#">
                            <img class="media-object" src="http://placehold.it/64x64" alt="">
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading"><?php echo  $cmt_row['comment_author'] ?>
                            <small><?php echo  $cmt_row['comment_date'] ?></small>
                            </h4> 
                            <p><?php echo  $cmt_row['comment_content'] ?></p>
                        </div>
                    </div>
                <?php endwhile ?>
    </div>
</div>
<?php include_once 'includes/footer.php' ?>