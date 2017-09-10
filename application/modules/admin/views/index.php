<?php
$bn_digits = array('০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯');
?>
<head>
    <!--bar diagram-->
    <link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/customChart/barchart.css">
    <script src="<?php echo base_url(); ?>assets/customChart/barchart.jquery1.js"></script>
    <script src="<?php echo base_url(); ?>assets/customChart/barchart.jquery.js"></script>
    <script src="<?php echo base_url(); ?>assets/customChart/barchart.jquery2.js"></script>
</head>

<div class="container-fluid display-table">
    <div class="row display-table-row">
        <?php $this->load->view('layouts/sidebar-nav'); ?>
        <div class="col-md-10 display-table-cell" id="main-content">

            <div class="col-md-12">
                <div class="col-md-6">
                    <div style="color:white; text-align:center; background:#4867aa; margin-top:10px; margin-bottom:10px;" class="col-md-4 col-sm-4 col-lg-4 col-xs-12 col-md-offset-4 col-sm-offset-4 col-lg-offset-4">
                        <h4 style="text-align: center;">কোর্স সংখ্যা</h4>
                    </div>

                    <div id="container1" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

                </div>
                <div class="col-md-6">
                    <div style="color:white; text-align:center; background:#4867aa; margin-top:10px; margin-bottom:10px;" class="col-md-4 col-sm-4 col-lg-4 col-xs-12 col-md-offset-4 col-sm-offset-4 col-lg-offset-4">
                        <h4 style="text-align: center;">প্রশিক্ষণার্থী সংখ্যা</h4>
                    </div>
                    <div id="container3" style="min-width: 310px; height: 400px; margin: 0 auto"></div>


                </div>


            </div>
            <div class="col-md-12" style="margin-top: 100px;">
                <div class="col-md-6 ">
                    <div style="color:white; text-align:center; background:#4867aa; margin-top:10px; margin-bottom:10px;" class="col-md-6 col-sm-6 col-lg-6 col-xs-12 col-md-offset-3 col-sm-offset-3 col-lg-offset-3">
                        <h4 style="text-align: center;">প্রশিক্ষণের ধরণ ভিত্তিক বিভাজন</h4>
                    </div>
                    <div id="chart_buttons"></div>
                    <div id="chart" style="width:95%;"></div>

                    <canvas id="canvas2" width="550" height="280">
                    </canvas>
                    <div class="col-md-12">
                        <div class="col-md-8 col-sm-8 col-lg-8 col-xs-12 col-md-offset-2 col-sm-offset-2 col-lg-offset-2">
                            <table style="width: 100%;" >
                                <?php foreach ($course_per as $key => $c) { ?>
                                <tr>
                                    <td id="pie_chart_2_li_<?= $key; ?>"><?= $c['c_name']; ?></td>
                                    <td id="pie_chart2_2_li_<?= $key; ?>">: 
                                        <?php echo str_replace(range(0, 9), $bn_digits, $c['person']); ?>
                                        জন
                                    </td>
                                </tr>

                                <?php } ?>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div style="color:white; text-align:center; background:#4867aa; margin-top:10px; margin-bottom:10px;" class="col-md-4 col-sm-4 col-lg-4 col-xs-12 col-md-offset-4 col-sm-offset-4 col-lg-offset-4">
                        <h4 style="text-align: center;">প্রশিক্ষণ বাজেট বরাদ্দ</h4>
                    </div>
                    <div id="container2" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

                </div>
            </div>

            <div class="col-md-12" style="margin-top: 100px;">
                <div class="col-md-12 ">
                    <div style="color:white; text-align:center; background:#4867aa; margin-bottom:10px;" class="col-md-4 col-sm-4 col-lg-4 col-xs-12 col-md-offset-4 col-sm-offset-4 col-lg-offset-4">
                        <h4 style="text-align: center;">চলমান কোর্স</h4>
                    </div>
                    <table class="table table-striped table-bordered center"
                           cellspacing="0">
                        <thead>
                        <tr>
                            <th style="text-align: center;">ক্রমিক</th>
                            <th style="text-align: center;">প্রশিক্ষণ কোর্স এর নাম</th>
                            <th style="text-align: center; width:15%;">অর্থায়ন</th>
                            <th style="text-align: center;">প্রস্তাবিত ব্যয়</th>
                            <th style="text-align: center;">কোর্স এর মেয়াদ</th>
                            <th style="text-align: center;">অনুষ্ঠান এর তারিখ</th>
                            <th style="text-align: center;">প্রশিক্ষণার্থী সংখ্যা</th>
                            <th style="text-align: center;">প্রশিক্ষণার্থীর ধরণ</th>
                        </tr>

                        </thead>
                        <tbody>
                        <?php $i = 1;
                        foreach ($course_running as $row) { ?>
                        <tr>
                            <td style="text-align: center;">
                                <?php
                                echo str_replace(range(0, 9), $bn_digits, $i++);
                                ?>
                            </td>
                            <td>
                                <a href="<?= site_url('admin/add_trainee/' . $row['c_id']); ?>"
                                       style="cursor: pointer;">
                                        <?= $row['c_name']; ?>
                                    </a>
                            </td>
                            <td style="text-align: center; width:15%;"><a style="cursor: pointer;"
                                           onclick="get_donation_amount(<?= $row['donor_id']; ?>)"><?= str_replace(range(0, 9), $bn_digits, $row['donor_name']).'('.str_replace(range(0,9),$bn_digits, $row['donation_year']).')'; ?></a></td>
                            <td style="text-align: center;">
                                        <a onclick="show_course(<?php echo $row['c_id']; ?>)"
                                           style="cursor: pointer;">
                                            <?= str_replace(range(0,9),$bn_digits,$row['expenditure']); ?>
                                        </a>
                                    </td>
                            <td style="text-align: center;"><?= str_replace(range(0, 9), $bn_digits, $row['run_days']) . ' দিন'; ?></td>
                            <td style="text-align: center;">
                                <?php
                                     $tDAte=explode('-',$row['start_date']);
                                echo str_replace(range(0, 9), $bn_digits, $tDAte[2]).'-';
                                echo str_replace(range(0, 9), $bn_digits, $tDAte[1]).'-';
                                echo str_replace(range(0, 9), $bn_digits, $tDAte[0]).' ';
                                echo ' - ' . PHP_EOL;
                                $tDAte=explode('-',$row['end_date']);
                                echo str_replace(range(0, 9), $bn_digits, $tDAte[2]).'-';
                                echo str_replace(range(0, 9), $bn_digits, $tDAte[1]).'-';
                                echo str_replace(range(0, 9), $bn_digits, $tDAte[0]).' ';
                                ?>
                            </td>
                            <td style="text-align: center;"><?php echo str_replace(range(0, 9), $bn_digits, $row['total_student']); ?></td>
                            <td style="text-align: center;"><?php echo $row['class_name']; ?></td>
                        </tr>
                        <?php } ?>
                        </tbody>
                    </table>

                </div>
            </div>

            <div class="col-md-12">
                <div class="col-md-12 ">
                    <div style="color:white; text-align:center; background:#4867aa; margin-bottom:10px;" class="col-md-4 col-sm-4 col-lg-4 col-xs-12 col-md-offset-4 col-sm-offset-4 col-lg-offset-4">
                        <h4 style="text-align: center;">পরবর্তী কোর্স</h4>
                    </div>
                    <table class="table table-striped table-bordered center"
                           cellspacing="0">
                        <thead>
                        <tr>
                            <th style="text-align: center;">ক্রমিক</th>
                            <th style="text-align: center;">প্রশিক্ষণ কোর্স এর নাম</th>
                            <th style="text-align: center; width:15%;">অর্থায়ন</th>
                            <th style="text-align: center;">প্রস্তাবিত ব্যয়</th>
                            <th style="text-align: center;">কোর্স এর মেয়াদ</th>
                            <th style="text-align: center;">অনুষ্ঠান এর তারিখ</th>
                            <th style="text-align: center;">প্রশিক্ষণার্থী সংখ্যা</th>
                            <th style="text-align: center;">প্রশিক্ষণার্থীর ধরণ</th>
                        </tr>

                        </thead>
                        <tbody>
                        <?php $i = 1;
                        foreach ($course_future as $row) { ?>
                        <tr>
                            <td style="text-align: center;">
                                <?php
                                echo str_replace(range(0, 9), $bn_digits, $i++);
                                ?>
                            </td>
                            <td>
                                <a href="<?= site_url('admin/add_trainee/' . $row['c_id']); ?>"
                                       style="cursor: pointer;">
                                        <?= $row['c_name']; ?>
                                    </a>
                            </td>
                            <td style="text-align: center; width:15%;"><a style="cursor: pointer;"
                                           onclick="get_donation_amount(<?= $row['donor_id']; ?>)"><?= str_replace(range(0, 9), $bn_digits, $row['donor_name']).'('.str_replace(range(0,9),$bn_digits, $row['donation_year']).')'; ?></a></td>
                            <td style="text-align: center;">
                                        <a onclick="show_course(<?php echo $row['c_id']; ?>)"
                                           style="cursor: pointer;">
                                            <?= str_replace(range(0,9),$bn_digits,$row['expenditure']); ?>
                                        </a>
                                    </td>
                            <td style="text-align: center;"><?= str_replace(range(0, 9), $bn_digits, $row['run_days']) . ' দিন'; ?></td>
                            <td style="text-align: center;">
                                <?php                                
                                      $tDAte=explode('-',$row['start_date']);
                                echo str_replace(range(0, 9), $bn_digits, $tDAte[2]).'-';
                                echo str_replace(range(0, 9), $bn_digits, $tDAte[1]).'-';
                                echo str_replace(range(0, 9), $bn_digits, $tDAte[0]).' ';
                                echo ' - ' . PHP_EOL;
                                $tDAte=explode('-',$row['end_date']);
                                echo str_replace(range(0, 9), $bn_digits, $tDAte[2]).'-';
                                echo str_replace(range(0, 9), $bn_digits, $tDAte[1]).'-';
                                echo str_replace(range(0, 9), $bn_digits, $tDAte[0]).' ';
                                ?>
                            </td>
                            <td style="text-align: center;"><?php echo str_replace(range(0, 9), $bn_digits, $row['total_student']); ?></td>
                            <td style="text-align: center;"><?php echo $row['class_name']; ?></td>
                        </tr>
                        <?php } ?>
                        </tbody>
                    </table>

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
                    <div id="expnseERR">
                        <p style="text-align: center; font-size: 14px;">ব্যয় বিভাজন সংযোজন করা হয় নাই</p>
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


            <div class="row">
                <footer id="admin-footer">
                    <p class="text-center">Copyright &copy; 2016. All right resereved</p>
                </footer>
            </div><!-- /row -->
        </div> <!-- /col10 -->
    </div><!-- /row -->
