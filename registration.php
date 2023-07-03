<?php include "includes/db.php"; ?>
<?php include "includes/header.php"; ?>


<!-- Navigation -->

<?php include "includes/nav.php"; ?>



<?php
if (isset($_POST['submit'])) {
    echo "<script>alert('User Registered. PLease!Go back to Login');</script>";

    $user_username =  $_POST['user_username'];
    $user_fname =  $_POST['user_fname'];
    $user_lname =  $_POST['user_lname'];
    $user_pswrd =  $_POST['user_pswrd'];
    $user_mail =  $_POST['user_email'];
    $user_images =  $_FILES['user_image']['name'];
    $user_images_temp =  $_FILES['user_image']['tmp_name'];
    $user_role =  'Subscriber';
    $user_date =  date('d-m-y');

    $user_username = mysqli_real_escape_string($connection, $user_username);
    $user_pswrd = mysqli_real_escape_string($connection, $user_pswrd);  
    $user_mail = mysqli_real_escape_string($connection, $user_mail);
    $randsalt = password_hash($user_pswrd,PASSWORD_BCRYPT, array('cost'=> 12));


    move_uploaded_file($user_images_temp, "admin/images/$user_images");
    if (!empty($user_username) && !empty($user_fname) && !empty($user_lname) && !empty($user_pswrd) && !empty($user_mail) && !empty($user_images)) {

        // query part
        // inserting into db varibale in brackets are name of column in db and are arrange in same manner

        $query = "INSERT INTO users(user_username,user_fname,user_lname,user_pswrd,user_mail,user_image,user_role,user_date,randsalt)";

        // Inserting Values now in column variable are from above 

        $query .= "VALUES('{$user_username}','{$user_fname}','{$user_lname}','{$user_pswrd}','{$user_mail}','{$user_images}','{$user_role}',now(),'{$randsalt}')";

        $inserting_user_data = mysqli_query($connection, $query);

        if (!$inserting_user_data) {
            die("Fail To Upload" . mysqli_errno($connection));
            # code....
        }
    }
    else{
        echo "<script>alert('Fields Cannot be empty')</script>";
    }
}


?>

<!-- Page Content -->
<div class="container">


    <div class="col-xs-4 col-xs-offset-3">
        <div class="form-row">
            <center>
                <h1>Register</h1>
            </center>
            <form role="form" action="registration.php" method="post" id="login-form" autocomplete="off" enctype="multipart/form-data">

                <div class="form-group col-md-6" style="padding-right:3px; padding-left:0px;">
                    <label for="user_fname">Firstname</label>
                    <input type="text" name="user_fname" class="form-control">
                </div>


                <div class="form-group col-md-6" style="padding-right:3px; padding-left:0px;">
                    <label for="user_lname">Lastname</label>
                    <input type="text" name="user_lname" class="form-control">
                </div>

                <div class="form-group">
                    <label for="user_username">Username</label>
                    <input type="text" name="user_username" class="form-control">
                </div>

                <div class="form-group">
                    <label for="user_pswrd">Password</label><br>
                    <input type="password" name="user_pswrd" class="form-control">
                </div>

                <div class="form-group">
                    <label for="user_email">Email</label>
                    <input type="mail" name="user_email" class="form-control">
                </div>

                <div class="form-group">
                    <label for="user_images">User Image</label>
                    <input type="file" name="user_image" class="form-control">
                </div>

                <span><a href="index.php">Already have an account?login</a></span><br>
                <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Register">
            </form>

        </div>
    </div> <!-- /.col-xs-12 -->
</div> <!-- /.row -->

<hr>



<?php include "includes/footer.php"; ?>