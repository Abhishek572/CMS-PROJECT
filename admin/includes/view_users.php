<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Id</th>
            <th>Username</th>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Email</th>
            <th>Role</th>
            <th>Date</th>
            <th>Delete</th>
            <th>Edit</th>
            <th>Approved</th>
            <th>UnApproved</th>
        </tr>
    </thead>

    <tbody>

        <?php

        $query = "SELECT * FROM users";
        $select_user_query = mysqli_query($connection, $query);

        while ($row = mysqli_fetch_assoc($select_user_query)) {
            $user_id        =  $row['user_id'];
            $user_username  =  $row['user_username'];
            $user_pswrd     =  $row['user_pswrd'];
            $user_fname     =  $row['user_fname'];
            $user_lname     =  $row['user_lname'];
            $user_email     =  $row['user_mail'];
            $user_role      =  $row['user_role'];
            $user_date      =  $row['user_date'];

            echo "<tr>";
            echo "<td>$user_id</td>";
            echo "<td>$user_username</td>";
            echo "<td>$user_fname </td>";
            echo "<td>$user_lname </td>";
            // $query = "SELECT * FROM categories WHERE cat_id = comment_category_id";
            // $edit_categories_query = mysqli_query($connection, $query);

            // while ($row = mysqli_fetch_assoc($edit_categories_query)) {
            //     $cat_id =  $row['cat_id'];
            //     $cat_title =  $row['cat_title'];

            // echo "<td>{$cat_title}</td>";
            // }



            // $query = "SELECT * FROM posts WHERE post_id = $comment_post_id";
            // $select_post_id = mysqli_Query($connection,$query);

            // while($row=mysqli_fetch_assoc($select_post_id)){
            //     $post_id  = $row['post_id'];
            //     $post_title = $row['post_title'];

            //     echo "<td><a href = '../post.php?p_id=$post_id'>$post_title</a></td>"; 
            // }   

            echo "<td>$user_email</td>";
            echo "<td>$user_role</td>";
            echo "<td>$user_date</td>";
            echo "<td><a onClick=\"javascript: return confirm('Are you sure');\" href='users.php?delete={$user_id}'>Delete</td>";
            echo "<td><a onClick=\"javascript: return confirm('Are you sure');\" href='users.php?source=edit_user&user_edit={$user_id}'>Edit</td>";
            echo "<td><a onClick=\"javascript: return confirm('Are you sure');\" href='users.php?admin={$user_id}'>Admin</td>";
            echo "<td><a onClick=\"javascript: return confirm('Are you sure');\" href='users.php?subscriber={$user_id}'>Subscriber</td>";
            echo "</tr>";
        }
        ?>
    </tbody>
</table>


<?php delete_user();
   
  make_Admin();
  make_Subscriber();
  
  ?>