<?php 
include "server.php";

//write the query to get data from users table

$sql = "SELECT * FROM ремонт";

//execute the query

$result = $conn->query($sql);


?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="style.css">

	<title>Основна</title>
</head>
<body style="background: url(img/fon.jpg);
background-size:100%;
-webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;">
	<header class="header">
		<div class="container">
			<div class="header_inner">
				<div class="header_logo">
					<img src="img/123-removebg-preview.png">
	</div>

<nav class="nav">
	<a style="color:#2F4F4F" class="nav_link" href="index.html">Головна</a>
	<a style="color: #2F4F4F" class="nav_link" href="poslugi.php">Послуги</a>
	<a style="color: #2F4F4F" class="nav_link" href="clients.html">Клієнтам</a>
	<a style="color:#2F4F4F" class="nav_link" href="pronas.html">Про нас</a>			
</nav>
      </div>

	<div class="container">
		<h2 style="text-align: center;color: black">Ціни на послуги СТО</h2>
<table style="width: 45%; margin: 15px auto;border-collapse: collapse;
	text-align: left;" class="table">
	<thead>
		<tr>
		
		
		<th style="; color:black;">Запчастини</th>
		<th style="; color:black;">Вартість</th>
		
	</thead>
	<tbody>	
		<?php
			if ($result->num_rows > 0) {
				//output data of each row
				while ($row = $result->fetch_assoc()) {
		?>

					<tr>
					<td style="background:#A9A9A9; color:black;"><?php echo $row['Запчастини']; ?></td>
					<td style="background:#808080; color:black;"><?php echo $row['Вартість']; ?></td>
					<td><a style="    background-color: #006400;
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;" class="btn btn-info" href="update.php?id=<?php echo $row['id']; ?>">Замовити</a>&nbsp;</td>
					</tr>	
					
		<?php		}
			}
		?>
	        	
	</tbody>
	<?php
$sql = "SELECT * FROM договір";

//execute the query

$result = $conn->query($sql);

	?>

	<tbody>
		<?php
			if ($result->num_rows > 0) {
				//output data of each row
				while ($row = $result->fetch_assoc()) {
		?>

					<tr>
					<td style="background: #A9A9A9; color:black;"><?php echo $row['Вид_Несправності']; ?></td>
					<td style="background:#808080; color:black;"><?php echo $row['Вартість_Ремонта']; ?></td>
					<td><a style="    background-color: #006400;
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;" class="btn btn-info" href="update.php?id=<?php echo $row['id']; ?>">Замовити</a>&nbsp;</td>
					</tr>	
					
		<?php		}
			}
		?>
	</tbody>
</table>
	</div>

</body>
</html>