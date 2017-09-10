<?php $bn_digits = array('০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯'); ?>
<div class="container-fluid display-table">
    <div class="row display-table-row">
        <?php $this->load->view('layouts/sidebar-nav'); ?>
        <div class="col-md-10 display-table-cell" id="main-content">
            <div class="row">
                <div class="col-md-12">
                    <form id="all_course" action="<?php site_url('admin/all_course_details'); ?>" method="post">
                        <input type="hidden" name="is_pdf" id="is_pdf" value="0">
                        <div class="panel panel-hover table-responsive">
                            <h2 align="center">প্রশিক্ষণার্থীর কোর্স মূল্যায়ন</h2>
                            <hr>
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
                                                        value="<?= $v; ?>"><?= str_replace(range(0,9),$bn_digits,$v); ?></option>
                                                    <?php $s_year++;
                                                } ?>
                                            </select>
                                        </td>
                                        <td style="padding-left: 10px;">কোর্স</td>
                                        <td style="width: 30%; padding-left: 10px;">
                                            <select name="course" id="course" class="form-control">
                                                <option <?php if ($crse == 'all') echo 'selected'; ?> value="all">
                                                    সকল
                                                </option>
                                                <?php foreach ($course as $c) { ?>
                                                    <option <?php if ($crse == $c['c_id']) {
                                                        echo "selected";
                                                    } ?> value="<?= $c['c_id']; ?>"><?= $c['c_name']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </td>
                                        <td style="padding-left: 10px;">প্রশিক্ষণার্থী</td>
                                        <td style="width: 30%; padding-left: 10px;">
                                            <select name="user" id="user" class="form-control">
                                                <option <?php if ($user == 'all') echo 'selected'; ?> value="all">
                                                    সকল
                                                </option>
                                                <?php foreach ($users as $u) { ?>
                                                    <option <?php if ($user == $u['id']) {
                                                        echo "selected";
                                                    } ?> value="<?= $u['id']; ?>"><?= $u['name']; ?></option>
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
                                <table style="border: solid; border-width: .5px; border-color: #1ab394"
                                       class="table table-striped table-bordered"
                                       cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th rowspan="2" style="text-align: center;">কোর্সের<br> ক্রমিক<br> নম্বর</th>
                                        <th rowspan="2" style="text-align: center;">প্রশিক্ষণ<br> কোর্সের<br> শিরোনাম
                                        </th>
                                        <th rowspan="2" style="text-align: center;">প্রশিক্ষণ<br> বর্ষ</th>
                                        <th rowspan="2" style="text-align: center;">অর্থায়ন</th>
                                        <th rowspan="2" style="text-align: center;">প্রশিক্ষণার্থী<br> ধরণ</th>
                                        <th rowspan="2" style="text-align: center;">কোর্সের<br> ধরণ</th>
                                        <th rowspan="2" style="text-align: center;">মেয়াদ</th>

                                        <th colspan="2" style="text-align: center;">অনুষ্ঠানের তারিখ</th>

                                        <th colspan="3" style="text-align: center;">প্রশিক্ষণার্থী সংখ্যা</th>

                                        <th colspan="4" style="text-align: center;">মূল্যায়ন</th>

                                        <th rowspan="2" style="text-align: center;">গড়</th>
                                    </tr>
                                    <tr>
                                        <th style="text-align: center;">হইতে</th>
                                        <th style="text-align: center;">পর্যন্ত</th>

                                        <th style="text-align: center;">পুরুষ</th>
                                        <th style="text-align: center;">নারী</th>
                                        <th style="text-align: center;">মোট</th>

                                        <th style="text-align: center;">ভাল নয়<br>৫০%></th>
                                        <th style="text-align: center;">ভাল<br>৫১%-<br>৬৫%</th>
                                        <th style="text-align: center;">খুব<br>ভাল<br>৬৬%-<br>৮০%</th>
                                        <th style="text-align: center;">অসাধারণ<br>৮১%-<br>১০০%</th>

                                    </tr>

                                    </thead>
                                    <tbody>
                                    <?php $i = 1;
                                    foreach ($course_review as $row) { ?>
                                        <tr
                                            <?php if ($row['start_date'] > date('Y-m-d')) {
                                                echo 'style="color:bd18bd"';
                                            }elseif ($row['start_date'] == date('Y-m-d') || ( ($row['start_date'] < date('Y-m-d')) && ($row['end_date'] > date('Y-m-d')) )) {
                                                echo 'style="color:green"';
                                            } ?> >
                                            <td style="text-align: center;">
                                                <?php
                                                echo str_replace(range(0, 9), $bn_digits, $i++);
                                                ?>
                                            </td>
                                            <td style="text-align: center;"><a
                                                    href="<?= site_url('admin/add_trainee/' . $row['c_id']) ?>"><?= $row['c_name']; ?></a>
                                            </td>
                                            <td style="text-align: center;"><?= str_replace(range(0, 9), $bn_digits, $row['year']); ?></td>
                                            <td style="text-align: center;"><?= $row['donor_name']; ?></td>
                                            <td style="text-align: center;"><?= str_replace(range(0, 9), $bn_digits, $row['class_name']); ?></td>
                                            <td style="text-align: center;"><?= $row['course_class_name']; ?></td>
                                            <td style="text-align: center;"><?= str_replace(range(0, 9), $bn_digits, $row['run_days']) . ' দিন'; ?></td>

                                            <td style="text-align: center;">
                                                <?php
                                                $tDAte = explode('-', $row['start_date']);
                                                $TdAtE = $tDAte[2] . '-' . $tDAte[1] . '-' . $tDAte[0];
                                                echo str_replace(range(0, 9), $bn_digits, $TdAtE); ?>
                                            </td>
                                            <td style="text-align: center;">
                                                <?php
                                                $tDAte = explode('-', $row['end_date']);
                                                $TdAtE = $tDAte[2] . '-' . $tDAte[1] . '-' . $tDAte[0];
                                                echo str_replace(range(0, 9), $bn_digits, $TdAtE); ?>
                                            </td>

                                            <td style="text-align: center;"><?php echo str_replace(range(0, 9), $bn_digits, $row['0']); ?></td>
                                            <td style="text-align: center;"><?php echo str_replace(range(0, 9), $bn_digits, $row['1']); ?></td>
                                            <td style="text-align: center;"><a
                                                    href="<?= site_url('admin/add_trainee/' . $row['c_id']) ?>"><?php echo str_replace(range(0, 9), $bn_digits, $row['total_student']); ?></a>
                                            </td>

                                            <td style="text-align: center;"><?php echo str_replace(range(0, 9), $bn_digits, $row['2']['not_good']); ?></td>
                                            <td style="text-align: center;"><?php echo str_replace(range(0, 9), $bn_digits, $row['2']['good']); ?></td>
                                            <td style="text-align: center;"><?php echo str_replace(range(0, 9), $bn_digits, $row['2']['very_good']); ?></td>
                                            <td style="text-align: center;"><?php echo str_replace(range(0, 9), $bn_digits, $row['2']['very_very_good']); ?></td>

                                            <td style="text-align: center;"><?php echo str_replace(range(0, 9), $bn_digits, $row['3']); ?></td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
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
        //$('#pdf_link').attr("href",'<?= site_url();?>/admin/'+tmp_year+'/'+tmp_donor);
    }

</script>
