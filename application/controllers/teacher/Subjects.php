<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subjects extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Subjects_Model');
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
		teacher_logged();
		$data['subjects'] = $this->Subjects_Model->getAll();
		$this->view("subjects/addSubject", $data);
	}

	public function ajax_get_subject(){
		$subjects = $this->Subjects_Model->ajax_getAllSubjects(teacher_session('id'));
		$out['trashed'] = $this->Subjects_Model->ajax_getAllSubjects(teacher_session('id'), 1);
		$data = array();	
		foreach ($subjects as $subject) {
			$lesson_count = $this->db->query('SELECT COUNT(subject_id) AS \'lesson\' FROM lessons WHERE subject_id = '.$subject->subject_id )->result()[0]->lesson;
			// $temp['subject_id'] = $subject->subject_id;
			$temp['subject_title'] = $subject->subject_title;
			$temp['number_of_lessons'] = $lesson_count;
			$temp['tools'] = '<a '.tooltip("Rename").' onclick="update_subject('.$subject->subject_id.', \''.teacher_base("subjects/").'\')" style="font-size:21px; vertical-align:middle; " class="text-c-inverse waves-effect waves-light ml-2 p-1" href="#"><i class="ti-pencil-alt"></i></a>
								<a '.tooltip("Trash").' onclick="delete_subject('.$subject->subject_id.', \''.teacher_base("subjects/").'\', \''.$subject->subject_title.'\')" style="font-size:21px; vertical-align:middle; " class="text-danger waves-effect waves-light ml-2 p-1" href="#"><i class="ti-trash"></i></a>';
			$data[] = $temp;
		}
		$out['data'] = $data;
		echo json_encode($out); 
	}

	public function add(){
		$this->functions->is_admin();
		$subj_name = $this->input->post('subj_name');
		$dataType = $this->input->post('data_type');
		$subject_exist = $this->db->get_where('subjects', array(
			'subject_title'=>$subj_name
		))->result();
		if($dataType == 'ajax'){
			if (!empty($subject_exist)) {
				echo json_encode(array("status" => false, 'title_existed'=>1));
			}else{
				$data = array(
					'subject_title' => $this->input->post('subj_name'),
					'added_by' =>teacher_session('id'),
					'create_on' => mdate('%Y-%m-%d')
				);
				$add = $this->Subjects_Model->add($data);
				echo json_encode(array("status" => true, 'title_existed'=>0));
			}
		}
	}

	public function delete(){
		$id = $this->input->post('subj_id');
		$dataType = $this->input->post('data_type');
		if($dataType == "ajax"){	
			$delete_result = $this->Subjects_Model->delete($id);
			echo json_encode(array("status" => $delete_result));
		}
	}

	public function trash(){
		$id = $this->input->post('subj_id');
		$dataType = $this->input->post('data_type');
		if($dataType == "ajax"){	
			$trash_result = $this->Subjects_Model->trash($id);
			echo json_encode(array("status" => $trash_result));
		}
	}

	public function retrieve(){
		$id = $this->input->post('subj_id');
		$dataType = $this->input->post('data_type');
		if($dataType == "ajax"){	
			$trash_result = $this->Subjects_Model->retrieve($id);
			echo json_encode(array("status" => $trash_result));
		}
	}
 
	public function getById($id){
		$this->functions->is_admin();
		$result = $this->Subjects_Model->getSubjectByID($id);
		echo json_encode(array("subject"=>$result[0]));	
	}
	public function update($id){
		$this->functions->is_admin();
		$dataType = $this->input->post('data_type');
		$subject_exist = $this->db->get_where('subjects', array(
			'subject_title'=>$this->input->post('subj_name')
		))->result();
		if($dataType == 'ajax'){
			$updateResult = false;
			if (empty($subject_exist)) {
				$data = array(
					'subject_title'=> $this->input->post('subj_name'),
					'subject_id' => $id,
					'updated_on'=>mdate('%Y-%m-%d')
				);
				$updateResult = $this->Subjects_Model->update($data);
				echo json_encode(array("status" => $updateResult));
				// redirect(teacher_base('subjects'));
			}else {
				echo json_encode(array("status" => $updateResult));
			}
		}
	}
}
