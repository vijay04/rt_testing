<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Node_model extends CI_Model {

	public $table_name = 'node';

	public function __construct() {
		parent::__construct();
	}

	/*
	 * @$data: submited values
	 * @return : Inserted Data nid.
	 */
	public function save($data, $id=null) {
		if ($id) {
			$this->db->where('nid', $id);
			$this->db->update($this->table_name, $data);
		}
		else {
			$this->db->insert($this->table_name, $data);
			return $this->db->insert_id();
		}

	}

	/*
	 * @arg: get data params
	 * @return : value for selected.
	 */
	public function get_temp($arg = null, $single = 1 ) {
		$this->db->order_by("created", "desc");
		if ($arg) {
			$method = $single ? 'row_array' : 'result_array';
			if (!is_array($arg)) {
				$eids = array($arg);
			}
			return $this->db->get_where($this->table_name, array('nid' => $arg))->$method();
		}
		else {
			return $this->db->get($this->table_name)->result_array();
		}
	}

	public function get($conditions = array(), $single = 0) {
		$this->db->order_by("created", "desc");
		$this->db->from($this->table_name);
		if ($conditions) {
			foreach($conditions as $condition_key => $condition_value) {
				$this->db->where($condition_key, $condition_value);
			}
		}
		$method = $single ? 'row_array' : 'result_array';
		$query = $this->db->get()->$method();
		$result = array();
		if ($query) {
			if ($single) {
				$result = $query;
			}
			else {
				foreach ($query as $key => $value) {
					$value['created_date'] = date('d-m-Y', $value['created']);
					$result[] = $value;
				}
			}
		}
		return $result;
	}

	public function delete($id) {
		$this->db->delete($this->table_name, array('nid' => $id));
	}

}