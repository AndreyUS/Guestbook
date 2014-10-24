<?
class Model_Admin extends Model
{
	function __construct()
    {
        session_start();
        $this->db = new DataBase();
    }
    //check user session 
    public function get_data()
    {
        if(empty($_SESSION['login'])) {
            header('Location:'.Route::$path_to_script.'/login');
        } 
    }
    // return comments list
    public function show_list() 
    {   
        $querty = mysql_query("SELECT * FROM comments ORDER BY id");
        while($row =  mysql_fetch_assoc($querty))
        {
            $comments[$i]['id'] = $row['id'];
            $comments[$i]['name'] = $row['name'];
            $comments[$i]['email'] = $row['email'];
            $comments[$i]['text'] = $row['text'];
            $comments[$i]['time'] = $row['time'];
            $comments[$i]['date'] = $row['date'];
            $i++;
        }
        return $comments;
    }
    public function get_comment($id) 
    {
        $query = mysql_query("SELECT * FROM comments WHERE id = $id LIMIT 1");
        return mysql_fetch_assoc($query);
    }
    //update comment
    public function save_comment()
    {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $text = $_POST['text'];
        mysql_query("UPDATE comments SET name = '$name', email = '$email', text = '$text' WHERE id = '$id'");
        header('Location:'.Route::$path_to_script.'/admin/list');
    }
    public function delete_comment($id) 
    {
        mysql_query("DELETE FROM comments WHERE id='$id'");
        header('Location:'.Route::$path_to_script.'/admin/list');
    }
    public function logout()
    {
		session_destroy();
		header('Location:'.Route::$path_to_script);
    }
}
?>