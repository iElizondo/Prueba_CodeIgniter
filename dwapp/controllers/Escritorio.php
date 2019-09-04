<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Escritorio extends CI_Controller {

    private $vista_master = 'app/index',
    $data;

    function __constructor(){

        parent::__construct();
        $this->sesion->validar();
        $this->data['vista']         = $this->router->class . '/' . $this->router->method;
    }

    public function index(){
        $this->data['titulo']      = 'Facturacion Selva Mar';
        $this->load->view($this->vista_master, $this->data);
    }

    public function salir()
    {
        $this->sesion->matar();
    }
    
}