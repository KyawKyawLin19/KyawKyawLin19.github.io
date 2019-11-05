<?php
include '../libs/database.php';
include '../libs/config.php';
include '../functions.php';

$db = new database();
$query = "SELECT * FROM categories";

$cats = $db->select($query);

if(isset($_POST['submit'])){
    $title = mysqli_real_escape_string($db->link,$_POST['title']);
    $content = mysqli_real_escape_string($db->link,$_POST['content']);
    $author = mysqli_real_escape_string($db->link,$_POST['author']);
    $tags = mysqli_real_escape_string($db->link,$_POST['tags']);
    $cat = mysqli_real_escape_string($db->link,$_POST['cat']);

    if($title == '' || $content =="" || $author="" || $tags == "" || $cat == ""){
      echo "Please fill All Fields";
    }else{
      $query = "INSERT INTO posts(category,title,content,author,tags) VALUES('$cat','$title','$content','$author','$tags')";
      $result = $db->insert($query);
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

      <div class="row">

        <div class="col-sm-12 blog-main">
        <br>
        <h2>Insert New Post:</h2><hr>
        <form action="add_post.php" method="post">
          <div class="form-group">
            <label>Post Title:</label>
            <input type="text" name="title" class="form-control" placeholder="Enter Title">
          </div>
          <div class="form-group">
            <label>Content</label>
            <textarea name="content" class="form-control" placeholder="Enter content" rows="5"></textarea>
          </div>
          <select name="cat" class="form-control">
            <option>Select a Category</option>
            <?php while($row = $cats->fetch_array()):?>
            <option value="<?php echo $row['id']; ?>"><?php echo $row['title'];?></option>
            <?php endwhile?>
          </select>
          <div class="form-group">
            <label>Author Name:</label>
            <input type="text" name="author" class="form-control" placeholder="Enter author name">
          </div>
          <div class="form-group">
            <label>Tags:</label>
            <input type="text" name="tags" class="form-control" placeholder="Enter Tags">
          </div>
          <button type="submit" name="submit" class="btn btn-success">Submit</button>
          <a href="index.php" class="btn btn-danger">Cancel</a>
        </form>
