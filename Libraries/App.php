<?php

namespace App\Libraries;

class App
{
    protected $controller = 'IndexController'; // Default controller
    protected $method = 'index'; // Default method
    protected $params = []; // Parameters to pass to method


    public function serve($request)
    {
        // Basic routing logic
        $uri = parse_url($request['REQUEST_URI'], PHP_URL_PATH);
        $pathParts = explode('/', trim($uri, '/'));
        $controllerName = $pathParts[0] == "" ? $this->controller : ucfirst(str_replace("-", "", $pathParts[0])) . 'Controller';
        $action = isset($pathParts[1]) ? str_replace("-", "_", $pathParts[1]) : 'index';
        $params = array_slice($pathParts, 2);
        
        $controllerPath = __DIR__ . '/../Controllers/' . $controllerName . '.php';
        if (file_exists($controllerPath)) {
            require_once $controllerPath;
            $controller = new $controllerName();
            if (method_exists($controller, $action)) {
                return call_user_func_array([$controller, $action], $params ?? []);
            }
            return call_user_func_array([$controller, 'error'], ["Method '$action' not found in $controllerName"]);
        }
        echo "Unknown controller: $controllerName";
        exit();
    }
}
