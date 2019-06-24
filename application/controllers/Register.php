<?php

class Register extends CI_Controller
{
	
	public function RegisterUser()
	{
	//	$this->form_validation->set_rules('fname', 'First name', 'requried');
	//	$this->form_validation->set_rules('lname', 'Last name', 'requried');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('password', 'password', 'required');
		$this->form_validation->set_rules('passwordagain', 'Again password', 'required|matches[password]');

		if($this->form_validation->run() == FALSE)
		{
			$this->load->view('Register');
		}
		else
		{
			$this->load->model('Model_usertttttt');
			$response = $this->Model_user->insertUserdata();
			if ($response){
				$this->session->set_flashdata('msg','Registered sucessfully');
				redirect('Home/Register');
			}
		}

	}
}