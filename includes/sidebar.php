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
<?php if ($_SESSION['username']) {

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
            </div>
        </div>
        <!-- /.row -->
    </div>
<?php
} ?>

    <!-- Login -->
    <div class="well">
        <h4>Side Widget Well</h4>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
    </div>
</div>