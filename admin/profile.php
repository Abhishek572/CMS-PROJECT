<?php
include 'includes/header.php';
?>

<?php


?>




<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="main.php">Admin</a>
        </div>
        <!-- Top Menu Items -->
        <?php
        include 'includes/TopMenu.php';
        ?>
        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
        <?php
        include 'includes/sidebar.php';
        ?>
        <!-- /.navbar-collapse -->
    </nav>

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <?php

                    if (isset($_SESSION['username'])) {
                        //     echo $_SESSION['username']; 
                        //     # code...


                        $username = $_SESSION['username'];
                        $query = "SELECT * FROM users WHERE user_username = '{$username}'";

                        $select_user_profile =  mysqli_query($connection, $query);

                        while ($row = mysqli_fetch_array($select_user_profile)) {
                            $user_id        =  $row['user_id'];
                            $user_username  =  $row['user_username'];
                            $user_pswrd     =  $row['user_pswrd'];
                            $user_fname     =  $row['user_fname'];
                            $user_lname     =  $row['user_lname'];
                            $user_email     =  $row['user_mail'];
                            $user_role      =  $row['user_role'];
                            $user_date      =  $row['user_date'];
                        }

                        if (isset($_POST['update_profile'])) {
                            // $user_id =  $_POST['user_id'];
                            $user_username =  $_POST['user_username'];
                            // $user_pswrd = $_POST['user_pswrd'];
                            $user_fname =  $_POST['user_fname'];
                            $user_lname =  $_POST['user_lname'];
                            $user_mail =  $_POST['user_email'];
                            $user_images =  $_FILES['user_image']['name'];
                            $user_images_temp =  $_FILES['user_image']['tmp_name'];
                            $user_role =  $_POST['user_role'];
                            $user_date =  date('d-m-y');


                            move_uploaded_file($user_images_temp, "./images/$user_images");

                            $query  = "UPDATE users SET ";
                            $query .= "user_username = '{$user_username}',";
                            $query .= "user_fname   = '{$user_fname}',";
                            $query .= "user_lname   = '{$user_lname}',";
                            // $query .= "user_pswrd   = '{$user_pswrd}',";
                            $query .= "user_mail   = '{$user_email}',";
                            $query .= "user_image   = '{$user_images}',";
                            $query .= "user_role    = '{$user_role}',";
                            $query .= "user_date    =  now()";
                            $query .= "WHERE user_username = '{$username}'";
                            // Inserting Values now in column variable are from above 

                            $update_query = mysqli_query($connection, $query);
                            // echo "Updated";

                            if (!$update_query) {
                                die("Fail" . mysqli_error($connection));
                            }
                        }
                    }

                    ?>
                    <h1 class="page-header">
                        Welcome To Admin
                        <small><?php echo $_SESSION['username'];?></small>
                    </h1>
                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->
        <form acion="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="user_username">Username</label>
                <input type="text" name="user_username" class="form-control" value="<?php echo $user_username; ?>">
            </div>

            <div class="form-group">
                <label for="user_fname">Firstname</label>
                <input type="text" name="user_fname" class="form-control" value="<?php echo $user_fname; ?>">
            </div>


            <div class="form-group">
                <label for="user_lname">Lastname</label><br>
                <input type="text" name="user_lname" class="form-control" value="<?php echo $user_lname; ?>">
            </div>



            <div class="form-group">
                <label for="user_email">Email</label>
                <input type="mail" name="user_email" class="form-control" value="<?php echo $user_email; ?>">
            </div>


            <div class="form-group">
                <label for="user_image">User Image</label>
                <img width="50" heigt="50" src="./images/<?php echo $user_image; ?>" alt=""><br>
                <input type="file" name="user_image" class="form-control">
            </div>

            <!-- <div class="form-group">
        <label for="user_role">Role</label>
        <input type="text" name="user_tags" class="form-control">
    </div> -->
            <div class="form-group">
                <label for="user_role">Select role</label><br>
                <select name="user_role" id="">
                    <option value="<?php echo $user_role; ?>"><?php echo $user_role; ?></option>
                    <?php
                    if ($user_role == 'Admin') {
                        echo "<option value='Subscriber'>Subscriber</option>";
                    } else {
                        echo "<option value='Admin'>Admin</option>";
                    }
                    ?>

                </select>
            </div>

            <div class="form-group">
                <input class="btn btn-primary" type="submit" value="Update" name="update_profile">
            </div>
        </form>

    </div>
    <!-- /#page-wrapper -->
    <?php
    include 'includes/footer.php';
    ?>