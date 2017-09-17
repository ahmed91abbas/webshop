<div style="width:100%; border:5px solid #dadada;">
    <div style="width:400px; float: left;">
		<h1>Shopping cart</h1>
		<?php
		require 'connect.php';
		if($result = $db->query("SELECT * FROM shopping_cart")){
			$rows = $result->fetch_all(MYSQLI_ASSOC);
			$total = 0;
			if(isset($_SESSION['login'])){
				$username = "$_SESSION[username]";
			} else {
				echo 'Please sign in to proceed';
				die();
			}
			foreach($rows as $row) {
				if($row['User'] == $username) {
					$price = $row['Price'];
					$quantity = $row['Quantity'];
					echo $row['Product'], ' ', $price, ' ', $quantity, '<br>';
					$total = $total + ($price * $quantity);
				}
			}
			echo '_____________________________', '<br>';
			echo 'Total: ', $total, '<br>';
		}
		
		?>
	
	</div>
    <div style="width:400px; float: right;">
		<h1>Payment</h1>
		<form method="POST" action="index.php?page=shoppingcart">
		Card number:<br/>
		<input type="text" name="cardnumber" size="25"/><br/>
		Name on card:<br/>
		<input type="text" name="nameoncard" size="25"/><br/>
		Valid to:<br/>
		<input type="text" name="validto" size="25"/><br/><br/>
		<input type="submit" value="Make payment" name="pay"/>
		</form>
		<br/><br/>
	</div>
</div>


