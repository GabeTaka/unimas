<?php
	class Form_model extends CI_Model{
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

/*    public function get_critical_count($report_id){
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

    public function get_report($id = FALSE){
			if($id === FALSE){
				$query = $this->db->get('report');
				return $query->result_array();
			}

			$query = $this->db->get_where('report', array('id' => $id));
			return $query->row_array();
		}*/

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

	public function get_total_forms(){
$this->db->select('		
					count(info_id) as info_id,
				');
			$this->db->from('info');
			$this->db->join('users','users.id = info.user_id');
			$this->db->where('info.approved_forms=1'); 
			$this->db->where("users.id", $this->session->userdata('user_id'));                       
    $query = $this->db->get();          
    return $query->row()->info_id;
    }

    public function get_totalpending_forms(){
$this->db->select('		
					count(approved_forms) as approved_forms,
					info.info_id as user_id,

				');
			$this->db->from('info');
			$this->db->join('users','users.id = info.user_id');
			$this->db->where('info.approved_forms!=1');
			$this->db->where("users.id", $this->session->userdata('user_id'));                        
    $query = $this->db->get();          
    return $query->row()->approved_forms;
    }

    public function get_view_forms(){
    		$this->db->select('*');
			$this->db->from('info');
			$this->db->join('users','users.id = info.user_id','right');
			$this->db->where('info.approved_forms=1');
			$this->db->where("users.id", $this->session->userdata('user_id'));                        
    $query = $this->db->get();
    return $query->result_array();
    }

    public function get_pdf_info($report_id){
			$this->db->select('*');
			$this->db->from('info');
			$this->db->where('info.info_id',$report_id);                       
    $query = $this->db->get();
    return $query->result_array();
		}

	public function get_pdf_description($report_id){
			$this->db->select('*');
			$this->db->from('description');
			$this->db->join('info','info.info_id = description.report_id','right');
			$this->db->where('description.report_id',$report_id);                       
    $query = $this->db->get();
    return $query->result_array();
		}

	public function get_pdf_sdg_table($report_id){
	$this->db->select('*');
			$this->db->from('sdg_table');
			$this->db->join('info','info.info_id = sdg_table.report_id','right');  
			$this->db->where('sdg_table.report_id',$report_id);                     
    $query = $this->db->get();
    return $query->result_array();
    }

    public function get_pdf_target_groups($report_id){
    		$this->db->select('*');
			$this->db->from('target_groups');
			$this->db->join('info','info.info_id = target_groups.report_id','right'); 
			$this->db->where('target_groups.report_id',$report_id);                    
    $query = $this->db->get();
    return $query->result_array();
    }

    public function get_pdf_project_budget($report_id){
    		$this->db->select('*');
			$this->db->from('project_budget');
			$this->db->join('info','info.info_id = project_budget.report_id','right');   
			$this->db->where('project_budget.report_id',$report_id);                    
    $query = $this->db->get();
    return $query->result_array();
    }

    public function get_pdf_project_members($report_id){
    		$this->db->select('*');
			$this->db->from('project_members');
			$this->db->join('info','info.info_id = project_members.report_id','right');
			$this->db->where('project_members.report_id',$report_id);                       
    $query = $this->db->get();
    return $query->result_array();
    }

    public function get_pending_forms(){
    		$this->db->select('*');
			$this->db->from('info');
			$this->db->join('users','users.id = info.user_id','left');
			$this->db->where('info.approved_forms!=1');
			$this->db->where("users.id", $this->session->userdata('user_id'));                      
    $query = $this->db->get();
    return $query->result_array();
    }

    public function get_totalproposal_log(){
$this->db->select('		
					count(action) as action,
				');
			$this->db->from('proposal_log');                        
    $query = $this->db->get();          
    return $query->row()->action;
    }

    public function get_proposal_log(){
    		$this->db->select('*');
			$this->db->from('info');                      
    $query = $this->db->get();
    return $query->result_array();
    }

    public function get_totalproposal(){
$this->db->select('		
					count(project_name) as project_name,
				');
			$this->db->from('info');                        
    $query = $this->db->get();          
    return $query->row()->project_name;
    }

   public function get_total_proposal(){
    		$this->db->select('*');
			$this->db->from('info');
			$this->db->join('users','users.id = info.user_id','left');
			$this->db->where("users.id", $this->session->userdata('user_id'));                      
    $query = $this->db->get();
    return $query->result_array();
    }

	// public function get_info(){
 //    		$this->db->select('project_name as project_name');
	// 		$this->db->from('info');                      
 //    $query = $this->db->get();
 //    return $query->result_array();
 //    }

    public function get_info($report_id){
			$this->db->select('*');
			$this->db->from('info');
			$this->db->where('info.info_id',$report_id);                       
    $query = $this->db->get();
    return $query->result_array();
		}

    public function get_description($report_id){
    		$this->db->select('*');
			$this->db->from('description');
			$this->db->join('info','info.info_id = description.report_id','right');
			$this->db->where('description.report_id',$report_id);                       
    $query = $this->db->get();
    return $query->result_array();
    }

    public function get_project_budget($report_id){
    		$this->db->select('*');
			$this->db->from('project_budget');
			$this->db->join('info','info.info_id = project_budget.report_id','right');   
			$this->db->where('project_budget.report_id',$report_id);                    
    $query = $this->db->get();
    return $query->result_array();
    }

    public function get_project_members($report_id){
    		$this->db->select('*');
			$this->db->from('project_members');
			$this->db->join('info','info.info_id = project_members.report_id','right');
			$this->db->where('project_members.report_id',$report_id);                       
    $query = $this->db->get();
    return $query->result_array();
    }

    public function get_sdg_table($report_id){
    		$this->db->select('*');
			$this->db->from('sdg_table');
			$this->db->join('info','info.info_id = sdg_table.report_id','right');  
			$this->db->where('sdg_table.report_id',$report_id);                     
    $query = $this->db->get();
    return $query->result_array();
    }

    public function get_target_groups($report_id){
    		$this->db->select('*');
			$this->db->from('target_groups');
			$this->db->join('info','info.info_id = target_groups.report_id','right'); 
			$this->db->where('target_groups.report_id',$report_id);                    
    $query = $this->db->get();
    return $query->result_array();
    }

    public function update_pending_forms($info_id){
    $this->db->set('approved',1);
    $this->db->where('info_id',$info_id);
    $this->db->update('info');          
    return true;
    }

    public function update_proposals($info_id = NULL){
		$this->db->set('*');
		$this->db->where('info_id', $info_id);
		$this->db->update('info', array('info_id' => $info_id));
		$this->db->update('description', array('report_id' => $info_id));
		$this->db->update('project_budget', array('report_id' => $info_id));
		$this->db->update('project_members', array('report_id' => $info_id));
		$this->db->update('sdg_table', array('report_id' => $info_id));
		$this->db->update('target_groups', array('report_id' => $info_id));
		return true;
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
	                $query = $this->db->get('proposal_log');
	                return $query->result_array();
	        }

	        $query = $this->db->get_where('proposal_log', array('id' => $id));
	        return $query->row_array();
		}

		public function proposal_add($audit){

			return $this->db->insert('proposal_log',$audit);

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