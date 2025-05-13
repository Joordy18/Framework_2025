<?php

class studentController extends Controller{

    public function index(){
        $this->loadModel("student");
        $this->student->findAll();

        $data = "Bonjour"; $name = "Lucas";
        $this->set(compact("data","name"));
        $this->render();
    }



}