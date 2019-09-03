<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Iniciar extends CI_Controller {

	private $vista_master = 'app/index';

	function __construct()
	{
		parent::__construct();

		if($this->sesion->conectado()){
			redirect("facturas", "refresh");
		}

		if($this->uri->segment(1) == 'iniciar'){
			show_404();
		}

		$this->data['vista'] = $this->router->method;
	}

	public function index()
	{
		#$this->lang->load('iniciar');
		$this->data['titulo']      = 'Titulo';
		$this->data['body_class']  = "page-login-v2 layout-full page-dark";

		#echo password_hash( "123123", PASSWORD_BCRYPT, array("cost" => 10) );

		// El if trata de iniciar sesion si lo logra redireciona
		if($this->sesion->iniciar()){
			redirect("/facturas/", "refresh");
		}


		$this->load->view($this->vista_master, $this->data);
	}

}
