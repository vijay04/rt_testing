<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Reminder extends CI_Controller {

	function __construct() {
		parent::__construct();
	}

	function index() {

	}

	function send() {
		$morning_timestamp = strtotime('now');
		$tommorow_timestamp = strtotime('+1 day');
		$this->load->model('reminder/reminder_model');
		$reminder = $this->reminder_model->get(array('timestamp >= ' => $morning_timestamp, 'timestamp <' => $tommorow_timestamp));
		$eids = array();
		foreach ($reminder as $key => $value) {
			$subject = 'Reminder About';
			$message = 'Reminder from em';
			send_email($value['mail'], $subject, $message);
			$eids[] = $value['eid'];
		}
		if ($eids) {

		}
		//$this->reminder_model->delete();
	}
}