<?php
	class Admin_model extends CI_Model{
		public function __construct()
		{
			parent::__construct();
			$this->load->database();
		}
		function search_blog($name){
        $this->db->like('name', $name , 'both');
        $this->db->order_by('name', 'ASC');
        $this->db->limit(10);
        return $this->db->get('sdg_table')->result();
    }

    public function get_critical_count($report_id){
    	$this->db->select('		
								count(risk) as risk,
								findings.id as report_id,
								report.prepared_by,
								report.endorsed_by,
				');
			$this->db->from('findings');
			$this->db->join('report','report.id = findings.report_id');
			$this->db->where('findings.risk="critical"');
			$this->db->where('findings.report_id',$report_id);
			$query = $this->db->get();
			return $query->row()->risk;
    }

     public function get_high_count($report_id){
     	$this->db->select('		
								count(risk) as risk,
								findings.id as report_id,
								report.prepared_by,
								report.endorsed_by,
				');
			$this->db->from('findings');
			$this->db->join('report','report.id = findings.report_id');
			$this->db->where('findings.risk="high"');
			$this->db->where('findings.report_id',$report_id);
			$query = $this->db->get();
			return $query->row()->risk;
    	// $sql = "SELECT count(risk) as risk FROM findings WHERE risk='high'";
    	// $result = $this->db->query($sql);
    	// return $result->row()->risk;
    }

     public function get_medium_count($report_id){
    	$this->db->select('		
								count(risk) as risk,
								findings.id as report_id,
								report.prepared_by,
								report.endorsed_by,
				');
			$this->db->from('findings');
			$this->db->join('report','report.id = findings.report_id');
			$this->db->where('findings.risk="medium"');
			$this->db->where('findings.report_id',$report_id);
			$query = $this->db->get();
			return $query->row()->risk;
    }

     public function get_low_count($report_id){
    	$this->db->select('		
								count(risk) as risk,
								findings.id as report_id,
								report.prepared_by,
								report.endorsed_by,
				');
			$this->db->from('findings');
			$this->db->join('report','report.id = findings.report_id');
			$this->db->where('findings.risk="low"');
			$this->db->where('findings.report_id',$report_id);
			$query = $this->db->get();
			return $query->row()->risk;
    }

    public function get_total_count($report_id){
    	$this->db->select('		
								count(risk) as risk,
								findings.id as report_id,
								report.prepared_by,
								report.endorsed_by,
				');
			$this->db->from('findings');
			$this->db->join('report','report.id = findings.report_id');
			$this->db->where('findings.report_id',$report_id);
			$query = $this->db->get();
			return $query->row()->risk;
    }

    public function get_total_users(){
$this->db->select('		
					count(usertype) as usertype,
				');
			$this->db->from('users');
			$this->db->where('users.approved=1');
			$this->db->where('users.usertype!=1');                        
    $query = $this->db->get();          
    return $query->row()->usertype;
    }

    public function get_totalpending_users(){
$this->db->select('		
					count(approved) as approved,
				');
			$this->db->from('users');
			$this->db->where('users.approved!=1');                        
    $query = $this->db->get();          
    return $query->row()->approved;
    }

    public function get_totalreport_list(){
$this->db->select('		
					count(project_name) as project_name,
				');
			$this->db->from('info');                        
    $query = $this->db->get();          
    return $query->row()->project_name;
    }

    public function get_report_list(){
    		$this->db->select('*');
			$this->db->from('info');                        
    $query = $this->db->get();
    return $query->result_array();
    }

    public function get_audit_trial(){
$this->db->select('		
					count(action) as action,
				');
			$this->db->from('audit_trial');                       
    $query = $this->db->get();          
    return $query->row()->action;
    }

    public function get_view_users(){
    $query = $this->db->query('SELECT id, name, email, username, password, usertype FROM users WHERE usertype !=1 AND approved =1');
    return $query->result_array();
    }

    public function get_pending_users(){
    $query = $this->db->query('SELECT id, name, email, username, password, usertype, approved FROM users WHERE approved = 0');
    return $query->result_array();
    }

    public function update_pending_users($id){
    $this->db->set('approved',1);
    $this->db->where('id',$id);
    $this->db->update('users');        
    return true;
    }

    public function delete_pending_users($id){
		$this->db->select('users');
		$this->db->where('id', $id);
		$this->db->delete('users');
		return true;
	}

    public function get_users_name(){
$this->db->select('		
					name as name,
				');
			$this->db->from('users');
			$this->db->where('users.approved=1');
			$this->db->where("users.id", $this->session->userdata('user_id'));                        
    $query = $this->db->get();          
    return $query->row()->name;
    }

    public function get_report($id = FALSE){
			if($id === FALSE){
				$query = $this->db->get('report');
				return $query->result_array();
			}

			$query = $this->db->get_where('report', array('id' => $id));
			return $query->row_array();
		}

		public function create_info(){

			$data = array(
				'project_name' => $this->input->post('project_name'),
				'course_code' => $this->input->post('course_code'),
				'organizer' => $this->input->post('organizer'),
				'co_organizer' => $this->input->post('co_organizer'),
				'from_date' => $this->input->post('from_date'),
				'to_date' => $this->input->post('to_date'),
				'project_location' => $this->input->post('project_location'),
				'project_milestone' => $this->input->post('project_milestone'),
				'program_sustainability' => $this->input->post('program_sustainability'),
				'grand_total' => $this->input->post('grand_total'),
				'user_id' => $this->session->userdata('user_id'),
			);

			$this->db->insert('info', $data);
			return $report_id = $this->db->insert_id();
		}

		public function create_description($report_id){

			$data = array(
				'project_synopsis' => $this->input->post('project_synopsis'),
				'justification_project' => $this->input->post('justification_project'),
				'project_objectives' => $this->input->post('project_objectives'),
				'impact_community' => $this->input->post('impact_community'),
				'user_id' => $this->session->userdata('user_id'),
				'report_id' => $report_id,
			);

			$this->db->insert('description', $data);
			return $insert_id = $this->db->insert_id();
		}

		public function create_project_budget($report_id){

		$pr_qty = $this->input->post('pr_qty');
		$pr_desc = $this->input->post('pr_desc');
		$pr_cpu = $this->input->post('pr_cpu');
		$pr_cpi = $this->input->post('pr_cpi');
		$facility = $this->input->post('facility');
		$date = $this->input->post('date');
		$unit = $this->input->post('unit');
		$user_id = $this->session->userdata('user_id');

		$data = array();
		for ($i=0; $i < count($pr_qty); $i++)
			$data[] = array(
				'pr_qty' => $pr_qty[$i],
				'pr_desc' => $pr_desc[$i],
				'pr_cpu' => $pr_cpu[$i],
				'pr_cpi' => $pr_cpi[$i],
				'facility' => $facility[$i],
				'date' => $date[$i],
				'unit' => $unit[$i],
				'user_id' => $user_id,
				'report_id' => $report_id,
			);
			// print_r($data);exit();
		$this->db->insert_batch('project_budget', $data);
		return $insert_id = $this->db->insert_id();
	}

	public function create_project_members($report_id){

		$members_name = $this->input->post('members_name');
		$expertise = $this->input->post('expertise');
		$position = $this->input->post('position');
		$role = $this->input->post('role');
		$email = $this->input->post('email');
		$telephone = $this->input->post('telephone');
		$user_id = $this->session->userdata('user_id');

		$data = array();
		for ($i=0; $i < count($members_name); $i++)
			$data[] = array(
				'members_name' => $members_name[$i],
				'expertise' => $expertise[$i],
				'position' => $position[$i],
				'role' => $role[$i],
				'email' => $email[$i],
				'telephone' => $telephone[$i],
				'user_id' => $user_id,
				'report_id' => $report_id,
			);
			// print_r($data);exit();
		$this->db->insert_batch('project_members', $data);
		return $insert_id = $this->db->insert_id();
	}

	public function create_target_groups($report_id){

			$data = array(
				'number_student' => $this->input->post('number_student'),
				'target' => $this->input->post('target'),
				'justification' => $this->input->post('justification'),
				'activity_description' => $this->input->post('activity_description'),
				'user_id' => $this->session->userdata('user_id'),
				'report_id' => $report_id,
			);

			$this->db->insert('target_groups', $data);
			return $insert_id = $this->db->insert_id();
		}

		public function create_sdg_table($report_id){

		$sdg = $this->input->post('sdg');
		$user_id = $this->session->userdata('user_id');

		$data = array();
		for ($i=0; $i < count($sdg); $i++)
			$data[] = array(
				'sdg' => $sdg[$i],
				'user_id' => $user_id,
				'report_id' => $report_id,
			);
			// print_r($data);exit();
		$this->db->insert_batch('sdg_table', $data);
		return $insert_id = $this->db->insert_id();
	}

		public function delete_forms($reportid){
			$this->db->where('id', $reportid);
			$this->db->delete('report');
			return true;
		}

		public function get_audit($id = FALSE)
		{
	        if ($id === FALSE)
	        {
	        	$this->db->order_by('time_execute','DESC');
	                $query = $this->db->get('audit_trial');
	                return $query->result_array();
	        }

	        $query = $this->db->get_where('audit_trial', array('id' => $id));
	        return $query->row_array();
		}

		public function audit_add($audit){

			return $this->db->insert('audit_trial',$audit);

		}

		// public function update_forms($image) {
		// 	$name = url_title($this->input->post('name'));

		// 	$data = array(
		// 		'name' => $name,
		// 		'details' => $this->input->post('details'),
		// 		'url' => $this->input->post('url'),
		// 		'parameter' => $this->input->post('parameter'),
		// 		'proof' => $this->input->post('proof'),
		// 		'risk' => $this->input->post('risk'),
		// 		'remediation' => $this->input->post('remediation'),
		// 		'image' => $image
		// 	);

		// 	$this->db->where('id', $this->input->post('id'));
		// 	return $this->db->update('forms', $data);
		// }
	}