<?php
session_start();
include 'authenticate.php';
include 'db.php';

if(isset($_POST['submit'])){
	
	$error=array();
	if(empty($_POST['title'])){
		$error['title']="Enter Title";
		}
	if(empty($_POST['author'])){
		$error['author']="Enter  author";
		}
	if(empty($_POST['category'])){
		$error['category']="Select category";
		}
		if(empty($_POST['body'])){
			$error['body']="Enter Text";
			}
	if(empty($error)){
		
		//var_dump($_POST);
		
		$stmt=$conn->prepare("INSERT INTO blog VALUES(NULL,:tt,:au,:cat,:bd,:cb,NOW(),NOW())");
		
		$data =array(
		":tt"=>$_POST['title'],
		":au"=>$_POST['author'],
		":cat"=>$_POST['category'],
		":bd"=>$_POST['body'],
		":cb"=>$_SESSION['id']
		);
		
		$stmt->execute($data);
		
		header("location:manage_blog.php");
		
		}
	}



?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Add blog</title>
</head>

<body>
<?php 
include 'header.php';


?>
<h5> create post</h5>
<form action="" method="post">
<input type="text" name="title" placeholder="Title" /><br />
<input type="text" name="author" placeholder="Author" /><br />

<?php
$stmt=$conn->prepare("SELECT * FROM category");
$stmt->execute();

echo "<select name='category'>";
while($row=$stmt->fetch(PDO::FETCH_BOTH)){
	echo "<option value='".$row['category_id']."'>".$row['category_name']."</option>";
	}
	echo"</select>";


?><br />

<textarea name="body"></textarea><br />
<input type="submit" name="submit" value="Publish" />
</form>

</body>
</html>