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
<?php 
    // Bulk Oparation
    if (isset($_POST['checkBoxArray'])) {
        foreach ($_POST['checkBoxArray'] as $checkBoxValue) {
            $bulkOption = $_POST['bulkOption'];
            switch ($bulkOption) {
                case 'APPROVED':
                    $bulkPublish = mysqli_query($dbconn,"UPDATE comments SET comment_status = '$bulkOption' WHERE comment_id='$checkBoxValue'");
                    break;
                case 'UNAPPROVED':
                    $bulkPublish = mysqli_query($dbconn,"UPDATE comments SET comment_status = '$bulkOption' WHERE comment_id='$checkBoxValue'");
                    break;
                case 'Delete':
                    $bulkPublish = mysqli_query($dbconn,"DELETE FROM comments WHERE comment_id='$checkBoxValue'");
                    break;
                
                default:
                    echo "<h1 class='alert alert-danger text-center'>Select One Oparation</h1>";
                    break;
            }
            
        }
    }

 ?>
                <form action="" method="POST" accept-charset="utf-8">
                    <div id="bulkOptionContainer" class="col-xs-4" style="padding-left: 0px;margin-bottom: 15px;">
                        <select name="bulkOption" id="" class="form-control">
                            <option value="">Select Option</option>
                            <option value="APPROVED">Approve</option>
                            <option value="UNAPPROVED">Unapprove</option>
                            <option value="Delete">Delete</option>
                        </select>
                    </div>
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-success" name="submit"><span class="glyphicon glyphicon-ok" area-hidden="true"></span></button>
                        <a href="addpost.php" class="btn btn-primary"><span class="glyphicon glyphicon-plus" area-hidden="true"></span></a>
                    </div>
                <table class="table table-inverse table-bordered table-dark table-hover">
                    <thead>
                        <tr>
                            <th><input type="checkbox" name="" id="selectAllBoxes" class="form-check-input"></th>
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
                                    <td><input type="checkbox" name="checkBoxArray[]" value="<?php echo $row['comment_id'] ; ?>" class="checkbox form-check-input" ></td>
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
                                    	<a href="Comment.php?delete=<?php echo $row['comment_id'] ?>"><p class="btn btn-danger" title="Delete Comment" onclick="javascript: return confirm('Are sure to delete this?')"><span class=" glyphicon glyphicon-remove"></span></p></a>
                                    </td>
                                </tr>
                        <?php } ?>
                    </tbody>
                </table> 
                </form>
            </div>
        </div>
    </div>

</div>