<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Car_model extends CI_Model {

	public $table_name = 'car';

	public function __construct() {
		parent::__construct();
	}


	public function entity_save($entity) {
		if (isset($entity->id) && $entity->id) {
			$this->db->where('id', $entity->id);
			$this->db->update($this->table_name, $entity);
		}
		else {
			$id = $this->db->insert($this->table_name, $entity);
			return $this->entity_load($id);
		}
	}

	public function entity_load($id) {
		$this->db->where('id', $id);
		$entity = $this->db->get($this->table_name)->row();
		return $entity;
	}

	public function get($conditions = array(), $single = 0) {
		//$this->db->order_by("created", "desc");
		$this->db->from($this->table_name);
		if ($conditions) {
			foreach($conditions as $condition_key => $condition_value) {
				$this->db->where($condition_key, $condition_value);
			}
		}
		$method = $single ? 'row_array' : 'result_array';
		$result = $this->db->get()->$method();

		return $result;
	}


}