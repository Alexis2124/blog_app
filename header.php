
<p>ID: <?php echo $_SESSION{'admin_id'}?></p>
<P>Name: <?=ucwords($_SESSION['admin_name'])?></P>
<hr/>
<a href="create_category.php">Create category</a>
<a href="add_blog.php">Create Blog</a>
<a href="manage_blog.php">Manage Blog</a>
<a href="admin_logout.php">Logout</a>