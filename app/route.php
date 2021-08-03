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
            $controller_path = "app/user/controller/$controller_file";

        } else {
            $module = $server[1];
            $controller_name = $server[2];
            $action_name = $server[3];
            $controller_file = ($controller_name) . '.php';
            $controller_path = "app/$module/controller/$controller_file";
            $query = parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY);
            parse_str($query, $parts);
            $id = $parts['id'];
        }
        if (file_exists($controller_path)) {
            include $controller_path;
        } else {
            include 'app/404.php';
        }

        $controller = new $controller_name;
        $action = $action_name;
        $action = strtok($action, '?');
        if (method_exists($controller, $action)) {
            $controller->$action($id);
        } else {
            echo 'нет такого метода';
        }
    }
}
