<?php $bn_digits = array('০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯'); ?>
<div class="container-fluid display-table">
    <div class="row display-table-row">
        <?php $this->load->view('layouts/sidebar-nav'); ?>
        <div class="col-md-10 display-table-cell" id="main-content">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-hover table-responsive">
                        <!--<a href="<?= site_url('admin/add_courses') ?>">
                            <button class="btn btn-success">কোর্স সংযোজন</button>
                        </a>-->
                        <h2 style="text-align: center">কোর্স তালিকা</h2>
                        <hr>
                        <table id="emp-list" class="table table-striped table-bordered "
                               cellspacing="0">
                            <thead>
                            <tr>
                                <th style="text-align: center;">ক্রমিক</th>
                                <th style="text-align: center;">কোর্স শিরোনাম</th>
                                <th style="text-align: center; width:9%;">প্রশিক্ষণ বর্ষ</th>
                                <th style="text-align: center; width:6%;">অর্থায়ন</th>
                                <th style="text-align: center;">প্রশিক্ষণার্থী ধরণ</th>
                                <th style="text-align: center;">মেয়াদ</th>
                                <th style="text-align: center;">অনুষ্ঠানের<br>তারিখ</th>
                                <th style="text-align: center;">প্রশিক্ষণার্থী<br>সংখ্যা</th>
                                <th style="text-align: center;">প্রস্তাবিত ব্যয়</th>
                                <th style="text-align: center;">কোর্সের অবস্থা</th>
                                <?php if ($this->uri->segment(3) == 'dda') {
                                } else { ?>
                                    <th style="text-align: center; width: 80px;">অ্যাকশন</th><?php } ?>
                            </tr>

                            </thead>
                            <tbody>
                            <?php
                            foreach ($course as $i => $row) { ?>
                                <tr>
                                    <td style="text-align: center;">
                                        <?= str_replace(range(0, 9), $bn_digits, ($i + 1));
                                        ?>
                                    </td>
                                    <?php if ($this->uri->segment(3) == 'dda') { ?>
                                        <td>
                                            <a href="<?= site_url('admin/new_trainee/' . $row['c_id']); ?>"
                                               style="cursor: pointer;">
                                                <?= $row['c_name']; ?>
                                            </a>
                                        </td>
                                    <?php } else { ?>
                                        <td>
                                            <a href="<?= site_url('admin/add_trainee/' . $row['c_id']); ?>"
                                               style="cursor: pointer;">
                                                <?= $row['c_name']; ?>
                                            </a>
                                        </td>
                                    <?php } ?>

                                    <td style="text-align: center; width:9%;"><?= str_replace(range(0, 9), $bn_digits, $row['donation_year']) ?></td>
                                    <td style="text-align: center; width:6%;"><?= str_replace(range(0, 9), $bn_digits, $row['donor_name']) ?></td>
                                    <td style="text-align: center;"><?php echo str_replace(range(0, 9), $bn_digits, $row['class_name']); ?></td>
                                    <td style="text-align: center;"><?= str_replace(range(0, 9), $bn_digits, $row['run_days']) . ' দিন'; ?></td>
                                    <td style="text-align: center;"><?php
                                        $ssDate = explode('-', $row['start_date']);
                                        $sssDate = $ssDate[2] . '/' . $ssDate[1] . '/' . $ssDate[0];
                                        echo str_replace(range(0, 9), $bn_digits, $sssDate);
                                        echo ' - ';
                                        $ssDate = explode('-', $row['end_date']);
                                        $sssDate = $ssDate[2] . '/' . $ssDate[1] . '/' . $ssDate[0];
                                        echo str_replace(range(0, 9), $bn_digits, $sssDate);
                                        ?>
                                    </td>
                                    <td style="text-align: center;"><?php echo str_replace(range(0, 9), $bn_digits, $row['total_student']); ?></td>
                                    <td style="text-align: center;">
                                        <a onclick="show_course(<?php echo $row['c_id']; ?>)"
                                           style="cursor: pointer;">
                                            <?= str_replace(range(0, 9), $bn_digits, $row['expenditure']); ?>
                                        </a>
                                    </td>
                                    <td style="text-align: center; padding-top: 8px;">
                                        <?php
                                        $stts = $row['course_status'];
                                        if ($stts == 1) {
                                            echo '<span class="label label-success">সম্পাদনযোগ্য</span>';
                                        } elseif ($stts == 2) {
                                            echo 'সম্পাদিত';
                                        } else {
                                            echo $stts;
                                        }
                                        ?>
                                    </td>
                                    <?php if ($this->uri->segment(3) == 'dda') {
                                    } else { ?>
                                        <td style="text-align: center;">
                                        <?php if ($this->uri->segment(3) == 'edit' && $row['course_status'] == 1) { ?>
                                            <a href="<?= site_url('admin/edit_courses') . '/' . $row['c_id'] ?>"
                                               style="cursor: pointer;">
                                            <span data-toggle="tooltip" data-placement="top"
                                                  title="কোর্সের তথ্য সংশোধন" class="glyphicon glyphicon-edit"></span>
                                            </a>
                                        <?php } elseif ($this->uri->segment(3) == 'status' && $row['course_status'] == 1) { ?>
                                            <a onclick="course_status_change(<?= $row['c_id']; ?>,'<?= $row['c_name']; ?>',<?= $row['course_status']; ?>)"
                                               style="cursor: pointer">
                                            <span data-toggle="tooltip" data-placement="top"
                                                  title="কোর্সের অবস্থা পরিবর্তন"
                                                  class="glyphicon glyphicon-refresh"></span>
                                            </a>
                                        <?php } ?>
                                        </td><?php } ?>
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

<!--course status change--->
<div class="modal fade" id="course_status_change_modal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"></button>
                <h4 style="text-align: center;" class="modal-title">কোর্স স্ট্যাটাস</h4>
            </div>
            <div class="modal-body">
                <input type="hidden" id="crse_id">
                <input type="hidden" id="crse_stts">
                <p id="c_mssg"></p>
            </div>
            <div class="modal-footer">
                <button type="button" onclick="course_status_change_submit()" class="btn btn-success btn-raised">
                    দাখিল করুন
                </button>
                <button type="button" data-dismiss="modal" class="btn btn-danger btn-raised">বাতিল করুন</button>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('layouts/footer'); ?>

<script>

    $(document).ready(function () {
        /////////tooltip starts///////
        $('[data-toggle="tooltip"]').tooltip();
        //////////tooltip ends//////////
        $('#emp-list').DataTable({
            "bSort": false
        });

    });

    function course_status_change(c_id, name, stts) {
        document.getElementById('crse_id').value = c_id;
        if (stts == 1) {
            document.getElementById('c_mssg').innerText = name + " কোর্সটি মূল্যায়নের জন্য অবমুক্ত করা হলো। (সম্পাদিত কোর্সের তথ্য সংশোধন, কোর্সের অবস্থা পরিবর্তন, প্রশিক্ষণার্থী সংযোজন সম্ভব নয়)";
            document.getElementById('crse_stts').value = 2;
        } else if (stts == 2) {
            document.getElementById('c_mssg').innerText = name + " কোর্সটি মূল্যায়ন করা থেকে বিরত করা হলো";
            document.getElementById('crse_stts').value = 1;
        }
        $('#course_status_change_modal').modal('show');
    }
    function course_status_change_submit() {
        var id = $('#crse_id').val();
        var stts = $('#crse_stts').val();
        console.log(id);
        console.log(stts);
        $.ajax({
            type: 'post',
            url: '<?= site_url("admin/update_course_status");?>',
            data: {
                c_id: id,
                status: stts
            }, success: function (data) {
                console.log(data);
                $('#course_status_change_modal').modal('hide');
                window.location.reload();
            }

        });
    }

    function edit_course(c_id) {
        console.log(c_id);
        $.ajax({
            type: 'post',
            url: '<?php echo site_url('admin/get_course');?>',
            data: {
                c_id: c_id
            }, success: function (data) {
                console.log(data);
                data1 = $.parseJSON(data);

                $.each(data1['course'], function (index, value) {

                    $('#clsss_add1 option').remove();
                    $.each(data1['clssfctn'], function (i, v) {
                        if (value['classification_id'] == v['id']) {
                            var option = '<option selected value="' + v['id'] + '">' + v['class_name'] + '</option>';
                        } else {
                            var option = '<option value="' + v['id'] + '">' + v['class_name'] + '</option>';
                        }
                        $('#clsss_add1').append(option);
                    });
                    //$('#clsss_add1').append('<option value="add">সংযোজন করুন</option>');
                    //$('#d_name opiton').remove();
                    $('#edit_d_id option').remove();
                    $.each(data1['list'], function (i, v) {
                        if (value['donor_id'] == v['id']) {
                            var option = '<option selected value="' + v['id'] + '">' + v['donor_name'] + '(' + v["donation_year"].getDigitBanglaFromEnglish() + ')' + '</option>';
                        } else {
                            var option = '<option value="' + v['id'] + '">' + v['donor_name'] + '(' + v["donation_year"].getDigitBanglaFromEnglish() + ')' + '</option>';
                        }
                        $('#edit_d_id').append(option);
                    });

                    var sDate = value['start_date'].split('-');
                    var eDate = value['end_date'].split('-');
                    document.getElementById('c_name').value = value['name'];
                    document.getElementById('start_date1').value = (sDate[1] + '/' + sDate[2] + '/' + sDate[0]).getDigitBanglaFromEnglish();
                    document.getElementById('end_date1').value = (eDate[1] + '/' + eDate[2] + '/' + eDate[0]).getDigitBanglaFromEnglish();
                    document.getElementById('expense1').value = value['expenditure'].getDigitBanglaFromEnglish();
                    document.getElementById('expense1_eng').value = value['expenditure'];
                });

            }
        });

        document.getElementById('c_id').value = c_id;
        $('#edit_course_modal').modal('show');
    }
    function edit_course_bttn() {
        var tmp_date = $('#end_date1').val();
        var tmp_date1 = $('#start_date1').val();
        var tmp_crse = $('#c_name').val();
        tmp_crse = tmp_crse.replace(/\s+/g, '');
        var tmp_user_type = $('#clsss_add1').val();
        var tmp_expense = $('#expense1').val().getDigitEnglishFromBangla();
        var flag = true;
        date_diff = (new Date(tmp_date.getDigitEnglishFromBangla()) - new Date(tmp_date1.getDigitEnglishFromBangla())) / 1000 / 60 / 60 / 24;
        console.log(date_diff);
        if (tmp_date == '' || tmp_date == null || tmp_date == '00-00-0000' || date_diff < 0) {
            document.getElementById('end_date1_err').innerText = 'অনুগ্রহ করে সঠিক তারিখ প্রদান করুন';
            flag = false;
        } else {
            document.getElementById('end_date1_err').innerText = '';
        }
        if (tmp_date1 == '' || tmp_date1 == null || tmp_date1 == '00-00-0000' || date_diff < 0) {
            document.getElementById('start_date1_err').innerText = 'অনুগ্রহ করে সঠিক তারিখ প্রদান করুন';
            flag = false;
        } else {
            document.getElementById('start_date1_err').innerText = '';
        }
        if (tmp_crse == null || tmp_crse == '') {
            flag = false;
            document.getElementById('crs_err1').innerText = 'অনুগ্রহ করে সঠিক তথ্য প্রদান করুন';
        } else {
            document.getElementById('crs_err1').innerText = '';
        }
        if (tmp_user_type == '' || tmp_user_type == null) {
            flag = false;
            document.getElementById('clss1_err').innerText = "প্রশিক্ষণার্থী ধরণ নির্বাচন করুন";
        } else {
            document.getElementById('clss1_err').innerText = '';
        }
        if (tmp_expense == null || tmp_expense == '' || tmp_expense <= 0 || isNaN(tmp_expense)) {
            flag = false;
            document.getElementById('alloc-div-edit').innerText = 'অনুগ্রহ করে সঠিক অর্থ প্রদান করুন';
        } else {
            document.getElementById('alloc-div-edit').innerText = '';
        }

        if (flag == true) {
            document.getElementById('start_date1').value = tmp_date1.getDigitEnglishFromBangla();
            document.getElementById('end_date1').value = tmp_date.getDigitEnglishFromBangla();
            $('#edit_course_form').submit();
        }


    }
    function check_allocation_edit() {
        var tmp_amnt = $('#expense1').val().getDigitEnglishFromBangla();
        var f_err = false;
        if (tmp_amnt == null || tmp_amnt == '' || tmp_amnt <= 0 || isNaN(tmp_amnt)) {
            f_err = true;
            $('#edit_course_btn').prop('disabled', 'true');
            document.getElementById('alloc-div-edit').innerText = 'অনুগ্রহ করে সঠিক অর্থ প্রদান করুন';
        }
        var d_id = $('#edit_d_id').val();
        var c_id = $('#c_id').val();

        console.log(d_id);
        $.ajax({
            type: 'post',
            url: '<?= site_url("admin/get_used_amount_edit");?>',
            data: {
                d_id: d_id,
                c_id: c_id
            }, success: function (data) {
                console.log(data);
                data1 = $.parseJSON(data);
                console.log(data1);

                if (tmp_amnt == '' || tmp_amnt == null) {
                    tmp_amnt = 0;
                }
                var tmp = parseFloat(data1['used_amnt']) + parseFloat(tmp_amnt);
                var allocation = parseFloat(data1['alloc']);
                console.log('all' + allocation);
                console.log('used' + parseFloat(data1['used_amnt']));
                console.log('input' + parseFloat(tmp_amnt));
                console.log('total' + tmp);
                if (allocation >= tmp) {
                    if (f_err == false) {
                        $('#edit_course_btn').removeAttr('disabled');
                        document.getElementById('alloc-div-edit').innerText = '';
                        document.getElementById('expense1_eng').value = tmp_amnt;
                    }
                } else {
                    if (f_err == false) {
                        $('#edit_course_btn').prop('disabled', 'true');
                        document.getElementById('alloc-div-edit').innerText = 'দুঃখিত, প্রদানকৃত মোট খরচ, খাত এর জন্য বরাদ্দকৃত অর্থ কে অতিক্রম করেছে';
                    }

                }

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
                    document.getElementById('expnseERR').style.display = 'none';
                    document.getElementById('expnseDIV').style.display = 'block';


                    //$('#detailsExpense').innerHTML='';
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
        // $('#show_course_modal').modal('show');
    }

</script>
