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

            if (isset($_GET['p_id'])) {
                $post_id = $_GET['p_id'];

                $query1  = "UPDATE posts SET post_view_count = post_view_count + 1 WHERE post_id = $post_id";
                $comment_count= mysqli_query($connection,$query1);
        
                if (!$comment_count) {
                    die("fail". mysqli_error($connection));
                }
            }
            $query = "SELECT * FROM posts WHERE post_id = $post_id AND post_status = 'Publish'";
            $select_all_posts_query = mysqli_query($connection, $query);

            while ($row = mysqli_fetch_assoc($select_all_posts_query)) {
                $post_title =  $row['post_title'];
                $post_author =  $row['post_author'];
                $post_date =  $row['post_date'];
                $post_image =  $row['post_image'];
                $post_content =  $row['post_content'];
            ?>

                <!-- Breaking PHP tag differently means we need that tag in whole loop Like shown in this page-here -->

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

                <!-- <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a> -->

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

    <!-- Blog Comments -->

    <?php
    if (isset($_POST['create_comment'])) 
    {
        $the_post_id =  $_GET['p_id'];

        $comment_author = $_POST['comment_author'];
        $comment_email = $_POST['comment_email'];
        $comment_content = $_POST['comment_content'];

        if (!empty($comment_author) && !empty($comment_email) && !empty($comment_content)) {
            # code...
        $query = "INSERT INTO comments (comment_post_id,comment_author,comment_email,comment_content,comment_date,comment_status)";
        $query .= "VALUES ($the_post_id,'{$comment_author}','{$comment_email}','{$comment_content}',now(),'Pending')";

        $creare_comment = mysqli_query($connection,$query);

        if(!$creare_comment){
            die("fail".mysqli_error($connection));
        }

        $query1  = "UPDATE posts SET post_comment_count = post_comment_count + 1 WHERE post_id = $the_post_id";

        $comment_count= mysqli_query($connection,$query1);

        if (!$comment_count) {
            die("fail". mysqli_error($connection));
        }
        }
        else{
            echo "<script>alert('Fields Cannot be empty')</script>";
        }
    }
    ?>
    <!-- Comments Form -->
    <div class="well">
        <h4>Leave a Comment:</h4>
        <form role="form" action="" method="post">
            <div class="form-group">
                <label for="comment_author">Author</label>
                <input type="text" name="comment_author" class="form-control">
            </div>

            <div class="form-group">
                <label for="comment_email">Email</label>
                <input type="email" name="comment_email" class="form-control">
            </div>

            <div class="form-group">
                <label for="comment_content">Your Comment</label>
                <textarea class="form-control" rows="3" name="comment_content"></textarea>
            </div>



            <button type="submit" name="create_comment" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <hr>

    <!-- Posted Comments -->

    <!-- Comment -->
    <div class="media">
        <a class="pull-left" href="#">
            <img class="media-object" src="http://placehold.it/64x64" alt="">
        </a>
        <div class="media-body">
            <h4 class="media-heading">Start Bootstrap
                <small>August 25, 2014 at 9:30 PM</small>
            </h4>
            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
        </div>
    </div>

    <!-- Comment -->
    <div class="media">
        <a class="pull-left" href="#">
            <img class="media-object" src="http://placehold.it/64x64" alt="">
        </a>
        <div class="media-body">
            <h4 class="media-heading">Start Bootstrap
                <small>August 25, 2014 at 9:30 PM</small>
            </h4>
            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
            <!-- Nested Comment -->
            <div class="media">
                <a class="pull-left" href="#">
                    <img class="media-object" src="http://placehold.it/64x64" alt="">
                </a>
                <div class="media-body">
                    <h4 class="media-heading">Nested Start Bootstrap
                        <small>August 25, 2014 at 9:30 PM</small>
                    </h4>
                    Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                </div>
            </div>
            <!-- End Nested Comment -->
        </div>
    </div>

</div>
<hr>

<!-- Footer -->
<?php
include 'includes/footer.php';
?>