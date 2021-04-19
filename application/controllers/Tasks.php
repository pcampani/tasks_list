<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tasks extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper("url");
		$this->load->model("task");
		$this->load->library("form_validation");
	}

	/*DOCU Function that creates a new task: Owner: Philip */
	public function addTask() {
		$this->form_validation->set_rules("task", "Task", "required");
		if ($this->form_validation->run() == FALSE) {
            redirect("tasks");
        }
		else {
			$last_id = $this->task->save_task($this->input->post("task"));
			$data["task"] = $this->task->get_task($last_id);
			$this->load->view("partials/task", $data);
		}
	}

	/*DOCU Function to display edit form. Owner:Philip*/
	public function edit($id) {
		$data["task"] = $this->task->get_task($id);
		$this->load->view("partials/edit", $data);
	}

	/*DOCU Function to send edited post to server. Owner:Philip*/
	public function process_edit() {
		$this->form_validation->set_rules("task", "Task", "required");
		if ($this->form_validation->run() == FALSE) {
            redirect("tasks");
        }
		else {
			$task = $this->input->post("task");
			$id = $this->input->post("id");
			$this->task->update_task($task,$id);
			$this->load->view("partials/add");
		}
	}

	/*DOCU: This function is called after process edit and return the updated task: Owner:Philip */
	public function process_task($id) {
		$data["task"] = $this->task->get_task($id);
		$this->load->view("partials/task", $data);
	}

	/*DOCU: This function is deletes a task: Owner:Philip */
	public function delete_task($id) {
		$this->task->remove_task($id);
		echo $id;
	}


	/*DOCU Function that toggles if a task is completed or not. Owner:Philip*/
	public function is_complete() {
		$id = $this->input->post("id");
		$this->task->toggle_task($id);
		$data["task"] = $this->task->get_task($id);
		$this->load->view("partials/task", $data);
	}

	public function index() {
		$data["tasks"] = $this->task->get_tasks();
		$this->load->view('home', $data);
	}

}
