<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Producto extends CI_Controller {
    
    private $vista_master = 'app/index',
    $data;

    function __construct(){
        parent::__construct();
        $this->sesion->validar();
        $this->data['vista'] = $this->router->class . '/' . $this->router->method;
    }

    public function index(){
        $this->data['titulo']      = 'Listado de Productos';
        $confgConsultaProductos = array(
            'tabla' => 'servicios',
            'tipo' => 'result_array'
        );

        $this->data['producto']   = $this->sql->consultar( $confgConsultaProductos );
        $this->data['paginacion']  = $this->sql->paginacion;
        
        $this->load->view($this->vista_master, $this->data);
    }
}