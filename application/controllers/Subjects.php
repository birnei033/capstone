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

	private function alert($message = "", $type = 'default'){
		$alert = '<div class="alert alert-'.$type.'" id="subject-alert">';
		$alert .= '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
		$alert .= '	<i class="fa fa-close"></i>';
		$alert .= '</button>';
		$alert .= '<span id="alert-text">';
		$alert .= $message;
		$alert .= '</span>';
		$alert .= '</div>';
		return $alert;
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

	// public function index()
	// {
	// 	$this->load->view('includes/head');
	// 	$this->load->view('includes/top-navigation');
	// 	$this->load->view('includes/left-navigation');
	// 	$this->load->view('subjects/addsubject');
	// 	$this->load->view('includes/footer');
	// }
	public function index(){
		$data['subjects'] = $this->subjects_model->getAll();
		$this->view("subjects/addSubject", $data);
	}

	public function add(){
		$subj_name = $this->input->post('subj-name');
		$dataType = $this->input->post('data-type');
		if($dataType == 'ajax'){
			if (empty($subj_name) || is_null($subj_name)) {
				echo json_encode(array("status" => FALSE, "alert"=>$this->alert("Please Fill the Field", 'danger')));
			}else{
				$data = array(
					'subject_title' => $this->input->post('subj-name'),
					'create_on' => date('Y-d-m')
				);
				$add = $this->subjects_model->add($data);
				echo json_encode(array("status" => TRUE));
			}
		}
	}

	public function delete(){
		$id = $this->input->post('subj_id');
		$dataType = $this->input->post('data_type');
		if($dataType == "ajax"){	
			$delete_result = $this->subjects_model->delete($id);
			echo json_encode(array("status" => $delete_result));
		}
	}

	public function getById($id){
		$result = $this->subjects_model->getSubjectByID($id);
		echo json_encode(array("subject"=>$result[0]));
	}
	public function update($id){
		$dataType = $this->input->post('data-type');
		if($dataType == 'ajax'){
			$data = array(
				'subject_title'=> $this->input->post('subj-name'),
				'subject_id' => $id,
				'updated_on'=>date('Y-d-m')
			);
			$updateResult = $this->subjects_model->update($data);
			echo json_encode(array("status" => $updateResult));
		}
	}
	public function test(){
		$this->load->view('includes/head');
		$this->load->view('includes/top-navigation');
		$this->load->view('includes/left-navigation');
		$this->load->view('blank');
		$this->load->view('includes/footer');
	}
}
