<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subjects extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('subjects_model');
		$this->load->helper('url');
		$this->load->library(array('user_agent', 'functions', 'session'));
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

	public function index(){
		$this->functions->is_admin();
		$data['subjects'] = $this->subjects_model->getAll();
		$this->view("subjects/addSubject", $data);
	}

	public function ajax_get_subject(){
		$subjects = $this->subjects_model->ajax_getAllSubjects();
		$data = array();
		foreach ($subjects as $subject) {
			$temp['subject_id'] = $subject->subject_id;
			$temp['subject_title'] = $subject->subject_title;
			$temp['number_of_lessons'] = $subject->number_of_lessons;
			$temp['tools'] = '<a class="update open-modal btn btn-primary waves-effect waves-light ml-2 p-1" data="update" data-modal="modal-2" subj_id="'.$subject->subject_id.'" href="#">Edit</a>
								<a class="delete btn btn-danger waves-effect waves-light ml-2 p-1" subj_id="'.$subject->subject_id.'" href="#">Delete</a>';
			$data[] = $temp;
		}
		$out['data'] = $data;
		echo json_encode($out); 
	}

	public function add(){
		$this->functions->is_admin();
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
				// echo json_encode(array("status" => $add));
				redirect(teacher_base('subjects'), 'refresh');
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
		$this->functions->is_admin();
		$result = $this->subjects_model->getSubjectByID($id);
		echo json_encode(array("subject"=>$result[0]));
	}
	public function update($id){
		$this->functions->is_admin();
		$dataType = $this->input->post('data-type');
		if($dataType == 'ajax'){
			$data = array(
				'subject_title'=> $this->input->post('subj-name'),
				'subject_id' => $id,
				'updated_on'=>date('Y-d-m')
			);
			$updateResult = $this->subjects_model->update($data);
			// echo json_encode(array("status" => $updateResult));
			redirect(teacher_base('subjects'));
		}
	}
}
