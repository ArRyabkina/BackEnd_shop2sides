<?php $connect = mysqli_connect('127.0.0.1', 'root', '', 'ann_pn_17');
$query = mysqli_query($connect, 'SELECT * FROM shop'); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<img src="images/logo.png" class="logo-img w-25">
	<div class="p-4 bg-dark text-center insert-good col-12">
		<h3 class="text-white">Добавить товар</h3>
		<form action="insert.php" method="POST" enctype="multipart/form-data">
			<input type="text" name="name" placeholder="Напишите имя">
			<input type="text" name="price" placeholder="Укажите цену">
			<input type="file" name="img" class="text-white">
			<button class="btn btn-success">
				добавить
			</button>
		</form>
	</div>
	<div class="mx-auto col-6 goods">
		<div class="row">
			<?php 
				for ($i=0; $i < $query->num_rows; $i++) { 
				$res = $query->fetch_assoc();
			?>
				<div class="col-4 mt-3 box-games">
					<?php 
						echo '<img src="' .  $res['img'] . '" class="w-100">';
						echo '<h5>' . $res['name'] . '</h5>';
						echo '<p>' . $res['price'] . ' рублей' . '</p>'
					?>
					<div class="col-12">
						<div class="row">
							<form action="delete.php" method="POST">
								<?php 
									echo '<input name="id" type="hidden" value="' . $res['id'] . '">'
								 ?>
								<button class="btn btn-danger">
									delete
								</button>
							</form>
							<form action="update_1.php" method="POST" class="ml-3">
								<?php 
									echo '<input name="id" type="hidden" value="' . $res['id'] . '">'
								 ?>
								 <?php 
									echo '<input name="name" type="hidden" value="' . $res['name'] . '">'
								 ?>
								 <?php 
									echo '<input name="price" type="hidden" value="' . $res['price'] . '">'
								 ?>
								 <?php 
									echo '<input name="img" type="hidden" value="' . $res['img'] . '">'
								 ?>
								<button class="btn btn-warning">
									update
								</button>
							</form>
						 </div>
					</div>
				</div>
			<?php } ?>		
		</div>
	</div>
</body>
</html>