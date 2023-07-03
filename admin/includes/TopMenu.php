<!-- Top Menu Items -->


<?php
    $session = session_id();
    $time = time();
    $time_in_secs = 60;
    $time_out = $time -  $time_in_secs;


    $query = "SELECT * FROM users_online WHERE session = '$session'";
    $online_user = mysqli_query($connection,$query);

    $count = mysqli_num_rows($online_user);

    if($count == NULL){
        mysqli_query($connection,"INSERT INTO users_online(session,time) VALUES('$session','$time')");
    }
    
    else{
        mysqli_query($connection,"UPDATE users_online SET time = '$time' WHERE session = ' $session'");
    }
    $user_online = mysqli_query($connection,"SELECT * FROM users_online WHERE time > '$time_out'");
    $count_user = mysqli_num_rows($user_online);
    


    ?>


<ul class="nav navbar-right top-nav">
                <li>
                    <a href="../index.php">WEbsite</a>
                </li>
                <li>
                    <a><?php echo"Users Online: $count_user"?></a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i><?php echo $_SESSION['username'];?><b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="profile.php"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li>
                            <a href="../includes/logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>