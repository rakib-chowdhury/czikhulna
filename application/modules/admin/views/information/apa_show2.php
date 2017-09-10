<?php $bn_digits = array('০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯'); ?>
<div class="container-fluid display-table">
    <div class="row display-table-row">
        <?php $this->load->view('layouts/sidebar-nav'); ?>
        <div class="col-md-10 display-table-cell" id="main-content">
            <div class="row">
                <div class="col-md-12">
                    <h2 align="center"><?= $page_title ?></h2>
                    <hr>
                    <form onsubmit="check_apa()" action="<?php site_url('admin/apa'); ?>" method="post">
                        <div class="row" style="margin-bottom: 30px;">
                            <div class="form-group">
                                <table align="center" class="col-md-6 col-md-offset-3" style="text-align: center">
                                    <tr>
                                        <td>বছর</td>
                                        <td style="">
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
                                        <td style="">
                                            <input onclick="search_btn()" type="button"
                                                   class="btn btn-primary"
                                                   value="অনুসন্ধান">
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="row" style="padding: 5px;">
                            <div class="form-group table-responsive">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th rowspan="2" style="text-align: center;">ক্রমিক নং</th>
                                        <th rowspan="2" style="text-align: center; width: 10%">বিষয়</th>
                                        <th colspan="3" style="text-align: center;">রাজস্ব</th>
                                        <th colspan="3" style="text-align: center;">সিডিএফ</th>
                                        <th colspan="3" style="text-align: center;">প্রকল্প/অন্যান্য</th>
                                    </tr>
                                    <tr>
                                        <th style="text-align: center;">লক্ষ্যমাত্রা</th>
                                        <th style="text-align: center;">অর্জন</th>
                                        <th style="text-align: center;">হার</th>
                                        <th style="text-align: center;">লক্ষ্যমাত্রা</th>
                                        <th style="text-align: center;">অর্জন</th>
                                        <th style="text-align: center;">হার</th>
                                        <th style="text-align: center;">লক্ষ্যমাত্রা</th>
                                        <th style="text-align: center;">অর্জন</th>
                                        <th style="text-align: center;">হার</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td style="text-align: center;">১</td>
                                        <td style="text-align: center;">মোট কোর্স সংখ্যা</td>
                                        <td>
                                            <input type="text" name="all_crs_rajosso_target" id="all_crs_rajosso_target"
                                                   class="form-control" required>
                                        </td>
                                        <td>
                                            <input type="text" name="all_crs_rajosso_achieve"
                                                   id="all_crs_rajosso_achieve" required
                                                   class="form-control">
                                        </td>
                                        <td>
                                            <input type="text" name="all_crs_rajosso_per" id="all_crs_rajosso_per"
                                                   class="form-control" required>
                                        </td>

                                        <td>
                                            <input type="text" name="all_crs_cdf_target" id="all_crs_cdf_target"
                                                   class="form-control" required>
                                        </td>
                                        <td>
                                            <input type="text" name="all_crs_cdf_achieve" required
                                                   id="all_crs_cdf_achieve" class="form-control">
                                        </td>
                                        <td>
                                            <input type="text" name="all_crs_cdf_per" id="all_crs_cdf_per"
                                                   class="form-control" required>
                                        </td>

                                        <td>
                                            <input type="text" name="all_crs_other_target" id="all_crs_other_target"
                                                   class="form-control" required>
                                        </td>
                                        <td>
                                            <input type="text" name="all_crs_other_achieve" id="all_crs_other_achieve"
                                                   class="form-control" required>
                                        </td>
                                        <td>
                                            <input type="text" name="all_crs_other_per" id="all_crs_other_per"
                                                   class="form-control" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: center;">২</td>
                                        <td style="text-align: center;">মোট প্রশিক্ষণার্থী সংখ্যা</td>
                                        <td>
                                            <input type="text" name="all_trainee_rajosso_target" required
                                                   id="all_trainee_rajosso_target" class="form-control">
                                        </td>
                                        <td>
                                            <input type="text" name="all_trainee_rajosso_achieve" required
                                                   id="all_trainee_rajosso_achieve" class="form-control">
                                        </td>
                                        <td>
                                            <input type="text" name="all_trainee_rajosso_per"
                                                   id="all_trainee_rajosso_per" required
                                                   class="form-control">
                                        </td>

                                        <td>
                                            <input type="text" name="all_trainee_cdf_target" id="all_trainee_cdf_target"
                                                   class="form-control" required>
                                        </td>
                                        <td>
                                            <input type="text" name="all_trainee_cdf_achieve"
                                                   id="all_trainee_cdf_achieve" required
                                                   class="form-control">
                                        </td>
                                        <td>
                                            <input type="text" name="all_trainee_cdf_per" id="all_trainee_cdf_per"
                                                   class="form-control" required>
                                        </td>

                                        <td>
                                            <input type="text" name="all_trainee_other_target"
                                                   id="all_trainee_other_target" required
                                                   class="form-control">
                                        </td>
                                        <td>
                                            <input type="text" name="all_trainee_other_achieve"  required
                                                   id="all_trainee_other_achieve" class="form-control">
                                        </td>
                                        <td>
                                            <input type="text" name="all_trainee_other_per" id="all_trainee_other_per"
                                                   class="form-control" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: center;">৩</td>
                                        <td colspan="10">প্রশিক্ষণার্থীর ধরণ</td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: center;"></td>
                                        <td style="text-align: center;">সরকারি কর্মচারী</td>
                                        <td>
                                            <input type="text" name="govt_rajosso_target" id="govt_rajosso_target"
                                                   class="form-control" required>
                                        </td>
                                        <td>
                                            <input type="text" name="govt_rajosso_achieve"
                                                   id="govt_rajosso_achieve"
                                                   class="form-control" required>
                                        </td>
                                        <td>
                                            <input type="text" name="govt_rajosso_per" id="govt_rajosso_per"
                                                   class="form-control" required>
                                        </td>

                                        <td>
                                            <input type="text" name="govt_cdf_target" id="govt_cdf_target"
                                                   class="form-control" required>
                                        </td>
                                        <td>
                                            <input type="text" name="govt_cdf_achieve" required
                                                   id="govt_cdf_achieve" class="form-control">
                                        </td>
                                        <td>
                                            <input type="text" name="govt_cdf_per" id="govt_cdf_per"
                                                   class="form-control" required>
                                        </td>

                                        <td>
                                            <input type="text" name="govt_other_target" id="govt_other_target"
                                                   class="form-control" required>
                                        </td>
                                        <td>
                                            <input type="text" name="govt_other_achieve" id="govt_other_achieve"
                                                   class="form-control" required>
                                        </td>
                                        <td>
                                            <input type="text" name="govt_other_per" id="govt_other_per"
                                                   class="form-control" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: center;"></td>
                                        <td style="text-align: center;">সমবায় সমিতির সদস্য</td>
                                        <td>
                                            <input type="text" name="somiti_rajosso_target" id="somiti_rajosso_target"
                                                   class="form-control" required>
                                        </td>
                                        <td>
                                            <input type="text" name="somiti_rajosso_achieve"
                                                   id="somiti_rajosso_achieve" required
                                                   class="form-control">
                                        </td>
                                        <td>
                                            <input type="text" name="somiti_rajosso_per" id="somiti_rajosso_per"
                                                   class="form-control" required>
                                        </td>

                                        <td>
                                            <input type="text" name="somiti_cdf_target" id="somiti_cdf_target"
                                                   class="form-control" required>
                                        </td>
                                        <td>
                                            <input type="text" name="somiti_cdf_achieve" required
                                                   id="somiti_cdf_achieve" class="form-control">
                                        </td>
                                        <td>
                                            <input type="text" name="somiti_cdf_per" id="somiti_cdf_per"
                                                   class="form-control" required>
                                        </td>

                                        <td>
                                            <input type="text" name="somiti_other_target" id="somiti_other_target"
                                                   class="form-control" required>
                                        </td>
                                        <td>
                                            <input type="text" name="somiti_other_achieve" id="somiti_other_achieve"
                                                   class="form-control" required>
                                        </td>
                                        <td>
                                            <input type="text" name="somiti_other_per" id="somiti_other_per"
                                                   class="form-control" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: center;"></td>
                                        <td style="text-align: center;">অন্যান্য</td>
                                        <td>
                                            <input type="text" name="other_rajosso_target" id="other_rajosso_target"
                                                   class="form-control" required>
                                        </td>
                                        <td>
                                            <input type="text" name="other_rajosso_achieve" class="form-control"
                                                   id="other_rajosso_achieve" required>
                                        </td>
                                        <td>
                                            <input type="text" name="other_rajosso_per" id="other_rajosso_per"
                                                   class="form-control" required>
                                        </td>

                                        <td>
                                            <input type="text" name="other_cdf_target" id="other_cdf_target"
                                                   class="form-control" required>
                                        </td>
                                        <td>
                                            <input type="text" name="other_cdf_achieve" required
                                                   id="other_cdf_achieve" class="form-control">
                                        </td>
                                        <td>
                                            <input type="text" name="other_cdf_per" id="other_cdf_per"
                                                   class="form-control" required>
                                        </td>

                                        <td>
                                            <input type="text" name="other_other_target" id="other_other_target"
                                                   class="form-control" required>
                                        </td>
                                        <td>
                                            <input type="text" name="other_other_achieve" id="other_other_achieve"
                                                   class="form-control" required>
                                        </td>
                                        <td>
                                            <input type="text" name="other_other_per" id="other_other_per"
                                                   class="form-control" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: center;">৪</td>
                                        <td colspan="10">প্রশিক্ষণের ধরণ</td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: center;"></td>
                                        <td style="text-align: center;">আইজিএ</td>
                                        <td>
                                            <input type="text" name="iga_rajosso_target" id="iga_rajosso_target"
                                                   class="form-control" required>
                                        </td>
                                        <td>
                                            <input type="text" name="iga_rajosso_achieve"
                                                   id="iga_rajosso_achieve" required
                                                   class="form-control">
                                        </td>
                                        <td>
                                            <input type="text" name="iga_rajosso_per" id="iga_rajosso_per"
                                                   class="form-control" required>
                                        </td>

                                        <td>
                                            <input type="text" name="iga_cdf_target" id="iga_cdf_target"
                                                   class="form-control" required>
                                        </td>
                                        <td>
                                            <input type="text" name="iga_cdf_achieve" required
                                                   id="iga_cdf_achieve" class="form-control">
                                        </td>
                                        <td>
                                            <input type="text" name="iga_cdf_per" id="iga_cdf_per"
                                                   class="form-control" required>
                                        </td>

                                        <td>
                                            <input type="text" name="iga_other_target" id="iga_other_target"
                                                   class="form-control" required>
                                        </td>
                                        <td>
                                            <input type="text" name="iga_other_achieve" id="iga_other_achieve"
                                                   class="form-control" required>
                                        </td>
                                        <td>
                                            <input type="text" name="iga_other_per" id="iga_other_per"
                                                   class="form-control" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: center;"></td>
                                        <td style="text-align: center;">মানব সম্পদ উন্নয়ন</td>
                                        <td>
                                            <input type="text" name="man_rajosso_target" id="man_rajosso_target"
                                                   class="form-control" required>
                                        </td>
                                        <td>
                                            <input type="text" name="man_rajosso_achieve"
                                                   id="man_rajosso_achieve"
                                                   class="form-control" required>
                                        </td>
                                        <td>
                                            <input type="text" name="man_rajosso_per" id="man_rajosso_per"
                                                   class="form-control" required>
                                        </td>

                                        <td>
                                            <input type="text" name="man_cdf_target" id="man_cdf_target"
                                                   class="form-control" required>
                                        </td>
                                        <td>
                                            <input type="text" name="man_cdf_acheve" required
                                                   id="man_cdf_achieve" class="form-control">
                                        </td>
                                        <td>
                                            <input type="text" name="man_cdf_per" id="man_cdf_per"
                                                   class="form-control" required>
                                        </td>

                                        <td>
                                            <input type="text" name="man_other_target" id="man_other_target"
                                                   class="form-control" required>
                                        </td>
                                        <td>
                                            <input type="text" name="man_other_achieve" id="man_other_achieve"
                                                   class="form-control" required>
                                        </td>
                                        <td>
                                            <input type="text" name="man_other_per" id="man_other_per"
                                                   class="form-control" required>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group" style="text-align: center">
                                <?php
                                if (sizeof($apa_info) == 0) { ?>
                                    <button type="submit" class="btn btn-success">সংযোজন করুন</button>
                                <?php } else { ?>
                                    <button type="submit" class="btn btn-success">আপডেট করুন</button>
                                <?php }
                                ?>
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

    $(document).ready(function () {
        $('[data-toggle="tooltip"]').tooltip();
    });

    function search_btn() {
        
    }

    function pdf_div(u_id) {
        document.getElementById('is_pdf').value = 1;
        document.getElementById('u_id').value = u_id;
        $('#all_course').submit();
    }

</script>
