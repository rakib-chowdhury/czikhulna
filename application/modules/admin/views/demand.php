<?php $bn_digits = array('০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯'); ?>
<div class="container-fluid display-table">
    <div class="row display-table-row">
        <?php $this->load->view('layouts/sidebar-nav'); ?>
        <div class="col-md-10 display-table-cell" id="main-content">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-hover table-responsive">
                        <h2 style="text-align:center"><?= $page_title ?></h2>

                        <hr>
                        <div class="pull-right" style="margin-bottom: 5px;">
                            <a href="<?= site_url('admin/demand_pdf') ?>" class="btn btn-primary">প্রিন্ট/পিডিএফ</a>
                        </div>
                        <table id="emp-list" class="table table-striped table-bordered"
                               cellspacing="0">
                            <thead>
                            <tr>
                                <th rowspan="2" style="text-align: center; width: 5%;">ক্রমিক নং</th>
                                <th rowspan="2" style="text-align: center; ">নাম</th>
                                <th rowspan="2" style="text-align: center; ">পদবী</th>
                                <th rowspan="2" style="text-align: center; ">বাসা/সমিতি/অফিস ও ঠিকানা</th>
                                <th rowspan="2" style="text-align: center; ">মোবাইল নম্বর</th>
                                <th rowspan="2" style="text-align: center; ">ইমেইল</th>
                                <th colspan="3" style="text-align: center; ">নতুন প্রশিক্ষণ চাহিদার বিষয়</th>
                                <th colspan="2" style="text-align: center; ">কর্তৃপক্ষের সাড়া/গৃহীত ব্যবস্থা
                                </th>
                            </tr>
                            <tr>
                                <th style="text-align: center;  ">বিষয়</th>
                                <th style="text-align: center;">মেয়াদ</th>
                                <th style="text-align: center;">তারিখ</th>
                                <th style="text-align: center;">সাড়া</th>
                                <th style="text-align: center;">তারিখ</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($all_demand as $i => $row) { ?>
                                <tr>
                                    <td style="text-align: center;"><?= str_replace(range(0, 9), $bn_digits, ($i + 1)) ?></td>
                                    <td><?= $row['name'] ?></td>
                                    <td><?= $row['designation'] ?></td>
                                    <td><?= $row['address'] ?></td>
                                    <td><?= str_replace(range(0, 9), $bn_digits, $row['mobile']) ?></td>
                                    <td><?= $row['email'] ?></td>
                                    <td><?= $row['demand_details'] ?></td>
                                    <td><?= $row['demand_rundays'] ?></td>
                                    <td><?php $ddd = explode(' ', $row['demand_date'])[0];
                                        $ddd = explode('-', $ddd);
                                        $dd = $ddd[2] . '-' . $ddd[1] . '-' . $ddd[0];
                                        echo str_replace(range(0, 9), $bn_digits, $dd);
                                        ?></td>
                                    <?php
                                    if ($row['demand_reply'] == null) { ?>
                                        <td style="text-align: center;">
                                            <a style="cursor:pointer" data-toggle="modal"
                                               data-target="#replyModal_<?= $i?>" class="btn btn-success">রিপ্লাই</a>
                                        </td>
                                        <td></td>
                                    <?php } else { ?>
                                        <td><?= $row['demand_reply'] ?></td>
                                        <td><?php $ddd = explode(' ', $row['demand_reply_at'])[0];
                                            $ddd = explode('-', $ddd);
                                            $dd = $ddd[2] . '-' . $ddd[1] . '-' . $ddd[0];
                                            echo str_replace(range(0, 9), $bn_digits, $dd);
                                            ?></td>
                                    <?php }
                                    ?>
                                    <!-- Reply Modal -->
                                    <div id="replyModal_<?= $i?>" class="modal fade" role="dialog">
                                        <div class="modal-dialog">

                                            <!-- Modal content-->
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close"
                                                            data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title">কর্তৃপক্ষের সাড়া/গৃহীত ব্যবস্থা</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <form method="post" action="<?= site_url('admin/demand_reply') ?>"
                                                          style="margin:2px">
                                                        <input type="hidden" name="demand_id"
                                                               value="<?= $row['demand_id'] ?>">
                                                        <input type="hidden" name="idea_sender_email"
                                                               value="<?= $row['email'] ?>">
                                                        <div class="row">
                                                            <div class="form-group col-md-12">
                                                                <label class="label-control">কর্তৃপক্ষের
                                                                    রিপ্লাই</label>
                                                                <div class="">
                                                                        <textarea required name="reply" cols="68"
                                                                                  rows="5"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="form-group col-md-12"
                                                                 style="text-align: center">
                                                                <button type="submit" class="btn btn-success">
                                                                    রিপ্লাই
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default"
                                                            data-dismiss="modal">বাতিল করুন
                                                    </button>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
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

<?php $this->load->view('layouts/footer'); ?>
<script>
    $(document).ready(function () {
        /////////tooltip starts///////
        $('[data-toggle="tooltip"]').tooltip();
        //////////tooltip ends//////////
        $('#emp-list').DataTable({
            "bSort": false
        });
        $("#emp-list").css({"border-color": "#009688"});
        $("#emp-list tr").css({"border-color": "#009688"});
        $("#emp-list tr td").css({"border-color": "#009688"});

    });
</script>