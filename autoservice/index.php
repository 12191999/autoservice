<?php 
include "server.php";

//write the query to get data from users table

$sql = "SELECT * FROM договір";

//execute the query

$result = $conn->query($sql);


?>

<!DOCTYPE html>
<html>
<head>

	 <!-- to make it looking good im using bootstrap -->
	 <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<h2>Договір</h2>
<table class="table">
	<thead>
		<tr>
		<th>id</th>
		<th>Код_фахівця</th>
		<th>Код_Клієнта</th>
		<th>Дата_Ремонта</th>
		<th>Тривалість_Ремонта</th>
		<th>Вартість_Ремонта</th>
		<th>Вид_Несправності</th>
	</tr>
	</thead>
	<tbody>	
		<?php
			if ($result->num_rows > 0) {
				//output data of each row
				while ($row = $result->fetch_assoc()) {
		?>

					<tr>
					<td><?php echo $row['id']; ?></td>
					<td><?php echo $row['Код_фахівця']; ?></td>
					<td><?php echo $row['Код_Клієнта']; ?></td>
					<td><?php echo $row['Дата_Ремонта']; ?></td>
					<td><?php echo $row['Тривалість_Ремонта']; ?></td>
					<td><?php echo $row['Вартість_Ремонта']; ?></td>
					<td><?php echo $row['Вид_Несправності']; ?></td>
					<td><a class="btn btn-info" href="update.php?id=<?php echo $row['id']; ?>">Редагувати</a>&nbsp;<a class="btn btn-danger" href="delete.php?id=<?php echo $row['id']; ?>">Видалити</a></td>
					</tr>	
					
		<?php		}
			}
		?>
	        	
	</tbody>
</table>
	</div>

</body>
</html>