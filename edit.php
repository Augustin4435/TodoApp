<?php 
require 'config.php';
if ($_POST) {
	$title = $_POST['title'];
	$desc = $_POST['description'];
	$id = $_POST['id'];

	$pdostatement = $pdo->prepare("UPDATE todo SET title='$title', description='$desc' WHERE id='$id' ");
	$result = $pdostatement->execute();

	if ($result) {
		echo "<script>alert('New Todo is upaded');window.location.href='index.php'</script>";
	}
} else {
	$pdostatement = $pdo->prepare("SELECT * FROM  todo where id=".$_GET['id']);
	$pdostatement->execute();
	$result = $pdostatement->fetchAll();
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit New</title>
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
			<h2>Edit New Record</h2>
			<form class="" action="" method="post">
				<input type="hidden" name="id" value="<?php echo $result['0']['id'] ?>">
				<div class="form-group">
					<label for="title">Title</label>
					<input type="text" name="title" class="form-control" value="<?php echo $result[0]['title'] ?>" required>
				</div>
				<div class="form-group">
					<label for="description">Description</label>
					<textarea name="description" class="form-control" rows="8" cols="80"><?php echo  $result[0]['description'] ?></textarea>
				</div><br>
				<div class="form-group">
					<input type="submit" class="btn btn-primary" name="submit" value="Update">
					<a href="index.php" class="btn btn-warning" type="button">Back</a>
				</div>
			</form>
		</div>
	</div>
</body>
</html>