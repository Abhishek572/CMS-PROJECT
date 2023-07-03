<!-- Blog Sidebar Widgets Column -->
<div class="col-md-4">



    <!-- Blog Search Well -->
    <div class="well">
        <h4>Blog Search</h4>
        <form action="search.php" method="post">
            <div class="input-group">
                <input name="search" type="text" class="form-control">
                <span class="input-group-btn">
                    <button name="submit" class="btn btn-default" type="submit">
                        <span class="glyphicon glyphicon-search"></span>
                    </button>
                </span>
            </div>
        </form>

<!-- login -->

        <div class="well" style ="margin-top:10px">
        <h4>Login Form</h4>
        <form action="includes/login.php" method="post">
            <div class="form-group">
                <label for="username">Username</label>
                <input name="username" type="text" class="form-control" placeholder="Enter Your Username">
            </div>

            <div class=" form-group">
                <label for="pswrd">Password</label>
                <input name="pswrd" type="password" class="form-control" placeholder="Enter Your Password">
                <span><a href="./registration.php">Don't have account?Create One</a></span><br>
                <span class="form-group-btn">
                    <button class="btn btn-primary" name = "login" value="Login" type="submit" style="margin-top: 15px;">Login</button>
                </span>
            </div>

        </form>








        <!-- /.input-group -->
    </div>

    <!-- Blog Categories Well -->
    <div class="well">
        <h4>Blog Categories</h4>
        <div class="row">
            <div class="col-lg-6">
                <ul class="list-unstyled">

                <!-- Same As NAv Bar -->
                <?php 
                    $query = "SELECT * FROM categories";
                    $select_all_categories_query = mysqli_query($connection,$query);

                    while ($row = mysqli_fetch_assoc($select_all_categories_query)) {
                        $cat_id =  $row['cat_id'];
                        $cat_title =  $row['cat_title'];

                       echo "<li><a href='category.php?category=$cat_id'>{$cat_title}</a></li>";

                    }
                    ?>
                    <!-- <li><a href="#">Category Name</a>
                    </li>
                    <li><a href="#">Category Name</a>
                    </li>
                    <li><a href="#">Category Name</a>
                    </li>
                    <li><a href="#">Category Name</a>
                    </li>
                </ul>
            </div>
            /.col-lg-6
            <div class="col-lg-6">
                <ul class="list-unstyled">
                    <li><a href="#">Category Name</a>
                    </li>
                    <li><a href="#">Category Name</a>
                    </li>
                    <li><a href="#">Category Name</a>
                    </li>
                    <li><a href="#">Category Name</a>
                    </li>
                </ul> -->
            </div>
            <!-- /.col-lg-6 -->
        </div>
        <!-- /.row -->
    </div>

    <!-- Side Widget Well -->
    <div class="well">
        <h4>Side Widget Well</h4>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
    </div>

</div>  