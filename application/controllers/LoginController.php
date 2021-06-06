<?php 

class LoginController extends Ci_Controller{
     

    public function loginUser(){

      
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        

        if($this->form_validation->run()==FALSE){
            $this->load->view('Login');
        }
      else{
        $this->load->model('user_model');
       $response= $this->user_model->loginUserData();

       if($response !=false){

        $user_data=array(

          'user_id'=>$response->id,
          'name' =>$response->name,
          'email'=>$response->email,
          'loggedin'=>TRUE

        );

        $this->session->set_userdata($user_data);
        $this->session->set_flashdata('msg','Welcome Back');
        redirect('AdminController/index');

       }else{

        $this->session->set_flashdata('msg','Something went wrong, Check your email and password');
        redirect('Welcome/login');
       }
      }
    }

    public function logoutuser(){

      $this->session->unset_userdata('user_id');
      $this->session->unset_userdata('name');
      $this->session->unset_userdata('email');
      $this->session->unset_userdata('loggedin');

      redirect('Welcome/login');
    }

    public function image_upload(){
      $data['title']="upload a user image using jquery in Codeigniter";
      $this->load->model('user_model');
      $data["image_data"]= $this->user_model->fetch_image();
      $this->load->view('Admin/upload_profile',$data);
    }

    public function ajax_upload(){
     
      if(isset($_FILES["image_file"]["name"])){
        $config['upload_path']='./upload/';
        $config['allowed_types']='jpg|jpeg|png|gif';
        $this->load->library('upload', $config);
        if(!$this->upload->do_upload('image_file')){

          echo $this->upload->display_errors();

        }
        else{
          $data=$this->upload->data();
          $config['image_library']='gd2';
          $config['source_image']='./upload/'.$data["file_name"];
          $config['create_thumb']=FALSE;
          $config['maintain_ratio']=FALSE;
          $config['quality']='30%';
          $config['width']=200;
          $config['height']=200;
          $config['new_image']='./upload/'.$data["file_name"];
          $this->load->library('image_lib', $config);
          $this->image_lib->resize();
          $this->load->model('user_model');
          $image_data=array(
            'name'=> $data["file_name"]
          );
          $this->user_model->insert_image($image_data);
          echo  $this->user_model->fetch_image();


          echo '<img src="'.base_url(). 'upload/' .$data["file_name"].'" />';
        }

      }
    }
}
?>