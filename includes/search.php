
<?php 

if(isset($_POST['submit'])){

  $search = $_POST['search'];
  $query = "SELECT * FROM posts ";
  $query .= "WHERE post_tags LIKE '%$search%' ";

  $search_query = mysqli_query($connection, $query);
  if(!$search_query) {
    die("query failed". mysqli_error($connection));
  }

  $count = mysqli_num_rows($search_query);

  if($count == 0) {
    echo "<h1>no result</h1>";
  }
}

?>