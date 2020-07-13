<?php
	class Coordinator extends MY_Controller{

		public function index(){
			if($this->session->userdata('usertype')==='3'){
				$data['UsersName'] =  $this->coordinator_model->get_users_name();
				$data['totalFormsNo'] =  $this->coordinator_model->get_total_proposals();
        $data['totalPendingFormsNo'] =  $this->coordinator_model->get_totalpending_proposals();
        $data['totalProposalLog'] =  $this->form_model->get_totalproposal_log();
        $data['totalProposal'] =  $this->form_model->get_totalproposal();
				$this->load->view('coordinator/header');
				$this->load->view('coordinator/dashboard', $data);
			}else{
				$this->session->sess_destroy();

				redirect('users/login');
			}

		}

		public function view_proposals()
    {
        if($this->session->userdata('usertype')==='3'){
            $data['approved_forms'] = html_escape($this->coordinator_model->get_view_proposals());
            $data['info'] = html_escape($this->coordinator_model->get_view_proposals());
            $this->load->view('coordinator/header');
            $this->load->view('coordinator/view_proposals', $data);
      }else{
        $this->session->sess_destroy();

          redirect('users/login');
      }
    }

    public function view_proposal_list()
    {
        if($this->session->userdata('usertype')==='3'){
            $data['info'] = html_escape($this->coordinator_model->get_total_proposal());
            $this->load->view('coordinator/header');
            $this->load->view('coordinator/proposal_list', $data);
      }else{
        $this->session->sess_destroy();

          redirect('users/login');
      }
    }

    public function report_list() {


        $data['div'] = $this->coordinator_model->get_audit();

        $this->load->view('coordinator/header', $data);
        $this->load->view('coordinator/proposal_log', $data);
    }

    public function view_pending_proposals()
    {
        if($this->session->userdata('usertype')==='3'){
            $data['info'] = html_escape($this->coordinator_model->get_pending_proposals());
            $this->load->view('coordinator/header');
            $this->load->view('coordinator/view_pending_proposals', $data);
      }else{
        $this->session->sess_destroy();

          redirect('users/login');
      }
    }

    public function createpdf() {
      
      $data['info'] = $this->coordinator_model->get_info();
      $this->load->library('Pdf');
      $this->load->view('applicant/createpdf', $data);
    }

    public function update($id)
    {
        if($this->session->userdata('usertype')==='3'){
            $data['info'] = html_escape($this->coordinator_model->update_pending_proposals($id));
            $this->proposalAdd($username, "Approve Proposal","", "");
            redirect('coordinator/view_pending_proposals/');
      }else{
        $this->session->sess_destroy();

          redirect('users/login');
      }
    }

    public function delete($info_id){
      $this->coordinator_model->delete_proposals($info_id);
      $this->proposalAdd($username, "Decline Proposal","", "");
      redirect('coordinator/view_pending_proposals');
    }

	}