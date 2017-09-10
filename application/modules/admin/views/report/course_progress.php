<?php $bn_digits = array('০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯'); ?>
<div class="container-fluid display-table">
    <div class="row display-table-row">
        <?php $this->load->view('layouts/sidebar-nav'); ?>
        <div class="col-md-12 display-table-cell" id="main-content">
            <h2 align="center"><?= $page_title ?></h2>
            <hr>
            <div class="row" style="margin-bottom: 20px;">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="" class="col-md-3" style="text-align: right; padding-top: 7px;">প্রশিক্ষণ
                            অগ্রগতি</label>
                        <div class="col-md-3">
                            <select name="search_type" id="search_type" class="form-control">
                                <option value="1">নির্বাচন করুন</option>
                                <option value="2">মাসিক</option>
                                <option value="3">ত্রৈমাসিক</option>
                                <option value="4">বার্ষিক</option>
                            </select>
                        </div>
                        <label for="" class="col-md-1" style="text-align: right; padding-top: 7px;">খাত/অর্থায়ন</label>
                        <div class="col-md-3">
                            <select name="donor" id="donor" class="form-control">
                                <!--                                <option value="all">সকল</option>-->
                                <option value="রাজস্ব">রাজস্ব</option>
                                <option value="সিডিএফ">সিডিএফ</option>
                                <option value="প্রকল্প/অন্যান্য">প্রকল্প/অন্যান্য</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row" id="monthly_report" style="display: none">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="" class="col-md-3" style="text-align: right; padding-top: 7px;">মাস</label>
                        <div class="col-md-4">
                            <input type="text" name="monthR" id="monthR" class="form-control">
                        </div>
                    </div>
                </div>
            </div>

            <div class="row" id="three_monthly_report" style="display: none">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="" class="col-md-3" style="text-align: right; padding-top: 7px;">মাস</label>
                        <div class="col-md-2">
                            <input type="text" name="monthFrom" id="monthFrom" class="form-control">
                        </div>
                        <label for="" class="col-md-1" style="text-align: center; padding-top: 7px;">থেকে</label>
                        <div class="col-md-2">
                            <input readonly type="text" name="monthTo" id="monthTo" class="form-control">
                        </div>
                    </div>
                </div>
            </div>

            <div class="row" id="c_year" style="display: none">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="" class="col-md-3" style="text-align: right; padding-top: 7px;">প্রশিক্ষণ
                            বর্ষ </label>
                        <div class="col-md-4">
                            <select name="c_years" id="c_years" class="form-control">
                                <option value="0">নির্বাচন করুন</option>
                                <?php
                                foreach ($c_year as $c) { ?>
                                    <option
                                        value="<?= $c['d_year'] ?>"><?= str_replace(range(0, 9), $bn_digits, $c['d_year']) ?></option>
                                <?php }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row" id="detailsErr" style="display: none; margin-top: 30px;">
                <div class="col-md-12">
                    <div class="form-group" style="margin-bottom: 5px;">
                        <p style="text-align: center; font-weight: 600; font-size: 20px;">তথ্য পাওয়া যায় নাই</p>
                    </div>
                </div>
            </div>
            <div class="row" id="details" style="display: none; margin-top: 30px;">
                <div class="col-md-12">
                    <div class="form-group" style="margin-bottom: 5px;">
                        <a href="" id="pdfLink" class="btn btn-info">পিডিএফ</a>
                    </div>
                    <div class="form-group table-responsive">
                        <div>
                            <p style="text-align: center; font-size: 16px; font-weight: 600;">কোর্সের ধরণ : সকল</p>
                        </div>
                        <table style="border: solid; border-width: .5px; border-color: #dddddd"
                               class="table table-striped table-bordered" id="allDtls"
                               cellspacing="0">
                            <thead>
                            <tr>
                                <th style="text-align: center; "></th>
                                <th style="text-align: center; ">কোর্স সংখ্যা</th>
                                <th style="text-align: center; ">প্রশিক্ষণার্থী সংখ্যা</th>
                                <th style="text-align: center; ">পুরুষ</th>
                                <th style="text-align: center;">নারী</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>  সরকারি কর্মচারী</td>
                                <td style="text-align: center;">  <span id="allCrseGovt"></span></td>
                                <td style="text-align: center;">  <span id="allTraineeGovt"></span></td>
                                <td style="text-align: center;">  <span id="allManGovt"></span></td>
                                <td style="text-align: center;">  <span id="allWomanGovt"></span></td>
                            </tr>
                            <tr>
                                <td>  সমবায় সমিতির সদস্য</td>
                                <td style="text-align: center;">  <span id="allCrseSomitee"></span></td>
                                <td style="text-align: center;">  <span id="allTraineeSomitee"></span></td>
                                <td style="text-align: center;">  <span id="allManSomitee"></span></td>
                                <td style="text-align: center;">  <span id="allWomanSomitee"></span></td>
                            </tr>
                            <tr>
                                <td>  অন্যান্য</td>
                                <td style="text-align: center;">  <span id="allCrseOther"></span></td>
                                <td style="text-align: center;">  <span id="allTraineeOther"></span></td>
                                <td style="text-align: center;">  <span id="allManOther"></span></td>
                                <td style="text-align: center;">  <span id="allWomanOther"></span></td>
                            </tr>
                            </tbody>
                        </table>
                        <div>
                            <p style="text-align: center; font-size: 16px; font-weight: 600;">কোর্সের ধরণ : আইজিএ</p>
                        </div>
                        <table style="border: solid; border-width: .5px; border-color: #dddddd"
                               class="table table-striped table-bordered" id="igaDtls"
                               cellspacing="0">
                            <thead>
                            <tr>
                                <th style="text-align: center; "></th>
                                <th style="text-align: center; ">কোর্স সংখ্যা</th>
                                <th style="text-align: center; ">প্রশিক্ষণার্থী সংখ্যা</th>
                                <th style="text-align: center; ">পুরুষ</th>
                                <th style="text-align: center;">নারী</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>  সরকারি কর্মচারী</td>
                                <td style="text-align: center;">  <span id="igaCrseGovt"></span></td>
                                <td style="text-align: center;">  <span id="igaTraineeGovt"></span></td>
                                <td style="text-align: center;">  <span id="igaManGovt"></span></td>
                                <td style="text-align: center;">  <span id="igaWomanGovt"></span></td>
                            </tr>
                            <tr>
                                <td>  সমবায় সমিতির সদস্য</td>
                                <td style="text-align: center;">  <span id="igaCrseSomitee"></span></td>
                                <td style="text-align: center;">  <span id="igaTraineeSomitee"></span></td>
                                <td style="text-align: center;">  <span id="igaManSomitee"></span></td>
                                <td style="text-align: center;">  <span id="igaWomanSomitee"></span></td>
                            </tr>
                            <tr>
                                <td>  অন্যান্য</td>
                                <td style="text-align: center;">  <span id="igaCrseOther"></span></td>
                                <td style="text-align: center;">  <span id="igaTraineeOther"></span></td>
                                <td style="text-align: center;">  <span id="igaManOther"></span></td>
                                <td style="text-align: center;">  <span id="igaWomanOther"></span></td>
                            </tr>
                            </tbody>
                        </table>
                        <div>
                            <p style="text-align: center; font-size: 16px; font-weight: 600;">কোর্সের ধরণ : মানব সম্পদ
                                উন্নয়ন</p>
                        </div>
                        <table style="border: solid; border-width: .5px; border-color: #dddddd"
                               class="table table-striped table-bordered" id="manDtls"
                               cellspacing="0">
                            <thead>
                            <tr>
                                <th style="text-align: center; "></th>
                                <th style="text-align: center; ">কোর্স সংখ্যা</th>
                                <th style="text-align: center; ">প্রশিক্ষণার্থী সংখ্যা</th>
                                <th style="text-align: center; ">পুরুষ</th>
                                <th style="text-align: center;">নারী</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>  সরকারি কর্মচারী</td>
                                <td style="text-align: center;">  <span id="manCrseGovt"></span></td>
                                <td style="text-align: center;">  <span id="manTraineeGovt"></span></td>
                                <td style="text-align: center;">  <span id="manManGovt"></span></td>
                                <td style="text-align: center;">  <span id="manWomanGovt"></span></td>
                            </tr>
                            <tr>
                                <td>  সমবায় সমিতির সদস্য</td>
                                <td style="text-align: center;">  <span id="manCrseSomitee"></span></td>
                                <td style="text-align: center;">  <span id="manTraineeSomitee"></span></td>
                                <td style="text-align: center;">  <span id="manManSomitee"></span></td>
                                <td style="text-align: center;">  <span id="manWomanSomitee"></span></td>
                            </tr>
                            <tr>
                                <td>  অন্যান্য</td>
                                <td style="text-align: center;">  <span id="manCrseOther"></span></td>
                                <td style="text-align: center;">  <span id="manTraineeOther"></span></td>
                                <td style="text-align: center;">  <span id="manManOther"></span></td>
                                <td style="text-align: center;"><span id="manWomanOther"></span></td>
                            </tr>
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

