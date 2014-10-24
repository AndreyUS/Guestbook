<?
class Route
{
    public static $path_to_script = "http://localhost/guestbook"; //path to script. Without / in end.
    static function start()
    {
        $dephth = 1; // script level of nesting.For example: , http://site.ru - 0, http://site.ru/folder - 1
        // default controller and action
        $controller_name = 'Main';
        $action_name = 'index';
        $routes = explode('/', $_SERVER['REQUEST_URI']);
        // get controller name
        if ( !empty($routes[$dephth + 1]) ) {	
            $controller_name = $routes[$dephth + 1]; 
        }
        // get action name
        if ( !empty($routes[$dephth + 2]) ) {
            $action_name = $routes[$dephth + 2];
        }

        // add prefixes
        $model_name = 'Model_'.$controller_name;
        $controller_name = 'Controller_'.$controller_name;
        $action_name = 'action_'.$action_name;
        // get model class
        $model_file = strtolower($model_name).'.php';
        $model_path = "application/models/".$model_file;
        if(file_exists($model_path)) {
            include "application/models/".$model_file;
        }

        // get controller class
        $controller_file = strtolower($controller_name).'.php';
        $controller_path = "application/controllers/".$controller_file;
        if(file_exists($controller_path)) {
            include "application/controllers/".$controller_file;
        } else {
            Route::ErrorPage404();
        }
        
        // create controller
        $controller = new $controller_name;
        $action = $action_name;
        
        if(method_exists($controller, $action)) {
            // call controller action
            if(count($routes) > $dephth + 3) {
                $controller->$action($routes[$dephth + 3]);
            } else {
                $controller->$action();
            }
            
        }
        else {
            Route::ErrorPage404();
        }
    }
    
    function ErrorPage404()
    {
        $host = 'http://'.$path_to_script.'';
        header('HTTP/1.1 404 Not Found');
        header("Status: 404 Not Found");
        header('Location:'.Route::$path_to_script.'/main/404');
    }
}
?>