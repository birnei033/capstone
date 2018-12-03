<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subjects extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->helper('url');
        $this->load->model('subjects_model');
	}
	public function index()
	{
		$this->load->view('includes/head');
		$this->load->view('includes/top-navigation');
		$this->load->view('includes/left-navigation');
		$this->load->view('subjects/subjects');
		$this->load->view('includes/footer');
	}
	public function addSubject(){
		$data['subjects'] = $this->subjects_model->getAll();
		$this->load->view('includes/head');
		$this->load->view('includes/top-navigation');
		$this->load->view('includes/left-navigation');
		$this->load->view('subjects/addSubject', $data);
		$this->load->view('includes/footer');
	}

	public function add(){
		$sata = array(
			'subject_title' => $this->input->post('subj-name'),
			'create_on' => now()
		);
		$add = $this->subject_model->add($data);
		echo json_encode(array("status" => TRUE));
	}

	public function delete($id){
		$this->subjects_model->delete($id);
		echo json_encode(array("status" => TRUE));
	}
}
