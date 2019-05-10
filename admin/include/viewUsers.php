<?php 
    //Delete Data From Data Base....
    if (isset($_GET['delete'])) {
        if (isset($_SESSION['user_role'])) {
            if ($_SESSION['user_role'] == 'Admin') {
                $id = mysqli_real_escape_string($dbconn,$_GET['delete']);
                $result = mysqli_query($dbconn,"DELETE FROM users WHERE user_id='$id'");
                if ($result) {
                    header("Location: users.php");
                }
            }
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
                <?php 
                    // Bulk Oparation
                    if (isset($_POST['checkBoxArray'])) {
                        foreach ($_POST['checkBoxArray'] as $checkBoxValue) {
                             $bulkOption = $_POST['bulkOption'];
                            switch ($bulkOption) {
                                case 'Admin':
                                    $bulkPublish = mysqli_query($dbconn,"UPDATE users SET user_role = 'Admin'  WHERE user_id='$checkBoxValue'");
                                    break;
                                case 'Subscriber':
                                    $bulkPublish = mysqli_query($dbconn,"UPDATE users SET user_role = 'Subscriber'  WHERE user_id='$checkBoxValue'");
                                    break;
                                case 'Delete':
                                    $bulkPublish = mysqli_query($dbconn,"DELETE FROM users WHERE user_id='$checkBoxValue'");
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
                            <option value="Admin">Admin</option>
                            <option value="Subscriber">Subscriber</option>
                            <option value="Delete">Delete</option>
                        </select>
                    </div>

                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-success" name="submit"><span class="glyphicon glyphicon-ok" area-hidden="true"></span></button>
                        <a href="users.php?var=add_users" class="btn btn-primary"><span class="glyphicon glyphicon-plus" area-hidden="true"></span></a>
                    </div>
                <table class="table table-inverse table-bordered table-dark table-hover">
                    <thead>
                        <tr>
                            <th><input type="checkbox" name="" id="selectAllBoxes" class="form-check-input"></th>
                            <th>No</th>
                            <th>ID</th>
                            <th>Username</th>
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
                                    <td><input type="checkbox" name="checkBoxArray[]" value="<?php echo $row['user_id'] ; ?>" class="checkbox" ></td>
                                    <td><?php echo $counter++; ?></td>
                                    <td><?php echo $row['user_id'] ?></td>
                                    <td><?php echo $row['username'] ?></td>
                                    <td><img width="150px"src="<?php echo $row['user_images'] ?>" alt="No Images "></td>
                                    <td><?php echo $row['user_email'] ?></td>
                                    <td><?php echo $row['user_role'] ?></td>
                                    <td><?php echo $row['user_firstname'] ?></td>
                                    <td><?php echo $row['user_lastname'] ?></td>
                                    <td>
                                        <a href="?admin=<?php echo $row['user_id'] ?>"><p class="btn btn-primary" title="Apoint as Admin">Admin</p></a>
                                        <a href="?subs=<?php echo $row['user_id'] ?>"><p class="btn btn-info" title="Apoint as Subscriber">Subscriber</p></a>
                                    </td>
                                    <td>
                                    	<a href="users.php?var=edit_users&edit=<?php echo $row['user_id'] ?>"><p class="btn btn-success" title="Edit User Profile"><span class="glyphicon glyphicon-edit" area-hidden="true"></span></p></a>

                                        <a href="javascript:void(0)" rel="<?php echo $row['user_id'] ?>" class="delete_link"><p  class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></p></a>


                                    	<!-- <a href="users.php?delete=<?php //echo $row['user_id'] ?>"><p class="btn btn-danger" title="Delete User Profile" onclick="javascript: return confirm('Are sure to delete this?')"><span class=" glyphicon glyphicon-remove" area-hidden="true"></span></p></a> -->
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
<script>
    
$(document).ready(function(){
    $(".delete_link").on('click',function(){
        var id = $(this).attr("rel");
        var deleteUrl = "users.php?delete="+id+"";
        $(".modalDeleteLink").attr("href", deleteUrl );
        $("#myModal").modal('show');
    });
}); 

</script>