<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ImageModel extends CI_Model {
	
	public function save($data) {
		$this->db->insert('images', $data);
		return ($this->db->affected_rows() != 1) ? false : true;
	}
}