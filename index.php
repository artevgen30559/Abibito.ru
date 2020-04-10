<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title>Abibito</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
		<link rel="stylesheet" href="style.css">
	</head>
	<body>
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
			<div class="container">
				<a class="navbar-brand" href="#">MySite</a>
				<div class="collapse navbar-collapse" id="navbarNav">
					<ul class="navbar-nav mr-auto">
						<li class="nav-item active">
							<a class="nav-link" href="#">Главная</a>
						</li>
						<li class="nav-item active">
							<a class="nav-link" href="articles.php">Объявления</a>
						</li>
					</ul>
					<?php if (isset($_SESSION['login'])) {?>
					<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Разместить объявление</button>
					<button id="logout" type="button" style="margin-left: 30px;" class="btn btn-danger">Выйти из аккаунта</button>
					<?php }?>
				</div>
			</div>
		</nav>
		<section class="profile">
			<div class="container">
				<div class="jumbotron">
					<h1 class="display-4">Abibito</h1>
					<p class="lead">Это простой пример блока с компонентом в стиле jumbotron для привлечения дополнительного внимания к содержанию или информации.</p>
					<hr class="my-4">
					<p>Использются служебные классы для типографики и расстояния содержимого в контейнере большего размера.</p>
				</div>
				<div class="row">
					<form id="register-form" class="register-form col-md-6" action="Register.php" method="POST">
						<h3>Registration</h3>
						<div class="form-group">
							<label for="exampleInputEmail1">Email address</label>
							<input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
							<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1">Password</label>
							<input type="password" name="password" class="form-control" id="exampleInputPassword1">
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1">Login</label>
							<input type="text" name="login" class="form-control" id="exampleInputPassword1">
						</div>
						<button type="submit" class="btn btn-primary">Register</button>
					</form>
					<form id="auth-form" class="auth-form col-md-6" action="Authorization.php" method="POST">
						<h3>Authorization</h3>
						<div class="form-group">
							<label for="exampleInputPassword1">Password</label>
							<input type="password" name="password" class="form-control" id="exampleInputPassword1">
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1">Login</label>
							<input type="text" name="login" class="form-control" id="exampleInputPassword1">
						</div>
						<button type="submit" class="btn btn-primary">Authorization</button>
					</form>
				</div>
			</div>
		</section>

		<dwiv class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Новое объявление</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form method="POST" id="create-article" action="CreateArticle.php">
						<div class="form-group">
							<label for="recipient-name" class="col-form-label">Название</label>
							<input type="text" name="title" class="form-control" id="recipient-name">
						</div>
						<div class="form-group">
							<label for="message-text" name="description" class="col-form-label">Описание</label>
							<textarea name="description" class="form-control" id="message-text"></textarea>
						</div>
						<select name="category" class="custom-select custom-select-sm">
							<option selected>Выберите категорию:</option>
							<option value="Техника">Техника</option>
							<option value="Автомобили">Автомобили</option>
							<option value="Услуги">Услуги</option>
						</select>
						<div class="custom-file" style="margin-top: 20px;">
							<input type="file" name="photo" class="custom-file-input" id="customFile">
							<label class="custom-file-label" for="customFile">Выберите фотографию</label>
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
					<button type="submit" form="create-article" class="btn btn-primary">Создать</button>
				</div>
				</div>
			</div>
		</div>
	</body>








	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	<script type="text/javascript" src="handler.js"></script>
</html>
