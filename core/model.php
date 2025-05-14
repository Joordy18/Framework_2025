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

    public function insert($nom, $prenom, $email) {
        $query = "INSERT INTO " . $this->table . " (nom, prenom, email) VALUES (:nom, :prenom, :email)";
        $stmt = $this->co->prepare($query);
        return $stmt->execute([
            'nom' => $nom,
            'prenom' => $prenom,
            'email' => $email
        ]);
    }

    public function delete($id) {
        $query = "DELETE FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->co->prepare($query);
        return $stmt->execute(['id' => $id]);
    }

    public function update($id, $nom, $prenom, $email){
        $query = "UPDATE ".$this->table." SET nom= :nom, prenom= :prenom, email= :email WHERE id= :id";
        $stmt = $this->co->prepare($query);
        return $stmt->execute([
            'id' => $id,
            'nom' => $nom,
            'prenom' => $prenom,
            'email' => $email
        ]);
    }

}