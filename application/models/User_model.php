<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
    public function getDataUser()
    {
        $query = "SELECT `user`.*, `user_role`.`role`
                    FROM `user` JOIN `user_role`
                    ON `user`.`role_id` = `user_role`.`id`
                ";
        return $this->db->query($query)->result_array();
    }

    public function editdatauser($id)
    {
        $data = [
            'name' => htmlspecialchars($this->input->post('name', true)),
            'email' => htmlspecialchars($this->input->post('email', true)),
            'image' => 'default.png',
            'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
            'role_id' => $this->input->post('role_id', true),
            // 'role_id' => 2,
            'is_active' => 1,
            'date_created' => time()
        ];
        $this->db->where('id', $id);
        return $this->db->update('user', $data);
    }

    public function hapusdatauser($id)
    {
        $this->db->where('id', $id);
        // $this->db->where('user.id <> 7');
        $this->db->delete('user');

        // $this->db->select('id');
        // $this->db->from('user');
        // $this->db->where('user.role_id', $id);

        // $query = $this->db->get();
        // if ($query->num_rows() > 0) {
        //     echo "data user tidak bisa dihapus";
        // } else {
        //     $this->db->where('role.role_id', $id);
        //     $this->db->where('role.role_id <> 7');
        // }
    }
}
