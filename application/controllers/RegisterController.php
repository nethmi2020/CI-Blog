<?php 

class RegisterController extends Ci_Controller{
     

    public function registerUser(){

        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('againpassword', 'Password Confirmation', 'required|matches[password]');

        if($this->form_validation->run()==FALSE){
            $this->load->view('Register');
        }
      else{
        $this->load->model('user_model');
       $response= $this->user_model->insertUserData();

       if($response){


          $this->session->set_flashdata('msg','You registered successfully, Please Login');
          redirect('Welcome/login');
       }else{

        $this->session->set_flashdata('msg','Something went wrong');
        redirect('Welcome/register');
       }
      }
    }
}
?>