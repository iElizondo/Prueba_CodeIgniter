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

// 	function tiempoTranscurrido($fechaInicio, $fechaFin)
// 	{
// 	    $fecha1 = new DateTime($fechaInicio);
// 	    $fecha2 = new DateTime($fechaFin);
// 	    $fecha = $fecha1->diff($fecha2);
// 	    $tiempo = "";

// 	    //años
// 	    if($fecha->y > 0)
// 	    {
// 	        $tiempo .= $fecha->y;

// 	        if($fecha->y == 1)
// 	            $tiempo .= " año, ";
// 	        else
// 	            $tiempo .= " años, ";
// 	    }

// 	    //meses
// 	    if($fecha->m > 0)
// 	    {
// 	        $tiempo .= $fecha->m;

// 	        if($fecha->m == 1)
// 	            $tiempo .= " mes, ";
// 	        else
// 	            $tiempo .= " meses, ";
// 	    }

// 	    //dias
// 	    if($fecha->d > 0)
// 	    {
// 	        $tiempo .= $fecha->d;

// 	        if($fecha->d == 1)
// 	            $tiempo .= " día, ";
// 	        else
// 	            $tiempo .= " días, ";
// 	    }

// 	    //horas
// 	    if($fecha->h > 0)
// 	    {
// 	        $tiempo .= $fecha->h;

// 	        if($fecha->h == 1)
// 	            $tiempo .= " hora, ";
// 	        else
// 	            $tiempo .= " horas, ";
// 	    }

// 	    //minutos
// 	    if($fecha->i > 0)
// 	    {
// 	        $tiempo .= $fecha->i;

// 	        if($fecha->i == 1)
// 	            $tiempo .= " minuto";
// 	        else
// 	            $tiempo .= " minutos";
// 	    }
// 	    else if($fecha->i == 0) //segundos
// 	        $tiempo .= $fecha->s." segundos";

// 	    return $tiempo;
// 	}

// 	public function tildes($string){
// 		 $string = htmlentities($string);
// 		 $string = preg_replace('/\&(.)[^;]*;/', '\\1', $string);
// 		 return $string;
// 	}

// 	public function limpiar( $str )
// 	{
// 		$str = $this->tildes($str);
// 		$str = preg_replace(array('/[^a-zA-Z0-9 \'-]/', '/[ -\']+/', '/^-|-$/'), array('', '_', ''), $str);
// 		$str = preg_replace('/-inc$/i', '', $str);
// 		return strtolower($str);
// 	}

// 	public function HayInternet()
// 	{
// 	    $connected = @fsockopen("www.google.com", 80);
// 	    if ($connected){
// 	        fclose($connected);
// 	        return true;
// 	    }
// 	    return false;
// 	}

// 	public function metodoPrincipal()
// 	{
// 		return "/".$this->cl->router->class."/";
// 	}

// 	public function buscarArrayMult($array, $search, $keys = array())
// 	{
// 	    foreach($array as $key => $value) {
// 	        if (is_array($value)) {
// 	            $sub = $this->buscarArrayMult($value, $search, array_merge($keys, array($key)));
// 	            if (count($sub)) {
// 	                return $sub;
// 	            }
// 	        } elseif ($value === $search) {
// 	            return array_merge($keys, array($key));
// 	        }
// 	    }

// 	    return array();
// 	}

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

// 	public function fecha_mysql($fecha)
// 	{
// 		if( ! empty( $fecha ) ){
// 			return date("Y-m-d", strtotime(str_replace("/", "-", $fecha)));
// 		} else {
// 			return '';
// 		}
// 	}

// 	public function formatoFecha($fecha, $verhora=FALSE)
// 	{

// 		$hora = date(' - h:ia', strtotime($fecha)); /* . '+1 hour'*/
// 		if($verhora){
// 			return strftime("%d %B de %Y", strtotime($fecha)) . $hora;
// 		}else{
// 			return strftime("%d %B de %Y", strtotime($fecha));
// 		}
// 	}

// 	public function fecha_campo($fecha)
// 	{
// 		if( ! empty( $fecha ) ){
// 			return date("d/m/Y", strtotime(str_replace("-", "/", $fecha)));
// 		} else {
// 			return '';
// 		}
// 	}

// 	public function json_encode_advanced(array $arr, $sequential_keys = false, $quotes = true, $beautiful_json = false)
// 	{

// 	    $output = $this->isAssoc($arr) ? "{" : "[";
// 	    $count = 0;
// 	    foreach ($arr as $key => $value) {

// 	        if ($this->isAssoc($arr) || (!$this->isAssoc($arr) && $sequential_keys == true )) {
// 	            $output .= ($quotes ? '"' : '') . $key . ($quotes ? '"' : '') . ' : ';
// 	        }

