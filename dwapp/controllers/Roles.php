<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Roles extends CI_Controller {
    private $vista_master = 'app/index',
    $data;
    public $tabla         = 'roles';

    function __construct(){
        parent::__construct();
        $this->sesion->validar();
        $this->data['vista'] = $this->router->class . '/' . $this->router->method;
        $this->load->helper('url_helper');
    }

    public function index(){
        $this->data['rol'] = $this->rol_model->get_roles();
        $this->data['titulo'] = 'Listado de Roles';
        
        $this->load->view($this->vista_master, $this->data);
    }

    public function formulario($id = null){
        $data = $this->input->post(NULL, TRUE);
        // if ($data) {
        //     $this->form_validation->set_rules('nombre', 'Nombre', 'required');
        //     $this->form_validation->set_rules('tipo', 'Tipo Producto', 'required');
        //     $this->form_validation->set_rules('tarifa', 'Tarifa IVA', 'required');
        //     $this->form_validation->set_rules('medida', 'Unidad Medida', 'required');
    
        //     if ($this->form_validation->run() === TRUE)
        //     {
        //         $this->producto_model->set_producto($id);
        //         $id? redirect($this->router->class, 'refresh') : redirect($this->data['vista'], 'refresh');
        //     }
        // }

        $id? $this->data['titulo'] = 'Editar Rol' : $this->data['titulo'] = 'Crear Rol';
        
        $this->data['rol_item'] = $this->rol_model->get_roles($id);
        $this->load->view($this->vista_master, $this->data);

    }

    public function delete($id = NULL)
    {
        $this->producto_model->delete_producto($id);
        redirect($this->router->class, 'refresh');
    }
}