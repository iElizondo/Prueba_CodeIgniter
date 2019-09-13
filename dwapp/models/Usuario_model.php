<?php
class Usuario_model extends CI_Model {
    public function __construct()
    {
        $this->load->database();
    }

    public function get_usuarios($id = FALSE)
    {
        if ($id === FALSE)
        {
            $query = $this->db->get('usuarios');
            return $query->result_array();
        }

        $query = $this->db->get_where('usuarios', array('id' => $id));
        return $query->row_array();
    }

    public function set_usuarios($id = NULL)
    {
        $data = array(
            'usuario' => $this->input->post('usuario'),
            'contrasena' => $this->input->post('contrasena'),
            'nombre' => $this->input->post('nombre'),
            'rol' => $this->input->post('rol')
        );
        if($id) {
            if($data['contrasena']){
                $data['contrasena'] = password_hash($data['contrasena'], PASSWORD_DEFAULT);
            }
            $this->db->where('id', $id);
            $this->db->update('usuarios', $data);
        } else {
            $data['contrasena'] = password_hash($data['contrasena'], PASSWORD_DEFAULT);
            return $this->db->insert('usuarios', $data);
        }
        
    }

    public function delete_usuarios($id = NULL)
    {
        if($id) {
            $this->db->where('id', $id);
            $this->db->delete('usuarios'); 
        }            
    }
}