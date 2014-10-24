<?
class Controller_Admin extends Controller
{
	function __construct()
    {
        $this->model = new Model_Admin();
        $this->view = new View();
    }
	function action_index()
	{
		$this->model->get_data();
		$this->view->generate('admin_view.php', 'template_view.php');
	}
	function action_list()
	{
		$data = $this->model->show_list();
		$this->view->generate('list_view.php', 'template_view.php', $data);
	}
	function action_edit($id)
	{
		$data = $this->model->get_comment($id);
		$this->view->generate('edit_view.php', 'template_view.php', $data);
	}
	function action_save()
	{
		$this->model->save_comment();
	}
	function action_delete($id)
	{
		$this->model->delete_comment($id);
	}
	function action_logout()
	{
		$this->model->logout();
	}
}
?>