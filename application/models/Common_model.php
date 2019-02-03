<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Common_model extends CI_Model {

	public function __construct()
	{
        parent::__construct();
        $this->load->helper('date');
		$this->load->database();
    }

    public function get_where($table, $query){
        $query = $this->db->get_where($table, $query);
		return  $query->result();
    }

    public function get($table){
        $query = $this->db->get($table);
        return  $query->result();
    }

    // public function join($table, $joins=array(), $where =""){
    //     $this->db->select('*');
    //     $this->db->from($table);
    //     foreach ($joins as $join) {
    //         // var_dump($join);
    //         $this->db->join($join['table'], $join['where'], 'INNER');
    //     }
    //     // $this->db->where($where);
    //     $query = $this->db->get();
    //     return $query->result();
    // }

    public function query($q){
        $query = $this->db->query($q);
        return $query->result();
    }
    public function insert($table, $data){
        $add = $this->db->insert($table, $data);
        return $this->db->insert_id();
    }
    public function update($table, $where, $data = ""){
        $this->db->set($data);
        if (is_array($where)) {
            foreach ($where as $key => $value) {
                $this->db->where($key, $value);
            }
        }else{
            $this->db->where($where);
        }
        return $this->db->update($table);
    }

    public function delete($table, $where){
        return $this->db->delete($table, $where);
    }

    public function join($table, $joins = array(), $where = "", $column = "*"){
        $this->db->select($column);
        $this->db->from($table);
        foreach ($joins as $join) {
            $this->db->join(empty($join['table']) ? "" : $join['table'], empty($join['on']) ? "" : $join['on'], "INNER");
        }
        if ($where != "") {
            $this->db->where($where);
        }
        $query = $this->db->get();
        return $query->result();
    }
}