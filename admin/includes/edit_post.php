<?php

if (isset($_GET['edit'])) {
    $post_edit = $_GET['edit'];
}

    $query = "SELECT * FROM posts WHERE post_id = $post_edit";
    $edit_post_query = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($edit_post_query)) {
        $post_id =  $row['post_id'];
        $post_title =  $row['post_title'];
        $post_author =  $row['post_author'];
        $post_category_id =  $row['post_category_id'];
        $post_status =  $row['post_status'];
        $post_image =  $row['post_image'];
        $post_tags =  $row['post_tags'];
        $post_content =  $row['post_content'];
        $post_comments_count = 4;
        $post_date =  date('d-m-y');
    }

    if (isset($_POST['update_post'])) {
        $post_title =  $_POST['post_title'];
        $post_author =  $_POST['post_author'];
        $post_category_id =  $_POST['post_category'];
        $post_status =  $_POST['post_status'];
        $post_images =  $_FILES['image']['name'];
        $post_images_temp =  $_FILES['image']['tmp_name'];
        $post_tags =  $_POST['post_tags'];
        $post_content =  $_POST['post_content'];
        $post_comments_count = 4;
        $post_date =  date('d-m-y');


        move_uploaded_file($post_images_temp, "../images/$post_images");

        $query  = "UPDATE posts SET ";
        $query .= "post_title = '{$post_title}',";
        $query .= "post_category_id = '{$post_category_id}',";
        $query .= "post_date = now(),";
        $query .= "post_author = '{$post_author}',";
        $query .= "post_status = '{$post_status}',";
        $query .= "post_tags   = '{$post_tags}',";
        $query .= "post_content= '{$post_content}',";
        $query .= "post_image= '{$post_images}'";
        $query .= "WHERE post_id = {$post_edit}";
        // Inserting Values now in column variable are from above 

        $update_query = mysqli_query($connection,$query);

        if(!$update_query){
            die("Fail". mysqli_error($connection));
        }



    }
?>

<form acion="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="post_title">Post Title</label>
        <input value="<?php echo $post_title; ?>" type="text" name="post_title" class="form-control">
    </div>

    <div class="form-group">
        <select name="post_category" id="">
            <?php
                $query = "SELECT * FROM  categories";
                $edit_cat_query = mysqli_query($connection, $query);

                // if (!$edit_post_categories_query) {
                //     echo "fail";
                // }
                while ($row = mysqli_fetch_assoc($edit_cat_query)) {
                    $cat_id =  $row['cat_id'];
                    $cat_title =  $row['cat_title'];
                    echo "<option value='{$cat_id}'>$cat_title</option>";
                }
            ?>
        </select>
    </div>

    <div class="form-group">
        <label for="post_author">Post Author</label>
        <input value="<?php echo $post_author; ?>" type="text" name="post_author" class="form-control">
    </div>

   <div class="form-group">
        <label for="post_status">Post Status</label><br>
        <select name="post_status" id="">
        <option value="<?php echo $post_status; ?>"><?php echo $post_status; ?></option>
        <?php 
        if ($post_status == 'Draft') {
            echo "<option value='Publish'>Publish</option>";
        }

        else{
            echo "<option value='Draft'>Draft</option>";
        }
        ?>
            
            

        </select>

    <div class="form-group">
        <label for="post_status">Post Images</label><br>
        <img width="100" src="../images/<?php echo $post_image; ?>" alt=""><br>
        <input type="file" name="image" class="form-control">
    </div>

    <div class="form-group">
        <label for="post_tags">Post Tags</label>
        <input value="<?php echo $post_tags; ?>" type="text" name="post_tags" class="form-control">
    </div>

    <div class="form-group">
        <label for="post_content">Post Content</label>
        <textarea name="post_content" class="form-control" id="" cols="30" rows="10">
        <?php echo $post_content; ?>
        </textarea>
    </div>

    <div class="form-group">
        <input class="btn btn-primary" type="submit" value="Post Published" name="update_post">
    </div>
</form>