<?php 
include "server.php";

// if the form's update button is clicked, we need to process the form
	if (isset($_POST['update'])) {
		$Код_фахівця = $_POST['Код_фахівця'];
		$Код_Клієнта = $_POST['Код_Клієнта'];
		$Дата_Ремонта = $_POST['Дата_Ремонта'];
		$Тривалість_Ремонта = $_POST['Тривалість_Ремонта'];
		$Вартість_Ремонта = $_POST['Вартість_Ремонта'];
		$Вид_Несправності = $_POST['Вид_Несправності'];
		$user_id = $_POST['user_id'];
		
		// write the update query
		$sql = "UPDATE `договір` SET `Код_фахівця`='$Код_фахівця',`Код_Клієнта`='$Код_Клієнта',`Дата_Ремонта`='$Дата_Ремонта',`Тривалість_Ремонта`='$Тривалість_Ремонта',`Вартість_Ремонта`='$Вартість_Ремонта',`Вид_Несправності`='$Вид_Несправності' WHERE `id`='$user_id'";

		// execute the query
		$result = $conn->query($sql);

		if ($result == TRUE) {
			header("location:index.php");
		}else{
			echo "Error:" . $sql . "<br>" . $conn->error;
		}
	}


// if the 'id' variable is set in the URL, we know that we need to edit a record
if (isset($_GET['id'])) {
	$user_id = $_GET['id'];

	// write SQL to get user data
	$sql = "SELECT * FROM `договір` WHERE `id`='$user_id'";

	//Execute the sql
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		
		while ($row = $result->fetch_assoc()) {
			$Код_фахівця = $row['Код_фахівця'];
			$Код_Клієнта = $row['Код_Клієнта'];
			$id = $row['id'];
			$Дата_Ремонта = $row['Дата_Ремонта'];
			$Тривалість_Ремонта = $row['Тривалість_Ремонта'];
			$Вартість_Ремонта = $row['Вартість_Ремонта'];
			$Вид_Несправності = $row['Вид_Несправності'];
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
    <legend>Договір</legend>
    <form method="post">
		<div class="input-group">
			<label>Код_фахівця</label>
			<input type="number" name="Код_фахівця" value="<?php echo $Код_фахівця; ?>">
			<input type="hidden" name="user_id" value="<?php echo $id; ?>">

		</div>
		<div class="input-group">
			<label>Код_Клієнта</label>
			<input type="number" name="Код_Клієнта" value="<?php echo $Код_Клієнта; ?>">
			
		</div>
		<div class="input-group">
			<label>Дата_Ремонта</label>
			<input type="datetime-local" name="Дата_Ремонта" value="<?php echo $Дата_Ремонта; ?>">
			
		</div>
		<div class="input-group">
			<label>Тривалість_Ремонта</label>
			<input type="text" name="Тривалість_Ремонта" value="<?php echo $Тривалість_Ремонта; ?>">
			
		</div>
		<div class="input-group">
			<label>Вартість_Ремонта</label>
			<input type="number" name="Вартість_Ремонта" value="<?php echo $Вартість_Ремонта; ?>">
			
		</div>
		<div class="input-group">
			<label>Вид_Несправності</label>
			<input type="text" name="Вид_Несправності" value="<?php echo $Вид_Несправності; ?>">
		</div>
		<div class="input-group">
			<button style=" background-color: #4CAF50; /* зеленый */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;" type="submit" value="Update" name="update">Оновити</button>
		</div>
	</form>
  </fieldset>
</form>
		</body>
		</html>
	<?php
	} else{
		// If the 'id' value is not valid, redirect the user back to view.php page
		header('Location: index.php');
	}

}
?>
