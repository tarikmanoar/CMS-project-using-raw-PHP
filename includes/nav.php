<?php include_once 'dbconn.php' ?>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">Start Bootstrap</a>
        </div>

            <!-- Top Menu Items -->
            <?php if ($_SESSION['username']) {
               ?>
            <ul class="nav navbar-right top-nav">
                 <li><a href="admin" target="blank" class="navbar-right">Admin</a></li>
            </ul> <?php
            }else {
                
                
            } ?>
            
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <?php 
                    $menuItem = $dbconn->query("SELECT * FROM categories");
                    while ($ctgRow = $menuItem->fetch_assoc()) {
                        ?>
                        <li>
                            <a href="postCat.php?p_cat_id=<?php echo $ctgRow['ctg_title'] ?>"><?php echo $ctgRow['ctg_title']; ?></a>
                        </li>
                        <?php
                    }

                 ?>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>
