<?php $bn_digits = array('০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯'); ?>
<div class="container-fluid display-table">
    <div class="row display-table-row">
        <?php $this->load->view('layouts/sidebar-nav'); ?>
        <div class="col-md-10 display-table-cell" id="main-content">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-hover table-responsive">
                        <h2>কোর্স মূল্যায়ন</h2>
                        
                        <hr>
                        <table id="emp-list" class="table table-striped table-bordered"
                               cellspacing="0">
                            <thead>
                            <tr>
                                <th  rowspan="2" style="text-align: center;">ক্রমিক</th>
                                <th  rowspan="2" style="text-align: center;">প্রশিক্ষণ কোর্স শিরোনাম</th>
                                <th  rowspan="2" style="text-align: center;">কোর্স এর মেয়াদ</th>
                                <th  colspan="3" style="text-align: center;">অনুষ্ঠানের তারিখ</th>
                                <th  rowspan="2" style="text-align: center;">প্রশিক্ষণার্থী সংখ্যা</th>
                                <th  rowspan="2" style="text-align: center;">গড় মূল্যায়ন</th>
                                <th  rowspan="2" style="text-align: center;">কোর্সের অবস্থা</th>
                                <th  rowspan="2" style="text-align: center;">অ্যাকশন</th>
                            </tr>
                            <tr>
                                <th style="text-align: center;">হইতে</th>
                                <th style="text-align: center;">পর্যন্ত</th>
                                <th style="width: 0px; padding: 0px !important; margin: 0px !important;"></th>
                            </tr>

                            </thead>
                            <tbody>
                            <?php $i = 1;
                            foreach ($course_review as $row) { ?>
                                <tr>
                                    <td style="text-align: center;">
                                        <?php
                                        echo str_replace(range(0, 9), $bn_digits, $i++);
                                        ?>
                                    </td>
                                    <td style="text-align: center;">
                                       <a href="<?= site_url('admin/add_trainee/' . $row['c_id']); ?>"
                                               style="cursor: pointer;">
                                                <?= $row['c_name']; ?>
                                            </a>
                                    </td>
                                    <td style="text-align: center;"><?= str_replace(range(0, 9), $bn_digits, $row['run_days']) . ' দিন'; ?></td>
                                    <td style="text-align: center;">
                                        <?php
                                        $tDAte = explode('-', $row['start_date']);
                                        echo str_replace(range(0, 9), $bn_digits, $tDAte[2]) . '-';
                                        echo str_replace(range(0, 9), $bn_digits, $tDAte[1]) . '-';
                                        echo str_replace(range(0, 9), $bn_digits, $tDAte[0]) . ' ';
                                        ?></td>
                                    <td style="text-align: center;"><?php
                                        $tDAte = explode('-', $row['end_date']);
                                        echo str_replace(range(0, 9), $bn_digits, $tDAte[2]) . '-';
                                        echo str_replace(range(0, 9), $bn_digits, $tDAte[1]) . '-';
                                        echo str_replace(range(0, 9), $bn_digits, $tDAte[0]) . ' ';
                                        ?>
                                    </td>
                                    <td style="width: 0px; padding: 0px !important; margin: 0px !important;"></td>
                                    <td style="text-align: center;"><?php echo str_replace(range(0, 9), $bn_digits, $row['total_student']); ?></td>
                                    <td style="text-align: center;"><?= str_replace(range(0, 9), $bn_digits, $row['0']); ?></td>
                                    <td style="text-align: center;">
                                        <?php
                                        $stts = $row['course_status'];
                                        if ($stts == 1) {
                                            echo 'সম্পাদনযোগ্য';
                                        } elseif ($stts == 2) {
                                            echo 'সম্পাদিত';
                                        } else {
                                            echo $stts;
                                        }
                                        ?>
                                    </td>
                                    <td style="text-align: center;">
                                        <a style="cursor: pointer" onclick="show_review(<?= $row['c_id'] ?>,'<?= $row['0'];?>')">
                                            <span data-toggle="tooltip" data-placement="top" title="মূল্যায়ন"
                                                  class="glyphicon glyphicon-eye-open"></span>
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

<div class="modal fade" id="review_modal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"></button>
                <h4 style="text-align: center;" class="modal-title" id="modal_title">
                      <span style="font-weight:700">প্রশিক্ষণার্থীর কোর্স মূল্যায়ন প্রতিবেদন</span>                      
                </h4>
            </div>
            <div class="modal-body">
                <table width="100%">
                    <tr>
                        <td style="text-align:right; padding-right:10px;"><a id="cmmnt_pdf">পিডিএফ</a></td>
                    </tr>
                </table>
                <table width="100%" style="font-size:12px;">
                     <tr>
                        <td style="width:54%" >কোর্স শিরোনাম : <span id="courseI"></span></td>
                        <td >মেয়াদ : <span id="meyadI"></span></td>
                     </tr>
                     <tr>
                        <td >প্রশিক্ষণ বর্ষ : <span id="borsoI"></span></td>
                        <td >অর্থায়ন : <span id="orthayonI"></span></td>
                     </tr>
                     <tr>
                        <td >কোর্স শুরুর তারিখ : <span id="startI"></span></td>
                        <td >কোর্স সমাপ্তির তারিখ : <span id="endI"></span></td>
                     </tr>
                     <tr>
                        <td >কোর্সের ধরণ : <span id="crseTypeI"></span></td>
                        <td >প্রশিক্ষণার্থীর ধরণ : <span id="podobiI"></span></td>
                     </tr>
                     <tr>
                        <td>প্রশিক্ষণার্থীর সংখ্যা মোট : <span id="studentI"></span>
                        (নারী : <span id="womenI"></span>, পুরুষ : <span id="manI"></span>)
                        </td>
                        <td>গড় মূল্যায়ন : <span id="reviewI"></span></td>
                     </tr>
                     
                </table>
                <table id="review_table" class="table table-bordered" width="100%" style="font-size:12px;">
                    <tr>
                        <th style="text-align: center; width: 5%;">ক্রমিক নং</th>
                        <th style="text-align: center; width: 25%;;">প্রশিক্ষণার্থীর নাম</th>
                        <th style="text-align: center; width: 10%;">মোবাইল নং</th>
                        <th style="text-align: center; width: 12%;">মূল্যায়ন নম্বর<br>(পূর্ণ নম্বর ১০০)</th>
                        <th style="text-align: center">মন্তব্য/পরামর্শ</th>
                    </tr>
                </table>
                <div style="text-align:center">
                   <span>(প্রতিবেদনটি সফটওয়্যারে স্বয়ংক্রিয়ভাবে প্রস্তুতকৃত)</span><br>
                      <span style="font-weight:700">প্রতিবেদন জেনারেট হওয়ার তারিখ: <?= str_replace(range(0,9),$bn_digits,date('d-m-Y'))?></span>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-danger btn-raised">ক্লোস</button>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('layouts/footer'); ?>

<script>

    $(document).ready(function () {
        $('[data-toggle="tooltip"]').tooltip();
        $('#emp-list').DataTable({
            "bSort": false
        });
    });

    function show_review(c_id,rvw) {
       // document.getElementById('modal_title').innerText = name +' প্রশিক্ষণের মূল্যায়ন';
        $.ajax({
            type: 'post',
            url: '<?= site_url("admin/get_review_info");?>',
            data: {
                id: c_id
            }, success: function (data) {
                //console.log(data);
                data1 = $.parseJSON(data);
                
                $('#cmmnt_pdf').attr("href","<?php echo site_url().'admin/review_comment/';?>"+c_id);
                $('#courseI').text(data1['crseInfo'][0]['c_name']);
                $('#meyadI').text(data1['crseInfo'][0]['run_days'].getDigitBanglaFromEnglish()+' দিন');
                $('#crseTypeI').text(data1['crseInfo'][0]['course_class_name'].getDigitBanglaFromEnglish());
                $('#borsoI').text(data1['crseInfo'][0]['year'].getDigitBanglaFromEnglish());
                $('#orthayonI').text(data1['crseInfo'][0]['donor_name']);

                var tDaTe=data1['crseInfo'][0]['start_date'].split('-');
                var TdAtE=tDaTe[2]+'-'+tDaTe[1]+'-'+tDaTe[0];
                $('#startI').text(TdAtE.getDigitBanglaFromEnglish());

                var tDaTe=data1['crseInfo'][0]['end_date'].split('-');
                var TdAtE=tDaTe[2]+'-'+tDaTe[1]+'-'+tDaTe[0];
                $('#endI').text(TdAtE.getDigitBanglaFromEnglish());

                $('#studentI').text(data1['crseInfo'][0]['total_student'].getDigitBanglaFromEnglish());
                $('#reviewI').text(rvw.getDigitBanglaFromEnglish());
                $('#podobiI').text(data1['crseInfo'][0]['class_name']);
                var man=0; var women=0;
                $.each(data1['typeofstudent'],function(i,v){
                    if(v['gender']=='1'){
                       man=v['count'];
                       //women=data1['typeofstudent'][1]['count'];
                    }else{
                       //man=data1['typeofstudent'][1]['count'];
                       women=v['count'];
                    }     
                });
                
                $('#manI').text((man+'').getDigitBanglaFromEnglish());
                $('#womenI').text((women+'').getDigitBanglaFromEnglish());
                //$('#courseI').text(data1['crseInfo'][0]['name']);

                $('#review_table tr:gt(0)').remove();
                $.each(data1['res'], function (index, value) {
                    var tr_val = '<tr>'
                        + '<td style="text-align: center; width:5%;">'
                        + ((index+1)+'').getDigitBanglaFromEnglish()
                        + '</td>'
                        + '<td style="text-align: left; width: 25%;">'
                        + value['name']
                        + '</td>'
                        + '<td style="text-align: left; width: 10%;">'
                        + value['mobile'].getDigitBanglaFromEnglish()
                        + '</td>'
                        + '<td style="text-align: center; width:12%;">'
                        + value['review'].getDigitBanglaFromEnglish()
                        + '</td>'
                        + '<td>'
                        + value['comment']
                        + '</td>'
                        + '</tr>';
                    $('#review_table').append(tr_val);
                });
                $('#review_modal').modal('show');
            }
        });
    }
</script>
