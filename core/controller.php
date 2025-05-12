<?php
class Controller {

    private $ctrl_name;
    protected $template = "default";
    protected $vars = [];

    public function __construct(){
        if(method_exists($this,"__init")) {
            $this->__init();
        }
        $this->ctrl_name = str_replace('Controller','',get_class($this));
    }

    protected function render($views = ''){
        if ($views == ''){
            $views = debug_backtrace()[1]['function'];
        }


        ob_start();

        extract($this->vars);

        if (file_exists(VIEWS.DS.$this->ctrl_name.DS.$views.'.php')) {
            include_once(VIEWS.DS.$this->ctrl_name.DS.$views.'.php');
        } else {
            echo "Erreur 404: La page n'existe pas";
        }

        $content_for_layout = ob_get_clean();

        if (file_exists(TEMPLATES.DS.$this->template.'.php')) {
            include_once(TEMPLATES.DS.$this->template.'.php');
        } else {
            echo "Erreur: Le template n'existe pas";
        }

    }

    protected function set($var){
        $this->vars = array_merge($this->vars,$var);
    }





}


?>