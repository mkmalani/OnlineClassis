<?php
require("application/controllers/Api/Comman_controller.php");
ob_start();
error_reporting(0);

class Online_learning extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
  }
  
  public function index()
  {
      if($this->session->userdata('sess_id'))
      {

        $data['videoDtl']=$this->model->select_ser("video_master",array(1=>1));
          $this->load->view('Admin/online_learning',$data);

          //add Country
          if($this->input->post("addvideo")){

            $Video_VideoId=$this->input->post("Video_VideoId");
            $Video_Name=$this->input->post("Video_Name");
            
            
              $adddata=array("Video_VideoId"=>$Video_VideoId,"Video_Name"=>$Video_Name,"Video_AddDate"=>cur_date_time,"Video_ModDate"=>cur_date_time);

              $this->model->insert("video_master",$adddata);

              redirect(current_url());
          }

          if($this->input->post("updatevideo")){

            $Video_VideoId=$this->input->post("Video_VideoId");
            $Video_Name=$this->input->post("Video_Name");
            $id=$this->input->post("id");
            
            

              $adddata=array("Video_VideoId"=>$Video_VideoId,"Video_Name"=>$Video_Name,"Video_ModDate"=>cur_date_time);

              $this->model->update("video_master",$adddata,array("Video_RowId"=>$id));

             

            redirect(current_url());
          }
      
    }
    else
    {
      redirect(base_url()); 
    } 
  }


  

  

  public function edit_video()
  {
    $id=$this->input->post("id");
    $videoDtl=$this->model->sel_row("video_master",array("Video_RowId"=>$id));

    ?>
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <form name="updatevideoform" method="post" enctype="multipart/form-data" autocomplete="off">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Update Video</h4>
            </div>

            <div id="" class="modal-body">
              <div class="container">
                <div class="form-group">
                  <div class="row">
                    <label><b>Video Name</b></label>
                    <div class="row">
                      <div class="col col-md-12">
                        <input type="text" name="Video_Name" placeholder="Video Name" value="<?=$videoDtl->Video_Name?>" class="form-control" required>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row">
                    <label><b>Video URL</b></label>
                    <div class="row">
                      <div class="col col-md-12">
                        <input type="text" name="Video_VideoId" placeholder="Video URL" value="<?=$videoDtl->Video_VideoId;?>" class="form-control" required>
                      </div>
                    </div>
                  </div>
                </div>
                

              </div>
              <input type="hidden" name="id" id="id" value="<?=$videoDtl->Video_RowId?>">
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <input type="submit" name="updatevideo" value="Update" class="btn btn-primary">
            </div>
          </form>
        </div>

      </div>

    <?php
  }

  
  public function delete_video()
  {
    $id=$this->input->post("id");    
    $this->model->update("video_master",array("Video_IsActDct" => 1),array("Video_RowId" => $id));
    
  }


}   
