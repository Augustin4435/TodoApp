<?php 
require 'config.php';
if ($_POST) {
	
	$title = $_POST['title'];
	$desc = $_POST['description'];

	$sql = "INSERT INTO todo(title,description) VALUES (:title,:description)";
	
	$pdostatement = $pdo->prepare($sql);

	$result = $pdostatement->execute(
		array(
			':title'=>$title,
			':description'=>$desc
		)
	);

	if ($result) {
		echo "<script>alert('New Todo is added');window.location.href='index.php'</script>";
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Create New</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
	<style type="text/css">
		.card {
			width: 800px;
			margin-left: auto;
			margin-right: auto;
			margin-top: 20px;
		}
	</style>
</head>
<body>
	<div class="card">
		<div class="card-body">
			<h2>Create New Record</h2>
			<form class="" action="add.php" method="post">
				<div class="form-group">
					<label for="title">Title</label>
					<input type="text" name="title" class="form-control" value="" required>
				</div>
				<div class="form-group">
					<label for="description">Description</label>
					<textarea name="description" class="form-control" rows="8" cols="80"></textarea>
				</div><br>
				<div class="form-group">
					<input type="submit" class="btn btn-primary" name="submit" value="Submit">
					<a href="index.php" class="btn btn-warning" type="button">Back</a>
				</div>
			</form>
		</div>
	</div>
</body>
</html>