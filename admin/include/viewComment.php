<?php 
    //Delete Data From Data Base....
    if (isset($_GET['delete'])) {
        $id = $_GET['delete'];
        $result = mysqli_query($dbconn,"DELETE FROM comments WHERE comment_id='$id'");
        if ($result) {
            header("Location: comment.php");
        }
    }
    //Approved Data From Data Base....
    if (isset($_GET['approved'])) {
        $id = $_GET['approved'];
        $result = mysqli_query($dbconn,"UPDATE comments SET comment_status = 'APPROVED' WHERE comment_id='$id'");
        if ($result) {
            header("Location: comment.php");
        }
    }
    //Unapproved Data From Data Base....
    if (isset($_GET['unapproved'])) {
        $id = $_GET['unapproved'];
        $result = mysqli_query($dbconn,"UPDATE comments SET comment_status = 'UNAPPROVED'  WHERE comment_id='$id'");
        if ($result) {
            header("Location: comment.php");
        }
    }


 ?>

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
            <div class="col-lg-12">
                <table class="table table-inverse table-bordered table-dark table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Post ID</th>
                            <th>Comment Author</th>
                            <th class="text-center">Date</th>
                            <th>Comment Content</th>
                            <th>Email</th>
                            <th>Post Title</th>
                            <th>Status</th>
                            <th>Approval</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $result = mysqli_query($dbconn,"SELECT * FROM comments ORDER BY comment_id DESC");
                            $counter = 1;
                            while ($row = mysqli_fetch_assoc($result)){
                                $comment_post_id = $row['comment_post_id'];
                                ?>
                                <tr>
                                    <td><?php echo $counter++; ?></td>
                                    <td><?php echo $row['comment_post_id'] ?></td>
                                    <td><?php echo $row['comment_author'] ?></td>
                                    <td><?php echo $row['comment_date'] ?></td>
                                    <td><?php echo $row['comment_content'] ?></td>
                                    <td><?php echo $row['comment_email'] ?></td>

                                    <?php 
                                    $post_title = mysqli_query($dbconn,"SELECT * FROM posts WHERE id='$comment_post_id'") ;
                                    while ($p_title = mysqli_fetch_assoc($post_title)) {
                                        $id = $p_title['id'];
                                        echo "<td><a href='../post.php?p_id=$id'>{$p_title['post_title']}</a></td>";
                                    }
                                    ?>


                                    <td><?php echo $row['comment_status'] ?></td>
                                    <td>
                                        <a href="?approved=<?php echo $row['comment_id'] ?>"><p title="Approve This Comment" class="btn btn-primary"><span class="glyphicon glyphicon-eye-open" area-hidden="true"></span></p></a>
                                        <a href="?unapproved=<?php echo $row['comment_id'] ?>"><p title="Unapprove This Comment" class="btn btn-info"><span class="glyphicon glyphicon-eye-close" area-hidden="true"></span></p></a>
                                    </td>
                                    <td>
                                    	<a href="Comment.php?var=editComment&edit=<?php echo $row['comment_id'] ?>"><p class="btn btn-success" title="Edit this comment"><span class=" glyphicon glyphicon-edit"></span></p></a>
                                    	<a href="Comment.php?delete=<?php echo $row['comment_id'] ?>"><p class="btn btn-danger" title="Delete Comment"><span class=" glyphicon glyphicon-remove"></span></p></a>
                                    </td>
                                </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>