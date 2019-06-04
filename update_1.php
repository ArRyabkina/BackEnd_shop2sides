<?php $connect = mysqli_connect('127.0.0.1', 'root', '', 'ann_pn_17');
$query = mysqli_query($connect, 'SELECT * FROM shop'); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
	<div>
		<form action="update.php" method="POST" enctype="multipart/form-data">
			<?php
				echo '<input type="hidden" name="id" value="' . $_POST['id'] . '">';
				echo '<input type="text" name="name" value="' . $_POST['name'] . '" class="w-30">';
				echo '<input type="file" name="img">';
				echo '<input type="text" name="price" value="' . $_POST['price'] . '">';
			 ?>
			<button class="btn btn-success">
				Изменить
			</button>
		</form>	
	</div>
</body>
</html>