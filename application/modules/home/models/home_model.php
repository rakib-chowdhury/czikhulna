<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Home_model extends CI_Model
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

    public function updateCond($cond, $tableName, $data)
    {
        $whr= '('.$cond.')';
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
    public function getWhereOrder($selector, $condition, $tablename,$order_cond,$order_cond1)
    {
        $this->db->select($selector);
        $this->db->from($tablename);
        $where = '(' . $condition . ')';
        $this->db->where($where);
        $this->db->order_by($order_cond,$order_cond1);
        $result = $this->db->get();
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


    public function getCourseUser($uID,$cID){
        $this->db->select('* ');
        $this->db->from('review_info');
        $this->db->join('user_info', 'user_info.id=review_info.user_id');
        $this->db->join('course_info', 'course_info.id=review_info.course_id');
        $this->db->join('course_name', 'course_name.c_id=course_info.course_name_id');
        $this->db->where('course_info.id',$cID);
        $this->db->where('user_info.id',$uID);

        $result = $this->db->get();
        return $result->result_array();
    }

    public function getTempCourseUser($uID,$cID){
        $this->db->select('* ');
        $this->db->from('temp_user_crse');
        $this->db->join('user_info', 'user_info.id=temp_user_crse.user_id');
        $this->db->join('course_info', 'course_info.id=temp_user_crse.course_id');
        $this->db->join('course_name', 'course_name.c_id=course_info.course_name_id');
        $this->db->where('course_info.id',$cID);
        $this->db->where('user_info.id',$uID);

        $result = $this->db->get();
        return $result->result_array();
    }

    /////basic query ends/////


     public function getApaVal($type,$sub){
        $this->db->select('*');
        $this->db->from('apa_info');
        $this->db->where('type',$type);
        $this->db->where('sub_id',$sub);
        $this->db->group_by('donor_type');
        $result = $this->db->get();
        return $result->result_array();
    }

   ////getTeacher
   public function getTeacher($c_id){
        $this->db->select('*');
        $this->db->from('teacher_course_rel');
        $this->db->join('course_info','course_info.id=teacher_course_rel.course_id');
        $this->db->join('teacher_info', 'teacher_info.t_id=teacher_course_rel.teacher_id', 'left');
        $this->db->where('teacher_course_rel.course_id',$c_id);
        $result=$this->db->get();
        return $result->result_array();
   }

    public function getCourse(){
        $this->db->select('course_info.*,course_name.*');
        $this->db->from('temp_review');
        $this->db->join('course_info','temp_review.course_id=course_info.id');
        $this->db->join('course_name', 'course_name.c_id=course_info.course_name_id', 'left');
        $this->db->group_by('temp_review.course_id');
        $result=$this->db->get();
        return $result->result_array();
    }

 public function getCourseTeacher(){
        $this->db->select('course_info.*,course_name.*');
        $this->db->from('temp_teacher_review');
        $this->db->join('course_info','temp_teacher_review.course_id=course_info.id');
        $this->db->join('course_name', 'course_name.c_id=course_info.course_name_id', 'left');
        $this->db->group_by('temp_teacher_review.course_id');
        $result=$this->db->get();
        return $result->result_array();
    }

    public function checkNID($cid,$nid){
       /* $sql='select *, user_info.id as u_id from temp_review where course_id='.$cid.' and user_id=( select id from user_info where nid="'.$nid.'")';
        $result=$this->db->query($sql);
        return $result->result_array();*/
        $this->db->select('*, user_info.id as u_id');
        $this->db->from('temp_review');
        $this->db->join('course_info','temp_review.course_id=course_info.id','left');
        $this->db->join('user_info', 'user_info.id=temp_review.user_id', 'left');
        $this->db->where('temp_review.course_id',$cid);
        $this->db->where('user_info.nid',$nid);
        $result=$this->db->get();
        return $result->result_array();
    }

    public function checkNIDforTeacherReview($cid,$nid,$tid){        
        $this->db->select('*, user_info.id as u_id');
        $this->db->from('temp_teacher_review');
        $this->db->join('course_info','temp_teacher_review.course_id=course_info.id','left');
        $this->db->join('user_info', 'user_info.id=temp_teacher_review.user_id', 'left');
        $this->db->join('teacher_info', 'teacher_info.t_id=temp_teacher_review.teacher_id', 'left');
        $this->db->where('temp_teacher_review.course_id',$cid);
        $this->db->where('temp_teacher_review.teacher_id',$tid);
        $this->db->where('user_info.nid',$nid);
        $result=$this->db->get();
        return $result->result_array();
    }
    
    public function getCourseInfo($type){
        $this->db->select('* , course_info.id as c_id');
        $this->db->from('course_info');
        $this->db->join('donor_info', 'donor_info.id=course_info.donor_id', 'left');
        $this->db->join('course_name', 'course_name.c_id=course_info.course_name_id', 'left');
        $this->db->join('classification_info', 'classification_info.id=course_info.classification_id', 'left');
        $this->db->join('course_class', 'course_class.course_class_id=course_info.course_class_id', 'left');
        if($type==0){
            
        }elseif($type==1){
            $d=date('Y-m-d');
            $where='( course_info.start_date = "'.$d.'"  or course_info.end_date = "'.$d.'" or ( course_info.start_date < "'.$d.'" and course_info.end_date > "'.$d.'" ) )';
            $this->db->where($where);
        }elseif ($type==2){
            $d=date('Y-m-d');
            $where='( course_info.start_date > "'.$d.'")';
            $this->db->where($where);
        }
        $this->db->order_by('course_info.start_date','asc');        
        $result = $this->db->get();
        return $result->result_array();
    }

 public function getCourseInfoCrr($year){
        $this->db->select('* , course_info.id as c_id');
        $this->db->from('course_info');
        $this->db->join('donor_info', 'donor_info.id=course_info.donor_id', 'left');
        $this->db->join('course_name', 'course_name.c_id=course_info.course_name_id', 'left');
        $this->db->join('classification_info', 'classification_info.id=course_info.classification_id', 'left');
        $this->db->join('course_class', 'course_class.course_class_id=course_info.course_class_id', 'left');
        $this->db->where('course_info.year',$year);       
        $this->db->order_by('course_info.start_date','desc');        
        $result = $this->db->get();
        return $result->result_array();
    }

 public function getCourseInfoArc($year){
        $this->db->select('* , course_info.id as c_id');
        $this->db->from('course_info');
        $this->db->join('donor_info', 'donor_info.id=course_info.donor_id', 'left');
        $this->db->join('course_name', 'course_name.c_id=course_info.course_name_id', 'left');
        $this->db->join('classification_info', 'classification_info.id=course_info.classification_id', 'left');
        $this->db->join('course_class', 'course_class.course_class_id=course_info.course_class_id', 'left');
        $this->db->where_not_in('course_info.year',$year);       
        $this->db->order_by('course_info.start_date','desc');        
        $result = $this->db->get();
        return $result->result_array();
    }

    public function getTraineeInfo($c_id)
    {
        $this->db->select('*, user_info.name as u_name,user_info.id as u_id');
        $this->db->from('review_info');
        $this->db->join('user_info', 'user_info.id=review_info.user_id','left');
        $this->db->join('designation', 'designation.des_id=user_info.designation_id', 'left');
        $this->db->join('course_info', 'course_info.id=review_info.course_id','left');
        $this->db->join('course_name', 'course_name.c_id=course_info.course_name_id', 'left');
        $this->db->join('classification_info', 'classification_info.id=course_info.classification_id','left');
        $this->db->join('institute', 'institute.inst_id=user_info.office_id','left');
        $this->db->join('division','division.div_id=institute.inst_div_id','left');
        $this->db->join('district','district.dist_id=institute.inst_dist_id','left');
        $this->db->join('upazilla','upazilla.upz_id=institute.inst_upz_id','left');
        $this->db->where('review_info.course_id', $c_id);
        $result = $this->db->get();
        return $result->result_array();
    }
     public function get_user_details($u_id)
    {
        $this->db->select('*, user_info.id as u_id, user_info.name as u_name, institute.inst_id as o_id, classification_info.id as c_id, division.bn_div_name as pDiv, district.bn_dist_name as pDist, upazilla.bn_upz_name as pUpz, idiv.bn_div_name as Idiv, idist.bn_dist_name as Idist, iupz.bn_upz_name as Iupz');
        $this->db->from('user_info');
        $this->db->join('division','division.div_id=user_info.per_div_id','left');
        $this->db->join('district','district.dist_id=user_info.per_dist_id','left');
        $this->db->join('upazilla','upazilla.upz_id=user_info.per_upz_id','left');
        $this->db->join('classification_info', 'classification_info.id=user_info.classification_id', 'left');
        $this->db->join('designation', 'designation.des_id=user_info.designation_id', 'left');
        $this->db->join('profession', 'profession.prf_id=user_info.profession_id', 'left');
        $this->db->join('education', 'education.edu_id=user_info.education_id', 'left');
        $this->db->join('institute', 'institute.inst_id=user_info.office_id', 'left');
        $this->db->join('division idiv','idiv.div_id=institute.inst_div_id','left');
        $this->db->join('district idist','idist.dist_id=institute.inst_dist_id','left');
        $this->db->join('upazilla iupz','iupz.upz_id=institute.inst_upz_id','left');
        $this->db->join('blood_group', 'blood_group.blood_grp_id=user_info.blood_grp_id', 'left');
        $this->db->where('user_info.id', $u_id);
        $result = $this->db->get();
        return $result->result_array();
    }
     public function getDemand($id)
    {
        $this->db->select('*, user_info.id as u_id');
        $this->db->from('demand_info');
        $this->db->join('user_info', 'user_info.id=demand_info.user_id', 'left');
        $this->db->join('classification_info', 'classification_info.id=user_info.classification_id', 'left');
        $this->db->join('designation', 'designation.des_id=user_info.designation_id', 'left');
        $this->db->join('institute', 'institute.inst_id=user_info.office_id', 'left');
        $this->db->join('division', 'division.div_id=institute.inst_div_id', 'left');
        $this->db->join('district', 'district.dist_id=institute.inst_dist_id', 'left');
        $this->db->join('upazilla', 'upazilla.upz_id=institute.inst_upz_id', 'left');
        $this->db->order_by('demand_info.demand_date', 'desc');

        $result = $this->db->get();
        return $result->result_array();
    }
  public function get_donor_info($id)
    {
        $this->db->select('*');
        $this->db->from('donor_info');
        $this->db->where('id', $id);
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

     public function get_avg_review($c_id)
    {
         $sql = "SELECT sum(review)/count(id) as avg FROM `review_info` where course_id=" . $c_id." and review<>0";
        $result = $this->db->query($sql);
        return $result->result_array();
    }

    public function getYear(){
        $this->db->distinct();
        $this->db->select('year');
        $this->db->from('course_info');
        $result = $this->db->get();
        return $result->result_array();
    }

    public function getCourseNum($d_name,$y){
        $this->db->select('count(course_info.id) as t, course_info.year');
        $this->db->from('course_info');
        $this->db->join('donor_info','donor_info.id=course_info.donor_id','left');
        $this->db->where('donor_info.donor_name',$d_name);
        $this->db->where('course_info.year',$y);
        $result=$this->db->get();
        return $result->result_array();
    }

    public function getCourseBudget($d_name,$y){
        $this->db->select('sum(course_info.expenditure) as t, course_info.year');
        $this->db->from('course_info');
        $this->db->join('donor_info','donor_info.id=course_info.donor_id','left');
        $this->db->where('donor_info.donor_name',$d_name);
        $this->db->where('course_info.year',$y);
        $result=$this->db->get();
        return $result->result_array();
    }

    public function getTraineeNum($y,$gender){//1=male 2=female
        $this->db->select('count(review_info.id) as t,course_info.year');
        $this->db->from('review_info');
        $this->db->join('user_info', 'user_info.id=review_info.user_id');
        $this->db->join('course_info', 'course_info.id=review_info.course_id');
        $this->db->where('user_info.gender',$gender);
        $this->db->where('course_info.year',$y);
        $result = $this->db->get();
        return $result->result_array();
    }
    public function getIdea($type){
        $this->db->select('*');
        $this->db->from('idea_info');
        $this->db->join('idea_sender','idea_sender.id=idea_info.idea_sender_id','left');
        $this->db->where('idea_info.idea_status',$type);
        $this->db->order_by('idea_info.idea_created_at','desc');

        $result=$this->db->get();
        return $result->result_array();
    }
    public function getInstInfo($cls_id){
        $this->db->select('*');
        $this->db->from('institute');
        $this->db->join('division','division.div_id=institute.inst_div_id','left');
        $this->db->join('district','district.dist_id=institute.inst_dist_id','left');
        $this->db->join('upazilla','upazilla.upz_id=institute.inst_upz_id','left');
        $this->db->where('institute.inst_status',1);
        $this->db->where('institute.classification_id',$cls_id);
        $result=$this->db->get();
        return $result->result_array();
    }

    public function getFutureCourseInfo(){
        //$this->db->distinct();
        $this->db->select('course_name.c_name, course_name.c_id');
        $this->db->from('course_info');
        $this->db->join('course_name','course_name.c_id=course_info.course_name_id','left');
       // $whr='course_info.start_date > "'.date('Y-m-d').'"';
        //$this->db->where($whr);
        $this->db->group_by('course_info.course_name_id');
        $result = $this->db->get();
        return $result->result_array();
    }
    public function getFutureCourseTime($c_id,$clss){
        $this->db->select('course_info.*, course_info.id as c_id');
        $this->db->from('course_info');
        $this->db->join('course_name','course_name.c_id=course_info.course_name_id','left');
        $this->db->where('course_info.course_name_id',$c_id);
        $this->db->where('course_info.classification_id',$clss);
        $this->db->where('course_info.course_status',1);
        //$whr='course_info.start_date > "'.date('Y-m-d').'"';
        //$this->db->where($whr);
        $result = $this->db->get();
        return $result->result_array();
    }


    public function get_user_info($c_id)
    {
        $this->db->select('*,user_info.name as u_name,user_info.id as u_id');
        $this->db->from('review_info');
        $this->db->join('user_info', 'user_info.id=review_info.user_id','left');
        $this->db->join('course_info', 'course_info.id=review_info.course_id','left');
        $this->db->join('course_name', 'course_name.c_id=course_info.course_name_id', 'left');
        $this->db->join('classification_info', 'classification_info.id=course_info.classification_id','left');
        $this->db->join('designation', 'designation.des_id=user_info.designation_id', 'left');
        $this->db->join('institute', 'institute.inst_id=user_info.office_id', 'left');
        $this->db->join('division', 'division.div_id=institute.inst_div_id', 'left');
        $this->db->join('district', 'district.dist_id=institute.inst_dist_id', 'left');
        $this->db->join('upazilla', 'upazilla.upz_id=institute.inst_upz_id', 'left');
        $this->db->where('review_info.course_id', $c_id);
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
    public function getElearning($id){
        $this->db->select('*');
        $this->db->from('elearning');
        $this->db->join('course_name', 'course_name.c_id=elearning.c_id', 'left');

        if ($id != 'all') {
            $this->db->where('elearning.e_id', $id);
        }
        $this->db->where('e_status',1);
        $this->db->order_by('course_name.c_id');
        $result = $this->db->get();
        return $result->result_array();
    }

    public function getCourseReq($id){
        $this->db->select('*');
        $this->db->from('course_requirement');
        $this->db->join('course_info', 'course_info.id=course_requirement.course_id');
        $this->db->where('course_info.course_name_id', $id);
        $result = $this->db->get();
        return $result->result_array();

    }

}

?>