<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Node extends CI_Controller {

	function __construct() {
		parent::__construct();

	}

	function index() {
		if (!$this->ion_auth->logged_in()) {
			redirect('auth');
		}
		redirect('node/listing');
	}

	/**
	 * @param string $type node type
	 *
	 * @return listing page
	 */
	function listing($type = 'page') {
		if (!$this->ion_auth->logged_in()) {
			redirect('auth');
		}
		$data['view']['title'] = $type . 'List';
		$data['view']['layout'] = 'node/node_list';
		$this->load->model('node/node_model');
		$conditions = array('type' => $type);
		if(isset($_GET['startDate'])) {
			$start_date = strtotime($_GET['startDate']);
		}
		else {
			$start_date = strtotime('first day of ' . date( 'F Y'));
		}
		if(isset($_GET['endDate'])) {
			$end_date = strtotime($_GET['endDate']);
		}
		else {
			$end_date = strtotime('now');
		}

		$conditions['created >'] = $start_date;
		$conditions['created <='] = $end_date;
		if (!$this->ion_auth->is_admin()) {
			$user = $this->ion_auth->user()->row();
			$conditions['uid'] = $user->id;
		}
		$data['view']['data']['startDate'] = date('Y-m-d', $start_date);
		$data['view']['data']['endDate'] = date('Y-m-d', $end_date);
		$data['view']['data']['formAction'] = base_url() . 'node/listing/' . $type;
		$data['view']['data']['content'] = $this->node_model->get($conditions);
		page_render($data);
	}


	/**
	 * @param null $id node to show
	 */
	function view($id = null) {
		if (!$id) {
			redirect('node');
		}
		else {
			$this->load->model('node/node_model');
			$node = $this->node_model->get(array('nid' => $id), true);
			$this->carabiner->js('jquery-ui.js');
			$this->carabiner->css('jquery-ui.css');
			if ($node) {
				$data['view']['data']['content'] = $node;
				$data['view']['title'] = $data['view']['data']['content']['title'];
				$data['view']['layout'] = 'node/node_view';
				page_render($data);
			}
			else {
				show_404();
			}
		}

	}

	function add($type = 'page') {
		$allowed_types = array('page', 'city');
		if (!in_array($type, $allowed_types)) {
			show_404();
		}
		if (!$this->ion_auth->logged_in()) {
			redirect('auth');
		}
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('description', '', '');
		$data['view']['data']['message'] = '';
		if ($this->form_validation->run() == true) {
			$user = $this->ion_auth->user()->row();
			$uid = $user->id;
			$submitted_values['title'] = $_POST['title'];
			$submitted_values['type'] = $_POST['type'];
			$submitted_values['description'] = $_POST['description'];
			$submitted_values['created'] = strtotime('now');
			$submitted_values['changed'] = strtotime('now');
			$this->load->model('node/node_model');
			$nid = $this->node_model->save($submitted_values);
			redirect('node/view/' . $nid);
		}
		else {
			$data['view']['title'] = 'Add ' .$type . ' node';
			$data['view']['layout'] = 'node/node_add';
			$data['view']['data']['type'] = $type;
		}
		page_render($data);
	}

	function check_reminder_date() {
		if (isset($_POST['reminder']) && !$_POST['reminder_date']) {
			$this->form_validation->set_message('check_reminder_date', 'The reminder date field can not empty');
			return FALSE;
		}
		return TRUE;
	}

	/**
	 * @param null $id node id to edit
	 */
	function edit($id = null) {
		if (!$this->ion_auth->logged_in()) {
			redirect('auth');
		}
		if (!$id) {
			redirect('node');
		}
		else {
			$this->load->model('node/node_model');
			$node = $this->node_model->get(array('nid' => $id), true);

			if ($node) {
				$user = $this->ion_auth->user()->row();
				if ($this->ion_auth->is_admin()) {
					$this->load->helper('form');
					$this->load->library('form_validation');
					$this->form_validation->set_rules('title', 'Title', 'required');
					//this is required to prefill value if validation error
					$this->form_validation->set_rules('description', '', '');
					if ($this->form_validation->run() == true) {
						$submitted_values['title'] = $_POST['title'];
						$submitted_values['description'] = $_POST['description'];
						$submitted_values['changed'] = strtotime('now');
						$this->node_model->save($submitted_values, $id);
						redirect('node/view/' . $id);
					}
					else {
						$data['view']['data']['content'] = $node;
						$data['view']['title'] = $data['view']['data']['content']['title'];
						$data['view']['layout'] = 'node/node_edit';
					}
					page_render($data);
				}
				else {
					show_error('You dont have access to this page');
				}
			}
			else {
				show_404();
			}
		}
	}

	/**
	 * @param null $id node to be deleted
	 */
	function delete($id = null) {
		if (!$this->ion_auth->logged_in()) {
			redirect('auth');
		}
		if (!$id) {
			redirect('node');
		}
		else {
			$this->load->model('node/node_model', 'node_model');
			$node = $this->node_model->get(array('nid' => $id), true);
			if ($node) {
				$user = $this->ion_auth->user()->row();
				if ($this->ion_auth->is_admin() || $user->id == $node['uid']) {
					if (isset($_POST['confirm'])) {
						$this->node_model->delete($id);
						redirect('/');
					}
					else {
						$data['view']['data']['content'] = $node;
						$data['view']['layout'] = 'confirm_delete';
						$data['view']['title'] = 'Are you sure you want to delete ???';
						$data['view']['data']['question'] = 'Are you sure you want to delete ' . $node['title'] . ' ???';
						page_render($data);
					}
				}
				else {
					show_error('You dont have access to delete');
				}
			}
			else {
				//no node is present
				show_404();
			}
		}
	}

}
