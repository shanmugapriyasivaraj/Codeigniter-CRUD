<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crud_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }
    function getAllData() {
        $query = $this->db->query('SELECT * FROM employee');
        return $query->result();
    }
}