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
                <table class="table table-inverse table-bordered table-dark table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th class="text-center">Title</th>
                            <th class="text-center">Category</th>
                            <th class="text-center">Images</th>
                            <th>Author</th>
                            <th>Date</th>
                            <th>Post Tag</th>
                            <th>Post Comment</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $result = mysqli_query($dbconn,"SELECT * FROM posts");
                            $counter = 1;
                            while ($row = mysqli_fetch_assoc($result)){
                                $post_id = $row['post_ctg_id'];
                                ?>
                                <tr>
                                    <td><?php echo $counter++; ?></td>
                                    <td><?php echo $row['post_title'] ?></td>
                                    <td><?php echo $row['post_ctg_id'] ?></td>
                                    <td><img width="150px"src="<?php echo $row['post_image'] ?>" alt=""></td>
                                    <td><?php echo $row['post_author'] ?></td>
                                    <td><?php echo $row['date'] ?></td>
                                    <td><?php echo $row['post_tags'] ?></td>
                                    <td><?php echo $row['post_comment_count'] ?></td>
                                    <td><?php echo $row['post_status'] ?></td>
                                    <td style="width: 140px;"><a href="editpost.php?edit=<?php echo $row['id'] ?>"><p class="btn btn-success">Edit</p></a><a href="?delete=<?php echo $row['id'] ?>"><p style="margin-left:5px;" class="btn btn-danger">Delete</p></a></td>
                                </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
    <!-- /.container-fluid -->

<?php include_once "include/footer.php" ?>