<?php include_once "include/header.php" ?>
<?php include_once "include/nav.php" ?>

<?php 
    //Delete Data From Data Base....
    if (isset($_GET['delete'])) {
        $id = $_GET['delete'];
        $result = mysqli_query($dbconn,"DELETE FROM posts WHERE id='$id'");
        if ($result) {
            header("Location: viewpost.php");
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
                case 'Published':
                    $bulkPublish = mysqli_query($dbconn,"UPDATE posts SET post_status = '$bulkOption' WHERE id='$checkBoxValue'");
                    break;
                case 'Draft':
                    $bulkPublish = mysqli_query($dbconn,"UPDATE posts SET post_status = '$bulkOption' WHERE id='$checkBoxValue'");
                    break;
                case 'Delete':
                    $bulkPublish = mysqli_query($dbconn,"DELETE FROM posts WHERE id='$checkBoxValue'");
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
                            <option value="Published">Published</option>
                            <option value="Draft">Draft</option>
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
                            <th class="text-center">Title</th>
                            <th class="text-center">Category</th>
                            <th class="text-center">Images</th>
                            <th>Author</th>
                            <th>Date</th>
                            <th>Post Tag</th>
                            <th>cmt</th>
                            <th>Status</th>
                            <th>View</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $result = mysqli_query($dbconn,"SELECT * FROM posts ORDER BY id DESC");
                            $counter = 1;
                            while ($row = mysqli_fetch_assoc($result)){
                                $post_id = $row['post_ctg_id'];
                                ?>
                                <tr>
                                    <td><input type="checkbox" name="checkBoxArray[]" value="<?php echo $row['id'] ; ?>" class="checkbox" ></td>
                                    <td><?php echo $counter++; ?></td>
                                    <td><?php echo $row['post_title'] ?></td>
                                    <td><?php echo $row['post_ctg_id'] ?></td>
                                    <td><img width="150px"src="<?php echo $row['post_image'] ?>" alt=""></td>
                                    <td><?php echo $row['post_author'] ?></td>
                                    <td><?php echo $row['date'] ?></td>
                                    <td><?php echo $row['post_tags'] ?></td>
                                    <td><?php echo $row['post_comment_count'] ?></td>
                                    <td><?php echo $row['post_status'] ?></td>
                                    <td>
                                        <a href="../post.php?p_id=<?php echo $row['id'] ?>" target="_blank"><p title="Approve This Comment" class="btn btn-primary"><span class="glyphicon glyphicon-eye-open" area-hidden="true"></span></p></a>
                                    </td>
                                    <td style="width: 140px;">
                                        <a href="editpost.php?edit=<?php echo $row['id'] ?>"><p class="btn btn-success"><span class="glyphicon glyphicon-edit" area-hidden="true"></span></p></a>
                                        <a href="?delete=<?php echo $row['id'] ?>"><p style="margin-left:5px;" class="btn btn-danger"><span class="glyphicon glyphicon-remove" area-hidden="true"></span></p></a>
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
    <!-- /.container-fluid -->

<?php include_once "include/footer.php" ?>