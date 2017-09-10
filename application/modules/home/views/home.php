<?php $bn_digits = array('০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯'); ?>
<body>
<!-- Container -->
<div id="container">
    <?php $this->load->view('public_layout/header'); ?>

    <!-- content ================================================== -->
    <div id="content">
        <div class="members-section" style="padding-top: 30px !important;">
            <div class="title-section">
                <div class="container triggerAnimation animated" data-animate="bounceIn">
                    <div class="col-md-11 col-md-offset-1">
                        <div class=" panel col-md-3 " style="border-color: black; margin-right: 2px;">
                            <div class="row">
                                <div class="col-md-12" style="padding: 0px">
                                    <table class="table-responsive table table-bordered"
                                           style="margin: 5px; width: 95%">
                                        <tr>
                                            <td>
                                                <a>
                                                    <img style="width: 100%; border-radius: 50%"
                                                         src="<?= base_url() ?>uploads/user/<?= $user_info[0]['image']?>" alt="">
                                                </a>
                                            </td>
                                        </tr>
                                        <tr style="padding-left: 3px;">
                                            <td><?= $user_info[0]['name']?></td>
                                        </tr>
                                        <tr style="padding-left: 3px;">
                                            <td><?= str_replace(range(0, 9), $bn_digits, $this->session->userdata('user_nid')) ?></td>
                                        </tr>
                                        <tr style="padding-left: 3px;">
                                            <td><a href="<?= site_url('home/password_change')?>">পাসওয়ার্ড পরিবর্তন</a></td>
                                        </tr>

                                        <tr style="padding-left: 3px;">
                                            <td>
                                                <a style="color: red"
                                                   href="<?= site_url('logout') ?>"><span class="fa fa-sign-out"></span>
                                                    লগআউট</a>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class=" panel col-md-8 " style="border-color: black; margin-left: 2px;">
                            <form onsubmit="return checkSubmit()" action="<?= site_url('home/userReqPost') ?>"
                                  method="post">
                                <input type='hidden' id='trainee_class' name='trainee_class' value='<?= $user_info[0]['classification_id']?>'>
                                <input type="hidden" name="user_id" value="<?= $this->session->userdata('user_id'); ?>">
                                <div class="row">
                                    <div class="col-md-12" style="">
                                        <h2 style="padding-top:8px;">প্রশিক্ষণের জন্য আবেদন</h2>
                                        <?php if ($this->session->flashdata('message')) { ?>
                                            <p style="font-size:16px; font-weight:600; text-align: center; color: peru"><?= $this->session->flashdata('message') ?></p>
                                        <?php } ?>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="crs_stts" class="col-md-12"
                                                           style="padding-left:0px; text-align: left ">কোর্স
                                                        স্ট্যাটাস:</label>
                                                    <select name="crs_stts" id="crs_stts" required class="form-control">
                                                        <option value="3">অপেক্ষমান</option>
                                                        <option value="4">চাহিদা</option>
                                                    </select>
                                                    <span id="crs_stts_err" style="color: red;"></span>
                                                </div>
                                                <!--course name--->
                                                <div class="form-group">
                                                    <label for="crs_title" style="text-align: left; padding-left: 0px;"
                                                           class="col-md-12">কোর্স শিরোনাম:</label>
                                                    <select name="crs_title" id="crs_title"
                                                            class="form-control not-demand" required>
                                                        <?php
                                                        foreach ($course_name as $c) { ?>
                                                            <option
                                                                value="<?= $c['c_id'] ?>"><?= $c['c_name'] ?></option>
                                                        <?php }
                                                        ?>
                                                    </select>
                                                    <input type="text" name="crs_title2" id="crs_title2"
                                                           placeholder="আপনার প্রশিক্ষণ চাহিবার বিষয় স্পেসসহ সর্বোচ্চ ১৬০  টি অক্ষরের মধ্যে লিখুন"
                                                           class="form-control demand">
                                                    <span class="demand" style="color:peru;">আপনার প্রশিক্ষণ চাহিবার বিষয় স্পেসসহ সর্বোচ্চ ১৬০  টি অক্ষরের মধ্যে লিখুন</span>
                                                    <br>
                                                    <span id="crs_title_err" style="color: red;"></span>
                                                </div>
                                                <!--year--->
                                                <div class="form-group">
                                                    <label for="crs_year" style="text-align: left; padding-left: 0px;"
                                                           class="col-md-12">প্রশিক্ষণ বর্ষ:</label>
                                                    <input readonly type="text" name="crs_year" id="crs_year"
                                                           value="<?= str_replace(range(0, 9), $bn_digits, $curr_y) ?>"
                                                           class="form-control" required>
                                                    <span id="crs_year_err" style="color: red;"></span>
                                                </div>
                                                <!--course time--->
                                                <div class="form-group">
                                                    <label for="start_date" style="text-align: left; padding-left: 0px;"
                                                           class="col-md-12">কোর্সের সময়সূচি:</label>
                                                    <select name="start_date" id="start_date"
                                                            class="form-control not-demand"
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
                                                    <input type="text" class="demand form-control" value="অন্যান্য">
                                                    <span id="start_date_err" style="color: red;"></span>
                                                </div>
                                                <!--course meyad--->
                                                <div class="form-group">
                                                    <label for="meyad" style="text-align: left; padding-left: 0px;"
                                                           class="col-md-12">কোর্সের মেয়াদ:</label>
                                                    <input readonly type="text" name="meyad" id="meyad"
                                                           class="form-control not-demand"
                                                    >
                                                    <input readonly type="text" class="form-control demand"
                                                           value="অন্যান্য">
                                                    <span id="meyad_err" style="color: red;"></span>
                                                </div>
                                                <!--training institute--->
                                                <div class="form-group">
                                                    <label for="institute" style="text-align: left; padding-left: 0px;"
                                                           class="col-md-12">প্রশিক্ষণ প্রতিষ্ঠান:</label>
                                                    <select name="institute" id="institute" class="form-control"
                                                            required>
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
                                </div>
                                <div style="text-align: center; margin-bottom: 10px;" class="form-submit">
                                    <button id="myBtn" type="submit" class="btn btn-info"
                                            style="background-color: #8bc541; height: 50px;">
                                        সংরক্ষণ করুন
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End content -->
    <?php $this->load->view('public_layout/footer'); ?>
