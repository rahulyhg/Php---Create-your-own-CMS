<?php include "includes/db.php" ?>
<?php include "includes/header.php" ?>
    <!-- Navigation -->
    <?php include "includes/navigation.php" ?>
       
        <!-- Page Content -->
<div class="container">

<div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">
<?php 

if (isset($_GET['p_id'])) {
    $the_post_id = $_GET['p_id'];
    $the_post_author = $_GET['author'];
}

$query = "SELECT * FROM posts WHERE post_author = '{$the_post_author}' ";
$select_all_posts_query = mysqli_query($connection, $query);

while ($row = mysqli_fetch_assoc($select_all_posts_query)) {

    $post_title = $row['post_title'];
    $post_author = $row['post_author'];
    $post_date = $row['post_date'];
    $post_image = $row['post_image'];
    $post_content = $row['post_content'];
    ?>

          <h1 class="my-4"><?php echo $the_post_author; ?>
            <small>'s posts</small>
          </h1>

          <!-- Blog Post -->
          <div class="card mb-4">
            <img class="card-img-top" src="images/<?php echo $post_image; ?>" alt="Card image cap">
            <div class="card-body">
              <h2 class="card-title"><?php echo $post_title ?></h2>
              <p class="card-text"><?php echo $post_content ?></p>
            </div>
            <div class="card-footer text-muted">
              Posted on <?php echo $post_date ?> by
              <a href="#"><?php echo $post_author ?></a>
            </div>
          </div>

<?php 
} ?><!-- end of while -->

<hr><!-- just a separator-->

        </div>
        <!-- /.col-md-8-->

        <!-- Sidebar Widgets Column -->

        <?php include "includes/sidebar.php" ?>

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->
<?php include "includes/footer.php" ?>