<?php 
include "server.php";

// if the form's submit button is clicked, we need to process the form
	if (isset($_POST['submit'])) {
		// get variables from the form
		$Код_фахівця = $_POST['Код_фахівця'];
		$Код_Клієнта = $_POST['Код_Клієнта'];
		$Дата_Ремонта = $_POST['Дата_Ремонта'];
		$Тривалість_Ремонта = $_POST['Тривалість_Ремонта'];
		$Вартість_Ремонта = $_POST['Вартість_Ремонта'];
		$Вид_Несправності = $_POST['Вид_Несправності'];

		//write sql query

		$sql = "INSERT INTO `договір`(`Код_фахівця`,`Код_Клієнта`,`Дата_Ремонта`,`Тривалість_Ремонта`,`Вартість_Ремонта`,`Вид_Несправності`) VALUES ('$Код_фахівця','$Код_Клієнта','$Дата_Ремонта','$Тривалість_Ремонта','$Вартість_Ремонта','$Вид_Несправності')";

		// execute the query

		$result = $conn->query($sql);

		if ($result == TRUE) {
			header("location:index.php");
		}else{
			echo "Error:". $sql . "<br>". $conn->error;
		}

		$conn->close();

	}



?>

<!DOCTYPE html>
<html>
<body>
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>


<form action="" method="POST">
  <fieldset>
    <legend>Договір:</legend>
    <form method="post">
		<div class="input-group">
			<label>Код_фахівця</label>
			<input type="number" name="Код_фахівця">

		</div>
		<div class="input-group">
			<label>Код_Клієнта</label>
			<input type="number" name="Код_Клієнта">

		</div>
		<div class="input-group">
			<label>Дата_Ремонта</label>
			<input type="datetime-local" name="Дата_Ремонта">
			
		</div>
		<div class="input-group">
			<label>Тривалість_Ремонта</label>
			<input type="text" name="Тривалість_Ремонта">
			
		</div>
		<div class="input-group">
			<label>Вартість_Ремонта</label>
			<input type="number" name="Вартість_Ремонта">
			
		</div>
		<div class="input-group">
			<label>Вид_Несправності</label>
			<input type="text" name="Вид_Несправності">
			
		</div>
		<div class="input-group">
			<button type="submit" name="submit"  class="btn">Створити</button>
		</div>
	</form>
  </fieldset>
</form>

</body>
</html>