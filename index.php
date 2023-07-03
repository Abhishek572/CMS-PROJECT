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


                if (isset($_GET['page'])) {
                    $page = $_GET['page'];
                }

                else {
                    $page = "";

                }

                if ($page == "" || $page == 1) {
                    $page_1 = 0;

                }

                else{
                    $page_1 = ($page * 5)-5;
                }



            $pagination_query = "SELECT * FROM posts WHERE post_status = 'Publish'";
            $find_count = mysqli_query($connection,$pagination_query);
            $count = mysqli_num_rows($find_count);
            $count = ceil($count / 5);

            
            $query = "SELECT * FROM posts WHERE post_status = 'Publish' LIMIT $page_1,5";
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

        <?php 
        
        for ($i=1; $i <= $count; $i++) { 
            echo"<li><a href='index.php?page={$i}'>$i</a></li>"; 
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