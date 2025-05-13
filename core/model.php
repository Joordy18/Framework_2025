<?php


class Model extends DB{

    protected $table;

    public function __construct(){
        parent::__construct();
        if(method_exists($this,"__init")) {
            $this->__init();
        }
    }

    public function findAll(){
        $stmt = $this->co->prepare("SELECT * FROM ".$this->table);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        var_dump($data);
    }



}