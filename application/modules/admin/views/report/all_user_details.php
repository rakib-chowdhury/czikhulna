<?php $bn_digits = array('০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯'); ?>
<div class="container-fluid display-table">
    <div class="row display-table-row">
        <?php $this->load->view('layouts/sidebar-nav'); ?>
        <div class="col-md-10 display-table-cell" id="main-content">
            <div class="row">
                <div class="col-md-12">
                    <form id="all_course" action="<?php echo site_url('admin/all_user_details'); ?>" method="post">
                        <input type="hidden" name="is_pdf" id="is_pdf" value="0">
                        <input type="hidden" name="u_id" id="u_id" value="all">
                        <div class="panel panel-hover table-responsive">
                            <h2 align="center">প্রশিক্ষণার্থীর তথ্য/প্রোফাইল</h2>
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
                                        <td style="padding-left: 10px;">কর্মক্ষেত্র</td>
                                        <td style="width: 30%; padding-left: 10px;">
                                            <select name="office" id="office" class="form-control">
                                                <option <?php if ($inst == 'all') echo 'selected'; ?> value="all">
                                                    সকল
                                                </option>
                                                <?php foreach ($office as $o) { ?>
                                                    <option <?php if ($inst == $o['inst_id']) {
                                                        echo "selected";
                                                    } ?> value="<?= $o['inst_id']; ?>"><?= $o['inst_name']; ?>
                                                        <br><?= $o['bn_div_name'].', '.$o['bn_dist_name'].', '.$o['bn_upz_name']; ?></option>
                                                <?php } ?>
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
                                        <td style="padding-left: 10px;">
                                            <input onclick="search_btn()" type="button"
                                                   class="btn btn-primary"
                                                   value="অনুসন্ধান">
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <br>
                            <br>
                            <br>
                            <table id="" class="table data-table table-striped table-bordered"
                                   cellspacing="0">
                                <thead>
                                <tr>
                                    <th style="text-align: center;">ক্রমিক</th>
                                    <th style="text-align: center;">প্রশিক্ষণার্থীর নাম</th>
                                    <th style="text-align: center;">মোবাইল নম্বর</th>
                                    <th style="text-align: center;">কর্মক্ষেত্র</th>
                                    <th style="text-align: center;">কোর্সের নাম</th>
                                    <th style="text-align: center;">বর্ষ</th>
                                    <th style="text-align: center;">অ্যাকশন</th>
                                </tr>

                                </thead>
                                <tbody>
                                <?php $i = 1;
                                foreach ($user_info as $row) { ?>
                                    <tr>
                                        <td style="text-align: center;">
                                            <?php
                                            echo str_replace(range(0, 9), $bn_digits, $i++);
                                            ?>
                                        </td>
                                        <td style="text-align: center;">
                                            <?= $row['u_name']; ?>
                                        </td>
                                        <td style="text-align: center;"><?= $row['mobile']; ?></td>
                                        <td style="text-align: center;"><?= $row['inst_name'].', '.$row['bn_div_name'].', '.$row['bn_dist_name'].', '.$row['bn_upz_name']; ?></td>
                                        <td style="text-align: center;"><?= $row['c_name']; ?></td>
                                        <td style="text-align: center;"><?= str_replace(range(0,9),$bn_digits,$row['year']); ?></td>
                                        <td style="text-align: center;">
                                            <a href="<?= site_url()?>admin/user_pdf/<?= $row['u_id']; ?>"
                                               style="cursor: pointer;">
                                                <span data-toggle="tooltip" data-placement="top" title="পিডিএফ"
                                                      class="glyphicon glyphicon-download"></span>
                                            </a>
                                        </td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
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
        $('[data-toggle="tooltip"]').tooltip();
    });

    function search_btn() {
        document.getElementById('is_pdf').value = 0;
        document.getElementById('u_id').value = 'all';
        $('#all_course').submit();
    }

    function pdf_div(u_id) {
        //document.getElementById('is_pdf').value = 1;
        //document.getElementById('u_id').value = u_id;
        //$('#all_course').submit();
    }

</script>
