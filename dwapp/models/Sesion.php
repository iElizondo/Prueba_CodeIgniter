<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Sesion extends CI_Model {

	public function __construct() {
	    parent::__construct();
	    #$this->lang->load('iniciar');
	}

	function iniciar()
	{

		$_post = $this->input->post(NULL, FALSE);
   
		if($_post){

			$config = array(
				array(
						'field' => 'usuario',
						'label' => 'Usuario',
						'rules' => 'trim|required'
				),
				array(
						'field' => 'contrasena',
						'label' => 'Contraseña',
						'rules' => 'required',
				)
			);

			$this->form_validation->set_rules($config);

			if($this->form_validation->run() == TRUE){

				$configConsulta = array(
					'selecionar'  => 'id, usuario, contrasena, rol',
					'condiciones' => array(
										'usuario' => $_post['usuario']
									),
					'tabla'       => 'usuarios',
					'tipo'        => 'row'
				);
				$consulta = $this->sql->consultar( $configConsulta );

				if($consulta){
					if(password_verify( $_post['contrasena'], $consulta->contrasena) and $consulta->usuario == $_post['usuario']){
						$this->crear( $consulta );
						return TRUE;
					}else{
						$this->fn->set_mensaje(array('tipo' => 0, 'msg' => $this->lang->line('¡Error al iniciar sesión, datos incorrectos!')));
					}
				}else{
					$this->fn->set_mensaje(array('tipo' => 0, 'msg' => $this->lang->line('¡Error al iniciar sesión, datos incorrectos!')));
				}
			}

		}

	}

	function crear( $consulta )
	{
		$newdata = array(
			'id_usuario' => $consulta->id,
			'idRol'      => $consulta->rol,
			'conectado'  => TRUE
		);
		$this->session->set_userdata($newdata);
	}

	function validar()
	{

		if( $this->conectado() == FALSE ){
			$this->iniciar();
			redirect("/", "refresh");
		}
	}

	function conectado()
	{
		if( $this->session->userdata('conectado') == TRUE ){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	function matar()
	{
		$this->session->sess_destroy();
		redirect("/", "refresh");
	}

}
