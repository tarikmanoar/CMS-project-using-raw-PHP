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
                    $p_author =$_GET['author'];
                }
                
                $postItem = $dbconn->query("SELECT * FROM posts WHERE  post_author='$p_author' ORDER BY id DESC");
                while ($postRow = mysqli_fetch_assoc($postItem)) {
                    ?>
                    <!--Blog Post  -->
                        <h2><?php echo $postRow['post_title']; ?></h2>
                        <p class="lead">All Post By <?php echo $postRow['post_author']; ?></p>
                        <p>
                            <span class="glyphicon glyphicon-time"></span> Posted on <?php echo $postRow['date']; ?>&nbsp;&nbsp;&nbsp;
                            <span class="glyphicon glyphicon-eye-open"> </span>&nbsp;&nbsp;<?php echo $postRow['post_views_count']; ?> Views &nbsp;&nbsp;&nbsp;
                            <span class="glyphicon glyphicon-comment"></span>&nbsp;&nbsp;<?php echo $postRow['post_comment_count']; ?> &nbsp; Comments
                        </p>
                        <hr>
                        <img style="max-height: 345px;width:100%;" class="img-responsive" src="admin/<?php echo $postRow['post_image']; ?>" alt='POST IMAGE ERROR'>
                        
                        <hr>
                        <p><?php echo $postRow['post_content']; ?></p>
                        <a class="btn btn-primary" href="post.php?p_id=<?php echo $postRow['id'] ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
                        <hr>
                    <?php
                }

            ?>



            <!-- Pager -->
            <ul class="pager">
                <li class="previous">
                    <a href="#">&larr; Older</a>
                </li>
                <li class="next">
                    <a href="#">Newer &rarr;</a>
                </li>
            </ul>
        </div>
<!-- Blog Sidebar Widgets Column -->
<?php include_once 'includes/sidebar.php' ?>

</div>
<?php include_once 'includes/footer.php' ?>