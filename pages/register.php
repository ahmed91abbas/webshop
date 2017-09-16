<div class="center">
<h1>Register new user</h1><br/>
	
<form method="POST" action="index.php?page=register">
Username:<br/>
<input type="text" name="username" size="25" autofocus /><br/>
Password:<br/>
<input type="password" name="password" size="25"/><br/><br/><br/>


Address:<br/>
<input type="text" name="address" size="25"/><br/>
Zip/Postal code:<br/>
<input type="text" name="zipcode" size="25"/><br/>
City:<br/>
<input type="text" name="city" size="25"/><br/><br/>
<input type="submit" value="Create Account!" name="add"/>
</form>
<br/><br/>

<?php	
	
if(isset($_POST['username'])){
	
	if(empty($_POST['username']) || empty($_POST['password']) || empty($_POST['address']) || empty($_POST['zipcode']) || empty($_POST['city'])){
	    echo "Please enter all fields";
	}else{

		include_once('db.inc.php');
		$username = $_POST['username'];
		$password = $_POST['password'];
		$address = $_POST['address'];
		$zipcode = $_POST['zipcode'];
		$city = $_POST['city'];
		
		$stmt = $db->prepare("SELECT Username FROM users WHERE Username = ?");
		$stmt->execute(array($username));
		
		if($stmt->rowCount() == 1){
		    echo "User already exists";
		}else{
		    $saltedPW =  $password . $username;
		    
		    $hashedPW = hash('sha256', $saltedPW);
		    
            $stmt = $db->prepare("INSERT INTO users(Username,Password,Address,Zip,City) VALUES(?, ?, ?, ?, ?)");
            $test = $stmt->execute(array($username,$hashedPW,$address,$zipcode,$city));
			
            if($test == false){
    		  echo "Error";
            }else{
                header("Location: index.php?page=login");
            }		
	   }	
    }
}
?>
</div>