<?php
/* 
 * App Core class
 * Creates URL and loads core controller
 * URL format - /controller/method/parameters
 */

 class Core{
    protected $currentController = 'Pages';
    protected $currentMethod = 'index';
    protected $params = [];

    public function __construct()
    {   
        $this->getUrl();       
    }

    public function getUrl()
    {
        echo $_GET['url'];
    }
 }

