<?php
if (isset($_POST['checkboxarray'])) {


    foreach ($_POST['checkboxarray'] as $checkboxvalue) {
        $bulkoption =  $_POST['bulk_selection'];
        echo $bulkoption;


        switch ($bulkoption) {
            case 'Publish':
                $query = "UPDATE posts SET post_status = '{$bulkoption}' WHERE post_id = {$checkboxvalue}";

                $update_to_status = mysqli_query($connection, $query);
                header("Location:posts.php");
                break;

            case 'Draft':
                $query = "UPDATE posts SET post_status = '{$bulkoption}' WHERE post_id = {$checkboxvalue}";

                $update_to_status = mysqli_query($connection, $query);
                header("Location:posts.php");
                break;

            case 'Delete':
                $query = "DELETE FROM posts WHERE post_id = {$checkboxvalue}";

                $delete_bulk = mysqli_query($connection, $query);
                header("Location:posts.php");
                break;


            case 'Clone':

                $query = "SELECT * FROM posts WHERE post_id = '{$checkboxvalue}'";
                $select_posts_query = mysqli_query($connection, $query);
                while ($row = mysqli_fetch_assoc($select_posts_query)) {
                    $post_id =  $row['post_id'];
                    $post_author =  $row['post_author'];
                    $post_title =  $row['post_title'];
                    $post_category_id =  $row['post_category_id'];
                    $post_status =  $row['post_status'];
                    $post_images =  $row['post_image'];
                    $post_tags =  $row['post_tags'];
                    $post_content =  $row['post_content'];
                    $post_comments_count =  $row['post_comment_count'];
                    $post_view_count =  $row['post_view_count'];
                    $post_date =  $row['post_date'];


                    // query part
                    // inserting into db varibale in brackets are name of column in db and are arrange in same manner

                    $query = "INSERT INTO posts(post_category_id,post_title,post_author,post_date,post_image,post_content,post_tags,post_comment_count,post_view_count,post_status)";

                    // Inserting Values now in column variable are from above 

                    $query .= "VALUES('{$post_category_id}','{$post_title}','{$post_author}',now(),'{$post_images}','{$post_content}','{$post_tags}','{$post_comments_count}',$post_view_count,'{$post_status}')";

                    $inserting_post_data = mysqli_query($connection, $query);
                }
                break;

            default:
                # code...
                break;
        }
    }
}

?>


<form action="" method="post">
    <table class="table table-bordered table-hover">
        <div id="bulkOptionsContainer" class="col-xs-2">
            <select name="bulk_selection" class="form-control">
                <option value="">Select option</option>
                <option value="Draft">Draft</option>
                <option value="Publish">Publish</option>
                <option value="Delete">Delete</option>
                <option value="Clone">Clone</option>

            </select>
        </div>
        <div class="col-sx-4">
            <input type="submit" class="btn btn-success" value="Apply">
            <thead>
                <tr>
                    <th><input id="selectAllBoxes" type="checkbox"></th>
                    <th>Id</th>
                    <th>Author</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Status</th>
                    <th>Images</th>
                    <th>Tags</th>
                    <th>Comment Count</th>
                    <th>View Count</th>
                    <th>Date</th>
                    <th>Delete</th>
                    <th>Edit</th>
                </tr>
            </thead>

            <tbody>

                <?php

                $query = "SELECT * FROM posts";
                $select_posts_query = mysqli_query($connection, $query);

                while ($row = mysqli_fetch_assoc($select_posts_query)) {
                    $post_id =  $row['post_id'];
                    $post_author =  $row['post_author'];
                    $post_title =  $row['post_title'];
                    $post_category_id =  $row['post_category_id'];
                    $post_status =  $row['post_status'];
                    $post_images =  $row['post_image'];
                    $post_tags =  $row['post_tags'];
                    $post_comments_count =  $row['post_comment_count'];
                    $post_view_count =  $row['post_view_count'];
                    $post_date =  $row['post_date'];

                    echo "<tr>";
                ?>
                    <td><input class='checkBoxes' type='checkbox' name="checkboxarray[]" value="<?php echo $post_id
                                                                                                ?>"></td>
                <?php
                    echo "<td>$post_id</td>";
                    echo "<td>$post_author</td>";

                    $query = "SELECT * FROM posts WHERE post_id = $post_id";
                    $select_post_id = mysqli_Query($connection, $query);

                    while ($row = mysqli_fetch_assoc($select_post_id)) {
                        $post_id  = $row['post_id'];
                        $post_title = $row['post_title'];

                        echo "<td><a href = '../post.php?p_id=$post_id'>$post_title</a></td>";
                    }

                    $query = "SELECT * FROM categories WHERE cat_id = $post_category_id";
                    $edit_categories_query = mysqli_query($connection, $query);

                    while ($row = mysqli_fetch_assoc($edit_categories_query)) {
                        $cat_id =  $row['cat_id'];
                        $cat_title =  $row['cat_title'];

                        echo "<td>{$cat_title}</td>";
                    }


                    echo "<td>$post_status</td>";
                    echo "<td><img width = 100px src= '../images/$post_images'></td>";
                    echo "<td>$post_tags</td>";
                    echo "<td>$post_comments_count</td>";
                    echo "<td>$post_view_count</td>";
                    echo "<td>$post_date</td>";
                    echo "<td><a onClick=\"javascript: return confirm('Are you sure');\" href='posts.php?delete={$post_id}'>Delete</td>";
                    echo "<td><a onClick=\"javascript: return confirm('Are you sure');\" href='posts.php?source=edit_post&edit={$post_id}'>Edit</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
    </table>
</form>

<?php delete_post() ?>