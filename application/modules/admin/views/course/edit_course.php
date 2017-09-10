<?php $bn_digits = array('০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯'); ?>
<div id="load_img" style="position: absolute;z-index: 1000;top: 50%;left: 40%;display:none;"><img
        src="<?= base_url(); ?>assets/img/load_img.gif" alt=""></div>
<style>
    .fixed_width {
        width;
        32%;
    }

</style>
<div class="container-fluid display-table">
    <div class="row display-table-row">
        <?php $this->load->view('layouts/sidebar-nav'); ?>
        <div class="col-md-10 display-table-cell" id="main-content">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-hover ">
                        <h2 style="text-align: center"><?= $page_title ?></h2>
                        <hr>
                        <form onsubmit="return edit_course_bttn()" id="edit_course_form"
                              action="<?php echo site_url('admin/edit_course'); ?>" method="post">
                            <input type="hidden" name="course_id" value="<?= $course_info[0]['c_id'] ?>">
                            <div class="modal-body">
                                <div class="row">
                                    <!---course name--->
                                    <div class="form-group col-md-10 col-md-offset-1">
                                        <label for="course_name" class="col-md-2 control-label"
                                               style="text-align: right">কোর্স শিরোনাম</label>
                                        <div class="col-md-9">
                                            <select name="course_name" id="add_course_course_name" class="form-control">
                                                <?php
                                                foreach ($course_names as $c) { ?>
                                                    <option <?php if ($course_info[0]['course_name_id'] == $c['c_id']) {
                                                        echo 'selected';
                                                    } ?> value="<?= $c['c_id'] ?>"><?= $c['c_name'] ?></option>
                                                <?php }
                                                ?>
                                            </select>
                                            <span style="color: red;" id="crs_err"></span>
                                        </div>
                                    </div>
                                    <!---donor--->
                                    <div class="form-group col-md-10 col-md-offset-1">
                                        <label for="donation_amount" class="col-md-2 control-label"
                                               style="text-align: right">অর্থায়ন</label>
                                        <div class="col-md-9">
                                            <select id="d_id" name="donor_name" class="form-control">
                                                <?php foreach ($list as $l) { ?>
                                                    <option <?php if ($course_info[0]['donor_id'] == $l['id']) {
                                                        echo 'selected';
                                                    } ?> value="<?= $l['id']; ?>"><?= $l['donor_name']; ?>
                                                        (<?= str_replace(range(0, 9), $bn_digits, $l['donation_year']); ?>
                                                        )
                                                    </option>
                                                <?php } ?>
                                            </select>
                                            <?php if (sizeof($list) == 0) {
                                                echo '<span style="color: red;">অনুগ্রহ করে খাত সংযোজন করে কোর্স সংযোজন করুন।</span>';
                                            } ?>
                                        </div>
                                    </div>
                                    <!---course class--->
                                    <div class="form-group col-md-10 col-md-offset-1">
                                        <label for="total_student" class="col-md-2 control-label"
                                               style="text-align: right">কোর্সের ধরণ</label>
                                        <div class="col-md-9">
                                            <select required onclick="add_course_class()" name="course_type"
                                                    class="form-control"
                                                    id="course_clsss_add">
                                                <?php foreach ($course_class as $c) { ?>
                                                    <option <?php if ($course_info[0]['course_class_id'] == $c['course_class_id']) {
                                                        echo 'selected';
                                                    } ?>
                                                        value="<?= $c['course_class_id']; ?>"><?= $c['course_class_name']; ?></option>
                                                <?php } ?>
                                                <!--<option value="add">সংযোজন করুন</option>-->
                                            </select>
                                            <span style="color: red;" id="clss_err"></span>
                                        </div>
                                    </div>
                                    <!---classification--->
                                    <div class="form-group col-md-10 col-md-offset-1">
                                        <label for="total_student" class="col-md-2 control-label"
                                               style="text-align: right">প্রশিক্ষণার্থী
                                            ধরণ</label>
                                        <div class="col-md-9">
                                            <select required onclick="add_class()" name="u_type" class="form-control"
                                                    id="clsss_add">
                                                <?php foreach ($clssfctn as $c) { ?>
                                                    <option <?php if ($course_info[0]['classification_id'] == $c['id']) {
                                                        echo 'selected';
                                                    } ?> value="<?= $c['id']; ?>"><?= $c['class_name']; ?></option>
                                                <?php } ?>
                                                <!--<option value="add">সংযোজন করুন</option>-->
                                            </select>
                                            <span style="color: red;" id="clss_err"></span>
                                        </div>
                                    </div>
                                    <!---start date--->
                                    <div class="form-group col-md-10 col-md-offset-1">
                                        <label for="start_date" class="col-md-2 control-label"
                                               style="text-align: right">শুরুর
                                            তারিখ</label>
                                        <div class="col-md-9">
                                            <input onchange="check_date('start_date','start_date_err')"
                                                   onblur="check_date('start_date','start_date_err')" type="text"
                                                   class="form-control" name="start_date" id="start_date"
                                                   placeholder="শুরুর তারিখ"
                                                   value="<?php $fg = explode('-', $course_info[0]['start_date']);
                                                   echo str_replace(range(0, 9), $bn_digits, ($fg[1] . '/' . $fg[2] . '/' . $fg[0])) ?>"
                                                   required>
                                            <span style="color: red;" id="start_date_err"></span>
                                        </div>
                                    </div>
                                    <!---end date--->
                                    <div class="form-group col-md-10 col-md-offset-1">
                                        <label for="end_date" class="col-md-2 control-label" style="text-align: right">শেষ
                                            তারিখ</label>
                                        <div class="col-md-9">
                                            <input onchange="check_date('end_date','end_date_err')" type="text"
                                                   class="form-control"
                                                   name="end_date" id="end_date"
                                                   value="<?php $fg = explode('-', $course_info[0]['end_date']);
                                                   echo str_replace(range(0, 9), $bn_digits, ($fg[1] . '/' . $fg[2] . '/' . $fg[0])) ?>"
                                                   placeholder="শেষ তারিখ" required>
                                            <span style="color: red;" id="end_date_err"></span>
                                        </div>
                                    </div>
                                    <!---expense--->
                                    <div class="form-group col-md-10 col-md-offset-1">
                                        <label for="expense" class="col-md-2 control-label" style="text-align: right">মোট
                                            খরচ</label>
                                        <div class="col-md-9">
                                            <input type="hidden" name="expense_eng" id="expense_eng_add_course">
                                            <input type="text" id="expense" name="expense" readonly required
                                                   class="form-control"
                                                   value="<?= str_replace(range(0, 9), $bn_digits, $course_info[0]['expenditure']) ?>">
                                            <span style="color: red;" id="alloc-div"></span>
                                        </div>
                                    </div>
                                    <!---expense details--->
                                    <div class="form-group col-md-10 col-md-offset-1">
                                        <label for="expense" class="col-md-2 control-label"
                                               style="text-align: right; padding-left: 0px">বিস্তারিত ব্যয়
                                            বিভাজন</label>
                                    </div>
                                    <div class="form-group col-md-10 col-md-offset-1">
                                        <label for="pre_inst" class="col-md-2 control-label"
                                               style="text-align: right"></label>
                                        <div class="col-md-9">
                                            <a class="pull-right btn btn-success" onclick="add_tt()"
                                               style="margin-bottom: 5px;">সংযোজন করুন</a>
                                            <table class="table table-bordered table-striped " id="trainee"
                                                   cellspacing="0" style="margin-bottom: 0px;">
                                                <tr>
                                                    <th style="text-align: center;">বিস্তারিত</th>
                                                    <th style="text-align: center; width: 15%">ইউনিট সংখ্যা</th>
                                                    <th style="text-align: center; width: 12%">একক দর</th>
                                                    <th style="text-align: center; width: 18%">মোট টাকা</th>
                                                    <th style="width: 5%"></th>
                                                </tr>
                                                <?php
                                                foreach ($expense_info as $k => $e) { ?>
                                                    <input type="hidden" name="excID[]"
                                                           value="<?= $e['expense_details_id'] ?>"></input>
                                                    <tr>
                                                        <td>
                                                            <input type="text" name="c_details[]" class="form-control"
                                                                   value="<?= $e['details'] ?>"
                                                                   required>
                                                        </td>
                                                        <td>
                                                            <input onkeyup="doCal(this.id)" onblur="doCal(this.id)"
                                                                   type="text" id="chilDD<?= ($k + 1) ?>"
                                                                   name="c_unit_q[]"
                                                                   class="form-control" required
                                                                   value="<?= str_replace(range(0, 9), $bn_digits, $e['unit_quantity']) ?>">
                                                        </td>
                                                        <td>
                                                            <input onkeyup="doCal(this.id)" onblur="doCal(this.id)"
                                                                   type="text" id="chilDDD<?= ($k + 1) ?>"
                                                                   name="c_unit_p[]"
                                                                   class="form-control" required
                                                                   value="<?= str_replace(range(0, 9), $bn_digits, $e['unit_price']) ?>">
                                                        </td>
                                                        <td>
                                                            <input readonly type="text" name="c_total[]"
                                                                   class="form-control" required
                                                                   value="<?= str_replace(range(0, 9), $bn_digits, $e['unit_price'] * $e['unit_quantity']) ?>">
                                                        </td>
                                                        <td>

                                                        </td>
                                                    </tr>
                                                <?php }
                                                ?>
                                            </table>
                                        </div>
                                    </div>
                                    <!---teacher add---->
                                    <div class="form-group col-md-10 col-md-offset-1">
                                        <label for="teacher" class="col-md-2 control-label"
                                               style="text-align: right; padding-left: 0px; padding-top: 7px;">প্রশিক্ষক
                                            সংযোজন</label>
                                        <div class="col-md-9">
                                            <a class="btn btn-success" onclick="add_teacher()"
                                               style="margin-bottom: 5px;">সংযোজন করুন</a>
                                        </div>
                                    </div>
                                    <div id="teacherDiv">
                                        <?php
                                        if (sizeof($teacher_info) != 0) {
                                            foreach ($teacher_info as $tecK => $tecV) {
                                                ?>
                                                <div id="tecChld<?= $tecK + 1 ?>"
                                                     class="form-group col-md-10 col-md-offset-1">
                                                    <label for="teacher" class="col-md-2 control-label"
                                                           style="text-align: right; padding-top: 7px;"></label>
                                                    <div class="col-md-3">
                                                        <label class="col-md-12">বক্তা/প্রশিক্ষক </label>
                                                        <select name="teachers[]" id="" class="form-control">
                                                            <?php foreach ($teachers as $v) { ?>
                                                                <option <?php if ($tecV['teacher_id'] == $v['t_id']) {
                                                                    echo 'selected';
                                                                } ?> value="<?= $v['t_id'] ?>"><?= $v["t_name"] ?>
                                                                    (<?= str_replace(range(0, 9), $bn_digits, $v["t_nid"]) ?>
                                                                    )
                                                                </option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label class="col-md-12">সেশন সংখ্যা</label>
                                                        <input value="<?=$tecV['session_num']?>" type="text" class="form-control" name="techNum[]">
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label class="col-md-12">সেশন তারিখ</label>
                                                        <input value="<?=$tecV['session_date']?>" type="text" class="form-control" name="techdate[]">
                                                    </div>
                                                    <label for="teacher" class="col-md-2 control-label"
                                                           style="text-align: right; padding-top: 7px;"></label>
                                                    <div class="col-md-6" style="margin-top: 8px;">
                                                        <label class="col-md-12">বিষয়</label>
                                                        <input type="text" class="form-control" name="techSub[]" value="<?=$tecV['subject_name']?>">
                                                    </div>
                                                    <div class="col-md-3" style="margin-top: 8px;">
                                                        <label class="col-md-12">সম্মানি</label>
                                                        <input value="<?=$tecV['salary']?>" type="text" class="form-control" name="techSalary[]">
                                                    </div>
                                                    <div class="col-md-1">
                                                        <a onclick="removeteacher('tecChld<?= $tecK + 1 ?>')"
                                                           class="btn btn-danger">X</a>
                                                    </div>
                                                </div>
                                            <?php }
                                        }
                                        ?>
                                    </div>
                                    <!---course requirement--->
                                    <div class="form-group col-md-10 col-md-offset-1">
                                        <label for="teacher" class="col-md-2 control-label"
                                               style="text-align: right; padding-left: 0px; padding-top: 7px;">প্রশিক্ষণ
                                            কোর্স ভিত্তিক শর্ত/যোগ্যতা</label>

                                    </div>
                                    <!---age--->
                                    <div class="form-group col-md-10 col-md-offset-1">
                                        <label for="req_age" class="col-md-2 control-label"
                                               style="text-align: right; padding-top: 7px;">অংশগ্রহণকারী বয়স</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control"
                                                   name="req_age" id="req_age"
                                                   placeholder="অংশগ্রহণকারী বয়স" required
                                                   value="<?php if (sizeof($req) != 0) {
                                                       echo str_replace(range(0, 9), $bn_digits, $req[0]['req_age']);
                                                   } ?>"
                                            >
                                            <span style="color: red;" id="req_age_err"></span>
                                        </div>
                                    </div>
                                    <!---education--->
                                    <div class="form-group col-md-10 col-md-offset-1">
                                        <label for="req_edu" class="col-md-2 control-label"
                                               style="text-align: right; padding-top: 7px;">শিক্ষাগত যোগ্যতা</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control"
                                                   name="req_edu" id="req_edu"
                                                   placeholder="শিক্ষাগত যোগ্যতা" required
                                                   value="<?php if (sizeof($req) != 0) {
                                                       echo str_replace(range(0, 9), $bn_digits, $req[0]['req_edu']);
                                                   } ?>"
                                            >
                                            <span style="color: red;" id="req_edu_err"></span>
                                        </div>
                                    </div>
                                    <!---items that trainee will bring with them--->
                                    <div class="form-group col-md-10 col-md-offset-1">
                                        <label for="req_things" class="col-md-2 control-label"
                                               style="text-align: right; padding-top: 7px;">কী নিয়ে আসতে হবে তার
                                            তালিকা</label>
                                        <div class="col-md-9">
                                            <textarea name="req_things" id="req_things"
                                                      class="summernote"><?php if (sizeof($req) != 0) {
                                                    echo $req[0]['req_things'];
                                                } ?></textarea>
                                            <span style="color: red;" id="req_things_err"></span>
                                        </div>
                                    </div>
                                    <!---other req--->
                                    <div class="form-group col-md-10 col-md-offset-1">
                                        <label for="req_other" class="col-md-2 control-label"
                                               style="text-align: right; padding-top: 7px;">অন্যান্য বিশেষ
                                            যোগ্যতা</label>
                                        <div class="col-md-9">
                                            <textarea name="req_other" id="req_other"
                                                      class="summernote"><?php if (sizeof($req) != 0) {
                                                    echo $req[0]['req_other'];
                                                } ?></textarea>
                                            <span style="color: red;" id="req_other_err"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer" style="text-align: center">
                                <button id="add_course_btn" type="submit"
                                        class="btn btn-success btn-raised">দাখিল করুন
                                </button>
                                <a href="<?= site_url('admin/edit_courses/' . $course_info[0]['c_id']) ?>">
                                    <button type="button" class="btn btn-danger btn-raised">বাতিল করুন
                                    </button>
                                </a>
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

