<?php include_once "include/header.php" ?>
<?php include_once "include/nav.php" ?>
<?php include_once "include/deleteModal.php" ?>


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
                </div>
<?php 


//insert data into data base
    if (isset($_POST['save'])) {
        $ctg_title = $_POST['ctg_title'];
        if ($ctg_title == "" || empty($ctg_title)) {
            echo "Enter The Valide Name!.....";
        }else {
            $sql = "INSERT INTO categories(ctg_title) VALUES('$ctg_title')";
            $result = mysqli_query($dbconn,$sql);
        }
    }

//delete data from database
    if (isset($_GET['delete'])) {
        $id = $_GET['delete'];
        $sql = "DELETE FROM categories WHERE id='$id'";
        $result = mysqli_query($dbconn,$sql);
        if ($result) {
            header("Location: categories.php");
        }
    }
 ?>
                <!-- /.row -->
                <div class="row">
                    <!-- Insert Data In Database -->
                    <div class="col-lg-6 justify-content-center">
                        <form action="" method="post" accept-charset="utf-8">
                            <div class="form-group">
                                <input type="text" name="ctg_title" class="form-control" placeholder="Categories title " autocomplete="off">
                            </div>
                            <div class="form-group">
                                <input type="submit" name="save" class=" btn btn-primary" value="Add Category">
                            </div>
                        </form>

                <!-- Update Data From Data Base -->
                        <form action="" method="post" accept-charset="utf-8">
                            <?php 
                                if (isset($_GET['edit'])){
                                    $id = $_GET['edit'];
                                    $result = mysqli_query($dbconn,"SELECT * FROM categories WHERE id='$id'");
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        ?>
                                        
                                        <div class="form-group">
                                            <label for="ctg_title">Update Category Title</label>
                                            <input type="text" name="ctg_title" class="form-control" value="<?php echo $row['ctg_title'] ?>" autocomplete="off">
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" name="update" class=" btn btn-primary" value="Update Category">
                                        </div>
                                        <?php
                                    }
                                }
                                if (isset($_POST['update'])) {
                                     $ctg_title = $_POST['ctg_title'];
                                     $result = mysqli_query($dbconn,"UPDATE categories SET ctg_title='$ctg_title' WHERE id='$id'");
                                     if ($result) {
                                         header("Location: categories.php");
                                     }
                                 } 

                            ?>
                        </form>
                    </div>


                    <div class="col-lg-6">
                        <table class="table table-hover table-dark table-bordered text-center">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Category Title</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                        <?php 
                            $sql = "SELECT * FROM categories";
                            $result = mysqli_query($dbconn,$sql);
                            while ($row = mysqli_fetch_assoc($result)):
                         ?>
                            <tbody>
                                <tr>
                                    <td><?php echo $row['id']; ?></td>
                                    <td><?php echo $row['ctg_title']; ?></td>
                                    <td>
                                        <a href="?edit=<?php echo $row['id']?>" class="text-primary">
                                            <span class=" btn btn-primary glyphicon glyphicon-edit" area-hidden="true"></span>
                                        </a>

                                        <a href="javascript:void(0)" rel="<?php echo $row['id'] ?>" class="delete_link"><p  class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></p></a>

                                        <!-- <a href="?delete=<?php //echo $row['id'] ?>" class="text-danger bg-dark" onclick="javascript: return confirm('Are sure to delete this?')"><span class="btn btn-danger glyphicon glyphicon-remove" area-hidden="true"></span></a> -->
                                    </td>
                                </tr>
                            </tbody>
                        <?php endwhile ?>
                        </table>
                    </div>
                </div>

            </div>
            <!-- /.container-fluid -->
            <script>
    
$(document).ready(function(){
    $(".delete_link").on('click',function(){
        var id = $(this).attr("rel");
        var deleteUrl = "?delete="+id+"";
        $(".modalDeleteLink").attr("href", deleteUrl );
        $("#myModal").modal('show');
    });
}); 

</script>

<?php include_once "include/footer.php" ?>