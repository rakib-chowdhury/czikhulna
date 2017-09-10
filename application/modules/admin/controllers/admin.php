<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin extends MX_Controller
{

    //public $counter=0;
    function __construct()
    {
        parent::__construct();
        $this->load->library("session");
        $this->load->model('admin_model');
        $this->load->model('home/home_model');
        $this->load->helper('text');
        $this->load->helper(array('form', 'url'));
        $this->load->helper('inflector');
        $this->load->helper('file');

        $email = $this->session->userdata('email');
        $login = $this->session->userdata('logged_in');

        if ($email == NULL || $email == NULL || $email == "") {
            $this->session->unset_userdata('email');
            $this->session->unset_userdata('logged_in');

            $this->session->set_userdata('error', 'সর্বপ্রথম আপনার লগইন তথ্য দিন');
            redirect('login', 'refresh');
        }
    }

    public function index()
    {
        if ($this->session->userdata('admin_type') == 1) {
            date_default_timezone_set('Asia/Dhaka');
            $review_per = array();
            $review_per[0] = $this->admin_model->get_parcentage(0, 51)[0]['person'];
            $review_per[1] = $this->admin_model->get_parcentage(51, 61)[0]['person'];
            $review_per[2] = $this->admin_model->get_parcentage(61, 71)[0]['person'];
            $review_per[3] = $this->admin_model->get_parcentage(71, 81)[0]['person'];
            $review_per[4] = $this->admin_model->get_parcentage(81, 101)[0]['person'];
            $data['review_per'] = $review_per;

            $data['course_per'] = $this->admin_model->get_course_per();


            $data['donors'] = $this->home_model->getYear();
            /////////trainee//////
            $trainee_male = array();
            $trainee_female = array();

            foreach ($data['donors'] as $k => $d) {
                $tmp = $this->home_model->getTraineeNum($d['year'], 1);
                array_push($trainee_male, $tmp[0]);
                $tmp = $this->home_model->getTraineeNum($d['year'], 2);
                array_push($trainee_female, $tmp[0]);
            }
            $data['trainee_male'] = $trainee_male;
            $data['trainee_female'] = $trainee_female;

            //echo '<pre>'; print_r($data); die();

            //////////course/////////////
            $course_info_rajoso = array();
            $course_info_cdf = array();
            $course_info_other = array();

            foreach ($data['donors'] as $k => $d) {
                $tmp = $this->home_model->getCourseNum('রাজস্ব', $d['year']);
                array_push($course_info_rajoso, $tmp[0]);
                $tmp = $this->home_model->getCourseNum('সিডিএফ', $d['year']);
                array_push($course_info_cdf, $tmp[0]);
                $tmp = $this->home_model->getCourseNum('প্রকল্প/অন্যান্য', $d['year']);
                array_push($course_info_other, $tmp[0]);
            }
            $data['course_rajosso'] = $course_info_rajoso;
            $data['course_cdf'] = $course_info_cdf;
            $data['course_other'] = $course_info_other;

            ///////////budget//////////
            $b_rajosso = array();
            $b_cdf = array();
            $b_other = array();

            foreach ($data['donors'] as $k => $d) {
                $tmp = $this->home_model->getCourseBudget('রাজস্ব', $d['year']);
                array_push($b_rajosso, $tmp[0]);
                $tmp = $this->home_model->getCourseBudget('সিডিএফ', $d['year']);
                array_push($b_cdf, $tmp[0]);
                $tmp = $this->home_model->getCourseBudget('প্রকল্প/অন্যান্য', $d['year']);
                array_push($b_other, $tmp[0]);
            }
            $data['budget_rajosso'] = $b_rajosso;
            $data['budget_cdf'] = $b_cdf;
            $data['budget_other'] = $b_other;


            ////2016-12-15/////
            $tmpDate = date('Y-m-d'); //echo $tmpDate;
            $data['course_running'] = $this->admin_model->get_course_details2('course_info.course_status=1 and (course_info.start_date<="' . $tmpDate . '" and course_info.end_date>="' . $tmpDate . '")');//1=unfinished nd running
            $data['course_future'] = $this->admin_model->get_course_details2('course_info.course_status=1 and course_info.start_date >"' . $tmpDate . '"');//1=unfinished future
            //echo '<pre>';
            //print_r($data['course_future']); print_r($data['course_running']); die();
            $this->load->view('layouts/header');
            $this->load->view('layouts/footer');
            $this->load->view('index', $data);

        } elseif ($this->session->userdata('admin_type') == 2) {
            redirect('admin/gallery');
        }

    }

    /***************************************************************************************************/
    /******************************************DONOR START**********************************************/
    /***************************************************************************************************/
    public function donor_list()
    {
        $data['list'] = $this->admin_model->getAllRecords_order_by('donor_info', 'donation_date', 'DESC');
        $this->load->view('layouts/header');
        $this->load->view('donor/donor_list', $data);
    }

    public function add_donor()
    {
        $data['donor_name'] = $this->input->post('donor_name');
        $data['total_donation'] = $this->input->post('donation_amount_eng');

        $d = explode('/', $this->input->post('donation_date'));

        $data['donation_year'] = $this->input->post('borsho');
        $data['donation_date'] = $d[2] . '-' . $d[0] . '-' . $d[1];

        $val = array('amount' => $data['total_donation'], 'date' => $data['donation_date'], 'year' => $data['donation_year'], 'type' => 1);
        $data['donation_details'] = json_encode(array($val));

        //print_r($data);
        $this->admin_model->insert('donor_info', $data);

        redirect('admin/donor_list');
    }

    public function edit_donor()
    {
        $data['donor_name'] = $this->input->post('donor_name');

        $data['donation_year'] = $this->input->post('borsho');

        $total = 0;
        $d_date = $this->input->post('d_date');
        $d_amnt = $this->input->post('edit_amnt_eng');
        $d_type = $this->input->post('edit_type');

        for ($i = 0; $i < sizeof($d_date); $i++) {
            $val[$i] = array('amount' => $d_amnt[$i], 'date' => $d_date[$i], 'year' => $data['donation_year'], 'type' => $d_type[$i]);
            $total += $d_amnt[$i];
        }
        $data['total_donation'] = $total;
        $data['donation_details'] = json_encode($val);

        $this->admin_model->update_function('id', $this->input->post('id'), 'donor_info', $data);

        //echo '<pre>';
        //print_r($total);
        $course = $this->admin_model->getWhere('*', 'id="' . $this->input->post('id') . '"', 'course_info');
        foreach ($course as $c) {
            $data_course_update['expenditure_percentage'] = (($c['expenditure'] / $total) * 100);
            $data_course_update['year'] = $data['donation_year'];
            $this->admin_model->update_function('id', $c['id'], 'course_info', $data_course_update);
            //print_r($data_course_update);
        }
        redirect('admin/donor_list');
    }

    public function add_donation()
    {
        $d = explode('/', $this->input->post('donation_date'));

        $val = array('amount' => $this->input->post('donation_amount_eng'), 'date' => $d[2] . '-' . $d[0] . '-' . $d[1], 'year' => $d[2], 'type' => 2);
        $res1 = $this->admin_model->get_donor_info($this->input->post('id'));

        $res = json_decode($res1[0]['donation_details']);

        $res[sizeof($res)] = $val;

        $data['donation_details'] = json_encode($res);

        $data['total_donation'] = $res1[0]['total_donation'] + $this->input->post('donation_amount_eng');

        $this->admin_model->update_function('id', $this->input->post('id'), 'donor_info', $data);

        $course = $this->admin_model->getWhere('*', 'id="' . $this->input->post('id') . '"', 'course_info');
        foreach ($course as $c) {
            $data_course_update['expenditure_percentage'] = (($c['expenditure'] / $data['total_donation']) * 100);
            $this->admin_model->update_function('id', $c['id'], 'course_info', $data_course_update);
            //print_r($data_course_update);
        }

        redirect('admin/donor_list');
    }

    public function get_donor_info()
    {
        $data['res'] = $this->admin_model->get_donor_info($this->input->post('id'));
        $data['res2'] = $this->admin_model->getWhere('sum(expenditure) as ExpnsE', 'donor_id=' . $this->input->post('id') . ' and course_status=2', 'course_info');
        echo json_encode($data);
    }

    public function get_donor_add_permission()
    {
        $list = $this->admin_model->getWhere('id', 'donation_year="' . $this->input->post("d_year") . '" and donor_name="' . $this->input->post("d_name") . '"', 'donor_info');
        if (sizeof($list) == 0) {
            echo 1;
        } else {
            echo 0;
        }
    }

    public function get_donor_edit_permission()
    {
        $list = $this->admin_model->getWhere('id', 'donation_year="' . $this->input->post("d_year") . '" and donor_name="' . $this->input->post("d_name") . '" and id<>' . $this->input->post("d_id"), 'donor_info');
        if (sizeof($list) == 0) {
            echo 1;
        } else {
            echo 0;
        }
    }
    /***************************************************************************************************/
    /******************************************DONOR END************************************************/
    /***************************************************************************************************/

    /***************************************************************************************************/
    /******************************************COURSE START*********************************************/
    /***************************************************************************************************/
    public function course_list()
    {
        $data['course'] = $this->admin_model->get_course_details();
        //echo'<pre>'; print_r($data); die();
        $this->load->view('layouts/header');
        $this->load->view('course/course_list', $data);
        $this->load->view('layouts/footer');
    }

    public function add_courses()
    {
        $data['course_names'] = $this->admin_model->getWhere('*', 'c_status=2', 'course_name');
        $data['clssfctn'] = $this->admin_model->getWhere('*', 'class_status=1', 'classification_info');
        $data['list'] = $this->admin_model->getWhere('*', 'status=1', 'donor_info');
        $data['course_class'] = $this->admin_model->getWhere('*', 'course_class_status=1', 'course_class');
        $data['education'] = $this->admin_model->getWhere('*', 'edu_status=1', 'education');
        $this->load->view('layouts/header');
        $this->load->view('course/add_course', $data);
        $this->load->view('layouts/footer');
    }

    public function add_course()
    {
        $bn_digits = array('০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯');
        $en_digits = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9');

        $year = $this->admin_model->get_donor($this->input->post('donor_name'));

        $alloc = 0;
        if (sizeof($year) != 0) {
            $data['year'] = $year[0]['donation_year'];
            $alloc = $year[0]['total_donation'];
        }

        $data['course_class_id'] = $this->input->post('course_type');
        $data['classification_id'] = $this->input->post('u_type');
        $data['course_name_id'] = $this->input->post('course_name');

        $y = explode('/', $this->input->post('start_date'));

        $data['start_date'] = $y[2] . '-' . $y[0] . '-' . $y[1];

        $e = explode('/', $this->input->post('end_date'));

        $data['end_date'] = $e[2] . '-' . $e[0] . '-' . $e[1];

        $date1 = date_create($this->input->post('start_date'));
        $date2 = date_create($this->input->post('end_date'));

        $diff = date_diff($date1, $date2);
        $data['run_days'] = $diff->d + 1;

        $data['donor_id'] = $this->input->post('donor_name');
        $data['expenditure'] = $this->input->post('expense_eng');

        $data['expenditure_percentage'] = (($this->input->post('expense_eng') / $alloc) * 100);

        $data['total_student'] = $this->input->post('total_student');
        $data['created_at'] = date('Y-m-d');

        $insrtDtls['course_info_id'] = $this->admin_model->insert_ret('course_info', $data);

        //////////add course expense//////////
        $exDtls = $this->input->post('c_details');
        $exUnitP = $this->input->post('c_unit_p');
        $exUnitQ = $this->input->post('c_unit_q');

        foreach ($exDtls as $kkey => $e) {
            $insrtDtls['details'] = $exDtls[$kkey];
            $insrtDtls['unit_quantity'] = str_replace($bn_digits, $en_digits, $exUnitQ[$kkey]);
            $insrtDtls['unit_price'] = str_replace($bn_digits, $en_digits, $exUnitP[$kkey]);

            $this->admin_model->insert('course_expense_details', $insrtDtls);
        }


        ////////////add teacher///////////////
        $tec['course_id'] = $insrtDtls['course_info_id'];
        $teacherInfo = $this->input->post('teachers');
        $teacherSub = $this->input->post('techSub');
        $teacherDate = $this->input->post('techdate');
        $teacherNum = $this->input->post('techNum');
        $teacherSalary = $this->input->post('techSalary');
        foreach ($teacherInfo as $k => $t) {
            $tec['teacher_id'] = $t;
            $tec['subject_name'] = $teacherSub[$k];
            $tec['session_num'] = $teacherNum[$k];
            $tec['session_date'] = $teacherDate[$k];
            $tec['salary'] = $teacherSalary[$k];
            $this->admin_model->insert('teacher_course_rel', $tec);
        }

        ///////////add course requirement/////
        $req['course_id'] = $insrtDtls['course_info_id'];
        $req['req_age'] = $this->input->post('req_age');
        $req['req_edu'] = $this->input->post('req_edu');
        $req['req_things'] = $this->input->post('req_things');
        $req['req_other'] = $this->input->post('req_other');
        $this->admin_model->insert('course_requirement', $req);

        redirect('admin/course_list');
    }

    public function get_used_amount()
    {
        $data['alloc'] = $this->admin_model->getWhere('total_donation', 'id=' . $this->input->post('d_id'), 'donor_info')[0]['total_donation'];
        //echo $data; die();
        $res = $this->admin_model->get_used_amount($this->input->post('d_id'));
        if ($res[0]['used_amnt'] == null) {
            $data['used_amnt'] = 0;
        } else {
            $data['used_amnt'] = $res[0]['used_amnt'];
        }
        echo json_encode($data);

    }

    public function get_used_amount_edit()
    {
        $data['alloc'] = $this->admin_model->getWhere('total_donation', 'id=' . $this->input->post('d_id'), 'donor_info')[0]['total_donation'];
        //echo $data; die();
        $res = $this->admin_model->get_used_amount_edit($this->input->post('d_id'), $this->input->post('c_id'));
        if ($res[0]['used_amnt'] == null) {
            $data['used_amnt'] = 0;
        } else {
            $data['used_amnt'] = $res[0]['used_amnt'];
        }
        echo json_encode($data);

    }

    public function get_course()
    {
        $data['typeofstudent'] = $this->admin_model->get_gender($this->input->post('c_id'));
        $data['clssfctn'] = $this->admin_model->getAllRecords('classification_info');
        $data['course'] = $this->admin_model->get_course_info($this->input->post('c_id'));
        $data['list'] = $this->admin_model->getWhere('*', 'status=1 or id=' . $data['course'][0]['donor_id'], 'donor_info');
        $data['details'] = $this->admin_model->getWhere('*', 'course_info_id=' . $this->input->post('c_id'), 'course_expense_details');
        echo json_encode($data);
    }

    public function edit_courses($cid)
    {
        $data['page_title'] = 'কোর্সের তথ্য সংশোধন';

        $data['course_names'] = $this->admin_model->getWhere('*', 'c_status=2', 'course_name');
        $data['clssfctn'] = $this->admin_model->getWhere('*', 'class_status=1', 'classification_info');
        $data['list'] = $this->admin_model->getWhere('*', 'status=1', 'donor_info');
        $data['course_class'] = $this->admin_model->getWhere('*', 'course_class_status=1', 'course_class');
        $data['req'] = $this->admin_model->getWhere('*', 'course_id=' . $cid, 'course_requirement');
        $data['teacher_info'] = $this->admin_model->getWhere('*', 'course_id=' . $cid, 'teacher_course_rel');
        $data['teachers'] = $this->admin_model->getWhere('*', 't_status=1', 'teacher_info');

        $data['course_info'] = $this->admin_model->get_course_info3($cid);
        $data['expense_info'] = $this->admin_model->getWhere('*', 'course_info_id=' . $cid, 'course_expense_details');

        //echo '<pre>'; print_r($data); die();
        $this->load->view('layouts/header');
        $this->load->view('course/edit_course', $data);
        $this->load->view('layouts/footer');
    }

    public function edit_course()
    {
        $bn_digits = array('০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯');
        $en_digits = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9');

        $year = $this->admin_model->get_donor($this->input->post('donor_name'));

        $alloc = 0;
        if (sizeof($year) != 0) {
            $data['year'] = $year[0]['donation_year'];
            $alloc = $year[0]['total_donation'];
        }

        $data['course_class_id'] = $this->input->post('course_type');
        $data['classification_id'] = $this->input->post('u_type');
        $data['course_name_id'] = $this->input->post('course_name');

        $y = explode('/', str_replace($bn_digits, $en_digits, $this->input->post('start_date')));

        $data['start_date'] = $y[2] . '-' . $y[0] . '-' . $y[1];

        $e = explode('/', str_replace($bn_digits, $en_digits, $this->input->post('end_date')));

        $data['end_date'] = $e[2] . '-' . $e[0] . '-' . $e[1];

        $date1 = date_create(str_replace($bn_digits, $en_digits, $this->input->post('start_date')));
        $date2 = date_create(str_replace($bn_digits, $en_digits, $this->input->post('end_date')));

        $diff = date_diff($date1, $date2);
        $data['run_days'] = $diff->d + 1;

        $data['donor_id'] = $this->input->post('donor_name');
        $data['expenditure'] = str_replace($bn_digits, $en_digits, $this->input->post('expense'));

        $data['expenditure_percentage'] = (($this->input->post('expense_eng') / $alloc) * 100);

        //$data['total_student'] = $this->input->post('total_student');
        //echo '<pre>'; print_r($_POST); print_r($data); die();
        $this->admin_model->update_function('id', $this->input->post('course_id'), 'course_info', $data);


        $exID = $this->input->post('excID');
        $exDtls = $this->input->post('c_details');
        $exUnitP = $this->input->post('c_unit_p');
        $exUnitQ = $this->input->post('c_unit_q');

        $insrtDtls['course_info_id'] = $this->input->post('course_id');
        if(!empty($exDtls)){
            foreach ($exDtls as $kkey => $e) {
                $insrtDtls['details'] = $exDtls[$kkey];
                $insrtDtls['unit_quantity'] = str_replace($bn_digits, $en_digits, $exUnitQ[$kkey]);
                $insrtDtls['unit_price'] = str_replace($bn_digits, $en_digits, $exUnitP[$kkey]);

                if (($kkey + 1) <= sizeof($exID)) {
                    $this->admin_model->update_function('expense_details_id', $exID[$kkey], 'course_expense_details', $insrtDtls);
                } else {
                    $this->admin_model->insert('course_expense_details', $insrtDtls);
                }
            }
        }



        ////////////add teacher///////////////
        $this->admin_model->delete_function_cond('teacher_course_rel', 'course_id=' . $this->input->post('course_id'));
        $tec['course_id'] = $this->input->post('course_id');
        //$teacherInfo = $this->input->post('teachers');
        //foreach ($teacherInfo as $k => $t) {
        //$tec['teacher_id'] = $t;
        //$this->admin_model->insert('teacher_course_rel', $tec);
        //}
        $teacherInfo = $this->input->post('teachers');
        $teacherSub = $this->input->post('techSub');
        $teacherDate = $this->input->post('techdate');
        $teacherNum = $this->input->post('techNum');
        $teacherSalary = $this->input->post('techSalary');
        if(!empty($teacherInfo)){
            foreach ($teacherInfo as $k => $t) {
                $tec['teacher_id'] = $t;
                $tec['subject_name'] = $teacherSub[$k];
                $tec['session_num'] = $teacherNum[$k];
                $tec['session_date'] = $teacherDate[$k];
                $tec['salary'] = $teacherSalary[$k];
                $this->admin_model->insert('teacher_course_rel', $tec);
            }
        }
        

        //////////////////edit course teacher user rel/////////////01-02-2017
        /*$this->admin_model->delete_function_cond('teacher_review_info', 'course_id=' . $this->input->post('course_id'));   ////01-02-2017

        $teacheradd = $this->admin_model->getWhere('*', 'course_id=' . $this->input->post('course_id'), 'teacher_course_rel'); ////01-02-2017
        $useradd = $this->admin_model->getWhere('*', 'course_id=' . $this->input->post('course_id'), 'review_info'); ////01-02-2017

        if (sizeof($useradd) != 0 && sizeof($teacheradd) != 0) {    ////01-02-2017
            foreach ($useradd as $u) {    ////01-02-2017
                foreach ($teacheradd as $t) {   ////01-02-2017
                    $tecA['course_id'] = $this->input->post('course_id');    ////01-02-2017
                    $tecA['teacher_id'] = $t['teacher_id'];    ////01-02-2017
                    $tecA['user_id'] = $u['user_id'];    ////01-02-2017
                    $this->admin_model->insert('teacher_review_info', $tecA);   ////01-02-2017
                }    ////01-02-2017
            }    ////01-02-2017
        }    ////01-02-2017*/






        /////////////add teacher review info//////////

        $checkList=$this->admin_model->getWhere('*','course_id=' . $this->input->post('course_id'), 'teacher_review_info');
        $checkListtmp=$this->admin_model->getWhere('*','course_id=' . $this->input->post('course_id'), 'temp_teacher_review');

        $teacheradd = $this->admin_model->getWhere('*', 'course_id=' . $this->input->post('course_id'), 'teacher_course_rel');

        foreach($checkList as $cl){
            $flag=true;
            foreach($teacheradd as $ta){
                if($cl['teacher_id']==$ta['teacher_id']){
                    $flag=false;
                }
            }
            if($flag){
                $this->admin_model->delete_function_cond('teacher_review_info', 'course_id=' . $this->input->post('course_id').' and teacher_id='.$cl['teacher_id']);
                $this->admin_model->delete_function_cond('temp_teacher_review', 'course_id=' . $this->input->post('course_id').' and teacher_id='.$cl['teacher_id']);

            }
        }



        $useradd = $this->admin_model->getWhere('*', 'course_id=' . $this->input->post('course_id'), 'review_info');

        if (sizeof($useradd) != 0 && sizeof($teacheradd) != 0) {
            foreach ($useradd as $u) {
                foreach ($teacheradd as $t) {

                    $flag=true;
                    foreach($checkList as $cl){
                        if($cl['teacher_id']==$t['teacher_id'] && $cl['user_id']==$u['user_id']){
                            $flag=false;
                        }
                    }
                    if($flag){
                        $tecA['course_id'] = $this->input->post('course_id');
                        $tecA['teacher_id'] = $t['teacher_id'];
                        $tecA['user_id'] = $u['user_id'];
                        $this->admin_model->insert('teacher_review_info', $tecA);
                    }

                    $flagtmp=true;
                    foreach($checkListtmp as $cl2){
                        if($cl2['teacher_id']==$t['teacher_id'] && $cl2['user_id']==$u['user_id']){
                            $flagtmp=false;
                        }
                    }
                    if($flagtmp){
                        $tecA2['course_id'] = $this->input->post('course_id');
                        $tecA2['teacher_id'] = $t['teacher_id'];
                        $tecA2['user_id'] = $u['user_id'];
                        $this->admin_model->insert('temp_teacher_review', $tecA2);
                    }

                }
            }
        }


        ///////////add course requirement/////
        $req['req_age'] = $this->input->post('req_age');
        $req['req_edu'] = $this->input->post('req_edu');
        $req['req_things'] = $this->input->post('req_things');
        $req['req_other'] = $this->input->post('req_other');

        $checkReq = $this->admin_model->getWhere('*', 'course_id=' . $this->input->post('course_id'), 'course_requirement');
        if (sizeof($checkReq) == 0) {
            $req['course_id'] = $this->input->post('course_id');
            $this->admin_model->insert('course_requirement', $req);
        } else {
            $this->admin_model->update_function('course_id', $this->input->post('course_id'), 'course_requirement', $req);
        }

        redirect('admin/course_list');
    }

    public function update_course_status()
    {
        $c_id = $this->input->post('c_id');
        $data['course_status'] = $this->input->post('status');
        $this->admin_model->update_function('id', $c_id, 'course_info', $data);

        $user = $this->admin_model->getWhere('*', ' course_id = ' . $c_id, 'review_info');
        if ($data['course_status'] == 2) {
            $data_tmp['course_id'] = $this->input->post('c_id');
            $data_tmp['created_at'] = date('Y-m-d');
            if (sizeof($user) != 0) {
                foreach ($user as $u) {
                    $data_tmp['user_id'] = $u['user_id'];
                    $this->admin_model->insert('temp_review', $data_tmp);
                }
            }
            /*$teacher = $this->admin_model->getWhere('*', 'course_id=' . $c_id, 'teacher_review_info'); ////01-02-2017
            if (sizeof($teacher) != 0) {   ////01-02-2017
                foreach ($teacher as $t) {   ////01-02-2017
                    $tec['course_id'] = $t['course_id'];    ////01-02-2017
                    $tec['teacher_id'] = $t['teacher_id'];    ////01-02-2017
                    $tec['user_id'] = $t['user_id'];    ////01-02-2017

                    $this->admin_model->insert('temp_teacher_review', $tec);   ////01-02-2017
                }    ////01-02-2017
            }    ////01-02-2017*/

        } elseif ($data['course_status'] == 1) {
            $this->admin_model->delete_function_cond('temp_review', '( course_id=' . $c_id . ' )');
            $this->admin_model->delete_function_cond('temp_teacher_review', '( course_id=' . $c_id . ' )');
        }

        echo 'done';
    }

    public function expenseDetailsPdf($c_id)
    {
        $data['course'] = $this->admin_model->get_course_info3($c_id);
        $data['typeofstudent'] = $this->admin_model->get_gender($c_id);
        $data['details'] = $this->admin_model->getWhere('*', 'course_info_id=' . $c_id, 'course_expense_details');

        //$this->load->view('review_comment_pdf', $data);
        $html = $this->load->view('course/expenseDetailsPdf', $data, true);

        //this the the PDF filename that user will get to download
        $pdfFilePath = "output_pdf_name.pdf";

        //load mPDF library
        $this->load->library('m_pdf_nrml', "'utf-8', 'A4'");

        //generate the PDF from the given html
        $this->m_pdf_nrml->pdf->WriteHTML($html);

        //download it.
        $this->m_pdf_nrml->pdf->Output($pdfFilePath, "I");
    }

    /***************************************************************************************************/
    /******************************************COURSE ENDS**********************************************/
    /***************************************************************************************************/

    ////course_review start///
    public function review_comment()
    {

        $id = $this->uri->segment(3);

        if ($id) {
            $data['crseInfo'] = $this->admin_model->get_course_info3($id);
            $data['typeofstudent'] = $this->admin_model->get_gender($id);
            //$data['name']=$this->admin_model->getWhere('name','id='.$id,'course_info')[0]['name'];//old
            $data['review'] = $this->admin_model->get_course_review_info($id);

            $data['get_avg_review'] = $this->admin_model->get_avg_review($id);
            //$this->load->view('review_comment_pdf', $data);
            $html = $this->load->view('course/review_comment_pdf', $data, true);

            //this the the PDF filename that user will get to download
            $pdfFilePath = "output_pdf_name.pdf";

            //load mPDF library
            $this->load->library('m_pdf_nrml', "'utf-8', 'A4'");

            //generate the PDF from the given html
            $this->m_pdf_nrml->pdf->WriteHTML($html);

            //download it.
            $this->m_pdf_nrml->pdf->Output($pdfFilePath, "I");
        }
    }

    public function course_review_list()
    {
        $course_review_list = $this->admin_model->getCmpltCrsAll();

        if (sizeof($course_review_list) != 0) {
            foreach ($course_review_list as $c_list) {
                $review_val = $this->admin_model->getWhere('*', 'course_id=' . $c_list['id'], 'review_info');

                foreach ($review_val as $rv) {
                    if ($rv['review'] == 0) {
                        $tmp_review_val = $this->admin_model->getWhere('*', 'course_id=' . $c_list['id'] . ' and user_id=' . $rv['user_id'], 'temp_review');

                        if (sizeof($tmp_review_val) != 0) {
                            if ($tmp_review_val[0]['review'] != 0) {
                                $data_rev_up['review'] = $tmp_review_val[0]['review'];
                                $data_rev_up['comment'] = $tmp_review_val[0]['comment'];
                                $this->admin_model->update_function('id', $rv['id'], 'review_info', $data_rev_up);
                                $this->admin_model->delete_function_cond('temp_review', 'id=' . $tmp_review_val[0]['id']);

                                $data_prv_inst['user_id'] = $rv['user_id'];
                                $data_prv_inst['course_name'] = $c_list['c_name'];
                                $data_prv_inst['course_institution_name'] = 'আঞ্চলিক সমবায় ইন্সটিটিউট, খুলনা';
                                $data_prv_inst['course_duration'] = '' . $c_list['start_date'] . ' / ' . $c_list['end_date'] . '';
                                $data_prv_inst['created_at'] = date('Y-m-d');
                                $this->admin_model->insert('previous_course', $data_prv_inst);
                            }
                        }
                    }
                }

                $t_review_val = $this->admin_model->getWhere('*', 'course_id=' . $c_list['id'], 'teacher_review_info');  /////01-02-2017

                foreach ($t_review_val as $rv) {  /////01-02-2017
                    if ($rv['t_review'] == 0) {  /////01-02-2017
                        $tmp_t_review_val = $this->admin_model->getWhere('*', 'course_id=' . $c_list['id'] . ' and user_id=' . $rv['user_id'] . ' and teacher_id=' . $rv['teacher_id'], 'temp_teacher_review');  /////01-02-2017

                        if (sizeof($tmp_t_review_val) != 0) {  /////01-02-2017
                            if ($tmp_t_review_val[0]['temp_review'] != 0) {  /////01-02-2017
                                $data_tec['t_review'] = $tmp_t_review_val[0]['temp_review'];  /////01-02-2017
                                $data_tec['t_comment'] = $tmp_t_review_val[0]['temp_comment'];  /////01-02-2017
                                $this->admin_model->update_function('t_review_id', $rv['t_review_id'], 'teacher_review_info', $data_tec);  /////01-02-2017
                                $this->admin_model->delete_function_cond('temp_teacher_review', 'temp_t_review_id=' . $tmp_t_review_val[0]['temp_t_review_id']);  /////01-02-2017

                            }  /////01-02-2017
                        }  /////01-02-2017
                    }  /////01-02-2017
                }  /////01-02-2017


            }
        }
        //$course_review=$this->admin_model->get_course_review();
        if (sizeof($course_review_list) != 0) {
            $indx = 0;
            foreach ($course_review_list as $cr) {
                $avg = $this->admin_model->get_avg_review($cr['c_id']);
                array_push($course_review_list[$indx++], $avg[0]['avg']);
            }
        }

        $data['course_review'] = $course_review_list;


        //echo '<pre>';
        //print_r($data); die();

        $this->load->view('layouts/header');
        $this->load->view('course/course_review_list', $data);
        $this->load->view('layouts/footer');
    }

    public function get_review_info()
    {
        $id = $this->input->post('id');
        $data['res'] = $this->admin_model->get_course_review_info($id);
        $data['crseInfo'] = $this->admin_model->get_course_info3($id);
        $data['typeofstudent'] = $this->admin_model->get_gender($id);
        echo json_encode($data);
    }

    ///course review ends///


    //////user start//////

    public function get_classification()
    {
        $data['res'] = $this->admin_model->getAllRecords('classification_info');
        echo json_encode($data);
    }

    public function add_classification()
    {
        $data['class_name'] = $this->input->post('name');
        $data['created_at'] = date('Y-m-d');
        $this->admin_model->insert('classification_info', $data);
        echo '1';
    }

    public function get_office()
    {
        $data['res'] = $this->admin_model->getAllRecords('office_info');
        echo json_encode($data);
    }

    public function add_office()
    {
        $data['office_name'] = $this->input->post('name');
        $data['address'] = $this->input->post('address');
        $data['created_at'] = date('Y-m-d');
        $this->admin_model->insert('office_info', $data);
        echo '1';
    }

    public function add_user()
    {
        redirect('home/online_registration');
    }

    public function check_nid()
    {
        $res = $this->admin_model->getWhere('*', 'nid=' . $this->input->post('nid'), 'user_info');
        if (sizeof($res) == 0) {
            echo 1; //add
        } else {
            $data['res'] = $res;
            echo json_encode($data);
        }
    }

    public function add_user_post()
    {
//        echo '<pre>';
//        print_r($_POST);
//        die();

        $data['nid'] = $this->input->post('nid_eng');
        $data['name'] = $this->input->post('user_name');
        $data['father_name'] = $this->input->post('father_name');
        $data['mother_name'] = $this->input->post('mother_name');
        $data['gender'] = $this->input->post('gender');
        $data['email'] = $this->input->post('email');
        $data['mobile'] = $this->input->post('mobile_eng');
        $data['fb_link'] = $this->input->post('fb');
        $data['educational_qualification'] = $this->input->post('edu');
        $data['designation'] = $this->input->post('dsgntn');
        $data['office_id'] = $this->input->post('office');
        $data['classification_id'] = $this->input->post('classification');

        $reg = explode('/', $this->input->post('reg_date'));

        $data['registration_date'] = $reg[2] . '-' . $reg[0] . '-' . $reg[1];
        $data['created_at'] = date('Y-m-d');

        //$data['present_address'] = json_encode(array('div' => $this->input->post('div'), 'dist' => $this->input->post('dist'), 'upz' => $this->input->post('upz'), 'thana' => $this->input->post('thana'), 'road_no' => $this->input->post('road'), 'house_no' => $this->input->post('house'), 'other' => $this->input->post('additional')));
        //$data['parmanent_address'] = json_encode(array('div' => $this->input->post('p_div'), 'dist' => $this->input->post('dist'), 'upz' => $this->input->post('p_upz'), 'other' => $this->input->post('p_additional')));
        $data['present_address'] = $this->input->post('r_address');
        $data['parmanent_address'] = $this->input->post('p_address');
        $u_id = $this->admin_model->insert_ret('user_info', $data);

        $data_p['user_id'] = $u_id;
        $data_p['created_at'] = date('Y-m-d');

        $pre_course = $this->input->post('pre_c_name');
        $pre_inst = $this->input->post('pre_c_inst');
        $pre_s_date = $this->input->post('pre_c_st_date');
        $pre_e_date = $this->input->post('pre_c_end_date');

        if (sizeof($pre_course) != 0 && $pre_course != null) {
            $cc = 0;
            foreach ($pre_course as $r) {
                $data_p['course_name'] = $pre_course[$cc];
                $data_p['course_institution_name'] = $pre_inst[$cc];
                $st = explode('/', $pre_s_date[$cc]);
                $end = explode('/', $pre_e_date[$cc]);
                $data_p['course_duration'] = $st[2] . '-' . $st[0] . '-' . $st[1] . ' / ' . $end[2] . '-' . $end[0] . '-' . $end[1];

                $this->admin_model->insert('previous_course', $data_p);
                $cc++;
            }
        }
        if ($_POST['ret'] == 0) {
            redirect('admin/user_list');
        } else {
            redirect('admin/new_trainee/' . $this->input->post('ret'));
        }

    }

    public function user_list()
    {
        $data['user_info'] = $this->admin_model->getUserRecords2();
        $this->load->view('layouts/header');
        $this->load->view('trainee/user_list', $data);
    }

    public function get_user_info()
    {
        $data['office'] = $this->admin_model->getInstInfoALl();
        $data['clssfctn'] = $this->admin_model->getAllRecords('classification_info');
        $user_info = $this->admin_model->get_user_details($this->input->post('id'));
        $p_index = 0;
        foreach ($user_info as $ui) {
            $pre_info = $this->admin_model->getWhere('*', 'user_id=' . $ui['u_id'], 'previous_course');
            array_push($user_info[$p_index++], $pre_info);
        }
        $data['res'] = $user_info;
        echo json_encode($data);
    }

    public function user_pdf()
    {
        $id = $this->uri->segment(3);

        if ($id) {
            //$data['name']=$this->admin_model->getWhere('name','id='.$id,'course_info')[0]['name'];
            $user_info = $this->admin_model->get_user_details($id);
            $p_index = 0;
            foreach ($user_info as $ui) {
                $pre_info = $this->admin_model->getWhere('*', 'user_id=' . $ui['u_id'], 'previous_course');
                array_push($user_info[$p_index++], $pre_info);
            }
            $data['trainee_info'] = $user_info;

            //$this->load->view('all_user_details_pdf', $data);
            $html = $this->load->view('report/all_user_details_pdf', $data, true);

            //this the the PDF filename that user will get to download
            $pdfFilePath = "output_pdf_name.pdf";

            //load mPDF library
            $this->load->library('m_pdf_nrml', "'utf-8', 'A4'");

            //generate the PDF from the given html
            $this->m_pdf_nrml->pdf->WriteHTML($html);

            //download it.
            $this->m_pdf_nrml->pdf->Output($pdfFilePath, "I");
        }
    }

    public function user_info_edit_old()
    {
        if ($this->uri->segment(3)) {
            $data['office'] = $this->admin_model->getInstInfoALl();
            $data['clssfctn'] = $this->admin_model->getAllRecords('classification_info');

            $user_info = $this->admin_model->get_user_details($this->uri->segment(3));
            $p_index = 0;
            foreach ($user_info as $ui) {
                $pre_info = $this->admin_model->getWhere('*', 'user_id=' . $ui['u_id'], 'previous_course');
                array_push($user_info[$p_index++], $pre_info);
            }
            $data['user_info'] = $user_info;
            $this->load->view('layouts/header');
            $this->load->view('trainee/user_info_edit', $data);
        }

    }

    public function edit_user_info_post()
    {
        //$en_digits = array('০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯');
        $en_digits = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9');

        $data['nid'] = $this->input->post('nid_eng');
        $data['name'] = $this->input->post('user_name');
        $data['father_name'] = $this->input->post('father_name');
        $data['mother_name'] = $this->input->post('mother_name');
        $data['gender'] = $this->input->post('gender');
        $data['email'] = $this->input->post('email');
        $data['mobile'] = $this->input->post('mobile_eng');
        $data['fb_link'] = $this->input->post('fb');
        $data['educational_qualification'] = $this->input->post('edu');
        $data['designation'] = $this->input->post('dsgntn');
        $data['office_id'] = $this->input->post('office');
        $data['classification_id'] = $this->input->post('classification');

        $reg = explode('/', $this->input->post('reg_date'));

        $data['registration_date'] = $reg[2] . '-' . $reg[0] . '-' . $reg[1];

        $data['present_address'] = $this->input->post('r_address');
        $data['parmanent_address'] = $this->input->post('p_address');
        $u_id = $this->input->post('user_id');
        $this->admin_model->update_function('id', $u_id, 'user_info', $data);

        $pre_course = $this->input->post('pre_c_name');
        $pre_inst = $this->input->post('pre_c_inst');
        $pre_s_date = $this->input->post('pre_c_st_date');
        $pre_e_date = $this->input->post('pre_c_end_date');
        $pre_id = $this->input->post('pre_id');

        if (sizeof($pre_course) != 0 && $pre_course != null) {
            $cc = 0;
            foreach ($pre_course as $r) {
                $data_p['course_name'] = $pre_course[$cc];
                $data_p['course_institution_name'] = $pre_inst[$cc];
                $st = explode('/', str_replace(range('০', '9'), $en_digits, $pre_s_date[$cc]));
                $end = explode('/', str_replace(range('০', '9'), $en_digits, $pre_e_date[$cc]));
                $data_p['course_duration'] = $st[2] . '-' . $st[0] . '-' . $st[1] . ' / ' . $end[2] . '-' . $end[0] . '-' . $end[1];

                $this->admin_model->update_function('id', $pre_id[$cc], 'previous_course', $data_p);
                //$this->admin_model->insert('previous_course', $data_p);
                $cc++;
            }
        }

        $pre_course_n = $this->input->post('pre_c_name_n');
        $pre_inst_n = $this->input->post('pre_c_inst_n');
        $pre_s_date_n = $this->input->post('pre_c_st_date_n');
        $pre_e_date_n = $this->input->post('pre_c_end_date_n');

        $data_pp['user_id'] = $u_id;
        $data_pp['created_at'] = date('Y-m-d');;

        if (sizeof($pre_course_n) != 0 && $pre_course_n != null) {
            $cc = 0;
            foreach ($pre_course_n as $r) {
                $data_pp['course_name'] = $pre_course_n[$cc];
                $data_pp['course_institution_name'] = $pre_inst_n[$cc];
                $st = explode('/', str_replace(range('০', '9'), $en_digits, $pre_s_date_n[$cc]));
                $end = explode('/', str_replace(range('০', '9'), $en_digits, $pre_e_date_n[$cc]));
                $data_pp['course_duration'] = $st[2] . '-' . $st[0] . '-' . $st[1] . ' / ' . $end[2] . '-' . $end[0] . '-' . $end[1];

                //$this->admin_model->update_function('id', $pre_id[$cc], 'previous_course', $data_p);
                $this->admin_model->insert('previous_course', $data_pp);
                $cc++;
            }
        }

        redirect('admin/user_list');
    }

    public function user_info_edit()
    {
        if ($this->uri->segment(3)) {

            $user_info = $this->admin_model->get_user_details($this->uri->segment(3));

            $data['division'] = $this->home_model->getAllRecords('division');
            $data['dist'] = $this->home_model->getWhere('*', 'div_id=' . $user_info[0]['per_div_id'], 'district');
            $data['upz'] = $this->home_model->getWhere('*', 'dist_id=' . $user_info[0]['per_dist_id'], 'upazilla');
            $data['blood_grp'] = $this->home_model->getWhere('*', 'blood_grp_status=1', 'blood_group');
            $data['education'] = $this->home_model->getWhere('*', 'edu_status=1', 'education');
            $data['trainee_class'] = $this->home_model->getWhere('*', 'class_status=1', 'classification_info');
            //echo '<pre>'; print_r($user_info); die();
            $data['des'] = $this->home_model->getWhere('*', 'des_status=1 and classification_id=' . $user_info[0]['c_id'], 'designation');
            $data['profession'] = $this->home_model->getWhere('*', 'prf_status=1 and classification_id=' . $user_info[0]['c_id'], 'profession');
            $data['inst'] = $this->home_model->getInstInfo($user_info[0]['c_id']);

            if ($user_info[0]['dob'] == null || $user_info[0]['dob'] == '0000-00-00') {
                $data['age'] = 0;
            } else {
                $date1 = date_create($user_info[0]['dob']);
                $date2 = date_create(date('Y-m-d'));
                $diff = date_diff($date1, $date2);

                $data['age'] = $diff->y;
            }

            $data['user_info'] = $user_info;
            $this->load->view('layouts/header');
            $this->load->view('trainee/user_info_edit', $data);
        }

    }

    public function user_info_edit_post()
    {
        $bn_digits = array('০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯');
        $en_digits = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9');

        $user['office_id'] = $this->input->post('ofc_id');
        $user['nid'] = str_replace($bn_digits, $en_digits, $this->input->post('nid'));
        $user['name'] = $this->input->post('name_bng');
        //$tmp = explode('/', $this->input->post('dob'));// print_r($tmp); die();
        //$tmpDob = $tmp[2] . '-' . $tmp[1] . '-' . $tmp[0];
        //$user['dob'] = str_replace($bn_digits, $en_digits, $tmpDob);
        $user['name_eng'] = $this->input->post('name_eng');
        $user['father_name'] = $this->input->post('father_name');
        $user['mother_name'] = $this->input->post('mother_name');
        $user['spouse_name'] = $this->input->post('spouse_name');
        $user['gender'] = $this->input->post('gender');
        $user['email'] = $this->input->post('trainee_email');
        $user['mobile'] = str_replace($bn_digits, $en_digits, $this->input->post('per_mb'));
        $user['other_mb'] = str_replace($bn_digits, $en_digits, $this->input->post('imp_mb'));
        $user['fb_link'] = $this->input->post('trainee_fb');
        $user['present_address'] = $this->input->post('curr_add');
        $user['per_div_id'] = $this->input->post('p_div');
        $user['per_dist_id'] = $this->input->post('p_dist');
        $user['per_upz_id'] = $this->input->post('p_upz');
        $user['parmanent_address'] = $this->input->post('p_details');
        $user['education_id'] = $this->input->post('education');
        $user['blood_grp_id'] = $this->input->post('blood_grp');
        $user['designation_id'] = $this->input->post('des');
        $user['profession_id'] = $this->input->post('profession');
        $user['classification_id'] = $this->input->post('trainee_class');

        $u_id = $this->input->post('user_id');
        $this->admin_model->update_function('id', $u_id, 'user_info', $user);
        redirect('admin/user_list');
    }

    public function offices()
    {
        $data['office'] = $this->admin_model->getInstInfoALl();

        $this->load->view('layouts/header');
        $this->load->view('trainee/office_list', $data);
    }

    public function edit_office($id)
    {
        $data['ofc'] = $this->admin_model->getInstInfoALl2($id);
        $data['trainee_class'] = $this->admin_model->getWhere('*', 'class_status=1', 'classification_info');
        //echo '<pre>'; print_r($data);
        $data['division'] = $this->home_model->getAllRecords('division');//getWhere('*', 'div_id=' . $data['ofc'][0]['inst_div_id'], 'division');//
        $data['dist'] = $this->home_model->getWhere('*', 'div_id=' . $data['ofc'][0]['inst_div_id'], 'district');
        $data['upz'] = $this->home_model->getWhere('*', 'dist_id=' . $data['ofc'][0]['inst_dist_id'], 'upazilla');
        //echo '<pre>'; print_r($data); die();
        $this->load->view('layouts/header');
        $this->load->view('trainee/edit_office', $data);
    }

    public function edit_office_post()
    {
        $bn_digits = array('০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯');
        $en_digits = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9');

        $id = $this->input->post('ofc_id');

        $inst['classification_id'] = $this->input->post('trainee_class');
        if ($inst['classification_id'] == 2) {
            $inst['inst_name'] = $this->input->post('ofc_name');
        }
        if ($inst['classification_id'] == 1 || $inst['classification_id'] == 3) {
            $inst['inst_name'] = $this->input->post('somitee_name');
            $inst['inst_last_update_reg_number'] = $this->input->post('reg_update_num');
            $inst['inst_reg_number'] = $this->input->post('reg_num');
            if ($this->input->post('reg_date') != null || $this->input->post('reg_date') != '') {
                $tmpp = explode('/', $this->input->post('reg_date'));
                $inst['inst_reg_date'] = $tmpp[2] . '-' . $tmpp[1] . '-' . $tmpp[0];
            }
            if ($this->input->post('reg_update_date') != '' || $this->input->post('reg_update_date') != null) {
                $tmpp = explode('/', $this->input->post('reg_update_date'));
                $inst['inst_last_update_date'] = $tmpp[2] . '-' . $tmpp[1] . '-' . $tmpp[0];
            }
        }

        $inst['inst_phone'] = $this->input->post('ofc_phn');
        $inst['inst_mb'] = $this->input->post('ofc_mb');
        $inst['inst_email'] = $this->input->post('ofc_email');
        $inst['inst_house_no'] = $this->input->post('house_no');
        $inst['inst_road_no'] = $this->input->post('road_no');
        $inst['inst_road_name'] = $this->input->post('road_name');
        $inst['inst_area_name'] = $this->input->post('area_name');
        $inst['inst_div_id'] = $this->input->post('ofc_div');
        $inst['inst_dist_id'] = $this->input->post('ofc_dist');
        $inst['inst_upz_id'] = $this->input->post('ofc_upz');
        $inst['inst_status'] = 1;

        $this->admin_model->update_function('inst_id', $id, 'institute', $inst);
        //$ofcID = $this->home_model->insert_ret('institute', $inst);

        redirect('admin/offices');
    }

    public function add_offices()
    {
        $data['division'] = $this->home_model->getAllRecords('division');//getWhere('*', 'div_id=2', 'division');//
        $data['dist'] = $this->home_model->getWhere('*', 'div_id=' . $data['division'][0]['div_id'], 'district');
        $data['upz'] = $this->home_model->getWhere('*', 'dist_id=' . $data['dist'][0]['dist_id'], 'upazilla');

        $data['trainee_class'] = $this->home_model->getWhere('*', 'class_status=1', 'classification_info');

        $this->load->view('layouts/header');
        $this->load->view('trainee/add_office', $data);
    }

    public function add_office_post()
    {
        $bn_digits = array('০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯');
        $en_digits = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9');


        $inst['classification_id'] = $this->input->post('trainee_class');
        if ($inst['classification_id'] == 2) {
            $inst['inst_name'] = $this->input->post('ofc_name');
        }
        if ($inst['classification_id'] == 1 || $inst['classification_id'] == 3) {
            $inst['inst_name'] = $this->input->post('somitee_name');
            $inst['inst_last_update_reg_number'] = $this->input->post('reg_update_num');
            $inst['inst_reg_number'] = $this->input->post('reg_num');
            if ($this->input->post('reg_date') != null || $this->input->post('reg_date') != '') {
                $tmpp = explode('/', $this->input->post('reg_date'));
                $inst['inst_reg_date'] = $tmpp[2] . '-' . $tmpp[1] . '-' . $tmpp[0];
            }
            if ($this->input->post('reg_update_date') != '' || $this->input->post('reg_update_date') != null) {
                $tmpp = explode('/', $this->input->post('reg_update_date'));
                $inst['inst_last_update_date'] = $tmpp[2] . '-' . $tmpp[1] . '-' . $tmpp[0];
            }
        }

        $inst['inst_phone'] = $this->input->post('ofc_phn');
        $inst['inst_mb'] = $this->input->post('ofc_mb');
        $inst['inst_email'] = $this->input->post('ofc_email');
        $inst['inst_house_no'] = $this->input->post('house_no');
        $inst['inst_road_no'] = $this->input->post('road_no');
        $inst['inst_road_name'] = $this->input->post('road_name');
        $inst['inst_area_name'] = $this->input->post('area_name');
        $inst['inst_div_id'] = $this->input->post('ofc_div');
        $inst['inst_dist_id'] = $this->input->post('ofc_dist');
        $inst['inst_upz_id'] = $this->input->post('ofc_upz');
        $inst['inst_status'] = 1;

        $ofcID = $this->home_model->insert_ret('institute', $inst);

        redirect('admin/offices');
    }

    public function edit_user_post()
    {
//        echo '<pre>';
//        print_r($_POST);
//        die();

        $data['nid'] = $this->input->post('nid');
        $data['name'] = $this->input->post('user_name');
        $data['father_name'] = $this->input->post('father_name');
        $data['mother_name'] = $this->input->post('mother_name');
        $data['gender'] = $this->input->post('gender');
        $data['email'] = $this->input->post('email');
        $data['mobile'] = $this->input->post('mobile');
        $data['fb_link'] = $this->input->post('fb');
        $data['educational_qualification'] = $this->input->post('edu');
        $data['designation'] = $this->input->post('dsgntn');
        $data['office_id'] = $this->input->post('e_office');
        $data['classification_id'] = $this->input->post('e_type');

        $reg = explode('/', $this->input->post('reg_date'));

        $data['registration_date'] = $reg[2] . '-' . $reg[0] . '-' . $reg[1];

        $this->admin_model->update_function('id', $this->input->post('id'), 'user_info', $data);

        // $data['present_address'] = json_encode(array('div' => $this->input->post('div'), 'dist' => $this->input->post('dist'), 'upz' => $this->input->post('upz'), 'thana' => $this->input->post('thana'), 'road_no' => $this->input->post('road'), 'house_no' => $this->input->post('house'), 'other' => $this->input->post('additional')));
        //$data['parmanent_address'] = json_encode(array('div' => $this->input->post('p_div'), 'dist' => $this->input->post('dist'), 'upz' => $this->input->post('p_upz'), 'other' => $this->input->post('p_additional')));


        print_r($data);
        //$this->admin_model->insert('user_info', $data);

        redirect('admin/user_list');
    }

    public function get_previous_value()
    {
        $data['res'] = $this->admin_model->getWhere('*', 'id=' . $this->input->post('id'), 'previous_course');
        echo json_encode($data);
    }

    public function update_edit_pre_course()
    {
        //print_r($this->input->post('id'));
        echo '1';
    }

    //////user ends/////


    /*****************teacher********************/
    /*****************teacher list***************/
    public function teacher()
    {
        $data['page_title'] = 'বক্তা/প্রশিক্ষকের বিস্তারিত তথ্য';
        $data['teacher_info'] = $this->admin_model->get_teacher_info('all');

        $this->load->view('layouts/header');
        $this->load->view('teacher/list', $data);
    }

    /*****************get teacher info through ajax***************/
    public function get_teacher_info()
    {
        $data['res'] = $this->admin_model->get_teacher_info($this->input->post('id'));
        $data['res2'] = $this->admin_model->get_teacher_crse_info($this->input->post('id'));

        echo json_encode($data);
    }

    /*****************new teacher***************/
    public function new_teacher()
    {
        $data['page_title'] = 'বক্তা/প্রশিক্ষক সংযোজন';

        $cur_y = date('Y');
        $cur_m = date('m');

        if ($cur_m <= 6) {
            $data['curr_y'] = ($cur_y - 1) . '-' . $cur_y;
        } else {
            $data['curr_y'] = $cur_y . '-' . ($cur_y + 1);
        }
        $data['division'] = $this->admin_model->getAllRecords('division');
        $data['dist'] = $this->admin_model->getWhere('*', 'div_id=' . $data['division'][0]['div_id'], 'district');
        $data['upz'] = $this->admin_model->getWhere('*', 'dist_id=' . $data['dist'][0]['dist_id'], 'upazilla');
        $data['blood_grp'] = $this->admin_model->getWhere('*', 'blood_grp_status=1', 'blood_group');
        $data['education'] = $this->admin_model->getWhere('*', 'edu_status=1', 'education');
        $data['trainee_class'] = $this->admin_model->getWhere('*', 'class_status=1', 'classification_info');
        $data['des'] = $this->admin_model->getWhere('*', 'des_status=1 and classification_id=' . $data['trainee_class'][0]['id'], 'designation');
        $data['profession'] = $this->admin_model->getWhere('*', 'prf_status=1 and classification_id=' . $data['trainee_class'][0]['id'], 'profession');
        $data['inst'] = $this->home_model->getInstInfo($data['trainee_class'][0]['id']);
        $data['course_name'] = $this->home_model->getFutureCourseInfo();
        if (sizeof($data['course_name']) != 0) {
            $data['course_time'] = $this->home_model->getFutureCourseTime($data['course_name'][0]['c_id'], $data['trainee_class'][0]['id']);
        } else {
            $data['course_time'] = '';
        }
        $data['training_inst'] = $this->home_model->getWhere('*', 'status=1', 'training_institute');

        $this->load->view('layouts/header');
        $this->load->view('teacher/add', $data);
    }

    /*****************add_teacher_post********************/
    public function add_teacher_post()
    {
//        echo '<pre>';
//        print_r($_POST);
//        print_r($_FILES);
//        die();

        $bn_digits = array('০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯');
        $en_digits = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9');

        $instt = $this->input->post('ofc_id');
        if ($instt == 'add_inst') {
            $inst['classification_id'] = $this->input->post('trainee_class');
            if ($inst['classification_id'] == 2) {
                $inst['inst_name'] = $this->input->post('ofc_name');
            }
            if ($inst['classification_id'] == 1 || $inst['classification_id'] == 3) {
                $inst['inst_name'] = $this->input->post('somitee_name');
                $inst['inst_reg_number'] = $this->input->post('reg_num');
                if ($this->input->post('reg_date') != null || $this->input->post('reg_date') != '') {
                    $tmpp = explode('/', $this->input->post('reg_date'));
                    $inst['inst_reg_date'] = $tmpp[2] . '-' . $tmpp[1] . '-' . $tmpp[0];
                }
                if ($this->input->post('reg_update_date') != '' || $this->input->post('reg_update_date') != null) {
                    $tmpp = explode('/', $this->input->post('reg_update_date'));
                    $inst['inst_last_update_date'] = $tmpp[2] . '-' . $tmpp[1] . '-' . $tmpp[0];
                }
                $inst['inst_last_update_reg_number'] = $this->input->post('reg_update_num');
            }

            $inst['inst_phone'] = $this->input->post('ofc_phn');
            $inst['inst_mb'] = $this->input->post('ofc_mb');
            $inst['inst_email'] = $this->input->post('ofc_email');
            $inst['inst_house_no'] = $this->input->post('house_no');
            $inst['inst_road_no'] = $this->input->post('road_no');
            $inst['inst_road_name'] = $this->input->post('road_name');
            $inst['inst_area_name'] = $this->input->post('area_name');
            $inst['inst_div_id'] = $this->input->post('ofc_div');
            $inst['inst_dist_id'] = $this->input->post('ofc_dist');
            $inst['inst_upz_id'] = $this->input->post('ofc_upz');
            $inst['inst_status'] = 1;

            $ofcID = $this->home_model->insert_ret('institute', $inst);

            $t['office_id'] = $ofcID;
        } else {
            $t['office_id'] = $this->input->post('ofc_id');
        }


        $t['t_nid'] = str_replace($bn_digits, $en_digits, $this->input->post('nid'));
        $t['t_name'] = $this->input->post('name_bng');
        if ($this->input->post('dob') != null || $this->input->post('dob') != '') {
            $tmp = explode('/', $this->input->post('dob'));
            $tmpDob = $tmp[2] . '-' . $tmp[1] . '-' . $tmp[0];
            $t['t_dob'] = str_replace($bn_digits, $en_digits, $tmpDob);
        }

        $t['t_name_eng'] = $this->input->post('name_eng');
        $t['t_father_name'] = $this->input->post('father_name');
        $t['t_mother_name'] = $this->input->post('mother_name');
        $t['t_spouse_name'] = $this->input->post('spouse_name');
        $t['t_gender'] = $this->input->post('gender');
        $t['t_email'] = $this->input->post('trainee_email');
        $t['t_mobile'] = str_replace($bn_digits, $en_digits, $this->input->post('per_mb'));
        $t['t_other_mobile'] = str_replace($bn_digits, $en_digits, $this->input->post('imp_mb'));
        $t['t_fb_link'] = $this->input->post('trainee_fb');
        $t['t_present_address'] = $this->input->post('curr_add');
        $t['t_per_div_id'] = $this->input->post('p_div');
        $t['t_per_dist_id'] = $this->input->post('p_dist');
        $t['t_per_upz_id'] = $this->input->post('p_upz');
        $t['t_parmanent_address'] = $this->input->post('p_details');
        $t['education_id'] = $this->input->post('education');
        $t['blood_grp_id'] = $this->input->post('blood_grp');
        $t['designation_id'] = $this->input->post('des');
        $t['profession_id'] = $this->input->post('profession');
        $t['classification_id'] = $this->input->post('trainee_class');
        $t['t_status'] = 1;
        $t['t_image'] = 'no_img.png';
        $t['t_sign'] = 'no_img.png';
        $t['t_created_at'] = date('Y-m-d');

        $teacherID = $this->home_model->insert_ret('teacher_info', $t);


        $teacher_crse['teacher_id'] = $teacherID;
        $teacher_crse['course_id'] = $this->input->post('start_date');
        $this->home_model->insert('teacher_course_rel', $teacher_crse);


        $userList=$this->admin_model->getWhere('*','course_id='.$this->input->post('start_date'),'review_info');

        if(sizeof($userList)!=0){
            foreach($userList as $ul){
                $techReview['teacher_id'] = $teacherID;
                $techReview['course_id'] = $this->input->post('start_date');
                $techReview['user_id'] = $ul['user_id'];
                $this->home_model->insert('teacher_review_info', $techReview);
                $this->home_model->insert('temp_teacher_review', $techReview);
            }
        }




        $this->session->set_flashdata('message', 'কার্যক্রমটি সফল হয়েছে');
        redirect('admin/teacher');
    }

    public function teacher_info_edit()
    {
        if ($this->uri->segment(3)) {

            $teacher_info = $this->admin_model->get_teacher_info($this->uri->segment(3));

            $data['division'] = $this->admin_model->getAllRecords('division');
            $data['dist'] = $this->admin_model->getWhere('*', 'div_id=' . $teacher_info[0]['t_per_div_id'], 'district');
            $data['upz'] = $this->admin_model->getWhere('*', 'dist_id=' . $teacher_info[0]['t_per_dist_id'], 'upazilla');
            $data['blood_grp'] = $this->admin_model->getWhere('*', 'blood_grp_status=1', 'blood_group');
            $data['education'] = $this->admin_model->getWhere('*', 'edu_status=1', 'education');
            $data['trainee_class'] = $this->admin_model->getWhere('*', 'class_status=1', 'classification_info');
            $data['des'] = $this->admin_model->getWhere('*', 'des_status=1 and classification_id=' . $teacher_info[0]['c_id'], 'designation');
            $data['profession'] = $this->admin_model->getWhere('*', 'prf_status=1 and classification_id=' . $teacher_info[0]['c_id'], 'profession');
            $data['inst'] = $this->home_model->getInstInfo($teacher_info[0]['c_id']);

            if ($teacher_info[0]['t_dob'] == null || $teacher_info[0]['t_dob'] == '0000-00-00') {
                $data['age'] = 0;
            } else {
                $date1 = date_create($teacher_info[0]['t_dob']);
                $date2 = date_create(date('Y-m-d'));
                $diff = date_diff($date1, $date2);

                $data['age'] = $diff->y;
            }

            $data['teacher_info'] = $teacher_info;
            $this->load->view('layouts/header');
            $this->load->view('teacher/edit', $data);
        }

    }

    /******************teacher_info_edit_post***************/
    public function teacher_info_edit_post()
    {
        $bn_digits = array('০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯');
        $en_digits = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9');

        $t['office_id'] = $this->input->post('ofc_id');
        $t['t_nid'] = str_replace($bn_digits, $en_digits, $this->input->post('nid'));
        $t['t_name'] = $this->input->post('name_bng');

        $tmp = explode('/', $this->input->post('dob'));
        $tmpDob = $tmp[2] . '-' . $tmp[1] . '-' . $tmp[0];
        $t['t_dob'] = str_replace($bn_digits, $en_digits, $tmpDob);

        $t['t_name_eng'] = $this->input->post('name_eng');
        $t['t_father_name'] = $this->input->post('father_name');
        $t['t_mother_name'] = $this->input->post('mother_name');
        $t['t_spouse_name'] = $this->input->post('spouse_name');
        $t['t_gender'] = $this->input->post('gender');
        $t['t_email'] = $this->input->post('trainee_email');
        $t['t_mobile'] = str_replace($bn_digits, $en_digits, $this->input->post('per_mb'));
        $t['t_other_mobile'] = str_replace($bn_digits, $en_digits, $this->input->post('imp_mb'));
        $t['t_fb_link'] = $this->input->post('trainee_fb');
        $t['t_present_address'] = $this->input->post('curr_add');
        $t['t_per_div_id'] = $this->input->post('p_div');
        $t['t_per_dist_id'] = $this->input->post('p_dist');
        $t['t_per_upz_id'] = $this->input->post('p_upz');
        $t['t_parmanent_address'] = $this->input->post('p_details');
        $t['education_id'] = $this->input->post('education');
        $t['blood_grp_id'] = $this->input->post('blood_grp');
        $t['designation_id'] = $this->input->post('des');
        $t['profession_id'] = $this->input->post('profession');
        $t['classification_id'] = $this->input->post('trainee_class');

        $t_id = $this->input->post('teacher_id');
        $this->admin_model->update_function('t_id', $t_id, 'teacher_info', $t);
        $this->session->set_flashdata('message', 'কার্যক্রমটি সফল হয়েছে');
        redirect('admin/teacher');
    }

    /*****************teacher pdf********************/
    public function teacher_pdf()
    {
        $id = $this->uri->segment(3);

        if ($id) {
            $data['teacher_info'] = $this->admin_model->get_teacher_info($id);

            //$this->load->view('all_user_details_pdf', $data);
            $html = $this->load->view('teacher/all_teacher_details_pdf', $data, true);

            //this the the PDF filename that user will get to download
            $pdfFilePath = "output_pdf_name.pdf";

            //load mPDF library
            $this->load->library('m_pdf_nrml', "'utf-8', 'A4'");

            //generate the PDF from the given html
            $this->m_pdf_nrml->pdf->WriteHTML($html);

            //download it.
            $this->m_pdf_nrml->pdf->Output($pdfFilePath, "I");
        }
    }
    /*****************teacher********************/


    //////user-course relation start/////

    public function add_trainee()
    {
        if ($this->uri->segment(3)) {
            $c_id = $this->uri->segment(3);

            if ($this->uri->segment(4)) {
                $u_id = $this->uri->segment(4);
                $this->admin_model->delete_function_cond('review_info', 'user_id=' . $u_id . ' and course_id=' . $c_id);
                $this->admin_model->delete_function_cond('temp_review', 'user_id=' . $u_id . ' and course_id=' . $c_id);

                $tmp_stdnt = $this->admin_model->getWhere('*', 'id=' . $c_id, 'course_info');
                if (sizeof($tmp_stdnt) != 0) {
                    $stdUp['total_student'] = $tmp_stdnt[0]['total_student'] - 1;
                    $this->admin_model->update_function('id', $c_id, 'course_info', $stdUp);
                }

                $teacher = $this->admin_model->getWhere('*', 'course_id=' . $c_id, 'teacher_course_rel'); ////01-02-2017
                if (sizeof($teacher) != 0) {   ////01-02-2017
                    foreach ($teacher as $t) {   ////01-02-2017
                        $this->admin_model->delete_function_cond('teacher_review_info', 'user_id=' . $u_id . ' and course_id=' . $c_id . ' and teacher_id=' . $t['teacher_id']);   /////01-02-2017
                    }    ////01-02-2017
                }    ////01-02-2017

            }

            $data['crseInfo'] = $this->admin_model->get_course_info3($c_id);
            $data['typeofstudent'] = $this->admin_model->get_gender($c_id);
            $data['review'] = $this->admin_model->get_course_review_info($c_id);
            $data['get_avg_review'] = $this->admin_model->get_avg_review($c_id);
            $data['trainee'] = $this->admin_model->get_user_info($c_id);
            //echo '<pre>'; print_r($data['get_avg_review']); die();
            $data['course_id'] = $c_id;
            $data['course_status'] = $this->admin_model->getWhere('course_status', 'id=' . $c_id, 'course_info')[0]['course_status'];
            $this->load->view('layouts/header');
            $this->load->view('trainee/add_trainee', $data);

        }
    }

    public function new_trainee()
    {
        if ($this->uri->segment(3)) {
            $c_id = $this->uri->segment(3);
            $type = $this->admin_model->getWhere('classification_id', 'id=' . $c_id, 'course_info')[0]['classification_id'];
            $users = $this->admin_model->getWhere('*', 'classification_id=' . $type, 'user_info');
            $added_user = $this->admin_model->getWhere('user_id as id', 'course_id=' . $c_id, 'review_info');

            $user = array();
            foreach ($users as $u) {
                $add = true;
                foreach ($added_user as $au) {
                    if ($u['id'] == $au['id']) {
                        $add = false;
                    }
                }
                if ($add == 'true') {
                    array_push($user, $u);
                }
            }
            $data['user'] = $user;
            //echo '<pre>'; print_r($user); die();
            $data['course_id'] = $c_id;
            $this->load->view('layouts/header');
            $this->load->view('trainee/new_trainee', $data);

        }
    }

    public function new_trainee_post()
    {
        $data['course_id'] = $this->input->post('course_id');
        $data['created_at'] = date('Y-m-d');


        $teacher = $this->admin_model->getWhere('*', 'course_id=' . $data['course_id'], 'teacher_course_rel'); ////01-02-2017

        foreach ($this->input->post('user') as $u) {
            if ($u != 0) {
                $data['user_id'] = $u;

                $this->admin_model->insert('review_info', $data);

                if (sizeof($teacher) != 0) {   ////01-02-2017
                    foreach ($teacher as $t) {   ////01-02-2017
                        $tec['course_id'] = $data['course_id'];    ////01-02-2017
                        $tec['teacher_id'] = $t['teacher_id'];    ////01-02-2017
                        $tec['user_id'] = $u;    ////01-02-2017

                        $this->admin_model->insert('teacher_review_info', $tec);   ////01-02-2017
                        $this->admin_model->insert('temp_teacher_review', $tec);   ////01-02-2017
                    }    ////01-02-2017
                }    ////01-02-2017
            }
        }

        $count = $this->admin_model->get_student_num($data['course_id']);
        $data_c['total_student'] = $count[0]['count'];
        $this->admin_model->update_function('id', $data['course_id'], 'course_info', $data_c);
        redirect('admin/add_trainee/' . $data['course_id']);
    }

    //////user-course relation ends/////


    /***************************************************************************************************/
    /******************************************REPORT***************************************************/
    /***************************************************************************************************/
    public function all_details()
    {
        $this->load->view('layouts/header');
        $this->load->view('report/details_list');
        $this->load->view('layouts/footer');
    }

    public function user_demand_report()
    {
        $data['id'] = '';
        //$this->load->view('all_course_details_pdf', $data);
        $html = $this->load->view('report/user_demand_pdf', $data, true);

        //this the the PDF filename that user will get to download
        $pdfFilePath = "output_pdf_name.pdf";

        //load mPDF library
        $this->load->library('m_pdf_nrml', "'utf-8', 'A4'");

        //generate the PDF from the given html
        $this->m_pdf_nrml->pdf->WriteHTML($html);

        //download it.
        $this->m_pdf_nrml->pdf->Output($pdfFilePath, "I");
    }

    public function remark_n_suggestion_report()
    {
        $data['id'] = '';
        //$this->load->view('all_course_details_pdf', $data);
        $html = $this->load->view('report/remark_n_suggestion_pdf', $data, true);

        //this the the PDF filename that user will get to download
        $pdfFilePath = "output_pdf_name.pdf";

        //load mPDF library
        $this->load->library('m_pdf_nrml', "'utf-8', 'A4'");

        //generate the PDF from the given html
        $this->m_pdf_nrml->pdf->WriteHTML($html);

        //download it.
        $this->m_pdf_nrml->pdf->Output($pdfFilePath, "I");
    }

    public function get_course_info()
    {
        $data['res'] = $this->admin_model->get_course_info4($this->input->post('id'));
        $data['res2'] = $this->admin_model->getWhere('*', 'id=' . $this->input->post('id'), 'donor_info');
        echo json_encode($data);
    }

    public function all_budget_details()
    {
        $cur_y = date('Y');
        $cur_m = date('m');

        if ($cur_m <= 6) {
            $data['curr_y'] = ($cur_y - 1) . '-' . $cur_y;
        } else {
            $data['curr_y'] = $cur_y . '-' . ($cur_y + 1);
        }
        $data['curr_m'] = $cur_m;
        $data['type'] = 'all';
        $is_pdf = 0;

        if ($_POST) {
            $data['curr_y'] = $this->input->post('year');
            $data['curr_m'] = $this->input->post('mnth');
            $data['type'] = $this->input->post('donor');
            $is_pdf = $this->input->post('is_pdf');
        }

        $course = $this->admin_model->get_budget_details_with_cond($data['curr_y'], $data['curr_m'], $data['type']);
        foreach ($course as $key => $c) {
            $expnse = $this->admin_model->getWhere('sum(expenditure) as expnse', 'donor_id=' . $c['id'], 'course_info');
            if ($expnse[0]['expnse'] == '' || $expnse[0]['expnse'] == 0 || $expnse[0]['expnse'] == null) {
                array_push($course[$key], 0);
            } else {
                array_push($course[$key], $expnse[0]['expnse']);
            }

        }
        $data['course'] = $course;
        $this->load->view('layouts/header');
        if ($is_pdf == 1) {
            //$this->load->view('all_course_details_pdf', $data);
            $html = $this->load->view('report/all_budget_details_pdf', $data, true);

            //this the the PDF filename that user will get to download
            $pdfFilePath = "output_pdf_name.pdf";

            //load mPDF library
            $this->load->library('m_pdf_nrml', "'utf-8', 'A4'");

            //generate the PDF from the given html
            $this->m_pdf_nrml->pdf->WriteHTML($html);

            //download it.
            $this->m_pdf_nrml->pdf->Output($pdfFilePath, "I");
        } else {
            $this->load->view('report/all_budget_details', $data);
        }
    }

    public function get_course_info2()
    {
        $years = $this->input->post('year');
        if ($this->input->post('mnth') <= 6) {
            $yy = explode('-', $years)[1];
        } else {
            $yy = explode('-', $years)[0];
        }
        $mdate = $yy . '-' . $this->input->post('mnth') . '-31'; //echo $mdate;
        $data['res'] = $this->admin_model->getCourseInfo55($this->input->post('id'), $mdate);//getWhere('*', 'donor_id=' . $this->input->post('id') . ' and start_date <"' . $mdate . '"', 'course_info');
        $data['res2'] = $this->admin_model->getWhere('*', 'id=' . $this->input->post('id'), 'donor_info');
        echo json_encode($data);
    }

    public function get_course_info_end()
    {
        $years = $this->input->post('year');
        if ($this->input->post('mnth') <= 6) {
            $yy = explode('-', $years)[1];
        } else {
            $yy = explode('-', $years)[0];
        }
        $mdate = $yy . '-' . $this->input->post('mnth') . '-31'; //echo $mdate;
        $data['res'] = $this->admin_model->getCmpltCrs($this->input->post('id'), $mdate);
        $data['res2'] = $this->admin_model->getWhere('*', 'id=' . $this->input->post('id'), 'donor_info');
        echo json_encode($data);
    }

    public function all_budget_details_monthly()
    {
        $cur_y = date('Y');
        $cur_m = date('m');

        if ($cur_m <= 6) {
            $data['curr_y'] = ($cur_y - 1) . '-' . $cur_y;
        } else {
            $data['curr_y'] = $cur_y . '-' . ($cur_y + 1);
        }
        $data['curr_m'] = $cur_m;
        $data['type'] = 'all';
        $is_pdf = 0;

        if ($_POST) {
            $data['curr_y'] = $this->input->post('year');
            $data['curr_m'] = $this->input->post('mnth');
            $data['type'] = $this->input->post('donor');
            $is_pdf = $this->input->post('is_pdf');
        }

        $course = $this->admin_model->get_budget_details_with_cond($data['curr_y'], $data['curr_m'], $data['type']);
        foreach ($course as $key => $c) {
            if ($data['curr_m'] <= 6) {
                $yy = explode('-', $data['curr_y'])[1];
            } else {
                $yy = explode('-', $data['curr_y'])[0];
            }
            $mdate = $yy . '-' . $data['curr_m'] . '-31';
            $expnse = $this->admin_model->getWhere('sum(expenditure) as expnse', 'donor_id=' . $c['id'] . ' and start_date <"' . $mdate . '"', 'course_info');
            if ($expnse[0]['expnse'] == '' || $expnse[0]['expnse'] == 0 || $expnse[0]['expnse'] == null) {
                array_push($course[$key], 0);
            } else {
                array_push($course[$key], $expnse[0]['expnse']);
            }

            $expnse2 = $this->admin_model->getWhere('sum(expenditure) as expnse', 'donor_id=' . $c['id'] . ' and end_date <"' . $mdate . '" and course_status=2', 'course_info');
            if ($expnse2[0]['expnse'] == '' || $expnse2[0]['expnse'] == 0 || $expnse2[0]['expnse'] == null) {
                array_push($course[$key], 0);
            } else {
                array_push($course[$key], $expnse2[0]['expnse']);
            }

        }
        $data['course'] = $course;
        $this->load->view('layouts/header');
        if ($is_pdf == 1) {
            //$this->load->view('all_course_details_pdf', $data);
            $html = $this->load->view('report/all_budget_details_monthly_pdf', $data, true);

            //this the the PDF filename that user will get to download
            $pdfFilePath = "output_pdf_name.pdf";

            //load mPDF library
            $this->load->library('m_pdf_nrml', "'utf-8', 'A4'");

            //generate the PDF from the given html
            $this->m_pdf_nrml->pdf->WriteHTML($html);

            //download it.
            $this->m_pdf_nrml->pdf->Output($pdfFilePath, "I");
        } else {
            $this->load->view('report/all_budget_details_monthly', $data);
        }
    }

    public function course_progress()
    {
        $data['page_title'] = 'প্রশিক্ষণ অগ্রগতি';
        $data['c_year'] = $this->admin_model->getYear();
        $this->load->view('layouts/header');
        $this->load->view('report/course_progress', $data);
        $this->load->view('layouts/footer');
    }

    public function getCourseProgress()
    {
        $donor = $this->input->post('donor');

        $mnth = $this->input->post('mnth');
        $mnthf = $this->input->post('mnthFrom');
        $mntht = $this->input->post('mnthTo');
        $year = $this->input->post('c_year');

        $data['allCrse'] = $this->admin_model->getCourseProgress($mnth, $mnthf, $mntht, $year, $donor, 'all');
        $data['igaCrse'] = $this->admin_model->getCourseProgress($mnth, $mnthf, $mntht, $year, $donor, 1);
        $data['manCrse'] = $this->admin_model->getCourseProgress($mnth, $mnthf, $mntht, $year, $donor, 2);

        $data['allTraineeMan'] = $this->admin_model->getCourseProgress2($mnth, $mnthf, $mntht, $year, $donor, 'all', 1);
        $data['allTraineeWoMan'] = $this->admin_model->getCourseProgress2($mnth, $mnthf, $mntht, $year, $donor, 'all', 2);

        $data['igaTraineeMan'] = $this->admin_model->getCourseProgress2($mnth, $mnthf, $mntht, $year, $donor, 1, 1);
        $data['igaTraineeWoMan'] = $this->admin_model->getCourseProgress2($mnth, $mnthf, $mntht, $year, $donor, 1, 2);

        $data['manTraineeMan'] = $this->admin_model->getCourseProgress2($mnth, $mnthf, $mntht, $year, $donor, 2, 1);
        $data['manTraineeWoMan'] = $this->admin_model->getCourseProgress2($mnth, $mnthf, $mntht, $year, $donor, 2, 2);
        echo json_encode($data);
    }

    public function courseProgressPdf()
    {
        $dnr = array('রাজস্ব', 'সিডিএফ', 'প্রকল্প/অন্যান্য');
        $data['mnth'] = $this->uri->segment(3);
        $data['mnthf'] = $this->uri->segment(4);
        $data['mntht'] = $this->uri->segment(5);
        $data['year'] = $this->uri->segment(6);
        $data['type'] = $this->uri->segment(7);
        $data['donor'] = $dnr[$this->uri->segment(8)];

        $data['allCrse'] = $this->admin_model->getCourseProgress($data['mnth'], $data['mnthf'], $data['mntht'], $data['year'], $data['donor'], 'all');
        $data['igaCrse'] = $this->admin_model->getCourseProgress($data['mnth'], $data['mnthf'], $data['mntht'], $data['year'], $data['donor'], 1);
        $data['manCrse'] = $this->admin_model->getCourseProgress($data['mnth'], $data['mnthf'], $data['mntht'], $data['year'], $data['donor'], 2);

        $data['allTraineeMan'] = $this->admin_model->getCourseProgress2($data['mnth'], $data['mnthf'], $data['mntht'], $data['year'], $data['donor'], 'all', 1);
        $data['allTraineeWoMan'] = $this->admin_model->getCourseProgress2($data['mnth'], $data['mnthf'], $data['mntht'], $data['year'], $data['donor'], 'all', 2);

        $data['igaTraineeMan'] = $this->admin_model->getCourseProgress2($data['mnth'], $data['mnthf'], $data['mntht'], $data['year'], $data['donor'], 1, 1);
        $data['igaTraineeWoMan'] = $this->admin_model->getCourseProgress2($data['mnth'], $data['mnthf'], $data['mntht'], $data['year'], $data['donor'], 1, 2);

        $data['manTraineeMan'] = $this->admin_model->getCourseProgress2($data['mnth'], $data['mnthf'], $data['mntht'], $data['year'], $data['donor'], 2, 1);
        $data['manTraineeWoMan'] = $this->admin_model->getCourseProgress2($data['mnth'], $data['mnthf'], $data['mntht'], $data['year'], $data['donor'], 2, 2);

        //echo '<pre>'; print_r($data); die();

        //$this->load->view('all_course_details_pdf', $data);
        $html = $this->load->view('report/courseProgressPdf', $data, true);

        //this the the PDF filename that user will get to download
        $pdfFilePath = "output_pdf_name.pdf";

        //load mPDF library
        $this->load->library('m_pdf_nrml', "'utf-8', 'A4'");

        //generate the PDF from the given html
        $this->m_pdf_nrml->pdf->WriteHTML($html);

        //download it.
        $this->m_pdf_nrml->pdf->Output($pdfFilePath, "I");
    }

    public function all_trainee_details()
    {
        $data['page_title'] = 'প্রশিক্ষণার্থী তালিকা';
        $data['course_name'] = $this->admin_model->getWhere('*', 'c_status=2', 'course_name');
        $data['trainee_class'] = $this->admin_model->getWhere('*', 'class_status=1', 'classification_info');
        $data['course_class'] = $this->admin_model->getWhere('*', 'course_class_status=1', 'course_class');
        $data['c_year'] = $this->admin_model->getYear();

        $data['division'] = $this->admin_model->getWhere('*', 'div_id=2', 'division');
        $data['dist'] = $this->admin_model->getWhere('*', 'div_id=2', 'district');
        $data['upz'] = $this->admin_model->getWhere('*', 'dist_id=' . $data['dist'][0]['dist_id'], 'upazilla');
        $this->load->view('layouts/header');
        $this->load->view('report/course_lists', $data);
        $this->load->view('layouts/footer');
    }

    public function getTraineeInfo()
    {
        $dd = array('all', 'রাজস্ব', 'সিডিএফ', 'প্রকল্প/অন্যান্য');
        $crse = $this->input->post('crse_name_id');
        $traineeCls = $this->input->post('clssfctn_id');
        $crseCls = $this->input->post('crse_cls_id');
        $donor = $dd[$this->input->post('donor_id')];
        $year = $this->input->post('c_year');
        $dist = $this->input->post('dist_id');
        $upz = $this->input->post('upz_id');
        $data['res'] = $this->admin_model->getTraineeInfo($crse, $traineeCls, $crseCls, $donor, $year, $dist, $upz);
        echo json_encode($data);
    }

    public function traineeListPdf()
    {
        $dd = array('all', 'রাজস্ব', 'সিডিএফ', 'প্রকল্প/অন্যান্য');
        $crse = $this->uri->segment(3);
        $traineeCls = $this->uri->segment(4);
        $crseCls = $this->uri->segment(5);
        $donor = $dd[$this->uri->segment(6)];
        $year = $this->uri->segment(7);
        $dist = $this->uri->segment(8);
        $upz = $this->uri->segment(9);
        $data['male'] = $this->admin_model->getTraineeInfo2($crse, $traineeCls, $crseCls, $donor, $year, $dist, $upz, 1);
        $data['female'] = $this->admin_model->getTraineeInfo2($crse, $traineeCls, $crseCls, $donor, $year, $dist, $upz, 2);
        $data['type'] = $this->uri->segment(10);
        //echo '<pre>'; echo $donor; echo '   male:'.sizeof($data['male']); echo '  female:'.sizeof($data['female']); die();
        //$this->load->view('all_course_details_pdf', $data);
        $html = $this->load->view('report/userListPdf', $data, true);

        //this the the PDF filename that user will get to download
        $pdfFilePath = "output_pdf_name.pdf";

        //load mPDF library
        $this->load->library('m_pdf_nrml', "'utf-8', 'A4'");

        //generate the PDF from the given html
        $this->m_pdf_nrml->pdf->WriteHTML($html);

        //download it.
        $this->m_pdf_nrml->pdf->Output($pdfFilePath, "I");
    }

    public function courseDetailsPdf($cid)
    {
        $id = $this->uri->segment(3);

        if ($id) {
            $data['trainee'] = $this->admin_model->get_user_info($id);
            $data['crseInfo'] = $this->admin_model->get_course_info3($id);
            $data['typeofstudent'] = $this->admin_model->get_gender($id);


            $data['get_avg_review'] = $this->admin_model->get_avg_review($id);

            //$this->load->view('review_comment_pdf', $data);
            $html = $this->load->view('trainee/courseDetailsPdf', $data, true);

            //this the the PDF filename that user will get to download
            $pdfFilePath = "output_pdf_name.pdf";

            //load mPDF library
            $this->load->library('m_pdf_nrml', "'utf-8', 'A4'");

            //generate the PDF from the given html
            $this->m_pdf_nrml->pdf->WriteHTML($html);

            //download it.
            $this->m_pdf_nrml->pdf->Output($pdfFilePath, "I");
        }
    }

    public function all_course_details()
    {
        $cur_y = date('Y');
        $cur_m = date('m');

        if ($cur_m <= 6) {
            $data['curr_y'] = ($cur_y - 1) . '-' . $cur_y;
        } else {
            $data['curr_y'] = $cur_y . '-' . ($cur_y + 1);
        }
        $data['type'] = 'all';
        $data['c_status'] = 'all';
        $is_pdf = 0;

        if ($_POST) {
            $data['curr_y'] = $this->input->post('year');
            $data['type'] = $this->input->post('donor');
            $data['c_status'] = $this->input->post('course_status');
            $is_pdf = $this->input->post('is_pdf');
        }

        $course = $this->admin_model->get_course_details_with_cond($data['curr_y'], $data['type'], $data['c_status']);
        $tmpCourse = $course;
        $i = 0;
        foreach ($course as $k => $cc) {
            $gender = $this->admin_model->get_gender($cc['c_id']);
            for ($j = 1; $j <= 2; $j++) {
                $add = false;
                foreach ($gender as $g) {
                    if ($g['gender'] == $j) {
                        $c = $g['count'];
                        $add = true;
                    }
                }
                if ($add == true) {
                    array_push($course[$i], $c);
                } else {
                    $c = 0;
                    array_push($course[$i], $c);
                }
            }

            $amnt = 0;
            foreach ($tmpCourse as $kkk => $crse) {
                if ($k >= $kkk) {
                    if ($cc['donor_id'] == $crse['donor_id']) {
                        $amnt += $crse['expenditure'];
                    }
                }

            }
            $rest = $cc['total_donation'] - $amnt;
            array_push($course[$i], $rest);

            $i++;
        }

        $data['donorAmnt'] = $this->admin_model->getDonationAmount($data['curr_y'], $data['type'], $data['c_status']);
        $data['expnseAmnt'] = $this->admin_model->getExpnseAmount($data['curr_y'], $data['type'], $data['c_status']);
        $data['course'] = $course;
        $this->load->view('layouts/header');
        if ($is_pdf == 1) {
            //$this->load->view('all_course_details_pdf', $data);
            $html = $this->load->view('report/all_course_details_pdf', $data, true);

            //this the the PDF filename that user will get to download
            $pdfFilePath = "output_pdf_name.pdf";

            //load mPDF library
            $this->load->library('m_pdf', "'utf-8', 'A4'");

            //generate the PDF from the given html
            $this->m_pdf->pdf->WriteHTML($html);

            //download it.
            $this->m_pdf->pdf->Output($pdfFilePath, "I");
        } else {
            $this->load->view('report/all_course_details', $data);
        }
    }

    public function all_course_review_details()
    {
        //echo '<pre>';
        $course_review_list = $this->admin_model->getwhere('*, id as c_id', 'course_status=2', 'course_info');
        // print_r($course_review_list);
        if (sizeof($course_review_list) != 0) {
            foreach ($course_review_list as $c_list) {
                $review_val = $this->admin_model->getWhere('*', 'course_id=' . $c_list['id'], 'review_info');
                //print_r($review_val);
                foreach ($review_val as $rv) {
                    if ($rv['review'] == 0) {
                        $tmp_review_val = $this->admin_model->getWhere('*', 'course_id=' . $c_list['id'] . ' and user_id=' . $rv['user_id'], 'temp_review');
                        //print_r($tmp_review_val);
                        if (sizeof($tmp_review_val) != 0) {
                            if ($tmp_review_val[0]['review'] != 0) {
                                $data_rev_up['review'] = $tmp_review_val[0]['review'];
                                $data_rev_up['comment'] = $tmp_review_val[0]['comment'];
                                $this->admin_model->update_function('id', $rv['id'], 'review_info', $data_rev_up);
                                $this->admin_model->delete_function_cond('temp_review', 'id=' . $tmp_review_val[0]['id']);

                                $data_prv_inst['user_id'] = $rv['user_id'];
                                $data_prv_inst['course_name'] = $c_list['name'];
                                $data_prv_inst['course_institution_name'] = 'আঞ্চলিক সমবায় ইন্সটিটিউট, খুলনা';
                                $data_prv_inst['course_duration'] = '' . $c_list['start_date'] . ' / ' . $c_list['end_date'] . '';
                                $data_prv_inst['created_at'] = date('Y-m-d');
                                $this->admin_model->insert('previous_course', $data_prv_inst);
                            }
                        }
                    }
                }


            }
        }


        $cur_y = date('Y');
        $cur_m = date('m');

        if ($cur_m <= 6) {
            $data['curr_y'] = ($cur_y - 1) . '-' . $cur_y;
        } else {
            $data['curr_y'] = $cur_y . '-' . ($cur_y + 1);
        }
        //$data['course'] = $this->admin_model->get_course();
        $data['course'] = $this->admin_model->getWhere('*', 'c_status=2', 'course_name');
        $data['users'] = $this->admin_model->getAllRecords('user_info');
        $data['crse'] = 'all';
        $data['user'] = 'all';
        $is_pdf = 0;
        if ($_POST) {
            $data['curr_y'] = $this->input->post('year');
            $data['user'] = $this->input->post('user');
            $data['crse'] = $this->input->post('course');
            $is_pdf = $this->input->post('is_pdf');
        }
        //$data['user_info']=$this->admin_model->get_user_info_with_cond();
        $course_review = $this->admin_model->get_course_review_with_cond($data['curr_y'], $data['crse'], $data['user']);
        $i = 0;
        foreach ($course_review as $c) {
            $avg = $this->admin_model->get_avg_review($c['c_id']);
            $gender = $this->admin_model->get_gender($c['c_id']);
            $not_good = $this->admin_model->percentange($c['c_id'], 0, 51);
            $good = $this->admin_model->percentange($c['c_id'], 51, 66);
            $very_good = $this->admin_model->percentange($c['c_id'], 66, 81);
            $very_very_good = $this->admin_model->percentange($c['c_id'], 81, 101);
            $per['not_good'] = $not_good[0]['c'];
            $per['good'] = $good[0]['c'];
            $per['very_good'] = $very_good[0]['c'];
            $per['very_very_good'] = $very_very_good[0]['c'];
            for ($j = 1; $j <= 2; $j++) {
                $add = false;
                foreach ($gender as $g) {
                    if ($g['gender'] == $j) {
                        $c = $g['count'];
                        $add = true;
                    }
                }
                if ($add == true) {
                    array_push($course_review[$i], $c);
                } else {
                    $c = 0;
                    array_push($course_review[$i], $c);
                }
            }
            array_push($course_review[$i], $per);
            array_push($course_review[$i], $avg[0]['avg']);
            $i++;
        }
        $data['course_review'] = $course_review;
//        echo'<pre>';
//        print_r($data); die();
        $this->load->view('layouts/header');
        if ($is_pdf == 1) {
            //$this->load->view('all_course_details_pdf', $data);
            $html = $this->load->view('report/all_course_review_details_pdf', $data, true);

            //this the the PDF filename that user will get to download
            $pdfFilePath = "output_pdf_name.pdf";

            //load mPDF library
            $this->load->library('m_pdf', "'utf-8', 'A4'");

            //generate the PDF from the given html
            $this->m_pdf->pdf->WriteHTML($html);

            //download it.
            $this->m_pdf->pdf->Output($pdfFilePath, "I");
        } else {
            $this->load->view('report/all_course_review_details', $data);
        }

        //$this->load->view('all_course_review_details', $data);
    }

    public function all_user_details()
    {
        $cur_y = date('Y');
        $cur_m = date('m');

        if ($cur_m <= 6) {
            $data['curr_y'] = ($cur_y - 1) . '-' . $cur_y;
        } else {
            $data['curr_y'] = $cur_y . '-' . ($cur_y + 1);
        }
        $data['course'] = $this->admin_model->getWhere('*', 'c_status=2', 'course_name');
        $data['office'] = $this->admin_model->getInstInfoALl();
        $data['crse'] = 'all';
        $data['inst'] = 'all';
        $u_id = 'all';
        $is_pdf = 0;
        if ($_POST) {
            $data['curr_y'] = $this->input->post('year');
            $data['inst'] = $this->input->post('office');
            $data['crse'] = $this->input->post('course');
            $is_pdf = $this->input->post('is_pdf');
            $u_id = $this->input->post('u_id');
        }
        $user_info = $this->admin_model->get_user_info_with_cond($data['curr_y'], $data['inst'], $data['crse'], $u_id);
        $p_index = 0;
        foreach ($user_info as $ui) {
            $pre_info = $this->admin_model->getWhere('*', 'user_id=' . $ui['u_id'], 'previous_course');
            array_push($user_info[$p_index++], $pre_info);
        }
        $data['user_info'] = $user_info;
        // echo '<pre>'; print_r($data); die();

        $this->load->view('layouts/header');
        if ($is_pdf == 1) {
            //$this->load->view('all_course_details_pdf', $data);
            $html = $this->load->view('report/all_user_details_pdf', $data, true);

            //this the the PDF filename that user will get to download
            $pdfFilePath = "output_pdf_name.pdf";

            //load mPDF library
            $this->load->library('m_pdf_nrml', "'utf-8', 'A4'");

            //generate the PDF from the given html
            $this->m_pdf_nrml->pdf->WriteHTML($html);

            //download it.
            $this->m_pdf_nrml->pdf->Output($pdfFilePath, "I");
        } else {
            // echo '<pre>';
            //print_r($data); die();
            $this->load->view('report/all_user_details', $data);
        }

    }

    /////show with pdf end////


    //////teacher review  start//////
    public function all_teacher_review_details()
    {
        $data['page_title'] = 'কোর্স অনুযায়ী প্রশিক্ষণার্থীর বক্তা/প্রশিক্ষক মূল্যায়ন';

        /////////for save data frm tmp tbl to main tbl///
        //$tmpCrse = $this->admin_model->getWhere('*', 'course_status=2', 'course_info');
        $tmpCrse = $this->admin_model->getAllRecords('course_info');

        foreach ($tmpCrse as $c_list) {
            $t_review_val = $this->admin_model->getWhere('*', 'course_id=' . $c_list['id'], 'teacher_review_info');  /////01-02-2017

            foreach ($t_review_val as $rv) {  /////01-02-2017
                if ($rv['t_review'] == 0) {  /////01-02-2017
                    $tmp_t_review_val = $this->admin_model->getWhere('*', 'course_id=' . $c_list['id'] . ' and user_id=' . $rv['user_id'] . ' and teacher_id=' . $rv['teacher_id'], 'temp_teacher_review');  /////01-02-2017

                    if (sizeof($tmp_t_review_val) != 0) {  /////01-02-2017
                        if ($tmp_t_review_val[0]['temp_review'] != 0) {  /////01-02-2017
                            $data_tec['t_review'] = $tmp_t_review_val[0]['temp_review'];  /////01-02-2017
                            $data_tec['t_comment'] = $tmp_t_review_val[0]['temp_comment'];  /////01-02-2017
                            $this->admin_model->update_function('t_review_id', $rv['t_review_id'], 'teacher_review_info', $data_tec);  /////01-02-2017
                            $this->admin_model->delete_function_cond('temp_teacher_review', 'temp_t_review_id=' . $tmp_t_review_val[0]['temp_t_review_id']);  /////01-02-2017

                        }  /////01-02-2017
                    }  /////01-02-2017
                }  /////01-02-2017
            }  /////01-02-2017
        }

        //////strt///
        $cur_y = date('Y');
        $cur_m = date('m');

        if ($cur_m <= 6) {
            $data['curr_y'] = ($cur_y - 1) . '-' . $cur_y;
        } else {
            $data['curr_y'] = $cur_y . '-' . ($cur_y + 1);
        }


        $data['course'] = $this->admin_model->getCourseListForTeacherReview($data['curr_y']);
        if (sizeof($data['course'] == 0)) {
            $data['crse'] = 0;
        } else {
            $data['crse'] = $data['course'][0]['crse_id'];
        }

        $data['teacherList'] = $this->admin_model->getTeacherListForTeacherReview($data['crse']);
        if (sizeof($data['teacherList']) == 0) {
            $data['tchr'] = 0;
        } else {
            $data['tchr'] = $data['teacherList'][0]['teacher_id'];
        }

        $is_pdf = 0;
        if ($_POST) {
            $data['curr_y'] = $this->input->post('year');
            $data['crse'] = $this->input->post('course');
            $data['tchr'] = $this->input->post('teacher');

            if($data['crse']==''){
                $data['crse']=0;
            }
            if($data['tchr']==''){
                $data['tchr']=0;
            }
            $is_pdf = $this->input->post('is_pdf');
            $data['course'] = $this->admin_model->getCourseListForTeacherReview($data['curr_y']);
            $data['teacherList'] = $this->admin_model->getTeacherListForTeacherReview($data['crse']);
        }

        //echo '<pre>'; print_r($data['course']); die();
        //echo '<pre>';
        //print_r($data['curr_y']);
        //print_r($data['crse']);
        //print_r($data['tchr']);

        $teacher_review = $this->admin_model->get_teacher_review_with_cond($data['curr_y'], $data['crse'], $data['tchr']);

        $data['teacher_review'] = $teacher_review;
        $tmpAvg=$this->admin_model->getWhere('sum(t_review) as r','teacher_id='.$data['crse'].' and course_id='.$data['tchr'],'teacher_review_info');

        $tavg=0; $ttc=0;
        foreach ($teacher_review as $dfg){
            if($dfg['t_review']!=null){
                $tavg+=$dfg['t_review'];
                $ttc+=1;
            }
        }
        if($ttc==0){
            $data['avg']=0;
        }else{
            $data['avg']=(float)$tavg/$ttc;
        }

        if(sizeof($teacher_review)!=0){
            //print_r($tmpAvg);
            //$data['avg']=(float)$tmpAvg[0]['r']/sizeof($teacher_review);
            //print_r($data['avg']);
            $data['techIn']=$this->admin_model->getTeacherIn($data['crse'],$data['tchr']);
        }

        //print_r($teacher_review);
        //print_r($data['teacher_review']);
        //die();
        $this->load->view('layouts/header');
        if ($is_pdf == 1) {
            //$this->load->view('all_course_details_pdf', $data);
            $html = $this->load->view('teacher/all_teacher_review_details_pdf', $data, true);

            //this the the PDF filename that user will get to download
            $pdfFilePath = "output_pdf_name.pdf";

            //load mPDF library
            $this->load->library('m_pdf_nrml', "'utf-8', 'A4'");

            //generate the PDF from the given html
            $this->m_pdf_nrml->pdf->WriteHTML($html);

            //download it.
            $this->m_pdf_nrml->pdf->Output($pdfFilePath, "I");
        } else {
            $this->load->view('teacher/all_teacher_review_details', $data);
        }

        //$this->load->view('all_course_review_details', $data);
    }

    public function getCourseForTeacherReview(){
        $data['res'] = $this->admin_model->getCourseListForTeacherReview($this->input->post('y'));
        echo json_encode($data);
    }
    public function getTeacherForTeacherReview(){
        $data['res'] = $this->admin_model->getTeacherListForTeacherReview($this->input->post('c'));
        echo json_encode($data);
    }
    //////teacher review   end//////


    public function yearly_details()
    {
        $cur_y = date('Y');
        $cur_m = date('m');

        if ($cur_m <= 6) {
            $data['curr_y'] = ($cur_y - 1) . '-' . $cur_y;
        } else {
            $data['curr_y'] = $cur_y . '-' . ($cur_y + 1);
        }
        $data['course'] = $this->admin_model->get_course_details();
        $this->load->view('layouts/header');
        $this->load->view('yearly_show', $data);
        $this->load->view('layouts/footer');
    }


    function encryptIt($q)
    {
        $cryptKey = 'Lf6Q5htqdgnSn0AABqlsSddj1QNu0fJs';
        $qEncoded = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($cryptKey), $q, MCRYPT_MODE_CBC, md5(md5($cryptKey))));
        return ($qEncoded);
    }

    function decryptIt($q)
    {
        $cryptKey = 'Lf6Q5htqdgnSn0AABqlsSddj1QNu0fJs';
        $qDecoded = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($cryptKey), base64_decode($q), MCRYPT_MODE_CBC, md5(md5($cryptKey))), "\0");
        return ($qDecoded);
    }


    /***************************************************************************************************/
    /******************************************LOGIN START**********************************************/
    /***************************************************************************************************/

    public function change_password()
    {
        $uname = $this->session->userdata('reg_id');

        $pass = $this->encryptIt($this->input->post('pass_change'));

        //$this->load->view('formsuccess');
        $data['password'] = $pass;
        $this->doc_model->password_change($data, $uname);
        redirect('admin/index', 'refresh');

    }

    /*
        public function change_login_info()
        {
            $path = base_url() . '/assets/file/admin_reg.txt';
            $mdata = file_get_contents($path);
            $mData = explode('//', $mdata);
            $data['email'] = $mData[0];
            $data['pass'] = $mData[1];

            $this->load->view('layouts/header');
            $this->load->view('layouts/footer');

            $this->load->view('password/change_login_info', $data);

        }

        public function add_login_change()
        {
            $email = $this->input->post('email');
            $pass = $this->input->post('n_pass');

            $content = $email . '//' . $pass;
            //echo $content;

            //read_file('assets/file/admin_reg.txt');
            write_file('assets/file/admin_reg.txt', $content);

            redirect('admin', 'refresh');
        }*/

    public function change_login_info()
    {
        $admin_info = $this->admin_model->getWhere('*', 'login_id=' . $this->session->userdata('login_id'), 'admin_login');
        $data['email'] = $admin_info[0]['email'];
        $data['pass'] = $admin_info[0]['password'];

        $this->load->view('layouts/header');
        $this->load->view('layouts/footer');

        $this->load->view('password/change_login_info', $data);

    }

    public function add_login_change()
    {
        $admin_info = $this->admin_model->getWhere('*', 'login_id=' . $this->session->userdata('login_id'), 'admin_login');

        if ($admin_info[0]['password'] == md5($this->input->post('c_pass'))) {
            $data['email'] = $this->input->post('email');
            $data['password'] = md5($this->input->post('n_pass'));

            $this->admin_model->update_function('login_id', $this->session->userdata('login_id'), 'admin_login', $data);

            $this->session->set_flashdata('message', 'পাসওয়ার্ডটি সফলভাবে পরিবর্তন করা হয়েছে');
            redirect('admin/change_login_info');
        } else {
            $this->session->set_flashdata('message', 'বর্তমান পাসওয়ার্ড সঠিকভাবে প্রদান করুন');
            redirect('admin/change_login_info');
        }
    }

    /***************************************************************************************************/
    /******************************************LOGIN ENDS**********************************************/
    /***************************************************************************************************/


    /***************************************************************************************************/
    /******************************************PPUBLIC VIEW INFO START**********************************/
    /***************************************************************************************************/
    public function add_information($flag)
    {
        if ($flag == 'about_us') {
            $data['page_title'] = 'প্রতিষ্ঠান সম্পর্কে';
            $data['type'] = 1;
            $data['info'] = $this->admin_model->getWhere('*', 'info_type=1', 'information');///1=about_us
            $this->load->view('layouts/header', $data);
            $this->load->view('information/add');
        } elseif ($flag == 'our_mission') {
            $data['page_title'] = 'আমাদের রূপকল্প';
            $data['type'] = 2;
            $data['info'] = $this->admin_model->getWhere('*', 'info_type=2', 'information');///2=mission
            $this->load->view('layouts/header', $data);
            $this->load->view('information/add');
        } elseif ($flag == 'our_vision') {
            $data['page_title'] = 'আমাদের অভিলক্ষ্য';
            $data['type'] = 3;
            $data['info'] = $this->admin_model->getWhere('*', 'info_type=3', 'information');///3=vision
            $this->load->view('layouts/header', $data);
            $this->load->view('information/add');
        } elseif ($flag == 'our_achievement') {
            $data['page_title'] = 'আমাদের সাফল্য';
            $data['type'] = 4;
            $data['info'] = $this->admin_model->getWhere('*', 'info_type=4', 'information');///4=achievement
            $this->load->view('layouts/header', $data);
            $this->load->view('information/add');
        } elseif ($flag == 'facilities') {
            $data['page_title'] = 'বিদ্যমান সুবিধাসমূহ';
            $data['type'] = 5;
            $data['info'] = $this->admin_model->getWhere('*', 'info_type=5', 'information');///5=facilities
            $this->load->view('layouts/header', $data);
            $this->load->view('information/add');
        } elseif ($flag == 'service') {
            $data['page_title'] = 'সেবাসমূহ';
            $data['type'] = 6;
            $data['info'] = $this->admin_model->getWhere('*', 'info_type=6', 'information');///6=service
            $this->load->view('layouts/header', $data);
            $this->load->view('information/add');
        } elseif ($flag == 'stockholder') {
            $data['page_title'] = 'আমাদের সেবাগ্রহীতা ও স্টেকহোল্ডার';
            $data['type'] = 7;
            $data['info'] = $this->admin_model->getWhere('*', 'info_type=7', 'information');///7=stockholder
            $this->load->view('layouts/header', $data);
            $this->load->view('information/add');
        } elseif ($flag == 'communication') {
            $data['page_title'] = 'যোগাযোগ ও যাতায়াত';
            $data['type'] = 8;
            $data['info'] = $this->admin_model->getWhere('*', 'info_type=8', 'information');///8=communication
            $this->load->view('layouts/header', $data);
            $this->load->view('information/add');
        } elseif ($flag == 'structure') {
            $data['page_title'] = 'সাংগঠনিক কাঠামো';
            $data['type'] = 9;
            $data['info'] = $this->admin_model->getWhere('*', 'info_type=9', 'information');///9=structure
            $this->load->view('layouts/header', $data);
            $this->load->view('information/add');
        } else {

        }
    }

    public function add_information_post()
    {
        $msg = array('প্রতিষ্ঠান সম্পর্কে', 'আমাদের রূপকল্প', 'আমাদের অভিলক্ষ্য', 'আমাদের সাফল্য', 'বিদ্যমান সুবিধাসমূহ', 'সেবাসমূহ', 'আমাদের সেবাগ্রহীতা ও স্টেকহোল্ডার', 'যোগাযোগ ও যাতায়াত', 'সাংগঠনিক কাঠামো');
        if ($this->input->post('s_btn') == 'add') {
            $insrt['info_type'] = $this->input->post('type');
            $insrt['info_name'] = '';
            $insrt['info_details'] = $this->input->post('details');

            $this->admin_model->insert('information', $insrt);
            $this->session->set_flashdata('message', '"' . $msg[$this->input->post("type") - 1] . '" সফলভাবে সংযোজন করা হয়েছে');
        } elseif ($this->input->post('s_btn') == 'up') {
            $insrt['info_details'] = $this->input->post('details');
            $this->admin_model->update_function('info_type', $this->input->post('type'), 'information', $insrt);
            $this->session->set_flashdata('message', '"' . $msg[$this->input->post("type") - 1] . '" সফলভাবে আপডেট করা হয়েছে');
        }

        if ($this->input->post('type') == 1) {
            redirect('admin/add_information/about_us');
        } elseif ($this->input->post('type') == 2) {
            redirect('admin/add_information/our_mission');
        } elseif ($this->input->post('type') == 3) {
            redirect('admin/add_information/our_vision');
        } elseif ($this->input->post('type') == 4) {
            redirect('admin/add_information/our_achievement');
        } elseif ($this->input->post('type') == 5) {
            redirect('admin/add_information/facilities');
        } elseif ($this->input->post('type') == 6) {
            redirect('admin/add_information/service');
        } elseif ($this->input->post('type') == 7) {
            redirect('admin/add_information/stockholder');
        } elseif ($this->input->post('type') == 8) {
            redirect('admin/add_information/communication');
        } elseif ($this->input->post('type') == 9) {
            redirect('admin/add_information/structure');
        }
    }

    public function partner()
    {
        $data['page_title'] = 'পার্টনার';
        $data['partner_info'] = $this->home_model->getWhereOrder('*', 'status=1', 'partner', 'id', 'desc');

        $this->load->view('layouts/header', $data);
        $this->load->view('information/partner');
    }

    public function add_partner_post()
    {
        if ($_POST) {
            $insrt['name'] = $this->input->post('p_name');
            $insrt['logo'] = 'no_img.png';

            $id = $this->admin_model->insert_ret('partner', $insrt);

            $i_ext = explode('.', $_FILES['p_logo']['name']);
            $target_path = 'partner_' . $id . '.' . end($i_ext);
            if (move_uploaded_file($_FILES['p_logo']['tmp_name'], 'uploads/partner/' . $target_path)) {
                $data_img['logo'] = $target_path;
            }
            $this->admin_model->update_function('id', $id, 'partner', $data_img);

            $this->session->set_flashdata('message', 'কার্যক্রমটি সফল হয়েছে');
            redirect('admin/partner');
        } else {
            redirect('admin');
        }
    }

    public function delete_partner($id)
    {
        if ($id) {
            $tEmp = $this->admin_model->getWhere('*', 'id=' . $id, 'partner');
            $path_to_file = './uploads/partner/' . $tEmp[0]['logo'];
            unlink($path_to_file);
            $this->admin_model->delete_function('partner', 'id', $id);
            $this->session->set_flashdata('message', 'কার্যক্রমটি সফল হয়েছে');
            redirect('admin/partner');
        } else {
            redirect('admin');
        }
    }

    public function team()
    {
        $data['page_title'] = 'টিম';
        $data['team_info'] = $this->admin_model->getTeam();
        //echo '<pre>'; print_r($data); die()
        $this->load->view('layouts/header', $data);
        $this->load->view('information/team');
    }

    public function add_employee()
    {
        $data['page_title'] = 'টিম এর সদস্য সংযোজন';
        $data['des'] = $this->admin_model->getWhere('*', 'status=1', 'des_cat');

        $this->load->view('layouts/header', $data);
        $this->load->view('information/add_emp');
    }

    public function add_emp_post()
    {
        $insrt['emp_name'] = $this->input->post('user_name');
        $insrt['emp_pic'] = '';
        $insrt['emp_details'] = $this->input->post('details');
        $insrt['des_cat_id'] = $this->input->post('classification');
        $insrt['emp_phn'] = $this->input->post('mobile');
        $insrt['emp_designation'] = $this->input->post('dsgntn');

        $id = $this->admin_model->insert_ret('employee', $insrt);

        $i_ext = explode('.', $_FILES['e_img']['name']);
        $target_path = 'emp_' . $id . '.' . end($i_ext);
        if (move_uploaded_file($_FILES['e_img']['tmp_name'], 'uploads/emp/' . $target_path)) {
            $data_img['emp_pic'] = $target_path;
        }
        $this->admin_model->update_function('emp_id', $id, 'employee', $data_img);

        $this->session->set_flashdata('message', 'সদস্য সংযোজন সফল হয়েছে');
        redirect('admin/team');
    }

    public function delete_employee($id)
    {
        if ($id) {
            $tEmp = $this->admin_model->getWhere('*', 'emp_id=' . $id, 'employee');
            $path_to_file = './uploads/emp/' . $tEmp[0]['emp_pic'];
            unlink($path_to_file);
            $this->admin_model->delete_function('employee', 'emp_id', $id);
            $this->session->set_flashdata('message', 'সদস্য বাতিল সম্পন্ন হয়েছে');
            redirect('admin/team');
        }
    }

    public function employee_status_change($id)
    {
        if ($id) {
            $tEmp = $this->admin_model->getWhere('*', 'emp_id=' . $id, 'employee');
            if ($tEmp[0]['emp_status'] == 0) {
                $data_st['emp_status'] = 1;
            } else {
                $data_st['emp_status'] = 0;
            }
            $this->admin_model->update_function('emp_id', $id, 'employee', $data_st);
            $this->session->set_flashdata('message', 'সদস্যের স্ট্যাটাস পরিবর্তন সফল হয়েছে');
            redirect('admin/team');
        }
    }

    public function edit_employee($id)
    {
        $data['page_title'] = 'সদস্যের তথ্য সংশোধন';
        $data['des'] = $this->admin_model->getAllRecords('des_cat');
        $data['mem_info'] = $this->admin_model->getWhere('*', 'emp_id=' . $id, 'employee');

        $this->load->view('layouts/header', $data);
        $this->load->view('information/edit_emp');
    }

    public function edit_emp_post()
    {
        $id = $this->input->post('emp_id');
        $insrt['emp_name'] = $this->input->post('user_name');
        $insrt['emp_details'] = $this->input->post('details');
        $insrt['des_cat_id'] = $this->input->post('classification');
        $insrt['emp_phn'] = $this->input->post('mobile');
        $insrt['emp_designation'] = $this->input->post('dsgntn');

        $this->admin_model->update_function('emp_id', $id, 'employee', $insrt);

        if ($this->input->post('isIMG') == 1) {
            $i_ext = explode('.', $_FILES['e_img']['name']);
            $target_path = 'emp_' . $id . '.' . end($i_ext);
            if (move_uploaded_file($_FILES['e_img']['tmp_name'], 'uploads/emp/' . $target_path)) {
                $data_img['emp_pic'] = $target_path;
            }
            $this->admin_model->update_function('emp_id', $id, 'employee', $data_img);
        }

        $this->session->set_flashdata('message', 'সদস্য আপডেট সফল হয়েছে');
        redirect('admin/team');
    }

    public function demand()
    {
        $data['page_title'] = 'চাহিদাসমূহ';
        $data['all_demand'] = $this->admin_model->getDemand();

        //echo '<pre>'; print_r($data); die();
        $this->load->view('layouts/header', $data);
        $this->load->view('demand');
    }

    public function demand_reply()
    {
        if ($_POST) {
            $id = $this->input->post('demand_id');
            $d['demand_status'] = 1;
            $d['demand_reply'] = $this->input->post('reply');
            $d['demand_reply_at'] = date('Y-m-d');
            $d['demand_reply_by'] = 1;
            $this->admin_model->update_function('demand_id', $id, 'demand_info', $d);

            $get_email = $this->input->post('idea_sender_email');
            if ($get_email != null || $get_email != '') {
                $subject = 'CZI KHULNA';
                $messag = '<html><body>';
                $messag .= '<p>' . $this->input->post('reply') . '</p>';
                $messag .= '</body></html>';

                $config = Array(
                    'protocol' => 'smtp',
                    'smtp_host' => 'gator3294.hostgator.com',
                    'smtp_port' => 465,
                    'smtp_user' => 'admin@czikhulna.com',
                    'smtp_pass' => 'pass(info)',
                    'mailtype' => 'html',
                    'charset' => 'iso-8859-1'
                );

                $this->load->library('email', $config);
                $this->email->set_newline("\r\n");
                $this->email->from('admin@czikhulna.com', 'CZIKHULNA');
                $this->email->to($get_email);
                $base = $this->config->base_url();
                $this->email->subject($subject);
                $this->email->message($messag);

                $this->email->set_mailtype('html');

                $this->email->send();
            }

            $this->session->set_flashdata('message', 'কার্যক্রমটি সফল হয়েছে');
            redirect('admin/demand');
        }
    }

    public function demand_pdf()
    {
        $data['all_demand'] = $this->admin_model->getDemand();
        $html = $this->load->view('report/user_demand_pdf', $data, true);

        //this the the PDF filename that user will get to download
        $pdfFilePath = "output_pdf_name.pdf";

        //load mPDF library
        $this->load->library('m_pdf', "'utf-8', 'A4'");

        //generate the PDF from the given html
        $this->m_pdf->pdf->WriteHTML($html);

        //download it.
        $this->m_pdf->pdf->Output($pdfFilePath, "I");

    }

    public function notice()
    {
        $data['page_title'] = 'নোটিশসমূহ';
        $data['all_notice'] = $this->home_model->getWhereOrder('*', 'notice_status=1', 'notice', 'notice_id', 'desc');

        $this->load->view('layouts/header', $data);
        $this->load->view('notice/notice_list');
    }

    public function add_notice()
    {
        $data['page_title'] = 'নোটিশ সংযোজন';

        $this->load->view('layouts/header', $data);
        $this->load->view('notice/add_notice');
    }

    public function add_notice_post()
    {
        if ($_POST) {
            $d['notice_title'] = $this->input->post('notice_title');
            $d['notice_details'] = $this->input->post('notice_details');
            $d['notice_date'] = date('Y-m-d');
            $d['notice_added_by'] = 1;
            $this->admin_model->insert('notice', $d);

            $this->session->set_flashdata('message', 'কার্যক্রমটি সফল হয়েছে');
            redirect('admin/notice');
        } else {
            $this->session->set_flashdata('message', 'অনুগ্রহ করে সর্বপ্রথম নোটিশ সংযোজন করুন');
            redirect('admin/add_notice');
        }
    }

    public function notice_details($id)
    {
        $data['page_title'] = 'নোটিশ সংশোধন';
        $data['notice_info'] = $this->admin_model->getWhere('*', 'notice_id=' . $id, 'notice');

        $this->load->view('layouts/header', $data);
        $this->load->view('notice/notice_details');
    }

    public function edit_notice_post()
    {
        if ($_POST) {
            $id = $this->input->post('notice_id');
            $d['notice_title'] = $this->input->post('notice_title');
            $d['notice_details'] = $this->input->post('notice_details');

            $this->admin_model->update_function('notice_id', $id, 'notice', $d);

            $this->session->set_flashdata('message', 'কার্যক্রমটি সফল হয়েছে');
            redirect('admin/notice');
        } else {
            $this->session->set_flashdata('message', 'অনুগ্রহ করে সর্বপ্রথম নোটিশ সংযোজন করুন');
            redirect('admin/add_notice');
        }
    }

    public function idea()
    {
        $data['page_title'] = 'মতামতসমূহ';
        $data['all_idea'] = $this->admin_model->getIdea(0);//0=all
        //$data['new_idea'] = $this->admin_model->getIdea(1);//1=new
        //$data['approved_idea'] = $this->admin_model->getIdea(2);///2=approved
        //$data['reject_idea'] = $this->admin_model->getIdea(3);//3=reject

        $this->load->view('layouts/header', $data);
        $this->load->view('idea');
    }

    public function idea_status_change()
    {
        if ($this->uri->segment(3) && $this->uri->segment(4)) {
            $d['idea_status'] = $this->uri->segment(4);
            $this->admin_model->update_function('idea_id', $this->uri->segment(3), 'idea_info', $d);

            if ($this->uri->segment(4) == 2) {
                $this->session->set_flashdata('message', 'আইডিয়াটি অনুমোদন করা হয়েছে');
            } elseif ($this->uri->segment(4) == 3) {
                $this->session->set_flashdata('message', 'আইডিয়াটি  বাতিল করা হয়েছে');
            }

            redirect('admin/idea');
        }
    }

    public function idea_reply()
    {
        if ($_POST) {
            $id = $this->input->post('idea_id');
            $d['idea_status'] = 2;
            $d['idea_reply'] = $this->input->post('reply');
            $d['idea_reply_at'] = date('Y-m-d');
            $d['idea_reply_by'] = 1;
            $this->admin_model->update_function('idea_id', $id, 'idea_info', $d);

            $get_email = $this->input->post('idea_sender_email');
            if ($get_email != null || $get_email != '') {
                $subject = 'CZI KHULNA';
                $messag = '<html><body>';
                $messag .= '<p>' . $this->input->post('reply') . '</p>';
                $messag .= '</body></html>';

                $config = Array(
                    'protocol' => 'smtp',
                    'smtp_host' => 'gator3294.hostgator.com',
                    'smtp_port' => 465,
                    'smtp_user' => 'admin@czikhulna.com',
                    'smtp_pass' => 'pass(info)',
                    'mailtype' => 'html',
                    'charset' => 'iso-8859-1'
                );

                $this->load->library('email', $config);
                $this->email->set_newline("\r\n");
                $this->email->from('admin@czikhulna.com', 'CZIKHULNA');
                $this->email->to($get_email);
                $base = $this->config->base_url();
                $this->email->subject($subject);
                $this->email->message($messag);

                $this->email->set_mailtype('html');

                $this->email->send();
            }

            $this->session->set_flashdata('message', 'কার্যক্রমটি সফল হয়েছে');
            redirect('admin/idea');
        }
    }

    public function teacher_review_course()
    {
        $data['page_title'] = 'কোর্স অনুযায়ী প্রশিক্ষণার্থীর বক্তা/প্রশিক্ষক মূল্যায়ন';
        $data['course'] = $this->admin_model->getEndCrse();
        $data['teacher'] = $this->admin_model->getWhere('*', 'course_id=' . $data['course'][0]['id'], 'teacher_course_rel');

        //echo '<pre>'; print_r($data); die();
        $this->load->view('layouts/header', $data);
        $this->load->view('teacher/review_list');
    }

    public function idea_pdf()
    {
        $type = $this->uri->segment(3);
        if ($type) {
            if ($type == 'new') {
                $data['ideas'] = $this->admin_model->getIdea(1);
                $data['type'] = 'নতুন';
            } elseif ($type == 'approved') {
                $data['ideas'] = $this->admin_model->getIdea(2);
                $data['type'] = 'অনুমোদিত';
            } elseif ($type == 'reject') {
                $data['ideas'] = $this->admin_model->getIdea(3);
                $data['type'] = 'বাতিল';
            } else {
                $data['ideas'] = $this->admin_model->getIdea(0);
                $data['type'] = 'সকল';

            }

            //$this->load->view('all_course_details_pdf', $data);
            $html = $this->load->view('report/remark_n_suggestion_pdf', $data, true);

            //this the the PDF filename that user will get to download
            $pdfFilePath = "output_pdf_name.pdf";

            //load mPDF library
            $this->load->library('m_pdf', "'utf-8', 'A4'");

            //generate the PDF from the given html
            $this->m_pdf->pdf->WriteHTML($html);

            //download it.
            $this->m_pdf->pdf->Output($pdfFilePath, "I");
        }
    }

    public function course_request()
    {
        $data['page_title'] = 'অনলাইনে প্রাপ্ত আবেদনপত্র তালিকা';
        $data['allReq'] = $this->admin_model->getRequestInfo();

        //echo '<pre>'; print_r($data); die();
        $this->load->view('layouts/header', $data);
        $this->load->view('courseReq');
    }

    public function getCourseInfo()
    {
        $c_id = $this->input->post('id');
        $data['crseInfo'] = $this->admin_model->get_course_info3($c_id);
        $data['typeofstudent'] = $this->admin_model->get_gender($c_id);
        $data['get_avg_review'] = $this->admin_model->get_avg_review($c_id);
        if ($data['get_avg_review'][0]['avg'] == null) {
            $data['get_avg_review'][0]['avg'] = 0;
        }
        $data['trainee'] = $this->admin_model->get_user_info($c_id);
        echo json_encode($data);
    }

    public function addToCourse()
    {
        if ($this->uri->segment(3) && $this->uri->segment(4) && $this->uri->segment(5)) {
            $review['course_id'] = $this->uri->segment(3);
            $review['user_id'] = $this->uri->segment(4);
            $review['created_at'] = date('Y-m-d');
            $this->admin_model->insert('review_info', $review);

            $teacher = $this->admin_model->getWhere('*', 'course_id=' . $review['course_id'], 'teacher_course_rel'); ////01-02-2017
            if (sizeof($teacher) != 0) {   ////01-02-2017
                foreach ($teacher as $t) {   ////01-02-2017
                    $tec['course_id'] = $review['course_id'];    ////01-02-2017
                    $tec['teacher_id'] = $t['teacher_id'];    ////01-02-2017
                    $tec['user_id'] = $review['user_id'];    ////01-02-2017
                    $this->admin_model->insert('teacher_review_info', $tec);   ////01-02-2017
                    $this->admin_model->insert('temp_teacher_review', $tec);   ////01-02-2017
                }    ////01-02-2017
            }    ////01-02-2017

            $crse['total_student'] = $this->admin_model->getWhere('total_student', 'id=' . $this->uri->segment(3), 'course_info')[0]['total_student'] + 1;

            $this->admin_model->update_function('id', $this->uri->segment(3), 'course_info', $crse);

            $tempSourse['status'] = 2;
            $this->admin_model->update_function('id', $this->uri->segment(5), 'temp_user_crse', $tempSourse);

            $this->session->set_flashdata('message', 'কোর্সে প্রশিক্ষণার্থী সংযোজন সফল হয়েছে');
            redirect('admin/course_request');
        }
    }

    public function removeFromCourse()
    {
        if ($this->uri->segment(3)) {
            $tempSourse['status'] = 3;
            $this->admin_model->update_function('id', $this->uri->segment(3), 'temp_user_crse', $tempSourse);

            $this->session->set_flashdata('message', 'অনুরোধটি বাতিল সম্পন্ন হয়েছে');
            redirect('admin/course_request');
        }
    }

    public function apa_submit()
    {
        $bn_digits = array('০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯');
        $en_digits = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9');

        if ($_POST) {

            if ($this->input->post('submit') == 'add') {
                $dataApa['apa_year'] = $this->input->post('year');
                $dataApa['created_at'] = $this->input->post('year');

                $all_crs = $this->input->post('all_crs');
                $dataApa['sub_id'] = 1;
                foreach ($all_crs as $k => $row) {
                    if ($k >= 0 && $k <= 2) {
                        $dataApa['donor_type'] = 1;
                    } elseif ($k >= 3 && $k <= 5) {
                        $dataApa['donor_type'] = 2;
                    } elseif ($k >= 6 && $k <= 8) {
                        $dataApa['donor_type'] = 3;
                    }
                    if ($k == 0 || $k == 3 || $k == 6) {
                        $dataApa['type'] = 1;
                    } elseif ($k == 1 || $k == 4 || $k == 7) {
                        $dataApa['type'] = 2;
                    } elseif ($k == 2 || $k == 5 || $k == 8) {
                        $dataApa['type'] = 3;
                    }
                    $dataApa['apa_value'] = str_replace($bn_digits, $en_digits, $row);

                    $this->admin_model->insert('apa_info', $dataApa);
                }

                $all_trainee = $this->input->post('all_trainee');
                $dataApa['sub_id'] = 2;
                foreach ($all_trainee as $k => $row) {
                    if ($k >= 0 && $k <= 2) {
                        $dataApa['donor_type'] = 1;
                    } elseif ($k >= 3 && $k <= 5) {
                        $dataApa['donor_type'] = 2;
                    } elseif ($k >= 6 && $k <= 8) {
                        $dataApa['donor_type'] = 3;
                    }
                    if ($k == 0 || $k == 3 || $k == 6) {
                        $dataApa['type'] = 1;
                    } elseif ($k == 1 || $k == 4 || $k == 7) {
                        $dataApa['type'] = 2;
                    } elseif ($k == 2 || $k == 5 || $k == 8) {
                        $dataApa['type'] = 3;
                    }
                    $dataApa['apa_value'] = str_replace($bn_digits, $en_digits, $row);

                    $this->admin_model->insert('apa_info', $dataApa);
                }

                $govt = $this->input->post('govt');
                $dataApa['sub_id'] = 3;
                foreach ($govt as $k => $row) {
                    if ($k >= 0 && $k <= 2) {
                        $dataApa['donor_type'] = 1;
                    } elseif ($k >= 3 && $k <= 5) {
                        $dataApa['donor_type'] = 2;
                    } elseif ($k >= 6 && $k <= 8) {
                        $dataApa['donor_type'] = 3;
                    }
                    if ($k == 0 || $k == 3 || $k == 6) {
                        $dataApa['type'] = 1;
                    } elseif ($k == 1 || $k == 4 || $k == 7) {
                        $dataApa['type'] = 2;
                    } elseif ($k == 2 || $k == 5 || $k == 8) {
                        $dataApa['type'] = 3;
                    }
                    $dataApa['apa_value'] = str_replace($bn_digits, $en_digits, $row);

                    $this->admin_model->insert('apa_info', $dataApa);
                }

                $somiti = $this->input->post('somiti');
                $dataApa['sub_id'] = 4;
                foreach ($somiti as $k => $row) {
                    if ($k >= 0 && $k <= 2) {
                        $dataApa['donor_type'] = 1;
                    } elseif ($k >= 3 && $k <= 5) {
                        $dataApa['donor_type'] = 2;
                    } elseif ($k >= 6 && $k <= 8) {
                        $dataApa['donor_type'] = 3;
                    }
                    if ($k == 0 || $k == 3 || $k == 6) {
                        $dataApa['type'] = 1;
                    } elseif ($k == 1 || $k == 4 || $k == 7) {
                        $dataApa['type'] = 2;
                    } elseif ($k == 2 || $k == 5 || $k == 8) {
                        $dataApa['type'] = 3;
                    }
                    $dataApa['apa_value'] = str_replace($bn_digits, $en_digits, $row);

                    $this->admin_model->insert('apa_info', $dataApa);
                }

                $other = $this->input->post('other');
                $dataApa['sub_id'] = 5;
                foreach ($other as $k => $row) {
                    if ($k >= 0 && $k <= 2) {
                        $dataApa['donor_type'] = 1;
                    } elseif ($k >= 3 && $k <= 5) {
                        $dataApa['donor_type'] = 2;
                    } elseif ($k >= 6 && $k <= 8) {
                        $dataApa['donor_type'] = 3;
                    }
                    if ($k == 0 || $k == 3 || $k == 6) {
                        $dataApa['type'] = 1;
                    } elseif ($k == 1 || $k == 4 || $k == 7) {
                        $dataApa['type'] = 2;
                    } elseif ($k == 2 || $k == 5 || $k == 8) {
                        $dataApa['type'] = 3;
                    }
                    $dataApa['apa_value'] = str_replace($bn_digits, $en_digits, $row);

                    $this->admin_model->insert('apa_info', $dataApa);
                }

                $iga = $this->input->post('iga');
                $dataApa['sub_id'] = 6;
                foreach ($iga as $k => $row) {
                    if ($k >= 0 && $k <= 2) {
                        $dataApa['donor_type'] = 1;
                    } elseif ($k >= 3 && $k <= 5) {
                        $dataApa['donor_type'] = 2;
                    } elseif ($k >= 6 && $k <= 8) {
                        $dataApa['donor_type'] = 3;
                    }
                    if ($k == 0 || $k == 3 || $k == 6) {
                        $dataApa['type'] = 1;
                    } elseif ($k == 1 || $k == 4 || $k == 7) {
                        $dataApa['type'] = 2;
                    } elseif ($k == 2 || $k == 5 || $k == 8) {
                        $dataApa['type'] = 3;
                    }
                    $dataApa['apa_value'] = str_replace($bn_digits, $en_digits, $row);

                    $this->admin_model->insert('apa_info', $dataApa);
                }

                $man = $this->input->post('man');
                $dataApa['sub_id'] = 7;
                foreach ($man as $k => $row) {
                    if ($k >= 0 && $k <= 2) {
                        $dataApa['donor_type'] = 1;
                    } elseif ($k >= 3 && $k <= 5) {
                        $dataApa['donor_type'] = 2;
                    } elseif ($k >= 6 && $k <= 8) {
                        $dataApa['donor_type'] = 3;
                    }
                    if ($k == 0 || $k == 3 || $k == 6) {
                        $dataApa['type'] = 1;
                    } elseif ($k == 1 || $k == 4 || $k == 7) {
                        $dataApa['type'] = 2;
                    } elseif ($k == 2 || $k == 5 || $k == 8) {
                        $dataApa['type'] = 3;
                    }
                    $dataApa['apa_value'] = str_replace($bn_digits, $en_digits, $row);

                    $this->admin_model->insert('apa_info', $dataApa);
                }

                $data['curr_y'] = $this->input->post('year');

                $this->session->flashdata('message', 'এপিএ  লক্ষ্যমাত্রা সফল ভাবে সংযোজন করা হয়েছে ');

            } elseif ($this->input->post('submit') == 'update') {
                $whr = '';
                $apa_year = $this->input->post('year');

                $all_crs = $this->input->post('all_crs');
                $sub_id = 1;

                foreach ($all_crs as $k => $row) {
                    $whr = ' apa_year="' . $apa_year . '"';
                    $whr .= ' and sub_id="' . $sub_id . '"';
                    if ($k >= 0 && $k <= 2) {
                        $donor_type = 1;
                    } elseif ($k >= 3 && $k <= 5) {
                        $donor_type = 2;
                    } elseif ($k >= 6 && $k <= 8) {
                        $donor_type = 3;
                    }
                    $whr .= ' and donor_type="' . $donor_type . '"';
                    if ($k == 0 || $k == 3 || $k == 6) {
                        $type = 1;
                    } elseif ($k == 1 || $k == 4 || $k == 7) {
                        $type = 2;
                    } elseif ($k == 2 || $k == 5 || $k == 8) {
                        $type = 3;
                    }
                    $whr .= ' and type="' . $type . '"';

                    $updateApa['apa_value'] = str_replace($bn_digits, $en_digits, $row);

                    $this->admin_model->update_function_cond($whr, 'apa_info', $updateApa);
                }

                $all_trainee = $this->input->post('all_trainee');
                $sub_id = 2;
                foreach ($all_trainee as $k => $row) {
                    $whr = ' apa_year="' . $apa_year . '"';
                    $whr .= ' and sub_id="' . $sub_id . '"';
                    if ($k >= 0 && $k <= 2) {
                        $donor_type = 1;
                    } elseif ($k >= 3 && $k <= 5) {
                        $donor_type = 2;
                    } elseif ($k >= 6 && $k <= 8) {
                        $donor_type = 3;
                    }
                    $whr .= ' and donor_type="' . $donor_type . '"';
                    if ($k == 0 || $k == 3 || $k == 6) {
                        $type = 1;
                    } elseif ($k == 1 || $k == 4 || $k == 7) {
                        $type = 2;
                    } elseif ($k == 2 || $k == 5 || $k == 8) {
                        $type = 3;
                    }
                    $whr .= ' and type="' . $type . '"';

                    $updateApa['apa_value'] = str_replace($bn_digits, $en_digits, $row);

                    $this->admin_model->update_function_cond($whr, 'apa_info', $updateApa);
                }

                $govt = $this->input->post('govt');
                $sub_id = 3;
                foreach ($govt as $k => $row) {
                    $whr = ' apa_year="' . $apa_year . '"';
                    $whr .= ' and sub_id="' . $sub_id . '"';
                    if ($k >= 0 && $k <= 2) {
                        $donor_type = 1;
                    } elseif ($k >= 3 && $k <= 5) {
                        $donor_type = 2;
                    } elseif ($k >= 6 && $k <= 8) {
                        $donor_type = 3;
                    }
                    $whr .= ' and donor_type="' . $donor_type . '"';
                    if ($k == 0 || $k == 3 || $k == 6) {
                        $type = 1;
                    } elseif ($k == 1 || $k == 4 || $k == 7) {
                        $type = 2;
                    } elseif ($k == 2 || $k == 5 || $k == 8) {
                        $type = 3;
                    }
                    $whr .= ' and type="' . $type . '"';

                    $updateApa['apa_value'] = str_replace($bn_digits, $en_digits, $row);

                    $this->admin_model->update_function_cond($whr, 'apa_info', $updateApa);
                }

                $somiti = $this->input->post('somiti');
                $sub_id = 4;
                foreach ($somiti as $k => $row) {
                    $whr = ' apa_year="' . $apa_year . '"';
                    $whr .= ' and sub_id="' . $sub_id . '"';

                    if ($k >= 0 && $k <= 2) {
                        $donor_type = 1;
                    } elseif ($k >= 3 && $k <= 5) {
                        $donor_type = 2;
                    } elseif ($k >= 6 && $k <= 8) {
                        $donor_type = 3;
                    }
                    $whr .= ' and donor_type="' . $donor_type . '"';
                    if ($k == 0 || $k == 3 || $k == 6) {
                        $type = 1;
                    } elseif ($k == 1 || $k == 4 || $k == 7) {
                        $type = 2;
                    } elseif ($k == 2 || $k == 5 || $k == 8) {
                        $type = 3;
                    }
                    $whr .= ' and type="' . $type . '"';

                    $updateApa['apa_value'] = str_replace($bn_digits, $en_digits, $row);

                    $this->admin_model->update_function_cond($whr, 'apa_info', $updateApa);
                }

                $other = $this->input->post('other');
                $sub_id = 5;
                foreach ($other as $k => $row) {
                    $whr = ' apa_year="' . $apa_year . '"';
                    $whr .= ' and sub_id="' . $sub_id . '"';
                    if ($k >= 0 && $k <= 2) {
                        $donor_type = 1;
                    } elseif ($k >= 3 && $k <= 5) {
                        $donor_type = 2;
                    } elseif ($k >= 6 && $k <= 8) {
                        $donor_type = 3;
                    }
                    $whr .= ' and donor_type="' . $donor_type . '"';
                    if ($k == 0 || $k == 3 || $k == 6) {
                        $type = 1;
                    } elseif ($k == 1 || $k == 4 || $k == 7) {
                        $type = 2;
                    } elseif ($k == 2 || $k == 5 || $k == 8) {
                        $type = 3;
                    }
                    $whr .= ' and type="' . $type . '"';

                    $updateApa['apa_value'] = str_replace($bn_digits, $en_digits, $row);

                    $this->admin_model->update_function_cond($whr, 'apa_info', $updateApa);
                }

                $iga = $this->input->post('iga');
                $sub_id = 6;
                foreach ($iga as $k => $row) {
                    $whr = ' apa_year="' . $apa_year . '"';
                    $whr .= ' and sub_id="' . $sub_id . '"';
                    if ($k >= 0 && $k <= 2) {
                        $donor_type = 1;
                    } elseif ($k >= 3 && $k <= 5) {
                        $donor_type = 2;
                    } elseif ($k >= 6 && $k <= 8) {
                        $donor_type = 3;
                    }
                    $whr .= ' and donor_type="' . $donor_type . '"';
                    if ($k == 0 || $k == 3 || $k == 6) {
                        $type = 1;
                    } elseif ($k == 1 || $k == 4 || $k == 7) {
                        $type = 2;
                    } elseif ($k == 2 || $k == 5 || $k == 8) {
                        $type = 3;
                    }
                    $whr .= ' and type="' . $type . '"';

                    $updateApa['apa_value'] = str_replace($bn_digits, $en_digits, $row);

                    $this->admin_model->update_function_cond($whr, 'apa_info', $updateApa);
                }

                $man = $this->input->post('man');
                $sub_id = 7;
                foreach ($man as $k => $row) {
                    $whr = ' apa_year="' . $apa_year . '"';
                    $whr .= ' and sub_id="' . $sub_id . '"';
                    if ($k >= 0 && $k <= 2) {
                        $donor_type = 1;
                    } elseif ($k >= 3 && $k <= 5) {
                        $donor_type = 2;
                    } elseif ($k >= 6 && $k <= 8) {
                        $donor_type = 3;
                    }
                    $whr .= ' and donor_type="' . $donor_type . '"';
                    if ($k == 0 || $k == 3 || $k == 6) {
                        $type = 1;
                    } elseif ($k == 1 || $k == 4 || $k == 7) {
                        $type = 2;
                    } elseif ($k == 2 || $k == 5 || $k == 8) {
                        $type = 3;
                    }
                    $whr .= ' and type="' . $type . '"';

                    $updateApa['apa_value'] = str_replace($bn_digits, $en_digits, $row);

                    $this->admin_model->update_function_cond($whr, 'apa_info', $updateApa);
                }

                $this->session->flashdata('message', 'এপিএ  লক্ষ্যমাত্রা সফল ভাবে আপডেট করা হয়েছে ');

            }
            redirect('admin/apa');
        }
    }

    public function getApaVal()
    {
        $data['res'] = $this->admin_model->getAPA($this->input->post('year'));
        echo json_encode($data);
    }

    public function apa()
    {

        $this->session->flashdata('message', 'uh');

        $data['page_title'] = 'এপিএ লক্ষ্যমাত্রা';

        $cur_y = date('Y');
        $cur_m = date('m');

        if ($cur_m <= 6) {
            $data['curr_y'] = ($cur_y - 1) . '-' . $cur_y;
        } else {
            $data['curr_y'] = $cur_y . '-' . ($cur_y + 1);
        }

        $data['apa_info'] = $this->admin_model->getAPA($data['curr_y']);

        $this->load->view('layouts/header', $data);
        $this->load->view('information/apa_show');
    }

    public function elearning_show()
    {
        $data['page_title'] = 'ই-লার্নিং';

        $data['e_learning'] = $this->admin_model->getElearning('all');

        $this->load->view('layouts/header', $data);
        $this->load->view('elearning/show');
    }

    public function new_elearning()
    {
        $data['page_title'] = 'ই-লার্নিং সংযোজন';

        $data['courses'] = $this->admin_model->getCourseForElearning();

        $this->load->view('layouts/header', $data);
        $this->load->view('elearning/add');
    }

    public function new_elearning_post()
    {
        //echo '<pre>'; print_r($_POST); print_r($_FILES); die();
        if ($_POST) {
            $e['c_id'] = $this->input->post('course');
            $e['syllabus'] = $this->input->post('syllabus');
            $e['details'] = $this->input->post('details');
            $e['video'] = $this->input->post('vdo_link');
            $e['ppt'] = '';
            $e['e_created_at'] = date('Y-m-d');

            $id = $this->admin_model->insert_ret('elearning', $e);

            if ($_FILES['power_point']['error'] == 0) {
                $i_ext = explode('.', $_FILES['power_point']['name']);
                $target_path = 'e_learning_' . $id . '.' . end($i_ext);
                if (move_uploaded_file($_FILES['power_point']['tmp_name'], 'uploads/e_learning/' . $target_path)) {
                    $data_img['ppt'] = $target_path;
                }
                $this->admin_model->update_function('e_id', $id, 'elearning', $data_img);
            }
            $this->session->set_userdata('message', 'কার্যক্রমটি সফল হয়েছে');
        } else {
            $this->session->set_userdata('message', 'অনুগ্রহ করে সঠিকভাবে ই-লার্নিং সংযোজন করুন');
        }
        redirect('admin/elearning_show');
    }

    public function elearning_status_change($id)
    {
        if ($id) {
            $tElearning = $this->admin_model->getWhere('*', 'e_id=' . $id, 'elearning');
            if ($tElearning[0]['e_status'] == 0) {
                $data_st['e_status'] = 1;
            } else {
                $data_st['e_status'] = 0;
            }
            $this->admin_model->update_function('e_id', $id, 'elearning', $data_st);
            $this->session->set_flashdata('message', 'কার্যক্রমটি সফল হয়েছে');
            redirect('admin/elearning_show');
        }
    }

    public function delete_elearning($id)
    {
        if ($id) {
            $tEmp = $this->admin_model->getWhere('*', 'e_id=' . $id, 'elearning');
            unlink("uploads/e_learning/".$tEmp[0]['ppt']);
            $this->admin_model->delete_function('elearning', 'e_id', $id);
            $this->session->set_flashdata('message', 'কার্যক্রমটি সফল হয়েছে');
            redirect('admin/elearning_show');
        } else {
            redirect('admin');
        }
    }

    public function gallery()
    {
        $data['page_title'] = 'গ্যালারি';

        $data['page_data'] = $this->admin_model->getAllRecords_order_by('gallery', 'id', 'desc');

        $this->load->view('layouts/header', $data);
        $this->load->view('gallery/lists');
    }

    public function add_gallery_post()
    {
        if ($_POST) {
            $insrt['details'] = $this->input->post('p_des');
            $insrt['name'] = 'no_img.png';
            $insrt['type'] = 1;
            $id = $this->admin_model->insert_ret('gallery', $insrt);

            $i_ext = explode('.', $_FILES['p_logo']['name']);
            $target_path = 'gallery_' . $id . '.' . end($i_ext);
            if (move_uploaded_file($_FILES['p_logo']['tmp_name'], 'uploads/gallery/thumbs/' . $target_path)) {
                $data_img['name'] = $target_path;
            }
            $this->admin_model->update_function('id', $id, 'gallery', $data_img);

            $this->session->set_flashdata('message', 'কার্যক্রমটি সফল হয়েছে');
            redirect('admin/gallery');
        } else {
            redirect('admin');
        }
    }

    public function delete_gallery($id)
    {
        if ($id) {
            $tEmp = $this->admin_model->getWhere('*', 'id=' . $id, 'gallery');
            if($tEmp[0]['type']==1){
                unlink("uploads/gallery/thumbs/".$tEmp[0]['name']);
            }
            $this->admin_model->delete_function('gallery', 'id', $id);
            $this->session->set_flashdata('message', 'কার্যক্রমটি সফল হয়েছে');
            redirect('admin/gallery');
        } else {
            redirect('admin');
        }
    }

    public function add_video_gallery(){
        $data['page_title'] = 'গ্যালারি-ভিডিও সংযোজন';

        $this->load->view('layouts/header', $data);
        $this->load->view('gallery/add_video');

    }

    public function addGalleryPost(){
       if ($_POST) {
            $insrt['details'] = $this->input->post('p_des');
            $insrt['name'] = $this->input->post('vdo_link'); 
            $insrt['type'] = 2;
            $id = $this->admin_model->insert_ret('gallery', $insrt);            

            $this->session->set_flashdata('message', 'কার্যক্রমটি সফল হয়েছে');
            redirect('admin/gallery');
        } else {
            redirect('admin');
        }
   }

}
