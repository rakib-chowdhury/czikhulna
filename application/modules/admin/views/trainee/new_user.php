<?php $bn_digits = array('০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯'); ?>
<div id="load_img" style="position: absolute;z-index: 1000;top: 50%;left: 40%;display:none;"><img src="<?=base_url();?>assets/img/load_img.gif" alt=""></div>
<style>
    .fixed_width{
        width; 32%;
    }

</style>
<div class="container-fluid display-table">
    <div class="row display-table-row">
        <?php $this->load->view('layouts/sidebar-nav'); ?>
        <div class="col-md-10 display-table-cell" id="main-content">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-hover ">
                        <h2>প্রশিক্ষণার্থী অনলাইন নিবন্ধন ফরম</h2>
                        <hr>
                        <form onsubmit="return add_user_btn()" class="form-horizontal" id="add_user_form"
                              action="<?php echo site_url('admin/add_user_post'); ?>" method="post">
                            <?php
                            if($this->uri->segment(3)){ ?>
                                <input type="hidden" name="ret" value="<?= $this->uri->segment(3);?>">
                            <?php }else{ ?>
                                <input type="hidden" name="ret" value="0">
                            <?php } ?>
                            <div class="form-group ">
                                <label for="user_name" class="col-md-3 control-label" style="text-align: right">প্রশিক্ষণার্থীর
                                    নাম</label>
                                <div class="col-md-7">
                                    <input onblur="check_name('u_name','u_name_err')"
                                           onkeyup="check_name('u_name','u_name_err')" type="text" name="user_name"
                                           placeholder="প্রশিক্ষণার্থীর নাম"
                                           class="form-control" id="u_name"
                                           required>
                                    <span style="color: red;" id="u_name_err"></span>
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="nid" class="col-md-3 control-label" style="text-align: right">জাতীয়
                                    পরিচয়পত্র নম্বর </label>
                                <div class="col-md-7">
                                    <input type="hidden" name="nid_e" id="nid_e" value="1">
                                    <input type="hidden" name="nid_eng" id="nid_eng">
                                    <input onkeyup="check_nid()" onblur="check_nid()" type="text" name="nid" id="nid"
                                           placeholder="জাতীয় পরিচয়পত্র নম্বর "
                                           class="form-control" maxlength="17" minlength="17"
                                           required>
                                    <span style="color: red;" id="nid_err"></span>
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="gender" class="col-md-3 control-label" style="text-align: right">পুরুষ/নারী </label>
                                <div class="col-md-7">
                                    <input type="radio" checked name="gender" value="1" placeholder="পুরুষ/নারী "
                                           required>
                                    পুরুষ &nbsp; &nbsp;
                                    <input type="radio" name="gender" value="2" placeholder="পুরুষ/নারী " required>
                                    নারী
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="father_name" class="col-md-3 control-label" style="text-align: right">পিতার
                                    নাম</label>
                                <div class="col-md-7">
                                    <input onblur="check_text_field('f_name','f_name_err')"
                                           onkeyup="check_text_field('f_name','f_name_err')" type="text"
                                           name="father_name" placeholder="পিতার নাম"
                                           class="form-control" id="f_name"
                                           required>
                                    <span style="color: red;" id="f_name_err"></span>
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="mother_name" class="col-md-3 control-label" style="text-align: right">মাতার
                                    নাম</label>
                                <div class="col-md-7">
                                    <input onblur="check_text_field('m_name','m_name_err')"
                                           onkeyup="check_text_field('m_name','m_name_err')" type="text"
                                           name="mother_name" placeholder="মাতার নাম"
                                           class="form-control" id="m_name"
                                           required>
                                    <span style="color: red;" id="m_name_err"></span>
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="" class="col-md-3 control-label" style="text-align: right">স্থায়ী
                                    ঠিকানা</label>
                                <div class="col-md-7 ">
                                    <input onkeyup="check_text_field('p_address','p_address_err')"
                                           onblur="check_text_field('p_address','p_address_err')" type="text"
                                           name="p_address"
                                           placeholder="স্থায়ী ঠিকানা" id="p_address" class="form-control">
                                    <span style="color: red;" id="p_address_err"></span>
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="" class="col-md-3 control-label" style="text-align: right">বর্তমান
                                    ঠিকানা</label>
                                <div class="col-md-7 ">
                                    <input onkeyup="check_text_field('r_address','r_address_err')"
                                           onblur="check_text_field('r_address','r_address_err')" type="text"
                                           name="r_address"
                                           placeholder="বর্তমান ঠিকানা" id="r_address" class="form-control">
                                    <span style="color: red;" id="r_address_err"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="mobile" class="col-md-3 control-label" style="text-align: right">মোবাইল
                                    নম্বর</label>
                                <div class="col-md-7">
                                    <input type="hidden" name="mobile_eng" id="mobile_eng">
                                    <input onblur="check_mb('mobile','mobile_err')"
                                           onkeyup="check_mb('mobile','mobile_err')" type="text" id="mobile"
                                           name="mobile" placeholder="মোবাইল নম্বর"
                                           class="form-control"
                                           required>
                                    <span style="color: red;" id="mobile_err"></span>
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="email" class="col-md-3 control-label" style="text-align: right">ইমেইল
                                    ঠিকানা</label>
                                <div class="col-md-7" >
                                    <input type="email" name="email"
                                           placeholder="ইমেইল ঠিকানা"
                                           class="form-control" id="email"
                                           >
                                    <span style="color: red;" id="email_err"></span>
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="fb" class="col-md-3 control-label" style="text-align: right">ফেসবুক
                                    ঠিকানা </label>
                                <div class="col-md-7" >
                                    <input type="text" name="fb" placeholder="ফেসবুক ঠিকানা "
                                           class="form-control" id="fb" >
                                    <span id="fb_err" style="color: red;"></span>
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="edu" class="col-md-3 control-label" style="text-align: right">শিক্ষাগত
                                    যোগ্যতা </label>
                                <div class="col-md-7" >
                                    <input onkeyup="check_text_field('edu','edu_err')" onblur="check_text_field('edu','edu_err')" type="text" name="edu" placeholder="শিক্ষাগত যোগ্যতা "
                                           class="form-control" id="edu"
                                           required>
                                    <span style="color: red;" id="edu_err"></span>
                                </div>
                            </div>

                            <div class="form-group ">
                                <label for="classification" class="col-md-3 control-label"
                                       style="text-align: right">প্রশিক্ষণার্থী ধরণ</label>
                                <div class="col-md-7" >
                                    <select required onclick="add_class()" name="classification"
                                            class="form-control"
                                            id="clsss_add">
                                        <option value="">নির্বাচন করুন</option>
                                        <?php foreach ($clssfctn as $c) { ?>
                                            <option value="<?= $c['id']; ?>"><?= $c['class_name']; ?></option>
                                        <?php } ?>
                                        <!--<option value="add">সংযোজন করুন</option>-->
                                    </select>
                                    <span id="class_add_err" style="color: red;"></span>
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="dsgntn" class="col-md-3 control-label" style="text-align: right">পদবী</label>
                                <div class="col-md-7" >
                                    <input onblur="check_text_field('des','des_err')" onkeyup="check_text_field('des','des_err')" type="text" name="dsgntn" placeholder="বর্তমান পেশা "
                                           class="form-control" id="des"
                                           required>
                                    <span id="des_hint" style="color: peru;"></span>
                                    <span style="color: red;" id="des_err"></span>
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="classification" class="col-md-3 control-label"
                                       style="text-align: right">অফিস/সমবায় সমিতির নাম</label>
                                <div class="col-md-7" >
                                    <select required onclick="add_office()" name="office" class="form-control"
                                            id="office_add">
                                        <option value="">নির্বাচন করুন</option>
                                        <?php foreach ($office as $c) { ?>
                                            <option value="<?= $c['id']; ?>"><?= $c['inst_name']; ?></option>
                                        <?php } ?>
                                        <option value="add">সংযোজন করুন</option>
                                    </select>
                                    <span id="add_office_err" style="color: red;"></span>
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="reg_date" class="col-md-3 control-label" style="text-align: right">নিবন্ধন
                                    তারিখ</label>
                                <div class="col-md-7" >
                                    <input onchange="check_date('start_date','reg_err')" onblur="check_date('start_date','reg_err')" type="text" name="reg_date" id="start_date" placeholder="নিবন্ধন তারিখ "
                                           class="form-control"
                                           required>
                                    <span id="reg_err" style="color: red;"></span>
                                </div>
                            </div>

                            <div class="form-group ">
                                <label for="pre_inst" class="col-md-3 control-label" style="text-align: right">গৃহীত প্রশিক্ষণ</label>
                                <div class="col-md-7">
                                    <table class="table table-bordered table-striped " id="trainee"
                                           cellspacing="0" style="margin-bottom: 0px;">
                                        <tr>
                                            <td colspan="5">
                                                <a onclick="add_tt()"  style="width: 100%; cursor:pointer;"
                                                        class="btn btn-success" id="add_t">গৃহীত প্রশিক্ষণ সংযোজন
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td rowspan="2" style="text-align: center;">কোর্সের শিরোনাম</td>
                                            <td rowspan="2" style="text-align: center;">প্রশিক্ষণ প্রতিষ্ঠান</td>
                                            <td colspan="2" style="text-align: center;">কোর্স অনুষ্ঠানের তারিখ</td>
                                            <td rowspan="2" style="text-align: center;">অ্যাকশন</td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: center;">হইতে</td>
                                            <td style="text-align: center;">পর্যন্ত</td>
                                        </tr>
                                    </table>
                                    <span style="color: red;" id="pre_crse_name_err"></span>
                                    <span style="color: red;" id="pre_inst_name_err"></span>
                                    <span style="color: red;" id="pre_strt_date_err"></span>
                                    <span style="color: red;" id="pre_end_date_err"></span>
                                    <span style="color: red;" id="pre_date_validation_err"></span>
                                </div>
                            </div>

                            <div class="form-group" >
                                <div class="col-md-6" align="right">
                                    <button name="user_add" type="submit" class="btn btn-success">দাখিল করুন
                                    </button>
                                </div>
                                <div class="col-md-6">
                                    <?php if($this->uri->segment(3)){ ?>
                                        <a href="<?php echo site_url('admin/new_trainee/'.$this->uri->segment(3)); ?>">
                                            <button type="button" class="btn btn-danger">বাতিল করুন</button>
                                        </a>
                                    <?php }else { ?>
                                        <a href="<?php echo site_url('admin/add_user'); ?>">
                                            <button type="button" class="btn btn-danger">বাতিল করুন</button>
                                        </a>
                                    <?php } ?>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <footer id="admin-footer">
                    <p class="text-center">Copyright &copy; 2016. All right resereved</p>
                </footer>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="add_class_modal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"></button>
                <h4 style="text-align: center;" class="modal-title">প্রশিক্ষণার্থী ধরণ সংযোজন</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="form-group col-md-12 col-md-offset-0">
                        <label for="class_name" class="col-md-3 control-label" style="text-align: right">প্রশিক্ষণার্থী ধরণ এর
                            নাম</label>
                        <div class="col-md-9">
                            <input type="text" id="class_name" class="form-control" required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" onclick="add_class_submit()" class="btn btn-success btn-raised">সাবমিট</button>
                <button type="button" onclick="rmv_modal_class()" class="btn btn-danger btn-raised">ক্লোস</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="add_office_modal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"></button>
                <h4 style="text-align: center;" class="modal-title">অফিস সংযোজন</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="form-group col-md-12 col-md-offset-0">
                        <label for="office_name" class="col-md-3 control-label" style="text-align: right">অফিস এর
                            নাম</label>
                        <div class="col-md-9">
                            <input type="text" id="office_name" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group col-md-12 col-md-offset-0">
                        <label for="office_address" class="col-md-3 control-label" style="text-align: right">অফিস এর
                            ঠিকানা</label>
                        <div class="col-md-9">
                            <input type="text" id="office_address" class="form-control" required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" onclick="add_office_submit()" class="btn btn-success btn-raised">সাবমিট</button>
                <button type="button" onclick="rmv_modal_offc()" class="btn btn-danger btn-raised">ক্লোস</button>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('layouts/footer'); ?>

