<?php



// Selcting and displaying all avialabe data in categories
function finding_all_categories()
{
    global $connection;

    $query = "SELECT * FROM categories";
    $select_categories_query = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($select_categories_query)) {
        $cat_id =  $row['cat_id'];
        $cat_title =  $row['cat_title'];
        echo "<tr>";
        echo "<td>{$cat_id}</td>";


        echo "<td><a href='../category.php?category=$cat_id'>{$cat_title}</a></td>";


        // ?delete = Key  use for get method in other operations key= variable name use to store the data from db
        echo "<td><a href='categories.php?delete={$cat_id}'>Delete</td>";
        echo "<td><a href='categories.php?edit={$cat_id}'>Edit</td>";

        echo "</tr>";
    }
}

// Inserting data into Categories
function insert_into_categories()
{
    global $connection;

    if (isset($_POST['submit'])) {

        // echo "<h1>Hello</h1>";
        $cat_title = $_POST['cat_title'];

        if ($cat_title == "" || empty($cat_title)) {
            echo "This Field Cant Be Empty";
        } else {
            $query = "INSERT INTO categories(cat_title)";
            $query .= "VALUE ('{$cat_title}')";

            $create_Category_query = mysqli_query($connection, $query);

            if (!$create_Category_query) {
                die("Error" . mysqli_error($connection));
            }
        }
    }
}

// upadte Category
function update_category()
{

    global $connection;

    if (isset($_GET['edit'])) {

        $cat_edit_id = $_GET['edit'];

        $query = "SELECT * FROM categories WHERE cat_id = $cat_edit_id";
        $edit_categories_query = mysqli_query($connection, $query);

        while ($row = mysqli_fetch_assoc($edit_categories_query)) {
            $cat_id =  $row['cat_id'];
            $cat_title =  $row['cat_title'];

?>

            <!-- We Need This INput Tag  in Our While Loop -->
            <input value="<?php if (isset($cat_title)) {
                                echo $cat_title;
                            } ?>" type="text" name="cat_title" class="form-control">

    <?php
        }
    } ?>



<?php

    if (isset($_POST['update'])) {
        $cat_title = $_POST['cat_title'];

        $query = "UPDATE categories SET cat_title = '{$cat_title}' WHERE cat_id = {$cat_id}";
        $update_cat_query = mysqli_query($connection, $query);

        // Referesh the PAge Automatically
        header("Location:categories.php");

        if (!$update_cat_query) {
            die("Failed To delete" . mysqli_error($connection));
        }
    }
}


// Deleteing From Category 
function delete_cat()
{
    global $connection;

    if (isset($_GET['delete'])) {
        $cat_delete_id = $_GET['delete'];

        $query = "DELETE FROM categories WHERE cat_id = {$cat_delete_id}";
        $delete_cat_query = mysqli_query($connection, $query);

        // Referesh the PAge Automatically
        header("Location:categories.php");

        if (!$delete_cat_query) {
            die("Failed To delete" . mysqli_error($connection));
        }
    }
}


// Adding Post From Admin CMS
function add_post($post_category)
{

    global $connection;

    if (isset($_POST['add_post'])) {
        echo $_POST['add_post'];

        $post_title =  $_POST['post_title'];
        $post_author =  $_POST['post_author'];
        $post_category_id =  $_POST['post_category'];
        $post_status =  $_POST['post_status'];
        $post_images =  $_FILES['image']['name'];
        $post_images_temp =  $_FILES['image']['tmp_name'];
        $post_tags =  $_POST['post_tags'];
        $post_content =  $_POST['post_content'];
        // $post_comments_count = 4;
        $post_date =  date('d-m-y');



        move_uploaded_file($post_images_temp, "../images/$post_images");

        // query part
        // inserting into db varibale in brackets are name of column in db and are arrange in same manner

        $query = "INSERT INTO posts(post_category_id,post_title,post_author,post_date,post_image,
            post_content,post_tags,post_status)";

        // Inserting Values now in column variable are from above 

        $query .= "VALUES('{$post_category_id}','{$post_title}','{$post_author}',now(),'{$post_images}',
        '{$post_content}','{$post_tags}','{$post_status}')";

        $inserting_post_data = mysqli_query($connection, $query);

        if (!$inserting_post_data) {
            die("Fail To UPload" . mysqli_errno($connection));
            # code...
        }
    }
}



// deleteing POst from admin cms
function delete_post()
{
    global $connection;

    if (isset($_GET['delete'])) {
        if (isset($_SESSION['user_role'])) {
            if ($_SESSION['user_role'] == 'Admin') {


                $post_delete_id = mysqli_real_escape_string($connection, $_GET['delete']);

                $query = "DELETE FROM posts WHERE post_id = {$post_delete_id}";
                $delete_post_query = mysqli_query($connection, $query);

                // Referesh the PAge Automatically
                header("Location:posts.php");

                if (!$delete_post_query) {
                    die("Failed To delete" . mysqli_error($connection));
                }
            }
        }
    }
}

// ----------------------------------------------------------------------------------

