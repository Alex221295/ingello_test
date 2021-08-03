<?php

class Route
{

    public function run()
    {
        $server = explode('/', $_SERVER['REQUEST_URI']);

        $module = $server[1];
        $controller_name = $server[2];
        $action_name = $server[3];

        $controller_file = ($controller_name) . '.php';
        $controller_path = "app/user/controller/" . $controller_file;
        if (file_exists($controller_path)) {
            include $controller_path;
        } else {
            include 'app/404.php';
        }
        $controller = new $controller_name;
        $action = $action_name;
        if (method_exists($controller, $action)) {
            $controller->$action();
        } else {
            echo 'нет такого метода';
        }
    }
}
//