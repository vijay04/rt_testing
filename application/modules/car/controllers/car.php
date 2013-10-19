<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Car extends CI_Controller {

	function __construct() {
		parent::__construct();
	}

	function index() {
		$data['view']['title'] ='Car rental';
		$data['view']['layout'] = 'car/home';
		$data['view']['data']['content'] = 'data';
		page_render($data);
	}

	function search() {
		$this->carabiner->js('combobox.js');
		$this->carabiner->js('jquery-ui.js');
		$this->carabiner->js('jquery.jcarousel.min.js');
		$this->carabiner->js('car/search.js');


		$this->carabiner->css('jquery-ui.css');
		$this->carabiner->css('tango/skin.css');

		$data['view']['title'] ='Car rental';
		$data['view']['layout'] = 'car/search';
		$data['view']['data']['content'] = 'data';
		page_render($data);
	}

	function listing() {
		$this->carabiner->js('jquery-ui.js');

		$this->carabiner->js('angular.min.js');
		$this->carabiner->js('bootstrap.min.js');
		$this->carabiner->js('slider.js');
		$this->carabiner->js('car/angular-search.js');

		$this->carabiner->css('jquery-ui.css');
		$data['view']['title'] ='Car rental';
		$data['view']['layout'] = 'car/listing';
		$data['view']['data']['params'] = $_POST;
		page_render($data);
	}

	function getjson() {
		$this->load->model('car/car_model');
		$cars = $this->car_model->get();
		$output = array();
		$days = '';
		//Logger::debug_var('as', $cars);
		//echo json_encode($cars);

		if ($_POST) {
			if (isset($_POST['trip_type']) && $_POST['trip_type'] == 'round_trip') {
				$outstaion_pickup_date = strtotime($_POST['outstaion_pickup_date']);
				$outstaion_return_date = strtotime($_POST['outstaion_return_date']);
				$datediff = $outstaion_return_date -  $outstaion_pickup_date;
				$days =  ceil(abs($datediff) / 86400) + 1;
			}
		}
		foreach($cars as $c => $value) {
			if ($days) {
				$value['price'] = $value['outsource_day_cost'] * $days * 250;
				//driver charges
				$value['price'] = $value['price'] + ($days * 250);
			}
			else {
				$value['price'] = $value['local_half_day_cost'];
			}
			$output[] = $value;
		}
		echo json_encode($output);

	}

	function add() {
		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			redirect('/');
		}
		$this->load->library('form_validation');
		//validate form input
		$this->form_validation->set_rules('title', 'Title', 'required|xss_clean');
		$this->form_validation->set_rules('type', 'Type', 'xss_clean');
		$this->form_validation->set_rules('capacity', 'Capacity', 'required|integer');

		if ($this->form_validation->run() == true)
		{
			$this->load->model('car/car_model');
			$car_data = array(
				'title' => $_POST['title'],
				'type' => $_POST['type'],
				'capacity' => $_POST['capacity'],
			);
			$car = $this->car_model->entity_save($car_data);
			set_message('Car Created');
			redirect('car/view/' . $car->id);
		}
		else
		{
			//display the create user form
			//set the flash data error message if there is one
			$this->data['message'] = (validation_errors() ? validation_errors() : '');

			$this->data['title'] = array(
				'name'  => 'title',
				'id'    => 'title',
				'type'  => 'text',
				'value' => $this->form_validation->set_value('title'),
			);
			$this->data['type'] = array(
				'name'  => 'type',
				'id'    => 'type',
				'type'  => 'text',
				'value' => $this->form_validation->set_value('type'),
			);
			$this->data['capacity'] = array(
				'name'  => 'capacity',
				'id'    => 'capacity',
				'type'  => 'text',
				'value' => $this->form_validation->set_value('capacity'),
			);

			$data['view']['title'] ='List';
			$data['view']['layout'] = 'car/add';
			$data['view']['nomessage'] = true;
			$data['view']['data']['content'] = $this->data;
			page_render($data);
		}
	}

	function view($id) {
		$this->load->model('car/car_model');
		$car = $this->car_model->entity_load($id);
		if ($car) {
			$data['view']['title'] = $car->title;
			$data['view']['layout'] = 'car/view';
			$data['view']['data']['content'] = $car;
			page_render($data);
		}
		else {
			show_404();
		}
	}

	function feedback() {
		$data['view']['title'] = 'Feedback';
		$data['view']['layout'] = 'car/feedback';
		$data['view']['data']['content'] = array();
		page_render($data);
	}

}