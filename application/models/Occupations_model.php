<?php

if(!defined('BASEPATH'))
    exit('No direct script access allowed');

class Occupations_model extends CI_Model {

    function all_organizations()
    {
        $sql = "SELECT * FROM organisations";
        $query = $this->db->query($sql);
        return $query->result();
    }

    function all_occupations()
    {
        $sql = "SELECT * FROM occupations";
        $query = $this->db->query($sql);
        return $query->result();
    }
}