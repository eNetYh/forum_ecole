<?php
class Controller{
    /
     * VARS
     */
    var $vars = Array();
    var $layout = 'default';

    /*
     * METHODS
     */
    public function set($d)
    {
        $this->vars = array_merge($this->vars,$d);
    }

    public function setLayout($name)
    {
        $this->layout = $name;
    }


    public function render($filename)
    {
        extract($this->vars);

        ob_start();
        require(ROOT.'views/'.  get_class($this).'/'.$filename.'.php');
        $content_for_layout = ob_get_clean();
        if($this->layout == false)
        {
            echo $content_for_layout;
        }
        else
        {
            require(ROOT.'views/layout/'.$this->layout.'.php');
        }
    }


    public function loadModel($name)
    {
        require_once(ROOT.'models/'.strtolower($name).'.php');
        $this->$name = new $name();
    }

    public function loadManager($name)
    {
        require_once(ROOT.'managers/'.strtolower($name).'.php');
        $this->$name = new $name();
    }

}
?>
