<?php
class Requester
{
    public function insert($nom, $prenom, $email) {
        $query = "INSERT INTO " . $this->table . " (id, nom, prenom, email) VALUES (NULL, :nom, :prenom, :email)";
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