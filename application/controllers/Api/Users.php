<?php
header('Content-type: application/json; charset=utf-8');
require_once("Comman_controller.php");
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(0);
//ob_start();

class Users extends CI_Controller {
    public function __construct()
    {
      parent::__construct();
    }     


    public function login(){
          comman_controller::varifyMethod("POST");
          
          extract($_POST);
          
          
          comman_controller::requiredValidation([
              'Login_Email'=>$Login_Email,
              'Login_Password'=>$Login_Password          
           ]);

          $email1 = strtolower($Login_Email);

          $getUser = $this->model->sel_row("login_master",array("Login_Email"=>$email1,"Login_Password"=>$Login_Password));

          if (count($getUser)==0) {
            return comman_controller::responseMessage(0, "Invalid UserId or Password.", "False");
          }

          $data['data']=$getUser;
          return comman_controller::successResponse($data,1, "Login successfully", "True");
        

    }

    public function updateProfile()
    {
    
        try{
            comman_controller::varifyMethod("POST");
            extract($_POST);
            
            comman_controller::requiredValidation([
                'Login_RowId'=>$Login_RowId,
                'Login_Name' => $Login_Name,
                'Login_Email'=>$Login_Email
             ]);

                   

            $userdtl=$this->model->sel_row('login_master',array("Login_RowId"=>$Login_RowId,"Login_IsActDct"=>0));  
            
             if(count($userdtl)>0){
                   
                    
                    if($Login_Email=="" || $Login_Email==NULL){
                        $Login_Email=$userdtl->Login_Email;
                    }
      
                    $upddata=array("Login_Name"=>$Login_Name,"Login_Email"=>$Login_Email,"Login_ModDate"=>cur_date_time);
                    
                    $this->model->update("login_master",$upddata,array("Login_RowId"=>$Login_RowId));
                  
                    $user_detail=$this->model->sel_row("login_master",array("Login_RowId"=>$Login_RowId));

                    if(count($user_detail)>0){
                                             
                      $data['data'] = $$user_detail; 
                      comman_controller::successResponse($data, 1,'Profile has been updated successfully','True');
                    }
                    else{
                        return comman_controller::responseMessage(0, "Something went wrong while update rofile, please try again.", "False");
                    }
            }
            else{
                return comman_controller::responseMessage(0, "Unable to update profile because of Invalid user_id or account is deactive", "False");
            }    
        }
   
    catch (Exception $e) {
        return comman_controller::responseMessage(0, "Something went wrong while update profile, please try again.", "False");
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
        
        $count_user=$this->model->record_count('login_master',array("Login_RowId"=>$user_id));  
        if($count_user>0){
          $userdtl=$this->model->sel_row('login_master',array("Login_RowId"=>$user_id));
          if($userdtl->Login_Password==$old_password){
            if($userdtl->Login_Password==$new_password){
              return comman_controller::responseMessage(0, "Your New password is same as old password. Please use different new password.", "False"); 
            }else{

              $this->model->update("login_master",array("Login_Password"=>$new_password),array("Login_RowId"=>$user_id));
            
             return comman_controller::responseMessage(1, "Your password changed successfully", "True");
           }
          }
          else{
            return comman_controller::responseMessage(0, "Your old password is incorrect", "False"); 
          }
         
        }
        else{
          return comman_controller::responseMessage(0, "Unable to change password because of Invalid user_id.", "False");
        }
            
        
    } 
  
  public function contactUs()
  { 
        comman_controller::varifyMethod("POST");
        
        extract($_POST);
        
        
        $name=$this->input->post('name');
        $email=$this->input->post('email');
        $subject=$this->input->post('subject');
        $message=$this->input->post('message');

        comman_controller::requiredValidation([
            'name'=>$name,
            'email' => $email,
            'subject'=>$subject,
            'message'=>$message            
         ]);
        
        
        
        $this->mailcontactus($name,$email,$subject,$message); 
       
        return comman_controller::responseMessage(1, "Thank you for contacting ".server_name .". We will get back to you shortly.", "True");
    }

    public function mailcontactus($name,$email,$subject,$message)
    {
        $message_body = '<div dir="ltr"><div class="adM"><br><br>
             </div><div class="gmail_quote"><center>
              <table cellspacing="0" cellpadding="0" border="0" align="center" width="100%" style="font-size:14px;background-color:#f0f0f0"> 
             <tbody><tr> 
              <td style="background-color:#000;padding:10px;padding-bottom:0px;"> 
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
         <td colspan="2" style="padding-top:10px;font-family:Georgia, Times New Roman; font-size:21px;"><b>User Information:</b></td> 
        </tr>    

        <tr> 
         <td style="padding-top:10px;font-family:Georgia, Times New Roman;">Name : <b>' . $name . '</b></td> 
        </tr>

        <tr> 
         <td style="padding-top:10px;font-family:Georgia, Times New Roman;"> Email : <b>' . $email . '<b/></td> 
        </tr>

        <tr> 
         <td style="padding-top:10px;font-family:Georgia, Times New Roman;"> subject : <b>' . $subject . '<b/></td> 
        </tr>

        <tr> 
         <td style="padding-top:10px;font-family:Georgia, Times New Roman;">Message  :  <b>' . $message . '</b></td> 
        </tr>
       
        <tr><td style="line-height: 19px;font-family:Georgia, Times New Roman;"><p>Sincerely yours,<br /> 
        '.server_name .' Team</p></td></tr>
         </tbody></table> </td> 
       </tr>
       <tr> 
        <td style="padding:10px;text-align:center;font-size:10px;color:#898989;background-color:#fff"> </td> 
       </tr> 
       <tr> 
        <td style="padding:5px;text-align:center;font-size:11px;color:#898989;background-color:#fff">&copy; ' . date("Y") . ', All Rights Reserved | '.server_name .'</td> 
       </tr> 
              </tbody></table>
             </center>
             </div></div>';

      
      comman_controller::sendMailSMTP(client_email, "Contact Us email from ".server_name,$message_body);
    }
    
   

    public function logOut()
    {
        try{
            comman_controller::varifyMethod("POST");
            extract($_POST);
            
           
            comman_controller::requiredValidation([
                'user_id'=>$user_id                          
             ]);

               
              $count_user=$this->model->record_count('login_master',array("Login_RowId"=>$user_id));  
                        
             if($count_user>0){
                    
              return comman_controller::responseMessage(1,'LogOut successfully','True');    
            }
            else{
                return comman_controller::responseMessage(0, "Unable to logout because of Invalid user_id.", "False");
            }    
        } 
      catch (Exception $e) {
          return comman_controller::responseMessage(0, "Something went wrong while logout, please try again.", "False");
      }

    }

    public function getHome()
    {
        try{
            comman_controller::varifyMethod("POST");
            extract($_POST);
            
           
            comman_controller::requiredValidation([
                //'user_id'=>$user_id                          
             ]);

            $getNotice = $this->model->sel_fld_res("*","noticeboard_master",array(1=>1));   
            $data['data']=$getNotice;
            return comman_controller::successResponse($data,1, "get Home successfully", "True");
                
        } 
      catch (Exception $e) {
          return comman_controller::responseMessage(0, "Something went wrong while logout, please try again.", "False");
      }

    }

    public function geOnlineVideo()
    {
        try{
            comman_controller::varifyMethod("POST");
            extract($_POST);
            
           
            comman_controller::requiredValidation([
                //'user_id'=>$user_id                          
             ]);

            $getVideo = $this->model->sel_fld_res("*","video_master",array("Video_IsActDct"=>0));   
            $data['data']=$getVideo;
            return comman_controller::successResponse($data,1, "get Video successfully", "True");
                
        } 
      catch (Exception $e) {
          return comman_controller::responseMessage(0, "Something went wrong while logout, please try again.", "False");
      }

    }

    public function submitQuery()
    {
        try{
            comman_controller::varifyMethod("POST");
            extract($_POST);
            
           
            comman_controller::requiredValidation([
                'user_id'=>$user_id,
                'teacher_id'=>$teacher_id,
                'message'=>$message                          
             ]);

            $this->model->insert("student_query_master",array("student_id"=>$user_id,"teacher_id"=>$teacher_id,"message"=>$message));
            return comman_controller::successResponse($data,1, "Query sent successfully", "True");
                
        } 
      catch (Exception $e) {
          return comman_controller::responseMessage(0, "Something went wrong while logout, please try again.", "False");
      }

    }

    public function getExamQuestion()
    {
        try{
            comman_controller::varifyMethod("POST");
            extract($_POST);
            
           
            comman_controller::requiredValidation([
                'user_id'=>$user_id,
                'date'=>$date                          
             ]);

            $getQuestions = $this->model->sel_fld_res("*","online_exam_question_master",array(1=>1));
            $data['data']=$getQuestions;
            return comman_controller::successResponse($data,1, "get Question successfully", "True");
                
        } 
      catch (Exception $e) {
          return comman_controller::responseMessage(0, "Something went wrong while logout, please try again.", "False");
      }
    }
    
    public function getHomework()
    {
        try{
            comman_controller::varifyMethod("POST");
            extract($_POST);
            
           
            comman_controller::requiredValidation([
                'user_id'=>$user_id,
                'date'=>$date                          
             ]);

            $getHomework = $this->model->sel_fld_res("*","homework_master",array(1=>1));
            $data['data']=$getHomework;
            return comman_controller::successResponse($data,1, "get HomeWork successfully", "True");
                
        } 
        catch (Exception $e) {
            return comman_controller::responseMessage(0, "Something went wrong while logout, please try again.", "False");
        }

    }

  
}