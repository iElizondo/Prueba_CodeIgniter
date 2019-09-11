<?php
class Rol_model extends CI_Model {
    public function __construct()
    {
        $this->load->database();
    }

    public function get_roles($id = FALSE)
    {
        if ($id === FALSE)
        {
            $query = $this->db->get('roles');
            return $query->result_array();
        }

        $query = $this->db->get_where('roles', array('id' => $id));
        return $query->row_array();
    }

    public function set_roles($id = NULL)
    {
        $data = array(
            // 'nombre' => $this->input->post('rol'),
            // 'tipo' => $this->input->post('secciones')
        );
        if($id) {
            $this->db->where('id', $id);
            $this->db->update('servicios', $data);
        } else {
            return $this->db->insert('servicios', $data);
        }
    }
}