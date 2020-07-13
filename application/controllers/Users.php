<?php
	class Users extends MY_Controller{
		public function register(){
			$data['title'] = 'Sign Up';

			$this->form_validation->set_rules('name', 'Name', 'required');
			$this->form_validation->set_rules('username', 'Username', 'required|callback_check_username_exists');
			$this->form_validation->set_rules('usertype', 'Usertype', 'required|callback_check_username_exists');
			$this->form_validation->set_rules('email', 'Email', 'required|callback_check_email_exists');
			$this->form_validation->set_rules('password', 'Password', 'required');
			$this->form_validation->set_rules('password2', 'Confirm Password', 'matches[password]');

			if($this->form_validation->run() === FALSE){
				$this->load->view('users/register', $data);
			}else{
				// Encrypt password
				$enc_password = md5($this->input->post('password'));

				$this->user_model->register($enc_password);

				// Set message
				$this->session->set_flashdata('user_registered', 'You are now registered and can log in');

				redirect('users/login');
			}
		}

		public function get_specific_users($id)
	{
		$userType = $this->db->select('*')
		->get_where('user', array('id' => $id))
		->row()
		->userType;
		return $userType;
	}

		public function login(){
			$data['title'] = 'Log In';

			$this->form_validation->set_rules('username', 'Username', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');

			if($this->form_validation->run() === FALSE){
				$this->load->view('users/login', $data);
			}else{
				//Get username
				$username = $this->input->post('username');
				//Get and encrypt password
				$password = md5($this->input->post('password'));

				//Login user
				$validate = $this->user_model->login($username, $password);
				if($validate->num_rows() > 0){
        $data  = $validate->row_array();
        $user_id  = $data['id'];
        $name  = $data['username'];
        $approved  = $data['approved'];
        $level = $data['usertype'];
        $sesdata = array(
            'username'  => $name,
            'approved'  => $approved,
            'user_id'  => $user_id,
            'usertype'     => $level,
            'logged_in' => TRUE
        );
        $this->session->set_userdata($sesdata);
        $username = $sesdata['username'] ; 
      	$this->auditAdd($username, "Logged In","", "");
        if($approved === '0'){
            redirect('users/login');
        // access login for admin
        }elseif($level === '1'){
            redirect('admin/index');
 
        // access login for staff
        }elseif($level === '2'){
            redirect('applicant/index');
 
        // access login for author
        }elseif($level === '3'){
            redirect('coordinator/index');
        }
    }else{
        echo $this->session->set_flashdata('msg','Username or Password is Wrong');
        redirect('users/login');
    }
  }


				/*if($user_id){
					//create session
					$user_data = array(
						'user_id' => $user_id,
						'username' => $username,
						'logged_in' => true
					);

					$this->session->set_userdata($user_data);
				if($user_id['usertype'] == 1) {
					$this->session->set_flashdata('user_loggedin', 'You are now logged in<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>');
					redirect('admin/index');
				}elseif($user_id['usertype'] == 2){
					$this->session->set_flashdata('user_loggedin', 'You are now logged in<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>');
					redirect('forms/index');
				}else{
					echo $this->session->set_flashdata('login_failed', 'Login is invalid<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>');
					redirect('users/login');
			}
		}*/
	}

		public function forgot_password(){
			$data['title'] = 'Forgot Your Password?';
			//Reset user password
			$this->load->view('users/forgotpassword', $data);
		}

		//Log user out
		public function logout(){
			//Unset user data
			$this->auditAdd("", "Logged Out","", "");
			$this->session->sess_destroy();
/*			$this->session->unset_userdata('logged_in');
			$this->session->unset_userdata('user_id');
			$this->session->unset_userdata('username');
			$this->session->unset_userdata('usertype');*/

			// Set message
				$this->session->set_flashdata('user_loggedout', 'You are now logged out<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>');

				redirect('users/login');
		}


		//Check if username exists
		public function check_username_exists($username){
			$this->form_validation->set_message('check_username_exists', 'That username is already exists.');
			if($this->user_model->check_username_exists($username)){
				return true;
			}else{
				return false;
			}
		}

		//Check if email exists
		public function check_email_exists($email){
			$this->form_validation->set_message('check_email_exists', 'That email is already taken.');
			if($this->user_model->check_email_exists($email)){
				return true;
			}else{
				return false;
			}
		}
	}