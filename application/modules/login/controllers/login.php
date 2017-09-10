<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends MX_Controller {

    //public $counter=0;
    function __construct() {
        parent::__construct();
        $this->load->library("session");
        $this->load->model('login_model');
        $this->load->helper('text');
        $this->load->helper(array('form', 'url'));
        $this->load->helper('inflector');
        $this->load->library('encrypt');
       
        $email = $this->session->userdata('email');
        $login = $this->session->userdata('logged_in');

        if ($email != NULL || $email != '' ) {
            redirect('admin');
        }else{
             
        }


    }

    public function index() {
        $this->load->view('layouts/login_header');
        $this->load->view('layouts/footer');        
        $this->load->view('login');
        
    }


    public function login_check() {
        $email = $this->input->post('email');
        //$password = $this->encryptIt($this->input->post('password'));
        $password = md5($this->input->post('password'));

        $res = $this->login_model->check_login($email, $password);

        if (sizeof($res) == 1) {
            if($res[0]['admin_type']==3){
                $tmpD=$this->login_model->getWhere('*','nid='.$res[0]['email'],'user_info');
                $data = array(
                    'email' => $res[0]['email'],
                    'login_id' => $res[0]['login_id'],
                    'admin_type'=>$res[0]['admin_type'],
                    'user_nid'=>$tmpD[0]['nid'],
                    'user_id'=>$tmpD[0]['id'],
                    'logged_in' => TRUE
                );
                $this->session->set_userdata($data);
                redirect('home/user_home');
            }else{
                $data = array(
                    'email' => $res[0]['email'],
                    'login_id' => $res[0]['login_id'],
                    'admin_type'=>$res[0]['admin_type'],
                    'logged_in' => TRUE
                );
                $this->session->set_userdata($data);
                redirect('admin/index');
            }
            
        } else {
            $this->session->set_userdata('error', 'আপনার ইমেইল অথবা পাসওয়ার্ড টি সঠিক নয়');
            redirect('login', 'refresh');
        }
    }


    function decryptIt($q) {
        $cryptKey = 'Lf6Q5htqdgnSn0AABqlsSddj1QNu0fJs';
        $qDecoded = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($cryptKey), base64_decode($q), MCRYPT_MODE_CBC, md5(md5($cryptKey))), "\0");
        return( $qDecoded );
    }

    function encryptIt($q) {
        $cryptKey = 'Lf6Q5htqdgnSn0AABqlsSddj1QNu0fJs';
        $qEncoded = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($cryptKey), $q, MCRYPT_MODE_CBC, md5(md5($cryptKey))));
        return( $qEncoded );
    }

}
