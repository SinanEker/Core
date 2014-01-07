<?php
namespace Core;

/*
 * The View class.
 * 
 * @api
 * 
 * @package Core
 * 
 * */
class View
{
	/*
	 * @type string \Core\View::DEFAULT_RENDER_FILE Defines the default file that is rendered if no other is provided.
	 * */
	const DEFAULT_RENDER_FILE = "/Main.php";
	
	/*
	 * @type \Core\Controller|null Controller instance.
	 * */
    protected $controller = null;
    
	/*
	 * Initialize the View class and sets the \Core\Controller $controller instance.
	 * 
	 * @api
	 * 
	 * @param \Core\Controller $controller The controller instance.
	 * 
	 * @property-write \Core\Controller $controller
	 * */
    public function __construct(\Core\Controller $controller)
    {
        $this->controller = $controller;
    }
    
	/*
	 * Shows the default page to render.
	 * 
	 * @api
	 * 
	 * @param \Klein\ServiceProvider $service The service instance from Klein php.
	 * 		  mixed[] $args
	 * 
	 * @return void
	 * */
    public function showDefault(\Klein\ServiceProvider $service, array $args = [])
    {
        $options = $this->controller->getOptions("defaults");
        if (is_array($options))
        {
            $args = array_merge($args, $options);
        }
        $service->render(VIEWS_PATH.self::DEFAULT_RENDER_FILE, $args);
    }
    
	/*
	 * Holds a route and registers it to the Klein instance.
	 * 
	 * @api
	 * 
	 * @param string $method The request method POST|PUT|DELETE|GET.
	 * 		  string $route The route that is ment.
	 * 		  callable $function The function that will be fired if the route is invoked.  
	 * */
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
    
	/*
	 * Dispatchs the router.
	 * 
	 * @api
	 * 
	 * @param void
	 * 
	 * @return \Core\View $this Returns the object instance.
	 * */
    final public function dispatch()
    {
        $this->controller->getKlein()->dispatch();
        return $this;
    }
}