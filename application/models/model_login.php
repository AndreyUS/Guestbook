<?
class Model_Login extends Model
{
	function __construct()
    {
        $this->db = new DataBase();
    }
    private static function check_text($text)
	{
		$text = stripslashes($text);
		return htmlspecialchars($text);
	}
	//authorization
	public function get_data()
	{	
		$login = $_POST['login'];
		$password = $_POST['password'];
		if(isset($login) && isset($password))
		{
			$login = Model_Login::check_text($login);
			$password = Model_Login::check_text($password);
			$password = md5($password);
			$query = mysql_query("SELECT password FROM users WHERE login = '$login'");
			$result = mysql_fetch_assoc($query);
			if(!empty($result)){
				if($result['password'] == $password)
				{
					session_start();
					$_SESSION['login'] = $login;
					header('Location:'.Route::$path_to_script.'/admin');
					return "access_granted";
				}
			}
			return "access_denied";
		} else {
			return "";
		}
		
	}

}
?>