// 	        if (is_array($value)) {
// 	            $output .= $this->json_encode_advanced($value, $sequential_keys, $quotes, $beautiful_json);
// 	        } else if (is_bool($value)) {
// 	            $output .= ($value ? 'true' : 'false');
// 	        } /*else if (is_numeric($value)) {
// 	            $output .= $value;
// 	        }*/ else {
// 	            $output .= ($quotes || $beautiful_json ? '"' : '') . $value . ($quotes || $beautiful_json ? '"' : '');
// 	        }

// 	        if (++$count < count($arr)) {
// 	            $output .= ', ';
// 	        }
// 	    }
// 	    $output .= $this->isAssoc($arr) ? "}" : "]";
// 	    return $output;
// 	}

// 	public function isAssoc(array $arr)
// 	{
// 		 if (array() === $arr) return false;
// 		 return array_keys($arr) !== range(0, count($arr) - 1);
// 	}

// 	public function CrearPDF( $id, $vista, $descargar = TRUE, $nombre = FALSE )
// 	{
// 		$this->load->library('ciqrcode');
// 		$this->load->helper('dompdf');


// 		$data = new stdClass();
// 		$data->vista = "app/pdfs/" . $vista;
// 		$archivo =  "comprobante-" . $id;
// 		if($nombre){
// 			$archivo = $nombre;
// 		}
// 		$data->tipo = $archivo;
// 		$data->id = $id;
// 		$data->descargar = $descargar;

// 		$html = $this->load->view($data->vista, array('id' => $data->id), TRUE);
// 		/*echo $html;
// 		exit;*/
// 		return pdf_create($html, $data->tipo, TRUE, $data->descargar);
// 	}

// 	public function verPDF( $id, $vista, $descargar = TRUE, $nombre = FALSE )
// 	{
// 		$this->load->helper('dompdf');

// 		$data = new stdClass();
// 		$data->vista = "app/pdfs/" . $vista;
// 		$archivo =  "comprobante-" . $id;
// 		if($nombre){
// 			$archivo = $nombre;
// 		}
// 		$data->tipo = $archivo;
// 		$data->id = $id;
// 		$data->descargar = $descargar;

// 		$html = $this->load->view($data->vista, array('id' => $data->id), TRUE);
// 		return pdf_create($html, $data->tipo, TRUE, TRUE, false);
// 	}

// 	public function permisosSeccion($idRol)
// 	{
// 		if( empty( $this->rolSecciones ) ){
// 			$configConsulta = array(
// 				'tabla'       => 'roles',
// 				'seleccionar' => 'secciones',
// 				'nolimite'    => TRUE,
// 				'condiciones' => array(
// 					'id' => $idRol
// 				),
// 				'tipo'        => 'row'
// 			);
// 			$this->rolSecciones = unserialize( $this->sql->consultar( $configConsulta )->secciones );
// 		}

// 	}

// 	public function tienePermiso($idSeccion)
// 	{
// 		$this->permisosSeccion( $this->session->userdata('idRol') );
// 		if(in_array($idSeccion, $this->rolSecciones)){
// 			return TRUE;
// 		}
// 		return FALSE;
// 	}

// 	public function validarPermisos()
// 	{
// 		$this->permisosSeccion( $this->session->userdata('idRol') );
// 		$menu = $this->config->item('menu');
// 		$this->idSeccion = $this->buscarArrayMult($menu, $this->cl->router->class);
// 		if( ! empty($this->idSeccion) ){
// 			if( ! in_array($this->idSeccion[1], $this->rolSecciones)){
// 				show_error('El usuario actual no tiene permisos para visualizar está sección', 200, 'No tienes permisos');
// 			}
// 		} else {
// 			show_error('Permisos del Controlador no encontrados', 200, 'No resultados');
// 		}
// 	}

// 	public function menu()
// 	{
// 		$menu = $this->config->item('menu');

// 		foreach ($menu as $categoria => $items) {

// 			$categoria = '<li class="site-menu-category">'.$categoria.'</li>';
// 			$links     = '';

// 			foreach ($items as $id_menu => $parametros) {

// 				if( ! $this->fn->tienePermiso( $id_menu ) ){
// 					continue;
// 				}
// 				$active = '';
// 				if($this->router->class == $parametros['url']){
// 					$active = "active";
// 				}
// 				$links .= '
// 				<li class="site-menu-item has-sub '.$active.'">
// 					<a href="'.base_url().''. $parametros['url'].'/">
// 					<i class="site-menu-icon '. $parametros['class_icon'].'" aria-hidden="true"></i>
// 					<span class="site-menu-title">'.$parametros['anchor'].'</span>
// 					</a>
// 				</li>
// 				';
// 			}

// 			if($links != ''){
// 				echo $categoria;
// 			}
// 			echo $links;

// 		}
// 	}

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
