<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Гостевая книга</title>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
<link rel="stylesheet" type="text/css" href="<?php echo Route::$path_to_script?>/css/style.css">
</head>
<body>
	<div class="main-cont">
    <?php include 'application/views/'.$content_view; ?>
   <div class="copyrights">
      &copy; <?php echo date("Y");?>
    </div>
</body>
</html>