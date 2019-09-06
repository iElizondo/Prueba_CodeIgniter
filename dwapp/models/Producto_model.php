<?php
class Producto_model extends CI_Model {
    public function __construct()
    {
        $this->load->database();
    }

    public function get_producto($id = FALSE)
    {
        if ($id === FALSE)
        {
            $query = $this->db->get('servicios');
            return $query->result_array();
        }

        $query = $this->db->get_where('servicios', array('id' => $id));
        return $query->row_array();
    }

    public function set_producto($id = NULL)
    {
        $this->load->helper('url');

        $data = array(
            'id_usuario' => $this->session->userdata('id_usuario'),
            'nombre' => $this->input->post('nombre'),
            'tipo' => $this->input->post('tipo'),
            'tarifa_iva' => $this->input->post('tarifa'),
            'medida' => $this->input->post('medida')
        );
        if($id) {
            $this->db->where('id', $id);
            $this->db->update('servicios', $data);
        } else {
            return $this->db->insert('servicios', $data);
        }
    }

    public function delete_producto($id = NULL)
        {
                if($id) {
                        $this->db->where('id', $id);
                        $this->db->delete('servicios'); 
                }
                 
        }
}