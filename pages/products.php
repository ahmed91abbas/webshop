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
		
		include_once('connect.php');
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
				$foo = 4;
				$user = 'Carl';
				$req = "INSERT INTO `shopping_cart`(`Product`, `Price`, `User`, `Quantity`) VALUES ($Name,$Price,$user,$foo)";
				$stmt = $db->query($req);
				if ($stmt === TRUE) {
					echo "New record created successfully";
				} else {
					echo "Error: " . $req . "<br>" . $db->error;
				}
			}
		} 			
		
?>

    </table>
</body>
