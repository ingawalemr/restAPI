<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/RestController.php';
use chriskacerguis\RestServer\RestController;

class EmployeeAPIController extends RestController {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('EmployeeModel');
	}

	public function index_get()
	{
		$data = $this->EmployeeModel->getEmployee();
		$this->response($data, 200);
	}

	public function create_post()
	{
		/*	$formData =[ 'first_name' => $this->input->post('first_name'), ];
			$this->response($formData, 200);		*/

		$formData =[ 
					'first_name' => $this->input->post('first_name'), 
  				    'last_name' => $this->input->post('last_name'),
  				    'phone' => $this->input->post('phone'),
  				    'email' => $this->input->post('email'),
				   ];	
		$result = $this->EmployeeModel->createEmployee($formData);

		if($result > 0) {
			$this->response([
                'status' => true,
                'message' => 'Record inserted successfully'
            	], RestController::HTTP_OK);
		}
		else
		{
			$this->response([
                'status' => false,
                'message' => 'Failed to inserte new Record'
            	], RestController::HTTP_BAD_REQUEST);
		}
	}

	public function editEmployee_get($id)
	{
		$editdata = $this->EmployeeModel->editEmployee($id);
		$this->response($editdata, 200);
	}
	
	public function updateEmployee_put($id)
	{
		$formData =[ 
					'first_name' => $this->put('first_name'), 
  				    'last_name' => $this->put('last_name'),
  				    'phone' => $this->put('phone'),
  				    'email' => $this->put('email'),
				   ];	
		$updatedata = $this->EmployeeModel->updateEmployee($id, $formData);
		if($updatedata > 0) {
			$this->response([ 
                'status' => true,
                'message' => 'Record updated successfully'
            	], RestController::HTTP_OK);
		}
		else
		{
			$this->response([
                'status' => false,
                'message' => 'Failed to update Record'
            	], RestController::HTTP_BAD_REQUEST);
		}
	}
	
}
?>
