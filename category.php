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

            <!-- Fetching the  Data From Db And Later Displaying it on Web Page -->

            <?php

            if(isset($_GET['category'])){
                $post = $_GET['category'];
            }



            $query = "SELECT * FROM posts WHERE post_category_id = $post AND post_status = 'Publish'";
            $select_all_posts_query = mysqli_query($connection, $query);

            while ($row = mysqli_fetch_assoc($select_all_posts_query)) {
                $post_id =  $row['post_id'];
                $post_title =  $row['post_title'];
                $post_author =  $row['post_author'];
                $post_date =  $row['post_date'];
                $post_image =  $row['post_image'];
                $post_content =  substr($row['post_content'],0,100);
            ?>

            <!-- Breaking PHP tag differently means we need that tag in whole loop Like show page-here -->

                <!-- First Blog Post -->
                <h2>
                    <a href="post.php?p_id= <?php echo $post_id; ?>"><?php echo "{$post_title}" ?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo "{$post_author}" ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> <?php echo "{$post_date}" ?></p>
                <hr>
                <img class="img-responsive" src="images/<?php echo $post_image;?>" alt="">
                <hr>
                <p><?php echo "{$post_content}" ?></p>
                <a class="btn btn-primary" href="post.php?p_id= <?php echo $post_id; ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>

                <!-- Closing the While Loop Tag Here That means it cover the enter Blog Post tags That came in Between -->
            <?php } ?>

            <!-- Pager -->
            <ul class="pager">
                <li class="previous">
                    <a href="#">&larr; Older</a>
                </li>
                <li class="next">
                    <a href="#">Newer &rarr;</a>
                </li>
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