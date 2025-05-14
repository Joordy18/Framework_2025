<?php

class studentController extends Controller{

    public function index(){
        $data = $this->student->findAll();
        $this->set(compact("data"));
        $this->render();
    }

    public function view($id, $name){
        $this->set(["data" => $this->student
        ->find([
            "id" => $id,
            "nom" => $name
            ])
        ]);
        $this->render();
    }

}