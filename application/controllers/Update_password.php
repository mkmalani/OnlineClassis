<?php
require("application/controllers/Api/Comman_controller.php");
ob_start();
error_reporting(0);

class Update_password extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
  }
  
  public function index()
  {
    if($this->session->userdata('sess_id'))
    {
      $this->load->view("Admin/change_password");
    }
    else
    {
      redirect(base_url());
    } 
  }


  

  public function changePassword()
  { 
        comman_controller::varifyMethod("POST");
        
        extract($_POST);
        
        comman_controller::requiredValidation([
            'user_id'=>$user_id,
            'old_password'=>$old_password,
            'new_password' => $new_password 
         ]);
        
        

        $count_user=$this->model->record_count('admin_master',array("id"=>$user_id));  
        if($count_user>0){
          $userdtl=$this->model->sel_row('admin_master',array("id"=>$user_id));
          if($userdtl->password==md5($old_password)){
            if ($old_password != $new_password) {
              $this->model->update("admin_master",array("password"=>md5($new_password)),array("id"=>$user_id));
            
              return comman_controller::responseMessage(1, "Your password changed successfully", "True");
            }
            else
            {
              return comman_controller::responseMessage(0, "Your old password and new password same", "False"); 
            }
            
          }
          else{
            return comman_controller::responseMessage(0, "Your old password is incorrect", "False"); 
          }
         
        }
        else{
          return comman_controller::responseMessage(0, "Unable to change password because of Invalid id.", "False");
        }
            
        
  }


}   