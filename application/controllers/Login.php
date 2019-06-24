<?php


class Login extends CI_Controller
{
	
	public function LoginUser()
	{
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('password', 'password', 'required');

		if($this->form_validation->run() == FALSE)
		{
			$this->load->view('Login');
		}
		else{
			$this->load->model('Model_user');
			$result = $this->Model_user->LoginUser();

			if($result !=false){

				echo "data entered successfully";

			}
			else{
				$this->session->set_flashdata('errormsg','Wrong email and password');
				redirect('Home/Login');
			}
		}
	}
}