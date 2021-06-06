<?php


class post_model extends CI_Model{
    function insertPostData(){
      $data=array(

            'title'=>$this->input->post('title',TRUE),
            'description'=>$this->input->post('description',TRUE),
            'catergory'=>$this->input->post('catergory',TRUE)
            

      );

                return  $this->db->insert('posts',$data);
                // return false;
    }


    function showPostData(){
        $data=$this->db->get('posts');
        // $data=$this->db->query("SELECT * FROM posts ORDER BY id DESC");
        return $data;
        // print_r($data->result_array());
        // // echo'hi';
        // die();
    }

    function deletePostData($id){

        $data=$this->db->where("id",$id);
        $data=$this->db->delete("posts");
        return $data;
       
    }

    function getEditPostData($id){
        $data=$this->db->where("id",$id);
        $data=$this->db->get("posts");
        return $data;
    }

    function insertEditPostData(){

        $data=array(

            'title'=>$this->input->post('title',TRUE),
            'description'=>$this->input->post('description',TRUE),
            'catergory'=>$this->input->post('catergory',TRUE),
            'id'=>$this->input->post('id',TRUE)

      );

    //   print_r($data['id']);
    //   die();

    
                 $this->db->where("id",$data['id']);
                $response=$this->db->update("posts", $data);
                return $response;
                
    }
 
}
?>