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
			echo "<tr><td style='width: 200px;'>".$Name."</td><td style='width: 600px;'>*image*</td><td>".$Price."</td><td><a href=\"#\">Add to cart</a></td>\"</td></tr>";
		} 

		echo "</table>";
  
?>

    </table>
</body>
