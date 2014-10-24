<div class="header">
	<div class="header-b">
		<h1>Редактировать отзыв</h1>
	</div>
</div>
<br>
<div class="body-text">
	<div class="body-text-b">
	<p>
	<form action="<?php echo Route::$path_to_script?>/admin/save" method="post">
		<input type="hidden" name="id" value="<?php echo $data['id']?>">
		Имя: <br>
		<input type="text" size="50" name="name" value="<?php echo $data['name']?>"> <br>
		E-mail: <br>
		<input type="text" size="50" name="email" value="<?php echo $data['email']?>"> <br>
		Текст:<br> 
		<textarea cols="50" rows="10" name="text"><?php echo $data['text']?></textarea> <br>
		<input type="submit" value="Сохранить">
	</form>
	<a href="<?php echo Route::$path_to_script?>/admin/list">Список отзывов</a> <br>
	<a href="<?php echo Route::$path_to_script?>/admin">В админку</a>
	</p>
</div>
</div>