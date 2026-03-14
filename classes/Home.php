<?php
class Home{
    private $html;
    
    public function __construct()    {
        $this->html = file_get_contents('html/home/index.html');
    }
    public function show() {
        print $this->html;
    }   
}