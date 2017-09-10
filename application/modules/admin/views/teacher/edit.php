<?php $bn_digits = array('০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯'); ?>
<div class="container-fluid display-table">
    <div class="row display-table-row">
        <?php $this->load->view('layouts/sidebar-nav'); ?>
        <div class="col-md-10 display-table-cell" id="main-content">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-hover ">
                        <h2 style="text-align: center">বক্তা/প্রশিক্ষকের তথ্য সংশোধন</h2>
                        <hr>
                        <?php if (sizeof($teacher_info) == 0) {
                            echo 'no data available';
                        } else { ?>
                            <form class="form-horizontal" onsubmit="return online_reg()" method="post"
                                  action="<?php echo site_url('admin/teacher_info_edit_post'); ?>" >
                                <input type="hidden" name="teacher_id" value="<?= $teacher_info[0]['t_id']; ?>">
                                <div class="row">
                                    <div class="col-md-6">
                                        <!--name bangla--->
                                        <div class="form-group ">
                                            <label for="name_bng" class="control-label col-md-10"
                                                   style="text-align: left">নাম (বাংলা NID অনুযায়ী):</label>
                                            <div class="col-md-12">
                                                <input type="text" name="name_bng" class="form-control"
                                                       placeholder="নাম" id="name_bng"
                                                       value="<?= $teacher_info[0]['t_name']; ?>"
                                                       required>
                                                <span style="color: red;" id="name_bng_err"></span>
                                            </div>
                                        </div>
                                        <!--name eng--->
                                        <div class="form-group ">
                                            <label for="name_eng" class="col-md-12 control-label"
                                                   style="text-align: left">নাম (ইংরেজী NID অনুযায়ী):</label>
                                            <div class="col-md-12">
                                                <input type="text" name="name_eng" class="form-control"
                                                       placeholder="নাম" id="name_eng"
                                                       value="<?= $teacher_info[0]['t_name_eng']; ?>"
                                                >
                                                <span style="color: red;" id="name_eng_err"></span>
                                            </div>
                                        </div>

                                        <!--nid--->
                                        <div class="form-group">
                                            <label for="nid" class="col-md-12 control-label"
                                                   style="text-align: left">জাতীয় পরিচয়পত্র নম্বর:</label>
                                            <div class="col-md-12">
                                                <input type="text" name="nid" id="nid" maxlength="17" minlength="17"
                                                       class="form-control" required
                                                       value="<?= str_replace(range(0, 9), $bn_digits, $teacher_info[0]['t_nid']); ?>" >
                                            </div>
                                            <span id="nid_err" style="color: red;"></span>
                                        </div>
                                        <!--dob--->
                                        <div class="form-group">
                                            <label class="col-md-12 control-label" style="text-align: left" for="dob">জন্ম
                                                তারিখ ( NID অনুযায়ী ):</label>
                                            <div class="col-md-12">
                                                <?php
                                                if($teacher_info[0]['t_dob']==null || $teacher_info[0]['t_dob']==''){
                                                    $dobDa='';
                                                }else{
                                                    $dobD=explode('-',$teacher_info[0]['t_dob']);
                                                    $dobDa=$dobD[2].'/'.$dobD[1].'/'.$dobD[0];
                                                }
                                                ?>
                                                <input readonly type="text" name="dob" id="dob" class="form-control"
                                                       required value="<?= str_replace(range(0, 9), $bn_digits, $dobDa); ?>">
                                                <span id="dob_err" style="color: red;"></span>
                                            </div>
                                        </div>
                                        <!--age--->
                                        <!--<div class="form-group">
                                            <label class="col-md-12 control-label" style="text-align: left" for="age">বয়স:</label>
                                            <div class="col-md-12">
                                                <input readonly type="text" name="age" id="age" class="form-control"
                                                       required value="<?= str_replace(range(0,9),$bn_digits,$age)?>">
                                                <span id="age_err" style="color: red;"></span>
                                            </div>
                                        </div>-->
                                        <!--gender--->
                                        <div class="form-group">
                                            <label class="col-md-12 control-label" style="text-align: left" for="gender"
                                                   class="col-md-12 col-sm-12 col-xs-12 col-lg-12"
                                                   style="padding-left: 0px;">লিঙ্গ:</label>
                                            <div class="col-md-12">
                                                <input type="radio" name="gender" value='1' <?php if($teacher_info[0]['t_gender']==1){ echo 'checked'; }?>  class="" required>পুরুষ
                                                &nbsp;&nbsp;
                                                <input type="radio" name="gender" value='2' <?php if($teacher_info[0]['t_gender']==2){ echo 'checked'; }?> class="" required>নারী
                                                <span id="gender_err" style="color: red;"></span>
                                            </div>
                                        </div>
                                        <!--f_name--->
                                        <div class="form-group">
                                            <label class="col-md-12 control-label" style="text-align: left"
                                                   for="father_name">পিতার নাম:</label>
                                            <div class="col-md-12">
                                                <input type="text" name="father_name" id="father_name"
                                                       class="form-control" value="<?= $teacher_info[0]['t_father_name']?>">
                                                <span id="father_name_err" style="color: red;"></span>
                                            </div>
                                        </div>
                                        <!--m_name--->
                                        <div class="form-group">
                                            <label class="col-md-12 control-label" style="text-align: left"
                                                   for="mother_name">মাতার নাম:</label>
                                            <div class="col-md-12">
                                                <input type="text" name="mother_name" id="mother_name"
                                                       class="form-control" value="<?= $teacher_info[0]['t_mother_name']?>">
                                                <span id="mother_name_err" style="color: red;"></span>
                                            </div>
                                        </div>
                                        <!--spouse name--->
                                        <div class="form-group">
                                            <label class="col-md-12 control-label" style="text-align: left"
                                                   for="spouse_name">স্ত্রী/স্বামীর নাম ( Spouse Name ):</label>
                                            <div class="col-md-12">
                                                <input type="text" name="spouse_name" id="spouse_name"
                                                       class="form-control" value="<?= $teacher_info[0]['t_spouse_name']?>">
                                                <span id="spouse_name_err" style="color: red;"></span>
                                            </div>
                                        </div>
                                        <!--per add--->
                                        <div class="form-group">
                                            <label class="col-md-12 control-label" style="text-align: left" for="p_add"
                                                   class="col-md-12" style="padding-left:0px ">স্থায়ী
                                                ঠিকানা:</label>
                                            <div class="col-md-12">
                                                <div class="col-md-4" style="text-align:; margin-bottom: 5px;">
                                                    <label class="col-md-12 control-label" style="text-align: left"
                                                           for="p_div" class="col-md-12"
                                                           style="padding-left:0px ">বিভাগ</label>
                                                    <select name="p_div" id="p_div" class="form-control" required>
                                                        <?php
                                                        foreach ($division as $d) { ?>
                                                            <option <?php if($teacher_info[0]['t_per_div_id']==$d['div_id']){ echo 'selected'; }?>
                                                                value="<?= $d['div_id'] ?>"><?= $d['bn_div_name'] ?></option>
                                                        <?php }
                                                        ?>
                                                    </select>
                                                    <span id="p_div_err" style="color: red;"></span>
                                                </div>
                                                <div class="col-md-4" style="text-align: ;  margin-bottom: 5px;">
                                                    <label class="col-md-12 control-label" style="text-align: left"
                                                           for="p_dist" class="col-md-12"
                                                           style="padding-left:0px ">জেলা</label>
                                                    <select name="p_dist" id="p_dist" class="form-control" required>
                                                        <?php
                                                        foreach ($dist as $d) { ?>
                                                            <option <?php if($teacher_info[0]['t_per_dist_id']==$d['dist_id']){ echo 'selected'; }?>
                                                                value="<?= $d['dist_id'] ?>"><?= $d['bn_dist_name'] ?></option>
                                                        <?php }
                                                        ?>
                                                    </select>
                                                    <span id="p_dist_err" style="color: red;"></span>
                                                </div>
                                                <div class="col-md-4" style="text-align: ;  margin-bottom: 5px;">
                                                    <label class="col-md-12 control-label" style="text-align: left"
                                                           for="p_upz" class="col-md-12"
                                                           style="padding-left:0px ">উপজেলা</label>
                                                    <select name="p_upz" id="p_upz" class="form-control" required>
                                                        <?php
                                                        foreach ($upz as $d) { ?>
                                                            <option <?php if($teacher_info[0]['t_per_upz_id']==$d['upz_id']){ echo 'selected'; }?>
                                                                value="<?= $d['upz_id'] ?>"><?= $d['bn_upz_name'] ?></option>
                                                        <?php }
                                                        ?>
                                                    </select>
                                                    <span id="p_upz_err" style="color: red;"></span>
                                                </div>
                                                <div class="col-md-10" style="text-align: ;  margin-bottom: 5px;">
                                                    <label class="col-md-12 control-label" style="text-align: left"
                                                           for="p_details" class="col-md-12"
                                                           style="padding-left:0px ">বিস্তারিত</label>
                                                    <input type="text" class="form-control" name="p_details"
                                                           id="p_details" required value="<?= $teacher_info[0]['t_parmanent_address']?>">
                                                    <span id="p_details_err" style="color: red;"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!--curr add--->
                                        <div class="form-group">
                                            <label class="col-md-12 control-label" style="text-align: left"
                                                   for="curr_add" class="col-md-12" style="padding-left: 0px;">বর্তমান
                                                ঠিকানা:</label>
                                            <div class="col-md-12">
                                                <input type="text" name="curr_add" id="curr_add" class="form-control"
                                                       required value="<?= $teacher_info[0]['t_present_address']?>">
                                                <span id="curr_add_err" style="color: red;"></span>
                                            </div>
                                        </div>


                                    </div>

                                    <div class="col-md-6">
                                        <!--blood grp--->
                                        <div class="form-group">
                                            <label class="col-md-12 control-label" style="text-align: left"
                                                   for="blood_grp">রক্তের গ্রুপ:</label>
                                            <div class="col-md-12">
                                                <select name="blood_grp" id="blood_grp" class="form-control">
                                                    <option value="0">নির্বাচন করুন</option>
                                                    <?php
                                                    foreach ($blood_grp as $b) { ?>
                                                        <option <?php if($teacher_info[0]['blood_grp_id']==$b['blood_grp_id']){ echo 'selected';}?>
                                                            value="<?= $b['blood_grp_id'] ?>"><?= $b['blood_grp_name'] ?></option>
                                                    <?php }
                                                    ?>
                                                </select>
                                                <span id="blood_grp_err" style="color: red;"></span>
                                            </div>
                                        </div>

                                        <!--personal mb--->
                                        <div class="form-group">
                                            <label class="col-md-12 control-label" style="text-align: left"
                                                   for="per_mb">ব্যক্তিগত মোবাইল নম্বর (সক্রিয়):</label>
                                            <div class="col-md-12">
                                                <input type="text" name="per_mb" id="per_mb" minlength="11"
                                                       maxlength="11" value="<?= str_replace(range(0,9),$bn_digits,$teacher_info[0]['t_mobile'])?>"
                                                       class="form-control" required>
                                                <span style="color: peru">১১ডিজিট(০১*********)</span>
                                                <br>
                                                <span id="per_mb_err" style="color: red;"></span>
                                            </div>
                                        </div>
                                        <!--emergency mb--->
                                        <div class="form-group">
                                            <label class="col-md-12 control-label" style="text-align: left"
                                                   for="imp_mb">জরুরি প্রয়োজনে যোগাযোগের জন্য মোবাইল নম্বর
                                                (সক্রিয়):</label>
                                            <div class="col-md-12">
                                                <input type="text" name="imp_mb" id="imp_mb" maxlength="11"
                                                       minlength="11" value="<?= str_replace(range(0,9),$bn_digits,$teacher_info[0]['t_other_mobile'])?>"
                                                       class="form-control" >
                                                <span style="color: peru">১১ডিজিট(০১*********)</span>
                                                <br>
                                                <span id="imp_mb_err" style="color: red;"></span>
                                            </div>
                                        </div>

                                        <!--email--->
                                        <div class="form-group">
                                            <label class="col-md-12 control-label" style="text-align: left"
                                                   for="trainee_email">ব্যক্তিগত ইমেইল:</label>
                                            <div class="col-md-12">
                                                <input type="email" name="trainee_email" id="trainee_email"
                                                       class="form-control" value="<?= $teacher_info[0]['t_email']?>">
                                                <span id="trainee_email_err" style="color: red;"></span>
                                            </div>
                                        </div>
                                        <!--fb--->
                                        <div class="form-group">
                                            <label class="col-md-12 control-label" style="text-align: left"
                                                   for="trainee_fb">ব্যক্তিগত ফেসবুক আইডি:</label>
                                            <div class="col-md-12">
                                                <input type="text" name="trainee_fb" id="trainee_fb"
                                                       class="form-control" value="<?= str_replace(range(0,9),$bn_digits,$teacher_info[0]['t_fb_link'])?>">
                                                <span id="trainee_fb_err" style="color: red;"></span>
                                            </div>
                                        </div>
                                        <!--education--->
                                        <div class="form-group">
                                            <label class="col-md-12 control-label" style="text-align: left"
                                                   for="education">শিক্ষাগত যোগ্যতা:</label>
                                            <div class="col-md-12">
                                                <select name="education" id="education" class="form-control" required>
                                                    <?php
                                                    foreach ($education as $e) { ?>
                                                        <option <?php if($teacher_info[0]['edu_id']==$e['edu_id']){ echo 'selected';}?>
                                                            value="<?= $e['edu_id'] ?>"><?= $e['edu_name'] ?></option>
                                                    <?php }
                                                    ?>
                                                </select>
                                                <span id="education_err" style="color: red;"></span>
                                            </div>
                                        </div>
                                        <!--classification (user type)--->
                                        <div class="form-group">
                                            <label class="col-md-12 control-label" style="text-align: left"
                                                   for="trainee_class">প্রশিক্ষণার্থী ধরণ:</label>
                                            <div class="col-md-12">
                                                <select name="trainee_class" id="trainee_class" class="form-control">
                                                    <?php
                                                    foreach ($trainee_class as $e) { ?>
                                                        <option <?php if($teacher_info[0]['classification_id']==$e['id']){ echo 'selected';}?> value="<?= $e['id'] ?>"><?= $e['class_name'] ?></option>
                                                    <?php }
                                                    ?>
                                                </select>
                                                <span id="trainee_class_err" style="color: red;"></span>
                                            </div>
                                        </div>
                                        <!--designation--->
                                        <div class="form-group">
                                            <label class="col-md-12 control-label" style="text-align: left" for="des">বর্তমান
                                                পদবী:</label>
                                            <div class="col-md-12">
                                                <select name="des" id="des" class="form-control">
                                                    <?php
                                                    foreach ($des as $e) { ?>
                                                        <option <?php if($teacher_info[0]['designation_id']==$e['des_id']){ echo 'selected';}?>
                                                            value="<?= $e['des_id'] ?>"><?= $e['des_name'] ?></option>
                                                    <?php }
                                                    ?>
                                                </select>
                                                <span id="des_err" style="color: red;"></span>
                                            </div>
                                        </div>
                                        <!--profession--->
                                        <div class="form-group">
                                            <label class="col-md-12 control-label" style="text-align: left"
                                                   for="profession">পেশা:</label>
                                            <div class="col-md-12">
                                                <select name="profession" id="profession" class="form-control">
                                                    <?php
                                                    foreach ($profession as $e) { ?>
                                                        <option
                                                            value="<?= $e['prf_id'] ?>"><?= $e['prf_name'] ?></option>
                                                    <?php }
                                                    ?>
                                                </select>
                                                <span id="profession_err" style="color: red;"></span>
                                            </div>
                                        </div>
                                        <!--office/institute--->
                                        <div class="form-group">
                                            <label class="col-md-12 control-label" style="text-align: left" for="ofc"
                                                   class="col-md-12" style="padding-left:0px ">অফিসের নাম ও
                                                ঠিকানা:</label>
                                            <div class="col-md-12">
                                                <select name="ofc_id" id="ofc_id" class="form-control ofc-nrml"
                                                        style="margin-bottom: 5px;">
                                                    <option value="0">নির্বাচন করুন</option>
                                                    <?php
                                                    foreach ($inst as $e) { ?>
                                                        <option <?php if($teacher_info[0]['office_id']==$e['inst_id']){ echo 'selected';}?>
                                                            value="<?= $e['inst_id'] ?>"><?= $e['inst_name'] . ', ' . $e['bn_div_name'] . ', ' . $e['bn_dist_name'] . ', ' . $e['bn_upz_name']; ?></option>
                                                    <?php }
                                                    ?>
                                                    <!--                                                    <option value="add_inst">সংযোজন করুন</option>-->
                                                </select>
                                                <span id="ofc_err" style="color: red;"></span>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                                <input type='hidden' id='nidERR' value='0'>

                                <div class="form-group">
                                    <div class="col-md-6" align="right">
                                        <button name="myBtn" id="myBtn" value="0" type="submit"
                                                class="btn btn-success">আপডেট
                                        </button>
                                    </div>                                    
                                </div>
                            </form>
                        <?php } ?>


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

