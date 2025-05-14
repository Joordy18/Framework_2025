<?php

class studentController extends Controller{

    public function index(){
        $data = $this->student->findAll();
        $this->set(compact("data"));
        $this->render();
    }

    public function insert(){
        $this->render();
    }
    public function addStudent() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $email = $_POST['email'];

            $requester = new Requester();
            $requester->table = 'student'; // Définir la table
            $success = $requester->insert($nom, $prenom, $email);

            if ($success) {
                echo "Étudiant ajouté avec succès.";
            } else {
                echo "Erreur lors de l'ajout de l'étudiant.";
            }
        }
    }

    /*public function view($id, $name){
        $this->set(["data" => $this->student
        ->find([
            "id" => $id,
            "nom" => $name
            ])
        ]);
        $this->render();
    }*/

}