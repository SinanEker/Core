<?php
namespace Core\Classes;
class Controller
{    
    protected $klein;
    
    private $options = [];
    
    const PARSE_CLOUD_APPID = "igTNl3AJXTirReTIcLQzKWCsgXNgsSPlsBlsdynh";
    
    const PARSE_CLOUD_MASTERKEY = "sAfRDjo6TiqUA8m3qgCM4IQDEwalEYrGKFbYlsKC";
    
    const PARSE_CLOUD_RESTKEY = "R9NYyqk0YMA4iytgDBqybHYCm9up3i36AyNt2IRI";
    
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