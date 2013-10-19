<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Reminder_model extends CI_Model {
	public $table_name = 'reminder';

	public function __construct() {
		parent::__construct();
	}

	/*
	 * @$data: submited values
	 * @return : Inserted Data nid.
	 */
	public function save($data, $id=null) {
		if ($id) {
			$this->db->where('node_id', $id);
			$this->db->update($this->table_name, $data);
		}
		else {
			$this->db->insert($this->table_name, $data);
			return $this->db->insert_id();
		}
	}

	public function get($conditions = array(), $single = 0) {
		$this->db->from($this->table_name);
		if ($conditions) {
			foreach($conditions as $condition_key => $condition_value) {
				$this->db->where($condition_key, $condition_value);
			}
		}
		//$this->db->join();
		$method = $single ? 'row_array' : 'result_array';
		$query = $this->db->get()->$method();
		$result = array();
		if ($query) {
			if ($single) {
				$result = $query;
			}
			else {
				foreach ($query as $key => $value) {

					$result[] = $value;
				}
			}
		}
		return $result;
	}
}