<?php
error_reporting(~E_DEPRECATED);

class studentModel extends DB {

    public function findAll(){
        //SELECT * FROM student;
        $stmt = $this->co->prepare("SELECT * FROM student");
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        var_dump($data);
    }

}