</div>
<!-- End Container -->
<?php $this->load->view('public_layout/footerlink'); ?>

<script>
    function check_course_name() {
        var ofc = $('#crs_title').val();
        var clss = $('#crs_stts').val();
        if (clss == 4) {
            $('.not-demand').hide();
            $('.not-demand').attr('required', false);
            $('.demand').show();
            $('.demand').attr('required', true);
        } else {
            $('.not-demand').show();
            $('.not-demand').attr('required', true);
            $('.demand').hide();
            $('.demand').attr('required', false);
        }
    }
    function check_meyad() {
        var x = $('#start_date').val();
        console.log(x);
        if (x != null || x != '') {
            $.ajax({
                url: '<?= site_url()?>home/getCourseInfo',
                type: 'POST',
                data: {
                    id: x
                }, success: function (res) {
                    var data = $.parseJSON(res);

                    $('#meyad').val(data['res'][0]['run_days'].getDigitBanglaFromEnglish());
                }
            });
        }else{
            $('#meyad').val('');
        }
    }

    $(document).ready(function () {
        check_course_name();
        check_meyad();

        $('#crs_stts').change(function () {
            check_course_name();
        });
        $('#crs_title').change(function () {
            var tmp = $(this).val();
            var tmp1 = $('#trainee_class').val();
            $.ajax({
                type: 'post',
                url: '<?= site_url()?>home/getCourseData',
                data: {
                    crs_id: tmp,
                    clss_id:tmp1
                }, success: function (data) {
                    var data1 = $.parseJSON(data);
                    $('#start_date option').remove();
                    $.each(data1['res'], function (i, v) {
                        var dd = v['start_date'].split('-');
                        var ddd = v['end_date'].split('-')
                        var dddd = dd[2] + '/' + dd[1] + '/' + dd[0] + ' থেকে ' + ddd[2] + '/' + ddd[1] + '/' + ddd[0];

                        var trow = '<option value="' + v['c_id'] + '">' + dddd.getDigitBanglaFromEnglish() + '</option>';
                        $('#start_date').append(trow);
                    });
                    if(data1['res'].length==0){
                         $('#meyad').val('');
                    }else{
                         check_meyad();
                    }
                }
            });
        });
        $('#crs_title2').keyup(function () {
            var x = $(this).val();
            var y = x.split(/\s+/).length;
            console.log(y);
            if (y >= 161) {
                $('#crs_title_err').text('আপনার প্রশিক্ষণ চাহিবার বিষয় স্পেসসহ সর্বোচ্চ ১৬০  টি অক্ষরের মধ্যে লিখুন');
            } else {
                $('#crs_title_err').text('');
            }
        });

        $('#start_date').change(function () {
            check_meyad();
        });
    });

    function checkSubmit() {
        var flag = true;
        if ($('#crs_stts').val() == 4) {
            var tmp_name = $('#crs_title2').val();
            tmp_name = tmp_name.replace(/\s+/g, '');
            if (tmp_name == '' || tmp_name == null) {
                document.getElementById('crs_title_err').innerText = 'অনুগ্রহ করে সঠিক তথ্য প্রদান করুন';
                flag = false;
            } else {
                document.getElementById('crs_title_err').innerText = '';
            }
        }

        return flag;
    }

</script>

</body>
</html>