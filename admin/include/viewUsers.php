<?php 
    //Delete Data From Data Base....
    if (isset($_GET['delete'])) {
        $id = $_GET['delete'];
        $result = mysqli_query($dbconn,"DELETE FROM users WHERE user_id='$id'");
        if ($result) {
            header("Location: users.php");
        }
    }
    //Approved Data From Data Base....
    if (isset($_GET['admin'])) {
        $id = $_GET['admin'];
        $result = mysqli_query($dbconn,"UPDATE users SET user_role = 'Admin' WHERE user_id='$id'");
        if ($result) {
            header("Location: users.php");
        }
    }
    //Unapproved Data From Data Base....
    if (isset($_GET['subs'])) {
        $id = $_GET['subs'];
        $result = mysqli_query($dbconn,"UPDATE users SET user_role = 'Subscriber'  WHERE user_id='$id'");
        if ($result) {
            header("Location: users.php");
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
                            <th>No</th>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>Images</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Admin</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $result = mysqli_query($dbconn,"SELECT * FROM users ORDER BY user_id DESC");
                            $counter = 1;
                            while ($row = mysqli_fetch_assoc($result)){
                                ?>
                                <tr>
                                    <td><?php echo $counter++; ?></td>
                                    <td><?php echo $row['user_id'] ?></td>
                                    <td><?php echo $row['username'] ?></td>
                                    <td><?php echo trim($row['user_password']) ?></td>
                                    <td><img width="150px"src="<?php echo $row['user_images'] ?>" alt="No Images "></td>
                                    <td><?php echo $row['user_email'] ?></td>
                                    <td><?php echo $row['user_role'] ?></td>
                                    <td><?php echo $row['user_firstname'] ?></td>
                                    <td><?php echo $row['user_lastname'] ?></td>
                                    <td>
                                        <a href="?admin=<?php echo $row['user_id'] ?>"><p class="btn btn-primary">Admin</p></a>
                                        <a href="?subs=<?php echo $row['user_id'] ?>"><p class="btn btn-info">Subscriber</p></a>
                                    </td>
                                    <td>
                                    	<a href="users.php?var=edit_users&edit=<?php echo $row['user_id'] ?>"><p class="btn btn-success">Edit</p></a>
                                    	<a href="users.php?delete=<?php echo $row['user_id'] ?>"><p class="btn btn-danger">Delete</p></a>
                                    </td>
                                </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>