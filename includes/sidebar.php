<?php include_once 'dbconn.php' ?>
<div class="col-md-4">
    <!-- Blog Search Well -->
    <div class="well">
        <h4>Blog Search</h4>
        <form action="postsearch.php" method="post" accept-charset="utf-8">
	        <div class="input-group">
	            <input name="searchText" type="text" class="form-control" placeholder="Search By Title ">
	            <span class="input-group-btn">
	                <button name="searchButton" class="btn btn-default" type="submit">
	                    <span class="glyphicon glyphicon-search"></span>
	                </button>
	            </span>
	        </div>
        </form>
        <!-- /.input-group -->
    </div>
    <!-- Blog Categories Well -->
<!--     <div class="well">
        <h4>Blog Categories</h4>
        <div class="row">
            <div class="col-lg-12 ">
            <?php 
                $sql = "SELECT * FROM categories";
                $result = mysqli_query($dbconn,$sql);
                while ($row = mysqli_fetch_assoc($result)):
             ?>
                <ul class="list-unstyled">
                    <li><a href="postCat.php?p_cat_id=<?php echo $row['ctg_title'] ?>"><?php echo $row['ctg_title']; ?></a>
                    </li>
                </ul>
            <?php endwhile ?>
            </div>
        </div>
    </div> -->
    <!-- Side Widget Well -->
    <!-- Login -->
<?php if (isset($_SESSION['username'])) {

}else {
?>
    <div class="well">
        <h4>Login</h4>
        <div class="row">
            <div class="col-lg-12 ">
                <form action="includes/login.php" method="POST" accept-charset="utf-8">
                    <div class="form-group">
                        <input type="text" name="username" class="form-control" placeholder="username">
                    </div>
                    <div class="input-group">
                        <input name="password" type="password" class="form-control" placeholder="password">
                        <span class="input-group-btn">
                            <button name="lgoin" class="btn btn-primary" type="submit">
                                Login
                            </button>
                        </span>
                    </div>
                </form>
                <a href="registration.php" target="_blank" class="text-right">SignUp</a>
            </div>
        </div>
        <!-- /.row -->
    </div>
<?php

}  
?>

    
    <div class="well">
        <div id="revenue_pro-social-3" class="widget widget-revenue_pro-social widget_social_icons">
            <h2 class="widget-title">Follow Us</h2>
            <div class="desc">Stay updated via social channels</div>
            <div class="social-icons">
                <ul>
                <li><a href="http://www.facebook.com/tarikmanoar"><i class="fa fa-facebook"></i></a></li>
                <li><a href="http://www.twitter.com/tarikmanoar"><i class="fa fa-twitter"></i></a></li>
                <li><a href="http://www.twitter.com/tarikmanoar"><i class="fa fa-youtube"></i></a></li>
                <li><a href="http://www.twitter.com/tarikmanoar"><i class="fa fa-linkedin"></i></a></li>
                <li><a href="http://www.twitter.com/tarikmanoar"><i class="fa fa-instagram"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Login -->
    <div class="well">
        <h4>MOST VIEWED POSTS</h4>
        <?php 

            $postItem = mysqli_query($dbconn,"SELECT * FROM posts ORDER BY post_views_count DESC LIMIT 0,5");
                while ($postRow = mysqli_fetch_assoc($postItem)):

        ?>
            <div class="most-post">
                <ul>
                    <li class="clear">
                        <a href="">
                            <div class="thumbnail-wrap">
                                <img class="img-responsive" src="admin/<?php echo $postRow['post_image']; ?>" alt='POST IMAGE ERROR'>
                            </div>
                        </a>
                        <div class="entry-wrap">
                            <a href=""><h4><?php echo $postRow['post_title']; ?></h4></a>
                            <div class="entry-date">Post on <?php echo $postRow['date']; ?></div>
                        </div>
                    </li>
                </ul>
            </div>
        <?php endwhile ?>
    </div>
</div>