</div> <!-- /container-fluid -->

<!-- bar diagram for trainee start-->
<script>
    $('#emp-list1').dataTable(
            {
                "bSort" : false
            } );       

</script>


<script>
    var donors = [];
    <?php
    foreach ($donors as $k=>$d){ ?>
    donors.push('<?=$d['year']?>');
    <?php }
    ?>

    ///////course///////////
    var rajoso = [];
    var cdf = [];
    var other = [];

    //////rajosso///////
    <?php
    foreach ($course_rajosso as $k=>$c){ ?>
    rajoso.push(<?= $c['t']?>);
    <?php }
    ?>
    //////cdf///////
    <?php
    foreach ($course_cdf as $k=>$c){ ?>
    cdf.push(<?= $c['t']?>);
    <?php }
    ?>
    //////other///////
    <?php
    foreach ($course_other as $k=>$c){ ?>
    other.push(<?= $c['t']?>);
    <?php }
    ?>
    ////////////budget/////////
    var b_rajoso = [];
    var b_cdf = [];
    var b_other = [];

    //////rajosso///////
    <?php
    foreach ($budget_rajosso as $k=>$c){
    if ($c['t'] == '' || $c['t'] == null) {
        $c['t'] = 0;
    }
    ?>
    b_rajoso.push(<?= $c['t']?>);
    <?php }
    ?>
    //////cdf///////
    <?php
    foreach ($budget_cdf as $k=>$c){
    if ($c['t'] == '' || $c['t'] == null) {
        $c['t'] = 0;
    }
    ?>
    b_cdf.push(<?= $c['t']?>);
    <?php }
    ?>
    //////other///////
    <?php
    foreach ($budget_other as $k=>$c){
    if($c['t']=='' || $c['t']==null){
        $c['t']=0;
    }
    ?>
    b_other.push(<?= $c['t']?>);
    <?php }
    ?>
    
    /////////trainee number
    ////////////budget/////////
    var male = [];
    var female = [];

    //////rajosso///////
    <?php
    foreach ($trainee_male as $k=>$c){
    if ($c['t'] == '' || $c['t'] == null) {
        $c['t'] = 0;
    }
    ?>
    male.push(<?= $c['t']?>);
    <?php }
    ?>
    //////cdf///////
    <?php
    foreach ($trainee_female as $k=>$c){
    if ($c['t'] == '' || $c['t'] == null) {
        $c['t'] = 0;
    }
    ?>
    female.push(<?= $c['t']?>);
    <?php }
    ?>
    
    //console.log(male);
    //console.log(female);
    //console.log(donors);
    /////course number
    $(function () {
        Highcharts.chart('container1', {

            chart: {
                type: 'column'
            },

            title: {
                text: ''
            },

            xAxis: {
                categories: donors
            },

            yAxis: {
                allowDecimals: false,
                min: 0,
                title: {
                    text: 'কোর্স সংখ্যা'
                }
            },

            tooltip: {
                formatter: function () {
                    return '<b>' + this.x + '</b><br/>' +
                        this.series.name + ': ' + this.y + '<br/>' +
                        'মোট: ' + this.point.stackTotal;
                }
            },

            plotOptions: {
                column: {
                    stacking: 'normal'
                }
            },

            series: [{
                name: 'রাজস্ব',
                data: rajoso,
                stack: 'male'
            }, {
                name: 'সিডিএফ',
                data: cdf,
                stack: 'male'
            }, {
                name: 'প্রকল্প/অন্যান্য',
                data: other,
                stack: 'male'
            }]
        });
    });
    //////course budget
    $(function () {
        Highcharts.chart('container2', {

            chart: {
                type: 'column'
            },

            title: {
                text: ''
            },

            xAxis: {
                categories: donors
            },

            yAxis: {
                allowDecimals: false,
                min: 0,
                title: {
                    text: 'টাকা'
                }
            },

            tooltip: {
                formatter: function () {
                    return '<b>' + this.x + '</b><br/>' +
                        this.series.name + ': ' + this.y + '<br/>' +
                        'মোট: ' + this.point.stackTotal;
                }
            },

            plotOptions: {
                column: {
                    stacking: 'normal'
                }
            },

            series: [{
                name: 'রাজস্ব',
                data: b_rajoso,
                stack: 'male'
            }, {
                name: 'সিডিএফ',
                data: b_cdf,
                stack: 'male'
            }, {
                name: 'প্রকল্প/অন্যান্য',
                data: b_other,
                stack: 'male'
            }]
        });
    });


    //////trainee number
    $(function () {
        Highcharts.chart('container3', {

            chart: {
                type: 'column'
            },

            title: {
                text: ''
            },

            xAxis: {
                categories: donors
            },

            yAxis: {
                allowDecimals: false,
                min: 0,
                title: {
                    text: 'প্রশিক্ষণার্থী সংখ্যা'
                }
            },

            tooltip: {
                formatter: function () {
                    return '<b>' + this.x + '</b><br/>' +
                        this.series.name + ': ' + this.y + '<br/>' +
                        'মোট: ' + this.point.stackTotal;
                }
            },

            plotOptions: {
                column: {
                    stacking: 'normal'
                }
            },

            series: [{
                name: 'পুরুষ',
                data: male,
                stack: 'male'
            }, {
                name: 'নারী',
                data: female,
                stack: 'male'
            }]
        });
    });
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
                    document.getElementById('expnseERR').style.display='block';
                    document.getElementById('expnseDIV').style.display='none';
                } else {
                    document.getElementById('expnseERR').style.display='none';
                    document.getElementById('expnseDIV').style.display='block';
                    
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
</script>





<!-- pie diagram start-->
<script>
    var course_val = new Array();
    <?php foreach($course_per as $key => $val){ ?>
    course_val.push([{person: '<?php echo $val['person']; ?>'}, {name: '<?php echo $val['c_name']; ?>'}]);
    <?php } ?>

</script>

<script src="<?php echo base_url(); ?>assets/customChart/pie_chart2_js.js"></script>

<!-- pie diagram end-->