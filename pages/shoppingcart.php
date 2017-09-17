<div style="width:100%;">
    <div style="width:400px; float: left;">
		<h1>Shopping cart</h1>
		<table border = 1 style = 'text-align:center'>

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
				echo "<th><b>Product</b></th>";
				echo "<th><b>Price (SEK)</b></th>";
				echo "<th><b>Quantity</b></th>";
				foreach($rows as $row) {
					if($row['User'] == $username) {
						$price = $row['Price'];
						$quantity = $row['Quantity'];
						echo "<tr>";
						echo "<td>".$row['Product']."</td>";
						echo "<td>".$price."</td>";
						echo "<td>".$quantity."</td>";
						echo "</tr>";
						$total = $total + ($price * $quantity);
					}
				}
				echo "<br>", "Total cost: ", $total, " SEK", "<br>";
			}
			
			?>
		</table>
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
		<input type="submit" value="Make payment" name="pay" onclick="this.form.action='index.php?page=receipt'; this.form.submit()"/>
		</form>
		<br/><br/>
	</div>
</div>


