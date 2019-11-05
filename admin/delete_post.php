<?php
include '../libs/database.php';
include '../libs/config.php';
include '../functions.php';

$db = new database();

$delete_id = $_GET['delete_id'];  

$query = "DELETE FROM posts WHERE id = '$delete_id'";

$delete = $db->delete($query);