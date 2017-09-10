<?php $bn_digits = array('০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯'); ?>
<div class="container-fluid display-table">
    <div class="row display-table-row">
        <?php $this->load->view('layouts/sidebar-nav'); ?>
        <div class="col-md-10 display-table-cell" id="main-content">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-hover ">
                        <h2 style="text-align:center">অফিস সংযোজন</h2>
                        <hr>
                        <!---onsubmit="return online_reg()"---->
                        <form class="form-horizontal"  method="post"
                              action="<?php echo site_url('admin/add_office_post'); ?>">
                            <div class="row">
                                <div class="col-md-6 col-md-offset-3">
                                    <!--classification (user type)--->
                                    <div class="form-group">
                                        <label class="col-md-12 control-label" style="text-align: left"
                                               for="trainee_class">প্রশিক্ষণার্থী ধরণ:</label>
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
                                    <!--কার্যালয়-->
                                    <div class="col-md-6 govt" style="text-align:; margin-bottom: 5px;">
                                        <label for="" class="col-md-12" style="padding-left:0px ">কার্যালয়</label>
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
                                               >
                                        <span id="somitee_name_err" style="color: red;"></span>
                                    </div>
                                    <!--মূল নিবন্ধন নম্বর-->
                                    <div class="col-md-6 somitee" style="text-align: ; margin-bottom: 5px;">
                                        <label for="reg_num" class="col-md-12" style="padding-left:0px ">মূল নিবন্ধন
                                            নম্বর</label>
                                        <input type="text" name="reg_num" id="reg_num" class="form-control"
                                                >
                                        <span id="reg_num_err" style="color: red;"></span>
                                    </div>
                                    <!--reg date-->
                                    <div class="col-md-6 somitee" style="text-align: ; margin-bottom: 5px;">
                                        <label for="reg_date" class="col-md-12" style="padding-left:0px ">নিবন্ধনের
                                            তারিখ</label>
                                        <input readonly type="text" name="reg_date" id="reg_date"
                                               class="form-control"
                                                >
                                        <span id="reg_date_err" style="color: red;"></span>
                                    </div>
                                    <!--সর্বশেষ সংশোধিত নিবন্ধন নম্বর-->
                                    <div class="col-md-6 somitee" style="text-align: ; margin-bottom: 5px;">
                                        <label for="reg_update_num" class="col-md-12" style="padding-left:0px ">সর্বশেষ
                                            সংশোধিত নিবন্ধন নম্বর</label>
                                        <input type="text" name="reg_update_num" id="reg_update_num"
                                               class="form-control"
                                                >
                                        <span id="reg_update_num_err" style="color: red;"></span>
                                    </div>
                                    <!--সর্বশেষ সংশোধিত নিবন্ধনের তারিখ-->
                                    <div class="col-md-6 somitee" style="text-align: ; margin-bottom: 5px;">
                                        <label for="reg_update_date" class="col-md-12" style="padding-left:0px ">সর্বশেষ
                                            সংশোধিত নিবন্ধনের তারিখ</label>
                                        <input readonly type="text" name="reg_update_date" id="reg_update_date"
                                               class="form-control"
                                                >
                                        <span id="reg_update_date_err" style="color: red;"></span>
                                    </div>
                                    <!--বাড়ী-->
                                    <div class="col-md-6 ofc-class" style="text-align: ; margin-bottom: 5px;">
                                        <label for="house_no" class="col-md-12" style="padding-left:0px ">বাড়ী
                                            নং</label>
                                        <input type="text" name="house_no" id="house_no" class="form-control"
                                                >
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
                                                >
                                        <span id="ofc_phn_err" style="color: red;"></span>
                                    </div>
                                    <!--ইমেইল-->
                                    <div class="col-md-6 ofc-class" style="text-align: ;  margin-bottom: 5px;">
                                        <label for="ofc_email" class="col-md-12" style="padding-left:0px ">অফিস/সমিতির
                                            ইমেইল</label>
                                        <input type="email" name="ofc_email" id="ofc_email" class="form-control"
                                                >
                                        <span id="ofc_email_err" style="color: red;"></span>
                                    </div>
                                    <!--মোবাইল-->
                                    <div class="col-md-6 ofc-class" style="text-align: ;  margin-bottom: 5px;">
                                        <label for="ofc_mb" class="col-md-12" style="padding-left:0px ">অফিস/সমিতির
                                            মোবাইল নম্বর</label>
                                        <input type="text" name="ofc_mb" id="ofc_mb" class="form-control"
                                                >
                                        <span id="ofc_mb_err" style="color: red;"></span>
                                    </div>

                                </div>

                            </div>


                            <div class="form-group">
                                <div class="col-md-6" align="right" style="padding-top:25px;">
                                    <button name="myBtn" id="myBtn" value="0" type="submit"
                                            class="btn btn-success">সংযোজন
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

    function check_ofc() {
        var ofc = $('#ofc_id').val();
        var clss = $('#trainee_class').val();

        if (clss == 1 || clss == 3) {
            $('.ofc-class').show();
           // $('.ofc-class').attr('required', true);
            $('.somitee').show();
            //$('.somitee').attr('required', true);
            $('.govt').hide();
           // $('.govt').attr('required', false);
        } else if (clss == 2) {
            $('.ofc-class').show();
           // $('.ofc-class').attr('required', true);
            $('.somitee').hide();
           // $('.somitee').attr('required', false);
            $('.govt').show();
           // $('.govt').attr('required', true);
        }

    }

    $(document).ready(function () {
        check_ofc();

        //$('.statistic-section').hide();
        $('.form-submit').hide();
///////////////////////////////////DATEPICKER//////////////////////////
        $('#dob').datepicker({
            format: "dd/mm/yyyy"
        }).on('changeDate', function (ev) {
            //$('#dob').datepicker('hide');
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


                    $('#ofc_id option').remove();
                    $.each(data1['inst'], function (i, v) {
                        $('#ofc_id').append('<option value="' + v['inst_id'] + '">' + v['inst_name'] + ', ' + v['bn_div_name'] + ', ' + v['bn_dist_name'] + ', ' + v['bn_upz_name'] + '</option>');
                    });
                    $('#ofc_id').append('<option value="add_inst">সংযোজন করুন</option>');
                    check_ofc();

                }
            });
        });

        $('#ofc_id').change(function () {
            var ofc = $(this).val();
//            if(ofc=='add_inst'){
//                check_ofc();
//            }
            check_ofc();
        });


    });


    function online_reg() {
        console.log('check');

        var flag = true;

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

        return flag;
    }

</script>


