<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Images extends CI_Controller {

	var $image;
	public function __construct() {
		parent::__construct();
		
		$this->load->model('imagemodel', 'images');
	}
	public function index() {
		$this->form_validation->set_rules('image', 'Image', 'callback_check_image');
		$this->form_validation->set_error_delimiters('<span style="color:red">', '</span>');
		if($this->form_validation->run()) {
			$data = array(
				'image' => base_url('uploads/images/'.$this->image)
			);
			$response = $this->images->save($data);
			if($response) {
				$this->session->set_flashdata('msg', 'Image has been upoaded successfully');
			} else {
				$this->session->set_flashdata('error', 'Something went wrong. Try after some time.');
			}
			redirect(base_url('images'));
		}
		$this->load->view('images/index');
	}
	
	public function check_image(){
        $image = $this->do_upload('image');
        if(isset($image['error'])){
            $this->form_validation->set_message('check_image', $image['error']);
            return false;
        } else {
            $this->image = $image['upload_data']['file_name'];
            return true;
        }
    }
	
	public function do_upload($name) {
        $config['upload_path'] = './uploads/images/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size'] = 0;
        $config['overwrite'] = FALSE;
        //$config['max_width'] = 1024;
        //$config['max_height'] = 768;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload($name)) {
            $error = array('error' => $this->upload->display_errors());
            return $error;
        } else {
            $data = array('upload_data' => $this->upload->data());
            return $data;
        }
    }
}