<script>  

    function validateEmail(email) {
       var re =/^[-a-z0-9~!$%^&*_=+}{\'?]+(\.[-a-z0-9~!$%^&*_=+}{\'?]+)*@([a-z0-9_][-a-z0-9_]*(\.[-a-z0-9_]+)*\.(aero|arpa|biz|com|coop|edu|gov|info|int|mil|museum|name|net|org|pro|travel|mobi|[a-z][a-z])|([0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}))(:[0-9]{1,5})?$/i;
      return re.test(email);
   }

    function check_text_field(id, err_id) {
        var tmp_id = $('#' + id).val();
        tmp_id = tmp_id.replace(/\s+/g, '');

        if (tmp_id == '' || tmp_id == null) {
            document.getElementById(err_id).innerText = 'অনুগ্রহ করে সঠিক তথ্য প্রদান করুন';
        } else {
            document.getElementById(err_id).innerText = '';
        }
    }

    function check_name(id, err_id) {
        var tmp_id = $('#' + id).val();
        tmp_id = tmp_id.replace(/\s+/g, '');

        if (tmp_id == '' || tmp_id == null) {
            document.getElementById(err_id).innerText = 'অনুগ্রহ করে প্রশিক্ষণার্থীর নাম সঠিকভাবে প্রদান করুন';
        } else {
            document.getElementById(err_id).innerText = '';
        }
    }

    function check_nid() {
        var tmp_nid = $('#nid').val().getDigitEnglishFromBangla();
        //console.log(tmp_nid);
        //console.log(tmp_nid.length);
        if (tmp_nid == '' || tmp_nid == null || isNaN(tmp_nid) || tmp_nid.length != 17) {
            document.getElementById('nid_e').value=0;
            document.getElementById('nid_err').innerText = "জাতীয় পরিচয়পত্র নম্বর টি সঠিকভাবে প্রদান করুন।১৭ডিজিট (জন্মসাল + জাতীয় পরিচয়পত্র নম্বর )";
        } else {
            $.ajax({
                 type:'post',
                 url:'<?= site_url('admin/check_nid');?>',
                 data:{
                      nid:tmp_nid
                 },success:function(data){
                      console.log(data);
                      if(data==1){
                          document.getElementById('nid_e').value=1;
                          document.getElementById('nid_err').innerText = "";             
                      }else{
                           document.getElementById('nid_e').value=0;
                           $data1=$.parseJSON(data);                           
                           document.getElementById('nid_err').innerText = "জাতীয় পরিচয়পত্র নম্বর টি "+$data1['res'][0]['name']+" নাম এ নিবন্ধন করা আছে। অনুগ্রহ করে সঠিক তথ্য প্রদান করুন";
                      }
                 }
            });            
        }        

    }

    function check_date(id,err_id) {
        var tmp_date = $('#'+id).val();
        if (tmp_date == '' || tmp_date == null || tmp_date == '00-00-0000') {
            document.getElementById(err_id).innerText = 'অনুগ্রহ করে সঠিক তারিখ প্রদান করুন';
        } else {
            document.getElementById(err_id).innerText = '';
        }
    }

    function check_mb(id, err_id) {
        var tmp_mb = $('#' + id).val().getDigitEnglishFromBangla();
        console.log(tmp_mb.length);
        if (isNaN(tmp_mb) || tmp_mb == '' || tmp_mb == null || tmp_mb.length != 11 || tmp_mb.substr(0, 1) != 0 || tmp_mb.substr(1, 1) != 1) {
            document.getElementById(err_id).innerText = "১১ডিজিট(০১*********)সঠিকভাবে মোবাইল নম্বর প্রদান করুন";
        } else {
            document.getElementById(err_id).innerText = '';
        }
    }

    function add_user_btn() {
        var flag = true;
        var nid_flag = true;

        var tmp_name = $('#u_name').val();
        tmp_name = tmp_name.replace(/\s+/g, '');
        var tmp_nid = $('#nid').val().getDigitEnglishFromBangla();
        var tmp_fname = $('#f_name').val();
        tmp_fname = tmp_fname.replace(/\s+/g, '');
        var tmp_mname = $('#m_name').val();
        tmp_mname = tmp_mname.replace(/\s+/g, '');
        var tmp_p_address = $('#p_address').val();
        tmp_p_address = tmp_p_address.replace(/\s+/g, '');
        var tmp_r_address = $('#r_address').val();
        tmp_r_address = tmp_r_address.replace(/\s+/g, '');
        var tmp_mb = $('#mobile').val().getDigitEnglishFromBangla();
        var tmp_email = $('#email').val();
        tmp_email = tmp_email.replace(/\s+/g, '');

        var tmp_edu = $('#edu').val();
        tmp_edu = tmp_edu.replace(/\s+/g, '');
        var tmp_des = $('#des').val();
        tmp_des = tmp_des.replace(/\s+/g, '');
        var tmp_u_type=$('#clsss_add').val();
        var tmp_office=$('#office_add').val();
        var tmp_reg=$('#start_date').val();
      
        if (tmp_name == '' || tmp_name == null) {
            document.getElementById('u_name_err').innerText = 'অনুগ্রহ করে প্রশিক্ষণার্থীর নাম সঠিকভাবে প্রদান করুন';
            flag = false;
        } else {
            document.getElementById('u_name_err').innerText = '';
        }

        /*if (tmp_nid == '' || tmp_nid == null || isNaN(tmp_nid)) {
            flag = false;
            nid_flag = false;
            document.getElementById('nid_err').innerText = "জাতীয় পরিচয়পত্র নম্বর টি সঠিকভাবে প্রদান করুন";
        }*/
        if(document.getElementById('nid_e').value==1){
        }else{
            flag = false;
            nid_flag = false;
            //document.getElementById('nid_err').innerText = "জাতীয় পরিচয়পত্র নম্বর টি সঠিকভাবে প্রদান করুন";
        }
        if (nid_flag == true) {
            if (tmp_nid.length != 17) {
                flag = false;
                document.getElementById('nid_err').innerText = "১৭ডিজিট (জন্মসাল + জাতীয় পরিচয়পত্র নম্বর)";
            }
        }

        if (tmp_fname == '' || tmp_fname == null) {
            flag=false;
            document.getElementById('f_name_err').innerText = 'অনুগ্রহ করে সঠিক তথ্য প্রদান করুন';
        } else {
            document.getElementById('f_name_err').innerText = '';
        }

        if (tmp_mname == '' || tmp_mname == null) {
            flag=false;
            document.getElementById('m_name_err').innerText = 'অনুগ্রহ করে সঠিক তথ্য প্রদান করুন';
        } else {
            document.getElementById('m_name_err').innerText = '';
        }

        if (tmp_p_address == '' || tmp_p_address == null) {
            flag=false;
            document.getElementById('p_address_err').innerText = 'অনুগ্রহ করে সঠিক তথ্য প্রদান করুন';
        } else {
            document.getElementById('p_address_err').innerText = '';
        }

        if (tmp_r_address == '' || tmp_r_address == null) {
            flag=false;
            document.getElementById('r_address_err').innerText = 'অনুগ্রহ করে সঠিক তথ্য প্রদান করুন';
        } else {
            document.getElementById('r_address_err').innerText = '';
        }

        if (isNaN(tmp_mb) || tmp_mb == '' || tmp_mb == null || tmp_mb.length != 11 || tmp_mb.substr(0, 1) != 0 || tmp_mb.substr(1, 1) != 1) {
            flag = false;
            document.getElementById('mobile_err').innerText = "১১ডিজিট(০১*********)সঠিকভাবে মোবাইল নম্বর প্রদান করুন";
        } else {
            document.getElementById('mobile_err').innerText = '';
        }

//        if (tmp_email == '' || tmp_email == null) {
//            flag=false;
//            document.getElementById('email_err').innerText = 'অনুগ্রহ করে সঠিক তথ্য প্রদান করুন';
//        } else {
//            document.getElementById('email_err').innerText = '';
//        }

         var tmp_emails = $('#email').val();

      if (tmp_emails == '' || tmp_emails == null){

      }else{
           if (validateEmail(tmp_email)) {
            document.getElementById('email').value = tmp_email;
            document.getElementById('email_err').innerText = '';
           } else {
              document.getElementById('email_err').innerText = 'অনুগ্রহ করে ইমেইল সঠিকভাবে প্রদান করুন';
              flag = false;
           }
      }     



        if (tmp_edu == '' || tmp_edu == null) {
            flag=false;
            document.getElementById('edu_err').innerText = 'অনুগ্রহ করে সঠিক তথ্য প্রদান করুন';
        } else {
            document.getElementById('edu_err').innerText = '';
        }

        if (tmp_des == '' || tmp_des == null) {
            flag=false;
            document.getElementById('des_err').innerText = 'অনুগ্রহ করে সঠিক তথ্য প্রদান করুন';
        } else {
            document.getElementById('des_err').innerText = '';
        }

        if (tmp_u_type == '' || tmp_u_type == null) {
            flag=false;
            document.getElementById('class_add_err').innerText = 'প্রশিক্ষণার্থী ধরণ নির্বাচন করুন';
        } else {
            document.getElementById('class_add_err').innerText = '';
        }

        if (tmp_office == '' || tmp_office == null) {
            flag=false;
            document.getElementById('add_office_err').innerText = 'প্রশিক্ষণার্থী ধরণ নির্বাচন করুন';
        } else {
            document.getElementById('add_office_err').innerText = '';
        }

        if (tmp_reg == '' || tmp_reg == null || tmp_reg == '00-00-0000') {
            document.getElementById('reg_err').innerText = 'অনুগ্রহ করে সঠিক তারিখ প্রদান করুন';
        } else {
            document.getElementById('reg_err').innerText = '';
        }

        pre_name_err=false;
        pre_inst_err=false;
        pre_strt_err=false;
        pre_end_err=false;
        pre_date_validation_err=false;

        $('input[name^="pre_c_name"]').each(function() {
            console.log($(this).val());
            tmp=$(this).val();
            tmp = tmp.replace(/\s+/g, '');
            if(tmp=='' || tmp==null){
                pre_name_err=true;
            }
        });

        $('input[name^="pre_c_inst"]').each(function() {
            console.log($(this).val());
            tmp=$(this).val();
            tmp = tmp.replace(/\s+/g, '');
            if(tmp=='' || tmp==null){
                pre_inst_err=true;
            }
        });

        var tmp_strt = $( "[name^='pre_c_st_date']" );
        var tmp_end = $( "[name^='pre_c_end_date']" );

        $.each(tmp_strt,function (i,v) {
            console.log(i+'  '+v.value+' '+tmp_strt[i].value+' '+tmp_end[i].value);
            if(tmp_strt[i].value=='' || tmp_strt[i].value==null){
                pre_strt_err=true;
            }
            if(tmp_end[i].value=='' || tmp_end[i].value==null){
                pre_end_err=true;
            }
            date_diff = (new Date(tmp_end[i].value) - new Date(tmp_strt[i].value)) / 1000 / 60 / 60 / 24;
            console.log(date_diff);
            if(date_diff<0){
                pre_date_validation_err=true;
                pre_strt_err=true;
                pre_end_err=true;
            }
        });

        if(pre_name_err==true){
            flag=false;
            document.getElementById('pre_crse_name_err').innerHTML='*** গৃহীত প্রশিক্ষণের নাম সঠিকভাবে প্রদান করুন'+'<br>';
        }else{
            document.getElementById('pre_crse_name_err').innerText='';
        }
        if(pre_inst_err==true){
            flag=false;
            document.getElementById('pre_inst_name_err').innerHTML='*** গৃহীত প্রশিক্ষণ প্রতিষ্ঠান এর নাম সঠিকভাবে প্রদান করুন'+'<br>';
        }else{
            document.getElementById('pre_inst_name_err').innerText='';
        }
        if(pre_strt_err==true){
            flag=false;
            document.getElementById('pre_strt_date_err').innerHTML='*** গৃহীত প্রশিক্ষণ শুরু হবার সঠিক তারিখ প্রদান করুন'+'<br>';
        }else{
            document.getElementById('pre_strt_date_err').innerText='';
        }
        if(pre_end_err==true){ console.log('end err');
            flag=false;
            document.getElementById('pre_end_date_err').innerHTML='*** গৃহীত প্রশিক্ষণ শেষ হবার সঠিক তারিখ প্রদান করুন'+'<br>';
        }else{
            document.getElementById('pre_end_date_err').innerText='';
        }
        if(pre_date_validation_err==true){ console.log('validation err');
            flag=false;
            document.getElementById('pre_date_validation_err').innerHTML='';
        }else{
            document.getElementById('pre_date_validation_err').innerText='';
        }

        console.log(flag);
        if (flag == true) {
            document.getElementById('nid_eng').value = tmp_nid;
            document.getElementById('mobile_eng').value = tmp_mb;
           // alert('Trainee Registrattion Successful..');
            //$('#add_user_form').submit()
           
             $("html, body").animate({ scrollTop: 0 }, "slow");
            
            document.getElementById("load_img").style.display="block"
            document.getElementById("main-content").style.opacity="0.1";
           
        }
        return flag;
    }

    function get_class_val() {
        console.log('get val');
        $.ajax({
            type: 'post',
            url: '<?= site_url('admin/get_classification');?>',
            data: {}, success: function (data) {
                console.log(data);

                data1 = $.parseJSON(data);

                $('#clsss_add option:gt(0)').remove();
                $.each(data1['res'], function (index, value) {
                    var op = '<option value="' + value['id'] + '">' + value['class_name'] + '</option>';
                    $('#clsss_add').append(op);
                });
                $('#clsss_add').append('<option value="add">সংযোজন করুন</option>');
            }
        });
    }
    function add_class() {
        var v = $('#clsss_add').val();
        if (v == 'add') {
            console.log('add');
            document.getElementById('des_hint').innerHTML="";
            $('#add_class_modal').modal('show');
        }else if(v==''){ 
            document.getElementById('des_hint').innerHTML="";           
            document.getElementById('class_add_err').innerText="প্রশিক্ষণার্থী ধরণ নির্বাচন করুন";
        }else{
            if(v==1){
                document.getElementById('des_hint').innerHTML="** সাধারণ সদস্য, ব্যবস্থাপনা কমিটি সদস্য, সভাপতি, সহসভাপতি, সম্পাদক, কোষাধ্যক, ম্যানেজার, সাধারণ সদস্য ও হিসাব রক্ষক, সাধারণ সদস্য ও ম্যানেজার, অন্যান্য";
            }else if(v==2){
                document.getElementById('des_hint').innerHTML="** সহকারী পরিদর্শক/প্রশিক্ষক ও সমমান, হিসাব  রক্ষক, অফিস সহকারী ও সমমান, ক্যাশিয়ার, অফিস সহায়ক, নিরাপত্তা প্রহরী, অন্যান্য";
            }else if(v==3){
                document.getElementById('des_hint').innerHTML="** অন্যান্য";
            }else{
                document.getElementById('des_hint').innerHTML="";
            }
            document.getElementById('class_add_err').innerText="";

        }
    }
    function add_class_submit() {
        var n = $('#class_name').val();
        console.log(n);
        if (n == null || n == '' || n == ' ') {

        } else {
            $.ajax({
                type: 'post',
                url: '<?= site_url('admin/add_classification');?>',
                data: {
                    name: n
                }, success: function (data) {
                    get_class_val();
                    $('#add_class_modal').modal('hide');
                    document.getElementById('class_name').value = '';
                }
            });
        }

    }
    function rmv_modal_class() {
        get_class_val();
        $('#add_class_modal').modal('hide');
    }

    function get_office_val() {
        console.log('get val');
        $.ajax({
            type: 'post',
            url: '<?= site_url('admin/get_office');?>',
            data: {}, success: function (data) {
                console.log(data);

                data1 = $.parseJSON(data);

                $('#office_add option:gt(0)').remove();
                $.each(data1['res'], function (index, value) {
                    var op = '<option value="' + value['id'] + '">' + value['office_name'] + ' ' + value['address'] + '</option>';
                    $('#office_add').append(op);
                });
                $('#office_add').append('<option value="add">সংযোজন করুন</option>');
            }
        });
    }
    function add_office() {
        var v = $('#office_add').val();
        if (v == 'add') {
            console.log('add');
            $('#add_office_modal').modal('show');
        }else if(v==''){
            document.getElementById('add_office_err').innerText='অফিস নির্বাচন করুন';
        }else{
            document.getElementById('add_office_err').innerText='';
        }
    }
    function add_office_submit() {
        var n = $('#office_name').val();
        var a = $('#office_address').val();
        console.log(n);
        if (n == null || n == '' || n == ' ') {

        } else {
            $.ajax({
                type: 'post',
                url: '<?= site_url('admin/add_office');?>',
                data: {
                    name: n,
                    address: a
                }, success: function (data) {
                    get_office_val();
                    $('#add_office_modal').modal('hide');
                    document.getElementById('office_name').value = '';
                }
            });
        }

    }
    function rmv_modal_offc() {
        get_office_val();
        $('#add_office_modal').modal('hide');
    }

    $(document).on('click', '.rmv', function (event) {
        event.preventDefault();
        $(this).closest('tr').remove();

    });

    function add_tt() {
        var trow = '<tr>'
            +'<td>'
            +'<input type="text" name="pre_c_name[]" class="form-control">'
            +'</td>'
            +'<td>'
            +'<input type="text" name="pre_c_inst[]" class="form-control">'
            +'</td>'
            +'<td>'
            +'<input style="width:90px;" type="text" name="pre_c_st_date[]" class="form-control datepick_class">'
            +'</td>'
            +'<td>'
            +'<input style="width:90px;" type="text" name="pre_c_end_date[]" class="form-control datepick_class">'
            +'</td>'
            +'<td>'
            +'<a style="cursor:pointer;" class="btn btn-danger rmv">বাতিল</a>'
            +'</td>'
            + '</tr>';
        $(document).find(".datepick_class").unbind().bind();
        $('#trainee').append(trow);
    }

</script>
