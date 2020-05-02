<?php include_once "include/header.php" ?>
<?php include_once "include/nav.php" ?>
<?php include_once "include/deleteModal.php" ?>
                <?php 

                    if (isset($_GET['var'])) {
                        $var=$_GET['var'];
                        
                    }else {
                        $var = '';
                    }
                    switch ($var) {
                            case 'add_users':
                                include ("include/addUsers.php");
                                break;
                            case 'edit_users':
                                include("include/editUsers.php");
                                break;
                            
                            default:
                                include("include/viewUsers.php");
                                break;
                        }

                ?>

<?php include_once "include/footer.php" ?>