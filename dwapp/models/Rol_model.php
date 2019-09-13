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
            'rol' => $this->input->post('rol'),
            'secciones' => $this->input->post('permisos')
        );
        
        foreach ($data as $key => $value) {
            if(is_array($value)){
                $data[$key] = serialize($value);
            } else {
                $data[$key] = $value;
            }
        }
        if($id) {
            $this->db->where('id', $id);
            $this->db->update('roles', $data);
        } else {
            return $this->db->insert('roles', $data);
        }
        
    }

    public function delete_producto($id = NULL)
    {
        if($id) {
                $this->db->where('id', $id);
                $this->db->delete('roles'); 
        }            
    }
}