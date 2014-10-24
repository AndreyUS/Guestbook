<div class="header">
	<div class="header-b">
		<h1>Страница авторизации</h1>
	</div>
</div>
<div class="body-text">
	<div class="body-text-b">
		<p>
		<h3>Авторизация</h3>
		<form action="" method="post"><br>
			Логин:<br>
			<input type="text" name="login"><br>
			Пароль:<br>
			<input type="password" name="password"><br>
			<input type="submit" value="Войти"><br>
		</form>
		</p>
	<?php if($login_status=="access_denied") { ?>
	<p style="color:red">Логин и/или пароль введены неверно.</p>
	<?php } ?>
	</div>
</div>