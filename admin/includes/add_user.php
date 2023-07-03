<form acion="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="user_username">Username</label>
        <input type="text" name="user_username" class="form-control">
    </div>

    <div class="form-group">
        <label for="user_fname">Firstname</label>
        <input type="text" name="user_fname" class="form-control">
    </div>


    <div class="form-group">
        <label for="user_lname">Lastname</label><br>
        <input type="text" name="user_lname" class="form-control">
    </div>
    
    <div class="form-group">
        <label for="user_email">Email</label>
        <input type="mail" name="user_email" class="form-control">
    </div>

    <div class="form-group">
        <label for="user_pswrd">Password</label><br>
        <input type="password" name="user_pswrd" class="form-control">
    </div>

    <div class="form-group">
        <label for="user_image">User Image</label>
        <input type="file" name="user_image" class="form-control">
    </div>

    <!-- <div class="form-group">
        <label for="user_role">Role</label>
        <input type="text" name="user_tags" class="form-control">
    </div> -->
    <div class="form-group">
        <label for="user_role">Select role</label><br>
        <select name="user_role" id="">
            <option value="">Select Option</option>
            <option value="Subscriber">Subscriber</option>
            <option value="Admin">Admin</option>
        </select>
    </div>



    <div class="form-group">
        <input class="btn btn-primary" type="submit" value="Create User" name="add_user">
    </div>
</form>

<?php add_user();?>