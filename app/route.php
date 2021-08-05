<?php

class Route
{
    public function run()
    {
        $server = explode('/', $_SERVER['REQUEST_URI']);
        if (count($server) == 3) {
            $controller_name = $server[1];
            $action_name = $server[2];
            $controller_file = ($controller_name) . '.php';
            $controller_path = "app/$controller_file";

        } else {
            $module = $server[1];
            $controller_name = $server[2];
            $action_name = $server[3];
            $controller_file = ($controller_name) . '.php';
            $controller_path = "app/$module/controller/$controller_file";
        }
        $action_name = 'action_'.$action_name;
        if (file_exists($controller_path)) {
            include $controller_path;
        } else {
            include 'app/404.php';
        }
        $controller = new $controller_name;
        $action = $action_name;
        var_dump($action);
        $action = strtok($action, '?');
        if (method_exists($controller, $action)) {
            $controller->$action($_GET);
        } else {
            echo 'нет такого метода';
        }
    }
}
