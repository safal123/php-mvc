<?php

namespace App\Core;

use Exception;

/**
 * Class Router
 * @package App\Core
 */
class Router
{
    /**
     * @var array
     */
    protected array $routes = [];

    /**
     * @var Request
     */
    public Request $request;


    /**
     * @var Response
     */
    public Response $response;

    /**
     * Router constructor.
     * @param Request $request
     * @param Response $response
     */
    public function __construct(Request $request, Response $response)
    {
        $this->request = $request;
        $this->response = $response;
    }


    /**
     * @param $path
     * @param $callback
     */
    public function get($path, $callback)
    {
        $this->routes['get'][$path] = $callback;
    }


    /**
     * @param $path
     * @param $callback
     */
    public function post($path, $callback)
    {
        $this->routes['post'][$path] = $callback;
    }


    /**
     * @return mixed|string|string[]
     * @throws Exception
     */
    public function resolve()
    {
        $path = $this->request->getPath();
        $method = $this->request->getMethod();
        $callback = $this->routes[$method][$path] ?? $this->throwRouteNotFoundExecption();
        if(is_string($callback)){
            return $this->renderView($callback);
        }
        if(is_array($callback)){
            $callback[0] = new $callback[0];
        }
        return call_user_func($callback, $this->request);
    }


    /**
     * @param $view
     * @param array $params
     * @return string|string[]
     */
    public function renderView($view, $params = [])
    {
        $layoutContent = $this->layoutContent();
        $viewContent = $this->renderViewOnly($view, $params);
        return str_replace('{{content}}', $viewContent, $layoutContent);
    }


    /**
     * @return false|string
     */
    protected function layoutContent()
    {
        ob_start();
        include_once Application::$ROOT_DIR."/views/layouts/main.php";
        return ob_get_clean();
    }


    /**
     * @param $view
     * @param array $params
     * @return false|string
     */
    protected function renderViewOnly($view, $params=[])
    {
        foreach($params as $key => $value) {
            $$key = $value;
        }
        ob_start();
        include_once Application::$ROOT_DIR."/views/$view.php";
        return ob_get_clean();
    }


    /**
     * @throws Exception
     */
    protected function throwRouteNotFoundExecption()
    {
        $this->response->setStatusCode(404);
        echo '<pre>';
        throw new Exception("Route not found.");
        echo '</pre>';
    }
}