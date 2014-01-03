<?php 
require_once __DIR__ . '/vendor/autoload.php'; 

echo "hi";

class Bla implements \Core\Interfacs\Main
{
	function __construct()
	{
		echo "foo";
	}	
}
$b = new Bla();
