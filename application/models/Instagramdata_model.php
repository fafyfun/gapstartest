<?php
/**
 * Created by PhpStorm.
 * User: fawaz
 * Date: 11/12/17
 * Time: 10:52 AM
 */

class Instagramdata_model extends CI_Model
{
    public function __construct() {

        parent::__construct();
        $this->load->database();

    }

    public function save_insata($user_id, $cred){

        $this->db->from('instagram_data');
        $this->db->where('user_id', $user_id);

        $query = $this->db->get()->row();

        if(empty($query)){

            $cred['user_id'] = $user_id;

            $return = array(
                'error' => 0,
                'message'=>"Successfully Added",
                'response'=>$this->db->insert('instagram_data', $cred)
            );

            return $return ;

        }else{

            $return = array(
                'error' => 1,
                'message'=>"Profile Already Added"
            );



            return $return ;
        }

    }

    public function getInstaAccessCode($userid)
    {
        $this->db->from('instagram_data');
        $this->db->where('user_id', $userid);
        $this->db->where('status', 1);

        return $this->db->get()->row();

    }

    public function deleteInstaAccount(){
        $this->db->where('user_id', 6);
        $this->db->delete('instagram_data');
    }

}