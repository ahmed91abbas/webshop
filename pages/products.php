<h1>Products</h1> 
<head>
<style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
</style>
</head>
<body>
    <table> 
        <tr> 
            <th>Name</th> 
            <th>Image</th> 
            <th>Price</th> 
			<th>Action</th>
        </tr> 
		<?php 		
		
		require 'connect.php';
		$sql = "SELECT * FROM products";
		$result = $db->query($sql);
		
		
		while($row = mysqli_fetch_array($result)) {
			$Name = $row['Name'];
			$Image = $row['Pic'];
			$Price = $row['Price'];
			echo "<tr><td>".$Name."</td>";
			echo "<td>*image*</td>";
			echo "<td>".$Price."</td>";
			echo "<td><form method=\"POST\" action=''><input type=\"submit\" value=\"Add to cart\" name=\"".$Name."\"/></form></td></td></tr>";
			if(isset($_POST[$Name])){
				if (isset($_SESSION['login'])) {
					$username = "$_SESSION[username]";
					$insert = $db->prepare("INSERT INTO shopping_cart(Product,Price,User,Quantity) VALUES('$Name', '$Price', '$username', 1) ON DUPLICATE KEY UPDATE Quantity = Quantity+1");
					$succ = $insert->execute();		
					if($succ){
						echo "$Name has been added to your cart";
					}else{
						echo "Error";
					}
				}else {
					echo "You need to sign in in order to add new products to your cart!";
				}
			}
		}
?>

    </table>
</body>
