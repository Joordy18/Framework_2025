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

    public function find($params, $debug=false)
    {
        if (is_array($params)) {
            $query = "SELECT * FROM " . $this->table . " WHERE ";
            foreach ($params as $col => $val) {
                $query .= $col . ' = :' . $col . ' AND ';
            }
            $query = substr($query, 0, -5);
            $stmt = $this->co->prepare($query);
            $stmt->execute($params);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } else {
            $stmt = $this->co->prepare("SELECT * FROM " . $this->table . " WHERE id = ?");
            $stmt->bindParam(1, $params);
            $stmt->execute();
            if($debug){
                echo "<pre>";
                $stmt->debugDumpParams();
                echo "</pre>";
            }
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
    }


}