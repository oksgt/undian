<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_model extends CI_Model{

    public function update_hadiah($table, $object, $where){
        $this->db->where($where);
        $this->db->update($table, $object);
        return $this->db->affected_rows();
    }

    public function get_data($table){
        $this->db->where('hadiah != "" ');
        $this->db->order_by('tanggal_pengundian', 'desc');
        return $this->db->get($table)->result();
    }

    public function get_allcabang(){
        $sql  = "select * FROM all_cabang where hadiah='' or hadiah is null ORDER BY RAND() LIMIT 1;";
        $data = $this->db->query($sql);
        return $data->row_array();
    }


    public function get_ajb(){
        $sql  = "select * FROM ajb where hadiah='' or hadiah is null ORDER BY RAND() LIMIT 1;";
        $data = $this->db->query($sql);
        return $data->row_array();
    }

    public function get_pwt1(){
        $sql  = "select * FROM pwt1 where hadiah='' or hadiah is null ORDER BY RAND() LIMIT 1;";
        $data = $this->db->query($sql);
        return $data->row_array();
    }

    public function get_pwt2(){
        $sql  = "select * FROM pwt2 where hadiah='' or hadiah is null ORDER BY RAND() LIMIT 1;";
        $data = $this->db->query($sql);
        return $data->row_array();
    }

    public function get_bms(){
        $sql  = "select * FROM bms where hadiah='' or hadiah is null ORDER BY RAND() LIMIT 1;";
        $data = $this->db->query($sql);
        return $data->row_array();
    }

    public function get_wangon(){
        $sql  = "select * FROM wangon where hadiah='' or hadiah is null ORDER BY RAND() LIMIT 1;";
        $data = $this->db->query($sql);
        return $data->row_array();
    }

}