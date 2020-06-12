<?php
require("application/controllers/Api/Comman_controller.php");
ob_start();
error_reporting(0);
class Login extends CI_Controller{
	public function __construct()
    {
    	parent::__construct();
    }

	public function index()
	{
		$this->load->view('Admin/login');

		if($this->input->post('login')){			
        	$email=$this->input->post('email');
			$pass=md5($this->input->post('password'));
			$pass1=$this->input->post('password');
			$rem=$this->input->post('rem');

			$data=array("email"=>$email,"password"=>$pass);

			$admindata=$this->model->sel_row("admin_master",$data);
			$total_admin=$this->model->record_count("admin_master",$data);

			if($total_admin>0){
        if ($admindata->is_disabled == 0) {
          if ($admindata->is_confirm == 1) {
            $datas=array("sess_id"=>$admindata->id,"user_type"=>$admindata->user_type);
            $this->session->set_userdata($datas);
            if($rem=="rem_email_pas"){
              setcookie("lc_mail", $email,strtotime('+1 month'));
              setcookie("lc_pass", $pass1,strtotime('+1 month'));
            }
            redirect(base_url()."Home");
          }
          else
          {
            $this->session->set_flashdata('error', 'Please click on the confirmation link sent to your email to activate this account.');
            redirect(base_url());
          }
        }
        else{
          $this->session->set_flashdata('error', 'User is inactive ,please contact admin.');
          redirect(base_url());
        }
					
			}
			else{
				$this->session->set_flashdata('error', 'Incorrect Email or Password.');
				redirect(base_url());
			}
		}
	}

  public function FolderAccess()
  {
    if($this->session->userdata('sess_id'))
    {
      redirect(base_url().'Home');
    }
    else
    {
      redirect(base_url());
    }
  }

	public function logout()
	{
		$this->session->sess_destroy();	
		redirect(base_url());	
	}

	public function ForgotPassword()
	{
		$this->load->view("Admin/forgot_password");
	}

	public function forgotPasswd()
    { 
        comman_controller::varifyMethod("POST");
        
        extract($_POST);
        
        
       
        comman_controller::requiredValidation([
            'email' => $email            
         ]);

       
       
        $chkEmail=$this->model->sel_row("admin_master",array("email"=>$email));
        $ucode = comman_controller::generateRandomCode();


        if(count($chkEmail)==0){
            return comman_controller::responseMessage(0, "This email is not registered with us.", "False");
        }
        else if(count($chkEmail)>0 && $chkEmail->is_confirm==0){
          return comman_controller::responseMessage(2, "Please click on the confirmation link sent to your email to activate this account.", "False");
        }    
        else if(count($chkEmail)>0)
        { 
          $this->model->update("admin_master",array("ucode"=>$ucode),array("email"=>$email));
          $this->mailForgotPassword($email,$chkEmail->name,$ucode); 
                      
          return comman_controller::responseMessage(1, "Reset password link is sent to your registered email address", "True");
        }
        else{
          return comman_controller::responseMessage(0, "Something went wrong", "False");
        }
    }
   

    function mailForgotPassword($email,$name,$ucode)
    {
        $encEmail=base64_encode($email);

        $link=server_url."Core/resetPassword.php?email=$encEmail";

        $message = '<div dir="ltr"><div class="adM"><br><br>
             </div><div class="gmail_quote"><center>
              <table cellspacing="0" cellpadding="0" border="0" align="center" width="100%" style="font-size:14px;background-color:#f0f0f0"> 
             <tbody><tr> 
              <td style="background-color:#a5d1f6;padding:10px;padding-bottom:0px;"> 
               <table cellspacing="0" cellpadding="0" border="0" width="100%"> 
              <tbody><tr> 
               <td> 
                <table cellspacing="0" cellpadding="0" border="0" align="center" width="100%" style="max-width:600px"> 
               
               <tbody><tr> 
                    <td align="center" style="padding:20px"><a target="_blank" style="outline:none;border:0px"><img border="0" align="absbottom" alt="" src="'.email_logo.'" class="CToWUd" width="100" height="100"></a></td> 
               </tr> 
               <tr> 
                <td style="padding:20px;text-align:center;font-size:22px;background-color:#fff;border-top-right-radius:7px;border-top-left-radius:7px"></td> 
               </tr> 
                </tbody></table> </td> 
              </tr> 
               </tbody></table> </td> 
             </tr> 
             <tr> 
              <td>  
               <table cellspacing="0" cellpadding="0" border="0" align="center" width="100%" style="max-width:600px;padding:20px;padding-top:5px;text-align:center;line-height:22px;font-size:16px;background-color:#fff;border-bottom-right-radius:7px;border-bottom-left-radius:7px"> 
              <tbody>
              <tr> 
         <td colspan="2" style="padding-top:10px;font-family:Georgia, Times New Roman; font-size:21px;"><b>Hi ' . $name . ',</b></td> 
        </tr>    

        <tr> 
               <td style="padding-top:10px;font-family:Georgia, Times New Roman;">We\'ve received a request to reset your password. If you didn\'t make the request, just ignore this email.</td> 
              </tr> 
             
              <tr> 
               <td style="padding-top:10px;font-family:Georgia, Times New Roman;"><a href="' . $link . '"> Click here to change your password.</a></td> 
              </tr>
              <tr> 
               <td style="padding-top:10px;font-family:Georgia, Times New Roman;">If you have any questions or trouble logging on please contact an app administrator.</td> 
              </tr>
              <tr><td style="line-height: 19px;font-family:Georgia, Times New Roman;"><p>Sincerely yours,<br /> 
              '.server_name.' Team</p></td></tr>
               </tbody></table> </td> 
             </tr>
           <tr> 
            <td style="padding:10px;text-align:center;font-size:10px;color:#898989;"> </td> 
           </tr> 
           <tr> 
            <td style="padding:5px;text-align:center;font-size:11px;color:#000;">&copy; ' . date("Y") . ', All Rights Reserved | '.server_name.'</td> 
           </tr> 
              </tbody></table>
             </center>
             </div></div>';
           
//      return comman_controller::sendMail($email, "Forgot your password?", $message); 
	return comman_controller::sendMailSMTP($email, "Forgot your password?", $message); 

    }


}

?>
