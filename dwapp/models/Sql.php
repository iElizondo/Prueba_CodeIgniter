<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Sql extends CI_Model {

	/* Variable de instancia del controlador */
	private $cl;
	public  $pagina_act = 0,
			  $paginacion = '';

	function __construct()
	{
		$this->cl  =& get_instance();
		if( $this->input->get('pagina') != '' ){
			$this->pagina_act = $this->input->get('pagina');
		}
	}

	// public function query($query)
	// {
	// 	return $this->db->query( $query );
	// }

	function consultar ( $data )
	{
		/*$noclause = FALSE;
		if( ! empty($data['noclause']) ){
			$noclause = TRUE;
		}*/
		$clause = (($this->pagina_act - 1) * $this->fn->row_x_page);
		if($this->pagina_act == 0){ /*or $noclause == TRUE*/
			$clause = 0;
		}

		if( empty($data['seleccionar']) ){
			$data['seleccionar'] = $data['tabla'] . '.*';
		}
		if(is_array($data['seleccionar'])){
			$cantidad = 1;
			foreach ($data['seleccionar'] as $k => $campo) {
				if($cantidad == 1){
					$this->db->select( 'SQL_CALC_FOUND_ROWS ' . $data['tabla'] . '.' . $campo, FALSE);
					$cantidad++;
				} else {
					$this->db->select( $data['tabla'] . '.' . $campo );
				}
			}
		} else {
			$this->db->select( 'SQL_CALC_FOUND_ROWS ' . $data['seleccionar'], FALSE);
		}

		if( !empty($data['tabla']) ){
			$this->db->from($data['tabla']);
		}
		if( !empty($data['join']) ){
			$this->db->join($data['join']['tabla'], $data['join']['tabla'] . '.'.$data['join']['campo1'].' = '.$data['tabla'].'.' . $data['join']['campo2']);

			if($data['join']['seleccionar']){
				foreach ($data['join']['seleccionar'] as $k => $campo) {
					$this->db->select( $data['join']['tabla'] . '.' . $campo );
				}
			}


		}


		if ( ! empty($data['condiciones']) ) {
			if( is_array( $data['condiciones'] ) ){
				foreach ($data['condiciones'] as $key => $value) {
					$this->db->where( $data['tabla'] . '.' . $key, $value );
				}
			}

		} else {

			$data['buscar'] = $this->fn->getBuscar();
			if( ! empty( $data['buscar'] ) ){

				$campos_a_buscar = array();
				$campos_en_db    = $this->query("SHOW COLUMNS FROM " . $data['tabla'])->result();
				foreach ($campos_en_db as $key => $reg) {
					$campos_a_buscar[$data['tabla'].'.'.$reg->Field] = $data['buscar'];
				}

				if($data['tabla'] == 'facturas'){
					$campos_en_db    = $this->query("SHOW COLUMNS FROM claves")->result();
					foreach ($campos_en_db as $key => $reg) {
						$campos_a_buscar['claves.'.$reg->Field] = $data['buscar'];
					}
					$this->db->join('claves', "`claves`.`id_factura` = `facturas`.`id` AND `claves`.`documento` = `facturas`.`documento` AND `claves`.`estado` = 'aceptado'");
				}

				$this->db->or_like( $campos_a_buscar );

				if( !empty($data['join']) ){
					$campos_a_buscar = array();
					$campos_en_db    = $this->query("SHOW COLUMNS FROM " . $data['join']['tabla'])->result();
					foreach ($campos_en_db as $key => $reg) {
						$campos_a_buscar[$data['join']['tabla'].'.'.$reg->Field] = $data['buscar'];
					}
					$this->db->or_like( $campos_a_buscar );
				}
				
			}

		}

		if ( ! empty($data['condiciones_or']) ) {
			if( is_array( $data['condiciones_or'] ) ){
				foreach ($data['condiciones_or'] as $key => $value) {
					$this->db->or_where( $data['tabla'] . '.' . $key, $value );
				}
			}

		}

		if ( ! empty($data['in']) ) {
			if( is_array( $data['in'] ) ){
				foreach ($data['in'] as $key => $value) {
					$this->db->where_in( $data['tabla'] . '.' . $key, $value );
				}
			}
		}

		if( empty($data['nolimite']) ){
			$this->db->limit($this->fn->row_x_page, $clause);
		}

		if( isset($data['order']) ){
			$this->db->order_by($data['tabla'] . '.' . $data['order']['campo'], $data['order']['tipo']);
		} else {
			$this->db->order_by($data['tabla'] . '.id', 'DESC');
		}



		$consulta = $this->db->get(); /*echo $this->db->last_query();*/

		$found_rows = $this->db->query('SELECT FOUND_ROWS() AS total')->row();
		$this->paginacion = $this->fn->paginacion( $found_rows->total );

		switch ($data['tipo']) {
			case 'row':
				return $consulta->row();
			break;
			case 'result':
				return $consulta->result();
			break;
			case 'result_array':
				return $consulta->result_array();
			break;
		}
	}


// 	function insertar ( $config )
// 	{
// 		$config = $this->ValConfig( $config );

// 		if( isset($config['data']) and !empty($config['data']) ){
// 			$data = $config['data'];
// 			$ejecutar = TRUE;
// 		} else {
// 			$data = $this->FiltrarPost($config['fn1']);
// 			$ejecutar = ! empty($data) && $this->formulario->validar() ? TRUE : FALSE;
// 		}

// 		$columnUsuario = $this->query("SHOW COLUMNS FROM ".$config['tabla']." WHERE Field = 'id_usuario'")->num_rows();

// 		if($columnUsuario){
// 			$data['id_usuario'] = $this->session->userdata('id_usuario');
// 		}
		

// 		if( $ejecutar )
// 		{
// 		    if($config['tabla'] == 'facturas'){
// 		        $data['fecha_registro'] = date("Y-m-d H:i:s");
// 		    }
// 			$this->db->insert($config['tabla'], $data);
// 			$id = $this->db->insert_id();

// 			if ( isset($config['fn2']) ) {
// 				$this->FnCL($config['fn2'], $id);
// 			}

// 			return $id;
// 		}

// 	}

// 	function actualizar ( $config )
// 	{
// 		$config = $this->ValConfig( $config );

// 		if( isset($config['data']) and !empty($config['data']) ){
// 			$data = $config['data'];
// 			$ejecutar = TRUE;
// 		} else {
// 			$data = $this->FiltrarPost($config['fn1']);
// 			$ejecutar = ! empty($data) && $this->formulario->validar($config['where']) ? TRUE : FALSE;
// 		}

// 		if( $ejecutar )
// 		{

// 			$this->db->where($config['where']);
// 			$this->db->update($config['tabla'], $data);

// 			if ( isset($config['fn2']) ) {
// 				$this->FnCL($config['fn2'], $config['where']['id']);
// 			}

// 			if( isset($config['where']['id']) ){
// 				return $config['where']['id'];
// 			}
// 		}

// 	}

// 	/*function actualizar ( $tabla, $where, $fn = NULL )
// 	{
// 		$data = $this->FiltrarPost($fn);

// 		if( ! empty($data) and $this->formulario->validar($where) == TRUE )
// 		{
// 			$this->db->where($where);
// 			return $this->db->update($tabla, $data);
// 		}
// 	}*/

// 	function eliminar ( $tabla, $where)
// 	{
// 		if( ! empty($where) )
// 		{
// 			$this->db->where($where);
// 			return $this->db->delete($tabla);
// 		}
// 	}

// 	/* Funciones Internas */

// 	private function FiltrarPost($fn)
// 	{
// 		$data = $this->input->post(NULL, TRUE);

// 		unset($data['form']);
// 		unset($data['accion']);



// 		if( !empty( $data ) ){
// 			$data = $this->FnCL($fn, $data);

// 			if( is_array($data) )
// 			{

// 				/* Serializamos los Arrays */
// 				foreach ($data as $key => $value) {
// 					if(is_array($value)){
// 						$data_return[$key] = serialize($value);
// 					} else {
// 						$data_return[$key] = $value;
// 					}
// 				}
// 				return $data_return;
// 			} else {
// 				show_error('Los datos para SQL no son array', 200, 'Datos no válidos');
// 			}
// 		}

// 	}

// 	/* Ejecuta función del controlador */

// 	private function FnCL($fn, $data = NULL)
// 	{
// 		if( $fn != NULL )
// 		{
// 			if( method_exists($this->cl, $fn) )
// 			{
// 				$data = $this->cl->$fn( $data );
// 			} else {
// 				show_error('CL: ' . $this->cl->router->class, 200, 'Método "<b>'.$fn.'</b>" no encontrado');
// 			}
// 		}

// 		return $data;

// 	}

// 	/* Validar cofiguración de consultas */

// 	private function ValConfig($config)
// 	{
// 		if(is_array($config)){
// 			$campos = array('tabla', 'data', 'fn1', 'fn2', 'where', 'join', 'nolimite', 'order');
// 			foreach ($campos as $k => $key) {
// 				if(!array_key_exists($key, $config)){
// 					$config[$key] = NULL;
// 				}
// 			}
// 			return $config;
// 		} else {
// 			show_error('CL: ' . $this->cl->router->class, 200, 'Config SQL no tiene formato Array');
// 		}
// 	}

}
