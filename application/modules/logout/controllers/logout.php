<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Logout extends MX_Controller
{
    //public $counter=0;
    function __construct()
    {
        parent::__construct();        
        $email = $this->session->userdata('email');
        $login = $this->session->userdata('logged_in');
        if ($email == Null || $email = "") {
            $this->session->unset_userdata('email');
            $this->session->unset_userdata('admin_type');
            $this->session->unset_userdata('login_id');
            $this->session->unset_userdata('logged_in');
            $this->session->unset_userdata('user_nid');
            $this->session->unset_userdata('user_id');
            $this->session->set_userdata('error', 'সর্বপ্রথম আপনার লগইন তথ্য দিন');
            redirect('login', 'refresh');
        }
    }

    public function index()
    {
        $this->load->helper('text');

        if($this->session->userdata('admin_type')==3){
            $this->session->set_userdata('error', 'আপনার লগআউট সফলভাৱে সম্পন্ন হয়েছে');
            $this->session->unset_userdata('email');
            $this->session->unset_userdata('login_id');
            $this->session->unset_userdata('admin_type');
            $this->session->unset_userdata('user_nid');
            $this->session->unset_userdata('user_id');
            $this->session->unset_userdata('logged_in');
            redirect('login', 'refresh');
        }else{
            $this->session->set_userdata('error', 'আপনার লগআউট সফলভাৱে সম্পন্ন হয়েছে');
            $this->session->unset_userdata('email');
            $this->session->unset_userdata('login_id');
            $this->session->unset_userdata('admin_type');
            $this->session->unset_userdata('logged_in');
            redirect('login', 'refresh');
        }

    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */