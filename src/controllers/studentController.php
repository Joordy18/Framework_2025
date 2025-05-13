<?php

class studentController extends Controller{

    public function index(){
        $this->loadModel("student");

        $data = "Bonjour";
        $name = "Lucas";
        $this->set(compact("data","name"));
        $this->render();
    }



}