<div class="center">
<h1>Receipt</h1>
	<table style = 'text-align:center'>
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
					echo "<tr>";
					echo "<td>".$row['Product']."</td>";
					echo "<td>"."x".$quantity."</td>";
					echo "<td>"."Price: ".$price." kr"."</td>";
					echo "</tr>";
					$total = $total + ($price * $quantity);
				}
			}
			echo "<br>", "<b>",$username,"</b>", "<br>";
			echo "<br>", "<b>","Amount payed: ", $total, " SEK", "</b>", "<br>";
			echo "<br>", "Order details: ", "<br>";
		}
		
		?>
	</table>
</div>