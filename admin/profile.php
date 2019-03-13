<?php include_once "include/header.php" ?>
<?php include_once "include/nav.php" ?>


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
                            if (isset($_SESSION['user_id'])) {
                                $id = $_SESSION['user_id'];
                            }
                            $result = mysqli_query($dbconn,"SELECT * FROM users WHERE user_id = '$id' ORDER BY user_id DESC");
                            $counter = 1;
                            while ($row = mysqli_fetch_assoc($result)){
                                ?>
                <table class="table table-bordered table-dark table-hover profile_tbl">
                    <thead>
                        <tr>
                            <th colspan="3"><div class="display-5 text-center">STUDENT DETAILS</div></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th rowspan="9" style="vertical-align: middle;text-align: center;"> <img src="<?php echo $row['user_images'] ?>" alt="ERROR" style="width: 250px;" class="img-fluid "></th>
                        </tr>
                        <tr>
                            <td>USERNAME:</td>
                            <td><?php echo $row['username'] ?></td>
                        </tr>
                        <tr>
                            <td>FULL NAME:</td>
                            <td><?php echo $row['user_firstname']. " ". $row['user_lastname'] ?></td>
                        </tr>
                        <tr>
                            <td>YOUR PASSWORD:</td>
                            <td><?php echo $row['user_password']?></td>
                        </tr>
                        <tr>
                            <td>YOUR EMAIL:</td>
                            <td><?php echo $row['user_email'] ?></td>
                        </tr>
                        <tr>
                            <td>YOUR ROLE</td>
                            <td><?php echo $row['user_role'] ?></td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <a style="display: block;text-align: center;" href="users.php?var=edit_users&edit=<?php echo $row['user_id'] ?>"><p class="btn btn-success">Edit</p></a>
                            </td>
                        </tr>
                    </tbody>
                </table><?php } ?>
            </div>
        </div>
    </div>

</div>
    <!-- /.container-fluid -->

<?php include_once "include/footer.php" ?>