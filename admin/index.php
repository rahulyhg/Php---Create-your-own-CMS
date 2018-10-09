<?php include "includes/admin_header.php" ?>
        <!-- Navigation -->
<?php include "includes/admin_navigation.php" ?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Welcome to admin
                        <small><?php echo $_SESSION['username']; ?></small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
<?php include "includes/template_for_index_page.php" ?>
        </div>
        <!-- /#page-wrapper -->
        <!-- #qtransLangSwLM#?title=none -->
<?php include "includes/admin_footer.php" ?>