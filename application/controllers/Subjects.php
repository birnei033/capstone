<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subjects extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('subjects_model');
		$this->load->library('user_agent');
		$this->load->helper('date');
	}
	
	private function view($view, $data = "", $single = false){
		if ($single) {
			$this->load->view('includes/head');
			$this->load->view($view, $data);
		}else{
			$this->load->view('includes/head');
			$this->load->view('includes/top-navigation');
			$this->load->view('includes/left-navigation');
			$this->load->view($view, $data);
			$this->load->view('includes/footer');
		}
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
		$subj_name = $this->input->post('subj-name');
		if (empty($subj_name) || is_null($subj_name)) {
			$data = array(
				'heading'=>"Sorry, you are not allowed",
				 'message'=> "<p>This is a restricted area <a href='#' onclick='history.go(-1);' class=''>Go Back</a></p>");
			$this->view('error_404', $data , true);
		}else{
		
			$data = array(
				'subject_title' => $this->input->post('subj-name'),
				'create_on' => date('Y-d-m')
			);
			$add = $this->subjects_model->add($data);
			echo json_encode(array("status" => TRUE));
		}
	}

	public function delete($id){
		$delete_result = $this->subjects_model->delete($id);
		echo json_encode(array("status" => $delete_result));
	}

	public function getById($id){
		$result = $this->subjects_model->getSubjectByID($id);
		echo json_encode(array("subject"=>$result[0]));
	}
}
