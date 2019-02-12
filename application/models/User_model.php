<?php

if (!defined('BASEPATH')) 
    exit('No direct script access allowed');

class User_model extends CI_Model {    

    function insert_user()
    {
        $firstname = $this->input->post('firstname');
        $lastname = $this->input->post('lastname');
        $phonenumber = $this->input->post('phonenumber');
        $email = $this->input->post('email');
        $password = sha1($this->config->item('salt') . $this->input->post('password'));
        $organisation = $this->input->post('organisation');
        $occupation = $this->input->post('occupation');

        $sql = "INSERT INTO users (usrLastName, usrFirstName, usrPhone, usrEmail, usrPassword, occupation_id)
                VALUES(" . $this->db->escape($firstname) . ",
                        " . $this->db->escape($lastname) . ",
                        " . $this->db->escape($phonenumber) . ",
                        '" . $email . "',
                        '" . $password . "',
                        '" . $occupation . "')";
        
        $result = $this->db->query($sql);
        
        if ($this->db->affected_rows() === 1) {
            $this->set_session($firstname, $lastname, $email);
            return $firstname;
        } 
    }

    function set_session($firstname, $lastname, $email)
    {
        $sql = "SELECT id FROM users WHERE usrEmail = '" . $email . "' LIMIT 1";
        $result = $this->db->query($sql);
        $row = $result->row();

        $sess_data = array (
            'user_id' => $row->id,
            'firstname' => $firstname,
            'lastname' => $lastname, 
            'email' => $email,
            'logged_in' => 0
        );
        $this->session->set_userdata($sess_data);
    }
}