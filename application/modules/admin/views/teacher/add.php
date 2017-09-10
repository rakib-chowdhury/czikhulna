<?php $bn_digits = array('০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯'); ?>
<div class="container-fluid display-table">
    <div class="row display-table-row">
        <?php $this->load->view('layouts/sidebar-nav'); ?>
        <div class="col-md-10 display-table-cell" id="main-content">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-hover ">
                        <h2 style="text-align:center"><?= $page_title ?></h2>
                        <hr>

                        <form novalidate class="form-horizontal" onsubmit="return online_reg()" method="post"
                              action="<?php echo site_url('admin/add_teacher_post'); ?>">
                            <div class="row">
                                <div class="col-md-6">
                                    <!--name bangla--->
                                    <div class="form-group ">
                                        <label for="name_bng" class="control-label col-md-10"
                                               style="text-align: left">নাম (বাংলা NID অনুযায়ী)</label>
                                        <div class="col-md-12">
                                            <input type="text" name="name_bng" class="form-control"
                                                   placeholder="বক্তা/প্রশিক্ষকের নাম" id="name_bng"
                                                   required>
                                            <span style="color: red;" id="name_bng_err"></span>
                                        </div>
                                    </div>
                                    <!--name eng--->
                                    <div class="form-group ">
                                        <label for="name_eng" class="col-md-12 control-label"
                                               style="text-align: left">নাম (ইংরেজী NID অনুযায়ী)</label>
                                        <div class="col-md-12">
                                            <input type="text" name="name_eng" class="form-control"
                                                   placeholder="বক্তা/প্রশিক্ষকের নাম ইংরেজী" id="name_eng">
                                            <span style="color: red;" id="name_eng_err"></span>
                                        </div>
                                    </div>

                                    <!--nid--->
                                    <div class="form-group">
                                        <label for="nid" class="col-md-12 control-label"
                                               style="text-align: left">জাতীয় পরিচয়পত্র নম্বর</label>
                                        <div class="col-md-12">
                                            <input type="text" name="nid" id="nid" maxlength="17" minlength="17"
                                                   class="form-control" required placeholder="জাতীয় পরিচয়পত্র নম্বর">
                                            <span id="nid_err" style="color: red;"></span>
                                        </div>                                        
                                    </div>
                                    <!--dob--->
                                    <div class="form-group">
                                        <label class="col-md-12 control-label" style="text-align: left" for="dob">জন্ম
                                            তারিখ (NID অনুযায়ী)</label>
                                        <div class="col-md-12">
                                            <input readonly type="text" name="dob" id="dob" class="form-control"
                                                   required>
                                            <span id="dob_err" style="color: red;"></span>
                                        </div>
                                    </div>
                                    <!--age--->
                                    <div class="form-group">
                                        <label class="col-md-12 control-label" style="text-align: left"
                                               for="age">বয়স</label>
                                        <div class="col-md-12">
                                            <input readonly type="text" name="age" id="age" class="form-control"
                                                   required>
                                            <span id="age_err" style="color: red;"></span>
                                        </div>
                                    </div>
                                    <!--gender--->
                                    <div class="form-group">
                                        <label class="col-md-12 control-label" style="text-align: left" for="gender"
                                               class="col-md-12 col-sm-12 col-xs-12 col-lg-12"
                                               style="padding-left: 0px;">লিঙ্গ</label>
                                        <div class="col-md-12">
                                            <input type="radio" name="gender" checked
                                                   value='1' class="" required>পুরুষ
                                            &nbsp;&nbsp;
                                            <input type="radio" name="gender"
                                                   value='2' class="" required>নারী
                                            <span id="gender_err" style="color: red;"></span>
                                        </div>
                                    </div>
                                    <!--f_name--->
                                    <div class="form-group">
                                        <label class="col-md-12 control-label" style="text-align: left"
                                               for="father_name">পিতার নাম</label>
                                        <div class="col-md-12">
                                            <input type="text" name="father_name" id="father_name"
                                                   class="form-control">
                                            <span id="father_name_err" style="color: red;"></span>
                                        </div>
                                    </div>
                                    <!--m_name--->
                                    <div class="form-group">
                                        <label class="col-md-12 control-label" style="text-align: left"
                                               for="mother_name">মাতার নাম</label>
                                        <div class="col-md-12">
                                            <input type="text" name="mother_name" id="mother_name"
                                                   class="form-control">
                                            <span id="mother_name_err" style="color: red;"></span>
                                        </div>
                                    </div>
                                    <!--spouse name--->
                                    <div class="form-group">
                                        <label class="col-md-12 control-label" style="text-align: left"
                                               for="spouse_name">স্ত্রী/স্বামীর নাম (Spouse Name)</label>
                                        <div class="col-md-12">
                                            <input type="text" name="spouse_name" id="spouse_name"
                                                   class="form-control">
                                            <span id="spouse_name_err" style="color: red;"></span>
                                        </div>
                                    </div>
                                    <!--per add--->
                                    <div class="form-group">
                                        <label class="col-md-12 control-label" style="text-align: left" for="p_add"
                                               class="col-md-12" style="padding-left:0px ">স্থায়ী
                                            ঠিকানা</label>
                                        <div class="col-md-12">
                                            <div class="col-md-4" style="text-align:; margin-bottom: 5px;">
                                                <label class="col-md-12 control-label" style="text-align: left"
                                                       for="p_div" class="col-md-12"
                                                       style="padding-left:0px ">বিভাগ</label>
                                                <select name="p_div" id="p_div" class="form-control" required>
                                                    <?php
                                                    foreach ($division as $d) { ?>
                                                        <option
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
                                                        <option
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
                                                        <option
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
                                                       id="p_details" required>
                                                <span id="p_details_err" style="color: red;"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <!--curr add--->
                                    <div class="form-group">
                                        <label class="col-md-12 control-label" style="text-align: left"
                                               for="curr_add" class="col-md-12" style="padding-left: 0px;">বর্তমান
                                            ঠিকানা</label>
                                        <div class="col-md-12">
                                            <input type="text" name="curr_add" id="curr_add" class="form-control"
                                                   required>
                                            <span id="curr_add_err" style="color: red;"></span>
                                        </div>
                                    </div>
                                    <!--blood grp--->
                                    <div class="form-group">
                                        <label class="col-md-12 control-label" style="text-align: left"
                                               for="blood_grp">রক্তের গ্রুপ</label>
                                        <div class="col-md-12">
                                            <select name="blood_grp" id="blood_grp" class="form-control">
                                                <option value="0">নির্বাচন করুন</option>
                                                <?php
                                                foreach ($blood_grp as $b) { ?>
                                                    <option
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
                                               for="per_mb">ব্যক্তিগত মোবাইল নম্বর (সক্রিয়)</label>
                                        <div class="col-md-12">
                                            <input type="text" name="per_mb" id="per_mb" minlength="11"
                                                   maxlength="11" class="form-control" required>
                                            <span style="color: peru">১১ডিজিট(০১*********)</span>
                                            <br>
                                            <span id="per_mb_err" style="color: red;"></span>
                                        </div>
                                    </div>
                                    <!--emergency mb--->
                                    <div class="form-group">
                                        <label class="col-md-12 control-label" style="text-align: left"
                                               for="imp_mb">জরুরি প্রয়োজনে যোগাযোগের জন্য মোবাইল নম্বর
                                            (সক্রিয়)</label>
                                        <div class="col-md-12">
                                            <input type="text" name="imp_mb" id="imp_mb" maxlength="11"
                                                   minlength="11" class="form-control">
                                            <span style="color: peru">১১ডিজিট(০১*********)</span>
                                            <br>
                                            <span id="imp_mb_err" style="color: red;"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <!--email--->
                                    <div class="form-group">
                                        <label class="col-md-12 control-label" style="text-align: left"
                                               for="trainee_email">ব্যক্তিগত ইমেইল</label>
                                        <div class="col-md-12">
                                            <input type="email" name="trainee_email" id="trainee_email"
                                                   class="form-control">
                                            <span id="trainee_email_err" style="color: red;"></span>
                                        </div>
                                    </div>
                                    <!--fb--->
                                    <div class="form-group">
                                        <label class="col-md-12 control-label" style="text-align: left"
                                               for="trainee_fb">ব্যক্তিগত ফেসবুক আইডি</label>
                                        <div class="col-md-12">
                                            <input type="text" name="trainee_fb" id="trainee_fb"
                                                   class="form-control">
                                            <span id="trainee_fb_err" style="color: red;"></span>
                                        </div>
                                    </div>
                                    <!--education--->
                                    <div class="form-group">
                                        <label class="col-md-12 control-label" style="text-align: left"
                                               for="education">শিক্ষাগত যোগ্যতা</label>
                                        <div class="col-md-12">
                                            <select name="education" id="education" class="form-control" required>
                                                <?php
                                                foreach ($education as $e) { ?>
                                                    <option value="<?= $e['edu_id'] ?>"><?= $e['edu_name'] ?></option>
                                                <?php }
                                                ?>
                                            </select>
                                            <span id="education_err" style="color: red;"></span>
                                        </div>
                                    </div>
                                    <!--classification (user type)--->
                                    <div class="form-group">
                                        <label class="col-md-12 control-label" style="text-align: left"
                                               for="trainee_class">বক্তা/প্রশিক্ষকের ধরণ</label>
                                        <div class="col-md-12">
                                            <select name="trainee_class" id="trainee_class" class="form-control">
                                                <?php
                                                foreach ($trainee_class as $e) { ?>
                                                    <option value="<?= $e['id'] ?>"><?= $e['class_name'] ?></option>
                                                <?php }
                                                ?>
                                            </select>
                                            <span id="trainee_class_err" style="color: red;"></span>
                                        </div>
                                    </div>
                                    <!--designation--->
                                    <div class="form-group">
                                        <label class="col-md-12 control-label" style="text-align: left" for="des">বর্তমান
                                            পদবী</label>
                                        <div class="col-md-12">
                                            <select name="des" id="des" class="form-control">
                                                <?php
                                                foreach ($des as $e) { ?>
                                                    <option value="<?= $e['des_id'] ?>"><?= $e['des_name'] ?></option>
                                                <?php }
                                                ?>
                                            </select>
                                            <span id="des_err" style="color: red;"></span>
                                        </div>
                                    </div>
                                    <!--profession--->
                                    <div class="form-group">
                                        <label class="col-md-12 control-label" style="text-align: left"
                                               for="profession">পেশা</label>
                                        <div class="col-md-12">
                                            <select name="profession" id="profession" class="form-control">
                                                <?php
                                                foreach ($profession as $e) { ?>
                                                    <option value="<?= $e['prf_id'] ?>"><?= $e['prf_name'] ?></option>
                                                <?php }
                                                ?>
                                            </select>
                                            <span id="profession_err" style="color: red;"></span>
                                        </div>
                                    </div>
                                    <!--office/institute--->
                                    <div class="form-group">
                                        <label for="ofc" class="col-md-12" style="text-align: left ">অফিসের নাম ও
                                            ঠিকানা</label>
                                        <div class="col-md-12 ofc-nrml">
                                            <select name="ofc_id" id="ofc_id" class="form-control ofc-nrml"
                                                    style="margin-bottom: 5px;">
                                                <?php
                                                foreach ($inst as $e) { ?>
                                                    <option
                                                        value="<?= $e['inst_id'] ?>"><?= $e['inst_name'] . ', ' . $e['bn_div_name'] . ', ' . $e['bn_dist_name'] . ', ' . $e['bn_upz_name']; ?></option>
                                                <?php }
                                                ?>
                                                <option value="add_inst">সংযোজন করুন</option>
                                            </select>
                                            <span id="ofc_err" style="color: red;"></span>
                                        </div>
                                        <div class="col-md-12">
                                            <!--কার্যালয়-->
                                            <div class="col-md-6 govt" style="text-align:; margin-bottom: 5px;">
                                                <label for="" class="col-md-12"
                                                       style="padding-left:0px ">কার্যালয়</label>
                                                <select name="ofc_name" id="ofc_name" class="form-control">
                                                    <option value="উপজেলা সমবায় কার্যালয়">উপজেলা সমবায় কার্যালয়</option>
                                                    <option value="জেলা সমবায় কার্যালয়">জেলা সমবায় কার্যালয়</option>
                                                    <option value="বিভাগীয় সমবায় কার্যালয়">বিভাগীয় সমবায় কার্যালয়</option>
                                                    <option value="সমবায় অধিদপ্তর">সমবায় অধিদপ্তর</option>
                                                    <option value="আঞ্চলিক সমবায় ইন্সটিটিউট">আঞ্চলিক সমবায় ইন্সটিটিউট</option>
                                                    <option value="বাংলাদেশ সমবায় একাডেমী">বাংলাদেশ সমবায় একাডেমী</option>
                                                    <option value="জেলা প্রশাসকের কার্যালয়">জেলা প্রশাসকের কার্যালয়</option>
                                                    <option value="উপজেলা নির্বাহী কর্মকর্তার কার্যালয়">উপজেলা নির্বাহী কর্মকর্তার কার্যালয়</option>
                                                    <option value="অন্যান্য">অন্যান্য</option>
                                                </select>
                                                <span id="ofc_name_err" style="color: red;"></span>
                                            </div>
                                            <!--সমিতি / প্রতিষ্ঠানের নাম-->
                                            <div class="col-md-6 somitee" style="text-align: ; margin-bottom: 5px;">
                                                <label for="somitee_name" class="col-md-12" style="padding-left:0px ">সমিতি
                                                    / প্রতিষ্ঠানের নাম</label>
                                                <input type="text" name="somitee_name" id="somitee_name"
                                                       class="form-control"
                                                       required>
                                                <span id="somitee_name_err" style="color: red;"></span>
                                            </div>
                                            <!--মূল নিবন্ধন নম্বর-->
                                            <div class="col-md-6 somitee" style="text-align: ; margin-bottom: 5px;">
                                                <label for="reg_num" class="col-md-12" style="padding-left:0px ">মূল
                                                    নিবন্ধন
                                                    নম্বর</label>
                                                <input type="text" name="reg_num" id="reg_num" class="form-control"
                                                       required>
                                                <span id="reg_num_err" style="color: red;"></span>
                                            </div>
                                            <!--reg date-->
                                            <div class="col-md-6 somitee" style="text-align: ; margin-bottom: 5px;">
                                                <label for="reg_date" class="col-md-12" style="padding-left:0px ">নিবন্ধনের
                                                    তারিখ</label>
                                                <input readonly type="text" name="reg_date" id="reg_date"
                                                       class="form-control"
                                                       required>
                                                <span id="reg_date_err" style="color: red;"></span>
                                            </div>
                                            <!--সর্বশেষ সংশোধিত নিবন্ধন নম্বর-->
                                            <div class="col-md-6 somitee" style="text-align: ; margin-bottom: 5px;">
                                                <label for="reg_update_num" class="col-md-12" style="padding-left:0px ">সর্বশেষ
                                                    সংশোধিত নিবন্ধন নম্বর</label>
                                                <input type="text" name="reg_update_num" id="reg_update_num"
                                                       class="form-control"
                                                       required>
                                                <span id="reg_update_num_err" style="color: red;"></span>
                                            </div>
                                            <!--সর্বশেষ সংশোধিত নিবন্ধনের তারিখ-->
                                            <div class="col-md-6 somitee" style="text-align: ; margin-bottom: 5px;">
                                                <label for="reg_update_date" class="col-md-12"
                                                       style="padding-left:0px ">সর্বশেষ
                                                    সংশোধিত নিবন্ধনের তারিখ</label>
                                                <input readonly type="text" name="reg_update_date" id="reg_update_date"
                                                       class="form-control"
                                                       required>
                                                <span id="reg_update_date_err" style="color: red;"></span>
                                            </div>
                                            <!--বাড়ী-->
                                            <div class="col-md-6 ofc-class" style="text-align: ; margin-bottom: 5px;">
                                                <label for="house_no" class="col-md-12" style="padding-left:0px ">বাড়ী
                                                    নং</label>
                                                <input type="text" name="house_no" id="house_no" class="form-control"
                                                       required>
                                                <span id="house_no_err" style="color: red;"></span>
                                            </div>
                                            <!--রোড নং-->
                                            <div class="col-md-6 ofc-class" style="text-align: ; margin-bottom: 5px;">
                                                <label for="road_no" class="col-md-12" style="padding-left:0px ">রোড
                                                    নং</label>
                                                <input type="text" name="road_no" id="road_no" class="form-control"
                                                >
                                                <span id="road_no_err" style="color: red;"></span>
                                            </div>
                                            <!--রোডের নাম-->
                                            <div class="col-md-6 ofc-class" style="text-align: ;  margin-bottom: 5px;">
                                                <label for="road_name" class="col-md-12" style="padding-left:0px ">রোডের
                                                    নাম</label>
                                                <input type="text" name="road_name" id="road_name" class="form-control"
                                                >
                                                <span id="road_name_err" style="color: red;"></span>
                                            </div>
                                            <!--মহল্লার-->
                                            <div class="col-md-6 ofc-class" style="text-align: ;  margin-bottom: 5px;">
                                                <label for="area_name" class="col-md-12" style="padding-left:0px ">মহল্লার
                                                    নাম</label>
                                                <input type="text" name="area_name" id="area_name" class="form-control"
                                                >
                                                <span id="area_name_err" style="color: red;"></span>
                                            </div>
                                            <!--বিভাগ-->
                                            <div class="col-md-6 ofc-class" style="text-align: ;  margin-bottom: 5px;">
                                                <label for="ofc_div" class="col-md-12"
                                                       style="padding-left:0px ">বিভাগ</label>
                                                <select name="ofc_div" id="ofc_div" class="form-control">
                                                    <?php
                                                    foreach ($division as $d) { ?>
                                                        <option
                                                            value="<?= $d['div_id'] ?>"><?= $d['bn_div_name'] ?></option>
                                                    <?php }
                                                    ?>
                                                </select>
                                                <span id="ofc_div_err" style="color: red;"></span>
                                            </div>
                                            <!--জেলা-->
                                            <div class="col-md-6 ofc-class" style="text-align: ;  margin-bottom: 5px;">
                                                <label for="ofc_dist" class="col-md-12"
                                                       style="padding-left:0px ">জেলা</label>
                                                <select name="ofc_dist" id="ofc_dist" class="form-control">
                                                    <?php
                                                    foreach ($dist as $d) { ?>
                                                        <option
                                                            value="<?= $d['dist_id'] ?>"><?= $d['bn_dist_name'] ?></option>
                                                    <?php }
                                                    ?>
                                                </select>
                                                <span id="ofc_dist_err" style="color: red;"></span>
                                            </div>
                                            <!--উপজেলা-->
                                            <div class="col-md-6 ofc-class" style="text-align: ;  margin-bottom: 5px;">
                                                <label for="ofc_upz" class="col-md-12"
                                                       style="padding-left:0px ">উপজেলা</label>
                                                <select name="ofc_upz" id="ofc_upz" class="form-control">
                                                    <?php
                                                    foreach ($upz as $d) { ?>
                                                        <option
                                                            value="<?= $d['upz_id'] ?>"><?= $d['bn_upz_name'] ?></option>
                                                    <?php }
                                                    ?>
                                                </select>
                                                <span id="ofc_upz_err" style="color: red;"></span>
                                            </div>
                                            <!--ফোন-->
                                            <div class="col-md-6 ofc-class" style="text-align: ;  margin-bottom: 5px;">
                                                <label for="ofc_phn" class="col-md-12" style="padding-left:0px ">অফিস/সমিতির
                                                    ফোন নম্বর</label>
                                                <input type="text" name="ofc_phn" id="ofc_phn" class="form-control"
                                                       required>
                                                <span id="ofc_phn_err" style="color: red;"></span>
                                            </div>
                                            <!--ইমেইল-->
                                            <div class="col-md-6 ofc-class" style="text-align: ;  margin-bottom: 5px;">
                                                <label for="ofc_email" class="col-md-12" style="padding-left:0px ">অফিস/সমিতির
                                                    ইমেইল</label>
                                                <input type="email" name="ofc_email" id="ofc_email" class="form-control"
                                                       required>
                                                <span id="ofc_email_err" style="color: red;"></span>
                                            </div>
                                            <!--মোবাইল-->
                                            <div class="col-md-6 ofc-class" style="text-align: ;  margin-bottom: 5px;">
                                                <label for="ofc_mb" class="col-md-12" style="padding-left:0px ">অফিস/সমিতির
                                                    মোবাইল নম্বর</label>
                                                <input type="text" name="ofc_mb" id="ofc_mb" class="form-control"
                                                       required>
                                                <span id="ofc_mb_err" style="color: red;"></span>
                                            </div>
                                        </div>

                                    </div>
                                    <!--course status--->
                                    <div class="form-group">
                                        <label for="crs_stts" class="col-md-12" style="text-align: left;">কোর্স
                                            স্ট্যাটাস</label>
                                        <div class="col-md-12">
                                            <select name="crs_stts" id="crs_stts" required class="form-control">
                                                <option value="3">সম্পাদনযোগ্য</option>
                                            </select>
                                            <span id="crs_stts_err" style="color: red;"></span>
                                        </div>

                                    </div>
                                    <!--course name--->
                                    <div class="form-group">
                                        <label for="crs_title" class="col-md-12" style="text-align: left;">কোর্স
                                            শিরোনাম</label>
                                        <div class="col-md-12">
                                            <select name="crs_title" id="crs_title" class="form-control not-demand"
                                                    required>
                                                <?php
                                                foreach ($course_name as $c) { ?>
                                                    <option value="<?= $c['c_id'] ?>"><?= $c['c_name'] ?></option>
                                                <?php }
                                                ?>
                                            </select>
                                            <span id="crs_title_err" style="color: red;"></span>
                                        </div>
                                    </div>
                                    <!--year--->
                                    <div class="form-group">
                                        <label for="crs_year" class="col-md-12" style="text-align: left;">প্রশিক্ষণ
                                            বর্ষ</label>
                                        <div class="col-md-12">
                                            <input readonly type="text" name="crs_year" id="crs_year"
                                                   value="<?= str_replace(range(0, 9), $bn_digits, $curr_y) ?>"
                                                   class="form-control" required>
                                            <span id="crs_year_err" style="color: red;"></span>
                                        </div>
                                    </div>
                                    <!--course time--->
                                    <div class="form-group">
                                        <label for="start_date" class="col-md-12" style="text-align: left;">কোর্সের
                                            সময়সূচি</label>
                                        <div class="col-md-12">
                                            <select name="start_date" id="startDate" class="form-control not-demand"
                                                    required>
                                                <?php
                                                foreach ($course_time as $c) {
                                                    $dd = explode('-', $c['start_date']);
                                                    $ddd = explode('-', $c['end_date']);
                                                    $dddd = $dd[2] . '/' . $dd[1] . '/' . $dd[0] . ' থেকে ' . $ddd[2] . '/' . $ddd[1] . '/' . $ddd[0];
                                                    ?>
                                                    <option
                                                        value="<?= $c['c_id'] ?>"><?= str_replace(range(0, 9), $bn_digits, $dddd) ?></option>
                                                <?php }
                                                ?>
                                            </select>
                                            <span id="start_date_err" style="color: red;"></span>
                                        </div>
                                    </div>
                                    <!--course meyad--->
                                    <div class="form-group">
                                        <label for="meyad" class="col-md-12" style="text-align: left;">কোর্সের
                                            মেয়াদ</label>
                                        <div class="col-md-12">
                                            <input readonly type="text" name="meyad" id="meyad"
                                                   class="form-control not-demand">
                                            <span id="meyad_err" style="color: red;"></span>
                                        </div>
                                    </div>
                                    <!--training institute--->
                                    <div class="form-group">
                                        <label for="institute" class="col-md-12" style="text-align: left;">প্রশিক্ষণ
                                            প্রতিষ্ঠান</label>
                                        <div class="col-md-12">
                                            <select name="institute" id="institute" class="form-control" required>
                                                <?php
                                                foreach ($training_inst as $t) { ?>
                                                    <option value="<?= $t['id'] ?>"><?= $t['name'] ?></option>
                                                <?php }
                                                ?>
                                            </select>
                                            <span id="institute_err" style="color: red;"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <input type='hidden' id='nidERR' value='0'>

                            <div class="form-group">
                                <div class="col-md-6" align="right">
                                    <button name="myBtn" id="myBtn" value="0" type="submit"
                                            class="btn btn-success">সংযোজন করুন
                                    </button>
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
    
    function check_ofc() {
        var ofc = $('#ofc_id').val();
        var clss = $('#trainee_class').val();
        if (ofc == 'add_inst') {
            if (clss == 1 || clss == 3) {
                $('.ofc-class').show();
                //$('.ofc-class').attr('required', true);
                $('.somitee').show();
                /// $('.somitee').attr('required', true);
                $('.govt').hide();
                //$('.govt').attr('required', false);
            } else if (clss == 2) {
                $('.ofc-class').show();
                //$('.ofc-class').attr('required', true);
                $('.somitee').hide();
                //$('.somitee').attr('required', false);
                $('.govt').show();
                /// $('.govt').attr('required', true);
            }
        } else {
            $('.ofc-class').hide();
            ///$('.ofc-class').attr('required', false);
            $('.somitee').hide();
            //$('.somitee').attr('required', false);
            $('.govt').hide();
            //$('.govt').attr('required', false);
        }
    }
    function check_meyad() {
        var x = $('#startDate').val();
        console.log(x);
        if (x != null || x != '') {
            $.ajax({
                url: '<?= site_url()?>home/getCourseInfo',
                type: 'POST',
                data: {
                    id: x
                }, success: function (res) {
                    var data = $.parseJSON(res);
                    console.log(data);
                    $('#meyad').val(data['res'][0]['run_days'].getDigitBanglaFromEnglish());
                }
            });
        } else {
            $('#meyad').val('');
        }
    }
    function check_age() {
        var dob = $('#dob').val().split('/');
        dob = dob[1] + '-' + dob[0] + '-' + dob[2];
        var r = getAge(dob);
        $('#age').val((r + '').getDigitBanglaFromEnglish());
    }

    $(document).ready(function () {
        check_ofc();
        check_meyad();

///////////////////////////////////DATEPICKER//////////////////////////
        $('#dob').datepicker({
            format: "dd/mm/yyyy"
        }).on('changeDate', function (ev) {
            check_age();
        });
        $('#reg_update_date').datepicker({
            format: "dd/mm/yyyy"
        }).on('changeDate', function (ev) {
            $('#reg_update_date').datepicker('hide');
        });
        $('#reg_date').datepicker({
            format: "dd/mm/yyyy"
        }).on('changeDate', function (ev) {
            $('#reg_date').datepicker('hide');
        });
///////////////////////////////////DATEPICKER/////////////////////////

        $('#nid').keyup(function () {
            var tmp = $(this).val();

            var tmp_num = tmp.getDigitEnglishFromBangla();
            if (tmp_num == null || tmp_num <= 0 || isNaN(tmp_num)) {
                $(this).val((tmp_num).getDigitEnglishFromBangla().replace(/[^0-9]/, ''));
            }
            tmp = $(this).val().getDigitEnglishFromBangla();

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
                    $('#ofc_id').append('<option value="add_inst">সংযোজন করুন</option>');
                    check_ofc();

                    $('#startDate option').remove();
                    $.each(data1['res'], function (i, v) {
                        var dd = v['start_date'].split('-');
                        var ddd = v['end_date'].split('-')
                        var dddd = dd[2] + '/' + dd[1] + '/' + dd[0] + ' থেকে ' + ddd[2] + '/' + ddd[1] + '/' + ddd[0];

                        var trow = '<option value="' + v['c_id'] + '">' + dddd.getDigitBanglaFromEnglish() + '</option>';
                        $('#startDate').append(trow);
                    });
                    if (data1['res'].length == 0) {
                        $('#meyad').val('');
                    } else {
                        check_meyad();
                    }
                }
            });
        });

        $('#ofc_id').change(function () {
            var ofc = $(this).val();
            check_ofc();
        });

        $('#crs_title').change(function () {
            var tmp = $(this).val();
            var tmp1 = $('#trainee_class').val();

            $.ajax({
                type: 'post',
                url: '<?= site_url()?>home/getCourseData',
                data: {
                    crs_id: tmp,
                    clss_id: tmp1
                }, success: function (data) {
                    var data1 = $.parseJSON(data);
                    $('#startDate option').remove();
                    $.each(data1['res'], function (i, v) {
                        var dd = v['start_date'].split('-');
                        var ddd = v['end_date'].split('-')
                        var dddd = dd[2] + '/' + dd[1] + '/' + dd[0] + ' থেকে ' + ddd[2] + '/' + ddd[1] + '/' + ddd[0];

                        var trow = '<option value="' + v['c_id'] + '">' + dddd.getDigitBanglaFromEnglish() + '</option>';
                        $('#startDate').append(trow);
                    });
                    if (data1['res'].length == 0) {
                        $('#meyad').val('');
                    } else {
                        check_meyad();
                    }
                }
            });
        });
        $('#startDate').change(function () {
            check_meyad();
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
        document.getElementById('meyad_err').innerText = '';
        document.getElementById('start_date_err').innerText = '';
        var flag = true;
        var errMSG = 'অনুগ্রহ করে';

        var tmp_name = $('#name_bng').val();
        tmp_name = tmp_name.replace(/\s+/g, '');
        if (tmp_name == '' || tmp_name == null) {
            document.getElementById('name_bng_err').innerText = 'অনুগ্রহ করে সঠিক তথ্য প্রদান করুন';
            flag = false;
            errMSG += ' নাম ( বাংলা NID অনুযায়ী ) , ';
        } else {
            document.getElementById('name_bng_err').innerText = '';
        }
        /*var tmp_name_eng = $('#name_eng').val();
         tmp_name_eng = tmp_name_eng.replace(/\s+/g, '');
         if (tmp_name_eng == '' || tmp_name_eng == null) {
         document.getElementById('name_eng_err').innerText = 'অনুগ্রহ করে সঠিক তথ্য প্রদান করুন';
         flag = false;
         errMSG += ' নাম ( ইংরেজী NID অনুযায়ী ) , ';
         } else {
         document.getElementById('name_eng_err').innerText = '';
         }*/

        var tmp_nid = $('#nid').val();
        tmp_nid = tmp_nid.replace(/\s+/g, '');
        if (tmp_nid == '' || tmp_nid == null || tmp_nid.length != 17) {
            document.getElementById('nid_err').innerText = 'অনুগ্রহ করে সঠিক তথ্য প্রদান করুন';
            flag = false;
            errMSG += ' জাতীয় পরিচয়পত্র নম্বর , ';
        } else {
            if($('#nidERR').val()==1){
                document.getElementById('nid_err').innerText = 'অনুগ্রহ করে সঠিক তথ্য প্রদান করুন';
                flag = false;
            }else{
                document.getElementById('nid_err').innerText = '';
            }
        }

        var tmp_dob = $('#dob').val();
        tmp_dob = tmp_dob.replace(/\s+/g, '');
        if (tmp_dob == '' || tmp_dob == null) {
            document.getElementById('dob_err').innerText = 'অনুগ্রহ করে সঠিক তথ্য প্রদান করুন';
            flag = false;
            errMSG += ' জন্ম তারিখ ( NID অনুযায়ী ) , ';
        } else {
            if ($('#dobERR').val() == 1) {
                document.getElementById('dob_err').innerText = 'অনুগ্রহ করে সঠিক তথ্য প্রদান করুন';
                flag = false;
            } else {
                document.getElementById('dob_err').innerText = '';
            }
        }

        /*   var tmp_bld = $('#blood_grp').val();
         tmp_bld = tmp_bld.replace(/\s+/g, '');
         if (tmp_bld == '' || tmp_bld == null || tmp_bld == 0) {
         document.getElementById('blood_grp_err').innerText = 'অনুগ্রহ করে সঠিক তথ্য প্রদান করুন';
         flag = false;
         errMSG += ' রক্তের গ্রুপ, ';
         } else {
         document.getElementById('blood_grp_err').innerText = '';
         }*/

        var tmp_per_add = $('#p_details').val();
        tmp_per_add = tmp_per_add.replace(/\s+/g, '');
        if (tmp_per_add == '' || tmp_per_add == null) {
            document.getElementById('p_details_err').innerText = 'অনুগ্রহ করে সঠিক তথ্য প্রদান করুন';
            flag = false;
            errMSG += ' স্থায়ী ঠিকানা বিস্তারিত , ';
        } else {
            document.getElementById('p_details_err').innerText = '';
        }

        /*  var tmp_per_add = $('#curr_add').val();
         tmp_per_add = tmp_per_add.replace(/\s+/g, '');
         if (tmp_per_add == '' || tmp_per_add == null) {
         document.getElementById('curr_add_err').innerText = 'অনুগ্রহ করে সঠিক তথ্য প্রদান করুন';
         flag = false;
         errMSG += ' বর্তমান ঠিকানা, ';
         } else {
         document.getElementById('curr_add_err').innerText = '';
         }*/

        var tmp_mb = $('#per_mb').val().getDigitEnglishFromBangla();
        if (isNaN(tmp_mb) || tmp_mb == '' || tmp_mb == null || tmp_mb.length != 11 || tmp_mb.substr(0, 1) != 0 || tmp_mb.substr(1, 1) != 1) {
            flag = false;
            document.getElementById('per_mb_err').innerText = "১১ডিজিট(০১*********)সঠিকভাবে মোবাইল নম্বর প্রদান করুন";
            errMSG += ' ব্যক্তিগত মোবাইল নম্বর (সক্রিয়), ';
        } else {
            document.getElementById('per_mb_err').innerText = '';
        }

        /*var tmp_mb2 = $('#imp_mb').val().getDigitEnglishFromBangla();
         if (isNaN(tmp_mb2) || tmp_mb2 == '' || tmp_mb2 == null || tmp_mb2.length != 11 || tmp_mb2.substr(0, 1) != 0 || tmp_mb2.substr(1, 1) != 1) {
         flag = false;
         document.getElementById('imp_mb_err').innerText = "১১ডিজিট(০১*********)সঠিকভাবে মোবাইল নম্বর প্রদান করুন";
         errMSG += ' জরুরি প্রয়োজনে যোগাযোগের জন্য মোবাইল নম্বর (সক্রিয়), ';
         } else {
         document.getElementById('imp_mb_err').innerText = '';
         }*/

        var ofc = $('#ofc_id').val();
        /* if (ofc == 'add_inst') {
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
         }*/

        var sts = $('#crs_stts').val();
        if (sts == 3) {
            var tmp_start_date = $('#startDate').val();
            //tmp_start_date = tmp_start_date.replace(/\s+/g, '');
            if (tmp_start_date == '' || tmp_start_date == null || tmp_start_date == 0) {
                document.getElementById('start_date_err').innerText = 'অনুগ্রহ করে সঠিক তথ্য প্রদান করুন';
                flag = false;
            } else {
                document.getElementById('start_date_err').innerText = '';
            }

            var tmp_meyad = $('#meyad').val();
            tmp_meyad = tmp_meyad.replace(/\s+/g, '');
            if (tmp_meyad == '' || tmp_meyad == null) {
                document.getElementById('meyad_err').innerText = 'অনুগ্রহ করে সঠিক তথ্য প্রদান করুন';
                flag = false;
            } else {
                document.getElementById('meyad_err').innerText = '';
            }
        }

        /*
         var tmp_sign = $('#sign').val();
         tmp_sign = tmp_sign.replace(/\s+/g, '');
         if (tmp_sign == '' || tmp_sign == null) {
         document.getElementById('sign_err').innerText = 'অনুগ্রহ করে সঠিক তথ্য প্রদান করুন';
         flag = false;
         } else {
         if ($('#signERR').val() == 1) {
         document.getElementById('sign_err').innerText = 'অনুগ্রহ করে সঠিক তথ্য প্রদান করুন';
         flag = false;
         } else {
         document.getElementById('sign_err').innerText = '';
         }
         }

         var tmp_sign = $('#trainee_pic').val();
         tmp_sign = tmp_sign.replace(/\s+/g, '');
         if (tmp_sign == '' || tmp_sign == null) {
         document.getElementById('trainee_pic_err').innerText = 'অনুগ্রহ করে সঠিক তথ্য প্রদান করুন';
         flag = false;
         } else {
         if ($('#picERR').val() == 1) {
         document.getElementById('trainee_pic_err').innerText = 'অনুগ্রহ করে সঠিক তথ্য প্রদান করুন';
         flag = false;
         } else {
         document.getElementById('trainee_pic_err').innerText = '';
         }
         }*/


        if (flag == false) {
            $('#btnAlrt').text('অনুগ্রহ করে সঠিক তথ্য প্রদান করুন');
        } else {
            $('#btnAlrt').text('');
        }

        return flag;
    }


    /*function online_reg() {
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

       /* var tmp_nid = $('#nid').val();
        tmp_nid = tmp_nid.replace(/\s+/g, '');
        if (tmp_nid == '' || tmp_nid == null || tmp_nid.length != 17) {
            document.getElementById('nid_err').innerText = 'অনুগ্রহ করে সঠিক তথ্য প্রদান করুন';
            flag = false;
        } else {
            if ($('#nidERR').val() == 1) {
                document.getElementById('nid_err').innerText = 'অনুগ্রহ করে সঠিক তথ্য প্রদান করুন';
                flag = false;
            } else {
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

       /* var tmp_per_add = $('#p_details').val();
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

        /*var ofc = $('#ofc_id').val();
        if (ofc == '' || ofc == null || ofc == 0) {
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
    }*/


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


