<?php 

class Routeur {
    private static $url;
    private static $urlparsed;
    private static $FinalUrl;

    public static function getPath() {
       self::$url = $_SERVER['PATH_INFO']; 
        if (!empty(self::$url)) {
            self::parseURL();

            self::$FinalUrl['controller'] = self::$urlparsed[0];
            self::$FinalUrl['action'] = self::$urlparsed[1];
            array_splice(self::$urlparsed, 0, 2);
            if(!empty(self::$urlparsed)) {
                self::$FinalUrl['params'] = self::$urlparsed;
            } else {
                self::$FinalUrl['params'] = [];
            }
        }
        return self::$FinalUrl;
    }

    private static function parseURL() {
        self::$urlparsed = explode('/', self::$url);
        array_splice (self::$urlparsed,0,1);
    }
}

?>
