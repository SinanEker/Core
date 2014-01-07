<?php 
require_once __DIR__ . '/vendor/autoload.php';
use \Core\View;
use \Core\Controller;

$controller = new Controller(new \Klein\Klein(), []);
$view = new View($controller);
$view->hold("GET", "/hi", function ()
{
	return "hi";
})->dispatch();
