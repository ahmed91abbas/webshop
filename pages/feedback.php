<div class="center">
<h1>Customers feedback</h1>
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
<body>
<table>
<tr> 
<th></th>
</tr> 
<?php
require 'connect.php';

if(isset($_POST['feedback'])) {
	$text = $_POST['feedback_field'];
	if($text != "") {
		$sql = "INSERT INTO feedback (Feedback) VALUES('".$text."')"; 
		$db->query($sql);
	}
}

if($result = $db->query("SELECT * FROM feedback")){
	$rows = $result->fetch_all(MYSQLI_ASSOC);
	foreach($rows as $row) {
		echo "<tr><td>";
		echo "".$row['Feedback']."";
		echo "</td></tr>";
	}
}

?>
</table>

<form method="POST">
<br/><br/><input type="text" name="feedback_field" size="25" style="height:50px; width:600px"><br/><br/>
<input type="submit" value="Submit feedback" name="feedback" style="height:40px; width:125px" >
<br/><br/>
</form>

</div>