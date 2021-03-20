<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//require APPPATH . 'libraries/Format.php';
require APPPATH . 'libraries/RestController.php';
use chriskacerguis\RestServer\RestController;

class DemoAPIController extends RestController {

	public function index_get()
	{
		echo "welcome message with Restful api";
		echo "<h2>"."hello"."</h2>";
	}

	
}
?>