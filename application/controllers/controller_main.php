<?
class Controller_Main extends Controller
{
	function __construct()
    {
        $this->model = new Model_Main();
        $this->view = new View();
    }
    function action_index()
    {	
    	$data["data"] = $this->model->get_data();
        $data["total_rows"] = $this->model->get_rows();
        $this->view->generate('main_view.php', 'template_view.php', $data);
    }
    function action_page($page)
    {
        $data["data"] = $this->model->get_page($page);
        $data["total_rows"] = $this->model->get_rows();
        $this->view->generate('main_view.php', 'template_view.php', $data);
    }
    function action_add()
    {
         $this->model->add_comment();
         $this->action_index();
    }
    function action_404()
    {
        $this->view->generate('404_view.php', 'template_view.php');
    }
}
?>