<?php
require("application/controllers/Api/Comman_controller.php");
ob_start();
error_reporting(0);

class Student_management extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
  }
  
  public function index()
  {
      if($this->session->userdata('sess_id'))
      {
          $data['userDtl']=$this->model->select_ser("login_master",array(1=>1));
          $this->load->view('Admin/student_management',$data);

          //add Country
          if($this->input->post("adduser")){

            $Login_Email=$this->input->post("email");
            $Login_Name=$this->input->post("name");
            $Login_Password=$this->input->post("Login_Password");
            
            $chkEmail = $this->model->sel_row("login_master",array("Login_Email"=>$Login_Email));
            if (count($chkEmail)==0) {
              $adddata=array("Login_Name"=>$Login_Name,"Login_Email"=>$Login_Email,"Login_Password"=>$Login_Password,"Login_AddDate"=>cur_date_time,"Login_ModDate"=>cur_date_time);

              $this->model->insert("login_master",$adddata);
            }
            else
            {
              $this->session->set_flashdata("error","Email already exist");
            }

            redirect(current_url());
          }

          if($this->input->post("updateuser")){

            $Login_Email=$this->input->post("email");
            $Login_Name=$this->input->post("name");
            $Login_Password=$this->input->post("Login_Password");
            $id=$this->input->post("id");
            
            $chkEmail = $this->model->sel_row("login_master",array("Login_Email"=>$Login_Email,"Login_RowId !="=>$id));
            if (count($chkEmail)==0) {

              $adddata=array("Login_Name"=>$Login_Name,"Login_Email"=>$Login_Email,"Login_Password"=>$Login_Password,"Login_ModDate"=>cur_date_time);

              $this->model->update("login_master",$adddata,array("Login_RowId"=>$id));

            }
            else
            {
              $this->session->set_flashdata("error","Email already exist");
            }

            redirect(current_url());
          }
      
    }
    else
    {
      redirect(base_url()); 
    } 
  }


  

  

  public function edit_user()
  {
    $id=$this->input->post("id");
    $userDtl=$this->model->sel_row("login_master",array("Login_RowId"=>$id));

    ?>
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <form name="updateuserform" method="post" enctype="multipart/form-data" autocomplete="off">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Update User</h4>
            </div>

            <div id="" class="modal-body">
              <div class="container">
                <div class="form-group">
                  <div class="row">
                    <label><b>Name</b></label>
                    <div class="row">
                      <div class="col col-md-12">
                        <input type="text" name="name" placeholder="Name" value="<?=$userDtl->Login_Name?>" class="form-control" required>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row">
                    <label><b>Email</b></label>
                    <div class="row">
                      <div class="col col-md-12">
                        <input type="email" name="email" placeholder="Email" value="<?=$userDtl->Login_Email?>" class="form-control" required>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row">
                    <label><b>Password</b></label>
                    <div class="row">
                      <div class="col col-md-12">
                        <input type="text" name="Login_Password" placeholder="Password" value="<?=$userDtl->Login_Password?>" class="form-control" required>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
              <input type="hidden" name="id" id="id" value="<?=$userDtl->Login_RowId?>">
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <input type="submit" name="updateuser" value="Update" class="btn btn-primary">
            </div>
          </form>
        </div>

      </div>

    <?php
  }

  
  public function delete_user()
  {
    $id=$this->input->post("id");    
    $this->model->delete("login_master",array("Login_RowId" => $id));
    
  }

  public function user_status()
  {
    $id=$this->input->post("id");
    $status=$this->input->post("status");
    if ($status == "true") {
      $status = 0;
    }
    else
    {
      $status = 1;
    }
    $this->model->update("login_master",array("Login_IsActDct"=>$status),array("Login_RowId" => $id));
  }

  

  

}   
