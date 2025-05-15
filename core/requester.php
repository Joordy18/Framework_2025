<?php
class Requester
{
    public function insert($nom, $prenom, $email) {
        return "INSERT INTO student (id, nom, prenom, email) VALUES (NULL, :nom, :prenom, :email)";
    }

    public function delete($id) {
        return "DELETE FROM student WHERE id = :id";
    }

    public function update($id, $nom, $prenom, $email){
        return "UPDATE student SET nom= :nom, prenom= :prenom, email= :email WHERE id= :id";
    }
}