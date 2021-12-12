<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_model extends CI_Model{

    public function update_hadiah($table, $object, $where){
        $this->db->where($where);
        $this->db->update($table, $object);
        return $this->db->affected_rows();
    }

    public function get_data($id_group){
        if ($id_group == 2) {
            // $table = "ajb";
            $this->db->where('id_cabang = "0600" ');
        } else if ($id_group == 3) {
            // $table = "bms";
            $this->db->where('id_cabang = "0400" ');
        } else if ($id_group == 4) {
            // $table = "pwt1";
            $this->db->where('id_cabang = "0200" ');
        } else if ($id_group == 5) {
            // $table = "pwt2";
            $this->db->where('id_cabang = "0300" ');
        } else if ($id_group == 6) {
            // $table = "wangon";
            $this->db->where('id_cabang = "0500" ');
        }
        $this->db->where('hadiah !="" ');
        $this->db->order_by('tanggal_pengundian', 'desc');
        return $this->db->get('all_cabang')->result();
    }

    public function get_data_2($id_group){
        if ($id_group == 2) {
            // $table = "ajb";
            $this->db->where('id_cabang = "0600" ');
        } else if ($id_group == 3) {
            // $table = "bms";
            $this->db->where('id_cabang = "0400" ');
        } else if ($id_group == 4) {
            // $table = "pwt1";
            $this->db->where('id_cabang = "0200" ');
        } else if ($id_group == 5) {
            // $table = "pwt2";
            $this->db->where('id_cabang = "0300" ');
        } else if ($id_group == 6) {
            // $table = "wangon";
            $this->db->where('id_cabang = "0500" ');
        }
        $this->db->where('hadiah !="" ');
        $this->db->order_by('tanggal_pengundian', 'desc');
        return $this->db->get('all_cabang', 1)->result();
    }

    public function get_allcabang(){
        $sql  = "select * FROM all_cabang where hadiah='' or hadiah is null ORDER BY RAND() LIMIT 1;";
        $data = $this->db->query($sql);
        return $data->row_array();
    }


    public function get_ajb(){
        $sql  = "select * FROM all_cabang where id_cabang='0600' and ( hadiah='' or hadiah is null ) ORDER BY RAND() LIMIT 1;";
        $data = $this->db->query($sql);
        return $data->row_array();
    }

    public function get_pwt1(){
        $sql  = "select * FROM all_cabang where id_cabang='0200' and ( hadiah='' or hadiah is null )  ORDER BY RAND() LIMIT 1;";
        $data = $this->db->query($sql);
        return $data->row_array();
    }

    public function get_pwt2(){
        $sql  = "select * FROM all_cabang where id_cabang='0300' and ( hadiah='' or hadiah is null )  ORDER BY RAND() LIMIT 1;";
        $data = $this->db->query($sql);
        return $data->row_array();
    }

    public function get_bms(){
        $sql  = "select * FROM all_cabang where id_cabang='0400' and ( hadiah='' or hadiah is null )  ORDER BY RAND() LIMIT 1;";
        $data = $this->db->query($sql);
        return $data->row_array();
    }

    public function get_wangon(){
        $sql  = "select * FROM all_cabang where id_cabang='0500' and ( hadiah='' or hadiah is null )  ORDER BY RAND() LIMIT 1;";
        $data = $this->db->query($sql);
        return $data->row_array();
    }

}