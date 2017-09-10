<?php $bn_digits = array('০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯'); ?>
<div class="container-fluid display-table">
    <div class="row display-table-row">
        <?php $this->load->view('layouts/sidebar-nav'); ?>
        <div class="col-md-10 display-table-cell" id="main-content">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-hover table-responsive">
                        <h2 style="text-align:center"><?= $page_title?></h2>
                        <?php if($this->session->flashdata('message')){ ?>
                            <p style="text-align: center; color: green"><?= $this->session->flashdata('message')?></p>
                        <?php }?>
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
                            foreach ($teacher_info as $row) { ?>
                                <tr>
                                    <td style="text-align: center;">
                                        <?php
                                        echo str_replace(range(0, 9), $bn_digits, $i++);
                                        ?>
                                    </td>
                                    <td style="text-align: center;"><a onclick="teacher_info_details(<?= $row['t_id']; ?>)"
                                                                       style="cursor: pointer;"><?= $row['t_name']; ?></a>
                                    </td>
                                    <td style="text-align: center;"><?= $row['t_email']; ?></td>
                                    <td style="text-align: center;"><?= str_replace(range(0,9),$bn_digits,$row['t_mobile']); ?></td>
                                    <td style="text-align: center;"><?= $row['des_name']; ?></td>
                                    <td style="text-align: center;"><?= $row['inst_name']; ?></td>
                                    <td style="text-align: center;">
                                       <!-- <a onclick="teacher_info_details(<?= $row['t_id']; ?>)" style="cursor: pointer;">
                                            <span class="glyphicon glyphicon-eye-open"></span>
                                        </a> &nbsp;-->
                                        <a title="তথ্য সংশোধন" href="<?= site_url().'admin/teacher_info_edit/'.$row['t_id'];?>"style="cursor: pointer;">
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

<div class="modal fade" id="teacher_info_details" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"></button>
                <h4 style="text-align: center;" class="modal-title">বক্তা/প্রশিক্ষকের বিস্তারিত তথ্য</h4>
            </div>
            <div class="modal-body">
                <table width="100%">
                    <tr>
                        <td style="text-align:right; padding-right:10px;"><a id="teacher_pdf">পিডিএফ/প্রিন্ট</a></td>
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
                            <td style="padding-left: 20px; width:30%">বক্তা/প্রশিক্ষকের ধরণ</td>
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
                    </table>
                </div>
                <div>
                    <table align="center" id="crse_tchr_tbl" class="table table-striped table-bordered">
                        <tr>
                            <td style="text-align: center;">ক্রমিক</td>
                            <td style="text-align: center;">কোর্স শিরোনাম</td>
                            <td style="text-align: center;">কোর্স শুরুর তারিখ</td>
                            <td style="text-align: center;">কোর্স সমাপ্তির তারিখ</td>
                            <td style="text-align: center;">প্রশিক্ষণ প্রতিষ্ঠান</td>
                            <td style="text-align: center;">বিষয়</td>
                            <td style="text-align: center;">সেশন সংখ্যা </td>
                            <td style="text-align: center;">সেশন গ্রহণের তারিখ</td>
                            <td style="text-align: center;">সম্মানি হার (টাকা)</td>
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

    function teacher_info_details(u_id) {
        $.ajax({
            type: 'post',
            url: '<?php echo site_url('admin/get_teacher_info');?>',
            data: {
                id: u_id
            }, success: function (data) {
                //console.log(data);
                var data1 = $.parseJSON(data);
                $.each(data1['res'], function (index, value) {
                    $('#teacher_pdf').attr("href","<?php echo site_url().'admin/teacher_pdf/';?>"+u_id);
                    document.getElementById('u_name').innerText = value['t_name'];
                    document.getElementById('u_name_eng').innerText = value['t_name_eng'];
                    document.getElementById('u_nid').innerText = value['t_nid'].getDigitBanglaFromEnglish();
                    if(value['t_dob']==null){
                       document.getElementById('u_dob').innerText = '';
                    }else{
                       document.getElementById('u_dob').innerText = value['t_dob'].getDigitBanglaFromEnglish();
                    }
                    if (value['t_gender'] == 1) {
                        var gndr = 'পুরুষ';
                    } else if (value['t_gender'] == 2) {
                        var gndr = 'নারী'
                    } else {
                        gndr = value['t_gender'];
                    }
                    document.getElementById('u_bld_grp').innerText = value['blood_grp_name'];
                    document.getElementById('u_gender').innerText = gndr;
                    document.getElementById('u_father').innerText = value['t_father_name'];
                    document.getElementById('u_mother').innerText = value['t_mother_name'];
                    document.getElementById('u_spouse').innerText = value['t_spouse_name'];
                    document.getElementById('u_parmanent').innerHTML ='বিভাগ:'+value["pDiv"]+'<br>জেলা:'+value["pDist"]+'<br>উপজেলা:'+value["pUpz"]+'<br>বিস্তারিত:'+value["t_parmanent_address"].getDigitBanglaFromEnglish();
                    document.getElementById('u_present').innerText = value['t_present_address'].getDigitBanglaFromEnglish();
                    document.getElementById('u_mb').innerText = value['t_mobile'].getDigitBanglaFromEnglish();
                    if(value['t_other_mobile']==null){
                        document.getElementById('u_imp_mb').innerText = '';
                    }else{
                        document.getElementById('u_imp_mb').innerText = value['t_other_mobile'].getDigitBanglaFromEnglish();
                    }
                    document.getElementById('u_email').innerText = value['t_email'];
                    document.getElementById('u_fb').innerText = value['t_fb_link'];
                    document.getElementById('u_edu').innerText = value['edu_name'];
                    document.getElementById('u_p').innerText = value['prf_name'];
                    document.getElementById('u_d').innerText = value['des_name'];
                    document.getElementById('u_type').innerText = value['class_name'];
                    document.getElementById('u_office').innerText = value['inst_name'] + ', ' + value['Idiv']+ ', ' + value['Idist']+ ', ' + value['Iupz'];
                    var tDaTe=value['t_created_at'].split('-');
                    var TdAtE=tDaTe[2]+'-'+tDaTe[1]+'-'+tDaTe[0];
                    document.getElementById('u_reg').innerText = TdAtE.getDigitBanglaFromEnglish();
                    if(value['class_name']=='সমবায় সমিতির সদস্য'){
                        document.getElementById('offc').innerText = 'সমিতি';
                    }
                });
                $('#crse_tchr_tbl tr:gt(0)').remove();
                $.each(data1['res2'], function (i,v) {
                    var std=v['start_date'].split('-');
                    var nstd=std[2]+'-'+std[1]+'-'+std[0];
                    var ed=v['end_date'].split('-');
                    var ned=ed[2]+'-'+ed[1]+'-'+ed[0];
                    var trow='<tr>'
                                  +'<td>'+((parseInt(i)+1)+'').getDigitBanglaFromEnglish()+'</td>'
                                  +'<td>'+v['c_name']+'</td>'
                                  +'<td>'+nstd.getDigitBanglaFromEnglish()+'</td>'
                                  +'<td>'+ned.getDigitBanglaFromEnglish()+'</td>'
                                  +'<td>আঞ্চলিক সমবায় ইন্সটিটিউট, খুলনা</td>'
                                  +'<td>'+v['subject_name']+'</td>'
                                  +'<td>'+v['session_num'].getDigitBanglaFromEnglish()+'</td>'
                                  +'<td>'+v['session_date'].getDigitBanglaFromEnglish()+'</td>'
                                  +'<td>'+v['salary'].getDigitBanglaFromEnglish()+'</td>'
                              +'</tr>';
                    
                    $('#crse_tchr_tbl').append(trow);
                });
                $('#teacher_info_details').modal('show');
            }
        });
    }

</script>