<?php
class studentController extends Controller{
    public function index(){
        $data = $this->student->findAll();
        $this->set(compact("data"));
        $this->render();
    }

    public function insert() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $email = $_POST['email'];

            // Appel au Requester pour générer la requête SQL
            $requester = new Requester();
            $query = $requester->insert($nom, $prenom, $email);

            // Préparation et exécution de la requête via le Model
            $stmt = $this->student->co->prepare($query);
            $stmt->execute([
                'nom' => $nom,
                'prenom' => $prenom,
                'email' => $email
            ]);

            // Redirection ou message de confirmation
            header('Location: /student/index');
            exit;
        }

        $this->render();
    }

    public function update($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $email = $_POST['email'];

            // Appel au Requester pour générer la requête SQL
            $requester = new Requester();
            $query = $requester->update($id, $nom, $prenom, $email);

            // Préparation et exécution de la requête via le Model
            $stmt = $this->student->co->prepare($query);
            $stmt->execute([
                'id' => $id,
                'nom' => $nom,
                'prenom' => $prenom,
                'email' => $email
            ]);

            // Redirection ou message de confirmation
            header('Location: /student/index');
            exit;
        } else {
            // Récupération des données existantes
            $student = $this->student->find(['id' => $id]);
            $this->set(compact("student"));
            $this->render();
        }
    }

    public function delete($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Appel au Requester pour générer la requête SQL
            $requester = new Requester();
            $query = $requester->delete($id);

            // Préparation et exécution de la requête via le Model
            $stmt = $this->student->co->prepare($query);
            $stmt->execute(['id' => $id]);

            // Redirection ou message de confirmation
            header('Location: /student/index');
            exit;
        }

        $this->render();
    }

    public function view($id, $name) {
        $student = $this->student->find([
            "id" => $id,
            "nom" => $name
        ]);

        if ($student) {
            $this->set(["student" => $student]);
        } else {
            $this->set(["student" => null]);
        }

        $this->render();
    }

}