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
        $post_query_count = "SELECT * FROM posts";
        $find_count = mysqli_query($connection, $post_query_count);
        $count = mysqli_num_rows($find_count);
        $count = ceil($count/5);

        $query = "SELECT * FROM posts";
        $select_all_posts_query = mysqli_query($connection, $query);
        while ($row = mysqli_fetch_assoc($select_all_posts_query)) {
          $post_id = $row['post_id'];
          $post_title = $row['post_title'];
          $post_author = $row['post_author'];
          $post_date = $row['post_date'];
          $post_image = $row['post_image'];
          $post_content = substr($row['post_content'], 0, 150);
          $post_status = $row['post_status'];

          if ($post_status == 'published') {
         ?>
          <h1 class="my-4">Page Heading
            <small>Secondary Text</small>
          </h1>

          <!-- Blog Post -->
          <div class="card mb-4">
          <h1><?php $count; v ?></h1>
            <a href="post.php?p_id=<?php echo $post_id ?>">
              <img class="card-img-top img-responsive" src="images/<?php echo $post_image; ?>" alt="Card image cap">
            </a>
            <div class="card-body">
              <h2 class="card-title">
              <a href="post.php?p_id=<?php echo $post_id ?>"><?php echo $post_title ?></a>
              </h2>
              <p class="card-text"><?php echo $post_content ?></p>
              <a href="post.php?p_id=<?php echo $post_id ?>" class="btn btn-primary">Read More &rarr;</a>
            </div>
            <div class="card-footer text-muted">
              Posted on <?php echo $post_date ?> by
              <a href="author_posts.php?author=<?php echo $post_author; ?>&p_id=<?php echo $post_id; ?>"><?php echo $post_author ?></a>
            </div>
          </div>
      
      <?php 
    } } ?>

          <!-- Pagination for the moment we don't need it
          <ul class="pagination justify-content-center mb-4">
            <li class="page-item">
              <a class="page-link" href="#">&larr; Older</a>
            </li>
            <li class="page-item disabled">
              <a class="page-link" href="#">Newer &rarr;</a>
            </li>
          </ul> -->

        </div>









        <!-- Sidebar Widgets Column -->

        <?php include "includes/sidebar.php" ?>

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->
<?php include "includes/footer.php" ?>