<?php
include 'includes/header.php';
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
                    <h1 class="page-header">
                        Welcome To Admin
                        <small><?php echo $_SESSION['username']; ?></small>
                    </h1>
                </div>
            </div>
            <!-- /.row -->

            <!-- /.row -->

            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-file-text fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <?php

                                    $query = "SELECT * FROM posts";
                                    $post_query = mysqli_query($connection, $query);

                                    $post_counts = mysqli_num_rows($post_query);

                                    echo "<div class='huge'>$post_counts</div>";


                                    ?>
                                    <div>Posts</div>
                                </div>
                            </div>
                        </div>
                        <a href="posts.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-comments fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">


                                    <?php

                                    $query = "SELECT * FROM comments";
                                    $comment_query = mysqli_query($connection, $query);

                                    $comment_counts = mysqli_num_rows($comment_query);

                                    echo "<div class='huge'>$comment_counts</div>";


                                    ?>
                                    <div>Comments</div>
                                </div>
                            </div>
                        </div>
                        <a href="comments.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-user fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">

                                    <?php

                                    $query = "SELECT * FROM users";
                                    $user_query = mysqli_query($connection, $query);

                                    $user_counts = mysqli_num_rows($user_query);

                                    echo "<div class='huge'>$user_counts</div>";


                                    ?>
                                    <div> Users</div>
                                </div>
                            </div>
                        </div>
                        <a href="users.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-list fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <?php

                                    $query = "SELECT * FROM categories";
                                    $categories_query = mysqli_query($connection, $query);

                                    $categories_counts = mysqli_num_rows($categories_query);

                                    echo "<div class='huge'>$categories_counts</div>";


                                    ?>
                                    <div>Categories</div>
                                </div>
                            </div>
                        </div>
                        <a href="categories.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <!-- /.row -->
            <?php
            $query = "SELECT * FROM posts WHERE post_status = 'Draft'";
            $select_Draft_post = mysqli_query($connection, $query);
            $draft_count = mysqli_num_rows($select_Draft_post);
            
            $query = "SELECT * FROM posts WHERE post_status = 'Publish'";
            $select_publish_post = mysqli_query($connection, $query);
            $publish_count = mysqli_num_rows($select_publish_post);

            $query = "SELECT * FROM comments WHERE comment_status = 'Unapproved'";
            $select_unapproved_comment = mysqli_query($connection, $query);
            $unapproved_count = mysqli_num_rows($select_unapproved_comment);

            $query = "SELECT * FROM comments WHERE comment_status = 'Approved'";
            $select_approved_comment = mysqli_query($connection, $query);
            $approved_count = mysqli_num_rows($select_approved_comment);

            $query = "SELECT * FROM users WHERE user_role = 'Subscriber'";
            $select_subscriber = mysqli_query($connection, $query);
            $subscriber_count = mysqli_num_rows($select_subscriber);
            ?>

            <div class="row">
                <script type="text/javascript">
                    google.charts.load('current', {
                        'packages': ['bar']
                    });
                    google.charts.setOnLoadCallback(drawChart);

                    function drawChart() {
                        var data = google.visualization.arrayToDataTable([
                            ['Data', 'Count'],

                            <?php

                            $elements_text = ['All Posts','Publish Post', 'Draft Post', 'Comments', 'Unapproved Comments', 'Approved Comments' ,'Users', 'Subscriber', 'Categories'];
                            $elements_count = [$post_counts, $publish_count ,$draft_count, $comment_counts, $unapproved_count,$approved_count ,$user_counts, $subscriber_count, $categories_counts];

                            for ($i = 0; $i < 8; $i++) {

                                echo "['{$elements_text[$i]}'" . "," . "{$elements_count[$i]}],";
                            }

                            ?>




                            // ['Posts', 1000],
                        ]);

                        var options = {
                            chart: {
                                title: '',
                                subtitle: '',
                            }
                        };

                        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

                        chart.draw(data, google.charts.Bar.convertOptions(options));
                    }
                </script>


                <div id="columnchart_material" style="width: 'auto; height: 500px;"></div>

            </div>


        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->
    <?php
    include 'includes/footer.php';
    ?>