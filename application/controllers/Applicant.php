<?php
	class Applicant extends MY_Controller{

		function get_autocomplete(){
    if (isset($_GET['term'])) {
        $result = $this->form_model->search_blog($_GET['term']);
        if (count($result) > 0) {
            foreach ($result as $row)
                $arr_result[] = array(
                    'label'         => htmlspecialchars($row->name),
             );
                echo json_encode($arr_result);
        }
    }
}

		public function create(){
			//Check login
			if(!$this->session->userdata('logged_in')){
				redirect('users/login');
			}

			$data['title'] = 'Create Proposal';
			$this->load->view('applicant/header');
			$this->load->view('applicant/create', $data);

		}

		public function add(){

			//insert data into info table
			$this->form_validation->set_rules('project_name', 'Project Name', 'required');
			$this->form_validation->set_rules('course_code', 'Course Code', 'required');
			$this->form_validation->set_rules('organizer', 'Organizer', 'required');
			$this->form_validation->set_rules('co_organizer', 'Co-Organizer', 'required');
			$this->form_validation->set_rules('from_date', 'From Date', 'required');
			$this->form_validation->set_rules('to_date', 'To Date', 'required');
			$this->form_validation->set_rules('project_location', 'Project Location', 'required');
			$this->form_validation->set_rules('project_milestone', 'Project Milestone', 'required');
			$this->form_validation->set_rules('program_sustainability', 'Program Sustainability', 'required');
			$this->form_validation->set_rules('grand_total', 'Grand Total', 'required');

			//insert data into description table 
			$this->form_validation->set_rules('project_synopsis', 'Project Synopsis', 'required');
			$this->form_validation->set_rules('justification_project', 'Justification Project', 'required');
			$this->form_validation->set_rules('project_objectives', 'Project Objectives', 'required');
			$this->form_validation->set_rules('impact_community', 'Impact Community', 'required');

			//insert data into project_budget table
			$this->form_validation->set_rules('pr_qty[]', 'Quantity', 'required');
			$this->form_validation->set_rules('pr_desc[]', 'Description', 'required');
			$this->form_validation->set_rules('pr_cpu[]', 'Unit Cost', 'required');
			$this->form_validation->set_rules('pr_cpi[]', 'Item Cost', 'required');
			$this->form_validation->set_rules('facility[]', 'Facility', 'required');
			$this->form_validation->set_rules('date[]', 'Date', 'required');
			$this->form_validation->set_rules('unit[]', 'Unit Number', 'required');

			// insert data into project_members table
			$this->form_validation->set_rules('members_name[]', 'Members Name', 'required');
			$this->form_validation->set_rules('expertise[]', 'Expertise', 'required');
			$this->form_validation->set_rules('position[]', 'Position', 'required');
			$this->form_validation->set_rules('role[]', 'Role', 'required');
			$this->form_validation->set_rules('email[]', 'Email', 'required');
			$this->form_validation->set_rules('telephone[]', 'Telephone', 'required');

			// //insert data into target_groups table
			$this->form_validation->set_rules('number_student', 'Number Of Student', 'required');
			$this->form_validation->set_rules('target', 'Target', 'required');
			$this->form_validation->set_rules('justification', 'Justification', 'required');
			$this->form_validation->set_rules('activity_description', 'Activity Description', 'required');

			// //insert data into sdg_table table
			$this->form_validation->set_rules('sdg[]', 'Summary', 'required');
			
			if($this->form_validation->run() == FALSE){

				$data['status'] = "Error! Try again";
				$data['error'] = $this->form_validation->error_string();
				echo json_encode($data);
			}else{

				//Upload image
				$config['upload_path'] = './assets/images/forms';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['create_thumb'] = TRUE;
    			$config['maintain_ratio'] = TRUE;
				$config['max_size'] = '20480';
				$config['max_width'] = '5000';
				$config['max_height'] = '5000';

				$this->load->library('upload', $config);

				if(!$this->upload->do_upload()){
					$errors = array('error' => $this->upload->display_errors());
					$image = 'noimage.jpg';
				} else {
					$data = array('upload_data' => $this->upload->data());
					$image = $_FILES['image']['name'];
				}
				$report_id = $this->form_model->create_info();
				$this->form_model->create_description($report_id);
				$this->form_model->create_project_budget($report_id);
				$this->form_model->create_project_members($report_id);
				$this->form_model->create_target_groups($report_id);
				$this->form_model->create_sdg_table($report_id);

				/*$this->findings_model->create_findings($image,$report_id);
				$this->executive_summary_model->create_executive_summary($report_id);
				$this->guidelines_model->create_testing_guidelines($report_id);*/
				// Set message
				$this->session->set_flashdata('forms_created', 'Your forms has been created');
				$data['status'] = "Your data has been saved";
				echo json_encode($data);
				
			}			
		}

		public function email() { 
		 	$data['UsersName'] =  $this->form_model->get_users_name();
			$data['totalFormsNo'] =  $this->form_model->get_total_forms();
      $data['totalPendingFormsNo'] =  $this->form_model->get_totalpending_forms();
		 	$this->load->view('applicant/header');
			$this->load->view('applicant/send_email', $data);
		}
public function send(){
	$to =  $this->input->post('to');  // User email pass here
    $subject = $this->input->post('subject');
    $password = $this->input->post('email_password');
    $from = $this->input->post('from');              // Pass here your mail id
    $file_data = $this->upload_file();
    if(is_array($file_data))
  {
    $emailContent = '
    <p>'.$this->input->post("body").'</p>
   ';
                


    $config['protocol']    = 'smtp';
    $config['smtp_host']    = 'smtp.gmail.com';
    $config['smtp_port']    = '465';
    $config['smtp_timeout'] = '60';

    $config['smtp_user']    = $from;    //Important
    $config['smtp_pass']    = $password;  //Important

    $config['charset']    = 'utf-8';
    $config['newline']    = "\r\n";
    $config['mailtype'] = 'html'; // or html
    $config['validation'] = TRUE; // bool whether to validate email or not 

     
    $this->load->library('email');
    $this->email->initialize($config);
    $this->email->set_mailtype("html");
    $this->email->from($from);
    $this->email->to($to);
    $this->email->subject($subject);
    $this->email->message($emailContent);
    $this->email->attach($file_data['full_path']);
    if($this->email->send())
         {
          if(delete_files($file_data['file_path']))
          {
           $this->session->set_flashdata('message', 'Application Sended');
           redirect('applicant/view_pending_forms');
          }
         }
         else
         {
          if(delete_files($file_data['file_path']))
          {
           $this->session->set_flashdata('message', 'There is an error in email send');
           redirect('applicant/view_pending_forms');
          }
         }
     }
     else
     {
      $this->session->set_flashdata('message', 'There is an error in attach file');
         redirect('applicant/view_pending_forms');
     }
    }

   public function upload_file()
 {
  $config['upload_path'] = 'uploads/';
  $config['allowed_types'] = 'doc|docx|pdf';
  $this->load->library('upload', $config);
  $this->email->initialize($config);
  if($this->upload->do_upload('resume'))
  {
   return $this->upload->data();   
  }
  else
  {
   return $this->upload->display_errors();
  }
 }


		public function index(){
			if($this->session->userdata('usertype')==='2'){
				/*$data['report'] = $this->form_model->get_report();*/
				$data['UsersName'] =  $this->form_model->get_users_name();
				$data['totalFormsNo'] =  $this->form_model->get_total_forms();
            	$data['totalPendingFormsNo'] =  $this->form_model->get_totalpending_forms();
            	$data['totalProposalLog'] =  $this->form_model->get_totalproposal_log();
            	$data['totalProposal'] =  $this->form_model->get_totalproposal();
				$this->load->view('applicant/header');
				$this->load->view('applicant/index', $data);
			}else{
				$this->session->sess_destroy();

				redirect('users/login');
			}

		}

		public function view_forms()
    {
        if($this->session->userdata('usertype')==='2'){
            $data['approved_forms'] = html_escape($this->form_model->get_view_forms());
            $data['info'] = html_escape($this->form_model->get_view_forms());
            $this->load->view('applicant/header');
            $this->load->view('applicant/view_forms', $data);
      }else{
        $this->session->sess_destroy();

          redirect('users/login');
      }
    }

    public function view_pending_forms()
    {
        if($this->session->userdata('usertype')==='2'){
            $data['info'] = html_escape($this->form_model->get_pending_forms());
            $this->load->view('applicant/header');
            $this->load->view('applicant/view_pending_forms', $data);
      }else{
        $this->session->sess_destroy();

          redirect('users/login');
      }
    }

    public function view_proposal_list()
    {
        if($this->session->userdata('usertype')==='2'){
            $data['info'] = html_escape($this->form_model->get_total_proposal());
            $this->load->view('applicant/header');
            $this->load->view('applicant/proposal_list', $data);
      }else{
        $this->session->sess_destroy();

          redirect('users/login');
      }
    }

    public function edit($report_id)
    {
        if($this->session->userdata('usertype')==='2'){
            $data['info'] = html_escape($this->form_model->get_info($report_id));
            $data['milestone'] = html_escape($this->form_model->get_info($report_id));
            $data['total'] = html_escape($this->form_model->get_info($report_id));
            $data['description'] = html_escape($this->form_model->get_description($report_id));
            $data['project_budget'] = html_escape($this->form_model->get_project_budget($report_id));
            $data['facilities'] = html_escape($this->form_model->get_project_budget($report_id));
            $data['project_members'] = html_escape($this->form_model->get_project_members($report_id));
            $data['sdg_table'] = html_escape($this->form_model->get_sdg_table($report_id));
            $data['target_groups'] = html_escape($this->form_model->get_target_groups($report_id));
            $this->load->view('applicant/header');
            $this->load->view('applicant/edit', $data);
      }else{
        $this->session->sess_destroy();

          redirect('users/login');
      }
    }

    public function update($info_id)
    {

      $this->form_validation->set_rules('project_name', 'Project Name', 'required');
      $this->form_validation->set_rules('course_code', 'Course Code', 'required');
      $this->form_validation->set_rules('organizer', 'Organizer', 'required');
      $this->form_validation->set_rules('co_organizer', 'Co-Organizer', 'required');
      $this->form_validation->set_rules('from_date', 'From Date', 'required');
      $this->form_validation->set_rules('to_date', 'To Date', 'required');
      $this->form_validation->set_rules('project_location', 'Project Location', 'required');
      $this->form_validation->set_rules('project_milestone', 'Project Milestone', 'required');
      $this->form_validation->set_rules('program_sustainability', 'Program Sustainability', 'required');
      $this->form_validation->set_rules('grand_total', 'Grand Total', 'required');

      //insert data into description table 
      $this->form_validation->set_rules('project_synopsis', 'Project Synopsis', 'required');
      $this->form_validation->set_rules('justification_project', 'Justification Project', 'required');
      $this->form_validation->set_rules('project_objectives', 'Project Objectives', 'required');
      $this->form_validation->set_rules('impact_community', 'Impact Community', 'required');

      //insert data into project_budget table
      $this->form_validation->set_rules('pr_qty[]', 'Quantity', 'required');
      $this->form_validation->set_rules('pr_desc[]', 'Description', 'required');
      $this->form_validation->set_rules('pr_cpu[]', 'Unit Cost', 'required');
      $this->form_validation->set_rules('pr_cpi[]', 'Item Cost', 'required');
      $this->form_validation->set_rules('facility[]', 'Facility', 'required');
      $this->form_validation->set_rules('date[]', 'Date', 'required');
      $this->form_validation->set_rules('unit[]', 'Unit Number', 'required');

      // insert data into project_members table
      $this->form_validation->set_rules('members_name[]', 'Members Name', 'required');
      $this->form_validation->set_rules('expertise[]', 'Expertise', 'required');
      $this->form_validation->set_rules('position[]', 'Position', 'required');
      $this->form_validation->set_rules('role[]', 'Role', 'required');
      $this->form_validation->set_rules('email[]', 'Email', 'required');
      $this->form_validation->set_rules('telephone[]', 'Telephone', 'required');

      // //insert data into target_groups table
      $this->form_validation->set_rules('number_student', 'Number Of Student', 'required');
      $this->form_validation->set_rules('target', 'Target', 'required');
      $this->form_validation->set_rules('justification', 'Justification', 'required');
      $this->form_validation->set_rules('activity_description', 'Activity Description', 'required');

      // //insert data into sdg_table table
      $this->form_validation->set_rules('sdg[]', 'Summary', 'required');
      
        
        $this->form_model->update_proposals($info_id);
        

        redirect('applicant/view_pending_forms/');
    }

		/*public function view($report_id) {
			$data['findings'] = html_escape($this->findings_model->get_findings($report_id));
			$data['executive_summary'] = $this->executive_summary_model->get_executive_summary($report_id);
			$data['testing_guidelines'] = $this->guidelines_model->get_testing_guidelines($report_id);
			$data['count_critical'] = $this->form_model->get_critical_count($report_id);
			$data['count_high'] = $this->form_model->get_high_count($report_id);
			$data['count_medium'] = $this->form_model->get_medium_count($report_id);
			$data['count_low'] = $this->form_model->get_low_count($report_id);
			$data['count_total'] = $this->form_model->get_total_count($report_id);


			$this->load->view('templates/header');
			$this->load->view('templates/sidebar');
			$this->load->view('forms/view', $data);
			$this->load->view('templates/footer');
		
		}*/

		public function delete($reportid){
			$this->form_model->delete_forms($reportid);
			$this->findings_model->delete_findings($reportid);
			$this->guidelines_model->delete_guidelines($reportid);
			$this->executive_summary_model->delete_executive($reportid);
			redirect('forms/index');
		}

		public function createpdf($report_id) {
			$data['info'] = html_escape($this->form_model->get_pdf_info($report_id));
      $data['milestone'] = html_escape($this->form_model->get_pdf_info($report_id));
      $data['total'] = html_escape($this->form_model->get_pdf_info($report_id));
      $data['description'] = html_escape($this->form_model->get_pdf_description($report_id));
      $data['sdg_table'] = html_escape($this->form_model->get_pdf_sdg_table($report_id));
      $data['target_groups'] = html_escape($this->form_model->get_pdf_target_groups($report_id));
      $data['project_members'] = html_escape($this->form_model->get_pdf_project_members($report_id));
      $data['project_budget'] = html_escape($this->form_model->get_pdf_project_budget($report_id));
      $data['facilities'] = html_escape($this->form_model->get_pdf_project_budget($report_id));
			$this->load->library('Pdf');
			$this->load->view('applicant/createpdf', $data);
		}

		public function report_list() {


        $data['div'] = $this->form_model->get_audit();

        $this->load->view('applicant/header', $data);
        $this->load->view('applicant/proposal_log', $data);
    }

    public function auditAdd($executor, $action, $beforeAction=array(), $afterAction= array()){


          // $data['users_item'] = $this->user_model->get_users($id);
    echo '<pre>' . print_r($beforeAction, TRUE) . '</pre>';

    $name = "sjs";
    $spesificID = $this->session->userdata('username');
    $action = $action;

    // $before = "";
    //    $after = "";
         //$userType = $data['users_item']['zipcode'];
    $status = "status";
    if($beforeAction && $afterAction != NULL){
      $bfre = array($beforeAction['username'] ,$beforeAction['name'], $beforeAction['email'] );
      $aftr =  array($afterAction['username'] ,$afterAction['name'], $afterAction['email'] );
// output one, two, three
      $insert_beforedata = implode("<br>", $beforeAction);
      $insert_afterdata = implode("<br>", $afterAction);
    }
    else{
      $insert_beforedata = "";
      $insert_afterdata =  "";
    }

//echo $insert_data;exit();

    $audit=array(

      'user' => $name,
      'action'=> $action,
      'id'=> "",
      'status' => $status,
      'spesificID' => $spesificID,
    );

    $this->form_model->audit_add($audit);



  }

		// public function header(){
		// 	$data['title'] = 'Forms';

		// 	$data['forms'] = $this->form_model->get_forms();

		// 	$this->load->view('templates/header');
		// 	$this->load->view('forms/index', $data);
		// 	$this->load->view('templates/footer');
		// }


		// public function edit($name){
		// 	$data['forms'] = $this->findings_model->get_findings($name);

		// 	if(empty($data['forms'])){
		// 		show_404();
		// 	}

		// 	$data['title'] = 'Edit Form';

		// 	$this->load->view('templates/header');
		// 	$this->load->view('forms/edit', $data);
		// 	$this->load->view('templates/footer');
		// }

		// public function update(){
		// 		//Upload image
		// 		$config['upload_path'] = './assets/images/forms';
		// 		$config['allowed_types'] = 'gif|jpg|png';
		// 		$config['max_size'] = '20480';
		// 		$config['max_width'] = '5000';
		// 		$config['max_height'] = '5000';

		// 		$this->load->library('upload', $config);

		// 		if(!$this->upload->do_upload()){
		// 			$errors = array('error' => $this->upload->display_errors());
		// 			$image = 'noimage.jpg';
		// 		} else {
		// 			$data = array('upload_data' => $this->upload->data());
		// 			$image = $_FILES['userfile']['name'];
		// 		}

		// 	$this->form_model->update_forms($image);
		// 	redirect('forms');
		// }
	}