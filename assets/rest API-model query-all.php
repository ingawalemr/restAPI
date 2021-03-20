<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EmployeeModel extends CI_Model {

	public function getEmployee()
	{
		$result = $this->db->get('employee')->result_array();
		return $result;
	}

	public function createEmployee($formData)
	{
		return $this->db->insert('employee', $formData);
	}

	public function editEmployee($id)
	{
		$this->db->where('id', $id);
		$query = $this->db->get('employee')->row_array();
		return $query;
	}

	public function updateEmployee($id, $formData)
	{
		$this->db->where('id', $id);
		return $this->db->update('employee', $formData);
	}

	public function deleteEmployee($id)
	{
		$this->db->where('id', $id);
		return $this->db->delete('employee');
		//or  return $this->db->delete('employee', ['id' => $id]);
	}
	
}
?>