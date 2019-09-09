<?php
class Cliente_model extends CI_Model {
    public function __construct()
    {
        $this->load->database();
    }

    public function get_clientes($id = FALSE)
    {
        if ($id === FALSE)
        {
            $query = $this->db->get('clientes');
            return $query->result_array();
        }

        $query = $this->db->get_where('clientes', array('id' => $id));
        return $query->row_array();
    }

    public function set_cliente($id = NULL)
    {
        $data = array(
            'id_usuario' => $this->session->userdata('id_usuario'),
            'nombre' => $this->input->post('nombre_completo'),
            'telefono' => $this->input->post('telefono'),
            'correo' => $this->input->post('correo'),
            'tipo_id' => $this->input->post('tipo'),
            'identificacion' => $this->input->post('identificacion'),
            'provincia' => $this->input->post('provincia'),
            'canton' => $this->input->post('canton'),
            'distrito' => $this->input->post('distrito'),
            'otrassenas' => $this->input->post('otras_senas')
        );
        if($id) {
            $this->db->where('id', $id);
            $this->db->update('clientes', $data);
        } else {
            return $this->db->insert('clientes', $data);
        }
    }
}