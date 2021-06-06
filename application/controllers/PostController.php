<?php 

class PostController extends Ci_Controller{


            public function savepost(){

                        $this->form_validation->set_rules('title', 'Title', 'required');
                        $this->form_validation->set_rules('description', 'Description', 'required');
                    
                        if($this->form_validation->run()==FALSE){

                                 $this->load->view('Admin/addpost');
                        }

                        else{
                                $this->load->model('post_model');
                            $response= $this->post_model->insertPostData();

                                    if($response){


                                        $this->session->set_flashdata('msg','You added post  successfully');
                                        
                                        redirect('Postcontroller/addpost');
                                    }
                                    
                                    else{

                                        $this->session->set_flashdata('msg','Something went wrong');
                                        redirect('Postcontroller/addpost');
                                    }
                    }
            }


            public function addpost(){
                $this->load->view('Admin/addpost');

            }


           public function viewpost(){
                $this->load->model('post_model');
                $data["fetch_data"]=$this->post_model->showPostData();
                $this->load->view('Admin/viewpost',$data);
        }


        public function deletepost($id){
            // echo 'hi';
            // die();

            $id=$this->uri->segment(3);
            $this->load->model('post_model');
            
            $response= $this->post_model->deletePostData($id);

              if($response){


                $this->session->set_flashdata('msg','You deleted  post  successfully');
                                        
                     redirect('Postcontroller/deleted');
                                    }
                                    
              else{

                    $this->session->set_flashdata('msg','Something went wrong');
                    redirect('Postcontroller/deleted');
                                    }

        }


        public function deleted(){
            $this->viewpost();
        }

        public function editpost(){
            $id=$this->uri->segment(3);
            $this->load->model('post_model');
            $data["fetch_data"]= $this->post_model->getEditPostData($id);
            $this->load->view('Admin/editpost',$data);

        }

        public function editedpost(){
            $this->addpost();
        }
        public function editsavepost(){

            // echo 'edited';
            // die();

            $this->load->model('post_model');
            $response= $this->post_model->insertEditPostData();

                    if($response){


                        $this->session->set_flashdata('msg','You Edited post  successfully');
                        
                        redirect('Postcontroller/editedpost');
                    }
                    
                    else{

                        $this->session->set_flashdata('msg','Something went wrong');
                        redirect('Postcontroller/editedpost');
                    }

        }

                public function singlepost($id){

                    $this->load->model('post_model');
                    $data["fetch_data"]= $this->post_model->getEditPostData($id);
                    $this->load->view('singlepost',$data);
        
                    
                }
  
}
?>