<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Fn extends CI_Model {

	private $cl,
			  $idSeccion;
	public  $row_x_page = 50,
			  $num_links  = 10,
			  $tipo_cambio = NULL,
			  $rolSecciones;

	function __construct()
	{
		$this->cl  =& get_instance();
	}

	public function paginacion($total)
	{
		$pagina = ! empty( $this->sql->pagina_act ) ? $this->sql->pagina_act : 1 ;

		$listado = '';
		$total_paginas = ceil($total / $this->row_x_page);
		if($total_paginas > 1){
			$listado = '<em><p>Página <b>'.$pagina.'</b> de <b>'.$total_paginas.'</b></p></em><ul class="pagination">';

			$desde = $pagina - ($this->num_links/2);
			$hasta = $pagina + ($this->num_links/2);

			if($hasta > $total_paginas){
				$desde = ($total_paginas-$this->num_links);
				$hasta = $total_paginas;
			}
			if($desde < 1){
				$desde = 1;
				if($total_paginas < $this->num_links){
					$hasta = $total_paginas;
				}else{
					$hasta = $this->num_links;
				}
			}
			for ($i=$desde; $i <= $hasta; $i++) {
				$estado = '';
				if($pagina == $i){
					$estado = 'active';
				}

				$query_string = '';
				$gets = $this->input->get(NULL, FALSE);
				foreach ($gets as $key => $value) {
					if($key != 'pagina'){
						if(is_array($value)){
							foreach ($value as $k => $v) {
								$query_string .= '&'.$key.'[]=' . $v;
							}
						}else{
							$query_string .= '&'.$key.'=' . $value;
						}
					}
				}

				$qstring = $query_string . '&pagina='. $i;
				$qstring = '?' . substr($qstring, 1);

				$base = base_url(uri_string()) . '/';
				$url  = $base . $qstring;
				if($i == 1 and empty($query_string)){
					$url = $base;
				}
				$listado .= '<li class="page-item '.$estado.'"><a class="page-link" href="'.$url.'">'.$i.'</a></li>';
			}
			$listado .= '</ul>';
		}
		return $listado;
	}

	public function tipocambio($fecha = NULL)
	{
		if($fecha == NULL){
			$fecha = date('Y-m-d');
		}
		$tabla = 'dolar';
		$configConsulta = array(
			'tabla'       => $tabla,
			'seleccionar'  => 'valor',
			'condiciones' => array(
				'fecha' => $fecha
			),
			'tipo'        => 'row'
		);

		$row = $this->sql->consultar( $configConsulta );


		if($row == NULL){
			$this->load->helper('indbccr');
			$valor = TipoCambio();
			$config['tabla'] = $tabla;
			$config['data']  = array(
				'fecha' => $fecha,
				'valor' => $valor
			);
			$this->sql->insertar( $config );
		} else {
			$valor = $row->valor;
		}

		$this->tipo_cambio = $valor;
		return $valor;
   }

	public function subcampos($config)
	{

		$cf = explode('|', $config);
		if(isset($cf[1])){
			$omitir = explode(',', $cf[1]);
		}
		$datos = $this->input->post($cf[0]);

		if( isset($datos) ){
			$ok = TRUE;
			foreach ($datos as $k => $post_campo) {
				if(isset($omitir)){
					foreach ($omitir as $k => $campo) {
						unset( $post_campo[$campo] );
					}
				}

				$total_campos  = count($post_campo);
				$campos_llenos = count( array_filter($post_campo) );
				if($campos_llenos < $total_campos){
					$ok = FALSE;
					break;
				}
			}
			if($ok == FALSE){
				$this->form_validation->set_message('subcampos', 'Los campos de <b>{field}</b> son obligatorio.');
				return FALSE;
			} else {
				return TRUE;
			}
		} else {
			$this->form_validation->set_message('subcampos', 'El campo <b>{field}</b> es obligatorio.');
			return FALSE;
		}
	}



	public function menu()
	{
		$menu = $this->config->item('menu');

		foreach ($menu as $categoria => $items) {

			$categoria ='<li class="nav-item active">
							<a class="nav-link" href="#">
								<i class="'.$items['icono_categoria'].'"></i>
								<span>'.$categoria.'</span>
							</a>
						</li>';


			// $c = '<li class="nav-item active nav-link">'.$categoria.'</li>';
			$links     = '';

			foreach ($items['enlaces'] as $id_menu => $parametros) {

				/*if( ! $this->fn->tienePermiso( $id_menu ) ){
					continue;
				}*/
				$active = '';
				// if($this->router->class == $parametros['url']){
				// 	$active = "active";
				// }

				$links .= '<li class="nav-item">
								<a class="nav-link" href="'.base_url().''. $parametros['url'].'/">
								<i class="'. $parametros['class_icon'].'"></i>
								<span>'.$parametros['anchor'].'</span></a>
							</li>';
			}

			if($links != ''){
				echo $categoria;
			}
			echo $links;

		}
	}

// 	public function getBuscar()
// 	{
// 		if( ! empty( $buscar = $this->input->get('buscar', TRUE) ) ){
// 			return $buscar;
// 		}
// 	}

// 	public function colon($valor, $tipo = 0)
// 	{
// 		if($tipo == 1){
// 			return "₡ " . number_format($valor, 2, ".", ",");
// 		} else {
// 			$valor = str_replace(",", "", $valor);
// 			return number_format($valor, 5, ".", "");
// 		}

// 	}

// 	public function monedaFormatoHacienda($valor)
// 	{
// 		//$valor = str_replace(",", "", $valor);
// 		return number_format($valor, 2, ".", ""); /* 5 */
// 	}

// 	public function set_mensaje($array)
// 	{
// 		$mensajes = array();
// 		$msg = $this->session->flashdata('msg');
// 		if( !empty($msg) ){
// 			foreach ($msg as $key => $value) {
// 				$mensajes[] = $value;
// 			}
// 		}
// 		$mensajes[] = $array;
// 		$this->session->set_flashdata('msg', $mensajes);
// 		return $mensajes;
// 	}

// 	function sendMail($data)
// 	{
// 		$this->load->library("email");
// 		$config = $this->config->item('configEmail');
// 		$this->email->initialize($config);
// 		$this->email->from($config['correo'], $config['nombre']);
// 		$this->email->to($data['to']);
// 		if(!empty($data['bcc'])){
// 			$this->email->bcc($data['bcc']);
// 		}
// 		if( !empty($data['attach']) ){
// 			foreach ($data['attach'] as $key => $attach) {
// 				$this->email->attach($attach);
// 			}
// 		}

// 		$this->email->subject($data['subject']);

// 		$body = '<img src="https://www.rancholamerced.com/wp-content/uploads/2017/09/logo.png" /><br><br><div style="font-family:sans-serif;font-size:15px;color:#272727;">
// 		'.$data['message'].'
		


// 		<div style="font-size:12px;">Este es un correo solo de envío, si tiene alguna duda, comuníquese al teléfono 2743 8032 - 8861 5147 o al correo electrónico <a href="mailto:recepcion@rancholamerced.com">recepcion@rancholamerced.com</a>.
// 		Este correo es de interés único del destinatario. Si usted lo recibió por error, elimínelo, por favor.</div>
// 		</div>';

// 		$this->email->message( nl2br( $body ) );
// 		$return = $this->email->send();
// 		$this->email->clear(TRUE);
// 		return $return;

// 	}

// 	function enviarCorreoPlano($data)
// 	{
// 		$this->load->library("email");
// 		$config = $this->config->item('configEmail');
// 		$this->email->initialize($config);
// 		$this->email->from($config['correo'], $config['nombre']);
// 		$this->email->to($data['to']);
// 		if(!empty($data['bcc'])){
// 			$this->email->bcc($data['bcc']);
// 		}
// 		if( !empty($data['attach']) ){
// 			foreach ($data['attach'] as $key => $attach) {
// 				$this->email->attach($attach);
// 			}
// 		}

// 		$this->email->subject($data['subject']);

// 		$this->email->message( $data['message'] );
// 		$return = $this->email->send();
// 		$this->email->clear(TRUE);
// 		return $return;

// 	}

}
