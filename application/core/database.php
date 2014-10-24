<?
class DataBase
{
	//DB configuration
    function __construct()
	{
	    $host ="localhost";
		$database="guestbook";
		$user="root";
		$password="123456";
		$connect_db=mysql_connect($host,$user,$password) or die ("Ошибка подключения к базе данных");
		mysql_query('SET NAMES "utf8"');
		mysql_select_db($database);
	}
}
	?>