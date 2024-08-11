
<?php
if(!isset($_SESSION['id'])&& !isset($_SESSION['name'])){
	header("location:login.php?error=you are not logged in. This page requires a login access");
	}
$categories=$conn ->prepare("SELECT * FROM category");
$categories->execute();
$categories_records=array();

while($category_row=$categories->fetch(PDO::FETCH_BOTH)){
	
	$category_records[]=$category_row;
	}

?>
<a href="Home.php">Home</a>

<?php
foreach($category_records as $value):

?>

<a href="blog_category.php?category_id=<?=$value['category_id']?>"><?=$value['category_name']?></a>
<?php

 endforeach;
?>
<a href="logout.php">Logout</a>

<?php
echo "ID: ".$_SESSION['id']."<br>";
echo "NAME: ".$_SESSION['name'];


?>