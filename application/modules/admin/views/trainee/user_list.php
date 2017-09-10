<?php $bn_digits = array('০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯'); ?>
<div class="container-fluid display-table">
    <div class="row display-table-row">
        <?php $this->load->view('layouts/sidebar-nav'); ?>
        <div class="col-md-10 display-table-cell" id="main-content">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-hover table-responsive">
                        <h2>প্রশিক্ষণার্থীর বিস্তারিত তথ্য</h2>
                        <hr>
                        <table id="" class="table data-table table-striped table-bordered"
                               cellspacing="0">
                            <thead>
                            <tr>
                                <th style="text-align: center;">ক্রমিক</th>
                                <th style="text-align: center;">নাম</th>
                                <th style="text-align: center;">ইমেইল</th>
                                <th style="text-align: center;">মোবাইল</th>
                                <th style="text-align: center;">পদবী</th>
                                <th style="text-align: center;">অফিস</th>
                                <th style="text-align: center;">অ্যাকশন</th>
                            </tr>

                            </thead>
                            <tbody>
                            <?php $i = 1;
                            foreach ($user_info as $row) { ?>
                                <tr>
                                    <td style="text-align: center;">
                                        <?php
                                        echo str_replace(range(0, 9), $bn_digits, $i++);
                                        ?>
                                    </td>
                                    <td style="text-align: center;"><a onclick="user_info_details(<?= $row['id']; ?>)"
                                                                       style="cursor: pointer;"><?= $row['name']; ?></a>
                                    </td>
                                    <td style="text-align: center;"><?= $row['email']; ?></td>
                                    <td style="text-align: center;"><?= str_replace(range(0,9),$bn_digits,$row['mobile']); ?></td>
                                    <td style="text-align: center;"><?= $row['des_name']; ?></td>
                                    <td style="text-align: center;"><?= $row['inst_name']; ?></td>
                                    <td style="text-align: center;">
                                        <a onclick="user_info_details(<?= $row['id']; ?>)" style="cursor: pointer;">
                                            <span class="glyphicon glyphicon-eye-open"></span>
                                        </a> &nbsp;
                                        <a href="<?= site_url().'admin/user_info_edit/'.$row['id'];?>"style="cursor: pointer;">
                                            <span class="glyphicon glyphicon-edit"></span>
                                        </a>
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

<div class="modal fade" id="user_info_details" role="dialog">
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

<?php $this->load->view('layouts/footer'); ?>

<script>   
    $(document).ready(function () {
        $('[data-toggle="popover"]').popover();
    });

    function user_info_details(u_id) {
        $.ajax({
            type: 'post',
            url: '<?php echo site_url('admin/get_user_info');?>',
            data: {
                id: u_id
            }, success: function (data) {
                console.log(data);
                var data1 = $.parseJSON(data);
                $.each(data1['res'], function (index, value) {
                    $('#user_pdf').attr("href","<?php echo site_url().'admin/user_pdf/';?>"+u_id);
                    document.getElementById('u_name').innerText = value['name'];
                    document.getElementById('u_name_eng').innerText = value['name_eng'];
                    document.getElementById('u_nid').innerText = value['nid'].getDigitBanglaFromEnglish();
                    if(value['dob']==null){
                       document.getElementById('u_dob').innerText = '';
                    }else{
                       document.getElementById('u_dob').innerText = value['dob'].getDigitBanglaFromEnglish();
                    }
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
                    document.getElementById('u_parmanent').innerHTML ='বিভাগ:'+value["pDiv"]+'<br>জেলা:'+value["pDist"]+'<br>উপজেলা:'+value["pUpz"]+'<br>বিস্তারিত:'+value["parmanent_address"].getDigitBanglaFromEnglish();
                    document.getElementById('u_present').innerText = value['present_address'].getDigitBanglaFromEnglish();
                    document.getElementById('u_mb').innerText = value['mobile'].getDigitBanglaFromEnglish();
                    if(value['other_mb']==null){
                        document.getElementById('u_imp_mb').innerText = '';
                    }else{
                        document.getElementById('u_imp_mb').innerText = value['other_mb'].getDigitBanglaFromEnglish();
                    }
                    document.getElementById('u_email').innerText = value['email'];
                    document.getElementById('u_fb').innerText = value['fb_link'];
                    document.getElementById('u_edu').innerText = value['edu_name'];
                    document.getElementById('u_p').innerText = value['prf_name'];
                    document.getElementById('u_d').innerText = value['des_name'];
                    document.getElementById('u_type').innerText = value['class_name'];
                    document.getElementById('u_office').innerText = value['inst_name'] + ', ' + value['Idiv']+ ', ' + value['Idist']+ ', ' + value['Iupz'];
                    var tDaTe=value['registration_date'].split('-');
                    var TdAtE=tDaTe[2]+'-'+tDaTe[1]+'-'+tDaTe[0];
                    document.getElementById('u_reg').innerText = TdAtE.getDigitBanglaFromEnglish();
                    if(value['class_name']=='সমবায় সমিতির সদস্য'){
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

</script>