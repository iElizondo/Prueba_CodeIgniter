<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {
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
        $this->data['usuario'] = $this->usuario_model->get_usuarios();
        $this->data['titulo'] = 'Listado de Usuarios';
        $this->data['roles'] = $this->rol_model->get_roles();
        $this->load->view($this->vista_master, $this->data);
    }

    public function formulario($id = null){
        $data = $this->input->post(NULL, TRUE);
        if ($data) {
            $this->form_validation->set_rules('nombre', 'Nombre', 'required');
            $this->form_validation->set_rules('usuario', 'Usuario', 'required');
            $id?:$this->form_validation->set_rules('contrasena', 'Contraseña', 'required|min_length[6]');
            $this->form_validation->set_rules('rol', 'Rol', 'required');
    
            if ($this->form_validation->run() === TRUE)
            {
                $this->usuario_model->set_usuarios($id);
                $id? redirect($this->router->class, 'refresh') : redirect($this->data['vista'], 'refresh');
            }
        }

        $id? $this->data['titulo'] = 'Editar Usiario' : $this->data['titulo'] = 'Crear Usiario';
        
        $this->data['usuario_item'] = $this->usuario_model->get_usuarios($id); 
        $this->data['roles'] = $this->rol_model->get_roles();
        $this->load->view($this->vista_master, $this->data);
    }

    public function delete($id = NULL)
    {
        $this->usuario_model->delete_usuarios($id);
        redirect($this->router->class, 'refresh');
    }
}