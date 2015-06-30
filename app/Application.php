<?php namespace Phalcon\JsonApi;

use Phalcon\Di\FactoryDefault;
use Phalcon\DiInterface;
use Phalcon\Mvc\Micro;
use Phalcon\Mvc\Router\Route;

/**
 * Class Application
 * @package Phalcon\JsonApi
 */
class Application extends Micro
{

    protected static $resourceMaps = [
        'index'   => [
            "method"  => 'GET',
            "pattern" => '/'
        ],
        'store'   => [
            "method"  => 'POST',
            "pattern" => '/'
        ],
        'create'  => [
            "method"  => 'PUT',
            "pattern" => '/create'
        ],
        'show'    => [
            "method"  => 'GET',
            "pattern" => '/{id}'
        ],
        'update'  => [
            "method"  => 'POST',
            "pattern" => '/{id}'
        ],
        'destroy' => [
            "method"  => 'DELETE',
            "pattern" => '/{id}'
        ],
        'edit'    => [
            "method"  => 'PATCH',
            "pattern" => '/{id}/edit'
        ],
    ];

    protected $optionsMethod = true;


    public function __construct(DiInterface $di = null)
    {
        $this->_dependencyInjector = $di ?: new FactoryDefault();
        $baseURL = $this->request->getScheme() . "://" . $this->request->getHttpHost();
        $this->url->setBaseUri($baseURL);
        $this->url->setStaticBaseUri($baseURL);
        $this->url->setBasePath(dirname(__DIR__));
    }

    /**
     * @param string $prefix path
     * @param string $controller class name
     * @param bool $lazyLoad default true
     * @param array $map method
     * @return self
     */
    public function resource($prefix, $controller, $lazyLoad = true, $map = [])
    {
        $collection = new Micro\Collection();
        $collection->setHandler($controller, $lazyLoad);
        $collection->setPrefix("/" . trim($prefix, '/'));

        foreach (get_class_methods($controller) as $action) {
            if (isset(self::$resourceMaps[$action])) {
                $method = strtolower(self::$resourceMaps[$action]['method']);
                $pattern = self::$resourceMaps[$action]['pattern'];
                call_user_func_array([$collection, $method], [$pattern, $action]);
            }
        }

        if (!empty($map)) {
            // TODO: add mapping
        }

        $this->mount($collection);

        return $this;
    }

    /**
     * @param $routePattern mixed if array it will set as headers
     * @param null $handler
     * @return Application|\Phalcon\Mvc\Router\RouteInterface
     */
    public function options($routePattern, $handler = null)
    {
        if (!$handler or !is_callable($handler)) {
            return $this->optionsMaps();
        }

        return parent::options($routePattern, $handler);
    }

    public function optionsMaps($headers = [])
    {
            foreach ($this->router->getRoutes() as $route) {
                /** @var Route $route */
                $this->options($route->getPattern(), function () use($route, $headers) {
                    $this->response->resetHeaders();
                    $this->response->setHeader('Content-type', 'application/vnd.api+json');
                    if ($headers) {
                        foreach ($headers as $header => $value) {
                            $this->response->setHeader($header, $value);
                        }
                    }
                    $method = $route->getHttpMethods();
                    $this->response->setHeader(
                        'Allow',
                        is_string($method) ? $method: implode(",", $method)
                    );
                    $this->response->sendHeaders();
                    $this->response->send();
                });
            }

        return $this;
    }

    public function getRouter()
    {
        $router = parent::getRouter();
        $router->setUriSource($router::URI_SOURCE_SERVER_REQUEST_URI);

        return $router;
    }

}