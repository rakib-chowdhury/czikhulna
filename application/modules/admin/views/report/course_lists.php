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
                        <label for="" class="col-md-3" style="text-align: right; padding-top: 7px;">নির্বাচন
                            করুন</label>
                        <div class="col-md-4">
                            <select name="search_type" id="search_type" class="form-control">
                                <option selected value="1">নির্দিষ্ট কোর্স</option>
                                <option value="2">প্রশিক্ষণার্থীর ধরণ</option>
                                <option value="3">কোর্সের ধরণ</option>
                                <option value="4">খাত/অর্থায়ন</option>
                                <option value="5">প্রশিক্ষণ বর্ষ</option>
                                <option value="6">জেলা ভিত্তিক</option>
                                <option value="7">উপজেলা ভিত্তিক</option>
                            </select>
                        </div>
                        <label for="" class="col-md-3" style="padding-top: 7px;">অনুযায়ী</label>
                    </div>
                </div>
            </div>

            <div class="row" id="ind_course" style="display: block">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="" class="col-md-3" style="text-align: right; padding-top: 7px;">কোর্স নির্বাচন
                            করুন</label>
                        <div class="col-md-4">
                            <select name="course_name" id="course_name" class="form-control">
                                <option value="0">নির্বাচন করুন</option>
                                <?php
                                foreach ($course_name as $c) { ?>
                                    <option value="<?= $c['c_id'] ?>"><?= $c['c_name'] ?></option>
                                <?php }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" id="trainee_class" style="display: none">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="" class="col-md-3" style="text-align: right; padding-top: 7px;">প্রশিক্ষণার্থী ধরণ নির্বাচন
                            করুন</label>
                        <div class="col-md-4">
                            <select name="trainee_classs" id="trainee_classs" class="form-control">
                                <option value="0">নির্বাচন করুন</option>
                                <?php
                                foreach ($trainee_class as $c) { ?>
                                    <option value="<?= $c['id']?>"><?= $c['class_name']?></option>
                                <?php }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" id="course_class" style="display: none">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="" class="col-md-3" style="text-align: right; padding-top: 7px;">কোর্সের ধরণ নির্বাচন
                            করুন</label>
                        <div class="col-md-4">
                            <select name="course_classs" id="course_classs" class="form-control">
                                <option value="0">নির্বাচন করুন</option>
                                <?php
                                foreach ($course_class as $c) { ?>
                                    <option value="<?= $c['course_class_id'] ?>"><?= $c['course_class_name'] ?></option>
                                <?php }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" id="khat" style="display: none">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="" class="col-md-3" style="text-align: right; padding-top: 7px;">খাত/অর্থায়ন নির্বাচন
                            করুন</label>
                        <div class="col-md-4">
                            <select name="donor" id="donor" class="form-control">
                                <option value="0">সকল</option>
                                <option value="1">রাজস্ব</option>
                                <option value="2">সিডিএফ</option>
                                <option value="3">প্রকল্প/অন্যান্য</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" id="c_year" style="display: none">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="" class="col-md-3" style="text-align: right; padding-top: 7px;">প্রশিক্ষণ বর্ষ নির্বাচন
                            করুন</label>
                        <div class="col-md-4">
                            <select name="c_years" id="c_years" class="form-control">
                                <option value="0">নির্বাচন করুন</option>
                                <?php
                                foreach ($c_year as $c) { ?>
                                    <option value="<?= $c['d_year'] ?>"><?= str_replace(range(0,9),$bn_digits,$c['d_year']) ?></option>
                                <?php }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" id="jela" style="display: none">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="" class="col-md-3" style="text-align: right; padding-top: 7px;">বিভাগ</label>
                        <div class="col-md-3">
                            <select name="s_div" id="s_div" class="form-control">
                                <?php
                                foreach ($division as $c) { ?>
                                    <option value="<?= $c['div_id'] ?>"><?= $c['bn_div_name'] ?></option>
                                <?php }
                                ?>
                            </select>
                        </div>
                        <label for="" class="col-md-1" style="text-align: right; padding-top: 7px;">জেলা</label>
                        <div class="col-md-3">
                            <select name="s_dist" id="s_dist" class="form-control">
                                <?php
                                foreach ($dist as $c) { ?>
                                    <option value="<?= $c['dist_id'] ?>"><?= $c['bn_dist_name'] ?></option>
                                <?php }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" id="upojela" style="display: none">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="" class="col-md-1" style="text-align: right; padding-top: 7px;">বিভাগ</label>
                        <div class="col-md-3">
                            <select name="ss_div" id="ss_div" class="form-control">
                                <?php
                                foreach ($division as $c) { ?>
                                    <option value="<?= $c['div_id'] ?>"><?= $c['bn_div_name'] ?></option>
                                <?php }
                                ?>
                            </select>
                        </div>
                        <label for="" class="col-md-1" style="text-align: right; padding-top: 7px;">জেলা</label>
                        <div class="col-md-3">
                            <select name="ss_dist" id="ss_dist" class="form-control">
                                <?php
                                foreach ($dist as $c) { ?>
                                    <option value="<?= $c['dist_id'] ?>"><?= $c['bn_dist_name'] ?></option>
                                <?php }
                                ?>
                            </select>
                        </div>
                        <label for="" class="col-md-1" style="text-align: right; padding-top: 7px;">উপজেলা</label>
                        <div class="col-md-3">
                            <select name="ss_upz" id="ss_upz" class="form-control">
                                <?php
                                foreach ($upz as $c) { ?>
                                    <option value="<?= $c['upz_id'] ?>"><?= $c['bn_upz_name'] ?></option>
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
                        <a href="" id="pdfLink"  class="btn btn-info">পিডিএফ</a>
                    </div>
                    <div class="form-group table-responsive">
                        <table style="border: solid; border-width: .5px; border-color: #1ab394"
                               class="table table-striped table-bordered" id="userTable"
                               cellspacing="0">
                            <thead>
                            <tr>
                                <th colspan="4" style="text-align: center; width: 50%">পুরুষ</th>
                                <th rowspan="2"></th>
                                <th colspan="4" style="text-align: center;">নারী</th>
                            </tr>
                            <tr>
                                <th style="text-align: center;"> ক্রমিক নং</th>
                                <th style="text-align: center;">নাম</th>
                                <th style="text-align: center;">জাতীয় পরিচয়পত্র নম্বর</th>
                                <th style="text-align: center;">মোবাইল</th>
                                <th style="text-align: center;"> ক্রমিক নং</th>
                                <th style="text-align: center;">নাম</th>
                                <th style="text-align: center;">জাতীয় পরিচয়পত্র নম্বর</th>
                                <th style="text-align: center;">মোবাইল</th>
                            </tr>

                            </thead>
                            <tbody>

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

    });

    function getCourseInfo(crse, traineeCls, crseCls, donor, year, dist, upz) {
        console.log(crse+'=='+traineeCls+'=='+crseCls+'=='+donor+'=='+year+'=='+dist+'=='+upz);
        $.ajax({
            type: 'post',
            url: '<?= site_url("admin/getTraineeInfo")?>',
            data: {
                crse_name_id: crse,
                clssfctn_id: traineeCls,
                crse_cls_id: crseCls,
                donor_id: donor,
                c_year: year,
                dist_id: dist,
                upz_id: upz
            }, success: function (res) {
                console.log(res);

                var data = $.parseJSON(res);
                if (data['res'] == null || data['res'].length == 0) {
                    document.getElementById('detailsErr').style.display = 'block';
                    document.getElementById('details').style.display = 'none';
                } else {
                    document.getElementById('detailsErr').style.display = 'none';
                    document.getElementById('details').style.display = 'block';
                    var maleList = [];
                    var femaleList = [];
                    $.each(data['res'], function (i, v) {
                        if (v['gender'] == 1) {
                            maleList.push(data['res'][i]);
                        } else if (v['gender'] == 2) {
                            femaleList.push(data['res'][i]);
                        }
                    });
                    var a = maleList.length;
                    var b = femaleList.length;
                    var c=a;
                    if (c <= b) {
                        c = b;
                    }

                    var trow = '';//userTable
                    for (var i = 1; i <= c; i++) {
                        trow += '<tr>';
                        if(i<=a){
                            trow += '<td style="text-align:center;">';
                            trow += (i+'').getDigitBanglaFromEnglish();
                            trow += '</td>';
                            trow += '<td style="text-align:center;">';
                            trow += maleList[i-1]['u_name'];
                            trow += '</td>';
                            trow += '<td style="text-align:center;">';
                            trow += maleList[i-1]['nid'].getDigitBanglaFromEnglish();
                            trow += '</td>';
                            trow += '<td style="text-align:center;">';
                            trow += maleList[i-1]['mobile'].getDigitBanglaFromEnglish();
                            trow += '</td>';
                        }else{
                            trow+='<td><td><td><td>';
                        }
                        trow+='<td></td>';
                        console.log(trow+'before');
                        if(i<=b){
                            trow += '<td style="text-align:center;">';
                            trow += (i+'').getDigitBanglaFromEnglish();
                            trow += '</td>';
                            trow += '<td style="text-align:center;">';
                            trow += femaleList[i-1]['u_name'];
                            trow += '</td>';
                            trow += '<td style="text-align:center;">';
                            trow += femaleList[i-1]['nid'].getDigitBanglaFromEnglish();
                            trow += '</td>';
                            trow += '<td style="text-align:center;">';
                            trow += femaleList[i-1]['mobile'].getDigitBanglaFromEnglish();
                            trow += '</td>';
                        }else{
                            trow+='<td><td>';
                            trow+='<td><td>';
                        }
                        console.log(trow+'after');
                        trow += '</tr>';
                    }

                    console.log(trow);
                    $('#userTable tr:gt(1)').remove();
                    console.log(trow);
                    $('#userTable').append(trow);
                }
            }
        });
    }

    $('#search_type').change(function () {
        var val=$(this).val();
        if(val==1){
            document.getElementById('ind_course').style.display='block';
            document.getElementById('trainee_class').style.display='none';
            document.getElementById('course_class').style.display='none';
            document.getElementById('khat').style.display='none';
            document.getElementById('c_year').style.display='none';
            document.getElementById('jela').style.display='none';
            document.getElementById('upojela').style.display='none';
        }else if(val==2){
            document.getElementById('ind_course').style.display='none';
            document.getElementById('trainee_class').style.display='block';
            document.getElementById('course_class').style.display='none';
            document.getElementById('khat').style.display='none';
            document.getElementById('c_year').style.display='none';
            document.getElementById('jela').style.display='none';
            document.getElementById('upojela').style.display='none';
        }else if(val==3){
            document.getElementById('ind_course').style.display='none';
            document.getElementById('trainee_class').style.display='none';
            document.getElementById('course_class').style.display='block';
            document.getElementById('khat').style.display='none';
            document.getElementById('c_year').style.display='none';
            document.getElementById('jela').style.display='none';
            document.getElementById('upojela').style.display='none';
        }else if(val==4){
            document.getElementById('ind_course').style.display='none';
            document.getElementById('trainee_class').style.display='none';
            document.getElementById('course_class').style.display='none';
            document.getElementById('khat').style.display='block';
            document.getElementById('c_year').style.display='none';
            document.getElementById('jela').style.display='none';
            document.getElementById('upojela').style.display='none';
        }else if(val==5){
            document.getElementById('ind_course').style.display='none';
            document.getElementById('trainee_class').style.display='none';
            document.getElementById('course_class').style.display='none';
            document.getElementById('khat').style.display='none';
            document.getElementById('c_year').style.display='block';
            document.getElementById('jela').style.display='none';
            document.getElementById('upojela').style.display='none';
        }else if(val==6){
            document.getElementById('ind_course').style.display='none';
            document.getElementById('trainee_class').style.display='none';
            document.getElementById('course_class').style.display='none';
            document.getElementById('khat').style.display='none';
            document.getElementById('c_year').style.display='none';
            document.getElementById('jela').style.display='block';
            document.getElementById('upojela').style.display='none';
        }else if(val==7){
            document.getElementById('ind_course').style.display='none';
            document.getElementById('trainee_class').style.display='none';
            document.getElementById('course_class').style.display='none';
            document.getElementById('khat').style.display='none';
            document.getElementById('c_year').style.display='none';
            document.getElementById('jela').style.display='none';
            document.getElementById('upojela').style.display='block';
        }
        document.getElementById('details').style.display = 'none';
        document.getElementById('detailsErr').style.display = 'none';
    });

    $('#course_name').change(function () {
        getCourseInfo($(this).val(), 'all', 'all', 'all', 'all', 'all', 'all');
    });
    $('#trainee_classs').change(function () {
        var x=$('#trainee_classs').val();
        getCourseInfo('all',x, 'all', 'all', 'all', 'all', 'all');
    });
    $('#course_classs').change(function () {
        var x=$('#course_classs').val();
        getCourseInfo('all','all', x, 'all', 'all', 'all', 'all');
    });
    $('#donor').change(function () {
        var x=$('#donor').val();
        getCourseInfo('all','all', 'all', x, 'all', 'all', 'all');
    });
    $('#c_years').change(function () {
        var x=$('#c_years').val();
        getCourseInfo('all','all', 'all', 'all', x, 'all', 'all');
    });
    $('#s_dist').change(function () {
        var x=$('#s_dist').val();
        getCourseInfo('all','all', 'all', 'all','all', x, 'all');
    });
    $('#ss_upz').change(function () {
        var x=$('#ss_upz').val();
        getCourseInfo('all','all', 'all', 'all','all', 'all', x);
    });
    $('#ss_dist').change(function () {
        var dist = $(this).val();

        $.ajax({
            type: 'post',
            url: '<?= site_url()?>home/getUpz',
            data: {
                dist_id: dist
            }, success: function (data) {
                var data1 = $.parseJSON(data);

                $('#ss_upz option').remove();
                $.each(data1['upz'], function (i, v) {
                    $('#ss_upz').append('<option value="' + v['upz_id'] + '">' + v['bn_upz_name'] + '</option>');
                });

                var x=$('#ss_upz').val();
                getCourseInfo('all','all', 'all', 'all','all', 'all', x);
            }
        });
    });

    $('#pdfLink').click(function () {
        var x=$('#search_type').val();
        var path='';
        if(x==1){
            var r=$('#course_name').val();
            path='<?= site_url()?>admin/traineeListPdf/'+r+'/all/all/all/all/all/all';
        }else if(x==2){
            var r=$('#trainee_classs').val();
            path='<?= site_url()?>admin/traineeListPdf/all/'+r+'/all/all/all/all/all';
        }else if(x==3){
            var r=$('#course_classs').val();
            path='<?= site_url()?>admin/traineeListPdf/all/all/'+r+'/all/all/all/all';
        }else if(x==4){
            var r=$('#donor').val();
            path='<?= site_url()?>admin/traineeListPdf/all/all/all/'+r+'/all/all/all';
        }else if(x==5){
            var r=$('#c_years').val();
            path='<?= site_url()?>admin/traineeListPdf/all/all/all/all/'+r+'/all/all';
        }else if(x==6){
            var r=$('#s_dist').val();
            path='<?= site_url()?>admin/traineeListPdf/all/all/all/all/all/'+r+'/all';
        }else if(x==7){
            var r=$('#ss_upz').val();
            path='<?= site_url()?>admin/traineeListPdf/all/all/all/all/all/all/'+r;
        }
        console.log(path);
        $('#pdfLink').attr('href',path+'/'+x);
    });



</script>
