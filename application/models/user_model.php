<?php


class user_model extends CI_Model{
    function insertUserData(){
      $data=array(

            'name'=>$this->input->post('name',TRUE),
            'email'=>$this->input->post('email',TRUE),
            'password'=>sha1($this->input->post('password',TRUE))
            

      );

                return  $this->db->insert('users',$data);
                // return false;
    }
    function loginUserData(){

        $email =$this->input->post('email');
        $password=sha1($this->input->post('password'));

        $this->db->where('email', $email);
        $this->db->where('password', $password);
        $respond=$this->db->get('users');

        if($respond->num_rows()){
           return $respond->row(0);
        }
        else{
           return false;
        }
    }

    function insert_image($data){
        $this->db->insert("user_image",$data);

    }

        function fetch_image(){
            $output='';
            $this->db->select("name");
            $this->db->from("user_image");
            $this->db->order_by("id", "DESC");
            $query=$this->db->get();
            foreach($query->result() as $row){
                $output.='
                    <div class="col-md-3">
                    <img src="'.base_url(). 'upload/' .$row->name.'" class="img-responsive img-thumbnail"/>
                    </div>
                ';
            }

            return $output;
            

        }
    
}
?>