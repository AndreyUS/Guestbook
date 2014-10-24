<?
class Model_Main extends Model
{
    function __construct()
    {
        $this->db = new DataBase();
        session_start();
    }
    private function get_comments($from)
    {
        $i = 0;
        $rows_per_page = 10;
        $querty = mysql_query("SELECT * FROM comments ORDER BY id DESC LIMIT $from, $rows_per_page");
        while($row =  mysql_fetch_assoc($querty)) {
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
    public function get_data()
    {	
        return $this->get_comments(0);
    }
    public function get_page($page)
    {
        $from = ($page * 10) - 10;
        return $this->get_comments($from);
    }
    public function get_rows()
    {
         $res = mysql_query("SELECT count(*) FROM comments");
         $row = mysql_fetch_row($res);
         return $row[0];
    }
    public function add_comment()
    {
        if ($_POST['captcha'] == $_SESSION['keystring']) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $text  = strip_tags($_POST['text']); 
            $time = date("H:i:s");
            $date = date("Y-m-d");
            //data validation 
            if (!filter_var($name, FILTER_VALIDATE_REGEXP,
                array('options'=>array('regexp'=>'/^[a-zA-Z0-9]+$/')))
                || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            }
            mysql_query("INSERT INTO `comments` (`name`, `email`, `text`, `time`, `date`) 
            VALUES ('$name', '$email', '$text', '$time', '$date')");    
        }
        header('Location:'.Route::$path_to_script);
    }
}
?>