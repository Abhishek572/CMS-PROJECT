<?php session_start(); ?>
<?php include "db.php"; ?>


<?php

if (isset($_POST['login'])) {

    $username = $_POST['username'];
    $password = $_POST['pswrd'];


    $username = mysqli_real_escape_string($connection, $username);
    $password = mysqli_real_escape_string($connection, $password);

    $query = "SELECT * FROM users WHERE user_username = '{$username}'";
    $select_user = mysqli_query($connection, $query);

    if (!$select_user) {
        die("Hello Dead  Me" . mysqli_error($connection));
    }


    while($row = mysqli_fetch_assoc($select_user)){
        $db_user_id = $row['user_id'];
        $db_user_pswrd = $row['user_pswrd'];
        $db_user_username = $row['user_username'];
        $db_user_fname = $row['user_fname'];
        $db_user_lname = $row['user_lname'];
        $db_user_role = $row['user_role'];
        // $db_id = $row['user_id'];
        // $db_id = $row['user_id'];
        // $db_id = $row['user_id'];

    }

    if ($username !== $db_user_username && $password !== $db_user_pswrd) {

        header("Location: ../index.php");

        # code...
    }

    else if($username == $db_user_username && $password == $db_user_pswrd && $db_user_role == 'Admin'){
        
        $_SESSION['username'] = $db_user_username;
        $_SESSION['fname'] = $db_user_fname;
        $_SESSION['lname'] = $db_user_lname;
        $_SESSION['role'] = $db_user_role;

        echo "<script>window.location.href='../admin/main.php'</script>";

    }

    else{

        echo "<script>window.location.href='../index.php'</script>";

    }
}

?>