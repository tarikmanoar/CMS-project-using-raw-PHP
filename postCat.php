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
                if (isset($_GET['p_cat_id'])) {
                     $p_cat_id = $_GET['p_cat_id'];
                 } 
                $postItem = $dbconn->query("SELECT * FROM posts WHERE post_ctg_id = '$p_cat_id' AND post_status ='Published' ORDER BY id DESC" );

                while ($postRow = mysqli_fetch_assoc($postItem)) {
                    $post_status = $postRow['post_status'];
                    if ($post_status !== 'Published') {
                        echo 'string';
                    }else { 
                    ?>
                    <!-- First Blog Post -->
                        <h2><a href="post.php?p_id=<?php echo $postRow['id'] ?>"><?php echo $postRow['post_title']; ?></a></h2>
                        <p class="lead">by <a href="index.php"><?php echo $postRow['post_author']; ?></a></p>
                        <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $postRow['date']; ?></p>
                        <hr>
                        <a href="post.php?p_id=<?php echo $postRow['id'] ?>">
                        <img style="max-height: 345px;width:100%;" class="img-responsive" src="admin/<?php echo $postRow['post_image']; ?>" alt='POST IMAGE ERROR'></a>
                        
                        <hr>
                        <p><?php echo $postRow['post_content']; ?></p>
                        <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
                        <hr>
                    <?php 
                    } 
                }
                if (mysqli_num_rows($postItem ) <= 1) {
                    
                }else {?>
                     <ul class="pager">
                        <li class="previous">
                            <a href="#">&larr; Older</a>
                        </li>
                        <li class="next">
                            <a href="#">Newer &rarr;</a>
                        </li>
                    </ul>
                <?php } ?>
                
                    <!-- Pager -->
                    
        </div>
<!-- Blog Sidebar Widgets Column -->
<?php include_once 'includes/sidebar.php' ?>
</div>
<?php include_once 'includes/footer.php' ?>