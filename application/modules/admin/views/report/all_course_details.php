<?php $bn_digits = array('০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯'); ?>
<div class="container-fluid display-table">
    <div class="row display-table-row">
        <?php $this->load->view('layouts/sidebar-nav'); ?>
        <div class="col-md-12" id="main-content">
            <form id="all_course" action="<?php site_url('admin/all_course_details'); ?>" method="post">
                <input type="hidden" name="is_pdf" id="is_pdf" value="0">
                <div class="panel panel-hover">
                    <h2 align="center">প্রশিক্ষণ বর্ষপঞ্জি</h2>
                    <div class="row col-md-offset-1" >
                        <div class="col-md-3">
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
                        </div>
                        <div class="col-md-3">
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
                                    value="প্রকল্প/অন্যান্য">প্রকল্প/অন্যান্য
                                </option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <select name="course_status" id="course_status" class="form-control">
                                <option <?php if ($c_status == 'all') echo 'selected'; ?>
                                    value="all">সকল
                                </option>
                                <option <?php if ($c_status == 1) echo 'selected'; ?> value='1'>
                                    সম্পাদনযোগ্য
                                </option>
                                <option <?php if ($c_status == 2) echo 'selected'; ?> value='2'>
                                    সম্পাদিত
                                </option>
                            </select>
                        </div>
                        <div class="col-md-1">
                            <input onclick="search_btn()" type="button"
                                   class="btn btn-primary"
                                   value="অনুসন্ধান">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div style="float: right; padding-right: 25px;">
                                <button <?php if (sizeof($course) == 0) echo 'disabled'; ?> id="pdf_link"
                                                                                            onclick="pdf_div()"
                                                                                            class="form-control btn btn-primary">
                                    PDF
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-body table-responsive">
                        <table style="border: solid; border-width: .5px; border-color: #1ab394; overflow-x: scroll;"
                               class="table table-striped table-bordered"
                               cellspacing="0">
                            <thead>
                            <tr>
                                <th rowspan="2" style="text-align: center;">কোর্সের<br> ক্রমিক<br> নম্বর</th>
                                <th rowspan="2" style="text-align: center;">কোর্সের<br> শিরোনাম
                                </th>
                                <th rowspan="2" style="text-align: center;">প্রশিক্ষণ<br> বর্ষ</th>
                                <th rowspan="2" style="text-align: center;">অর্থায়ন</th>
                                <th rowspan="2" style="text-align: center;">প্রশিক্ষণার্থী<br> ধরণ</th>
                                <th rowspan="2" style="text-align: center;">কোর্সের<br> ধরণ</th>

                                <th colspan="2" style="text-align: center;">প্রশিক্ষণ অনুষ্ঠানের<br> তারিখ</th>
                                <th rowspan="2" style="text-align: center;">প্রশিক্ষণ<br> দিন সংখ্যা</th>
                                <th colspan="3" style="text-align: center;">প্রশিক্ষণার্থী<br>সংখ্যা</th>

                                <th rowspan="2" style="text-align: center;">কোর্সের<br> বরাদ্দ /ব্যয়</th>
                                <th rowspan="2" style="text-align: center;">খাতের<br>মোট<br>বরাদ্দ</th>
                                <th rowspan="2" style="text-align: center;">অবশিষ্ট</th>
                                <!--<th rowspan="2" style="text-align: center;">খাতের<br>মোট<br>বরাদ্দ<br>(শতকরা<br>হার)
                                </th>-->
                                <th rowspan="2" style="text-align: center;">কোর্সের<br>বর্তমান<br>অবস্থা
                                </th>
                            </tr>
                            <tr>
                                <th style="text-align: center;">হইতে</th>
                                <th style="text-align: center;">পর্যন্ত</th>
                                <th style="text-align: center;">পুরুষ</th>
                                <th style="text-align: center;">নারী</th>
                                <th style="text-align: center;">মোট</th>
                            </tr>

                            </thead>
                            <tbody>
                            <?php $i = 1;
                            foreach ($course as $row) { ?>
                                <tr <?php if ($row['start_date'] > date('Y-m-d')) {
                                    echo 'style="color:bd18bd"';
                                    $stts = 'পরবর্তী';
                                } elseif ($row['start_date'] == date('Y-m-d') || (($row['start_date'] < date('Y-m-d')) && ($row['end_date'] > date('Y-m-d')))) {
                                    echo 'style="color:green"';
                                    $stts = 'চলমান';
                                } else {
                                    $stts = '0';
                                } ?> >
                                    <td style="text-align: center;">
                                        <?= str_replace(range(0, 9), $bn_digits, $i++);
                                        ?>
                                    </td>
                                    <td style="text-align: center;">
                                        <a onclick="show_course(<?php echo $row['c_id']; ?>)"
                                           style="cursor: pointer;">
                                            <?= $row['c_name']; ?>
                                        </a></td>
                                    <td style="text-align: center;"><?= str_replace(range(0, 9), $bn_digits, $row['year']); ?></td>
                                    <td style="text-align: center;">
                                        <a style="cursor: pointer;"
                                           onclick="get_donation_amount(<?= $row['donor_id']; ?>)"><?= $row['donor_name']; ?></a>
                                    </td>
                                    <td style="text-align: center;"><?= str_replace(range(0, 9), $bn_digits, $row['class_name']); ?></td>
                                    <td style="text-align: center;"><?= $row['course_class_name']; ?></td>

                                    <td style="text-align: center;">
                                        <?php
                                        $tDAte = explode('-', $row['start_date']);
                                        $TdAtE = $tDAte[2] . '-' . $tDAte[1] . '-' . $tDAte[0];
                                        echo str_replace(range(0, 9), $bn_digits, $TdAtE);
                                        ?>
                                    </td>
                                    <td style="text-align: center;">
                                        <?php
                                        $tDAte = explode('-', $row['end_date']);
                                        $TdAtE = $tDAte[2] . '-' . $tDAte[1] . '-' . $tDAte[0];
                                        echo str_replace(range(0, 9), $bn_digits, $TdAtE);
                                        ?></td>
                                    <td style="text-align: center;"><?= str_replace(range(0, 9), $bn_digits, $row['run_days']) . ' দিন'; ?></td>
                                    <td style="text-align: center;"><?php echo str_replace(range(0, 9), $bn_digits, $row['0']); ?></td>
                                    <td style="text-align: center;"><?php echo str_replace(range(0, 9), $bn_digits, $row['1']); ?></td>
                                    <td style="text-align: center;"><?php echo str_replace(range(0, 9), $bn_digits, $row['total_student']); ?></td>
                                    <td style="text-align: center;"><?= str_replace(range(0, 9), $bn_digits, $row['expenditure']); ?></td>
                                    <td style="text-align: center;"><?= str_replace(range(0, 9), $bn_digits, $row['total_donation']); ?></td>
                                    <td style="text-align: center;"><?= str_replace(range(0, 9), $bn_digits, $row['2']); ?></td>
                                    <!--<td style="text-align: center;">
                                        <?php
                                    $Pp = number_format($row['expenditure_percentage'], 2);
                                    echo str_replace(range(0, 9), $bn_digits, $Pp) . '%'; ?></td>-->
                                    <td style="text-align: center;">
                                        <?php
                                        if ($row['course_status'] == 1) {
                                            echo 'সম্পাদনযোগ্য';
                                        } elseif ($row['course_status'] == 2) {
                                            echo 'সম্পাদিত';
                                        } else {
                                            echo $row['course_status'];
                                        }
                                        ?>
                                    </td>
                                </tr>
                            <?php } ?>

                            <tr>
                                <td style="text-align: center;" colspan="13">
                                </td>
                                <td style="text-align: center;"><?= str_replace(range(0, 9), $bn_digits, $donorAmnt[0]['total']); ?></td>
                                <td style="text-align: center;"><?= str_replace(range(0, 9), $bn_digits, $donorAmnt[0]['total'] - $expnseAmnt[0]['expnse']); ?></td>
                                <td></td>
                                <!--<td></td>-->
                            </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </form>
            <hr>
            <div class="row">
                <footer id="admin-footer">
                    <p class="text-center">Copyright &copy; 2016. All right resereved</p>
                </footer>
            </div>
        </div>
    </div>
