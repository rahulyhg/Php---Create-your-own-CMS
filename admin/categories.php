<?php include "includes/admin_header.php" ?>
        <!-- Navigation -->
<?php include "includes/admin_navigation.php" ?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Welcome to admin
                        <small>Author</small>
                    </h1>

                    <div class="col-xs-6">

                        <?php //ADD CATEGORY
                            insert_categories();
                        ?>

                    <form action="" method="post">
                        <div class="form-group">
                            <label for="cat_title">Add category</label>
                            <input class="form-control"type="text" name="cat_title">
                        </div>
                        <div class="form-group">
                            <input class="btn btn-primary"type="submit" name="submit" value="Add category">
                        </div>
                    </form>

                        <?php //UPDATE AND INCLUDE QUERY
                        if(isset($_GET['edit'])) {
                            $cat_id = $_GET['edit'];

                            include "includes/update_categories.php";
                        }
                        ?>

                    </div><!-- Add category form -->


                    <div class="col-xs-6">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <td>Id</td>
                                    <td>Category title</td>
                                </tr>
                            </thead>
                            <tbody>

                            <?php //FIND ALL CATEGORIES QUERY
                            findAllCategories();
                            ?>

                            <?php //DELETE CATEGORIES QUERY
                            deleteCategories();
                            ?>

                            </tbody>
                        </table>
                    </div>

                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->
<?php include "includes/admin_footer.php" ?>