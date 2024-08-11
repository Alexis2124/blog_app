<?php

define("DBNAME","blog_app");
define("DBUSER","root");
define("DBPASS","");

try{
	
	
	
$conn=new PDO("mysql:host=localhost;dbname=".DBNAME,DBUSER,DBPASS);

$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
	echo $e->getmessage();
}



if(isset($_POST['submit'])){
	
	$error=array();
	
	if(empty($_POST['fullname'])){
	$error[]="please enter fullname";
	}else{
		$fullname=$_POST['fullname'];
		}
	
	if(empty($_POST['email'])){
		$error[]="please enter email";
		}else{
			$email=$_POST['email'];
			}
			
		if(empty($_POST['password'])){
			$error[]="please enter password";
		}else{
			$password=$_POST['password'];
			}
	
	     if(empty($_POST['confirm_password'])){
			 $error[]="please confirm password";
		 }elseif($_POST['confirm_password']!==$_POST['password']){
			 $error[]="password mismatch";
			 }else{
				 $confirm_password=$_POST['confirm_password'];
				 }
			 
			if(empty($error)){
				
				
				$encrypted=password_hash($password,PASSWORD_BCRYPT);
	//			var_dump($encrypted);
		//		die();
			
	$statement=$conn->prepare("INSERT INTO users VALUES(NULL,:nm,:em,:ps,NOW(),NOW())");
	$statement->bindparam(":nm",$fullname);
	$statement->bindparam(":em",$email);
	$statement->bindparam(":ps",$encrypted);
	$statement->execute();
			
			
				header("location:user_signup.php?message=Dear $fullname you have succesfully registered and a confirmation email would be sent to $email");
				echo "All done";
			}else{
				foreach($error as $key=>$value){
					echo $value."<br>";}
					}
			
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	}





















?>