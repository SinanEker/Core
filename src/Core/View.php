<?php
namespace Core;
class View
{
	const DEFAULT_RENDER_FILE = "/Main.php";
	
    protected $controller;
    
    public function __construct(\Core\Classes\Controller $controller)
    {
        $this->controller = $controller;
    }
    
    public function showDefault(\Klein\ServiceProvider $service, array $args = [])
    {
        $options = $this->controller->getOptions("defaults");
        if (is_array($options))
        {
            $args = array_merge($args, $options);
        }
        $service->render(VIEWS_PATH.self::DEFAULT_RENDER_FILE, $args);
    }
    
    public function hold($method = "GET", $route = "/", callable $function = null)
    {
        if (!is_string($method))
        {
            throw new \InvalidArgumentException("\$method must be a string!");
        }
        if (!is_string($method))
        {
            throw new \InvalidArgumentException("\$route must be a string!");
        }
        if ($function === null)
        {
            $function = function ()
            {
                return "";
            };
        }
        $this->controller->getKlein()->respond($method, $route, $function);
        return $this;
    }
    
    final public function dispatch()
    {
        $this->controller->getKlein()->dispatch();
        return $this;
    }
}