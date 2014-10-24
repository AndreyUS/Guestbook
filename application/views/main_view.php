<div class="header">
	<div class="header-b">
		<h1>Гостевая книга</h1>
	</div>
</div>
<br>
<div class="body-text">
	<div class="body-text-b">
		<h3>Список отзывов:</h3>
	</div>
</div>
<p>
<?php
	if(empty($data)){
		echo "Отзывов нет.<br>";
	} else {
		foreach($data as $comments) {
?>
<div class="body-text">
	<div class="body-text-b">
		<b> Имя: </b> <?php echo $comments['name']; ?> <br>
		<b> E-mail: </b> <?php echo $comments['email']; ?> <br>
		<b> Отзыв:</b> <br>
		<?php echo $comments['text']; ?> <br>
		<small> <b> Добавлен: </b> <?php echo $comments['date']; ?>
 		в <?php echo $comments['time']; ?> <br></small>
	</div>
</div>
<br>
<?php }?>
<?php }?>
<?php 	
	$total_pages = ceil($total_rows / 10);
	for ($i=1; $i<= $total_pages; $i++) {
?>
<a href="<?php echo Route::$path_to_script.'/main/page/'. $i?>"><?php echo $i;}?></a>  
<div class="body-text">
	<div class="body-text-b">  		
	<form action="<?php echo Route::$path_to_script?>/main/add" method="post">
		Имя (цифры и буквы латинского алфавита)*: <br>
		<input type="text" name = "name" required> <br>
		E-mail*:<br>
		<input type="email" name = "email" required> <br>
		Отзыв*: <br>
		<textarea cols="50" rows="10" name="text" required></textarea> <br>
		<?php require './application/core/captcha.php';?> <br>
		Введите число на картинке*:<br>
		<input type="text" name = "captcha" size = "10"> 
		<input type="submit" value="Отправить"> <br>
		<small>Поля отмеченные звездочкой(*) обязательны для заполнения.</small>
	</form>
	</div>
</div>
</p>