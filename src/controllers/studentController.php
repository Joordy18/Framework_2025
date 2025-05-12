<?php

class studentController extends Controller{

    public function index(){
        $data = "Bonjour";
        $name = "Lucas";
        $this->set(compact("data","name"));
        $this->render();
    }



}