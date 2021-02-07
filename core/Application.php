<?php

namespace App\Core;

/**
 * Class Application
 * @package App\Core
 */
class Application
{
    /**
     * @var string
     */
    public static string $ROOT_DIR;

    /**
     * @var Router
     */
    public Router $router;


    /**
     * @var Request
     */
    public Request $request;


    /**
     * @var Response
     */
    public Response $response;


    /**
     * @var Application
     */
    public static Application $app;


    /**
     * @var Database
     */
    public Database $db;


    /**
     * Application constructor.
     * @param $rootPath
     */
    public function __construct($rootPath)
    {
        self::$ROOT_DIR = $rootPath;
        self::$app = $this;
        $this->db = new Database();
        $this->request = new Request();
        $this->response = new Response();
        $this->router = new Router($this->request, $this->response);
    }


    /**
     *
     */
    public function run()
    {
        echo $this->router->resolve();
    }
}