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
            	if (isset($_POST['searchButton'])) {
					$searchText = $_POST['searchText'];
					$sql = "SELECT * FROM posts WHERE post_title LIKE '%$searchText%'";
					$result = mysqli_query($dbconn,$sql);
					$row = mysqli_num_rows($result);
				}
				if ($row == 0) {
					?>
					<h1 class="display-1 text-center bg-danger font-weight-bold">NO ITEM FOUND</h1>
					<?php
				}else {
                while ($postRow = mysqli_fetch_assoc($result)) {
                    ?>
                    <!-- First Blog Post -->
                        <h2><a href="#"><?php echo $postRow['post_title']; ?></a></h2>
                        <p class="lead">by <a href="index.php"><?php echo $postRow['post_author']; ?></a></p>
                        <p>
                            <span class="glyphicon glyphicon-time"></span> Posted on <?php echo $postRow['date']; ?>&nbsp;&nbsp;&nbsp;
                            <span class="glyphicon glyphicon-eye-open"> </span>&nbsp;&nbsp;<?php echo $postRow['post_views_count']; ?> Views &nbsp;&nbsp;&nbsp;
                            <span class="glyphicon glyphicon-comment"></span>&nbsp;&nbsp;<?php echo $postRow['post_comment_count']; ?> &nbsp; Comments
                        </p>
                        <hr>
                        <img class="img-responsive" src="admin/<?php echo $postRow['post_image']; ?>" alt='POST IMAGE ERROR'>
                        
                        <hr>
                        <p><?php echo $postRow['post_content']; ?></p>
                        <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
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
            </ul><?php } ?>
        </div>
        
<!-- Blog Sidebar Widgets Column -->
<?php include_once 'includes/sidebar.php' ?>
</div>
<?php include_once 'includes/footer.php' ?>
