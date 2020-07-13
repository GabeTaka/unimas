<?php
class MY_Controller extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->library('session');


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

    $this->admin_model->audit_add($audit);



  }

  public function proposalAdd($executor, $action, $beforeAction=array(), $afterAction= array()){


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

    $this->form_model->proposal_add($audit);



  }
}


