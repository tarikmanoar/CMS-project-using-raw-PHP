<?php include_once "include/header.php" ?>
<?php include_once "include/nav.php" ?>
<div id="page-wrapper">
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                Welcome to Cpanel
                <small><?php echo $_SESSION['username']; ?></small>
                </h1>
            </div>
        </div>
        <!-- /.row -->
        
        <!-- /.row -->
        
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-file-text fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <?php 
                                    $post_query =mysqli_query($dbconn,"SELECT * FROM posts");
                                    $pst_row = mysqli_num_rows($post_query);
                                ?>
                                <div class='huge'><?php echo $pst_row; ?></div>
                                <div>Posts</div>
                            </div>
                        </div>
                    </div>
                    <a href="viewpost.php">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-green">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-comments fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <?php 
                                    $comment_query =mysqli_query($dbconn,"SELECT * FROM comments");
                                    $cmt_row = mysqli_num_rows($comment_query);
                                ?>
                                <div class='huge'><?php echo $cmt_row; ?></div>
                                <div>Comments</div>
                            </div>
                        </div>
                    </div>
                    <a href="comment.php">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-yellow">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-user fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <?php 
                                    $user_query =mysqli_query($dbconn,"SELECT * FROM users");
                                    $user_row = mysqli_num_rows($user_query);
                                ?>
                                <div class='huge'><?php echo $user_row; ?></div>
                                <div> Users</div>
                            </div>
                        </div>
                    </div>
                    <a href="users.php">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-red">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-list fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <?php 
                                    $ctg_query =mysqli_query($dbconn,"SELECT * FROM categories");
                                    $ctg_row = mysqli_num_rows($ctg_query);
                                ?>
                                <div class='huge'><?php echo $ctg_row; ?></div>
                                <div>Categories</div>
                            </div>
                        </div>
                    </div>
                    <a href="categories.php">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <!-- /.row -->
        <?php 

        //Draft Post Query
        $post_row =mysqli_query($dbconn,"SELECT * FROM posts WHERE post_status = 'Published' ");
        $post_row = mysqli_num_rows($post_row);
        //Draft Post Query
        $draft_query =mysqli_query($dbconn,"SELECT * FROM posts WHERE post_status = 'Draft' ");
        $draft_row = mysqli_num_rows($draft_query);

        //Unapprove Comments Query
        $unapprove_query =mysqli_query($dbconn,"SELECT * FROM comments WHERE comment_status = 'UNAPPROVED' ");
        $unapprove_row = mysqli_num_rows($unapprove_query);

        //Subscriber Users Query
        $subscriber_query =mysqli_query($dbconn,"SELECT * FROM users WHERE user_role = 'Subscriber' ");
        $subscriber_row = mysqli_num_rows($subscriber_query);

         ?>
        <div class="row">
            <div class="col-lg-12">
                <script type="text/javascript">
                    google.charts.load('current', {'packages':['bar']});
                    google.charts.setOnLoadCallback(drawChart);

                    function drawChart() {
                        var data = google.visualization.arrayToDataTable([
                        ['Data', 'Count'],
                        <?php 

                            $elements_text =['Total Post','Active Post','Draft Posts','Comments','Pending Comments','Users','Subscriber','Categories'];
                            $elements_count =[$pst_row,$post_row,$draft_row,$cmt_row,$unapprove_row,$user_row,$subscriber_row,$ctg_row];
                            for ($i = 0; $i < 8 ; $i++) {
                                echo "['{$elements_text[$i]}'" . "," . "{$elements_count[$i]}],";
                            }

                         ?>
                         //['Categories', <?php echo $ctg_row; ?>]
                        ]);

                        var options = {
                            chart: {
                            title: '',
                            subtitle: '',
                            }
                        };

                        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

                        chart.draw(data, google.charts.Bar.convertOptions(options));
                    }
                </script>
                <div id="columnchart_material" style="width: auto; height: 500px;"></div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
    <?php include_once "include/footer.php" ?>