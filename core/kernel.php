<?php 
class Kernel {
    private static $url;
    private static $controller;
    
    
    public static function run() {
        self::$url = Routeur::getPath();
        Routeur::getPath();
        self::loadController();
        $ctrlName = self::$url['controller'].'Controller';
        self::$controller = new $ctrlName();

        call_user_func_array(array(self::$controller, self::$url['action']),[]);

    }


    private static function loadController(){
        if(file_exists(CONTROLLERS.DS.self::$url['controller']."Controller.php")){
            include_once (CONTROLLERS.DS.self::$url['controller']."Controller.php");
        }else{
            echo("Erreur 404 : La page n'existe pas !");
        }

    }



}
?>