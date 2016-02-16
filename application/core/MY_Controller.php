<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

    protected $layout = "layouts/default";
    protected $subLayoutFolder = "admin";
    protected $tmpFile = "index";
    protected $moduleFolder = "admin";
    protected $breadcrumb = array('Home', '/dashboard');

    public function __construct()
    {
        parent::__construct();

        date_default_timezone_set('Europe/Istanbul');

    }


    public function render($param = array())
    {
        $vars = array();
        if(isset($param['export']) && $param['export'] == 1)
        {
            $export = 1;
        }else{
            $export = 0;
        }
        $moduleFolder = isset($param['moduleFolder']) ? $param['moduleFolder'] : $this->moduleFolder;
        $vars['metaData'] = (isset($param['metaData'])) ? $param['metaData'] : array();
        $vars['page_title'] = (isset($param['page_title'])) ? $param['page_title'] : array();
        $vars['body_class'] = (isset($param['body_class'])) ? $param['body_class'] : array();
        $vars['page_name'] = (isset($param['page_name'])) ? $param['page_name'] : array();
        $vars['page_description'] = (isset($param['page_description'])) ? $param['page_description'] : array();
        $vars['breadcrumb'] = $this->breadcrumb;

        if (isset($param['layoutParam'])) {
            foreach ($param['layoutParam'] as $key => $value) {
                $vars[$key] = $value;
            }
        }

        $param['vars'] = isset($param['vars']) ? $param['vars'] : "";

        $vars['content'] = $this->load->view("{$this->subLayoutFolder}/modules/{$moduleFolder}/{$this->tmpFile}", $param['vars'], TRUE);

        $vars['uri_segment'] = $this->uri->segment(1);
        if($export == 1)
        {
            return $this->load->view("{$this->subLayoutFolder}/{$this->layout}", $vars, true);
        }else{
            $this->load->view("{$this->subLayoutFolder}/{$this->layout}", $vars);
        }
    }

}
