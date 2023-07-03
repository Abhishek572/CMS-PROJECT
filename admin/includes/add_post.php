<form acion="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="post_title">Post Title</label>
        <input type="text" name="post_title" class="form-control">
    </div>

    <div class="form-group">
    <label for="post_category">Post Category</label><br>
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

    <?php add_post($cat_title); ?>

    <div class="form-group">
        <label for="post_author">Post Author</label>
        <input type="text" name="post_author" class="form-control">
    </div>

    <div class="form-group">
        <label for="post_status">Post Status</label><br>
        <select name="post_status" id="">
            <option value="Draft">Draft</option>
            <option value="Publish">Publish</option>

        </select>
    </div>

    <div class="form-group">
        <label for="post_image">Post Image Size(900x300)</label>
        <input type="file" name="image" class="form-control">
    </div>

    <div class="form-group">
        <label for="post_tags">Post Tags</label>
        <input type="text" name="post_tags" class="form-control">
    </div>

    <div class="form-group">
        <label for="post_content">Post Content</label>
        <textarea name="post_content" class="form-control" id="" cols="30" rows="10">
        </textarea>
    </div>

    <div class="form-group">
        <input class="btn btn-primary" type="submit" value="Post Published" name="add_post">
    </div>
</form>