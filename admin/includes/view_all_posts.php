<?php
if(isset($_POST['checkBoxArray'])){
    
    foreach($_POST['checkBoxArray'] as $postValueId){
        $bulk_options = $_POST['bulk_options'];

        switch($bulk_options) {
            case 'published':
            $query = "UPDATE posts SET post_status = '{$bulk_options}' WHERE post_id = $postValueId ";
            $update_to_published_status = mysqli_query($connection, $query);
            confirm($update_to_published_status);
            break;

            case 'draft':
            $query = "UPDATE posts SET post_status = '{$bulk_options}' WHERE post_id = $postValueId ";
            $update_to_published_status = mysqli_query($connection, $query);
            confirm($update_to_published_status);
            break;

            case 'delete':
        $query = "DELETE FROM posts WHERE post_id = {$postValueId}";
            $update_to_delete_status= mysqli_query($connection, $query);
            confirm($update_to_delete_status);
            break;

            case 'clone':
            $query = "SELECT * FROM posts WHERE post_id = {$postValueId} ";
            $select_posts_query = mysqli_query($connection, $query);
            
            while ($row = mysqli_fetch_assoc($select_posts_query)) {
                $post_category_id = $row['post_category_id'];
                $post_title = $row['post_title'];
                $post_author = $row['post_author'];
                $post_date = $row['post_date'];
                $post_image = $row['post_image'];
                $post_content = $row['post_content'];
                $post_tags = $row['post_tags'];
                $post_status = $row['post_status'];
                $post_comment_count = $row['post_comment_count'];
            }

                   
                $query = "INSERT INTO posts(post_category_id, post_title, post_author, post_date, post_image, post_content,
                post_tags, post_comment_count, post_status) ";
                $query .= "VALUES({$post_category_id},'{$post_title}','{$post_author}',now(), '{$post_image}','{$post_content}',
                '{$post_tags}','{$post_comment_count}','{$post_status}')";
                
                $copy_query = mysqli_query($connection, $query);      
                confirm($copy_query);
                break;
        }
    }
}
  

?>
<form action="" method="post" class="">
    <table class="table table-bordered table-hover">
        <div id=" " class="col-xs-4 form-group">
            <select name="bulk_options" id="" class="form-control">
                <option value="">Select Option</option>
                <option value="published">Publish</option>
                <option value="draft">Draft</option>
                <option value="delete">Delete</option>
                <option value="clone">Duplicate</option>
            </select>
        </div>
        <div class="col-xs-4">
            <input type="submit" name="submit" class="btn btn-success" value="Apply">
            <a href="posts.php?source=add_post" class="btn btn-primary">Add New</a>
        </div>
    <thead>
        <tr>
            <th><input id="selectAllBoxes" type="checkbox"></th>
            <th>Id</th>
            <th>Author</th>
            <th>Title</th>
            <th>Category</th>
            <th>Status</th>
            <th>Image</th>
            <th>Tags</th>
            <th>Comments</th>
            <th>Date</th>
            <th>See the post</th>
            <th>Don't like it?</th>
            <th>Don't want it?</th>
            <th>Click to reset Views</th>
        </tr>
    </thead>
    <tbody>
<?php 

$query = "SELECT * FROM posts ORDER BY post_id DESC ";
$select_categories = mysqli_query($connection, $query);

while ($row = mysqli_fetch_assoc($select_categories)) {
    $post_id = $row['post_id'];
    $post_category_id = $row['post_category_id'];
    $post_title = $row['post_title'];
    $post_author = $row['post_author'];
    $post_date = $row['post_date'];
    $post_image = $row['post_image'];
    $post_content = $row['post_content'];
    $post_tags = $row['post_tags'];
    $post_comment_count = $row['post_comment_count'];
    $post_status = $row['post_status'];
    $post_views_count = $row['post_views_count'];

    echo "<tr>";
    echo "<td><input class='checkBoxes' id='' type='checkbox' name='checkBoxArray[]' value='$post_id'></td>";
    echo "<td>{$post_id}</td>";
    echo "<td>{$post_author}</td>";
    echo "<td>{$post_title}</td>"; 

$querya = "SELECT * FROM categories WHERE cat_id={$post_category_id}";
$select_categories_ida = mysqli_query($connection, $querya);

 confirm($select_categories_ida);

while($row = mysqli_fetch_assoc($select_categories_ida)) {
    $id = $row["cat_id"];
    $cat_title = $row["cat_title"];
    
    echo "<td>{$cat_title}</td>";
    } 

    echo "<td>{$post_status}</td>";
    echo "<td><img width='100' class='img-responsive' src='../images/{$post_image}' alt='image'></td>";
    echo "<td>{$post_tags}</td>";
    echo "<td>{$post_comment_count}</td>";
    echo "<td>{$post_date}</td>";
    echo "<td><a href='../post.php?p_id={$post_id}'>View</a></td>";
    echo "<td><a href='posts.php?source=edit_post&p_id={$post_id}'>Edit</a></td>";
    echo "<td><a onClick=\"javascript: return confirm('Are you sure that you want to delete this?'); \" href='posts.php?delete={$post_id}'>Delete</a></td>";
    echo "<td><a href ='posts.php?reset={$post_id}'>{$post_views_count}</a></td>";
    echo "</tr>";

}

?>

    </tbody>
</table>

<?php

if (isset($_GET['delete'])){
    $del_post_id = $_GET['delete'];
    
    $query1 = "DELETE FROM posts WHERE post_id={$del_post_id} ";
    $delete_query = mysqli_query($connection, $query1);
     header("Location: posts.php");
}

if (isset($_GET['reset'])){
    $reset_post_id = $_GET['reset'];
    
    $query = "UPDATE posts SET post_views_count = 0 WHERE post_id=" . mysqli_real_escape_string($connection, $_GET['reset']) . " ";
    $reset_query = mysqli_query($connection, $query);
     header("Location: posts.php");
}


?>