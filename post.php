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

  $views_count = "UPDATE posts SET post_views_count = post_views_count + 1 ";
  $views_count.= "WHERE post_id = $the_post_id ";
  $send_query = mysqli_query($connection, $views_count);
  confirm($send_query);

$query = "SELECT * FROM posts WHERE post_id = $the_post_id ";
$select_all_posts_query = mysqli_query($connection, $query);

while ($row = mysqli_fetch_assoc($select_all_posts_query)) {

  $post_title = $row['post_title'];
  $post_author = $row['post_author'];
  $post_date = $row['post_date'];
  $post_image = $row['post_image'];
  $post_content = $row['post_content'];
  ?>

          <h1 class="my-4">Page Heading
            <small>Secondary Text</small>
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

<?php } 

} else {

  header("Location: index.php");
}?><!-- end of while -->

<hr><!-- just a separator-->

<?php 
if (isset($_POST['create_comment'])) {
  $the_post_id = $_GET['p_id'];

  $comment_author = $_POST['comment_author'];
  $comment_email = $_POST['comment_email'];
  $comment_content = $_POST['comment_content'];

  if(!empty($comment_author) && !empty($comment_email) && !empty($comment_content)) {
    $query = "INSERT INTO comments (comment_post_id, comment_author,  comment_email,  comment_content,  comment_status,  comment_date)";
    $query .= "VALUES ($the_post_id, '{$comment_author}',  '{$comment_email}',  '{$comment_content}',  'UNAPPROVED',  now())";

    $create_comment_query = mysqli_query($connection, $query);
    if (!$create_comment_query) {
      die('QUERY FAILED' . mysql_error($connection));
      

  $query_update_count = "UPDATE posts SET post_comment_count = post_comment_count + 1 ";
  $query_update_count.= "WHERE post_id = $the_post_id ";
  $update_post_comment_count = mysqli_query($connection, $query_update_count);
    if (!$update_post_comment_count) {
      die('QUERY FAILED' . mysql_error($connection));
    }

}
  } else {
    echo "<script>alert('Fields cannot be empty')</script>";
  }
}

?>
        <!-- Comments Form -->
          <div class="card my-4">
            <h5 class="card-header">Leave a Comment:</h5>
            <div class="card-body">
              <form action="" method="post">
                <div class="form-group">
                <label for="comment_author">Author</label>
                <input type="text" class="form-control" name="comment_author">
                </div>
                <div class="form-group">
                <label for="comment_email">Email</label>
                <input type="email" class="form-control" name="comment_email">
                </div>
                <div class="form-group">
                <label for="comment_content">Your comment</label>
                  <textarea class="form-control" rows="3" name="comment_content"></textarea>
                </div>
                <button type="submit" class="btn btn-primary" name="create_comment">Submit</button>
              </form>
            </div>
          </div>
<?php

$query = "SELECT * FROM comments WHERE comment_post_id = {$the_post_id} ";
$query .= "AND comment_status = 'approved' ";
$query .= "ORDER BY comment_id DESC ";
$select_comment_query = mysqli_query($connection, $query);

if (!$select_comment_query) {
  die('Query failed' . mysqli_error($connection));
}

while ($row = mysqli_fetch_assoc($select_comment_query)) {

  $comment_date = $row['comment_date'];
  $comment_content = $row['comment_content'];
  $comment_author = $row['comment_author'];
  ?>
          <!-- Single Comment -->
          <div class="media mb-4">
            <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
            <div class="media-body">
              <h5 class="mt-0"><?php echo $comment_author; ?>
                <small> <?php echo $comment_date; ?> </small>
              </h5>
              <?php echo $comment_content; ?>
            </div>
          </div>
<?php } ?><!-- end of while -->


        </div>
        <!-- /.col-md-8-->

        <!-- Sidebar Widgets Column -->

        <?php include "includes/sidebar.php" ?>

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->
<?php include "includes/footer.php" ?>