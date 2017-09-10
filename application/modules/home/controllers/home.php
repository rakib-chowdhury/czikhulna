<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Home extends MX_Controller
{

    //public $counter=0;
    function __construct()
    {
        parent::__construct();
        $this->load->library("session");
        $this->load->model('home_model');
        $this->load->helper('text');
        $this->load->helper(array('form', 'url'));
        $this->load->helper('inflector');
        $this->load->helper('file');
    }
    
    public function index()
    {
        $data['page_title'] = 'হোম';

        //////about us
        $data['about_us'] = $this->home_model->getWhere('*', 'info_type=1', 'information');
        $data['mission'] = $this->home_model->getWhere('*', 'info_type=2', 'information');
        $data['vision'] = $this->home_model->getWhere('*', 'info_type=3', 'information');
        $data['achievement'] = $this->home_model->getWhere('*', 'info_type=4', 'information');
        //////facilities
        $data['facilities'] = $this->home_model->getWhere('*', 'info_type=5', 'information');//5=facilities

        $data['services'] = $this->home_model->getWhere('*', 'info_type=6', 'information');
        $data['stockholder'] = $this->home_model->getWhere('*', 'info_type=7', 'information');
        $data['communication'] = $this->home_model->getWhere('*', 'info_type=8', 'information');
        $data['structure'] = $this->home_model->getWhere('*', 'info_type=9', 'information');

        $data['partner']=$this->home_model->getWhere('*','status=1','partner');
        //////course curriculum
        //$data['all_course'] = $this->home_model->getCourseInfo(0);//0=all    29-01-2017
        /////////////29-01-2017//////////////////////////////
        $cur_y = date('Y');
        $cur_m = date('m');

        if ($cur_m <= 6) {
            $data['curr_y'] = ($cur_y - 1) . '-' . $cur_y;
        } else {
            $data['curr_y'] = $cur_y . '-' . ($cur_y + 1);
        }
        $allCrse = $this->home_model->getCourseInfoCrr($data['curr_y']);//0=all
        foreach ($allCrse as $kk => $a) {
            $tmp = $this->home_model->getTraineeInfo($a['c_id']);
            array_push($allCrse[$kk], $tmp);
            $tmp = $this->home_model->get_avg_review($a['c_id']);
            array_push($allCrse[$kk], $tmp);
            $tmp = $this->home_model->get_gender($a['c_id']);
            array_push($allCrse[$kk], $tmp);
            $tmp = $this->home_model->get_donor_info($a['donor_id']);
            array_push($allCrse[$kk], $tmp);
            $tmp = $this->home_model->getWhere('sum(expenditure) as ExpnsE', 'donor_id=' . $a['donor_id'] . ' and course_status=2', 'course_info');
            array_push($allCrse[$kk], $tmp);
            $tmp = $this->home_model->getWhere('*', 'course_id=' . $a['c_id'], 'course_requirement');            
            array_push($allCrse[$kk], $tmp);
        }
        /////////////29-01-2017//////////////////////////////
        $data['all_course'] = $allCrse;
        //echo '<pre>'; print_r($data['all_course']); die();
        //$data['current_course'] = $this->home_model->getCourseInfo(1);//0=all
        $crrCrse = $this->home_model->getCourseInfo(1);//0=all
        foreach ($crrCrse as $kk => $a) {
            $tmp = $this->home_model->getTraineeInfo($a['c_id']);
            array_push($crrCrse[$kk], $tmp);
            $tmp = $this->home_model->get_avg_review($a['c_id']);
            array_push($crrCrse[$kk], $tmp);
            $tmp = $this->home_model->get_gender($a['c_id']);
            array_push($crrCrse[$kk], $tmp);
            $tmp = $this->home_model->get_donor_info($a['donor_id']);
            array_push($crrCrse[$kk], $tmp);
            $tmp = $this->home_model->getWhere('sum(expenditure) as ExpnsE', 'donor_id=' . $a['donor_id'] . ' and course_status=2', 'course_info');
            array_push($crrCrse[$kk], $tmp);
            $tmp = $this->home_model->getWhere('*', 'course_id=' . $a['c_id'], 'course_requirement');            
            array_push($crrCrse[$kk], $tmp);
        }
        $data['current_course'] = $crrCrse;
        //$data['future_course'] = $this->home_model->getCourseInfo(2);//0=all
        $futureCrse = $this->home_model->getCourseInfo(2);//0=all
        foreach ($futureCrse as $kk => $a) {
            $tmp = $this->home_model->getTraineeInfo($a['c_id']);
            array_push($futureCrse [$kk], $tmp);
            $tmp = $this->home_model->get_avg_review($a['c_id']);
            array_push($futureCrse [$kk], $tmp);
            $tmp = $this->home_model->get_gender($a['c_id']);
            array_push($futureCrse [$kk], $tmp);
            $tmp = $this->home_model->get_donor_info($a['donor_id']);
            array_push($futureCrse [$kk], $tmp);
            $tmp = $this->home_model->getWhere('sum(expenditure) as ExpnsE', 'donor_id=' . $a['donor_id'] . ' and course_status=2', 'course_info');
            array_push($futureCrse [$kk], $tmp);
            $tmp = $this->home_model->getWhere('*', 'course_id=' . $a['c_id'], 'course_requirement');            
            array_push($futureCrse [$kk], $tmp);
        }
        $data['future_course'] = $futureCrse;

        /////////archieved course///
        $arcCrse = $this->home_model->getCourseInfoArc($data['curr_y']);//0=all
        foreach ($arcCrse as $kk => $a) {
            $tmp = $this->home_model->getTraineeInfo($a['c_id']);
            array_push($arcCrse [$kk], $tmp);
            $tmp = $this->home_model->get_avg_review($a['c_id']);
            array_push($arcCrse [$kk], $tmp);
            $tmp = $this->home_model->get_gender($a['c_id']);
            array_push($arcCrse [$kk], $tmp);
            $tmp = $this->home_model->get_donor_info($a['donor_id']);
            array_push($arcCrse [$kk], $tmp);
            $tmp = $this->home_model->getWhere('sum(expenditure) as ExpnsE', 'donor_id=' . $a['donor_id'] . ' and course_status=2', 'course_info');
            array_push($arcCrse [$kk], $tmp);
            $tmp = $this->home_model->getWhere('*', 'course_id=' . $a['c_id'], 'course_requirement');            
            array_push($arcCrse [$kk], $tmp);
        }
        /////////////29-01-2017//////////////////////////////
        $data['arc_course'] = $arcCrse;


        //////dashboard
        $data['course_per'] = $this->home_model->get_course_per();
        $data['donors'] = $this->home_model->getYear();

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

        $data['crseTrgt'] = $this->home_model->getApaVal(1, 1);//type,subject;
        $data['crseAchv'] = $this->home_model->getApaVal(2, 1);//type,subject;
        $data['crsePrcntg'] = $this->home_model->getApaVal(3, 1);//type,subject;

        $data['trnTrgt'] = $this->home_model->getApaVal(1, 2);//type,subject;
        $data['trnAchv'] = $this->home_model->getApaVal(2, 2);//type,subject;
        $data['trnPrcntg'] = $this->home_model->getApaVal(3, 2);//type,subject;


        /////////trainee//////
        $data['trainee_male'] = $this->home_model->getTraineeNum($data['curr_y'], 1);
        $data['trainee_female'] = $this->home_model->getTraineeNum($data['curr_y'], 2);
        
        
        //echo '<pre>'; print_r($data['trainee_male']); print_r($data['trainee_female']); die();
        $this->load->view('public_layout/headlink', $data);
        //$this->load->view('public_layout_i/headerlink',$data);
        $this->load->view('index');

    }

    public function course_list_pdf($flag)
    {
        $cur_y = date('Y');
        $cur_m = date('m');

        if ($cur_m <= 6) {
            $data['curr_y'] = ($cur_y - 1) . '-' . $cur_y;
        } else {
            $data['curr_y'] = $cur_y . '-' . ($cur_y + 1);
        }
        if ($flag == 0) {
            $data['title'] = 'সকল প্রশিক্ষণ';
            $data['course'] = $this->home_model->getCourseInfoCrr($data['curr_y']);
        } elseif ($flag == 1) {
            $data['title'] = 'চলমান প্রশিক্ষণ';
            $data['course'] = $this->home_model->getCourseInfo($flag);
        } elseif ($flag == 2) {
            $data['title'] = 'পরবর্তী প্রশিক্ষণ';
            $data['course'] = $this->home_model->getCourseInfo($flag);
        } elseif ($flag == 3) {
            $data['title'] = 'আর্কাইভ কোর্সসমূহ';
            $data['course'] = $this->home_model->getCourseInfoArc($data['curr_y']);
        }


        //$this->load->view('review_comment_pdf', $data);
        $html = $this->load->view('pdf/courseListPdf', $data, true);

        //this the the PDF filename that user will get to download
        $pdfFilePath = "output_pdf_name.pdf";

        //load mPDF library
        $this->load->library('m_pdf_nrml', "'utf-8', 'A4'");

        //generate the PDF from the given html
        $this->m_pdf_nrml->pdf->WriteHTML($html);

        //download it.
        $this->m_pdf_nrml->pdf->Output($pdfFilePath, "I");
    }

    public function online_registration()
    {
        $cur_y = date('Y');
        $cur_m = date('m');

        if ($cur_m <= 6) {
            $data['curr_y'] = ($cur_y - 1) . '-' . $cur_y;
        } else {
            $data['curr_y'] = $cur_y . '-' . ($cur_y + 1);
        }

        $data['page_title'] = 'অনলাইন রেজিস্ট্রেশন';

        $data['division'] = $this->home_model->getAllRecords('division');
        $data['dist'] = $this->home_model->getWhere('*', 'div_id=' . $data['division'][0]['div_id'], 'district');
        $data['upz'] = $this->home_model->getWhere('*', 'dist_id=' . $data['dist'][0]['dist_id'], 'upazilla');
        $data['blood_grp'] = $this->home_model->getWhere('*', 'blood_grp_status=1', 'blood_group');
        $data['education'] = $this->home_model->getWhere('*', 'edu_status=1', 'education');
        $data['trainee_class'] = $this->home_model->getWhere('*', 'class_status=1', 'classification_info');
        $data['des'] = $this->home_model->getWhere('*', 'des_status=1 and classification_id=' . $data['trainee_class'][0]['id'], 'designation');
        $data['profession'] = $this->home_model->getWhere('*', 'prf_status=1 and classification_id=' . $data['trainee_class'][0]['id'], 'profession');
        //$data['course_names'] = $this->home_model->getWhere('*', 'c_status=2', 'course_name');
        $data['course_name'] = $this->home_model->getFutureCourseInfo();
        if (sizeof($data['course_name']) != 0) {
            $data['course_time'] = $this->home_model->getFutureCourseTime($data['course_name'][0]['c_id'], $data['trainee_class'][0]['id']);
        } else {
            $data['course_time'] = '';
        }
        $data['training_inst'] = $this->home_model->getWhere('*', 'status=1', 'training_institute');

        $data['inst'] = $this->home_model->getInstInfo($data['trainee_class'][0]['id']);
        //echo '<pre>'; print_r($data['inst']); die();
        $this->load->view('public_layout/headlink', $data);
        $this->load->view('online_reg');
    }

    public function getCourseInfo()
    { //ajax cll
        $data['res'] = $this->home_model->getWhere('*', 'id=' . $this->input->post('id'), 'course_info');
        echo json_encode($data);
    }

    public function checkNID()
    {
        $res = $this->home_model->getWhere('*', 'nid=' . $this->input->post('nid'), 'user_info');
        if (sizeof($res) == 0) {
            echo 1;
        } else {
            echo 0;
        }
    }

    public function online_registration_post()
    {
//        echo '<pre>';
//        print_r($_POST);
//        print_r($_FILES);
//
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
                $tmpp = explode('/', $this->input->post('reg_date'));
                $inst['inst_reg_date'] = $tmpp[2] . '-' . $tmpp[1] . '-' . $tmpp[0];
                $tmpp = explode('/', $this->input->post('reg_update_date'));
                $inst['inst_last_update_date'] = $tmpp[2] . '-' . $tmpp[1] . '-' . $tmpp[0];
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

            $user['office_id'] = $ofcID;
        } else {
            $user['office_id'] = $this->input->post('ofc_id');
        }


        $user['nid'] = str_replace($bn_digits, $en_digits, $this->input->post('nid'));
        $user['name'] = $this->input->post('name_bng');
        $tmp = explode('/', $this->input->post('dob'));// print_r($tmp); die();
        $tmpDob = $tmp[2] . '-' . $tmp[1] . '-' . $tmp[0];
        $user['dob'] = str_replace($bn_digits, $en_digits, $tmpDob);
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
        $user['registration_date'] = date('Y-m-d');
        $user['user_status'] = 1;
        $user['image'] = 'no_img.png';
        $user['sign'] = 'no_img.png';
        $user['created_at'] = date('Y-m-d');

        $userID = $this->home_model->insert_ret('user_info', $user);

        if ($this->input->post('trainee_pic') != null || $this->input->post('trainee_pic') != '') {
            $i_ext = explode('.', $_FILES['trainee_pic']['name']);
            $target_path = 'user_' . $userID . '.' . end($i_ext);
            if (move_uploaded_file($_FILES['trainee_pic']['tmp_name'], 'uploads/user/' . $target_path)) {
                $data_img['image'] = $target_path;
            }
            $this->home_model->update_function('id', $userID, 'user_info', $data_img);
        }

        if ($this->input->post('sign') != null || $this->input->post('sign') != '') {
            $i_ext = explode('.', $_FILES['sign']['name']);
            $target_path = 'sign_' . $userID . '.' . end($i_ext);
            if (move_uploaded_file($_FILES['sign']['tmp_name'], 'uploads/sign/' . $target_path)) {
                $data_img['sign'] = $target_path;
            }
            $this->home_model->update_function('id', $userID, 'user_info', $data_img);
        }

        $pre_course = $this->input->post('prevCrseName');
        $pre_inst = $this->input->post('prevCrsInst');
        $pre_s_date = $this->input->post('prevCrseStrtdate');
        $pre_e_date = $this->input->post('prevCrseEndDate');

        if (sizeof($pre_course) != 0 && $pre_course != null) {
            $cc = 0;
            $data_p['user_id'] = $userID;
            foreach ($pre_course as $r) {
                $data_p['course_name'] = $pre_course[$cc];
                $data_p['course_institution_name'] = $pre_inst[$cc];
                $st = explode('/', $pre_s_date[$cc]);
                $end = explode('/', $pre_e_date[$cc]);
                $data_p['course_duration'] = $st[2] . '-' . $st[1] . '-' . $st[0] . ' / ' . $end[2] . '-' . $end[1] . '-' . $end[0];

                $this->home_model->insert('previous_course', $data_p);
                $cc++;
            }
        }


        if ($this->input->post('crs_stts') == 4) {
            $demand['user_id'] = $userID;
            $demand['demand_details'] = $this->input->post('crs_title2');
            $demand['demand_date'] = date('Y-m-d');

            $dmndID = $this->home_model->insert_ret('demand_info', $demand);
        } else {
            $temp_user_crse['user_id'] = $userID;
            $temp_user_crse['course_id'] = $this->input->post('start_date');

            $ftrCrseID = $this->home_model->insert_ret('temp_user_crse', $temp_user_crse);
        }

        $admin['email'] = str_replace($bn_digits, $en_digits, $this->input->post('nid'));
        $admin['password'] = md5('user');
        $admin['admin_type'] = 3;
        $admin['secret_q_1'] = 'user';
        $admin['created_at'] = date('Y-m-d');
        $this->home_model->insert('admin_login', $admin);

        if ($this->session->userdata('admin_type') == 1) {
            $this->session->set_flashdata('message', 'প্রশিক্ষণ নিবন্ধন সম্পন্ন হয়েছে');
            redirect('admin/course_request');

        } else {
            $msg = '' . $userID . '/' . $this->input->post('crs_stts') . '/';

            if ($this->input->post('crs_stts') == 4) {
                $msg .= $dmndID;
            } else {
                $msg .= $temp_user_crse['course_id'];
            }
            $data1['userInfo'] = $msg;
            $data1['page_title'] = 'অনলাইন রেজিস্ট্রেশন';
            $this->load->view('public_layout/headlink', $data1);
            $this->load->view('online_reg_msg');
        }
    }

    public function userPDF()
    {
        $userID = $this->uri->segment(3);
        $crs_stts = $this->uri->segment(4);
        $course_id = $this->uri->segment(5);

        if ($crs_stts == 4) {
            $dataPdf['course_info'] = $this->home_model->getWhere('*', 'demand_id=' . $course_id, 'demand_info');
        } else {
            $dataPdf['course_info'] = $this->home_model->get_course_info3($course_id);
        }
        $dataPdf['training_inst'] = $this->home_model->getWhere('*', 'status=1', 'training_institute');
        $dataPdf['trainee_info'] = $this->home_model->get_user_details($userID);
        $dataPdf['crs_stt'] = $crs_stts;


        //$this->load->view('review_comment_pdf', $data);
        $html = $this->load->view('pdf/traineeDtlsPdf', $dataPdf, true);

        //this the the PDF filename that user will get to download
        $pdfFilePath = "output_pdf_name.pdf";

        //load mPDF library
        $this->load->library('m_pdf_nrml', "'utf-8', 'A4'");

        //generate the PDF from the given html
        $this->m_pdf_nrml->pdf->WriteHTML($html);

        //download it.
        $this->m_pdf_nrml->pdf->Output($pdfFilePath, "I");

    }

    public function getDist()
    {
        $data['dist'] = $this->home_model->getWhere('*', 'div_id=' . $this->input->post('div_id'), 'district');
        $data['upz'] = $this->home_model->getWhere('*', 'dist_id=' . $data['dist'][0]['dist_id'], 'upazilla');
        echo json_encode($data);
    }

    public function getUpz()
    {
        $data['upz'] = $this->home_model->getWhere('*', 'dist_id=' . $this->input->post('dist_id'), 'upazilla');
        echo json_encode($data);
    }

    public function getDes()
    {
        $data['des'] = $this->home_model->getWhere('*', 'des_status=1 and classification_id=' . $this->input->post('cls_id'), 'designation');
        $data['prf'] = $this->home_model->getWhere('*', 'prf_status=1 and classification_id=' . $this->input->post('cls_id'), 'profession');
        $data['inst'] = $this->home_model->getInstInfo($this->input->post('cls_id'));
        $data['res'] = $this->home_model->getFutureCourseTime($this->input->post('crs_name_id'), $this->input->post('cls_id'));
        echo json_encode($data);
    }

    public function team()
    {
        $data['page_title'] = 'টিম';

        $team = $this->home_model->getAllRecords('des_cat');
        foreach ($team as $key => $t) {
            $tmp = $this->home_model->getWhere('*', 'emp_status=1 and des_cat_id=' . $t['des_cat_id'], 'employee');
            array_push($team[$key], $tmp);
        }
        $data['team_info'] = $team;
        $this->load->view('public_layout/headlink', $data);
        $this->load->view('team');
    }

    public function demand()
    {
        $data['page_title'] = 'চাহিদা';
        $this->load->view('public_layout/headlink', $data);
        $this->load->view('demand');
    }

    public function demand_post()
    {
        $sender['name'] = $this->input->post('name');
        $sender['mobile'] = $this->input->post('mb');
        $sender['nid'] = $this->input->post('nid');
        $sender['email'] = $this->input->post('email');
        $sender['designation'] = $this->input->post('des');
        $sender['address'] = $this->input->post('address');
        $sender['images'] = 'no_img.png';

        $demand['idea_sender_id'] = $this->home_model->insert_ret('idea_sender', $sender);

        $demand['demand_rundays'] = $this->input->post('idea_title');
        $demand['demand_details'] = $this->input->post('idea_issue');
        $demand['demand_date'] = date('Y-m-d');

        $this->home_model->insert('demand_info', $demand);

        $this->session->set_flashdata('message', 'চাহিদা নিবন্ধন সফল হয়েছে');
        redirect('home/demand');
    }

    public function course_requirement()
    {
        $data['page_title'] = 'কোর্স সম্পর্কিত তথ্য';
        $data['crse_req']= $this->home_model->getWhere('*','c_status=2','course_name');

        $this->load->view('public_layout/headlink', $data);
        $this->load->view('course_req_list');
    }

    public function course_requirement_details($id)
    {
        $data['page_title'] = 'কোর্স সম্পর্কিত তথ্য';
        $data['crse_req_dtls']= $this->home_model->getCourseReq($id);
        $data['cName']=$this->home_model->getWhere('c_name','c_id='.$id,'course_name')[0]['c_name'];

        //echo '<pre>'; print_r($data); die();
        $this->load->view('public_layout/headlink', $data);
        $this->load->view('course_req_details');
    }


    public function notice()
    {
        $data['page_title'] = 'নোটিশ';
        $data['notice']= $this->home_model->getWhereOrder('*','notice_status=1','notice','notice_id','desc');

        $this->load->view('public_layout/headlink', $data);
        $this->load->view('notice');
        //redirect('home');
    }

    public function notice_details($id)
    {
        $data['page_title'] = 'নোটিশ';
        $data['notice']= $this->home_model->getWhere('*','notice_id='.$id,'notice');

        $this->load->view('public_layout/headlink', $data);
        $this->load->view('notice_details');
    }


    public function idea_box()
    {
        $data['page_title'] = 'মতামত';
        $this->load->view('public_layout/headlink', $data);
        $this->load->view('idea_box');
    }

    public function idea_box_post()
    {
        $sender['name'] = $this->input->post('name');
        $sender['mobile'] = $this->input->post('mb');
        $sender['nid'] = $this->input->post('nid');
        $sender['email'] = $this->input->post('email');
        $sender['designation'] = $this->input->post('des');
        $sender['address'] = $this->input->post('address');
        $sender['images'] = 'no_img.png';

        $idea['idea_sender_id'] = $this->home_model->insert_ret('idea_sender', $sender);

        $idea['idea_title'] = $this->input->post('idea_title');
        $idea['idea_issue'] = $this->input->post('idea_issue');

        $this->home_model->insert('idea_info', $idea);

        $this->session->set_flashdata('message', 'মতামত নিবন্ধন সফল হয়েছে');
        redirect('home/idea_box');
    }

    public function all_idea()
    {
        $data['page_title'] = 'সকল মতামত';

        $data['idea'] = $this->home_model->getIdea(2);
        $this->load->view('public_layout/headlink', $data);
        $this->load->view('all_idea');
    }

    /**************teacher review****************/
    public function teacher_review()
    {
        $data['page_title'] = 'প্রশিক্ষক মূল্যায়ন';
        $data['courseList'] = $this->home_model->getCourseTeacher();
        /* if(sizeof($data['courseList'])!=0){
              $data['teacherList']=$this->home_model->getWhere('*','course_id='.$data['courseList'][0]['id'],'teacher_course_rel');
         }else{
              $data['teacherList']=array();
         }*/
        $this->load->view('public_layout/headlink', $data);
        $this->load->view('web_review/teacher_review_list');
    }

    public function getTeacherAjax(){
        $data['teacherList']=$this->home_model->getTeacher($this->input->post('t_id'));
        echo json_encode($data);
    }
    /**************teacher_review_post****************/
    public function teacher_review_post()
    {
        if ($_POST) {
            $bn_digits = array('০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯');
            $en_digits = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9');

            $cid = $this->input->post('courseID');
            $tid = $this->input->post('teacherID');

            $data['ques'] = $this->home_model->getWhere('*','type=2','review_q');
            $data['courseDtls'] = $this->home_model->get_course_info3($cid);
            $data['teacherDtls'] = $this->home_model->getWhere('*','t_id='.$tid,'teacher_info');

            $data['page_title'] = 'প্রশিক্ষক মূল্যায়ন';
            $this->load->view('public_layout/headlink', $data);
            $this->load->view('web_review/teacher_review');
        } else {
            redirect('home/teacher_review');
        }

    }
    /**************teacher_review_post2****************/
    public function teacher_review_post2()
    {
        if ($_POST) {
            $bn_digits = array('০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯');
            $en_digits = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9');
            $cid = $this->input->post('cid');
            $nid = $this->input->post('nid');
            $tid = $this->input->post('tid');
            $nid = str_replace($bn_digits, $en_digits, $nid);
            $chk = $this->home_model->checkNIDforTeacherReview($cid, $nid,$tid);
            if (sizeof($chk) == 0 || $chk == null) {
                $this->session->set_flashdata('msg', 'অনুগ্রহ করে সঠিক কোর্স এবং প্রশিক্ষণার্থীর জাতীয় পরিচয়পত্র নং প্রদান করুন');
                redirect('home/teacher_review');
            } else {
                $noOfQ = $this->input->post('numOFq');
                $t = 0;
                for ($i = 0; $i < $noOfQ; $i++) {
                    $t += $this->input->post('q_' . $i);
                }
                $tmpInsrt['temp_review'] = ($t * 100) / 40;
                $tmpInsrt['temp_comment'] = $this->input->post('user_cmmnt');

                $this->home_model->updateCond('course_id=' . $this->input->post('cid') . ' and teacher_id=' . $this->input->post('tid').' and user_id='.$chk[0]['u_id'], 'temp_teacher_review', $tmpInsrt);

                $this->session->set_flashdata('msg2', 'বক্তা/প্রশিক্ষক মূল্যায়ন সফল হয়েছে');
                redirect('home/teacher_review');
            }
        } else {
            redirect('home/teacher_review');
        }
    }
   /**************teacher review****************/


    /////web_review start///
    public function web_review()
    {
        $data['page_title'] = 'কোর্স মূল্যায়ন';
        $data['courseList'] = $this->home_model->getCourse();
        //echo '<pre>'; print_r($data); die();
        $this->load->view('public_layout/headlink', $data);
        $this->load->view('web_review/web_review_check');
    }

    public function web_reviews()
    {
        if ($_POST) {
            $bn_digits = array('০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯');
            $en_digits = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9');

            $cid = $this->input->post('courseID');

            $data['ques'] = $this->home_model->getWhere('*','type=1','review_q');
            $data['courseDtls'] = $this->home_model->get_course_info3($cid);

            $data['page_title'] = 'কোর্স মূল্যায়ন';
            $this->load->view('public_layout/headlink', $data);
            $this->load->view('web_review/web_review');
        } else {
            redirect('home/web_review');
        }

    }

    public function web_reviews_post()
    {
        if ($_POST) {
            $bn_digits = array('০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯');
            $en_digits = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9');

            $cid = $this->input->post('cid');
            $nid = $this->input->post('nid');
            $nid = str_replace($bn_digits, $en_digits, $nid);
            $chk = $this->home_model->checkNID($cid, $nid);
            if (sizeof($chk) == 0 || $chk == null) {
                $this->session->set_flashdata('msg', 'অনুগ্রহ করে সঠিক কোর্স এবং প্রশিক্ষণার্থীর জাতীয় পরিচয়পত্র নং প্রদান করুন');
                //echo 'sfdfs';
                redirect('home/web_review');
            } else {
                $noOfQ = $this->input->post('numOFq');
                $t = 0;
                for ($i = 0; $i < $noOfQ; $i++) {
                    $t += $this->input->post('q_' . $i);
                }
                $tmpInsrt['review'] = ($t * 100) / 40;
                $tmpInsrt['comment'] = $this->input->post('user_cmmnt');

                $this->home_model->updateCond('course_id=' . $this->input->post('cid') . ' and user_id=' . $chk[0]['u_id'], 'temp_review', $tmpInsrt);

                $this->session->set_flashdata('msg2', 'success');
                redirect('home/web_review');
            }
        } else {
            redirect('home/web_review');
        }
    }

    /*public function web_reviews()
    {
        if ($_POST) {
            $bn_digits = array('০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯');
            $en_digits = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9');

            $cid = $this->input->post('courseID');
            $nid = $this->input->post('nid');
            $nid = str_replace($bn_digits, $en_digits, $nid);
            $chk = $this->home_model->checkNID($cid, $nid);
            if (sizeof($chk) == 0 || $chk == null) {
                $this->session->set_flashdata('msg', 'অনুগ্রহ করে সঠিক কোর্স এবং প্রশিক্ষণার্থী  প্রশিক্ষণার্থীর জাতীয় পরিচয়পত্র নং প্রদান করুন');
                redirect('home/web_review');
            } else {
                //$this->session->set_userdata('cid',$cid);
                //$this->session->set_userdata('nid',$nid);

                $data['ques'] = $this->home_model->getWhere('*','type=1','review_q');
                $data['courseDtls'] = $this->home_model->get_course_info3($cid);
                $data['userDtls'] = $this->home_model->getWhere('*', 'nid=' . $nid, 'user_info');
                //echo '<pre>'; print_r($data); die();
                $data['page_title'] = 'কোর্স মূল্যায়ন';
                $this->load->view('public_layout/headlink', $data);
                $this->load->view('web_review/web_review');
            }
        } else {
            echo 'redirect home';
        }
    }*/

    /*
        public function web_reviews_post()
        {        
            if ($_POST) {
                $noOfQ = $this->input->post('numOFq');
                $t = 0;
                for ($i = 0; $i < $noOfQ; $i++) {
                    $t += $this->input->post('q_' . $i);
                }
                $tmpInsrt['review'] = ($t * 100) / 40;
                $tmpInsrt['comment'] = $this->input->post('user_cmmnt');
    
                $this->home_model->updateCond('course_id=' . $this->input->post('cid') . ' and user_id=' . $this->input->post('nid'), 'temp_review', $tmpInsrt);
    
                $this->session->set_flashdata('msg2', 'success');
                redirect('home/web_review');
    
            } else {
                echo 'redirect home';
            }
        }*/


    /////web_review ends///

    public
    function getCourseData()
    {
        $data['res'] = $this->home_model->getFutureCourseTime($this->input->post('crs_id'), $this->input->post('clss_id'));
        echo json_encode($data);
    }

    public function user_home()
    {
        if ($this->session->userdata('admin_type') == 3) {
            $data['page_title'] = 'হোম';

            $cur_y = date('Y');
            $cur_m = date('m');

            if ($cur_m <= 6) {
                $data['curr_y'] = ($cur_y - 1) . '-' . $cur_y;
            } else {
                $data['curr_y'] = $cur_y . '-' . ($cur_y + 1);
            }
            $data['user_info'] = $this->home_model->getWhere('*', 'id=' . $this->session->userdata('user_id'), 'user_info');
            $data['course_name'] = $this->home_model->getFutureCourseInfo();
            if (sizeof($data['course_name']) != 0) {
                $data['course_time'] = $this->home_model->getFutureCourseTime($data['course_name'][0]['c_id'], $data['user_info'][0]['classification_id']);
            } else {
                $data['course_time'] = '';
            }
            $data['training_inst'] = $this->home_model->getWhere('*', 'status=1', 'training_institute');

            //echo '<pre>'; print_r($data); die();
            $this->load->view('public_layout/headlink', $data);
            $this->load->view('home/home');
        } else {
            //redirect('home');
        }
    }

    public function userReqPost()
    {
        $userID = $this->input->post('user_id');
        if ($this->input->post('crs_stts') == 4) {
            $demand['user_id'] = $userID;
            $demand['demand_details'] = $this->input->post('crs_title2');
            $demand['demand_date'] = date('Y-m-d');

            $this->home_model->insert('demand_info', $demand);

            $this->session->set_flashdata('message', 'কার্যক্রমটি সফলভাবে সম্পন্ন হয়েছে');
            redirect('home/user_home');

        } else {
            $chk = $this->home_model->getCourseUser($userID, $this->input->post('start_date'));

            if (sizeof($chk) == 0) {
                $chk2 = $this->home_model->getTempCourseUser($userID, $this->input->post('start_date'));

                if (sizeof($chk2) == 0) {
                    $temp_user_crse['user_id'] = $userID;
                    $temp_user_crse['course_id'] = $this->input->post('start_date');

                    $this->home_model->insert('temp_user_crse', $temp_user_crse);

                    $this->session->set_flashdata('message', 'কার্যক্রমটি সফলভাবে সম্পন্ন হয়েছে');
                } else {
                    $this->session->set_flashdata('message', 'আপনি ইতিমধ্যে ' . $chk2[0]['c_name'] . ' কোর্সের জন্য আবেদন করেছেন');
                }
            } else {
                $this->session->set_flashdata('message', 'আপনি ইতিমধ্যে ' . $chk[0]['c_name'] . ' কোর্সে নিবন্ধিত রয়েছেন');
            }
            redirect('home/user_home');
        }
    }
   
    public function password_change()
    {
        if ($this->session->userdata('admin_type') == 3) {
            $data['page_title'] = 'পাসওয়ার্ড পরিবর্তন';
            $this->load->view('public_layout/headlink', $data);
            $this->load->view('home/passwordChange');
        } else {
            //redirect('home');
        }
    }

    public function changePasswordPost()
    {
        if ($this->session->userdata('admin_type') == 3) {
            $adminID = $this->session->userdata('login_id');
            $tmp = $this->home_model->getWhere('*', 'login_id=' . $adminID, 'admin_login');

            $prev = $this->input->post('crr_pass');
            $insrt['password'] = md5($this->input->post('new_pass'));
            if (md5($prev) == $tmp[0]['password']) {
                $this->home_model->update_function('login_id', $adminID, 'admin_login', $insrt);
                $this->session->set_flashdata('message', 'কার্যক্রমটি সফলভাবে সম্পন্ন হয়েছে');
            } else {
                $this->session->set_flashdata('message2', 'বর্তমান পাসওয়ার্ড মিল নাই। অনুগ্রহ করে সঠিক পাসওয়ার্ড প্রদান করুন');
            }
            redirect('home/password_change');
        } else {
            //redirect('home');
        }
    }

    public function courseDetailsPdf($cid)
    {
        $id = $this->uri->segment(3);

        if ($id) {
            //$data['trainee'] = $this->home_model->get_user_info($id);
            $data['req'] = $this->home_model->getWhere('*','course_id='.$id,'course_requirement');
            $data['crseInfo'] = $this->home_model->get_course_info3($id);
            $data['typeofstudent'] = $this->home_model->get_gender($id);


            $data['get_avg_review'] = $this->home_model->get_avg_review($id);

            //$this->load->view('review_comment_pdf', $data);
            $html = $this->load->view('pdf/courseDetailsPdf', $data, true);

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


    public function elearning_list(){
        $data['page_title'] = 'ই-লার্নিং';
        $data['elearning']= $this->home_model->getElearning('all');

        $this->load->view('public_layout/headlink', $data);
        $this->load->view('elearning_list');
    }
    
    public function elearning_details($id){
        $data['page_title'] = 'ই-লার্নিং';
        $data['elearning']= $this->home_model->getElearning($id);

       //echo '<pre>'; print_r($data); die();
        $this->load->view('public_layout/headlink', $data);
        $this->load->view('elearning_details');
    }
    public function gallery(){
        $data['page_title'] = 'গ্যালারি';
        $data['page_info']=$this->home_model->getAllRecords_order_by('gallery', 'id', 'desc');
        $this->load->view('public_layout/headlink',$data);
        $this->load->view('gallery');
    }
}
