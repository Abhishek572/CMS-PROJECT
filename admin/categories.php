<?php
include 'includes/header.php';
?>

<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="main.php">Admin</a>
        </div>
        <!-- Top Menu Items -->
        <?php
        include 'includes/TopMenu.php';
        ?>
        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
        <?php
        include 'includes/sidebar.php';
        ?>
        <!-- /.navbar-collapse -->
    </nav>

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Welcome To Admin
                        <small><?php echo $_SESSION['username'];?></small>
                    </h1>
                    <div class="col-xs-6">

                        <!-- Inserting Data Into The Table -->
                        <?php insert_into_categories();?>

                        <form acion="" method="post">
                            <div class="form-group">
                                <label for="cat-title">Category Title</label>
                                <input type="text" name="cat_title" class="form-control">
                            </div>

                            <div class="form-group">
                                <input class="btn btn-primary" type="submit" value="Add Category" name="submit">
                            </div>
                        </form>

                        <?php 

                        if (isset($_GET['edit'])) {
                            $cat_id = $_GET['edit'];

                            include 'includes/update_cat.php';
                             
                        }
                        
                        ?>

                    </div>

                    <div class="col-xs-6">
                        <table class="table table-bordered table-hover ">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Category</th>
                                </tr>
                            </thead>
                            <tbody>

                                <!-- Selecting All From The data Table -->
                                <?php finding_all_categories();?> 


                                <!-- Delete The data from Table -->
                                <?php delete_cat(); ?>

                            </tbody>
                        </table>

                    </div>
                </div>





            </div>
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->
<?php
include 'includes/footer.php';
?>