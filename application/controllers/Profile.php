<?php
require("application/controllers/Api/Comman_controller.php");
ob_start();
error_reporting(0);

class Profile extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
  }
  
  public function index()
  {
    if($this->session->userdata('sess_id'))
    {
      $data['userData']=$this->model->sel_row("admin_master",array("id"=>$this->session->userdata('sess_id')));
      $this->load->view("Admin/profile",$data);
    }
    else
    {
      redirect(base_url());
    } 
  }


  

  public function updateProfile()
  {
    
        try{
            comman_controller::varifyMethod("POST");
            extract($_POST);
            

            comman_controller::requiredValidation([
                'user_id'=>$user_id,
                'fname'=>$fname,
                'lname'=>$lname,
                'email'=>$email
             ]);

         
            $userCheck=$this->model->sel_row('admin_master',array("id"=>$user_id,"is_confirm"=>1));  
             if(count($userCheck)>0){

                $chkmail=$this->model->sel_row("admin_master",array("email"=>$email,"id!="=>$user_id));
               
               
                if(count($chkmail)>0){
                  return comman_controller::responseMessage(0, "This email has already been registered by another user.", "False");
                }
                else{ 
                   
                  
                    $upddata=array("name"=>$fname,"lname"=>$lname,"email"=>$email,"updated_date"=>cur_date_time);
                    
                    $this->model->update("admin_master",$upddata,array("id"=>$user_id));
                  
                        
                    comman_controller::successResponse($data, 1,'Profile has been updated successfully','True');
                    
              } 
            }
            else{
                return comman_controller::responseMessage(0, "Unable to update profile because of Invalid user_id.", "False");
            }    
        }
     
      catch (Exception $e) {
          return comman_controller::responseMessage(0, "Something went wrong while update profile, please try again.", "False");
      }  
        
  }


}   