// Delete Comment from post
function delete_comment($the_post_id)
{
    global $connection;

    if (isset($_GET['delete'])) {
        $comment_id = $_GET['delete'];

        $query = "DELETE FROM comments WHERE comment_id = {$comment_id}";
        $delete_cat_query = mysqli_query($connection, $query);

        // Referesh the PAge Automatically
        header("Location:comments.php");

        if (!$delete_cat_query) {
            die("Failed To delete" . mysqli_error($connection));
        }
        $query = "SELECT post_comment_count WHERE post_id = $the_post_id";
        $comment_count_s = mysqli_query($connection, $query);
        if ($comment_count_s !== 0) {
            $query1  = "UPDATE posts SET post_comment_count = post_comment_count - 1 WHERE post_id = $the_post_id";

            $comment_count = mysqli_query($connection, $query1);
        }
        if (!$comment_count) {
            die("fail" . mysqli_error($connection));
        }
    }
}


// Updateing Status of Comment
function unapprove_comment()
{
    global $connection;

    if (isset($_GET['unapprove'])) {
        $comment_id = $_GET['unapprove'];

        $query = "UPDATE comments SET  comment_status = 'UnApproved' WHERE comment_id = $comment_id";
        $delete_cat_query = mysqli_query($connection, $query);

        // Referesh the PAge Automatically
        header("Location:comments.php");

        if (!$delete_cat_query) {
            die("Failed To delete" . mysqli_error($connection));
        }
    }
}


// Updateing Status of Comment
function approve_comment()
{
    global $connection;

    if (isset($_GET['approve'])) {
        $comment_id = $_GET['approve'];

        $query = "UPDATE comments SET  comment_status = 'Approved' WHERE comment_id = $comment_id";
        $delete_cat_query = mysqli_query($connection, $query);

        // Referesh the PAge Automatically
        header("Location:comments.php");

        if (!$delete_cat_query) {
            die("Failed To delete" . mysqli_error($connection));
        }
    }
}
// ----------------------------------------------------------------------------------


function add_user()
{

    global $connection;

    if (isset($_POST['add_user'])) {
        echo "<script>alert('User Created');</script>";

        $user_username =  $_POST['user_username'];
        $user_fname =  $_POST['user_fname'];
        $user_lname =  $_POST['user_lname'];
        $user_pswrd =  $_POST['user_pswrd'];
        $user_mail =  $_POST['user_email'];
        $user_images =  $_FILES['user_image']['name'];
        $user_images_temp =  $_FILES['user_image']['tmp_name'];
        $user_role =  $_POST['user_role'];
        // $user_comments_count = 4;
        $user_date =  date('d-m-y');

        $user_username = mysqli_real_escape_string($connection, $user_username);
        $user_pswrd = mysqli_real_escape_string($connection, $user_pswrd);
        $user_mail = mysqli_real_escape_string($connection, $user_mail);
        $randsalt = password_hash($user_pswrd, PASSWORD_BCRYPT, array('cost' => 12));



        move_uploaded_file($user_images_temp, "./images/$user_images");

        // query part
        // inserting into db varibale in brackets are name of column in db and are arrange in same manner
        $query = "INSERT INTO users(user_username,user_fname,user_lname,user_pswrd,user_mail,user_image,user_role,user_date,randsalt)";

        // Inserting Values now in column variable are from above 

        $query .= "VALUES('{$user_username}','{$user_fname}','{$user_lname}','{$user_pswrd}','{$user_mail}','{$user_images}','{$user_role}',now(),'{$randsalt}')";

        $inserting_user_data = mysqli_query($connection, $query);

        if (!$inserting_user_data) {
            die("Fail To UPload" . mysqli_errno($connection));
            # code...
        }
    }
}


function delete_user()
{
    global $connection;

    if (isset($_GET['delete'])) {
        $user_delete_id = $_GET['delete'];

        $query = "DELETE FROM users WHERE user_id = {$user_delete_id}";
        $delete_post_query = mysqli_query($connection, $query);

        // Referesh the PAge Automatically
        header("Location:users.php");

        if (!$delete_post_query) {
            die("Failed To delete" . mysqli_error($connection));
        }
    }
}

function make_Admin()
{
    global $connection;

    if (isset($_GET['admin'])) {
        $user_id = $_GET['admin'];

        $query = "UPDATE users SET  user_role = 'Admin' WHERE user_id = $user_id";
        $delete_cat_query = mysqli_query($connection, $query);

        // Referesh the PAge Automatically
        header("Location:users.php");

        if (!$delete_cat_query) {
            die("Failed To delete" . mysqli_error($connection));
        }
    }
}


// Updateing Status of Comment
function make_Subscriber()
{
    global $connection;

    if (isset($_GET['subscriber'])) {
        $user_id = $_GET['subscriber'];

        $query = "UPDATE users SET  user_role = 'Subscriber' WHERE user_id = $user_id";
        $delete_cat_query = mysqli_query($connection, $query);

        // Referesh the PAge Automatically
        header("Location:users.php");

        if (!$delete_cat_query) {
            die("Failed To delete" . mysqli_error($connection));
        }
    }
}

?>  