</div>

<!--Show course--->
<div class="modal fade" id="show_course_modal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"></button>
                <h4 style="text-align: center; font-weight: 600" class="modal-title">কোর্সের বিস্তারিত তথ্য</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <p class="pull-right" style="padding-right: 20px"><a id="expnsDtlsPDF" href="">পিডিএফ</a></p>
                    <table class="table" style="border-bottom: solid 1px #dddddd">
                        <tr>
                            <td style="width: 20%; text-align: right; font-weight: 600;">কোর্স শিরোনাম :</td>
                            <td><span id="sCName"></span></td>
                            <td style="width: 15%; text-align: right; font-weight: 600;">শুরুর তারিখ :</td>
                            <td style="width: 20%"><span id="sCSD"></span></td>
                        </tr>
                        <tr>
                            <td style="width: 20%; text-align: right; font-weight: 600;">অর্থায়ন :</td>
                            <td><span id="sCYear"></span></td>
                            <td style="width: 15%; text-align: right; font-weight: 600;">শেষ তারিখ :</td>
                            <td style="width: 20%"><span id="sCED"></span></td>
                        </tr>
                        <tr>
                            <td style="width: 20%; text-align: right; font-weight: 600;">প্রশিক্ষণার্থী ধরণ :</td>
                            <td><span id="sCClass"></span></td>
                            <td style="width: 20%; text-align: right; font-weight: 600;">কোর্সের ধরণ :</td>
                            <td><span id="sCCClass"></span></td>
                        </tr>
                        <tr>
                            <td style="width: 15%; text-align: right; font-weight: 600;">প্রশিক্ষণার্থী সংখ্যা :</td>
                            <td style="width: 20%"><span id="sCTN"></span></td>
                            <td style="width: 15%; text-align: right; font-weight: 600;">মোট খরচ :</td>
                            <td style="width: 20%"><span id="sCTE"></span></td>
                        </tr>
                    </table>
                    <div class='form-group col-md-12 col-md-offset-0' id="expnseERR">
                        <p style="font-size:16px; text-align:center;">ব্যয় বিভাজন সংযোজন করা হয় নাই</p>
                    </div>
                    <div class="form-group col-md-12 col-md-offset-0" id="expnseDIV">
                        <label for="expense" class="col-md-12 control-label" style="text-align: center">বিস্তারিত ব্যয়
                            বিভাজন</label>
                        <table class="table" id="detailsExpense">
                            <tr>
                                <th>ক্রমিক নং</th>
                                <th>খাতের নাম</th>
                                <th>ইউনিট সংখ্যা</th>
                                <th>একক দর</th>
                                <th>মোট টাকা</th>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-raised" data-dismiss="modal">বাতিল করুন</button>
            </div>


        </div>
    </div>
