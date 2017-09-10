<?php $bn_digits = array('০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯'); ?>
<div class="container-fluid display-table">
    <div class="row display-table-row">
        <?php $this->load->view('layouts/sidebar-nav'); ?>
        <div class="col-md-10 display-table-cell" id="main-content">
            <div class="row" style="padding: 10px;">
                <div class="col-md-12">
                    <form id="all_course" action="<?php site_url('admin/all_course_details'); ?>" method="post">
                        <input type="hidden" name="is_pdf" id="is_pdf" value="0">
                        <div class="panel panel-hover">
                            <h2 align="center">প্রশিক্ষণার্থীর কোর্স মূল্যায়ন</h2>
                            <hr>
                            <div class="row">
                                <div class="form-group">
                                    <table class="col-md-12 col-md-offset-0">
                                        <tr>
                                            <td>বছর</td>
                                            <td style="width: 20%; padding-left: 10px;">
                                                <select name="year" id="year" class="form-control">
                                                    <?php $curr_year = date('Y');
                                                    $s_year = 2012;
                                                    while ($s_year < ($curr_year + 2)) {
                                                        $v = $s_year . '-' . ($s_year + 1);
                                                        ?>
                                                        <option <?php if ($curr_y == $v) echo 'selected'; ?>
                                                            value="<?= $v; ?>"><?= str_replace(range(0,9),$bn_digits,$v); ?></option>
                                                        <?php $s_year++;
                                                    } ?>
                                                </select>
                                            </td>
                                            <td style="padding-left: 10px;">কোর্স</td>
                                            <td style="width: 40%; padding-left: 10px;">
                                                <select name="course" id="course" class="form-control">
                                                    <?php foreach ($course as $c) {
                                                        $std=explode('-',$c['start_date']);
                                                        $ed=explode('-',$c['end_date']);
                                                        $nstd=$std[2].'/'.$std[1].'/'.$std[0];
                                                        $ned=$ed[2].'/'.$ed[1].'/'.$ed[0];
                                                        $fd=$nstd.' - '.$ned;
                                                        ?>
                                                        <option <?php if ($crse == $c['crse_id']) {
                                                            echo "selected";
                                                        } ?> value="<?= $c['crse_id']; ?>"><?= $c['c_name']?>(<?=str_replace(range(0,9),$bn_digits,$fd)?>)</option>
                                                    <?php } ?>
                                                </select>
                                            </td>
                                            <td style="padding-left: 10px;">প্রশিক্ষক</td>
                                            <td style="width: 30%; padding-left: 10px;">
                                                <select name="teacher" id="teacher" class="form-control">
                                                    <?php foreach ($teacherList as $u) { ?>
                                                        <option <?php if ($tchr == $u['teacher_id']) {
                                                            echo "selected";
                                                        } ?> value="<?= $u['teacher_id']; ?>"><?= $u['t_name']; ?>(<?= str_replace(range(0,9),$bn_digits,$u['t_nid'])?>)</option>
                                                    <?php } ?>
                                                </select>
                                            </td>
                                            <td style="padding-left: 10px;">
                                                <input onclick="search_btn()" type="button"
                                                       class="btn btn-primary"
                                                       value="অনুসন্ধান">
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>

                            <?php
                            if(sizeof($teacher_review)==0){ ?>

                                <div class="row" style="text-align: center;">
                                    <p>কোনো তথ্য নেই</p>
                                </div>

                            <?php }else{ ?>

                                <div class="form-group" style="margin-top: 100px">
                                    <div class="col-md-12">
                                        <div style="float: right">
                                            <button id="pdf_link" onclick="pdf_div()" class="form-control btn btn-primary">
                                                PDF
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="">
                                    <table width="100%" align="center" border='0'>
                                        <tr>
                                            <td style="width:68%">কোর্স শিরোনাম : <?= $teacher_review[0]['c_name'] ?></td>
                                            <td>মেয়াদ : <?= str_replace(range(0, 9), $bn_digits, $teacher_review[0]['run_days']) ?> দিন
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>প্রশিক্ষণ বর্ষ
                                                : <?= str_replace(range(0, 9), $bn_digits, $teacher_review[0]['year']) ?></td>
                                            <td>অর্থায়ন : <?= $teacher_review[0]['donor_name'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>কোর্স শুরুর তারিখ : <?php
                                                $tDAte = explode('-', $teacher_review[0]['start_date']);
                                                $TdAtE = $tDAte[2] . '-' . $tDAte[1] . '-' . $tDAte[0];
                                                echo str_replace(range(0, 9), $bn_digits, $TdAtE); ?>
                                            </td>
                                            <td>কোর্স সমাপ্তির তারিখ : <?php
                                                $tDAte = explode('-', $teacher_review[0]['end_date']);
                                                $TdAtE = $tDAte[2] . '-' . $tDAte[1] . '-' . $tDAte[0];
                                                echo str_replace(range(0, 9), $bn_digits, $TdAtE); ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>কোর্সের ধরণ : <?= $teacher_review[0]['course_class_name'] ?></td>
                                            <td>প্রশিক্ষণার্থীর ধরণ : <?= $teacher_review[0]['class_name'] ?></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <br><br>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">বক্তা/প্রশিক্ষকের নাম : <?= $techIn[0]['t_name'] ?></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">পদবী : <?= $techIn[0]['des_name'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>সেশন সংখ্যা : <?= $techIn[0]['session_num'] ?></td>
                                            <td>সেশন তারিখ : <?= $techIn[0]['session_date'] ?></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">সেশনের বিষয়/বিষয়সমূহ : <?= $techIn[0]['subject_name'] ?></td>
                                        </tr>
                                    </table>
                                    <br>
                                    <table id="emp-list" class="table table-striped table-bordered"
                                           cellspacing="0">
                                        <thead>
                                        <tr>
                                            <th style="text-align: center;">ক্রমিক</th>
                                            <th style="text-align: center;">প্রশিক্ষণার্থীর নাম</th>
                                            <th style="text-align: center;">মোবাইল নং</th>
                                            <th style="text-align: center;">মূল্যায়ন নম্বর (পূর্ণ নম্বর ১০০)</th>
                                            <th style="text-align: center;">গড়</th>
                                            <th style="text-align: center;">মন্তব্য/পরামর্শ</th>
                                        </tr>

                                        </thead>
                                        <tbody>
                                        <?php $i = 1;
                                        foreach ($teacher_review as $row) { ?>
                                            <tr>
                                                <td style="text-align: center;">
                                                    <?=str_replace(range(0, 9), $bn_digits, $i++)?>
                                                </td>
                                                <td style="text-align: center;">
                                                    <?= $row['u_name']?>
                                                </td>
                                                <td style="text-align: center;"><?= str_replace(range(0, 9), $bn_digits, $row['mobile']) ?></td>
                                                <td style="text-align: center;"><?= str_replace(range(0, 9), $bn_digits, $row['t_review']) ?></td>

                                                <?php
                                                if($i==2){ ?>
                                                    <td rowspan="<?= sizeof($teacher_review)?>" style="text-align: center;"><?= str_replace(range(0, 9), $bn_digits, $avg); ?></td>
                                                <?php }
                                                ?>

                                                <td style="text-align: center;"><?= $row['t_comment']?></td>
                                            </tr>
                                        <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            <?php }
                            ?>
                        </div>
                    </form>

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
        $('#year').change(function () {
            var ty=$('#year').val();
            $.ajax({
                url:'<?= site_url("admin/getCourseForTeacherReview")?>',
                type:'post',
                data:{
                    y:ty
                },success:function(data){
                    var reslt=$.parseJSON(data);

                    $('#course option').remove();
                    $('#teacher option').remove();
                    $.each(reslt['res'],function (i,v) {
                        var std=v['start_date'].split('-');
                        var nstd=std[2]+'/'+std[1]+'/'+std[0];
                        var ed=v['end_date'].split('-');
                        var ned=ed[2]+'/'+ed[1]+'/'+ed[0];

                        var trow='<option value="'+v['crse_id']+'">'+v['c_name']+'('+nstd.getDigitBanglaFromEnglish()+' - '+ned.getDigitBanglaFromEnglish()+')</option>';
                        $('#course').append(trow);
                    });

                    getTeacher();
                }
            });
        });
    });

    $('#course').change(function () {
        getTeacher();
    });

    function getTeacher() {
        var tc=$('#course').val();

        if(tc==''|| tc==null){

        }else{
            $.ajax({
                url:'<?= site_url("admin/getTeacherForTeacherReview")?>',
                type:'post',
                data:{
                    c:tc
                },success:function(data){
                    var reslt=$.parseJSON(data);

                    $('#teacher option').remove();
                    $.each(reslt['res'],function (i,v) {

                        var trow='<option value="'+v['t_id']+'">'+v['t_name']+'('+v['t_nid'].getDigitBanglaFromEnglish()+')</option>';
                        $('#teacher').append(trow);
                    });
                }
            });
        }
    }
    function search_btn() {
        document.getElementById('is_pdf').value = 0;
        $('#all_course').submit();
    }

    function pdf_div() {
        tmp_year = $('#year').val();
        tmp_donor = $('#donor').val();

        console.log(tmp_year);
        console.log(tmp_donor);
        document.getElementById('is_pdf').value = 1;
        $('#all_course').submit();
        //$('#pdf_link').attr("href",'<?= site_url();?>/admin/'+tmp_year+'/'+tmp_donor);
    }

</script>
