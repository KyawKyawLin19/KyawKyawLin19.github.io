<?php
include '../libs/database.php';
include '../libs/config.php';
include '../functions.php';

$db = new database();

$cat_id = $_GET['id'];  

$query = "SELECT * FROM categories where id='$cat_id'";

$post = $db->select($query);

$single = $post->fetch_array();

if(isset($_POST['update'])){
    $cat = mysqli_real_escape_string($db->link,$_POST['cat_name']);
    if($cat == ''){ 
      echo "Please fill Category Name";
    }else{
      echo "<h1>HELLO</h1>";
      $query = "UPDATE categories SET title='$cat' WHERE id='$cat_id'";
      $result = $db->update($query);
    }
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
    <link rel="canonical" href="https://getbootstrap.com/docs/3.4/examples/blog/">

    <title>Admin Panel</title>

    <!-- Bootstrap core CSS -->
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="../bootstrap/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../bootstrap/blog.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="blog-masthead">
      <div class="container">
        <nav class="blog-nav">
          <a class="blog-nav-item active" href="index.php">Dashboard</a>
          <a class="blog-nav-item" href="add_post.php">Add Post</a>
          <a class="blog-nav-item" href="add_category.php">Add Category</a>
          <a class="blog-nav-item pull-right" href="localhost/blog.php">View Blog</a>
          <a class="blog-nav-item pull-right" href="logout.php  ">Logout</a>
        </nav>
      </div>
    </div>

    <div class="container">
    <br>
      <!-- <div class="blog-header">
        <h1 class="blog-title">Admin Panel</h1>
      </div> -->

      <div class="row">

        <div class="col-sm-12 blog-main">
        <br>
        <h2>Insert New Category:</h2><hr>
        <form action="edit_category.php?id=<?php echo $cat_id;?>" method="post">
          <div class="form-group">
            <label>Category Name:</label>
            <input type="text" name="cat_name" class="form-control" placeholder="Enter Category" value="<?php echo $single['title'];?>">
          </div>
          <button type="submit" name="update" class="btn btn-success">Update Category</button>
          <a href="index.php" class="btn btn-primary">Cancel</a>
          <a href="delete_category.php?delete_id=<?php echo $cat_id?>" class="btn btn-danger">Delete</a>
        </form>
