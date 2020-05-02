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

                $perPage = 5;
                if (isset($_GET['page'])) {
                    $page = $_GET['page'];

                }else {
                    $page = "";
                }
                if ($page == "" || $page == 1) {
                    $page_1 = 0;
                }else{
                    $page_1 = ($page * $perPage) - $perPage;
                }

                $post_query_count = mysqli_query($dbconn,"SELECT * FROM posts");
                $count = mysqli_num_rows($post_query_count);

                $count = ceil($count / $perPage);

                $postItem = mysqli_query($dbconn,"SELECT * FROM posts WHERE post_status ='Published' ORDER BY id DESC LIMIT $page_1,$perPage");
                while ($postRow = mysqli_fetch_assoc($postItem)) {
                    ?>
                    <!-- First Blog Post -->
                        <h2 style="font-family: comic sans ms,'bensen';"><a href="post.php?p_id=<?php echo $postRow['id'] ?>"><?php echo $postRow['post_title']; ?></a></h2>
                        <p class="lead">
                            by 
                            <a href="author_post.php?author=<?php echo $postRow['post_author']; ?>&p_id=<?php echo $postRow['id'] ?>"><?php echo $postRow['post_author']; ?>
                            </a>
                        </p>
                        <p>
                            <span class="glyphicon glyphicon-time"></span> Posted on <?php echo $postRow['date']; ?>&nbsp;&nbsp;&nbsp;
                            <span class="glyphicon glyphicon-eye-open"> </span>&nbsp;&nbsp;<?php echo $postRow['post_views_count']; ?> Views &nbsp;&nbsp;&nbsp;
                            <span class="glyphicon glyphicon-comment"></span>&nbsp;&nbsp;<?php echo $postRow['post_comment_count']; ?> &nbsp; Comments
                        </p>
                        <hr>
                        <a href="post.php?p_id=<?php echo $postRow['id'] ?>">
                        <img style="max-height: 345px;width:100%;" class="img-responsive" src="admin/<?php echo $postRow['post_image']; ?>" alt='POST IMAGE ERROR'></a>
                        
                        <hr>
                        <p><?php echo stringLimit($postRow['post_content'],250) ?></p>
                        <a class="btn btn-primary" href="post.php?p_id=<?php echo $postRow['id'] ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
                        <hr>
                    <?php
                }

            ?>


            <!-- Pager -->
            <ul class="pager">
                <?php if ($page == null) {
                        $page = 1;
                } ?>
                <?php 

                if ($page < 2 ) {
                     
                 }else {
                     ?>
                <li class="previous">
                    <a href="index.php?page=<?php echo $page -1; ?>">&larr; Older</a>
                </li>
                     <?php
                 } ?>
                
                <?php 
                    for ($i = 1; $i <= $count ; $i++) {
                        if ($i == $page) {
                            echo "<li ><a class='active' href='index.php?page={$i}'>$i</a></li>";
                        }else {
                            echo "<li ><a href='index.php?page={$i}'>$i</a></li>";
                        }
                    }
                 ?>
                <li class="next">
                    <a href="index.php?page=<?php echo $page + 1 ; ?>">Newer &rarr;</a>
                </li>
            </ul>
        </div>
<!-- Blog Sidebar Widgets Column -->
<?php include_once 'includes/sidebar.php' ?>
</div>
<?php include_once 'includes/footer.php' ?>