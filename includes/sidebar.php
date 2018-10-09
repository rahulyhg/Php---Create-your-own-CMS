<div class="col-md-4">

<!-- Search Widget -->
<div class="card my-4">
  <h5 class="card-header">Search</h5>
  <form action="search.php" method="post">
  <div class="card-body">
    <div class="input-group">
      <input name="search" type="text" class="form-control" placeholder="Search for...">
      <span class="input-group-btn">
        <button name="submit"class="btn btn-secondary" type="submit">Go!</button>
      </span>
    </div>
  </div>
  </form>
</div>
<!-- Login Widget -->
<div class="card my-4">
  <h5 class="card-header">Login</h5>
  <form action="includes/login.php" method="post">
  <div class="card-body">
    <div class="form-group">
      <input name="username" type="text" class="form-control" placeholder="Enter Username">
    </div>
    <div class="input-group">
      <input name="password" type="text" class="form-control" placeholder="Enter Password">
      <span class="input-group-btn">
        <button name="login" class="btn btn-primary" type="submit">Submit</button>
      </span>
    </div>
  </div>
  </form>
</div>
 <?php 

$query = "SELECT * FROM categories ";
$select_categories_sidebar = mysqli_query($connection, $query);


?>

<!-- Categories Widget -->
<div class="card my-4">
  <h5 class="card-header">Categories</h5>
  <div class="card-body">
    <div class="row">
      <div class="col-lg-6">
        <ul class="list-unstyled mb-0">
<?php
while ($row = mysqli_fetch_assoc($select_categories_sidebar)) {
  $cat_title = $row['cat_title'];
  $cat_id = $row['cat_id'];

  echo "<li><a href='category.php?category=$cat_id'>{$cat_title}</a></li>";

}
?>
        </ul>
      </div>
      <div class="col-lg-6">
        <ul class="list-unstyled mb-0">
          <li>
            <a href="#">later edit</a>
          </li>
          <li>
            <a href="#">later edit</a>
          </li>
          <li>
            <a href="#">later edit</a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</div>

<!-- Side Widget -->

<?php include "widget.php"?>


</div>