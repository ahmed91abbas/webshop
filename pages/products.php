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
			<th>Quantity</th>
        </tr> 
		<?php 		
		
		require 'connect.php';
		$sql = "SELECT * FROM products";
		if(isset($_POST['search'])){
			$search = $_POST['searchField'];
			if($search != "")
				$sql = "SELECT * FROM products WHERE Name='".$search."'";
		}
		$result = $db->query($sql);
			
		while($row = mysqli_fetch_array($result)) {
			$Name = $row['Name'];
			$Image = $row['Pic'];
			$Price = $row['Price'];
			echo "<tr><td>".$Name."</td>";
			echo "<td>*image*</td>";
			echo "<td>".$Price."</td>";
			echo "<td><form method=\"POST\">";
			echo "<input type= text name='".$Name.$Name."' size=3/>";
			echo "   ";
			echo "<input type=\"submit\" value=\"Add to cart\" name=\"".$Name."\"/></form></td></td></tr>";
			if(isset($_POST[$Name])){
				if (isset($_SESSION['login'])) {
					$username = "$_SESSION[username]";
					$quantity = $_POST[$Name.$Name];
					if (is_numeric($quantity)) {
						$sql1 = "SELECT * FROM shopping_cart WHERE User='$username' AND Product='$Name' LIMIT 1";
						$current_quantity = 0;
						if($result1 = $db->query($sql1)){
							if($value = $result1->fetch_object()){
								$current_quantity = $value->Quantity;	
							}
						}
						$sql = "INSERT INTO shopping_cart(Product,Price,User,Quantity) VALUES('$Name', '$Price', '$username', '$quantity') ON DUPLICATE KEY UPDATE Quantity = '".$quantity."'+'".$current_quantity."'";
						$insert = $db->prepare($sql);
						$succ = $insert->execute();		
						if($succ){
							echo "$Name has been added to your cart";
						}else{
							echo "Error";
						}
					} else {
						echo "Quantity must be a number!";
					}
				}else {
					echo "You need to sign in in order to add new products to your cart!";
				}
			}
		}
?>

    </table>
</body>
