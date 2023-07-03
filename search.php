<?php
include 'includes/db.php';
include 'includes/header.php';
?>

<!-- Navigation -->
<?php
include 'includes/nav.php';
?>

<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">
            <h1 class="page-header">
                Page Heading
                <small>Secondary Text</small>
            </h1>

            <!-- Created Logic For Searching The Post Of Same Tags In Database An Displaying IT -->

            <?php
            if (isset($_POST['submit'])) {

                if (isset($_GET['page'])) {
                    $page = $_GET['page'];
                } else {
                    $page = "";
                }

                if ($page == "" || $page == 1) {
                    $page_1 = 0;
                } else {
                    $page_1 = ($page * 5) - 5;
                }

                // Getting the user input from input tag file sidebar.php
                $search = $_POST['search'];
                $pagination_query = "SELECT * FROM posts WHERE post_status = 'Publish' AND post_tags LIKE '%$search%'";
                $find_count = mysqli_query($connection, $pagination_query);
                $count_pg = mysqli_num_rows($find_count);
                $count_pg = ceil($count_pg / 5);




                $query = "SELECT * FROM posts WHERE post_tags LIKE '%$search%' AND post_status = 'Publish' LIMIT $page_1,5";
                $search_query = mysqli_query($connection, $query);

                if (!$search_query) {
                    die("Query Fail" . mysqli_error($connection));
                }

                $count = mysqli_num_rows($search_query);
                if ($count == 0) {

                    echo "<h2>No Result</h2>";
                } else {

                    // $query = "SELECT * FROM posts";
                    // $select_all_posts_query = mysqli_query($connection, $query);

                    while ($row = mysqli_fetch_assoc($search_query)) {
                        $post_title =  $row['post_title'];
                        $post_author =  $row['post_author'];
                        $post_date =  $row['post_date'];
                        $post_image =  $row['post_image'];
                        $post_content =  $row['post_content'];
            ?>


                        <!-- First Blog Post -->
                        <h2>
                            <a href="#"><?php echo "{$post_title}" ?></a>
                        </h2>
                        <p class="lead">
                            by <a href="index.php"><?php echo "{$post_author}" ?></a>
                        </p>
                        <p><span class="glyphicon glyphicon-time"></span> <?php echo "{$post_date}" ?></p>
                        <hr>
                        <img class="img-responsive" src="images/<?php echo $post_image; ?>" alt="">
                        <hr>
                       <p><?php echo "{$post_content}" ?></p>
                <a class="btn btn-primary" href="post.php?p_id= <?php echo $post_id; ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
                        <hr>
            <?php
                    }
                }
            }
            ?>
            <!-- Pager -->
            <ul class="pager">

                <?php

                for ($i = 1; $i <= $count_pg; $i++) {
                    echo "<li><a href='search.php?page={$i}'>$i</a></li>";
                }

                ?>
            </ul>

        </div>







        <!-- Blog Sidebar Widgets Column -->
        <?php
        include "includes/sidebar.php";
        ?>
    </div>
    <!-- /.row -->

    <hr>

    <!-- Footer -->
    <?php
    include 'includes/footer.php';
    ?>

    <!-- Second Blog Post
                <h2>
                    <a href="#">Blog Post Title</a>
                </h2>
                <p class="lead">
                    by <a href="index.php">Start Bootstrap</a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on August 28, 2013 at 10:45 PM</p>
                <hr>
                <img class="img-responsive" src="http://placehold.it/900x300" alt="">
                <hr>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quibusdam, quasi, fugiat, asperiores harum voluptatum tenetur a possimus nesciunt quod accusamus saepe tempora ipsam distinctio minima dolorum perferendis labore impedit voluptates!</p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>

                Third Blog Post
                <h2>
                    <a href="#">Blog Post Title</a>
                </h2>
                <p class="lead">
                    by <a href="index.php">Start Bootstrap</a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on August 28, 2013 at 10:45 PM</p>
                <hr>
                <img class="img-responsive" src="http://placehold.it/900x300" alt="">
                <hr>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate, voluptates, voluptas dolore ipsam cumque quam veniam accusantium laudantium adipisci architecto itaque dicta aperiam maiores provident id incidunt autem. Magni, ratione.</p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>
 -->