<?php
namespace App\WCrawler;

use GuzzleHttp\Client;
class WCrawler{
    private static $wCrawler;
    private $target;
    public static function instance($target){
        if(self::$wCrawler == null)
            self::$wCrawler = new WCrawler($target);

        return self::$wCrawler;
    }

    function __construct($target)
    {
        $this->target = $target;
    }

    public function setTarget($target){
        $this->target = $target;
    }

    public function find($content, $tag){
        $htmlDOM = new \DOMDocument();
        libxml_use_internal_errors(true);
        $htmlDOM->loadHTML($content);

        $tags = $htmlDOM->getElementsByTagName($tag);
        return $tags;
    }

    public function getData(){
        if(is_null($this->target))
            return false;
        
        $client = new Client([
            "base_uri" => $this->target]);
        $data = $client->request('GET')->getBody();
        
        return $data;
    }
}