<?php include_once 'includes/dbconn.php' ?>
<?php include_once 'includes/header.php' ?>
<!-- Navigation -->
<?php include_once 'includes/nav.php' ?>
<!-- Page Content -->
<div class="container">
    <div class="row">
        <!-- Blog Entries Column -->
        <?php 

        if (isset($_POST['submit'])) {
            $to = "tarikmanoar@gmail.com";
            $subject = $_POST['contact_subject'];
            $body = $_POST['contact_content'];
        }


         ?>

            <div class="col-xs-6 col-xs-offset-3">
                <div class="form-wrap">
                <h1>Contact</h1>
                 <form action="" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
                    <div class="text-center">                        
                    </div>
<!--                      <div class="form-group">
                        <label class="form-control-label">Your Name</label>
                         <input type="text" id="contact_name" class="form-control" name="contact_name" placeholder="Your Name"  >
                     </div> -->
                     <div class="form-group">
                        <label class="form-control-label">Email</label>
                         <input type="email" id="contact_email" class="form-control" name="contact_email" placeholder="example@you.com" >
                     </div>
                     <div class="form-group">
                        <label class="form-control-label">Subject</label>
                         <input type="text" id="contact_subject" class="form-control" name="contact_subject" placeholder="Subject">
                     </div>
                     <div class="form-group">
                         <textarea name="contact_content" id="contact_content" class="form-control" style="margin: 0px; height: 239px; width: 556px;"></textarea>
                     </div>
                     <div class="form-group">
                        <input type="submit" class="btn btn-primary" name="submit" value="submit">   </div>
                 </form>
                 
                </div>
            </div> <!-- /.col-xs-12 -->
    </div>
<?php include_once 'includes/footer.php' ?>
