<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class IniciarSesion extends CI_Controller {

	private $vista_master = 'app/index';

	function __construct()
	{
		parent::__construct();

		if($this->sesion->conectado()){
			redirect("escritorio", "refresh");
		}

		if($this->uri->segment(1) == 'iniciar'){
			show_404();
		}
	}

	public function index()
	{
		$this->data['titulo']      = 'Facturacion Selva Mar';
		$this->data['body_class']  = "bg-dark";
		// El if trata de iniciar sesion si lo logra redireciona
		if($this->sesion->iniciar()){
			redirect("escritorio", "refresh");
		}
		$this->load->view($this->vista_master, $this->data);
	}

}
