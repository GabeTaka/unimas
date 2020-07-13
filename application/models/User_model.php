<?php
	class User_model extends CI_Model{
		public function register($enc_password){
			// User data array
			$data = array(
				'name' => $this->input->post('name'),
				'email' => $this->input->post('email'),
				'username' => $this->input->post('username'),
				'usertype' => $this->input->post('usertype'),
				'password' => $enc_password
			);
			// Insert User
			return $this->db->insert('users', $data);
		}

		function get_users($id)
    {
        $result = $this->db->get_where('users', array(
            'id' => $id
        ))->row_array();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

		public function login($username, $password){
			$this->db->where('username',$username);
    $this->db->where('password',$password);
    $result = $this->db->get('users',1);
    return $result;
		}


		//check username exists
		public function check_username_exists($username){
			$query = $this->db->get_where('users', array('username' => $username));
			if(empty($query->row_array())){
				return true;
			}else{
				return false;
			}
		}

		//check email exists
		public function check_email_exists($email){
			$query = $this->db->get_where('users', array('email' => $email));
			if(empty($query->row_array())){
				return true;
			}else{
				return false;
			}
		}
	}