<?php $this->load->view('layouts/footer'); ?>

<script type="text/javascript">

    var finalEnlishToBanglaNumber = {
        '0': '০',
        '1': '১',
        '2': '২',
        '3': '৩',
        '4': '৪',
        '5': '৫',
        '6': '৬',
        '7': '৭',
        '8': '৮',
        '9': '৯'
    };
    var finalBanglaToEnlishNumber = {
        '০': '0',
        '১': '1',
        '২': '2',
        '৩': '3',
        '৪': '4',
        '৫': '5',
        '৬': '6',
        '৭': '7',
        '৮': '8',
        '৯': '9'
    };

    String.prototype.getDigitBanglaFromEnglish = function () {
        var retStr = this;
        for (var x in finalEnlishToBanglaNumber) {
            retStr = retStr.replace(new RegExp(x, 'g'), finalEnlishToBanglaNumber[x]);
        }
        return retStr;
    };
    String.prototype.getDigitEnglishFromBangla = function () {
        var retStr = this;
        for (var x in finalBanglaToEnlishNumber) {
            retStr = retStr.replace(new RegExp(x, 'g'), finalBanglaToEnlishNumber[x]);
        }
        return retStr;
    };

    function checkNumber(id) {
        var tmp_num = $('#' + id).val().getDigitEnglishFromBangla();
        if (tmp_num == null || tmp_num <= 0 || isNaN(tmp_num)) {
            var x = document.getElementById(id);
            x.value = x.value.replace(/[^0-9]/, '');
        }
    }
    var img_extn = ['png', 'PNG', 'jpg', 'JPG', 'jpeg', 'JPEG'];

    var _URL = window.URL || window.webkitURL;

    $(document).ready(function () {
        //check_ofc();

///////////////////////////////////DATEPICKER//////////////////////////
        $('#dob').datepicker({
            format: "dd/mm/yyyy"
        }).on('changeDate', function (ev) {

        });
///////////////////////////////////DATEPICKER/////////////////////////

        $('#nid').keyup(function () {
            var tmp = $(this).val();

            var tmp_num = tmp.getDigitEnglishFromBangla();
            if (tmp_num == null || tmp_num <= 0 || isNaN(tmp_num)) {
                $(this).val((tmp_num).getDigitEnglishFromBangla().replace(/[^0-9]/, ''));
            }
            tmp = $(this).val().getDigitEnglishFromBangla();
            $.ajax({
                type: 'post',
                url: '<?= site_url()?>home/checkNID',
                data: {
                    nid: tmp
                }, success: function (res) {
                    if (res == 0) {
                        $('#nid_err').text('উপরোক্ত জাতীয় পরিচয়পত্র টি  বাংলাদেশ সমবায় প্রশিক্ষণ ব্যবস্থাপনা পদ্ধতির অন্তর্ভুক্ত। অনুগ্রহ করে আপনার ইউসার আইডি (USER ID) পাসওয়ার্ড দিয়ে লগইন করুন');

                        $('#nidERR').val('1');
                        var ttmm = parseInt($('#myBtn').val());

                        if (ttmm == 0) {
                            //$('#myBtn').attr('disabled', 'true');
                        }
                    } else {
                        $('#nid_err').text('');

                        $('#nidERR').val('0');
                        if (parseInt($('#nidERR').val()) == 0 || parseInt($('#dobERR').val()) == 0 || parseInt($('#picERR').val()) == 0 || parseInt($('#signERR').val()) == 0) {

                            ///$('#myBtn').removeAttr("disabled");
                        }
                    }

                }
            });
            /////nid check
        });

        $('#p_div').change(function () {
            var div = $(this).val();

            $.ajax({
                type: 'post',
                url: '<?= site_url()?>home/getDist',
                data: {
                    div_id: div
                }, success: function (data) {
                    var data1 = $.parseJSON(data);

                    $('#p_dist option').remove();
                    $('#p_upz option').remove();

                    $.each(data1['dist'], function (i, v) {
                        $('#p_dist').append('<option value="' + v['dist_id'] + '">' + v['bn_dist_name'] + '</option>');
                    });
                    $.each(data1['upz'], function (i, v) {
                        $('#p_upz').append('<option value="' + v['upz_id'] + '">' + v['bn_upz_name'] + '</option>');
                    });
                }
            });
        });

        $('#p_dist').change(function () {
            var dist = $(this).val();

            $.ajax({
                type: 'post',
                url: '<?= site_url()?>home/getUpz',
                data: {
                    dist_id: dist
                }, success: function (data) {
                    var data1 = $.parseJSON(data);

                    $('#p_upz option').remove();
                    $.each(data1['upz'], function (i, v) {
                        $('#p_upz').append('<option value="' + v['upz_id'] + '">' + v['bn_upz_name'] + '</option>');
                    });
                }
            });
        });

        $('#ofc_div').change(function () {
            var div = $(this).val();

            $.ajax({
                type: 'post',
                url: '<?= site_url()?>home/getDist',
                data: {
                    div_id: div
                }, success: function (data) {
                    var data1 = $.parseJSON(data);

                    $('#ofc_dist option').remove();
                    $('#ofc_upz option').remove();

                    $.each(data1['dist'], function (i, v) {
                        $('#ofc_dist').append('<option value="' + v['dist_id'] + '">' + v['bn_dist_name'] + '</option>');
                    });
                    $.each(data1['upz'], function (i, v) {
                        $('#ofc_upz').append('<option value="' + v['upz_id'] + '">' + v['bn_upz_name'] + '</option>');
                    });
                }
            });
        });

        $('#ofc_dist').change(function () {
            var dist = $(this).val();

            $.ajax({
                type: 'post',
                url: '<?= site_url()?>home/getUpz',
                data: {
                    dist_id: dist
                }, success: function (data) {
                    var data1 = $.parseJSON(data);

                    $('#ofc_upz option').remove();
                    $.each(data1['upz'], function (i, v) {
                        $('#ofc_upz').append('<option value="' + v['upz_id'] + '">' + v['bn_upz_name'] + '</option>');
                    });
                }
            });
        });

        $('#trainee_class').change(function () {
            var t_cls = $(this).val();
            var t_crs_name_id = $('#crs_title').val();
            $.ajax({
                type: 'post',
                url: '<?= site_url()?>home/getDes',
                data: {
                    cls_id: t_cls,
                    crs_name_id: t_crs_name_id
                }, success: function (data) {
                    var data1 = $.parseJSON(data);

                    $('#des option').remove();
                    $.each(data1['des'], function (i, v) {
                        $('#des').append('<option value="' + v['des_id'] + '">' + v['des_name'] + '</option>');
                    });

                    $('#profession option').remove();
                    $.each(data1['prf'], function (i, v) {
                        $('#profession').append('<option value="' + v['prf_id'] + '">' + v['prf_name'] + '</option>');
                    });

                    $('#ofc_id option').remove();
                    $.each(data1['inst'], function (i, v) {
                        $('#ofc_id').append('<option value="' + v['inst_id'] + '">' + v['inst_name'] + ', ' + v['bn_div_name'] + ', ' + v['bn_dist_name'] + ', ' + v['bn_upz_name'] + '</option>');
                    });
                }
            });
        });

        $('#ofc_id').change(function () {
            var ofc = $(this).val();

        });
    })
    ;
    function getAge(dateString) {
        var today = new Date();
        var birthDate = new Date(dateString);
        var age = today.getFullYear() - birthDate.getFullYear();
        var m = today.getMonth() - birthDate.getMonth();
        if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
            age--;
        }
        return age;
    }

    function online_reg() {
        console.log('check');

        var flag = true;

        var tmp_name = $('#name_bng').val();
        tmp_name = tmp_name.replace(/\s+/g, '');
        if (tmp_name == '' || tmp_name == null) {
            document.getElementById('name_bng_err').innerText = 'অনুগ্রহ করে সঠিক তথ্য প্রদান করুন';
            flag = false;
        } else {
            document.getElementById('name_bng_err').innerText = '';
        }
        /*var tmp_name_eng = $('#name_eng').val();
         tmp_name_eng = tmp_name_eng.replace(/\s+/g, '');
         if (tmp_name_eng == '' || tmp_name_eng == null) {
         document.getElementById('name_eng_err').innerText = 'অনুগ্রহ করে সঠিক তথ্য প্রদান করুন';
         flag = false;
         } else {
         document.getElementById('name_eng_err').innerText = '';
         }*/

        var tmp_nid = $('#nid').val();
        tmp_nid = tmp_nid.replace(/\s+/g, '');
        if (tmp_nid == '' || tmp_nid == null || tmp_nid.length != 17) {
            document.getElementById('nid_err').innerText = 'অনুগ্রহ করে সঠিক তথ্য প্রদান করুন';
            flag = false;
        } else {
            if($('#nidERR').val()==1){
                document.getElementById('nid_err').innerText = 'অনুগ্রহ করে সঠিক তথ্য প্রদান করুন';
                flag = false;
            }else{
                document.getElementById('nid_err').innerText = '';
            }
        }

        /* var tmp_dob = $('#dob').val();
         tmp_dob = tmp_dob.replace(/\s+/g, '');
         if (tmp_dob == '' || tmp_dob == null) {
         document.getElementById('dob_err').innerText = 'অনুগ্রহ করে সঠিক তথ্য প্রদান করুন';
         flag = false;
         } else {
         document.getElementById('dob_err').innerText = '';
         }

         var tmp_bld = $('#blood_grp').val();
         tmp_bld = tmp_bld.replace(/\s+/g, '');
         if (tmp_bld == '' || tmp_bld == null || tmp_bld == 0) {
         document.getElementById('blood_grp_err').innerText = 'অনুগ্রহ করে সঠিক তথ্য প্রদান করুন';
         flag = false;
         } else {
         document.getElementById('blood_grp_err').innerText = '';
         }*/

        var tmp_per_add = $('#p_details').val();
        tmp_per_add = tmp_per_add.replace(/\s+/g, '');
        if (tmp_per_add == '' || tmp_per_add == null) {
            document.getElementById('p_details_err').innerText = 'অনুগ্রহ করে সঠিক তথ্য প্রদান করুন';
            flag = false;
        } else {
            document.getElementById('p_details_err').innerText = '';
        }

        var tmp_per_add = $('#curr_add').val();
        tmp_per_add = tmp_per_add.replace(/\s+/g, '');
        if (tmp_per_add == '' || tmp_per_add == null) {
            document.getElementById('curr_add_err').innerText = 'অনুগ্রহ করে সঠিক তথ্য প্রদান করুন';
            flag = false;
        } else {
            document.getElementById('curr_add_err').innerText = '';
        }

        var tmp_mb = $('#per_mb').val().getDigitEnglishFromBangla();
        if (isNaN(tmp_mb) || tmp_mb == '' || tmp_mb == null || tmp_mb.length != 11 || tmp_mb.substr(0, 1) != 0 || tmp_mb.substr(1, 1) != 1) {
            flag = false;
            document.getElementById('per_mb_err').innerText = "১১ডিজিট(০১*********)সঠিকভাবে মোবাইল নম্বর প্রদান করুন";
        } else {
            document.getElementById('per_mb_err').innerText = '';
        }

        /* var tmp_mb2 = $('#imp_mb').val().getDigitEnglishFromBangla();
         if (isNaN(tmp_mb2) || tmp_mb2 == '' || tmp_mb2 == null || tmp_mb2.length != 11 || tmp_mb2.substr(0, 1) != 0 || tmp_mb2.substr(1, 1) != 1) {
         flag = false;
         document.getElementById('imp_mb_err').innerText = "১১ডিজিট(০১*********)সঠিকভাবে মোবাইল নম্বর প্রদান করুন";
         } else {
         document.getElementById('imp_mb_err').innerText = '';
         }*/

        var ofc = $('#ofc_id').val();
        if (ofc == '' || ofc == null || ofc== 0 ) {
            flag = false;
            document.getElementById('ofc_err').innerText = 'অনুগ্রহ করে সঠিক তথ্য প্রদান করুন';
        } else {
            document.getElementById('ofc_err').innerText = '';
        }

        if (flag == false) {
            // $('#btnAlrt').text('অনুগ্রহ করে সঠিক তথ্য প্রদান করুন');
        } else {
            //$('#btnAlrt').text('');
        }

        return flag;
    }


    /*
     * if (ofc == 'add_inst') {
     if ($('#trainee_class').val() == 1 || $('#trainee_class').val() == 3) {
     var tmp_somitee_name = $('#somitee_name').val();
     tmp_somitee_name = tmp_somitee_name.replace(/\s+/g, '');
     if (tmp_somitee_name == '' || tmp_somitee_name == null) {
     document.getElementById('somitee_name_err').innerText = 'আবশ্যক';
     flag = false;
     } else {
     document.getElementById('somitee_name_err').innerText = '';
     }

     var tmp_reg_num = $('#reg_num').val();
     tmp_reg_num = tmp_reg_num.replace(/\s+/g, '');
     if (tmp_reg_num == '' || tmp_reg_num == null) {
     document.getElementById('reg_num_err').innerText = 'আবশ্যক';
     flag = false;
     } else {
     document.getElementById('reg_num_err').innerText = '';
     }

     var tmp_reg_date = $('#reg_date').val();
     tmp_reg_date = tmp_reg_date.replace(/\s+/g, '');
     if (tmp_reg_date == '' || tmp_reg_date == null) {
     document.getElementById('reg_date_err').innerText = 'আবশ্যক';
     flag = false;
     } else {
     document.getElementById('reg_date_err').innerText = '';
     }

     var tmp_reg_update_num = $('#reg_update_num').val();
     tmp_reg_update_num = tmp_reg_update_num.replace(/\s+/g, '');
     if (tmp_reg_update_num == '' || tmp_reg_update_num == null) {
     document.getElementById('reg_update_num_err').innerText = 'আবশ্যক';
     flag = false;
     } else {
     document.getElementById('reg_update_num_err').innerText = '';
     }

     var tmp_reg_update_date = $('#reg_update_date').val();
     tmp_reg_update_date = tmp_reg_update_date.replace(/\s+/g, '');
     if (tmp_reg_update_date == '' || tmp_reg_update_date == null) {
     document.getElementById('reg_update_date_err').innerText = 'আবশ্যক';
     flag = false;
     } else {
     document.getElementById('reg_update_date_err').innerText = '';
     }

     var tmp_reg_update_date = $('#reg_update_date').val();
     tmp_reg_update_date = tmp_reg_update_date.replace(/\s+/g, '');
     if (tmp_reg_update_date == '' || tmp_reg_update_date == null) {
     document.getElementById('reg_update_date_err').innerText = 'আবশ্যক';
     flag = false;
     } else {
     document.getElementById('reg_update_date_err').innerText = '';
     }

     } else if ($('#trainee_class').val() == 2) {
     var tmp_ofc_name = $('#ofc_name').val();
     tmp_ofc_name = tmp_ofc_name.replace(/\s+/g, '');
     if (tmp_ofc_name == '' || tmp_ofc_name == null) {
     document.getElementById('ofc_name_err').innerText = 'আবশ্যক';
     flag = false;
     } else {
     document.getElementById('ofc_name_err').innerText = '';
     }
     }

     var tmp_house_no = $('#house_no').val();
     tmp_house_no = tmp_house_no.replace(/\s+/g, '');
     if (tmp_house_no == '' || tmp_house_no == null) {
     document.getElementById('house_no_err').innerText = 'আবশ্যক';
     flag = false;
     } else {
     document.getElementById('house_no_err').innerText = '';
     }

     var tmp_road_no = $('#road_no').val();
     tmp_road_no = tmp_road_no.replace(/\s+/g, '');
     if (tmp_road_no == '' || tmp_road_no == null) {
     document.getElementById('road_no_err').innerText = 'আবশ্যক';
     flag = false;
     } else {
     document.getElementById('road_no_err').innerText = '';
     }

     var tmp_road_name = $('#road_name').val();
     tmp_road_name = tmp_road_name.replace(/\s+/g, '');
     if (tmp_road_name == '' || tmp_road_name == null) {
     document.getElementById('road_name_err').innerText = 'আবশ্যক';
     flag = false;
     } else {
     document.getElementById('road_name_err').innerText = '';
     }

     var tmp_area_name = $('#area_name').val();
     tmp_area_name = tmp_area_name.replace(/\s+/g, '');
     if (tmp_area_name == '' || tmp_area_name == null) {
     document.getElementById('area_name_err').innerText = 'আবশ্যক';
     flag = false;
     } else {
     document.getElementById('area_name_err').innerText = '';
     }

     var tmp_ofc_phn = $('#ofc_phn').val();
     tmp_ofc_phn = tmp_ofc_phn.replace(/\s+/g, '');
     if (tmp_ofc_phn == '' || tmp_ofc_phn == null) {
     document.getElementById('ofc_phn_err').innerText = 'আবশ্যক';
     flag = false;
     } else {
     document.getElementById('ofc_phn_err').innerText = '';
     }

     var tmp_ofc_email = $('#ofc_email').val();
     tmp_ofc_email = tmp_ofc_email.replace(/\s+/g, '');
     if (tmp_ofc_email == '' || tmp_ofc_email == null) {
     document.getElementById('ofc_email_err').innerText = 'আবশ্যক';
     flag = false;
     } else {
     document.getElementById('ofc_email_err').innerText = '';
     }

     var tmp_ofc_mb = $('#ofc_mb').val();
     tmp_ofc_mb = tmp_ofc_mb.replace(/\s+/g, '');
     if (tmp_ofc_mb == '' || tmp_ofc_mb == null) {
     document.getElementById('ofc_mb_err').innerText = 'আবশ্যক';
     flag = false;
     } else {
     document.getElementById('ofc_mb_err').innerText = '';
     }

     var tmp_ofc_mb = $('#ofc_mb').val();
     tmp_ofc_mb = tmp_ofc_mb.replace(/\s+/g, '');
     if (tmp_ofc_mb == '' || tmp_ofc_mb == null) {
     document.getElementById('ofc_mb_err').innerText = 'আবশ্যক';
     flag = false;
     } else {
     document.getElementById('ofc_mb_err').innerText = '';
     }
     }
     * */
</script>


