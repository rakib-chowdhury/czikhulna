<?php $bn_digits = array('০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯'); ?>
<div class="container-fluid display-table">
    <div class="row display-table-row">
        <?php $this->load->view('layouts/sidebar-nav'); ?>
        <div class="col-md-10 display-table-cell" id="main-content">
            <div class="row">
                <div class="col-md-12">
                    <h2 align="center"><?= $page_title ?></h2>
                    <hr>
                    <?php
                    if ($this->session->flashdata('message')) { ?>
                        <p style="text-align: center; color:green;"><?= $this->session->flashdata('message') ?></p>
                    <?php }
                    ?>
                    <form onsubmit="check_apa()" action="<?= site_url('admin/apa_submit'); ?>" method="post">
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
                                <table id="apaTable" class="table table-bordered table-hover">
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
                                            <input type="text" name="all_crs[]" id="all_crs_rajosso_target"
                                                   class="form-control" onkeyup="checkAmount(this.id)"
                                                   onblur="checkAmount(this.id)" required>
                                        </td>
                                        <td>
                                            <input onkeyup="checkAmount(this.id)" onblur="checkAmount(this.id)"
                                                   type="text" name="all_crs[]"
                                                   id="all_crs_rajosso_achieve" required
                                                   class="form-control numCheck">
                                        </td>
                                        <td>
                                            <input onkeyup="checkAmount(this.id)" onblur="checkAmount(this.id)"
                                                   type="text" name="all_crs[]" id="all_crs_rajosso_per"
                                                   class="form-control" required>
                                        </td>

                                        <td>
                                            <input onkeyup="checkAmount(this.id)" onblur="checkAmount(this.id)"
                                                   type="text" name="all_crs[]" id="all_crs_cdf_target"
                                                   class="form-control" required>
                                        </td>
                                        <td>
                                            <input onkeyup="checkAmount(this.id)" onblur="checkAmount(this.id)"
                                                   type="text" name="all_crs[]" required
                                                   id="all_crs_cdf_achieve" class="form-control">
                                        </td>
                                        <td>
                                            <input onkeyup="checkAmount(this.id)" onblur="checkAmount(this.id)"
                                                   type="text" name="all_crs[]" id="all_crs_cdf_per"
                                                   class="form-control" required>
                                        </td>

                                        <td>
                                            <input onkeyup="checkAmount(this.id)" onblur="checkAmount(this.id)"
                                                   type="text" name="all_crs[]" id="all_crs_other_target"
                                                   class="form-control" required>
                                        </td>
                                        <td>
                                            <input onkeyup="checkAmount(this.id)" onblur="checkAmount(this.id)"
                                                   type="text" name="all_crs[]" id="all_crs_other_achieve"
                                                   class="form-control" required>
                                        </td>
                                        <td>
                                            <input onkeyup="checkAmount(this.id)" onblur="checkAmount(this.id)"
                                                   type="text" name="all_crs[]" id="all_crs_other_per"
                                                   class="form-control" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: center;">২</td>
                                        <td style="text-align: center;">মোট প্রশিক্ষণার্থী সংখ্যা</td>
                                        <td>
                                            <input onkeyup="checkAmount(this.id)" onblur="checkAmount(this.id)"
                                                   type="text" name="all_trainee[]" required
                                                   id="all_trainee_rajosso_target" class="form-control">
                                        </td>
                                        <td>
                                            <input onkeyup="checkAmount(this.id)" onblur="checkAmount(this.id)"
                                                   type="text" name="all_trainee[]" required
                                                   id="all_trainee_rajosso_achieve" class="form-control">
                                        </td>
                                        <td>
                                            <input onkeyup="checkAmount(this.id)" onblur="checkAmount(this.id)"
                                                   type="text" name="all_trainee[]"
                                                   id="all_trainee_rajosso_per" required
                                                   class="form-control">
                                        </td>

                                        <td>
                                            <input onkeyup="checkAmount(this.id)" onblur="checkAmount(this.id)"
                                                   type="text" name="all_trainee[]" id="all_trainee_cdf_target"
                                                   class="form-control" required>
                                        </td>
                                        <td>
                                            <input onkeyup="checkAmount(this.id)" onblur="checkAmount(this.id)"
                                                   type="text" name="all_trainee[]"
                                                   id="all_trainee_cdf_achieve" required
                                                   class="form-control">
                                        </td>
                                        <td>
                                            <input onkeyup="checkAmount(this.id)" onblur="checkAmount(this.id)"
                                                   type="text" name="all_trainee[]" id="all_trainee_cdf_per"
                                                   class="form-control" required>
                                        </td>

                                        <td>
                                            <input onkeyup="checkAmount(this.id)" onblur="checkAmount(this.id)"
                                                   type="text" name="all_trainee[]"
                                                   id="all_trainee_other_target" required
                                                   class="form-control">
                                        </td>
                                        <td>
                                            <input onkeyup="checkAmount(this.id)" onblur="checkAmount(this.id)"
                                                   type="text" name="all_trainee[]" required
                                                   id="all_trainee_other_achieve" class="form-control">
                                        </td>
                                        <td>
                                            <input onkeyup="checkAmount(this.id)" onblur="checkAmount(this.id)"
                                                   type="text" name="all_trainee[]" id="all_trainee_other_per"
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
                                            <input onkeyup="checkAmount(this.id)" onblur="checkAmount(this.id)"
                                                   type="text" name="govt[]" id="govt_rajosso_target"
                                                   class="form-control" required>
                                        </td>
                                        <td>
                                            <input onkeyup="checkAmount(this.id)" onblur="checkAmount(this.id)"
                                                   type="text" name="govt[]"
                                                   id="govt_rajosso_achieve"
                                                   class="form-control" required>
                                        </td>
                                        <td>
                                            <input onkeyup="checkAmount(this.id)" onblur="checkAmount(this.id)"
                                                   type="text" name="govt[]" id="govt_rajosso_per"
                                                   class="form-control" required>
                                        </td>

                                        <td>
                                            <input onkeyup="checkAmount(this.id)" onblur="checkAmount(this.id)"
                                                   type="text" name="govt[]" id="govt_cdf_target"
                                                   class="form-control" required>
                                        </td>
                                        <td>
                                            <input onkeyup="checkAmount(this.id)" onblur="checkAmount(this.id)"
                                                   type="text" name="govt[]" required
                                                   id="govt_cdf_achieve" class="form-control">
                                        </td>
                                        <td>
                                            <input onkeyup="checkAmount(this.id)" onblur="checkAmount(this.id)"
                                                   type="text" name="govt[]" id="govt_cdf_per"
                                                   class="form-control" required>
                                        </td>

                                        <td>
                                            <input onkeyup="checkAmount(this.id)" onblur="checkAmount(this.id)"
                                                   type="text" name="govt[]" id="govt_other_target"
                                                   class="form-control" required>
                                        </td>
                                        <td>
                                            <input onkeyup="checkAmount(this.id)" onblur="checkAmount(this.id)"
                                                   type="text" name="govt[]" id="govt_other_achieve"
                                                   class="form-control" required>
                                        </td>
                                        <td>
                                            <input onkeyup="checkAmount(this.id)" onblur="checkAmount(this.id)"
                                                   type="text" name="govt[]" id="govt_other_per"
                                                   class="form-control" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: center;"></td>
                                        <td style="text-align: center;">সমবায় সমিতির সদস্য</td>
                                        <td>
                                            <input onkeyup="checkAmount(this.id)" onblur="checkAmount(this.id)"
                                                   type="text" name="somiti[]" id="somiti_rajosso_target"
                                                   class="form-control" required>
                                        </td>
                                        <td>
                                            <input onkeyup="checkAmount(this.id)" onblur="checkAmount(this.id)"
                                                   type="text" name="somiti[]"
                                                   id="somiti_rajosso_achieve" required
                                                   class="form-control">
                                        </td>
                                        <td>
                                            <input onkeyup="checkAmount(this.id)" onblur="checkAmount(this.id)"
                                                   type="text" name="somiti[]" id="somiti_rajosso_per"
                                                   class="form-control" required>
                                        </td>

                                        <td>
                                            <input onkeyup="checkAmount(this.id)" onblur="checkAmount(this.id)"
                                                   type="text" name="somiti[]" id="somiti_cdf_target"
                                                   class="form-control" required>
                                        </td>
                                        <td>
                                            <input onkeyup="checkAmount(this.id)" onblur="checkAmount(this.id)"
                                                   type="text" name="somiti[]" required
                                                   id="somiti_cdf_achieve" class="form-control">
                                        </td>
                                        <td>
                                            <input onkeyup="checkAmount(this.id)" onblur="checkAmount(this.id)"
                                                   type="text" name="somiti[]" id="somiti_cdf_per"
                                                   class="form-control" required>
                                        </td>

                                        <td>
                                            <input onkeyup="checkAmount(this.id)" onblur="checkAmount(this.id)"
                                                   type="text" name="somiti[]" id="somiti_other_target"
                                                   class="form-control" required>
                                        </td>
                                        <td>
                                            <input onkeyup="checkAmount(this.id)" onblur="checkAmount(this.id)"
                                                   type="text" name="somiti[]" id="somiti_other_achieve"
                                                   class="form-control" required>
                                        </td>
                                        <td>
                                            <input onkeyup="checkAmount(this.id)" onblur="checkAmount(this.id)"
                                                   type="text" name="somiti[]" id="somiti_other_per"
                                                   class="form-control" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: center;"></td>
                                        <td style="text-align: center;">অন্যান্য</td>
                                        <td>
                                            <input onkeyup="checkAmount(this.id)" onblur="checkAmount(this.id)"
                                                   type="text" name="other[]" id="other_rajosso_target"
                                                   class="form-control" required>
                                        </td>
                                        <td>
                                            <input onkeyup="checkAmount(this.id)" onblur="checkAmount(this.id)"
                                                   type="text" name="other[]" class="form-control"
                                                   id="other_rajosso_achieve" required>
                                        </td>
                                        <td>
                                            <input onkeyup="checkAmount(this.id)" onblur="checkAmount(this.id)"
                                                   type="text" name="other[]" id="other_rajosso_per"
                                                   class="form-control" required>
                                        </td>

                                        <td>
                                            <input onkeyup="checkAmount(this.id)" onblur="checkAmount(this.id)"
                                                   type="text" name="other[]" id="other_cdf_target"
                                                   class="form-control" required>
                                        </td>
                                        <td>
                                            <input onkeyup="checkAmount(this.id)" onblur="checkAmount(this.id)"
                                                   type="text" name="other[]" required
                                                   id="other_cdf_achieve" class="form-control">
                                        </td>
                                        <td>
                                            <input onkeyup="checkAmount(this.id)" onblur="checkAmount(this.id)"
                                                   type="text" name="other[]" id="other_cdf_per"
                                                   class="form-control" required>
                                        </td>

                                        <td>
                                            <input onkeyup="checkAmount(this.id)" onblur="checkAmount(this.id)"
                                                   type="text" name="other[]" id="other_other_target"
                                                   class="form-control" required>
                                        </td>
                                        <td>
                                            <input onkeyup="checkAmount(this.id)" onblur="checkAmount(this.id)"
                                                   type="text" name="other[]" id="other_other_achieve"
                                                   class="form-control" required>
                                        </td>
                                        <td>
                                            <input onkeyup="checkAmount(this.id)" onblur="checkAmount(this.id)"
                                                   type="text" name="other[]" id="other_other_per"
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
                                            <input onkeyup="checkAmount(this.id)" onblur="checkAmount(this.id)"
                                                   type="text" name="iga[]" id="iga_rajosso_target"
                                                   class="form-control" required>
                                        </td>
                                        <td>
                                            <input onkeyup="checkAmount(this.id)" onblur="checkAmount(this.id)"
                                                   type="text" name="iga[]"
                                                   id="iga_rajosso_achieve" required
                                                   class="form-control">
                                        </td>
                                        <td>
                                            <input onkeyup="checkAmount(this.id)" onblur="checkAmount(this.id)"
                                                   type="text" name="iga[]" id="iga_rajosso_per"
                                                   class="form-control" required>
                                        </td>

                                        <td>
                                            <input onkeyup="checkAmount(this.id)" onblur="checkAmount(this.id)"
                                                   type="text" name="iga[]" id="iga_cdf_target"
                                                   class="form-control" required>
                                        </td>
                                        <td>
                                            <input onkeyup="checkAmount(this.id)" onblur="checkAmount(this.id)"
                                                   type="text" name="iga[]" required
                                                   id="iga_cdf_achieve" class="form-control">
                                        </td>
                                        <td>
                                            <input onkeyup="checkAmount(this.id)" onblur="checkAmount(this.id)"
                                                   type="text" name="iga[]" id="iga_cdf_per"
                                                   class="form-control" required>
                                        </td>

                                        <td>
                                            <input onkeyup="checkAmount(this.id)" onblur="checkAmount(this.id)"
                                                   type="text" name="iga[]" id="iga_other_target"
                                                   class="form-control" required>
                                        </td>
                                        <td>
                                            <input onkeyup="checkAmount(this.id)" onblur="checkAmount(this.id)"
                                                   type="text" name="iga[]" id="iga_other_achieve"
                                                   class="form-control" required>
                                        </td>
                                        <td>
                                            <input onkeyup="checkAmount(this.id)" onblur="checkAmount(this.id)"
                                                   type="text" name="iga[]" id="iga_other_per"
                                                   class="form-control" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: center;"></td>
                                        <td style="text-align: center;">মানব সম্পদ উন্নয়ন</td>
                                        <td>
                                            <input onkeyup="checkAmount(this.id)" onblur="checkAmount(this.id)"
                                                   type="text" name="man[]" id="man_rajosso_target"
                                                   class="form-control" required>
                                        </td>
                                        <td>
                                            <input onkeyup="checkAmount(this.id)" onblur="checkAmount(this.id)"
                                                   type="text" name="man[]"
                                                   id="man_rajosso_achieve"
                                                   class="form-control" required>
                                        </td>
                                        <td>
                                            <input onkeyup="checkAmount(this.id)" onblur="checkAmount(this.id)"
                                                   type="text" name="man[]" id="man_rajosso_per"
                                                   class="form-control" required>
                                        </td>

                                        <td>
                                            <input onkeyup="checkAmount(this.id)" onblur="checkAmount(this.id)"
                                                   type="text" name="man[]" id="man_cdf_target"
                                                   class="form-control" required>
                                        </td>
                                        <td>
                                            <input onkeyup="checkAmount(this.id)" onblur="checkAmount(this.id)"
                                                   type="text" name="man[]" required
                                                   id="man_cdf_achieve" class="form-control">
                                        </td>
                                        <td>
                                            <input onkeyup="checkAmount(this.id)" onblur="checkAmount(this.id)"
                                                   type="text" name="man[]" id="man_cdf_per"
                                                   class="form-control" required>
                                        </td>

                                        <td>
                                            <input onkeyup="checkAmount(this.id)" onblur="checkAmount(this.id)"
                                                   type="text" name="man[]" id="man_other_target"
                                                   class="form-control" required>
                                        </td>
                                        <td>
                                            <input onkeyup="checkAmount(this.id)" onblur="checkAmount(this.id)"
                                                   type="text" name="man[]" id="man_other_achieve"
                                                   class="form-control" required>
                                        </td>
                                        <td>
                                            <input onkeyup="checkAmount(this.id)" onblur="checkAmount(this.id)"
                                                   type="text" name="man[]" id="man_other_per"
                                                   class="form-control" required>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group" style="text-align: center" id="div-btn">
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
    function checkAmount(id) {
        var tmp_num = $('#' + id).val().getDigitEnglishFromBangla();
        if (tmp_num == null || tmp_num <= 0 || isNaN(tmp_num)) {
            var x = document.getElementById(id);
            x.value = x.value.replace(/[^0-9.]/, '');
        }
    }

    $(document).ready(function () {
        search_btn();
        $('[data-toggle="tooltip"]').tooltip();
    });

    function check_apa() {
        return true;
    }

    function search_btn() {
        var year = $('#year').val();

        $.ajax({
            type: 'POST',
            url: '<?= site_url()?>admin/getApaVal',
            data: {
                year: year
            }, success: function (res) {
                var data = $.parseJSON(res);

                if(data['res'].length==null || data['res'].length==0){
                    console.log(data.length+'if');
                    $('#apaTable').find('input').each(function (i, v) {
                        this.value ='';
                    });

                    document.getElementById('div-btn').innerHTML='';
                    $('#div-btn').append('<button type="submit" name="submit" value="add" class="btn btn-success">সংযোজন করুন </button>');
                }else{
                    console.log(data['res'].length+'elae');
                    $('#apaTable').find('input').each(function (i, v) {
                        this.value = (data['res'][i]['apa_value']+'').getDigitBanglaFromEnglish();
                    });
                    document.getElementById('div-btn').innerHTML='';
                    $('#div-btn').append('<button type="submit" name="submit" value="update" class="btn btn-success">আপডেট করুন </button>');
                }
            }
        });
    }

    function pdf_div(u_id) {
//        document.getElementById('is_pdf').value = 1;
//        document.getElementById('u_id').value = u_id;
//        $('#all_course').submit();
    }

</script>
