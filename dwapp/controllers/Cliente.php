<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cliente extends CI_Controller{
    private $vista_master = 'app/index',
    $data;
    public $tabla         = 'clientes',
			 $cl_titulo_plu = 'clientes',
			 $cl_titulo_sin = 'cliente';

    function __construct(){
        parent::__construct();
        $this->sesion->validar();
        $this->data['vista'] = $this->router->class . '/' . $this->router->method;
        $this->load->helper('url_helper');
    }

    public function index(){
        $this->data['clientes'] = $this->cliente_model->get_clientes();
        $this->data['titulo'] = 'Listado de Clientes';
        
        $this->load->view($this->vista_master, $this->data);
    }

    public function formulario($id = null){
        $data = $this->input->post(NULL, TRUE);
        if ($data) {
            $this->form_validation->set_rules('nombre_completo', 'Nombre Completo', 'required');
            #$this->form_validation->set_rules('tipo', 'Tipo Identificación', 'required');
            #print_r();
            if($data['tipo']){
                $this->form_validation->set_rules('identificacion', 'Identificación', 'numeric|required|min_length[9]|max_length[12]|is_unique['.$this->tabla.'.identificacion]');
            }
            $this->form_validation->set_rules('telefono', 'Teléfono', 'required|numeric');
            $this->form_validation->set_rules('correo', 'Correo', 'required|valid_email');
            $this->form_validation->set_rules('provincia', 'Provincia', 'required');
            $this->form_validation->set_rules('canton', 'Canton', 'required');
            $this->form_validation->set_rules('distrito', 'Distrito', 'required');
            $this->form_validation->set_rules('otras_senas', 'Otras Señas', 'required');
    
            if ($this->form_validation->run() === TRUE)
            {
                $this->cliente_model->set_cliente($id);
                $id? redirect($this->router->class, 'refresh') : redirect($this->data['vista'], 'refresh');
            }
        }

        $id? $this->data['titulo'] = 'Editar Cliente' : $this->data['titulo'] = 'Crear Cliente';
        
        $this->data['cliente_item'] = $this->cliente_model->get_clientes($id);
        $this->load->view($this->vista_master, $this->data);

    }

    public function delete($id = NULL)
    {
        $this->cliente_model->delete_cliente($id);
        redirect($this->router->class, 'refresh');
    }
}