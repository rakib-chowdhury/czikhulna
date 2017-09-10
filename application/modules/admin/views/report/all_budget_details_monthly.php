<?php
$bn_digits = array('০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯');
$months = array('জানুয়ারী', 'ফেব্রুয়ারী', 'মার্চ', 'এপ্রিল', 'মে', 'জুন', 'জুলাই', 'অগাস্ট', 'সেপ্টেম্বর', 'অক্টোবর', 'নভেম্বর', 'ডিসেম্বর');
?>

<div class="container-fluid display-table">
    <div class="row display-table-row">
        <?php $this->load->view('layouts/sidebar-nav'); ?>
        <div class="col-md-10 display-table-cell" id="main-content">
            <div class="row">
                <div class="col-md-12">
                    <form id="all_course" action="<?php site_url('admin/all_budget_details'); ?>" method="post">
                        <input type="hidden" name="is_pdf" id="is_pdf" value="0">
                        <div class="panel panel-hover table-responsive">
                            <h2 align="center">বাজেট প্রতিবেদন</h2>
                            <hr>
                            <div class="form-group">
                                <div class="form-group">
                                    <table class="col-md-10 col-md-offset-1">
                                        <tr>
                                            <td>বছর</td>
                                            <td style="width: 30%; padding-left: 10px;">
                                                <select name="year" id="year" class="form-control">
                                                    <option <?php if ($curr_y == 'all') echo 'selected'; ?> value="all">
                                                        সকল
                                                    </option>
                                                    <?php $curr_year = date('Y');
                                                    $s_year = 2012;
                                                    while ($s_year < ($curr_year + 2)) {
                                                        $v = $s_year . '-' . ($s_year + 1);
                                                        ?>
                                                        <option <?php if ($curr_y == $v) echo 'selected'; ?>
                                                            value="<?= $v; ?>"><?= str_replace(range(0, 9), $bn_digits, $v); ?></option>
                                                        <?php $s_year++;
                                                    } ?>
                                                </select>
                                            </td>
                                            <td style="padding-left: 10px; text-align: right;">খাত</td>
                                            <td style="width: 30%; padding-left: 10px;">
                                                <select name="donor" id="donor" class="form-control">
                                                    <option <?php if ($type == 'all') echo 'selected'; ?> value="all">
                                                        সকল
                                                    </option>
                                                    <option <?php if ($type == 'রাজস্ব') echo 'selected'; ?>
                                                        value="রাজস্ব">
                                                        রাজস্ব
                                                    </option>
                                                    <option <?php if ($type == 'সিডিএফ') echo 'selected'; ?>
                                                        value="সিডিএফ">
                                                        সিডিএফ
                                                    </option>
                                                    <option <?php if ($type == 'প্রকল্প/অন্যান্য') echo 'selected'; ?>
                                                        value="প্রকল্প/অন্যান্য">
                                                        প্রকল্প/অন্যান্য
                                                    </option>
                                                </select>
                                            </td>
                                            <td style="padding-left: 10px; text-align: right;">মাস</td>
                                            <td style="width: 30%; padding-left: 10px;">
                                                <select name="mnth" id="mnth" class="form-control">
                                                    <?php
                                                    foreach ($months as $key => $m) { ?>
                                                        <option <?php if ($curr_m == ($key + 1)) echo 'selected'; ?>
                                                            value="<?= $key + 1 ?>"><?= $m ?></option>
                                                    <?php }
                                                    ?>
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
                            <div class="form-group">
                                <div class="col-md-12">
                                    <div style="float: right">
                                        <button <?php if (sizeof($course) == 0) echo 'disabled'; ?> id="pdf_link"
                                                                                                    onclick="pdf_div()"
                                                                                                    class="form-control btn btn-primary">
                                            PDF
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="panel panel-body">
                                <table
                                    style="border: solid; border-width: .5px; border-color: #1ab394; text-align: center;"
                                    class="table table-striped table-bordered"
                                    cellspacing="0">
                                    <tr>
                                        <th style="width: 8%; text-align: center;">ক্রমিক নং</th>
                                        <th style="width: 10%; text-align: center;">বর্ষ</th>
                                        <th style="width: 15%; text-align: center;">খাত</th>
                                        <th style="text-align: center;">মোট বরাদ্দ প্রাপ্তি</th>
                                        <th style="text-align: center;"><?= $months[$curr_m-1]?> মাস পর্যন্ত ব্যয় লক্ষ্যমাত্রা</th>
                                        <th style="text-align: center;"><?= $months[$curr_m-1]?> মাস পর্যন্ত সমাপ্ত কোর্স এর ব্যয় </th>
                                        <th style="text-align: center;">অবশিষ্ট</th>
                                    </tr>
                                    <?php
                                    foreach ($course as $key => $c) { ?>
                                        <tr>
                                            <td><?= str_replace(range(0, 9), $bn_digits, ($key + 1)) ?></td>
                                            <td><?= str_replace(range(0, 9), $bn_digits, $c['donation_year']) ?></td>
                                            <td><?= str_replace(range(0, 9), $bn_digits, $c['donor_name']) ?></td>
                                            <td><a style="cursor: pointer"
                                                   onclick="get_donation_amount(<?= $c['id'] ?>)"><?= str_replace(range(0, 9), $bn_digits, $c['total_donation']) ?>
                                                    টাকা </a></td>
                                            <td><a style="cursor: pointer"
                                                   onclick="get_course_amount(<?= $c['id'] ?>)"><?= str_replace(range(0, 9), $bn_digits, $c[0]) ?>
                                                    টাকা</a></td>
                                            <td><a style="cursor: pointer"
                                                   onclick="get_course_amount_end(<?= $c['id'] ?>)"><?= str_replace(range(0, 9), $bn_digits, $c[1]) ?>
                                                    টাকা</a></td>
                                            <td><?= str_replace(range(0, 9), $bn_digits, $c['total_donation'] - $c[1]) ?>
                                                টাকা
                                            </td>
                                        </tr>
                                    <?php }
                                    ?>
                                </table>
                            </div>

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

