<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Panel extends MY_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->subLayoutFolder = "admin";
        $this->moduleFolder = 'home';
        $this->tmpFile = "index";

    }

    public function index()
    {
        $param['page_title'] = 'Dashboard';
        $this->render($param);
    }

}
