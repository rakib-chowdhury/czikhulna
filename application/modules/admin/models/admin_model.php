<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    /////basic query start///
    public function getAllRecords($tableName)
    {
        $this->db->select('*');
        $result = $this->db->get($tableName);
        return $result->result_array();
    }

    public function getAllRecords_order_by($tableName, $order_by, $type)
    {
        $this->db->select('*');
        $this->db->from($tableName);
        $this->db->order_by($order_by, $type);
        $result = $this->db->get();
        return $result->result_array();
    }

    public function insert($tablename, $tabledata)
    {
        $this->db->insert($tablename, $tabledata);
    }

    public function insert_ret($tablename, $tabledata)
    {
        $this->db->insert($tablename, $tabledata);
        return $this->db->insert_id();
    }

    public function update_function($columnName, $columnVal, $tableName, $data)
    {
        $this->db->where($columnName, $columnVal);
        $this->db->update($tableName, $data);
    }

    public function update_function_cond($cond, $tableName, $data)
    {
        $whr = '(' . $cond . ')';
        $this->db->where($whr);
        $this->db->update($tableName, $data);
    }

    public function delete_function($tableName, $columnName, $columnVal)
    {
        $this->db->where($columnName, $columnVal);
        $this->db->delete($tableName);
    }

    public function delete_function_cond($tableName, $cond)
    {
        $where = '( ' . $cond . ' )';
        $this->db->where($where);
        $this->db->delete($tableName);
    }

    public function getWhere($selector, $condition, $tablename)
    {
        $this->db->select($selector);
        $this->db->from($tablename);
        $where = '(' . $condition . ')';
        $this->db->where($where);
        $result = $this->db->get();
        return $result->result_array();
    }

    /////basic query ends/////

    /////donor start////
    public function get_donor_info($id)
    {
        $this->db->select('*');
        $this->db->from('donor_info');
        $this->db->where('id', $id);
        $result = $this->db->get();
        return $result->result_array();
    }
    /////donor ends////


    /////course start//
    public function get_course_details()
    {
        $this->db->select('* , course_info.id as c_id');
        $this->db->from('course_info');
        $this->db->join('donor_info', 'donor_info.id=course_info.donor_id', 'left');
        $this->db->join('course_name', 'course_name.c_id=course_info.course_name_id', 'left');
        $this->db->join('classification_info', 'classification_info.id=course_info.classification_id');
        $this->db->order_by('course_info.start_date', 'desc');
        $result = $this->db->get();
        return $result->result_array();

    }

    public function get_donor($d_id)
    {
        $this->db->select('*');
        $this->db->from('donor_info');
        $this->db->where('id', $d_id);
        $result = $this->db->get();
        return $result->result_array();
    }

    public function getCourseInfo5($c_id, $mdate)
    {
        $this->db->select('* , course_info.id as c_id');
        $this->db->from('course_info');
        $this->db->join('donor_info', 'donor_info.id=course_info.donor_id', 'left');
        $this->db->join('course_name', 'course_name.c_id=course_info.course_name_id', 'left');
        $this->db->where('course_info.id', $c_id);
        $whr = 'start_date <"' . $mdate . '"';
        $this->db->where($whr);
        $result = $this->db->get();
        return $result->result_array();
    }

    public function getCourseInfo55($c_id, $mdate)
    {
        $this->db->select('* , course_info.id as c_id');
        $this->db->from('course_info');
        //$this->db->join('donor_info', 'donor_info.id=course_info.donor_id', 'left');
        $this->db->join('course_name', 'course_name.c_id=course_info.course_name_id', 'left');
        $this->db->where('course_info.donor_id', $c_id);
        $whr = 'start_date <"' . $mdate . '"';
        $this->db->where($whr);
        $result = $this->db->get();
        return $result->result_array();
    }

    public function getCmpltCrs($donorID, $endDATE)
    {
        $this->db->select('* , course_info.id as c_id');
        $this->db->from('course_info');
        $this->db->join('course_name', 'course_name.c_id=course_info.course_name_id', 'left');
        $this->db->where('course_info.donor_id', $donorID);
        $this->db->where('course_info.course_status', 2);
        $this->db->where('course_info.end_date <', $endDATE);
        $result = $this->db->get();
        return $result->result_array();
    }

    public function get_course_info($c_id)
    {
        $this->db->select('* , course_info.id as c_id');
        $this->db->from('course_info');
        $this->db->join('donor_info', 'donor_info.id=course_info.donor_id', 'left');
        $this->db->join('course_name', 'course_name.c_id=course_info.course_name_id', 'left');
        $this->db->join('course_class', 'course_class.course_class_id=course_info.course_class_id', 'left');
        $this->db->where('course_info.id', $c_id);
        $result = $this->db->get();
        return $result->result_array();

    }

    public function getCmpltCrsAll()
    {
        $this->db->select('* , course_info.id as c_id');
        $this->db->from('course_info');
        $this->db->join('course_name', 'course_name.c_id=course_info.course_name_id', 'left');
        $this->db->where('course_info.course_status', 2);
        $this->db->order_by('course_info.start_date', 'desc');
        $result = $this->db->get();
        return $result->result_array();
    }

    public function get_course_info4($d_id)
    {
        $this->db->select('* , course_info.id as c_id');
        $this->db->from('course_info');
        $this->db->join('donor_info', 'donor_info.id=course_info.donor_id', 'left');
        $this->db->join('course_name', 'course_name.c_id=course_info.course_name_id', 'left');
        $this->db->join('course_class', 'course_class.course_class_id=course_info.course_class_id', 'left');
        $this->db->where('course_info.donor_id', $d_id);
        $result = $this->db->get();
        return $result->result_array();
    }

    public function get_course_info3($c_id)
    {
        $this->db->select('* , course_info.id as c_id');
        $this->db->from('course_info');
        $this->db->join('donor_info', 'donor_info.id=course_info.donor_id', 'left');
        $this->db->join('course_name', 'course_name.c_id=course_info.course_name_id', 'left');
        $this->db->join('classification_info', 'classification_info.id=course_info.classification_id', 'left');
        $this->db->join('course_class', 'course_class.course_class_id=course_info.course_class_id', 'left');
        $this->db->where('course_info.id', $c_id);
        $result = $this->db->get();
        return $result->result_array();

    }

    public function get_used_amount($donor_id)
    {
        $this->db->select('sum(expenditure) as used_amnt');
        $this->db->from('course_info');
        $this->db->where('donor_id', $donor_id);
        $result = $this->db->get();
        return $result->result_array();

    }

    public function get_used_amount_edit($donor_id, $course_id)
    {
        $this->db->select('sum(expenditure) as used_amnt');
        $this->db->from('course_info');
        $this->db->where('donor_id', $donor_id);
        $this->db->where_not_in('id', $course_id);
        $result = $this->db->get();
        return $result->result_array();

    }

    ////course end///

    ///course review strt///
    public function get_course_review()
    {
        $selection = '* , course_info.id as c_id';
        $table = 'course_info , classification_info';
        $cond = 'course_info.classification_id=classification_info.id and course_info.course_status=2 and course_info.id=any(select course_id from temp_review)';
        $sql = 'select ' . $selection . ' from ' . $table . ' where ' . $cond;
        $result = $this->db->query($sql);
        //$result = $this->db->get();
        return $result->result_array();
    }

    public function get_course_review_info($c_id)
    {
        $this->db->select('*');
        $this->db->from('review_info');
        $this->db->join('user_info', 'user_info.id=review_info.user_id');
        $this->db->where('course_id', $c_id);
        $result = $this->db->get();
        return $result->result_array();
    }

    public function get_avg_review($c_id)
    {
        $sql = "SELECT sum(review)/count(id) as avg FROM `review_info` where course_id=" . $c_id . " and review<>0";
        $result = $this->db->query($sql);
        return $result->result_array();
    }
    ////course review end///

    ///user start////
    public function get_user_details($u_id)
    {
        $this->db->select('*, user_info.id as u_id, user_info.name as u_name, institute.inst_id as o_id, classification_info.id as c_id, division.bn_div_name as pDiv, district.bn_dist_name as pDist, upazilla.bn_upz_name as pUpz, idiv.bn_div_name as Idiv, idist.bn_dist_name as Idist, iupz.bn_upz_name as Iupz');
        $this->db->from('user_info');
        $this->db->join('division', 'division.div_id=user_info.per_div_id', 'left');
        $this->db->join('district', 'district.dist_id=user_info.per_dist_id', 'left');
        $this->db->join('upazilla', 'upazilla.upz_id=user_info.per_upz_id', 'left');
        $this->db->join('classification_info', 'classification_info.id=user_info.classification_id', 'left');
        $this->db->join('designation', 'designation.des_id=user_info.designation_id', 'left');
        $this->db->join('profession', 'profession.prf_id=user_info.profession_id', 'left');
        $this->db->join('education', 'education.edu_id=user_info.education_id', 'left');
        $this->db->join('institute', 'institute.inst_id=user_info.office_id', 'left');
        $this->db->join('division idiv', 'idiv.div_id=institute.inst_div_id', 'left');
        $this->db->join('district idist', 'idist.dist_id=institute.inst_dist_id', 'left');
        $this->db->join('upazilla iupz', 'iupz.upz_id=institute.inst_upz_id', 'left');
        $this->db->join('blood_group', 'blood_group.blood_grp_id=user_info.blood_grp_id', 'left');
        $this->db->where('user_info.id', $u_id);
        $result = $this->db->get();
        return $result->result_array();
    }
    ///user ends///

    //// user course rel start////
    public function get_teacher_info($c_id)
    {
        $this->db->select('*, classification_info.id as c_id, institute.inst_id as o_id, division.bn_div_name as pDiv, district.bn_dist_name as pDist, upazilla.bn_upz_name as pUpz, idiv.bn_div_name as Idiv, idist.bn_dist_name as Idist, iupz.bn_upz_name as Iupz');
        $this->db->from('teacher_info');
        $this->db->join('division', 'division.div_id=teacher_info.t_per_div_id', 'left');
        $this->db->join('district', 'district.dist_id=teacher_info.t_per_dist_id', 'left');
        $this->db->join('upazilla', 'upazilla.upz_id=teacher_info.t_per_upz_id', 'left');
        $this->db->join('classification_info', 'classification_info.id=teacher_info.classification_id', 'left');
        $this->db->join('designation', 'designation.des_id=teacher_info.designation_id', 'left');
        $this->db->join('profession', 'profession.prf_id=teacher_info.profession_id', 'left');
        $this->db->join('education', 'education.edu_id=teacher_info.education_id', 'left');
        $this->db->join('institute', 'institute.inst_id=teacher_info.office_id', 'left');
        $this->db->join('division idiv', 'idiv.div_id=institute.inst_div_id', 'left');
        $this->db->join('district idist', 'idist.dist_id=institute.inst_dist_id', 'left');
        $this->db->join('upazilla iupz', 'iupz.upz_id=institute.inst_upz_id', 'left');
        $this->db->join('blood_group', 'blood_group.blood_grp_id=teacher_info.blood_grp_id', 'left');
        if ($c_id != 'all') {
            $this->db->where('teacher_info.t_id', $c_id);
        }
        $result = $this->db->get();
        return $result->result_array();
    }


    //// user course rel start////
    public function get_user_info($c_id)
    {
        $this->db->select('*,user_info.name as u_name,user_info.id as u_id');
        $this->db->from('review_info');
        $this->db->join('user_info', 'user_info.id=review_info.user_id', 'left');
        $this->db->join('course_info', 'course_info.id=review_info.course_id', 'left');
        $this->db->join('course_name', 'course_name.c_id=course_info.course_name_id', 'left');
        $this->db->join('classification_info', 'classification_info.id=course_info.classification_id', 'left');
        $this->db->join('designation', 'designation.des_id=user_info.designation_id', 'left');
        $this->db->join('institute', 'institute.inst_id=user_info.office_id', 'left');
        $this->db->join('division', 'division.div_id=institute.inst_div_id', 'left');
        $this->db->join('district', 'district.dist_id=institute.inst_dist_id', 'left');
        $this->db->join('upazilla', 'upazilla.upz_id=institute.inst_upz_id', 'left');
        $this->db->where('review_info.course_id', $c_id);
        $result = $this->db->get();
        return $result->result_array();
    }

    public function get_student_num($c_id)
    {
        $this->db->select('count(id) as count');
        $this->db->from('review_info');
        $this->db->where('review_info.course_id', $c_id);
        $result = $this->db->get();
        return $result->result_array();
    }
    //// user course rel end////

    ////show with pdf start///

    ////show with pdf start///

    ////all course details///
    public function get_user_id($c_id)
    {
        $this->db->select('user_id');
        $this->db->from('review_info');
        $this->db->where('course_id', $c_id);
        $result = $this->db->get();
        return $result->result_array();
    }

    public function get_clssftn_val($u_id)
    {
        $this->db->select('class_name');
        $this->db->from('classification_info');
        $this->db->join('user_info', 'user_info.classification_id=classification_info.id');
        $this->db->where('user_info.id', $u_id);
        $result = $this->db->get();
        return $result->result_array();
    }

    public function getDonationAmount($year, $d_name, $c_ststus)
    {
        $this->db->select('sum(total_donation) as total');
        $this->db->from('donor_info');
        if ($year != 'all') {
            $this->db->where('donation_year', $year);
        }
        if ($d_name != 'all') {
            $this->db->where('donor_name', $d_name);
        }
        $result = $this->db->get();
        return $result->result_array();
    }

    public function getExpnseAmount($year, $d_name, $c_ststus)
    {
        $this->db->select('sum(course_info.expenditure) as expnse');
        $this->db->from('course_info');
        $this->db->join('donor_info', 'donor_info.id=course_info.donor_id', 'left');
        if ($year != 'all') {
            $this->db->where('course_info.year', $year);
        }
        if ($d_name != 'all') {
            $this->db->where('donor_info.donor_name', $d_name);
        }
        $result = $this->db->get();
        return $result->result_array();

    }

    public function get_course_details_with_cond($year, $d_name, $c_ststus)
    {
        $this->db->select('* , course_info.id as c_id');
        $this->db->from('course_info');
        $this->db->join('donor_info', 'donor_info.id=course_info.donor_id', 'left');
        $this->db->join('course_name', 'course_name.c_id=course_info.course_name_id', 'left');
        $this->db->join('classification_info', 'classification_info.id=course_info.classification_id');
        $this->db->join('course_class', 'course_class.course_class_id=course_info.course_class_id', 'left');
        if ($year != 'all') {
            $this->db->where('course_info.year', $year);
        }
        if ($d_name != 'all') {
            $this->db->where('donor_info.donor_name', $d_name);
        }
        if ($c_ststus != 'all') {
            $this->db->where('course_info.course_status', $c_ststus);
        }
        $this->db->order_by('course_info.start_date');
        $result = $this->db->get();
        return $result->result_array();

    }

    public function get_gender($c_id)
    {
        $this->db->select('count(review_info.id) as count, user_info.gender');
        $this->db->from('review_info');
        $this->db->join('user_info', 'user_info.id=review_info.user_id');
        $this->db->where('review_info.course_id', $c_id);
        $this->db->group_by('user_info.gender');
        $result = $this->db->get();
        return $result->result_array();
    }

    ///all user details

    public function get_course()
    {
        $this->db->distinct();
        $this->db->select('name');
        $this->db->from('course_info');
        $result = $this->db->get();
        return $result->result_array();
    }

    public function get_user_info_with_cond($year, $inst, $crse, $u_id)
    {
        $this->db->select('*, user_info.name as u_name , user_info.id as u_id, classification_info.id as class_id');
        $this->db->from('review_info');
        $this->db->join('user_info', 'user_info.id=review_info.user_id');
        $this->db->join('course_info', 'course_info.id=review_info.course_id');
        $this->db->join('course_name', 'course_name.c_id=course_info.course_name_id', 'left');
        $this->db->join('classification_info', 'classification_info.id=course_info.classification_id');
        $this->db->join('institute', 'institute.inst_id=user_info.office_id', 'left');
        $this->db->join('division', 'division.div_id=institute.inst_div_id', 'left');
        $this->db->join('district', 'district.dist_id=institute.inst_dist_id', 'left');
        $this->db->join('upazilla', 'upazilla.upz_id=institute.inst_upz_id', 'left');
        if ($year != 'all') {
            $this->db->where('course_info.year', $year);
        }
        if ($inst != 'all') {
            $this->db->where('user_info.office_id', $inst);
        }
        if ($crse != 'all') {
            $this->db->where('course_info.course_name_id', $crse);
        }
        if ($u_id != 'all') {
            $this->db->where('user_info.id', $u_id);
        }
        $this->db->order_by('course_info.year');
        $result = $this->db->get();
        return $result->result_array();
    }

    public function get_course_review_with_cond($year, $crse, $user)
    {
        $this->db->select('* , course_info.id as c_id');
        $this->db->from('course_info');
        $this->db->join('donor_info', 'donor_info.id=course_info.donor_id', 'left');
        $this->db->join('course_name', 'course_name.c_id=course_info.course_name_id', 'left');
        $this->db->join('classification_info', 'classification_info.id=course_info.classification_id');
        $this->db->join('course_class', 'course_class.course_class_id=course_info.course_class_id', 'left');
        if ($year != 'all') {
            $this->db->where('course_info.year', $year);
        }
        if ($crse != 'all') {
            $this->db->where('course_info.course_name_id', $crse);
        }
        if ($user != 'all') {
            $wh = '( course_info.id= any(select course_id from review_info where user_id=' . $user . '))';
            $this->db->where($wh);
        }
        $result = $this->db->get();
        return $result->result_array();
    }

    public function percentange($c_id, $st, $end)
    {
        $this->db->select('count(id) as c');
        $this->db->from('review_info');
        $this->db->where('course_id', $c_id);
        $wh = '( review>' . $st . ' and review < ' . $end . ' )';
        $this->db->where($wh);
        $result = $this->db->get();
        return $result->result_array();

    }


    /////teacher review///
    public function getCourseListForTeacherReview($y)
    {
        $this->db->select('* , course_info.id as crse_id');
        $this->db->from('course_info');
        $this->db->join('donor_info', 'donor_info.id=course_info.donor_id', 'left');
        $this->db->join('course_name', 'course_name.c_id=course_info.course_name_id', 'left');
        //$this->db->where('course_info.course_status', 2);
        $this->db->where('course_info.year', $y);
        $result = $this->db->get();
        return $result->result_array();
    }

    public function get_teacher_review_with_cond($year, $crse, $tchr)
    {
        //echo $crse;
        $this->db->select('* , course_info.id as crse_id, user_info.name as u_name');
        $this->db->from('teacher_review_info');
        $this->db->join('user_info', 'user_info.id=teacher_review_info.user_id', 'left');
        $this->db->join('course_info', 'course_info.id=teacher_review_info.course_id', 'left');
        $this->db->join('donor_info', 'donor_info.id=course_info.donor_id', 'left');
        $this->db->join('course_name', 'course_name.c_id=course_info.course_name_id', 'left');
        $this->db->join('course_class', 'course_class.course_class_id=course_info.course_class_id', 'left');
        $this->db->join('classification_info', 'classification_info.id=course_info.classification_id', 'left');
        $this->db->where('teacher_review_info.course_id', $crse);
        $this->db->where('teacher_review_info.teacher_id', $tchr);

        $result = $this->db->get();
        return $result->result_array();

    }


    /////index///////////
    public function get_parcentage($st, $end)
    {
        $y = date('Y');
        $m = date('m');
        if ($m <= 6) {
            $yy = ($y - 1) . '-' . $y;
            //echo $yy;
        } else {
            $yy = ($y) . '-' . ($y + 1);
            //echo $yy;
        }
        $sql = 'SELECT count(id) as person FROM `review_info` where course_id=any(select id from course_info WHERE course_status=2 and year="' . $yy . '") and review>' . $st . ' and review<' . $end;
        $result = $this->db->query($sql);
        return $result->result_array();
    }

    public function get_course_per()
    {
        $y = date('Y');
        $m = date('m');
        if ($m <= 6) {
            $yy = ($y - 1) . '-' . $y;
            //echo $yy;
        } else {
            $yy = ($y) . '-' . ($y + 1);
            //echo $yy;
        }
        $sql = 'SELECT count(ri.id) as person,cn.c_name from review_info ri , course_info ci , course_name as cn where ri.course_id=ci.id and ci.course_name_id=cn.c_id and ci.year="' . $yy . '" GROUP by ci.course_name_id';
        $result = $this->db->query($sql);
        return $result->result_array();
    }

    public function get_course_num($d_name)
    {
        $sql = 'SELECT count(course_info.id) as c_num,course_info.year, course_info.donor_id , donor_info.donor_name FROM `course_info` , donor_info where course_info.donor_id=donor_info.id  and donor_info.donor_name="' . $d_name . '" group by course_info.year';
        $result = $this->db->query($sql);
        return $result->result_array();

    }

    public function get_budget($d_name)
    {
        $this->db->select('sum(total_donation) as budget,donation_year as year');
        $this->db->from('donor_info');
        $this->db->where('donor_name', $d_name);
        $this->db->group_by('donation_year');
        $this->db->order_by('donation_year', 'asc');
        $result = $this->db->get();
        return $result->result_array();
    }

    public function get_trainee_num($gender)
    {
        $this->db->select('count(review_info.id) as t_num,course_info.year');
        $this->db->from('review_info');
        $this->db->join('user_info', 'user_info.id=review_info.user_id');
        $this->db->join('course_info', 'course_info.id=review_info.course_id');
        $this->db->where('user_info.gender', $gender);
        $this->db->group_by('course_info.year');
        $this->db->limit(1);
        $result = $this->db->get();
        return $result->result_array();
    }

    public function getEndCrse()
    {
        $this->db->select('* , course_info.id as c_id');
        $this->db->from('course_info');
        $this->db->join('donor_info', 'donor_info.id=course_info.donor_id', 'left');
        $this->db->join('course_name', 'course_name.c_id=course_info.course_name_id', 'left');
        $this->db->join('classification_info', 'classification_info.id=course_info.classification_id');
        $this->db->where('course_info.course_status', 2);
        $this->db->order_by('course_info.start_date', 'asc');
        $result = $this->db->get();
        return $result->result_array();
    }

    public function get_course_details2($cond)
    {
        $this->db->select('* , course_info.id as c_id');
        $this->db->from('course_info');
        $this->db->join('donor_info', 'donor_info.id=course_info.donor_id', 'left');
        $this->db->join('course_name', 'course_name.c_id=course_info.course_name_id', 'left');
        $this->db->join('classification_info', 'classification_info.id=course_info.classification_id');
        $where = '(' . $cond . ')';
        $this->db->where($where);
        $this->db->order_by('course_info.start_date', 'asc');
        $this->db->limit(1);
        $result = $this->db->get();
        return $result->result_array();

    }

    public function getUserRecords()
    {
        $this->db->select('*');
        $this->db->from('user_info');
        $this->db->join('designation', 'designation.des_id=user_info.designation_id', 'left');
        $result = $this->db->get();
        return $result->result_array();
    }

 public function getUserRecords2()
    {
        $this->db->select('*');
        $this->db->from('user_info');
        $this->db->join('designation', 'designation.des_id=user_info.designation_id', 'left');
        $this->db->join('institute', 'institute.inst_id=user_info.office_id', 'left');
        $result = $this->db->get();
        return $result->result_array();
    }

    ///////NEW////////
    public function get_budget_details_with_cond($y, $m, $d_name)
    {
        $this->db->select('* ');
        $this->db->from('donor_info');
        if ($y != 'all') {
            $this->db->where('donation_year', $y);
        }
        if ($d_name != 'all') {
            $this->db->where('donor_name', $d_name);
        }

        $result = $this->db->get();
        return $result->result_array();
    }

    public function getTeam()
    {
        $this->db->select('*');
        $this->db->from('employee');
        $this->db->join('des_cat', 'des_cat.des_cat_id=employee.des_cat_id', 'left');
        $this->db->order_by('employee.emp_id', 'desc');

        $result = $this->db->get();
        return $result->result_array();
    }

    public function getIdea($type)
    {
        $this->db->select('*');
        $this->db->from('idea_info');
        $this->db->join('idea_sender', 'idea_sender.id=idea_info.idea_sender_id', 'left');
        if ($type != 0) {
            $this->db->where('idea_info.idea_status', $type);
        }
        $this->db->order_by('idea_info.idea_id', 'desc');

        $result = $this->db->get();
        return $result->result_array();
    }

    public function getDemand()
    {
        $this->db->select('*');
        $this->db->from('demand_info');
        $this->db->join('idea_sender', 'idea_sender.id=demand_info.idea_sender_id', 'left');
        $this->db->order_by('demand_info.demand_id', 'desc');
        $result = $this->db->get();
        return $result->result_array();
    }

    public function getRequestInfo()
    {
        $this->db->select('*,temp_user_crse.id as tuc_id, user_info.id as u_id, course_info.id as c_id');
        $this->db->from('temp_user_crse');
        $this->db->join('course_info', 'course_info.id=temp_user_crse.course_id', 'left');
        $this->db->join('course_name', 'course_name.c_id=course_info.course_name_id', 'left');
        $this->db->join('user_info', 'user_info.id=temp_user_crse.user_id', 'left');
        $this->db->join('classification_info', 'classification_info.id=user_info.classification_id', 'left');
        $this->db->join('designation', 'designation.des_id=user_info.designation_id', 'left');
        $this->db->join('institute', 'institute.inst_id=user_info.office_id', 'left');
        $this->db->join('division', 'division.div_id=institute.inst_div_id', 'left');
        $this->db->join('district', 'district.dist_id=institute.inst_dist_id', 'left');
        $this->db->join('upazilla', 'upazilla.upz_id=institute.inst_upz_id', 'left');
        $this->db->where('temp_user_crse.status', 1);
        $this->db->order_by('temp_user_crse.created_at', 'desc');

        $result = $this->db->get();
        return $result->result_array();
    }

    public function getInstInfoALl()
    {
        $this->db->select('*');
        $this->db->from('institute');
        $this->db->join('division', 'division.div_id=institute.inst_div_id', 'left');
        $this->db->join('district', 'district.dist_id=institute.inst_dist_id', 'left');
        $this->db->join('upazilla', 'upazilla.upz_id=institute.inst_upz_id', 'left');
        $this->db->join('classification_info', 'classification_info.id=institute.classification_id');
        $this->db->where('institute.inst_status', 1);
        $result = $this->db->get();
        return $result->result_array();
    }

    public function getInstInfoALl2($id)
    {
        $this->db->select('*');
        $this->db->from('institute');
        $this->db->join('division', 'division.div_id=institute.inst_div_id', 'left');
        $this->db->join('district', 'district.dist_id=institute.inst_dist_id', 'left');
        $this->db->join('upazilla', 'upazilla.upz_id=institute.inst_upz_id', 'left');
        $this->db->join('classification_info', 'classification_info.id=institute.classification_id');
        $this->db->where('institute.inst_id', $id);
        $result = $this->db->get();
        return $result->result_array();
    }

    public function getAPA($y)
    {
        $this->db->select('*');
        $this->db->from('apa_info');
        $this->db->join('subject', 'subject.subject_id=apa_info.apa_id', 'left');
        $this->db->where('apa_info.apa_year', $y);
        $result = $this->db->get();
        return $result->result_array();
    }

    public function getTraineeInfo($crse, $traineeCls, $crseCls, $donor, $year, $dist, $upz)
    {
        $this->db->select('* , course_info.id as c_id, user_info.name as u_name');
        $this->db->from('review_info');
        $this->db->join('user_info', 'user_info.id=review_info.user_id', 'left');
        $this->db->join('course_info', 'course_info.id=review_info.course_id', 'left');
        $this->db->join('donor_info', 'donor_info.id=course_info.donor_id', 'left');
        $this->db->join('course_name', 'course_name.c_id=course_info.course_name_id', 'left');
        $this->db->join('classification_info', 'classification_info.id=course_info.classification_id');
        $this->db->join('course_class', 'course_class.course_class_id=course_info.course_class_id', 'left');

        if ($crse != 'all') {
            $this->db->where('course_info.course_name_id', $crse);
        }
        if ($traineeCls != 'all') {
            $this->db->where('course_info.classification_id', $traineeCls);
        }
        if ($crseCls != 'all') {
            $this->db->where('course_info.course_class_id', $crseCls);
        }
        if ($donor != 'all') {
            $this->db->where('donor_info.donor_name', $donor);
        }
        if ($year != 'all') {
            $this->db->where('course_info.year', $year);
        }
        if ($dist != 'all') {
            $this->db->where('user_info.per_dist_id', $dist);
        }
        if ($upz != 'all') {
            $this->db->where('user_info.per_upz_id', $upz);
        }

        $this->db->order_by('user_info.gender');
        $result = $this->db->get();
        return $result->result_array();
    }

    public function getTraineeInfo2($crse, $traineeCls, $crseCls, $donor, $year, $dist, $upz, $user_type)
    {
        $this->db->select('* , course_info.id as c_id, user_info.name as u_name');
        $this->db->from('review_info');
        $this->db->join('user_info', 'user_info.id=review_info.user_id', 'left');
        $this->db->join('course_info', 'course_info.id=review_info.course_id', 'left');
        $this->db->join('donor_info', 'donor_info.id=course_info.donor_id', 'left');
        $this->db->join('course_name', 'course_name.c_id=course_info.course_name_id', 'left');
        $this->db->join('classification_info', 'classification_info.id=course_info.classification_id', 'left');
        $this->db->join('course_class', 'course_class.course_class_id=course_info.course_class_id', 'left');

        if ($crse != 'all') {
            $this->db->where('course_info.course_name_id', $crse);
        }
        if ($traineeCls != 'all') {
            $this->db->where('course_info.classification_id', $traineeCls);
        }
        if ($crseCls != 'all') {
            $this->db->where('course_info.course_class_id', $crseCls);
        }
        if ($donor != 'all') {
            $this->db->where('donor_info.donor_name', $donor);
        }
        if ($year != 'all') {
            $this->db->where('course_info.year', $year);
        }
        if ($dist != 'all') {
            $this->db->where('user_info.per_dist_id', $dist);
        }
        if ($upz != 'all') {
            $this->db->where('user_info.per_upz_id', $upz);
        }
        $this->db->where('user_info.gender', $user_type);

        $this->db->order_by('course_info.start_date');
        $result = $this->db->get();
        return $result->result_array();
    }

    public function getCourseProgress($mnth, $mnthf, $mntht, $year, $donor, $c_cls_type)
    {
        $this->db->select('count(course_info.id) as tCrse,classification_info.*');
        $this->db->from('course_info');
        $this->db->join('donor_info', 'donor_info.id=course_info.donor_id', 'left');
        $this->db->join('classification_info', 'classification_info.id=course_info.classification_id', 'left');
        $this->db->join('course_class', 'course_class.course_class_id=course_info.course_class_id', 'left');

        if ($c_cls_type != 'all') {
            $this->db->where('course_info.course_class_id', $c_cls_type);
        }

        if ($donor != 'all') {
            $this->db->where('donor_info.donor_name', $donor);
        }
        if ($year != 'all') {
            $this->db->where('course_info.year', $year);
        }
        if ($mnth != 'all') {
            $mm = explode('-', $mnth);
            $mmm = $mm[1] . '-' . $mm[0];
            $whr = '( course_info.end_date like "' . $mmm . '%")';
            $this->db->where($whr);
        }
        if ($mnthf != 'all' && $mntht != 'all') {
            $mmf = explode('-', $mnthf);
            $mmmf = $mmf[1] . '-' . $mmf[0];
            $mmt = explode('-', $mntht);
            $mmmt = $mmt[1] . '-' . $mmt[0];
            $whr = '( course_info.end_date >= "' . $mmmf . '" and course_info.end_date <= "' . $mmmt . '" )';
            $this->db->where($whr);
        }
        $this->db->where('course_info.course_status', 2);
        $this->db->group_by('classification_info.id');
        $result = $this->db->get();
        return $result->result_array();
    }

    public function getCourseProgress2($mnth, $mnthf, $mntht, $year, $donor, $c_cls_type, $user)
    {
        $this->db->select('count(user_info.id) as t_stdnt, user_info.gender,classification_info.id as clssftn');
        $this->db->from('review_info');
        $this->db->join('user_info', 'user_info.id=review_info.user_id', 'left');
        $this->db->join('course_info', 'course_info.id=review_info.course_id', 'left');
        $this->db->join('donor_info', 'donor_info.id=course_info.donor_id', 'left');
        $this->db->join('classification_info', 'classification_info.id=course_info.classification_id');
        $this->db->join('course_class', 'course_class.course_class_id=course_info.course_class_id', 'left');

        if ($c_cls_type != 'all') {
            $this->db->where('course_info.course_class_id', $c_cls_type);
        }

        if ($donor != 'all') {
            $this->db->where('donor_info.donor_name', $donor);
        }
        if ($year != 'all') {
            $this->db->where('course_info.year', $year);
        }
        if ($mnth != 'all') {
            $mm = explode('-', $mnth);
            $mmm = $mm[1] . '-' . $mm[0];
            $whr = '( course_info.end_date like "' . $mmm . '%")';
            $this->db->where($whr);
        }
        if ($mnthf != 'all' && $mntht != 'all') {
            $mmf = explode('-', $mnthf);
            $mmmf = $mmf[1] . '-' . $mmf[0];
            $mmt = explode('-', $mntht);
            $mmmt = $mmt[1] . '-' . $mmt[0];
            $whr = '( course_info.end_date >= "' . $mmmf . '%" and course_info.end_date <= "' . $mmmt . '%" )';
            $this->db->where($whr);
        }
        $this->db->where('course_info.course_status', 2);
        $this->db->where('user_info.gender', $user);
        $this->db->group_by('classification_info.id');
        $result = $this->db->get();
        return $result->result_array();
    }

    public function getYear()
    {
        $this->db->distinct();
        $this->db->select('donation_year as d_year');
        $this->db->from('donor_info');
        $result = $this->db->get();
        return $result->result_array();
    }

    public function getElearning($id)
    {
        $this->db->select('*');
        $this->db->from('elearning');
        $this->db->join('course_name', 'course_name.c_id=elearning.c_id', 'left');

        if ($id != 'all') {
            $this->db->where('elearning.e_id', $id);
        }
        $this->db->order_by('course_name.c_id');
        $result = $this->db->get();
        return $result->result_array();
    }

    public function getCourseForElearning()
    {
        $this->db->select('*');
        $this->db->from('course_name');
        $whr = '( c_id <> all( select c_id from elearning ) )';
        $this->db->where($whr);
        $this->db->order_by('course_name.c_id');
        $result = $this->db->get();
        return $result->result_array();
    }

    public function get_teacher_crse_info($t_id)
    {
        $this->db->select('*');
        $this->db->from('teacher_course_rel');
        $this->db->join('course_info', 'course_info.id=teacher_course_rel.course_id', 'left');
        $this->db->join('course_name', 'course_name.c_id=course_info.course_name_id', 'left');
        $this->db->where('teacher_course_rel.teacher_id', $t_id);
        $this->db->order_by('course_info.start_date', 'desc');
        $result = $this->db->get();
        return $result->result_array();
    }

    public function getTeacherListForTeacherReview($c_id)
    {
        $this->db->select('*');
        $this->db->from('teacher_course_rel');
        $this->db->join('teacher_info', 'teacher_info.t_id=teacher_course_rel.teacher_id', 'left');
        $this->db->where('teacher_course_rel.course_id', $c_id);
        $result = $this->db->get();
        return $result->result_array();
    }

    public function getTeacherIn($crse,$tech)
    {
        $this->db->select('*');
        $this->db->from('teacher_course_rel');
        $this->db->join('teacher_info', 'teacher_info.t_id=teacher_course_rel.teacher_id', 'left');
        $this->db->join('designation', 'designation.des_id=teacher_info.designation_id', 'left');
        $this->db->where('teacher_course_rel.course_id', $crse);
        $this->db->where('teacher_course_rel.teacher_id', $tech);
        $result = $this->db->get();
        return $result->result_array();
    }

}

?>