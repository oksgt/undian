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

    public function allcabang(){
        $data = $this->Data_model->get_allcabang();
        if(!empty($data)){
            $object = ['hadiah' => 'BMW'];
            $affected = $this->Data_model->update_hadiah('all_cabang', $object, ['id' => $data['id']]);
            if($affected > 0){
                $arr['NOSAMW'] = $data['NOSAMW'];
                $arr['success'] = true;
                echo json_encode($arr);
            } else {
                $arr['NOSAMW'] = $data['NOSAMW'];
                $arr['success'] = false;
                echo json_encode($arr);
            }
        }
        
    }

}