<?php $this->load->view('layouts/footer'); ?>

<script>
    $(document).ready(function () {
        $("#monthR").datepicker({
            format: "mm-yyyy",
            viewMode: "months",
            minViewMode: "months",
            autoclose: true
        }).on('changeDate', function (ev) {
            var x = $('#monthR').val();
            getCourseInfo(x, 'all', 'all', 'all');
        });
        $("#monthFrom").datepicker({
            format: "mm-yyyy",
            viewMode: "months",
            minViewMode: "months",
            autoclose: true
        }).on('changeDate', function (ev) {
            var frm = $('#monthFrom').val().split('-');

            var mnth = parseInt(frm[0]) + 2;
            var yr = frm[1];

            if (mnth >= 13) {
                mnth = mnth - 12;
                yr = parseInt(frm[1]) + 1;
            }
            $('#monthTo').val(mnth + '-' + yr);


            var x = $('#monthFrom').val();
            var y = $('#monthTo').val();
            getCourseInfo('all', x, y, 'all');
        });
    });

    function getCourseInfo(mnth, mnthFrm, mnthTo, year) {
        console.log(mnth + '==' + mnthFrm + '==' + mnthTo + '==' + year);
        var x = $('#donor').val();
        $.ajax({
            type: 'post',
            url: '<?= site_url("admin/getCourseProgress")?>',
            data: {
                mnth: mnth,
                mnthFrom: mnthFrm,
                mnthTo: mnthTo,
                c_year: year,
                donor: x
            }, success: function (res) {
                console.log(res);

                var data = $.parseJSON(res);

                document.getElementById('detailsErr').style.display = 'none';
                document.getElementById('details').style.display = 'block';

                $('#allDtls').find('span').text('০');
                $('#igaDtls').find('span').text('০');
                $('#manDtls').find('span').text('০');

                $.each(data['allCrse'],function (i,v) {
                    if(v['id']==2){
                        $('#allCrseGovt').text((v['tCrse']).getDigitBanglaFromEnglish());
                    }else if(v['id']==1){
                        $('#allCrseSomitee').text((v['tCrse']).getDigitBanglaFromEnglish());
                    }else if(v['id']==3){
                        $('#allCrseOther').text((v['tCrse']).getDigitBanglaFromEnglish());
                    }

                });

                $.each(data['allTraineeMan'],function (i,v) {
                    if(v['clssftn']==2){
                        $('#allManGovt').text((v['t_stdnt']).getDigitBanglaFromEnglish());
                        $('#allTraineeGovt').text((v['t_stdnt']).getDigitBanglaFromEnglish());
                    }else if(v['clssftn']==1){
                        $('#allManSomitee').text((v['t_stdnt']).getDigitBanglaFromEnglish());
                        $('#allTraineeSomitee').text((v['t_stdnt']).getDigitBanglaFromEnglish());
                    }else if(v['clssftn']==3){
                        $('#allManOther').text((v['t_stdnt']).getDigitBanglaFromEnglish());
                        $('#allTraineeOther').text((v['t_stdnt']).getDigitBanglaFromEnglish());
                    }

                });
                $.each(data['allTraineeWoMan'],function (i,v) {
                    if(v['clssftn']==2){
                        $('#allWomanGovt').text((v['t_stdnt']).getDigitBanglaFromEnglish());
                        var ts=parseInt($('#allTraineeGovt').text().getDigitEnglishFromBangla())+ parseInt(v['t_stdnt']);
                        $('#allTraineeGovt').text((ts+'').getDigitBanglaFromEnglish());
                    }else if(v['clssftn']==1){
                        $('#allWomanSomitee').text((v['t_stdnt']).getDigitBanglaFromEnglish());
                        var ts=parseInt($('#allTraineeSomitee').text().getDigitEnglishFromBangla())+ parseInt(v['t_stdnt']);
                        $('#allTraineeSomitee').text((ts+'').getDigitBanglaFromEnglish());
                    }else if(v['clssftn']==3){
                        $('#allWomanOther').text((v['t_stdnt']).getDigitBanglaFromEnglish());
                        var ts=parseInt($('#allTraineeOther').text().getDigitEnglishFromBangla())+ parseInt(v['t_stdnt']);
                        $('#allTraineeOther').text((ts+'').getDigitBanglaFromEnglish());
                    }

                });

                $.each(data['igaCrse'],function (i,v) {
                    if(v['id']==2){
                        $('#igaCrseGovt').text((v['tCrse']).getDigitBanglaFromEnglish());
                    }else if(v['id']==1){
                        $('#igaCrseSomitee').text((v['tCrse']).getDigitBanglaFromEnglish());
                    }else if(v['id']==3){
                        $('#igaCrseOther').text((v['tCrse']).getDigitBanglaFromEnglish());
                    }

                });
                $.each(data['igaTraineeMan'],function (i,v) {
                    if(v['clssftn']==2){
                        $('#igaManGovt').text((v['t_stdnt']).getDigitBanglaFromEnglish());
                        $('#igaTraineeGovt').text((v['t_stdnt']).getDigitBanglaFromEnglish());
                    }else if(v['clssftn']==1){
                        $('#igaManSomitee').text((v['t_stdnt']).getDigitBanglaFromEnglish());
                        $('#igaTraineeSomitee').text((v['t_stdnt']).getDigitBanglaFromEnglish());
                    }else if(v['clssftn']==3){
                        $('#igaManOther').text((v['t_stdnt']).getDigitBanglaFromEnglish());
                        $('#igaTraineeOther').text((v['t_stdnt']).getDigitBanglaFromEnglish());
                    }

                });
                $.each(data['igaTraineeWoMan'],function (i,v) {
                    if(v['clssftn']==2){
                        $('#igaWomanGovt').text((v['t_stdnt']).getDigitBanglaFromEnglish());
                        var ts=parseInt($('#igaTraineeGovt').text().getDigitEnglishFromBangla())+ parseInt(v['t_stdnt']);
                        $('#igaTraineeGovt').text((ts+'').getDigitBanglaFromEnglish());
                    }else if(v['clssftn']==1){
                        $('#igaWomanSomitee').text((v['t_stdnt']).getDigitBanglaFromEnglish());
                        var ts=parseInt($('#igaTraineeSomitee').text().getDigitEnglishFromBangla())+ parseInt(v['t_stdnt']);
                        $('#igaTraineeSomitee').text((ts+'').getDigitBanglaFromEnglish());
                    }else if(v['clssftn']==3){
                        $('#igaWomanOther').text((v['t_stdnt']).getDigitBanglaFromEnglish());
                        var ts=parseInt($('#igaTraineeOther').text().getDigitEnglishFromBangla())+ parseInt(v['t_stdnt']);
                        $('#igaTraineeOther').text((ts+'').getDigitBanglaFromEnglish());
                    }

                });

                $.each(data['manCrse'],function (i,v) {
                    if(v['id']==2){
                        $('#manCrseGovt').text((v['tCrse']).getDigitBanglaFromEnglish());
                    }else if(v['id']==1){
                        $('#manCrseSomitee').text((v['tCrse']).getDigitBanglaFromEnglish());
                    }else if(v['id']==3){
                        $('#manCrseOther').text((v['tCrse']).getDigitBanglaFromEnglish());
                    }

                });
                $.each(data['manTraineeMan'],function (i,v) {
                    if(v['clssftn']==2){
                        $('#manManGovt').text((v['t_stdnt']).getDigitBanglaFromEnglish());
                        $('#manTraineeGovt').text((v['t_stdnt']).getDigitBanglaFromEnglish());
                    }else if(v['clssftn']==1){
                        $('#manManSomitee').text((v['t_stdnt']).getDigitBanglaFromEnglish());
                        $('#manTraineeSomitee').text((v['t_stdnt']).getDigitBanglaFromEnglish());
                    }else if(v['clssftn']==3){
                        $('#manManOther').text((v['t_stdnt']).getDigitBanglaFromEnglish());
                        $('#manTraineeOther').text((v['t_stdnt']).getDigitBanglaFromEnglish());
                    }

                });
                $.each(data['manTraineeWoMan'],function (i,v) {
                    if(v['clssftn']==2){
                        $('#manWomanGovt').text((v['t_stdnt']).getDigitBanglaFromEnglish());
                        var ts=parseInt($('#manTraineeGovt').text().getDigitEnglishFromBangla())+ parseInt(v['t_stdnt']);
                        $('#manTraineeGovt').text((ts+'').getDigitBanglaFromEnglish());
                    }else if(v['clssftn']==1){
                        $('#manWomanSomitee').text((v['t_stdnt']).getDigitBanglaFromEnglish());
                        var ts=parseInt($('#manTraineeSomitee').text().getDigitEnglishFromBangla())+ parseInt(v['t_stdnt']);
                        $('#manTraineeSomitee').text((ts+'').getDigitBanglaFromEnglish());
                    }else if(v['clssftn']==3){
                        $('#manWomanOther').text((v['t_stdnt']).getDigitBanglaFromEnglish());
                        var ts=parseInt($('#manTraineeOther').text().getDigitEnglishFromBangla())+ parseInt(v['t_stdnt']);
                        $('#manTraineeOther').text((ts+'').getDigitBanglaFromEnglish());
                    }

                });

            }
        });
    }

    $('#search_type').change(function () {
        var val = $(this).val();
        if (val == 1) {
            document.getElementById('details').style.display = 'none';
            document.getElementById('monthly_report').style.display = 'none';
            document.getElementById('three_monthly_report').style.display = 'none';
            document.getElementById('c_year').style.display = 'none';
        } else if (val == 2) {
            document.getElementById('monthly_report').style.display = 'block';
            document.getElementById('three_monthly_report').style.display = 'none';
            document.getElementById('c_year').style.display = 'none';
        } else if (val == 3) {
            document.getElementById('monthly_report').style.display = 'none';
            document.getElementById('three_monthly_report').style.display = 'block';
            document.getElementById('c_year').style.display = 'none';
        } else if (val == 4) {
            document.getElementById('monthly_report').style.display = 'none';
            document.getElementById('three_monthly_report').style.display = 'none';
            document.getElementById('c_year').style.display = 'block';
        }
    });
    $('#donor').change(function () {
        var y = $('#search_type').val();
        console.log(y);
        if (y == 2) {
            var x = $('#monthR').val();
            getCourseInfo(x, 'all', 'all', 'all');
        } else if (y == 3) {
            var x = $('#monthFrom').val();
            var yy = $('#monthTo').val();
            getCourseInfo('all', x, yy, 'all');
        } else if (y == 4) {
            var x = $('#c_years').val();
            getCourseInfo('all', 'all', 'all', x);
        }
    });

    $('#c_years').change(function () {
        var x = $('#c_years').val();
        getCourseInfo('all', 'all', 'all', x);
    });

    $('#pdfLink').click(function () {
        var x = $('#search_type').val();
        var y = 0;
        if($('#donor').val()=='রাজস্ব'){
            y=0;
        }else if($('#donor').val()=='সিডিএফ'){
            y=1;
        }else if($('#donor').val()=='প্রকল্প/অন্যান্য'){
            y=2;
        }


        var path = '';
        if (x == 2) {
            var r = $('#monthR').val();
            path = '<?= site_url()?>admin/courseProgressPdf/' + r + '/all/all/all';
        } else if (x == 3) {
            var r = $('#monthFrom').val();
            var rr = $('#monthTo').val();
            path = '<?= site_url()?>admin/courseProgressPdf/all/' + r + '/'+rr+'/all';
        } else if (x == 4) {
            var r = $('#c_years').val();
            path = '<?= site_url()?>admin/courseProgressPdf/all/all/all/' + r ;
        }
        console.log(path);
        $('#pdfLink').attr('href', path + '/' + x+'/'+y);
    });


</script>
