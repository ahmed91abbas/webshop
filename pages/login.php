<div class="center">
<h1>Sign in</h1>
<br/>

<form method="POST" action="../webshop/index.php?page=login">
Username:<br/>
<input type="text" name="username" size="25" autofocus /><br/>
Password:<br/>
<input type="password" name="password" size="25" /><br/><br/>
<input type="submit" value="Sign in" name="loggin" />
</form>
<br/><br/>


<?php 
if(isset($_POST['username'])){
	if(empty($_POST['username']) || empty($_POST['password'])){
		echo "Please enter all fields";
	}else{
		include_once('db.inc.php');

		$user = $_POST['username'];
		$pwd = $_POST['password'];

		$stmt = $db->prepare("SELECT * FROM users WHERE Username = ? AND Password = ?");
		$stmt->execute(array($user,$pwd));

		if($stmt->rowCount() == 1){
			$row = $stmt->fetch(PDO::FETCH_ASSOC);
			
			
			$_SESSION['username'] = $row['Username'];
			$_SESSION['login'] = true;
			
			header("Location: index.php");
			
		}else{
			echo "Wrong username or password";
		}
	}
}
?>
</div>