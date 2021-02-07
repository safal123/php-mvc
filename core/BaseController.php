<?php

namespace App\Core;

/**
 * Class BaseController
 * @package App\Core
 */
class BaseController
{
    /**
     * @param $view
     * @param array $params
     * @return string|string[]
     */
    public function render($view, $params = [])
    {
        return Application::$app->router->renderView($view, $params);
    }

}