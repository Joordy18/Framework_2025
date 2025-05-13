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
        return $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

    }

    public function find($val){
        if (is_array($val)) {
            $placeholders = implode(',', array_fill(0, count($val), '?'));
            $stmt = $this->co->prepare("SELECT * FROM ".$this->table." WHERE id IN (".$placeholders.") OR name IN (".$placeholders.")");
            $stmt->execute(array_merge($val, $val));
        } else {
            if (is_numeric($val)) {
                $stmt = $this->co->prepare("SELECT * FROM ".$this->table." WHERE id = ?");
            } else {
                $stmt = $this->co->prepare("SELECT * FROM ".$this->table." WHERE nom = ?");
            }
            $stmt->execute([$val]);
        }
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}