<?php

class studentController extends Controller{

    public function index(){

        if (isset($_GET['search']) && !empty($_GET['search'])) {
            $search = $_GET['search'];
            $data = $this->student->find($search);
            $this->set(compact("data"));
        }
        $this->render();
    }

    public function view($id, $name){
        $data = $this->student->find($id);
        $this->set(["data"=>$this->student->find([
            "id"=>$id,
            "nom"=>$name
        ])]);
    }

}