</div>

<div class="modal fade" id="donation_modal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"></button>
                <h4 style="text-align: center; font-weight: 700" class="modal-title">অর্থ প্রদান বিবরণ</h4>
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

<?php $this->load->view('layouts/footer'); ?>

<script>

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
    }


    function show_course(c_id) {
        console.log(c_id);
        $('#expnsDtlsPDF').attr('href', '<?= site_url("admin/expenseDetailsPdf")?>/' + c_id);
        $.ajax({
            type: 'post',
            url: '<?php echo site_url('admin/get_course');?>',
            data: {
                c_id: c_id
            }, success: function (data) {
                data1 = $.parseJSON(data);
                //console.log(data1['details']); typeofstudent

                $.each(data1['course'], function (index, value) {
                    $('#sCName').text(value['c_name']);
                    $('#sCYear').text(value['donor_name'] + '(' + value['year'].getDigitBanglaFromEnglish() + ')');
                    $('#sCCClass').text(value['course_class_name']);

                    var msgg = value['total_student'].getDigitBanglaFromEnglish();
                    var man = 0;
                    var woman = 0;
                    if (data1['typeofstudent'].length != 0 || data1['typeofstudent'].length == null) {
                        $.each(data1['typeofstudent'], function (ii, vv) {
                            if (vv['gender'] == 1) {
                                man = vv['count'];
                            }
                            if (vv['gender'] == 2) {
                                woman = vv['count'];
                            }
                        });
                    }
                    msgg += '(নারী: ' + (woman + '').getDigitBanglaFromEnglish() + ',পুরুষ: ' + (man + '').getDigitBanglaFromEnglish() + ')';

                    $('#sCTN').text(msgg);

                    $.each(data1['clssfctn'], function (i, v) {
                        if (v['id'] == value['classification_id']) {
                            $('#sCClass').text(v['class_name']);
                        }
                    });
                    var tDate = value['start_date'].split('-');
                    var tdate = tDate[2] + '-' + tDate[1] + '-' + tDate[0];
                    $('#sCSD').text(tdate.getDigitBanglaFromEnglish());

                    var tDate = value['end_date'].split('-');
                    var tdate = tDate[2] + '-' + tDate[1] + '-' + tDate[0];
                    $('#sCED').text(tdate.getDigitBanglaFromEnglish());
                    $('#sCTE').text(value['expenditure'].getDigitBanglaFromEnglish() + ' টাকা');
                });

                if (data1['details'].length == 0) {
                    document.getElementById('expnseERR').style.display = 'block';
                    document.getElementById('expnseDIV').style.display = 'none';
                } else {
                    document.getElementById('expnseDIV').style.display = 'block';
                    document.getElementById('expnseERR').style.display = 'none';

                    $('#detailsExpense tr:gt(0)').remove();
                    var trow = '';
                    var tttotal = 0;
                    $.each(data1['details'], function (i, v) {
                        trow += '<tr>';
                        trow += '<td>';
                        trow += ((i + 1) + '').getDigitBanglaFromEnglish();
                        trow += '</td>';
                        trow += '<td>';
                        trow += v['details'];
                        trow += '</td>';
                        trow += '<td>';
                        trow += v['unit_quantity'].getDigitBanglaFromEnglish();
                        trow += '</td>';
                        trow += '<td>';
                        trow += v['unit_price'].getDigitBanglaFromEnglish();
                        trow += '</td>';
                        trow += '<td>';
                        trow += ((v['unit_quantity'] * v['unit_price']) + '').getDigitBanglaFromEnglish();
                        trow += '</td>';
                        trow += '</tr>';
                        tttotal += (v['unit_quantity'] * v['unit_price']);
                    });

                    $('#detailsExpense').append(trow);
                    $('#detailsExpense').append('<tr><td colspan="4" style="text-align: center" >সর্বমোট</td><td>' + (tttotal + "").getDigitBanglaFromEnglish() + '</td></tr>');
                }
            }
        });
        $('#show_course_modal').modal('show');
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
                            + '<td style="text-align: left; padding-left: 15px;">' + v["amount"].getDigitBanglaFromEnglish() + '  টাকা</td>'
                            + '<td style="font-weight: 600; text-align: right; width:10%">তারিখ :</td>'
                            + '<td style="text-align: left; width:20%;">' + TdAtE.getDigitBanglaFromEnglish() + '</td>'
                            + '</tr>';
                        total = (parseInt(total) + parseInt(v['amount']));
                        $('#donation').append(trow);
                    });
                    $('#donation').append('<tr><td style="text-align: right; font-weight: 600">সর্বমোট অর্থ :</td><td colspan="3" style="text-align: left; padding-left: 15px; font-weight: 700">' + (total + '').getDigitBanglaFromEnglish() + '  টাকা</td></tr>');
                    $('#donation').append('<tr><td style="text-align: right; font-weight: 600">এই খাতে সমাপ্ত কোর্স পর্যন্ত ব্যয় :</td><td colspan="3" style="text-align: left; padding-left: 15px; font-weight: 700">' + (ExPnse + '').getDigitBanglaFromEnglish() + '  টাকা</td></tr>');
                    $('#donation').append('<tr><td style="text-align: right; font-weight: 600">অবশিষ্ট :</td><td colspan="3" style="text-align: left; padding-left: 15px; font-weight: 700">' + ((total - ExPnse) + '').getDigitBanglaFromEnglish() + '  টাকা</td></tr>');
                });

                $('#donation_modal').modal('show');
            }
        });
    }

</script>