<!--donor info-->
<div class="modal fade" id="donation_modal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"></button>
                <h4 style="text-align: center; font-weight: 700" class="modal-title">মোট বরাদ্দ প্রাপ্তি বিবরণ</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <table class="table-responsive" width="100%" style="margin-bottom: 30px;">
                        <tr>
                            <td style="text-align: right; width: 20%; font-weight: 600">প্রশিক্ষণ বর্ষ :</td>
                            <td style="text-align: left; padding-left: 15px;">
                                <span id="dYear"></span>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: right; width: 20%; font-weight: 600">অর্থায়ন :</td>
                            <td style="text-align: left; padding-left: 15px;">
                                <span id="donoR"></span>
                            </td>
                        </tr>
                    </table>

                    <table id="donation" class="table table-striped table-bordered">

                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-raised" data-dismiss="modal">বাতিল করুন</button>
            </div>

        </div>
    </div>
</div>
<!--course info-->
<div class="modal fade" id="course_modal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"></button>
                <h4 style="text-align: center; font-weight: 700" class="modal-title" id="headeR"></h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <table class="table-responsive" width="100%" style="margin-bottom: 30px;">
                        <tr>
                            <td style="text-align: right; width: 20%; font-weight: 600">প্রশিক্ষণ বর্ষ :</td>
                            <td style="text-align: left; padding-left: 15px;">
                                <span id="CdYear"></span>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: right; width: 20%; font-weight: 600">অর্থায়ন :</td>
                            <td style="text-align: left; padding-left: 15px;">
                                <span id="CdonoR"></span>
                            </td>
                        </tr>
                    </table>

                    <table id="C_course" class="table table-striped table-bordered">
                        <tr>
                            <th style="text-align: center">ক্রমিক নং</th>
                            <th>কোর্স শিরোনাম</th>
                            <th style="text-align: center">প্রস্তাবিত ব্যয়</th>
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

    function search_btn() {
        document.getElementById('is_pdf').value = 0;
        $('#all_course').submit();
    }

    function pdf_div() {              
        document.getElementById('is_pdf').value = 1;
        $('#all_course').submit();        
    }

    function get_donation_amount(donor_id) {
        $.ajax({
            type: 'post',
            url: '<?php echo site_url('admin/get_donor_info');?>',
            data: {
                id: donor_id
            }, success: function (data) {
                console.log(data);
                var data1 = $.parseJSON(data);
                var ExPnse = data1['res2'][0]['ExpnsE'];
                if (ExPnse == null) {
                    ExPnse = 0;
                }
                console.log(ExPnse);
                $.each(data1['res'], function (index, value) {
                    $('#dYear').text(value['donation_year'].getDigitBanglaFromEnglish());
                    $('#donoR').text(value['donor_name']);

                    donation_amount = $.parseJSON(value['donation_details']);
                    console.log(donation_amount);
                    //$('#donation >tbody:gt(0)').remove();
                    document.getElementById('donation').innerHTML = '';
                    var total = 0;
                    $.each(donation_amount, function (i, v) {
                        console.log(v['date']);
                        var Type = '';
                        var tDaTe = v["date"].split('-');
                        var TdAtE = tDaTe[2] + '-' + tDaTe[1] + '-' + tDaTe[0];
                        var trow = '<tr>';
                        if (v['type'] == 1) {
                            Type = 'প্রাপ্ত বরাদ্দ';
                        } else {
                            Type = 'বরাদ্দ যোগ';
                        }
                        trow += '<td style="font-weight: 600; width:35%; text-align: right;">' + Type + ' : </td>'
                            + '<td style="text-align: left; padding-left: 15px;">' + v["amount"].getDigitBanglaFromEnglish() + '</td>'
                            + '<td style="font-weight: 600; text-align: right; width:10%">তারিখ :</td>'
                            + '<td style="text-align: left; width:20%;">' + TdAtE.getDigitBanglaFromEnglish() + '</td>'
                            + '</tr>';
                        total = (parseInt(total) + parseInt(v['amount']));
                        $('#donation').append(trow);
                    });
                    $('#donation').append('<tr><td style="text-align: right; font-weight: 600">সর্বমোট অর্থ :</td><td colspan="3" style="text-align: left; padding-left: 15px; font-weight: 700">' + (total + '').getDigitBanglaFromEnglish() + '</td></tr>');
                    $('#donation').append('<tr><td style="text-align: right; font-weight: 600">এই খাতে সমাপ্ত কোর্স পর্যন্ত ব্যয় :</td><td colspan="3" style="text-align: left; padding-left: 15px; font-weight: 700">' + (ExPnse + '').getDigitBanglaFromEnglish() + '</td></tr>');
                    $('#donation').append('<tr><td style="text-align: right; font-weight: 600">অবশিষ্ট :</td><td colspan="3" style="text-align: left; padding-left: 15px; font-weight: 700">' + ((total - ExPnse) + '').getDigitBanglaFromEnglish() + '</td></tr>');
                });

                $('#donation_modal').modal('show');
            }
        });
    }

    function get_course_amount(donor_id) {
        var mnths=$('#mnth').val();
        var years=$('#year').val();
        $.ajax({
            type: 'post',
            url: '<?php echo site_url('admin/get_course_info2');?>',
            data: {
                id: donor_id,
                mnth:mnths,
                year:years
            }, success: function (data) {                
                var data1 = $.parseJSON(data);
                $('#headeR').text('<?= $months[$curr_m-1]?> মাস পর্যন্ত ব্যয় লক্ষ্যমাত্রা');
                $('#CdYear').text(data1['res2'][0]['donation_year'].getDigitBanglaFromEnglish());
                $('#CdonoR').text(data1['res2'][0]['donor_name']);
                $('#C_course tr:gt(0)').remove();
                if(data1['res'].length==0 || data1['res']=='' || data1['res']==null){
                    document.getElementById('C_course').innerHTML='';
                    $('#C_course').append('<tr><td colspan="3" style="text-align: center; font-weight: 600">ব্যয় লক্ষ্যমাত্রা নির্ধারণ করা হয় নাই  </td></tr>');
                }else{
                    var total = 0;
                    $.each(data1['res'], function (i, v) {
                        var tDaTe = v["created_at"].split('-');
                        var TdAtE = tDaTe[2] + '-' + tDaTe[1] + '-' + tDaTe[0];
                        var trow = '<tr>';

                        trow += '<td style="font-weight: 600; width:12%; text-align: center;">' + (i + 1) + ' </td>'
                            + '<td style="text-align: left; padding-left: 15px;">' + v["c_name"] + '</td>'
                            + '<td style="text-align: left; padding-left: 15px;">' + v["expenditure"].getDigitBanglaFromEnglish() + ' টাকা</td>'
                            + '</tr>';
                        total = (parseFloat(total) + parseFloat(v['expenditure']));
                        $('#C_course').append(trow);
                    });
                    $('#C_course').append('<tr><td colspan="2" style="text-align: right; font-weight: 600">সর্বমোট ব্যয় </td><td style="text-align: left; padding-left: 15px; font-weight: 700">' + (total + '').getDigitBanglaFromEnglish() + ' টাকা</td></tr>');
                }
                $('#course_modal').modal('show');
            }
        });
    }

    function get_course_amount_end(donor_id) {
        var mnths=$('#mnth').val();
        var years=$('#year').val();
        $.ajax({
            type: 'post',
            url: '<?php echo site_url('admin/get_course_info_end');?>',
            data: {
                id: donor_id,
                mnth:mnths,
                year:years
            }, success: function (data) {
                var data1 = $.parseJSON(data);
                $('#headeR').text('<?= $months[$curr_m-1]?> মাস পর্যন্ত সমাপ্ত কোর্স এর ব্যয়');
                $('#CdYear').text(data1['res2'][0]['donation_year'].getDigitBanglaFromEnglish());
                $('#CdonoR').text(data1['res2'][0]['donor_name']);
                $('#C_course tr:gt(0)').remove();
                if(data1['res'].length==0 || data1['res']=='' || data1['res']==null){
                    document.getElementById('C_course').innerHTML='';
                    $('#C_course').append('<tr><td colspan="3" style="text-align: center; font-weight: 600">ব্যয় লক্ষ্যমাত্রা নির্ধারণ করা হয় নাই  </td></tr>');
                }else{
                    var total = 0;
                    $.each(data1['res'], function (i, v) {
                        var tDaTe = v["created_at"].split('-');
                        var TdAtE = tDaTe[2] + '-' + tDaTe[1] + '-' + tDaTe[0];
                        var trow = '<tr>';

                        trow += '<td style="font-weight: 600; width:12%; text-align: center;">' + ((i + 1)+'').getDigitBanglaFromEnglish() + ' </td>'
                            + '<td style="text-align: left; padding-left: 15px;">' + v["c_name"] + '</td>'
                            + '<td style="text-align: left; padding-left: 15px;">' + v["expenditure"].getDigitBanglaFromEnglish() + ' টাকা</td>'
                            + '</tr>';
                        total = (parseFloat(total) + parseFloat(v['expenditure']));
                        $('#C_course').append(trow);
                    });
                    $('#C_course').append('<tr><td colspan="2" style="text-align: right; font-weight: 600">সর্বমোট ব্যয় </td><td style="text-align: left; padding-left: 15px; font-weight: 700">' + (total + '').getDigitBanglaFromEnglish() + ' টাকা</td></tr>');
                }
                $('#course_modal').modal('show');
            }
        });
    }

</script>
