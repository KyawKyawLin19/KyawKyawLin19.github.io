<?php
include '../libs/database.php';
include '../libs/config.php';
include '../functions.php';

$db = new database();

$query = "SELECT * FROM posts";
// ORDER BY id ASC
$posts = $db->select($query);

$query = "SELECT * FROM categories";
// ORDER BY id ASC
$categories = $db->select($query);

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
          <a class="blog-nav-item pull-right" href="../index.php">View Blog</a>
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
        <?php
          if(isset($_GET['msg'])){
            echo "<div class='alert alert-success'>".$_GET['msg']."</div>";
          }
        ?>
        <table class="table table-striped">
          <tr align="center"> 
            <td colspan="4">
              <h1>Manage Posts:</h1>
            </td>
          </tr>
          <tr>
            <th>Post ID</th>
            <th>Post Title</th>
            <th>Post Author</th>
            <th>Post Date</th>
          </tr>
          <?php
            while($row = $posts->fetch_array()):
          ?>
          <tr>
            <td><?php echo $row["id"]?></td>
            <td><a href="edit_post.php?id=<?php echo $row['id'];?>"><?php echo $row["title"]?></a></td>
            <td><?php echo $row["author"]?></td>
            <td><?php echo formatdate($row["date"])?></td>
          </tr>
          <?php
            endwhile;
          ?>
        </table>


        <table class="table table-striped">
          <tr align="center"> 
            <td colspan="4">
              <h1>Manage Categories:</h1>
            </td>
          </tr>
          <tr>
            <th>Category ID</th>
            <th>Category Title</th>
          </tr>
          <?php
            while($row = $categories->fetch_array()):
          ?>
          <tr>
            <td><?php echo $row["id"]?></td>
            <td><a href="edit_category.php?id=<?php echo $row['id'];?>"><?php echo $row["title"]?></a></td>
          </tr>
          <?php
            endwhile;
          ?>
        </table>
