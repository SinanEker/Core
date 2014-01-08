<?php
namespace Core;

/*
 * The Controller class.
 * 
 * @api
 * 
 * @package Core
 * */
class Controller
{    
    protected $klein;
    
    private $options = [];
    
    const PARSE_CLOUD_APPID = "";

    const PARSE_CLOUD_MASTERKEY = "";
    
    const PARSE_CLOUD_RESTKEY = "";
    
    const PARSE_CLOUD_PARSEURL = "https://api.parse.com/1/";
    
    public function __construct(\Klein\Klein $klein = null, array $options = [])
    {
        $this->options = array_merge($this->options, $options);
        
        if ($klein === null)
        {
            if (!class_exists("\Klein\Klein"))
            {
                throw new \RuntimeException("class \\Klein\\Klein not found.");
            }
            $klein = new \Klein\Klein();
        }
        $this->klein = $klein;
    }
    
    public function getKlein()
    {
        return $this->klein;
    }
    
    public function getOptions($index = null)
    {
        if ($index !== null)
        {
            return (isset($this->options[$index]) ? $this->options[$index] : null);
        }
        return $this->options;
    }
    
    final public function getParseCloudAuthData()
    {
        return [
            "APPID" => self::PARSE_CLOUD_APPID,
            "MASTERKEY" => self::PARSE_CLOUD_MASTERKEY,
            "RESTKEY" => self::PARSE_CLOUD_RESTKEY,
            "PARSEURL" => self::PARSE_CLOUD_PARSEURL            
        ];
    }
    
}