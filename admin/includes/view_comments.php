<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Id</th>
            <th>Author</th>
            <th>Comment</th>
            <th>In_Repsonse_To</th>
            <th>Email</th>
            <th>Date</th>
            <th>Status</th>
            <th>Delete</th>
            <th>Approved</th>
            <th>UnApproved</th>
        </tr>
    </thead>

    <tbody>

        <?php

        $query = "SELECT * FROM comments";
        $select_comments_query = mysqli_query($connection, $query);

        while ($row = mysqli_fetch_assoc($select_comments_query)) {
            $comment_id =  $row['comment_id'];
            $comment_post_id =  $row['comment_post_id'];
            $comment_author =  $row['comment_author'];
            $comment_email =  $row['comment_email'];
            $comment_content=  $row['comment_content'];
            $comment_status =  $row['comment_status'];
            $comment_date =  $row['comment_date'];
            
            echo "<tr>";
            echo "<td>$comment_id</td>";
             echo "<td>$comment_author</td>";
            echo "<td>$comment_content </td>";
            
            // $query = "SELECT * FROM categories WHERE cat_id = comment_category_id";
            // $edit_categories_query = mysqli_query($connection, $query);
            
            // while ($row = mysqli_fetch_assoc($edit_categories_query)) {
                //     $cat_id =  $row['cat_id'];
                //     $cat_title =  $row['cat_title'];
                
                // echo "<td>{$cat_title}</td>";
                // }
                
                
            
            $query = "SELECT * FROM posts WHERE post_id = $comment_post_id";
            $select_post_id = mysqli_Query($connection,$query);

            while($row=mysqli_fetch_assoc($select_post_id)){
                $post_id  = $row['post_id'];
                $post_title = $row['post_title'];

                echo "<td><a href = '../post.php?p_id=$post_id'>$post_title</a></td>"; 
            }

            echo "<td>$comment_email</td>";
            echo "<td>$comment_date</td>";
            echo "<td>$comment_status</td>";
            echo "<td><a onClick=\"javascript: return confirm('Are you sure');\" href='comments.php?delete={$comment_id}'>Delete</td>";
            echo "<td><a onClick=\"javascript: return confirm('Are you sure');\" href='comments.php?unapprove={$comment_id}'>Unapproved</td>";
            echo "<td><a onClick=\"javascript: return confirm('Are you sure');\" href='comments.php?approve={$comment_id}'>Approved</td>";
            echo "</tr>";
        }
        ?>
    </tbody>
</table>


<?php delete_comment($post_id);
approve_comment();
unapprove_comment(); ?>