<?php


require_once APPPATH . 'third_party/instagram/src/Instagram.php';

use MetzWeb\Instagram\Instagram;


class Insta extends CI_Controller
{
    private $instagram;

    public function __construct()
    {

        parent::__construct();
        $this->load->model('instagramdata_model');

        // initialize class
        $this->instagram = new Instagram(array(
            'apiKey'      => 'b008761729b94db683194b01423e0b12',
            'apiSecret'   => 'fcb5c111a0cc4af2a78056a37f1015cb',
            'apiCallback' => 'http://54.213.72.98/gapstar/insta/insta_success' // must point to success.php
        ));



    }

    public function index(){

        $codeSet =$this->instagramdata_model->getInstaAccessCode(6);

        if( isset($codeSet->insta_key)){
            $this->instagram->setAccessToken($codeSet->insta_key);
        }else{
            header('Location:'.base_url().'insta/authenticate');
        }


        $this->form_validation->set_rules('start', 'Start', 'required');
        $this->form_validation->set_rules('end', 'End', 'required');


        if ($this->form_validation->run() === false) {

            $showStart = date('d-m-Y', strtotime('-30 days'));
            $showEnd = date('d-m-Y');

        } else {
            $showStartGet = $this->input->post('start');

            $showStart = date('d-m-Y', strtotime($showStartGet));

            $showEndGet = $this->input->post('end');
            $showEnd = date('d-m-Y', strtotime($showEndGet));
        }

        $data = array();

        $users = $this->get_user_info();

        $allPosts = $this->get_posts($users->counts->media);

        $medias = array();

        foreach($allPosts as $media){



            $paymentDate = $media->created_time;
            $contractDateBegin = strtotime($showStart);
            $contractDateEnd = strtotime($showEnd);

            if($paymentDate > $contractDateBegin && $paymentDate < $contractDateEnd) {
                $medias[] = $media;
            }

        }


        $data = array(
            'controller' => 'Instagram',
            'page' => 'Dashboard',
            'user' => $users,
            'posts' => $medias,
            'showStart' => $showStart,
            'showEnd' => $showEnd,
            'google' => array(
                'resultData' => "",
                'sub' => 'Google'
            )

        );

        $data['breadcrumb'] = array(

            'icon'=> 'fa-instagram',
            'head_url'=>'',
            'title'=> 'Instagram',
            'sub'=>'',
            'date'=> 1
        );


        $this->load->view('header', $data);
        $this->load->view('instagram/dashboard');
        $this->load->view('footer');

    }

    public function authenticate(){

        //create login URL
        $loginUrl = $this->instagram->getLoginUrl();

        $codeSet =$this->instagramdata_model->getInstaAccessCode(6);

        $data['loginUrl'] = $loginUrl;

        $data['is_authenticate'] = $codeSet;

        $data['breadcrumb'] = array(

            'icon'=> 'fa-instagram',
            'head_url'=>'/insta',
            'title'=> 'Instagram',
            'sub'=>'Authenticate',
            'date'=> 0
        );


        $this->load->view('header', $data);
        $this->load->view('instagram/authenticate');
        $this->load->view('footer');


    }

    public function insta_success(){

        $code = $_GET['code'];

// check whether the user has granted access
        if (isset($code)) {

            // receive OAuth token object
            $data = $this->instagram->getOAuthToken($code);

            $username = $data->user->username;

            // store user access token
            $this->instagram->setAccessToken($data);

            $dataSave = array(
                'insta_key' => $this->instagram->getAccessToken(),
                'user_name'=>$data->user->username,
                'status' =>1,
            );



            $codeSet =$this->instagramdata_model->save_insata(6,$dataSave);

            header('Location:'.base_url().'insta/');


        } else {

            // check whether an error occurred
            if (isset($_GET['error'])) {
                echo 'An error occurred: ' . $_GET['error_description'];
            }

        }

    }

    public function generate_report(){

        $codeSet =$this->instagramdata_model->getInstaAccessCode(6);

        if( isset($codeSet->insta_key)){
            $this->instagram->setAccessToken($codeSet->insta_key);
        }else{
            header('Location:'.base_url().'insta/authenticate');
        }


        $this->form_validation->set_rules('start', 'Start', 'required');
        $this->form_validation->set_rules('end', 'End', 'required');


        if ($this->form_validation->run() === false) {

            $showStart = date('d-m-Y', strtotime('-30 days'));
            $showEnd = date('d-m-Y');

        } else {
            $showStartGet = $this->input->post('start');

            $showStart = date('d-m-Y', strtotime($showStartGet));

            $showEndGet = $this->input->post('end');
            $showEnd = date('d-m-Y', strtotime($showEndGet));
        }

        $data = array();

        $users = $this->get_user_info();

        $allPosts = $this->get_posts($users->counts->media);

        $medias = array();

        $hastags = array();
        foreach($allPosts as $media){



            $paymentDate = $media->created_time;
            $contractDateBegin = strtotime($showStart);
            $contractDateEnd = strtotime($showEnd);



            if($paymentDate > $contractDateBegin && $paymentDate < $contractDateEnd) {
                $medias[] = $media;

                foreach($media->tags as $tag){

                    if (array_key_exists($tag,$hastags))
                    {
                        $hastags[$tag]['likes'] = $hastags[$tag]['likes'] + $media->likes->count;
                        $hastags[$tag]['count'] = $hastags[$tag]['count'] + 1;

                    }
                    else
                    {
                        $hastags[$tag] = array(
                            'likes'=>$media->likes->count,
                            'count'=>1,
                        );
                    }


                }



            }


        }


        $lable = array();
        $values = array();

        foreach ($hastags as $key=>$hastag) {
            $lable[] = $key;
            $values[] = $hastag['likes'];
        }



        $data = array(
            'controller' => 'Instagram',
            'page' => 'Instagram',
            'user' => $users,
            'posts' => $hastags,
            'lable'=> json_encode($lable),
            'values'=> json_encode($values),
            'showStart' => $showStart,
            'showEnd' => $showEnd,

        );

        $data['breadcrumb'] = array(

            'icon'=> 'fa-instagram',
            'head_url'=>'insta',
            'title'=> 'Instagram',
            'sub'=>'Report',
            'date'=> 1
        );


        $this->load->view('header', $data);
        $this->load->view('instagram/report');
        $this->load->view('footer');

    }


    public function get_user_info(){

        $user = $this->instagram->getUser();

        return $user->data;

        // var_dump( $this->instagram->pagination($this->instagram->getUserMedia('self',-1)));

    }

    public function get_posts($numb_post){

        $posts =  $this->instagram->getUserMedia('self',$numb_post);

        return $posts->data;

    }

    public function deleteAccount(){

        $this->instagramdata_model->deleteInstaAccount(6);

        header('Location:'.base_url().'insta/authenticate');
    }

}
