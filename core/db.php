<?php

class DB{
    private $DB_HOST;
    private $DB_USER;
    private $DB_PASS;
    private $DB_PORT;
    private $DB_NAME;
    public $co;

    public function __construct(){
        $this->getConfig("default");
        $this->connect();
    }

    private function connect(){
        $this->co = new PDO('mysql:host='.$this->DB_HOST.';port='.$this->DB_PORT.';dbname='.$this->DB_NAME,$this->DB_USER,$this->DB_PASS);
    }

    private function getConfig($connectionName){
        $config = include_once(ROOT.DS.'config.php');
        $this->DB_HOST = $config['connections'][$connectionName]['host'];
        $this->DB_USER = $config['connections'][$connectionName]['user'];
        $this->DB_PASS = $config['connections'][$connectionName]['password'];
        $this->DB_PORT = $config['connections'][$connectionName]['port'];
        $this->DB_NAME = $config['connections'][$connectionName]['dbname'];
        //var_dump($config['connections'][$connectionName]);
    }
}