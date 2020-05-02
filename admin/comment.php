<?php include_once "include/header.php" ?>
<?php include_once "include/nav.php" ?>



                <?php 

                    if (isset($_GET['var'])) {
                        $var=$_GET['var'];
                        
                    }else {
                        $var = '';
                    }
                    switch ($var) {
                            case 'addComment':
                                include ("include/addComment.php");
                                break;
                            case 'editComment':
                                include("include/editComment.php");
                                break;
                            
                            default:
                                include("include/viewComment.php");
                                break;
                        }

                ?>

<?php include_once "include/footer.php" ?>