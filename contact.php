<?php include "includes/db.php"; ?>
<?php include "includes/header.php"; ?>


<!-- Navigation -->

<?php include "includes/nav.php"; ?>



<?php

// the message


if (isset($_POST['submit'])) {
    
    
    $to = 'jaybarot668@gmail.com';
    $subject = wordwrap($_POST['subject'],70);
    $body = $_POST['body'];
    $header = $_POST['email'];
    

// send email
mail($to,$subject,$body,$header);

}
?>

<!-- Page Content -->
<div class="container">


    <div class="col-xs-4 col-xs-offset-3">
        <div class="form-row">
            <center>
                <h1>Contact Form</h1>
            </center>
            <form role="form" action="contact.php" method="post" autocomplete="off">

            <div class="form-group">
                    <label for="mail">Email</label>
                    <input type="mail" name="email" class="form-control">
                </div>

                <div class="form-group">
                    <label for="subject">Subject</label>
                    <input type="text" name="subject" class="form-control">
                </div>

                <div class="form-group">
                <label for="body">Your Message</label>
                <textarea class="form-control" rows="3" name="body"></textarea>
            </div>


                <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Submit">
            </form>

        </div>
    </div> <!-- /.col-xs-12 -->



    </div>
    <!-- /.row -->

    <hr>
