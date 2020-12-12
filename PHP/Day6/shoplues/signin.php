<?php
	require 'db_connect.php';
	session_start();

	$email = $_POST['email'];
	$password = $_POST['password'];

	//$sql = 'SELECT * FROM users WHERE email=:value1 and password=:value2';

	$sql = 'SELECT users.*, model_has_roles.role_id,roles.name as rolename
			FROM users
			INNER JOIN model_has_roles
			ON users.id=model_has_roles.user_id
			INNER JOIN roles
			ON model_has_roles.role_id =roles.id
			WHERE email=:value1 AND password=:value2';

	$stmt=$conn->prepare($sql);
	$stmt->bindParam(':value1',$email);
	$stmt->bindParam(':value2',$password);

	$stmt->execute();
	$user=$stmt->fetch(PDO::FETCH_ASSOC);

	/*var_dump($user);die();*/

	//Wrong email or password
	if($stmt->rowCount() <= 0){//if row is not appear one row
		$_SESSION['login_fail']= "Your current email and password is invalid";

		header('location: login.php');
	}
	//success
	else{
		$_SESSION['login_user'] = $user;

		if($user['rolename']=='admin'){
			header('location: dashboard.php');
		}
		else{
			header('location: index.php');
		}
	}

?>