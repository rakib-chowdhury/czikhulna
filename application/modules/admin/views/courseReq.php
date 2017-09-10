<?php $bn_digits = array('০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯'); ?>
<div class="container-fluid display-table">
    <div class="row display-table-row">
        <?php $this->load->view('layouts/sidebar-nav'); ?>
        <div class="col-md-10 display-table-cell" id="main-content">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-hover table-responsive">
                        <h2><?= $page_title ?></h2>
                        <hr>
                        <?php
                        if($this->session->flashdata('message')!=null){ ?>
                            <p style="text-align: center; color: green; font-size:14px;"><?= $this->session->flashdata('message')?></p>
                        <?php }
                        ?>
                        <table id="emp-list" class="table table-striped table-bordered"
                               cellspacing="0">
                            <thead>
                            <tr>
                                <td style="text-align: center">ক্রমিক নং</td>
                                <td style="text-align: center">নাম</td>
                                <td style="text-align: center">প্রশিক্ষণার্থী ধরণ</td>
                                <td style="text-align: center">পদবী</td>
                                <td style="text-align: center">সমিতি/অফিসের ঠিকানা</td>
                                <td style="text-align: center">মোবাইল নম্বর</td>
                                <td style="text-align: center">কোর্সের নাম</td>
                                <td style="text-align: center">অ্যাকশন</td>
                            </tr>

                            </thead>
                            <tbody>
                            <?php
                            foreach ($allReq as $i => $row) { ?>
                                <tr>
                                    <td style="text-align: center;">
                                        <?= str_replace(range(0, 9), $bn_digits, ($i + 1)) ?>
                                    </td>
                                    <td style="text-align: center;">
                                        <a onclick="user_info_details(<?php echo $row['u_id']; ?>)"
                                           style="cursor: pointer;">
                                            <?= $row['name']; ?>
                                        </a>
                                    </td>
                                    <td style="text-align: center;"><?= $row['class_name'] ?></td>
                                    <td style="text-align: center;"><?= $row['des_name'] ?></td>
                                    <td style="text-align: center;"><?= $row['inst_name'] . ', ' . $row['bn_div_name'] . ', ' . $row['bn_dist_name'] . ', ' . $row['bn_upz_name'] ?></td>
                                    <td style="text-align: center;"><?= str_replace(range(0, 9), $bn_digits, $row['mobile']); ?></td>
                                    <td style="text-align: center;">
                                        <a onclick="course_info_details(<?php echo $row['c_id']; ?>)"
                                           style="cursor: pointer;"><?= $row['c_name'] ?></a>
                                    </td>
                                    <td style="text-align: center; width:14%">
                                        <a href="<?= site_url()?>admin/addToCourse/<?= $row['c_id']?>/<?= $row['u_id']?>/<?= $row['tuc_id']?>" style="cursor: pointer;" data-toggle="tooltip" data-placement="top"
                                           title="সংযোজন" class="btn btn-success"><span>সংযোজন</span></a>
                                        <a href="<?= site_url()?>admin/removeFromCourse/<?= $row['tuc_id']?>" style="cursor: pointer;" data-toggle="tooltip" data-placement="top"
                                           title="বাতিল" class="btn btn-danger"><span>বাতিল</span></a>
                                    </td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
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
<div class="modal fade in" id="user_info_details" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"></button>
                <h4 style="text-align: center;" class="modal-title">প্রশিক্ষণার্থীর বিস্তারিত তথ্য</h4>
            </div>
            <div class="modal-body">
                <table width="100%">
                    <tr>
                        <td style="text-align:right; padding-right:10px;"><a id="user_pdf">পিডিএফ/প্রিন্ট</a></td>
                    </tr>
                </table>
                <div>
                    <table align="center" id="donation" class="table table-striped table-bordered">
                        <tr>
                            <td style="padding-left: 20px; width:35%">নাম ( বাংলা NID অনুযায়ী )</td>
                            <td style="padding-left: 30px;"><p id="u_name"></p></td>
                        </tr>
                        <tr>
                            <td style="padding-left: 20px; width:30%">নাম ( ইংরেজী NID অনুযায়ী )</td>
                            <td style="padding-left: 30px;"><p id="u_name_eng"></p></td>
                        </tr>
                        <tr>
                            <td style="padding-left: 20px; width:30%">জাতীয় পরিচয়পত্র</td>
                            <td style="padding-left: 30px;"><p id="u_nid"></p></td>
                        </tr>
                        <tr>
                            <td style="padding-left: 20px; width:30%">জন্ম তারিখ</td>
                            <td style="padding-left: 30px;"><p id="u_dob"></p></td>
                        </tr>
                        <tr>
                            <td style="padding-left: 20px; width:30%">পুরুষ/নারী</td>
                            <td style="padding-left: 30px;"><p id="u_gender"></p></td>
                        </tr>
                        <tr>
                            <td style="padding-left: 20px; width:30%">রক্তের গ্রুপ</td>
                            <td style="padding-left: 30px;"><p id="u_bld_grp"></p></td>
                        </tr>
                        <tr>
                            <td style="padding-left: 20px; width:30%">পিতার নাম</td>
                            <td style="padding-left: 30px;"><p id="u_father"></p></td>
                        </tr>
                        <tr>
                            <td style="padding-left: 20px; width:30%">মাতার নাম</td>
                            <td style="padding-left: 30px;"><p id="u_mother"></p></td>
                        </tr>
                        <tr>
                            <td style="padding-left: 20px; width:30%">স্ত্রী/স্বামীর নাম</td>
                            <td style="padding-left: 30px;"><p id="u_spouse"></p></td>
                        </tr>
                        <tr>
                            <td style="padding-left: 20px; width:30%">স্থায়ী ঠিকানা</td>
                            <td style="padding-left: 30px;"><p id="u_parmanent"></p></td>
                        </tr>
                        <tr>
                            <td style="padding-left: 20px; width:30%">বর্তমান ঠিকানা</td>
                            <td style="padding-left: 30px;"><p id="u_present"></p></td>
                        </tr>
                        <tr>
                            <td style="padding-left: 20px; width:30%">মোবাইল নম্বর</td>
                            <td style="padding-left: 30px;"><p id="u_mb"></p></td>
                        </tr>
                        <tr>
                            <td style="padding-left: 20px; width:30%">জরুরি মোবাইল নম্বর</td>
                            <td style="padding-left: 30px;"><p id="u_imp_mb"></p></td>
                        </tr>
                        <tr>
                            <td style="padding-left: 20px; width:30%">ইমেইল ঠিকানা</td>
                            <td style="padding-left: 30px;"><p id="u_email"></p></td>
                        </tr>
                        <tr>
                            <td style="padding-left: 20px; width:30%">ফেইসবুক ঠিকানা</td>
                            <td style="padding-left: 30px;"><p id="u_fb"></p></td>
                        </tr>
                        <tr>
                            <td style="padding-left: 20px; width:30%">শিক্ষাগত যোগ্যতা</td>
                            <td style="padding-left: 30px;"><p id="u_edu"></p></td>
                        </tr>
                        <tr>
                            <td style="padding-left: 20px; width:30%">প্রশিক্ষণার্থী ধরণ</td>
                            <td style="padding-left: 30px;"><p id="u_type"></p></td>
                        </tr>
                        <tr>
                            <td style="padding-left: 20px; width:30%">বর্তমান পদবী</td>
                            <td style="padding-left: 30px;"><p id="u_d"></p></td>
                        </tr>
                        <tr>
                            <td style="padding-left: 20px; width:30%">বর্তমান পেশা</td>
                            <td style="padding-left: 30px;"><p id="u_p"></p></td>
                        </tr>
                        <tr>
                            <td style="padding-left: 20px; width:30%"><p id="offc">অফিস</p></td>
                            <td style="padding-left: 30px;"><p id="u_office"></p></td>
                        </tr>

                        <tr>
                            <td style="padding-left: 20px; width:30%">নিবন্ধন তারিখ</td>
                            <td style="padding-left: 30px;"><p id="u_reg"></p></td>
                        </tr>
                        <tr>
                            <td style="padding-left: 20px; width:30%">গৃহীত প্রশিক্ষণ</td>
                            <td style="padding-left: 30px;" id="u_pre_inst">
                            </td>

                        </tr>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-raised" data-dismiss="modal">বাতিল করুন</button>
            </div>

        </div>
    </div>
</div>
<div class="modal fade" id="course_info_details" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"></button>
                <h4 style="text-align: center;" class="modal-title">কোর্সের বিস্তারিত তথ্য</h4>
            </div>
            <div class="modal-body">
                <table width="100%">
                    <tr>
                        <td style="text-align:right; padding-right:10px;"><a id="course_pdf">পিডিএফ/প্রিন্ট</a></td>
                    </tr>
                </table>
                <div>
                    <table width="100%" align="center" border='0' id="courseInfo">

                    </table>
                    <table id="crseTrainee" class="table table-striped table-bordered center"
                           cellspacing="0">
                        <thead>
                        <tr style="">
                            <th style="text-align: center; width: 6%;">ক্রমিক নং</th>
                            <th style="text-align: center; ">প্রশিক্ষণার্থীর নাম</th>
                            <th style="text-align: center; width: 15%;">পদবী</th>
                            <th style="text-align: center; width: 25%;">অফিস/সমিতি</th>
                            <th style="text-align: center; width: 12%;">মোবাইল নং</th>
                            <th style="text-align: center; width: 20%;">ইমেইল</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-raised" data-dismiss="modal">বাতিল করুন</button>
            </div>

        </div>
    </div>
</div>

<?php $this->load->view('layouts/footer'); ?>
<script>
    $(document).ready(function () {
        /////////tooltip starts///////
        $('[data-toggle="tooltip"]').tooltip();
        //////////tooltip ends//////////
        $('#emp-list').DataTable({
            "bSort": false
        });
        $("#emp-list").css({"border-color": "#009688"});
        $("#emp-list tr").css({"border-color": "#009688"});
        $("#emp-list tr td").css({"border-color": "#009688"});

    });
    function user_info_details(u_id) {
        $.ajax({
            type: 'post',
            url: '<?php echo site_url('admin/get_user_info');?>',
            data: {
                id: u_id
            }, success: function (data) {
                var data1 = $.parseJSON(data);
                $.each(data1['res'], function (index, value) {
                    $('#user_pdf').attr("href", "<?php echo site_url() . 'admin/user_pdf/';?>" + u_id);
                    document.getElementById('u_name').innerText = value['name'];
                    document.getElementById('u_name_eng').innerText = value['name_eng'];
                    document.getElementById('u_nid').innerText = value['nid'].getDigitBanglaFromEnglish();
                    document.getElementById('u_dob').innerText = value['dob'].getDigitBanglaFromEnglish();
                    if (value['gender'] == 1) {
                        var gndr = 'পুরুষ';
                    } else if (value['gender'] == 2) {
                        var gndr = 'নারী'
                    } else {
                        gndr = value['gender'];
                    }
                    document.getElementById('u_bld_grp').innerText = value['blood_grp_name'];
                    document.getElementById('u_gender').innerText = gndr;
                    document.getElementById('u_father').innerText = value['father_name'];
                    document.getElementById('u_mother').innerText = value['mother_name'];
                    document.getElementById('u_spouse').innerText = value['spouse_name'];
                    document.getElementById('u_parmanent').innerHTML = 'বিভাগ:' + value["pDiv"] + '<br>জেলা:' + value["pDist"] + '<br>উপজেলা:' + value["pUpz"] + '<br>বিস্তারিত:' + value["parmanent_address"].getDigitBanglaFromEnglish();
                    document.getElementById('u_present').innerText = value['present_address'].getDigitBanglaFromEnglish();
                    document.getElementById('u_mb').innerText = value['mobile'].getDigitBanglaFromEnglish();
                    document.getElementById('u_imp_mb').innerText = value['other_mb'].getDigitBanglaFromEnglish();
                    document.getElementById('u_email').innerText = value['email'];
                    document.getElementById('u_fb').innerText = value['fb_link'];
                    document.getElementById('u_edu').innerText = value['edu_name'];
                    document.getElementById('u_p').innerText = value['prf_name'];
                    document.getElementById('u_d').innerText = value['des_name'];
                    document.getElementById('u_type').innerText = value['class_name'];
                    document.getElementById('u_office').innerText = value['inst_name'] + ', ' + value['Idiv'] + ', ' + value['Idist'] + ', ' + value['Iupz'];
                    var tDaTe = value['registration_date'].split('-');
                    var TdAtE = tDaTe[2] + '-' + tDaTe[1] + '-' + tDaTe[0];
                    document.getElementById('u_reg').innerText = TdAtE.getDigitBanglaFromEnglish();
                    if (value['class_name'] == 'সমবায় সমিতির সদস্য') {
                        document.getElementById('offc').innerText = 'সমিতি';
                    }

                    pre_inst = value['0'];
                    pre_inst_val = '';
                    if (pre_inst.length == 0) {
                        pre_inst_val = 'কোনো প্রশিক্ষণ গ্রহণ করেন নি';
                    } else {
                        $.each(pre_inst, function (i, v) {
                            pre_inst_val += '<p>' + ((i + 1) + '').getDigitBanglaFromEnglish() + '. ' + v['course_name'] + '<br>';
                            pre_inst_val += '' + v['course_institution_name'] + '<br>';
                            pre_inst_val += '' + v['course_duration'].getDigitBanglaFromEnglish() + '</p>';
                        });
                    }
                    document.getElementById('u_pre_inst').innerHTML = '<p>' + pre_inst_val + '</p>';

                });

                $('#user_info_details').modal('show');
            }
        });
    }

    function course_info_details(c_id) {
        $.ajax({
            type: 'post',
            url: '<?php echo site_url('admin/getCourseInfo');?>',
            data: {
                id: c_id
            }, success: function (data) {
                var data1 = $.parseJSON(data);
                $('#course_pdf').attr("href", "<?php echo site_url() . 'admin/courseDetailsPdf/';?>" + c_id);
                var trow = '<tr>' +
                    '<td style="width:60%">কোর্স শিরোনাম : ' + data1['crseInfo'][0]['c_name'] + '</td>' +
                    '<td>মেয়াদ : ' + data1['crseInfo'][0]['run_days'].getDigitBanglaFromEnglish() + 'দিন</td>' +
                    '</tr>' +
                    '<tr>' +
                    '<td>প্রশিক্ষণ বর্ষ : ' + data1['crseInfo'][0]['year'].getDigitBanglaFromEnglish() + '</td>' +
                    '<td>অর্থায়ন : ' + data1['crseInfo'][0]['donor_name'] + '</td>' +
                    '</tr>' +
                    '<tr>';
                tDAte = data1['crseInfo'][0]['start_date'].split('-');
                TdAtE = tDAte[2] + '-' + tDAte[1] + '-' + tDAte[0];

                trow += '<td>কোর্স শুরুর তারিখ : ' + TdAtE.getDigitBanglaFromEnglish() + '</td>';

                tDAte = data1['crseInfo'][0]['end_date'].split('-');
                TdAtE = tDAte[2] + '-' + tDAte[1] + '-' + tDAte[0];

                trow += '<td>কোর্স সমাপ্তির তারিখ : ' + TdAtE.getDigitBanglaFromEnglish() + '</td>' +
                    '</tr>' +
                    '<tr>' +
                    '<td>কোর্সের ধরণ : ' + data1['crseInfo'][0]['course_class_name'] + '</td>' +
                    '<td>প্রশিক্ষণার্থীর ধরণ : ' + data1['crseInfo'][0]['class_name'] + '</td>' +
                    '</tr>' +
                    '<tr>' +
                    '<td style="width:40%">প্রশিক্ষণার্থীর সংখ্যা মোট : ' + data1['crseInfo'][0]['total_student'].getDigitBanglaFromEnglish();

                var man = 0;
                var women = 0;

                if (data1['typeofstudent'] != null) {
                    $.each(data1['typeofstudent'], function (key5, stu) {
                        if (stu['gender'] == 1) {
                            man = stu['count'];
                        } else {
                            women = stu['count'];
                        }
                    });
                }

                trow += '(নারী : ' + (women + '').getDigitBanglaFromEnglish() + ', পুরুষ : ' + (man + '').getDigitBanglaFromEnglish() + ')' +
                    '</td>' +
                    '<td>গড় মূল্যায়ন : ' + (data1['get_avg_review'][0]['avg'] + '').getDigitBanglaFromEnglish() + '</td>' +
                    '</tr>';

                $('#courseInfo tr').remove();
                $('#courseInfo').append(trow);
                trow = '';
                $.each(data1['trainee'], function (index, row) {
                    trow = '<tr>'
                        + '<td style="text-align: center;">'
                        + ((index + 1)+'').getDigitBanglaFromEnglish()
                        + '</td>'
                        + '<td>' + row['u_name'] + '</td>'
                        + '<td>' + row['designation'] + '</td>'
                        + '<td>' + row['inst_name'] + '</td>'
                        + '<td>' + row['mobile'].getDigitBanglaFromEnglish() + '</td>'
                        + '<td>' + row['email'] + '</td>'
                        + '</tr>';
                });
                $('#crseTrainee tbody').append(trow);

                $('#course_info_details').modal('show');
            }
        });
    }
</script>