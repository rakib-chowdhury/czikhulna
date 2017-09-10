<?php $bn_digits = array('০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯'); ?>
<div class="container-fluid display-table">
    <div class="row display-table-row">
        <?php $this->load->view('layouts/sidebar-nav'); ?>
        <div class="col-md-10 display-table-cell" id="main-content">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-hover table-responsive">
                        <br>
                        <a onclick="add_donation_mdl()">
                            <button class="btn btn-success">খাত সংযোজন</button>
                        </a>

                        <hr>
                        <table id="" class="table data-table table-striped table-bordered"
                               cellspacing="0">
                            <thead>
                            <tr>
                                <th style="text-align: center;">ক্রমিক</th>
                                <th style="text-align: center;">খাত এর নাম</th>
                                <th style="text-align: center;">বরাদ্দকৃত অর্থ</th>
                                <th style="text-align: center;">বর্ষ</th>
                                <th style="text-align: center;">তারিখ</th>
                                <th style="text-align: center;">অ্যাকশন</th>
                            </tr>

                            </thead>
                            <tbody>
                            <?php $i = 1;
                            foreach ($list as $row) { ?>
                                <tr>
                                    <td style="text-align: center;">
                                        <?php
                                        echo str_replace(range(0, 9), $bn_digits, $i++);
                                        ?>
                                    </td>
                                    <td style="text-align: center;"><?= $row['donor_name']; ?></td>
                                    <td style="text-align: center;"><a style="cursor: pointer;"
                                                                       onclick="get_donation_amount(<?= $row['id']; ?>)"><?= str_replace(range(0, 9), $bn_digits, $row['total_donation']); ?></a>
                                    </td>
                                    <td style="text-align: center;"><?= str_replace(range(0, 9), $bn_digits, $row['donation_year']) ?></td>
                                    <td style="text-align: center;">
                                        <?php
                                        $tDAte = explode('-', $row['donation_date']);
                                        $TdAtE = $tDAte[2] . '-' . $tDAte[1] . '-' . $tDAte[0];
                                        echo str_replace(range(0, 9), $bn_digits, $TdAtE); ?>
                                    </td>
                                    <td style="text-align: center;">
                                        <a onclick="add_donation(<?php echo $row['id']; ?>)" style="cursor: pointer;">
                                            <span data-toggle="tooltip" data-placement="top" title="অর্থ  সংযোজন"
                                                  class="glyphicon glyphicon-plus"></span>
                                        </a> &nbsp;
                                        <a onclick="edit_donation(<?php echo $row['id']; ?>)" style="cursor: pointer;">
                                            <span data-toggle="tooltip" data-placement="top" title="তথ্য সংশোধন"
                                                  class="glyphicon glyphicon-edit"></span>
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

<!---Add donor--->
<div class="modal fade" id="add_donor_modal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"></button>
                <h4 style="text-align: center;" class="modal-title">খাত সংযোজন</h4>
            </div>
            <form id="add_donor_form" action="<?php echo site_url('admin/add_donor'); ?>" method="post">
                <div class="modal-body">
                    <div style="display: none;" id="per_err_msg" class="alert alert-danger col-md-10 col-md-offset-1">

                    </div>
                    <div class="row">
                        <div class="form-group col-md-10 col-md-offset-1">
                            <label for="donor_name" class="col-md-3 control-label" style="text-align: right">খাত এর
                                নাম</label>
                            <div class="col-md-9">
                                <select name="donor_name" id="donor_name_id" class="form-control">
                                    <option value="রাজস্ব">রাজস্ব</option>
                                    <option value="সিডিএফ">সিডিএফ</option>
                                    <option value="প্রকল্প/অন্যান্য">প্রকল্প/অন্যান্য</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group col-md-10 col-md-offset-1">
                            <label for="donation_amount" class="col-md-3 control-label" style="text-align: right">বরাদ্দকৃত
                                অর্থ এর পরিমাণ</label>
                            <div class="col-md-9">
                                <input type="hidden" name="donation_amount_eng" id="donation_amount_add_donor">
                                <input
                                    onblur="check_amount('add_donor_donation_amount','add_donor_donation_amount_err')"
                                    onkeyup="check_amount('add_donor_donation_amount','add_donor_donation_amount_err')"
                                    type="text" name="donation_amount" id="add_donor_donation_amount"
                                    class="form-control" required>
                                <span style="color: red;" id="add_donor_donation_amount_err"></span>
                            </div>
                        </div>
                        <div class="form-group col-md-10 col-md-offset-1">
                            <label for="donation_datet" class="col-md-3 control-label" style="text-align: right">অর্থ
                                প্রদান এর তারিখ</label>
                            <div class="col-md-9">
                                <input onchange="check_date('donation_date','donation_date_err')"
                                       onblur="check_date('donation_date','donation_date_err')" type="text"
                                       class="form-control" name="donation_date" id="donation_date"
                                       placeholder="অর্থ প্রদান এর তারিখ" required>
                                <span style="color: red;" id="donation_date_err"></span>
                            </div>
                        </div>
                        <div class="form-group col-md-10 col-md-offset-1">
                            <label for="donation_datet" class="col-md-3 control-label"
                                   style="text-align: right">বর্ষ</label>
                            <div class="col-md-9">
                                <select name="borsho" id="borsho_id" class="form-control">
                                    <?php $currY = date('Y');
                                    if (date('m') <= 6) {
                                        $crr = ($currY - 1) . '-' . $currY;
                                    } else {
                                        $crr = ($currY) . '-' . ($currY + 1);
                                    }
                                    for ($i = -2; $i <= 2; $i++) {
                                        $v = ($currY + $i) . '-' . ($currY + $i + 1);
                                        if ($v == $crr) {
                                            echo '<option selected value="' . $v . '">' . str_replace(range(0, 9), $bn_digits, $v) . '</option>';
                                        } else {
                                            echo '<option  value="' . $v . '">' . str_replace(range(0, 9), $bn_digits, $v) . '</option>';
                                        }

                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button onclick="add_donor_btn()" type="button" class="btn btn-success btn-raised">দাখিল করুন
                    </button>
                    <button type="button" class="btn btn-danger btn-raised" data-dismiss="modal">বাতিল করুন</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="add_donation_modal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"></button>
                <h4 style="text-align: center;" class="modal-title">অর্থ সংযোজন </h4>
            </div>
            <form id="add_donation_form" action="<?php echo site_url('admin/add_donation'); ?>" method="post">
                <input type="hidden" name="id" id="d_id">
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-md-12 col-md-offset-0">
                            <label for="donation_amount" class="col-md-3 control-label" style="text-align: right">সংযোজনকৃত
                                অর্থ এর পরিমাণ</label>
                            <div class="col-md-9">
                                <input type="hidden" name="donation_amount_eng" id="donation_amount_add_donation">
                                <input
                                    onblur="check_amount('add_donation_donation_amount','add_donation_donation_amount_err')"
                                    onkeyup="check_amount('add_donation_donation_amount','add_donation_donation_amount_err')"
                                    type="text" name="donation_amount" id="add_donation_donation_amount"
                                    class="form-control" required>
                                <span style="color: red;" id="add_donation_donation_amount_err"></span>
                            </div>
                        </div>
                        <div class="form-group col-md-12 col-md-offset-0">
                            <label for="donation_datet" class="col-md-3 control-label" style="text-align: right">অর্থ
                                প্রদান এর তারিখ</label>
                            <div class="col-md-9">
                                <input onchange="check_date('donation_date1','donation_date1_err')"
                                       onblur="check_date('donation_date1','donation_date1_err')" type="text"
                                       class="form-control" name="donation_date" id="donation_date1"
                                       placeholder="অর্থ প্রদান এর তারিখ" required>
                                <span style="color: red;" id="donation_date1_err"></span>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button onclick="add_donation_btn()" type="button" class="btn btn-success btn-raised">দাখিল করুন
                    </button>
                    <button type="button" class="btn btn-danger btn-raised" data-dismiss="modal">বাতিল করুন</button>
                </div>
            </form>
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

<div class="modal fade" id="edit_donor_modal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"></button>
                <h4 style="text-align: center;" class="modal-title">তথ্য সংশোধন</h4>
            </div>
            <div style="display: none;" id="edit_per_err_msg" class="alert alert-danger col-md-10 col-md-offset-1">

            </div>
            <form id="edit_donor_form" action="<?php echo site_url('admin/edit_donor'); ?>" method="post" >
                <input type="hidden" name="id" id="edit_d_id">
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-md-10 col-md-offset-1">
                            <label for="donor_name" class="col-md-3 control-label" style="text-align: right">খাত এর
                                নাম</label>
                            <div class="col-md-9">
                                <select name="donor_name" id="edit_donor_name" class="form-control">

                                </select>
                            </div>
                        </div>
                        <div class="form-group col-md-10 col-md-offset-1">
                            <label for="year" class="col-md-3 control-label" style="text-align: right">বর্ষ</label>
                            <div class="col-md-9">
                                <select name="borsho" id="borsho" class="form-control">

                                </select>
                            </div>
                        </div>
                        <div class="form-group col-md-10 col-md-offset-1">
                            <table id="edit_donation" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th style="text-align: center;">তারিখ</th>
                                    <th style="text-align: center;">বরাদ্দকৃত অর্থ</th>
                                </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button onclick="edit_donor_btn()" type="button" class="btn btn-success btn-raised">দাখিল করুন
                    </button>
                    <button type="button" class="btn btn-danger btn-raised" data-dismiss="modal">বাতিল করুন</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php $this->load->view('layouts/footer'); ?>

<script>
    var sgmnt = 0;

    $(document).ready(function () {
        $('[data-toggle="tooltip"]').tooltip();
    });

    function check_amount(id, err_id) {
        var tmp_donation = $('#' + id).val().getDigitEnglishFromBangla();
        console.log(tmp_donation);
        if (tmp_donation == null || tmp_donation <= 0 || isNaN(tmp_donation)) {
            console.log(isNaN(tmp_donation));
            document.getElementById(err_id).innerText = 'অনুগ্রহ করে সঠিক অর্থ প্রদান করুন';
        } else {
            console.log('n');
            document.getElementById(err_id).innerText = '';
        }

    }

    function check_date(id, err_id) {
        var tmp_date = $('#' + id).val();
        if (tmp_date == '' || tmp_date == null || tmp_date == '00-00-0000') {
            document.getElementById(err_id).innerText = 'অনুগ্রহ করে সঠিক তারিখ প্রদান করুন';
        } else {
            document.getElementById(err_id).innerText = '';
        }
    }

    function add_donation_mdl() {
        document.getElementById('add_donor_donation_amount').value = '';
        document.getElementById('add_donor_donation_amount_err').innerText = '';
        document.getElementById('donation_date').value = '';
        document.getElementById('donation_date_err').innerText = '';
        var x = document.getElementById('per_err_msg');
        x.style.display = 'none';
        x.innerHTML = '';

        $('#add_donor_modal').modal('show');

    }
    function add_donor_btn() {
        var tmp_donation = $('#add_donor_donation_amount').val().getDigitEnglishFromBangla();
        var tmp_date = $('#donation_date').val();
        var flag = true;
        if (tmp_donation == null || tmp_donation == '' || tmp_donation <= 0 || isNaN(tmp_donation)) {
            document.getElementById('add_donor_donation_amount_err').innerText = 'অনুগ্রহ করে সঠিক অর্থ প্রদান করুন';
            flag = false;
        } else {
            document.getElementById('add_donor_donation_amount_err').innerText = '';
        }
        if (tmp_date == '' || tmp_date == null || tmp_date == '00-00-0000') {
            document.getElementById('donation_date_err').innerText = 'অনুগ্রহ করে সঠিক তারিখ প্রদান করুন';
            flag = false;
        } else {
            document.getElementById('donation_date_err').innerText = '';
        }
        var p_name = $('#donor_name_id').val();
        var p_year = $('#borsho_id').val();
        //donor_add_permission(d_name, d_year);

        $.ajax({
            type: 'post',
            url: '<?php echo site_url('admin/get_donor_add_permission');?>',
            data: {
                d_name: p_name,
                d_year: p_year
            }, success: function (data) {
                //console.log(data);


                if (data == 1) {
                    var x = document.getElementById('per_err_msg');
                    x.style.display = 'none';
                    x.innerHTML = '';
                    console.log('add');
                } else {
                    //permssn = false;
                    console.log('noit');
                    flag = false;
                    var x = document.getElementById('per_err_msg');
                    x.style.display = 'block';
                    x.innerHTML = '<p>' + p_name + ' খাতটি ' + p_year.getDigitBanglaFromEnglish() + ' বর্ষ এর জন্য নিবন্ধন করা রয়েছে। অনুগ্রহ করে সঠিকভাবে খাত নিবন্ধন করুন</p>';
                }

                console.log(flag);
                if (flag == true) {
                    document.getElementById('donation_amount_add_donor').value = tmp_donation;
                    $('#add_donor_form').submit();
                }
            }
        });
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
                var ExPnse=data1['res2'][0]['ExpnsE'];
                if(ExPnse==null){
                    ExPnse=0;
                }
                console.log(ExPnse);
                $.each(data1['res'], function (index, value) {
                    $('#dYear').text(value['donation_year'].getDigitBanglaFromEnglish());
                    $('#donoR').text(value['donor_name']);

                    donation_amount = $.parseJSON(value['donation_details']);
                    console.log(donation_amount);
                    //$('#donation >tbody:gt(0)').remove();
                    document.getElementById('donation').innerHTML='';
                    var total = 0;
                    $.each(donation_amount, function (i, v) {
                        console.log(v['date']);
                        var Type='';
                        var tDaTe = v["date"].split('-');
                        var TdAtE = tDaTe[2] + '-' + tDaTe[1] + '-' + tDaTe[0];
                        var trow = '<tr>';
                        if (v['type'] == 1) {
                            Type='প্রাপ্ত বরাদ্দ';
                        } else {
                            Type='বরাদ্দ যোগ';
                        }
                        trow += '<td style="font-weight: 600; width:35%; text-align: right;">'+Type+' : </td>'
                            + '<td style="text-align: left; padding-left: 15px;">' + v["amount"].getDigitBanglaFromEnglish() + '</td>'
                            +'<td style="font-weight: 600; text-align: right; width:10%">তারিখ :</td>'
                            + '<td style="text-align: left; width:20%;">' + TdAtE.getDigitBanglaFromEnglish() + '</td>'
                            + '</tr>';
                        total = (parseInt(total) + parseInt(v['amount']));
                        $('#donation').append(trow);
                    });
                    $('#donation').append('<tr><td style="text-align: right; font-weight: 600">সর্বমোট অর্থ :</td><td colspan="3" style="text-align: left; padding-left: 15px; font-weight: 700">' + (total + '').getDigitBanglaFromEnglish() + '</td></tr>');
                    $('#donation').append('<tr><td style="text-align: right; font-weight: 600">এই খাতে সমাপ্ত কোর্স পর্যন্ত ব্যয় :</td><td colspan="3" style="text-align: left; padding-left: 15px; font-weight: 700">' + (ExPnse + '').getDigitBanglaFromEnglish() + '</td></tr>');
                    $('#donation').append('<tr><td style="text-align: right; font-weight: 600">অবশিষ্ট :</td><td colspan="3" style="text-align: left; padding-left: 15px; font-weight: 700">' + ((total-ExPnse) + '').getDigitBanglaFromEnglish() + '</td></tr>');
                });

                $('#donation_modal').modal('show');
            }
        });
    }

    function add_donation(donor_id) {
        document.getElementById('d_id').value = donor_id;

        document.getElementById('add_donation_donation_amount').value = '';
        document.getElementById('add_donation_donation_amount_err').innerText = '';
        document.getElementById('donation_date1').value = '';
        document.getElementById('donation_date1_err').innerText = '';

        $('#add_donation_modal').modal('show');
    }
    function add_donation_btn() {
        var tmp_donation = $('#add_donation_donation_amount').val().getDigitEnglishFromBangla();
        var tmp_date = $('#donation_date1').val();
        var flag = true;
        if (tmp_donation == null || tmp_donation == '' || tmp_donation <= 0 || isNaN(tmp_donation)) {
            document.getElementById('add_donation_donation_amount_err').innerText = 'অনুগ্রহ করে সঠিক অর্থ প্রদান করুন';
            flag = false;
        } else {
            document.getElementById('add_donation_donation_amount_err').innerText = '';
        }
        if (tmp_date == '' || tmp_date == null || tmp_date == '00-00-0000') {
            document.getElementById('donation_date1_err').innerText = 'অনুগ্রহ করে সঠিক তারিখ প্রদান করুন';
            flag = false;
        } else {
            document.getElementById('donation_date1_err').innerText = '';
        }

        if (flag == true) {
            document.getElementById('donation_amount_add_donation').value = tmp_donation;
            $('#add_donation_form').submit();
        }
    }

    function edit_donation(donor_id) {
        document.getElementById('edit_d_id').value = donor_id;
        $.ajax({
            type: 'post',
            url: '<?php echo site_url('admin/get_donor_info');?>',
            data: {
                id: donor_id
            }, success: function (data) {
                console.log(data);

                var data1 = $.parseJSON(data);
                $.each(data1['res'], function (index, value) {
                    //console.log( value);
                    $('#edit_donor_name option').remove();
                    if (value['donor_name'] == 'রাজস্ব') {
                        option_val = '<option selected value="রাজস্ব">রাজস্ব</option>'
                            + '<option value="সিডিএফ">সিডিএফ</option>'
                            + '<option value="প্রকল্প/অন্যান্য">প্রকল্প/অন্যান্য</option>';
                    } else if (value['donor_name'] == 'সিডিএফ') {
                        option_val = '<option value="রাজস্ব">রাজস্ব</option>'
                            + '<option selected value="সিডিএফ">সিডিএফ</option>'
                            + '<option value="প্রকল্প/অন্যান্য">প্রকল্প/অন্যান্য</option>';
                    } else if (value['donor_name'] == 'প্রকল্প/অন্যান্য') {
                        option_val = '<option value="রাজস্ব">রাজস্ব</option>'
                            + '<option value="সিডিএফ">সিডিএফ</option>'
                            + '<option selected value="প্রকল্প/অন্যান্য">প্রকল্প/অন্যান্য</option>';

                    }
                    $('#edit_donor_name').append(option_val);

                    $('#borsho option').remove();
                    var yv = value['donation_year'];
                    var vval1 = (parseInt(yv) - 2) + '-' + (parseInt(yv) - 1);
                    var vval2 = (parseInt(yv) - 1) + '-' + (parseInt(yv) - 0);
                    var vval3 = (parseInt(yv) - 0) + '-' + (parseInt(yv) + 1);
                    var vval4 = (parseInt(yv) + 1) + '-' + (parseInt(yv) + 2);
                    var vval5 = (parseInt(yv) + 2) + '-' + (parseInt(yv) + 3);

                    opp_year = '<option value="' + vval1 + '">' + vval1.getDigitBanglaFromEnglish() + '</option><option value="' + vval2 + '">' + vval2.getDigitBanglaFromEnglish() + '</option><option value="' + vval3 + '" selected>' + vval3.getDigitBanglaFromEnglish() + '</option><option value="' + vval4 + '">' + vval4.getDigitBanglaFromEnglish() + '</option><option value="' + vval5 + '">' + vval5.getDigitBanglaFromEnglish() + '</option>';
                    $('#borsho').append(opp_year);

                    donation_amount = $.parseJSON(value['donation_details']);
                    $('#edit_donation > tbody :gt(0)').remove();
                    var total = 0;
                    sgmnt = 0;
                    $.each(donation_amount, function (i, v) {
                        sgmnt++;
                        var tDaTe = v["date"].split('-');
                        var TdAtE = tDaTe[2] + '-' + tDaTe[1] + '-' + tDaTe[0];
                        var trow = '<tr>'
                            + '<td style="text-align: center; width: 30%;"><input type="hidden" name="d_date[]" value="' + v["date"] + '"><input type="hidden" name="edit_type[]" value="' + v["type"] + '">' + TdAtE.getDigitBanglaFromEnglish() + '</td>'
                            + '<td style="text-align: center;"><input type="hidden" name="edit_amnt_eng[]" id="edit_amnt_eng_' + i + '"><input id="edit_amnt_' + i + '" onkeyup="check_amount(\'edit_amnt_' + i + '\',\'edit_amnt_err_' + i + '\')" onblur="check_amount(\'edit_amnt_' + i + '\',\'edit_amnt_err_' + i + '\')"  type="text" name="d_amnt[]" class="form-control" value="' + v["amount"].getDigitBanglaFromEnglish() + '"><span style="color: red;" id="edit_amnt_err_' + i + '"></span></td>'
                            + '</tr>';
                        console.log(trow);
                        $('#edit_donation > tbody').append(trow);
                    });
                });
                $('#edit_donor_modal').modal('show');
            }
        });

    }
    function edit_donor_btn() {
        var flag = true;
        for (i = 0; i < sgmnt; i++) {
            console.log($('#edit_amnt_' + i).val());
            var amnt = $('#edit_amnt_' + i).val().getDigitEnglishFromBangla();
            if (amnt == null || amnt == 0 || amnt <= 0 || isNaN(amnt)) {
                flag = false;
                document.getElementById('edit_amnt_err_' + i).innerText = 'অনুগ্রহ করে সঠিক অর্থ প্রদান করুন';
            } else {
                document.getElementById('edit_amnt_err_' + i).innerText = '';
                document.getElementById('edit_amnt_eng_' + i).value = amnt;
                console.log($('#edit_amnt_eng' + i).val())
            }
        }

        var p_name = $('#edit_donor_name').val();
        var p_year = $('#borsho').val();
        var p_id = $('#edit_d_id').val();
        //donor_add_permission(d_name, d_year);

        $.ajax({
            type: 'post',
            url: '<?php echo site_url('admin/get_donor_edit_permission');?>',
            data: {
                d_name: p_name,
                d_year: p_year,
                d_id: p_id
            }, success: function (data) {
                //console.log(data);


                if (data == 1) {
                    var x = document.getElementById('edit_per_err_msg');
                    x.style.display = 'none';
                    x.innerHTML = '';
                    console.log('add');
                } else {
                    //permssn = false;
                    console.log('noit');
                    flag = false;
                    var x = document.getElementById('edit_per_err_msg');
                    x.style.display = 'block';
                    x.innerHTML = '<p>' + p_name + ' খাতটি ' + p_year.getDigitBanglaFromEnglish() + ' বর্ষ এর জন্য নিবন্ধন করা রয়েছে।</p>';
                }

                console.log(flag);
                if (flag == true) {

                    $('#edit_donor_form').submit();
                }
            }
        });
    }
</script>