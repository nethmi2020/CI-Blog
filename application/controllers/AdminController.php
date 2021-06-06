<?php

class AdminController extends CI_Controller {


    public function index()
	{
		$this->load->view('Admin/dashboard');
	}

    public function addpost(){
		$this->load->view('Admin/addpost');
	}
}


?>