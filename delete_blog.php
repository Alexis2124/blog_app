<?php
session_start();
include "authenticate.php";
include "db.php";
if(!isset($_GET['id'])){
	header("location:manage_blog.php");
	exit();
	}
	$statement=$conn->prepare("DELETE FROM blog WHERE blog_id=:bid");
	$statement->bindparam(":bid",$_GET['id']);
	$statement->execute();
	
	header("location:manage_blog.php");
	exit();
	
	
	?>