<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Home extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Data_model');
    }
    
    public function index(){
        $this->load->view('view_counter');
        
    }

    public function load_pemenang($id_group){
        $data = $this->Data_model->get_data($id_group);
        echo '<table class="table table-hover table-striped">
        <thead>
          <tr>
            <th>No.</th>
            <th>No Pelanggan</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Hadiah</th>
            <th>Tanggal Pengundian</th>
          </tr>
        </thead>
        <tbody>';
        $no=1;
        foreach ($data as $r) {
            echo '<tr>
                        <td>'.$no.'</td>
                        <td>'.$r->NOSAMW.'</td>
                        <td>'.$r->NAMA.'</td>
                        <td>'.$r->ALAMAT.'</td>
                        <td>'.$r->hadiah.'</td>
                        <td>'.$r->tanggal_pengundian.'</td>
                    </tr>';
            $no++;
        }
          
        echo '</tbody> </table>';
    }

    public function undian_allcabang(){
        $data = $this->Data_model->get_allcabang();
        if(!empty($data)){
            $object = ['hadiah' => $this->input->post('hadiah'), 'tanggal_pengundian' => Date('Y-m-d H:i:s')];
            $affected = $this->Data_model->update_hadiah('all_cabang', $object, ['id' => $data['id']]);
            if($affected > 0){
                $arr['NOSAMW'] = $data['NOSAMW'];
                $arr['success'] = true;
                echo json_encode($arr);
            } else {
                $arr['message_err'] = 'Failed!';
                $arr['success'] = false;
                echo json_encode($arr);
            }
        } else {
            $arr['message_err'] = 'Data Peserta Undian Tidak Ada!';
            $arr['success'] = false;
            echo json_encode($arr);
        }
    }

    public function undian_ajb(){
        $data = $this->Data_model->get_ajb();
        if(!empty($data)){
            $object = ['hadiah' => $this->input->post('hadiah'), 'tanggal_pengundian' => Date('Y-m-d H:i:s')];
            $affected = $this->Data_model->update_hadiah('all_cabang', $object, ['id' => $data['id']]);
            if($affected > 0){
                $arr['NOSAMW'] = $data['NOSAMW'];
                $arr['success'] = true;
                echo json_encode($arr);
            } else {
                $arr['message_err'] = 'Failed!';
                $arr['success'] = false;
                echo json_encode($arr);
            }
        } else {
            $arr['message_err'] = 'Data Peserta Undian Tidak Ada!';
            $arr['success'] = false;
            echo json_encode($arr);
        }
    }

    public function undian_pwt1(){
        $data = $this->Data_model->get_pwt1();
        if(!empty($data)){
            $object = ['hadiah' => $this->input->post('hadiah'), 'tanggal_pengundian' => Date('Y-m-d H:i:s')];
            $affected = $this->Data_model->update_hadiah('all_cabang', $object, ['id' => $data['id']]);
            if($affected > 0){
                $arr['NOSAMW'] = $data['NOSAMW'];
                $arr['success'] = true;
                echo json_encode($arr);
            } else {
                $arr['message_err'] = 'Failed!';
                $arr['success'] = false;
                echo json_encode($arr);
            }
        } else {
            $arr['message_err'] = 'Data Peserta Undian Tidak Ada!';
            $arr['success'] = false;
            echo json_encode($arr);
        }
    }

    public function undian_pwt2(){
        $data = $this->Data_model->get_pwt2();
        if(!empty($data)){
            $object = ['hadiah' => $this->input->post('hadiah'), 'tanggal_pengundian' => Date('Y-m-d H:i:s')];
            $affected = $this->Data_model->update_hadiah('all_cabang', $object, ['id' => $data['id']]);
            if($affected > 0){
                $arr['NOSAMW'] = $data['NOSAMW'];
                $arr['success'] = true;
                echo json_encode($arr);
            } else {
                $arr['message_err'] = 'Failed!';
                $arr['success'] = false;
                echo json_encode($arr);
            }
        } else {
            $arr['message_err'] = 'Data tidak ada!';
            $arr['success'] = false;
            echo json_encode($arr);
        }
    }

    public function undian_bms(){
        $data = $this->Data_model->get_bms();
        if(!empty($data)){
            $object = ['hadiah' => $this->input->post('hadiah'), 'tanggal_pengundian' => Date('Y-m-d H:i:s')];
            $affected = $this->Data_model->update_hadiah('all_cabang', $object, ['id' => $data['id']]);
            if($affected > 0){
                $arr['NOSAMW'] = $data['NOSAMW'];
                $arr['success'] = true;
                echo json_encode($arr);
            } else {
                $arr['message_err'] = 'Failed!';
                $arr['success'] = false;
                echo json_encode($arr);
            }
        } else {
            $arr['message_err'] = 'Data Peserta Undian Tidak Ada!';
            $arr['success'] = false;
            echo json_encode($arr);
        }
    }

    public function undian_wangon(){
        $data = $this->Data_model->get_wangon();
        if(!empty($data)){
            $object = ['hadiah' => $this->input->post('hadiah'), 'tanggal_pengundian' => Date('Y-m-d H:i:s')];
            $affected = $this->Data_model->update_hadiah('all_cabang', $object, ['id' => $data['id']]);
            if($affected > 0){
                $arr['NOSAMW'] = $data['NOSAMW'];
                $arr['success'] = true;
                echo json_encode($arr);
            } else {
                $arr['message_err'] = 'Failed!';
                $arr['success'] = false;
                echo json_encode($arr);
            }
        } else {
            $arr['message_err'] = 'Data Peserta Undian Tidak Ada!';
            $arr['success'] = false;
            echo json_encode($arr);
        }
    }

}