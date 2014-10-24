<div class="header">
	<div class="header-b">
		<h1>Список отзывов</h1>
	</div>
</div>
<br>
<?php
	if(empty($data)){
		echo "Нет новостей.<br>";
	} else {
		foreach($data as $comments) { ?>
<div class="body-text">
	<div class="body-text-b">
		Имя: <?php echo $comments['name']; ?> <br>
		E-mail: <?php echo $comments['email']; ?> <br>
		Отзыв: <?php echo $comments['text']; ?> <br>
		Добавлен: <?php echo $comments['date']; ?>
		в  <?php echo $comments['time']; ?> <br>
		<a href="<?php echo Route::$path_to_script.'/admin/delete/'.$comments['id']?>">Удалить</a><br>
		<a href="<?php echo Route::$path_to_script.'/admin/edit/'.$comments['id']?>">Редактировать</a><br>
	</div>
</div>
<br>
<?php }?>
<?php }?>
<a href="<?php echo Route::$path_to_script?>/admin">В админку</a>
