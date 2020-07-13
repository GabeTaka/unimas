<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends MY_Controller {

    private function _render_page($view, $data = null)
    {
        $this->viewdata = (empty($data)) ? $this->data : $data;

        $this->load->view('admin/header.php', $this->viewdata);
        $this->load->view('admin/'.$view, $this->viewdata);
        $this->load->view('admin/footer.php', $this->viewdata);
    }

    public function exist_admin()
    {
        $user = $this->input->post('user');
        $pass = $this->input->post('pass');
        return $this->admin_model->existAdmin($user, $pass) ? true : false;
    }

    public function setting()
    {
      $this->load->view('admin/header');
       $this->load->view('admin/setting');
    }

    public function index()
    {
        if($this->session->userdata('usertype')==='1'){
            $data['UsersName'] =  $this->admin_model->get_users_name();
            $data['totalUsersNo'] =  $this->admin_model->get_total_users();
            $data['totalPendingUsersNo'] =  $this->admin_model->get_totalpending_users(); 
            $data['totalReportList'] =  $this->admin_model->get_totalreport_list(); 
            $data['totalAuditTrial'] =  $this->admin_model->get_audit_trial(); 
            // $this->load->view('templates/header');
            $this->load->view('admin/header');
             $this->load->view('admin/dashboard', $data);
      }else{
        $this->session->sess_destroy();

          redirect('users/login');
      }
    }

    public function view_users()
    {
        if($this->session->userdata('usertype')==='1'){
            $data['approved_users'] = html_escape($this->admin_model->get_view_users());
            $data['users'] = html_escape($this->admin_model->get_view_users());
            $this->load->view('admin/header');
            $this->load->view('admin/view_users', $data);
      }else{
        $this->session->sess_destroy();

          redirect('users/login');
      }
    }

    public function view_pending_users()
    {
        if($this->session->userdata('usertype')==='1'){
            $data['users'] = html_escape($this->admin_model->get_pending_users());
            $this->load->view('admin/header');
            $this->load->view('admin/view_pending_users', $data);

      }else{
        $this->session->sess_destroy();

          redirect('users/login');
      }
    }

    public function report_list()
    {
        if($this->session->userdata('usertype')==='1'){
            $data['info'] = html_escape($this->admin_model->get_report_list());
            $this->load->view('admin/header');
            $this->load->view('admin/report_list', $data);
      }else{
        $this->session->sess_destroy();

          redirect('users/login');
      }
    }

    public function update($id)
    {
        if($this->session->userdata('usertype')==='1'){
            $data['users'] = html_escape($this->admin_model->update_pending_users($id));
            $this->auditAdd($username, "Approve User","", "");
            redirect('admin/view_pending_users/');
      }else{
        $this->session->sess_destroy();

          redirect('users/login');
      }
    }

    public function delete($id){
      $this->admin_model->delete_pending_users($id);
      $this->auditAdd($username, "Delete User","", "");
      redirect('admin/view_pending_users/');
    }

    public function login()
    {
        if ($this->session->userdata('is_admin_login')) 
            redirect('admin/dashboard');

        $this->load->helper(array('form', 'security'));
        $this->load->library('form_validation');

        $this->form_validation->set_rules($this->admin_model->validation);

        if ($this->form_validation->run() == FALSE)
        {        
            $data = array(
                'page_title' => 'Login'
            );

            $this->_render_page('login.php', $data);
        }
        else
        {
            $data['user'] = $this->security->sanitize_filename($this->input->post('user'));
            $data['pass'] = $this->security->sanitize_filename($this->input->post('pass'));

            $sess_array = array(
                'user'=>$data['user'],
                'pass'=>$this->admin_model->genPass($data['pass'])
            );
            $this->session->set_userdata('is_admin_login', $sess_array);

            redirect('admin');
        }
    }
        
    public function logout()
    {
        $this->session->unset_userdata('is_admin_login');   
        $this->session->sess_destroy();
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
        $this->output->set_header("Pragma: no-cache");
        redirect('admin', 'refresh');
    }

    public function dashboard()
    {
        if (!$this->session->userdata('is_admin_login')) 
            redirect('admin');
        
        $data = array(
            'page_title' => 'Dashboard',
            'session' => $this->session->userdata('is_admin_login')
        );

        $this->_render_page('dashboard.php', $data);
    }

    public function audit_trial() {


        $data['div'] = $this->admin_model->get_audit();

        $this->load->view('admin/header', $data);
        $this->load->view('admin/audit_trial', $data);
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
      'beforeAction'=> $insert_beforedata,
      'afterAction' => $insert_afterdata,
    );

    $this->admin_model->audit_add($audit);



  }
}