<script>
    var chilD =<?= sizeof($expense_info);?>;
    var tecChld = <?= sizeof($teacher_info);?>;
    $('document').ready(function () {
        $("#start_date").datepicker({dateFormat: 'yy-mm-dd'});
    });

    function add_course_bttn() {
        var tmp_date = $('#end_date').val();
        var tmp_date1 = $('#start_date').val();

        var tmp_crse = $('#add_course_course_name').val();
        tmp_crse = tmp_crse.replace(/\s+/g, '');

        var tmp_user_type = $('#clsss_add').val();

        var tmp_expense = $('#expense').val().getDigitEnglishFromBangla();

        var flag = true;

        date_diff = (new Date(tmp_date) - new Date(tmp_date1)) / 1000 / 60 / 60 / 24;

        if (tmp_date == '' || tmp_date == null || tmp_date == '00-00-0000' || date_diff < 0) {
            document.getElementById('end_date_err').innerText = 'অনুগ্রহ করে সঠিক তারিখ প্রদান করুন';
            flag = false;
        } else {
            document.getElementById('end_date_err').innerText = '';
        }
        if (tmp_date1 == '' || tmp_date1 == null || tmp_date1 == '00-00-0000' || date_diff < 0) {
            document.getElementById('start_date_err').innerText = 'অনুগ্রহ করে সঠিক তারিখ প্রদান করুন';
            flag = false;
        } else {
            document.getElementById('start_date_err').innerText = '';
        }
        if (tmp_crse == null || tmp_crse == '') {
            flag = false;
            document.getElementById('crs_err').innerText = 'অনুগ্রহ করে সঠিক তথ্য প্রদান করুন';
        } else {
            document.getElementById('crs_err').innerText = '';
        }
        if (tmp_user_type == '' || tmp_user_type == null) {
            flag = false;
            document.getElementById('clss_err').innerText = "প্রশিক্ষণার্থী ধরণ নির্বাচন করুন";
        } else {
            document.getElementById('clss_err').innerText = '';
        }
        if (tmp_expense == null || tmp_expense == '' || tmp_expense <= 0 || isNaN(tmp_expense)) {
            flag = false;
            document.getElementById('alloc-div').innerText = 'অনুগ্রহ করে সঠিক অর্থ প্রদান করুন';
        } else {
            document.getElementById('alloc-div').innerText = '';
        }

        return flag;
    }

    function check_allocation(id) {
        var tmp_amnt = $('#expense').val().getDigitEnglishFromBangla();
        var f_err = false;
        if (tmp_amnt == null || tmp_amnt == '' ||  isNaN(tmp_amnt)) {
            f_err = true;
            $('#add_course_btn').prop('disabled', 'true');
            document.getElementById('alloc-div').innerText = 'অনুগ্রহ করে সঠিক অর্থ প্রদান করুন';
        }else{
$('#add_course_btn').removeAttr('disabled');
        }/*
        var d_id = $('#d_id').val();
        console.log(d_id);
        $.ajax({
            type: 'post',
            url: '<?= site_url("admin/get_used_amount");?>',
            data: {
                d_id: d_id
            }, success: function (data) {
                console.log(data);
                data1 = $.parseJSON(data);
                console.log(data1);

                if (tmp_amnt == '' || tmp_amnt == null) {
                    tmp_amnt = 0;
                }
                var tmp = parseFloat(data1['used_amnt']) + parseFloat(tmp_amnt);
                var allocation = parseFloat(data1['alloc']);
                console.log(allocation);
                console.log(tmp);
                if (allocation >= tmp) {
                    if (f_err == false) {
                        //$('#add_course_btn').removeAttr('disabled');
                        document.getElementById('alloc-div').innerText = '';
                        document.getElementById('expense_eng_add_course').value = tmp_amnt;
                    }
                } else {
                    if (f_err == false) {
                        //$('#add_course_btn').prop('disabled', 'true');
                        //document.getElementById('alloc-div').innerText = 'দুঃখিত, প্রদানকৃত মোট খরচ, খাত এর জন্য বরাদ্দকৃত অর্থ কে অতিক্রম করেছে';
                        document.getElementById('alloc-div').innerText = 'প্রদানকৃত মোট খরচ, খাত এর জন্য বরাদ্দকৃত অর্থ কে অতিক্রম করেছে';
                    }

                }

            }
        });*/

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
    function doCal(id) {
        //console.log(id);
        checkAmount(id);

        var pUnitQ = 0;
        var pUnitP = 0;
        var pTotal = 0;
        var sTotal = 0;

        $('#trainee tr').each(function (i, v) {
            if (i != 0) {
                console.log();
                console.log();
                pUnitQ = $(this).find('td:nth-child(2) input').val().getDigitEnglishFromBangla();
                pUnitP = $(this).find('td:nth-child(3) input').val().getDigitEnglishFromBangla();
                pTotal = pUnitQ * pUnitP;
                sTotal += pTotal;
                $(this).find('td:nth-child(4) input').val((pTotal + '').getDigitBanglaFromEnglish());
            }
        });
        $('#expense').val((sTotal + '').getDigitBanglaFromEnglish());

        check_allocation();
    }
    $(document).on('click', '.rmv', function (event) {
        event.preventDefault();
        $(this).closest('tr').remove();
        doCal('expense');
    });
    function add_tt() {
        chilD++;
        var trow = '<tr>'
            + '<td>'
            + '<input type="text" name="c_details[]" class="form-control" required>'
            + '</td>'
            + '<td>'
            + '<input onkeyup="doCal(this.id)" onblur="doCal(this.id)" type="text" id="chilDD' + chilD + '" name="c_unit_q[]" class="form-control" required>'
            + '</td>'
            + '<td>'
            + '<input onkeyup="doCal(this.id)" onblur="doCal(this.id)" type="text" id="chilDDD' + chilD + '" name="c_unit_p[]" class="form-control" required>'
            + '</td>'
            + '<td>'
            + '<input readonly type="text" name="c_total[]" class="form-control" required>'
            + '</td>'
            + '<td>'
            + '<a style="cursor:pointer;" class="btn btn-danger rmv">বাতিল</a>'
            + '</td>'
            + '</tr>';
        $(document).find(".datepick_class").unbind().bind();
        $('#trainee').append(trow);
    }

    function removeteacher(id) {
        $('#' + id).remove();
    }
    function add_teacher() {
        $.ajax({
            url: '<?= site_url("admin/get_teacher_info")?>',
            type: 'post',
            data: {
                id: 'all'
            }, success: function (res) {
                tecChld++;
                //console.log(res);
                var data = $.parseJSON(res);
                var tec = '<div id="tecChld' + tecChld + '" class="form-group col-md-10 col-md-offset-1">';
                tec += '<label for="teacher" class="col-md-2 control-label" style="text-align: right; padding-top: 7px;"></label>';
                tec += '<div class="col-md-3">';
                tec += '<label class="col-md-12">বক্তা/প্রশিক্ষক </label>';
                tec += '<select name="teachers[]" id="" class="form-control">';
                $.each(data['res'], function (i, v) {
                    tec += '<option value="' + v['t_id'] + '">' + v["t_name"] + '(' + v["t_nid"].getDigitBanglaFromEnglish() + ')</option>';
                });
                tec += '</select>';
                tec += '</div>';

                tec += '<div class="col-md-3">';
                tec += '<label class="col-md-12">সেশন সংখ্যা</label>';
                tec += '<input type="text" class="form-control" name="techNum[]">';
                tec += '</div>';
                tec += '<div class="col-md-3">';
                tec += '<label class="col-md-12">সেশন তারিখ</label>';
                tec += '<input type="text" class="form-control" name="techdate[]">';
                tec += '</div>';
                tec += '<label for="teacher" class="col-md-2 control-label" style="text-align: right; padding-top: 7px;"></label>';
                tec += '<div class="col-md-6" style="margin-top: 8px;">';
                tec += '<label class="col-md-12">বিষয়</label>';
                tec += '<input type="text" class="form-control" name="techSub[]">';
                tec += '</div>';
                tec += '<div class="col-md-3" style="margin-top: 8px;">';
                tec += '<label class="col-md-12">সম্মানি</label>';
                tec += '<input type="text" class="form-control" name="techSalary[]">';
                tec += '</div>';


                tec += '<div class="col-md-1">';
                tec += '<a onclick="removeteacher(\'tecChld' + tecChld + '\')" class="btn btn-danger">X</a>';
                tec += '</div>';
                tec += '</div>';

                $('#teacherDiv').append(tec);
            }
        });

    }

    function check_date(id, err_id) {
        var tmp_date = $('#' + id).val();
        if (tmp_date == '' || tmp_date == null || tmp_date == '00-00-0000') {
            document.getElementById(err_id).innerText = 'অনুগ্রহ করে সঠিক তারিখ প্রদান করুন';
        } else {
            document.getElementById(err_id).innerText = '';
        }
    }
    function check_c_name(id, err_id) {
        var tmp_name = $('#' + id).val();
        tmp_name = tmp_name.replace(/\s+/g, '');
        if (tmp_name == '' || tmp_name == null) {
            document.getElementById(err_id).innerText = 'অনুগ্রহ করে সঠিক তথ্য প্রদান করুন';
        } else {
            document.getElementById(err_id).innerText = '';
        }
    }

</script>
