<?php
error_reporting(~E_DEPRECATED);

class studentModel extends Model {

    public function __init(){
        $this->table = "student";

    }

}