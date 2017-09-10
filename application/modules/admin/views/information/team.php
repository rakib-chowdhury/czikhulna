<?php $bn_digits = array('০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯'); ?>
<div class="container-fluid display-table">
    <div class="row display-table-row">
        <?php $this->load->view('layouts/sidebar-nav'); ?>
        <div class="col-md-10 display-table-cell" id="main-content">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-hover table-responsive">
                        <h2 style="text-align: center"><?= $page_title ?></h2>
                        <?php
                        if($this->session->flashdata('message')){ ?>
                            <p style="text-align: center; color: green;"><?= $this->session->flashdata('message')?></p>
                        <?php }
                        ?>
                        <br>
                        <a href="<?= site_url('admin/add_employee') ?>">
                            <button class="btn btn-success">টিম সংযোজন</button>
                        </a>

                        <hr>
                        <table id="emp-list" class="table table-striped table-bordered "
                               cellspacing="0">
                            <thead>
                            <tr>
                                <th style="text-align: center;">ক্রমিক</th>
                                <th style="text-align: center;">ছবি</th>
                                <th style="text-align: center;">সদস্যের নাম</th>
                                <th style="text-align: center;">সদস্যের ধরণ</th>
                                <th style="text-align: center;">সদস্যের পদবী</th>
                                <th style="text-align: center;">মোবাইল</th>
                                <th style="text-align: center;">বিস্তারিত</th>
                                <th style="text-align: center;">সদস্যের অবস্থা</th>
                                <th style="text-align: center;">অ্যাকশন</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($team_info as $i => $row) { ?>
                                <tr>
                                    <td style="text-align: center;">
                                        <?= str_replace(range(0, 9), $bn_digits, ($i + 1));
                                        ?>
                                    </td>
                                    <td style="text-align: center;">
                                        <img style="width: 50px; height: 50px;"
                                             src="<?= base_url() ?>/uploads/emp/<?= $row['emp_pic'] ?>" alt="">
                                    </td>
                                    <td><?= $row['emp_name'] ?></td>
                                    <td style="text-align: center;"><?= $row['des_cat_name'] ?></td>
                                    <td style="text-align: center;"><?= $row['emp_designation'] ?></td>
                                    <td style="text-align: center; width:10%;"><?= str_replace(range(0, 9), $bn_digits, $row['emp_phn']) ?></td>
                                    <td style="text-align: center;">
                                        <a style="cursor: pointer; text-decoration: none;" data-toggle="modal"
                                           data-target="#details_<?= $row['emp_id'] ?>">বিস্তারিত</a>
                                        <div class="modal fade" id="details_<?= $row['emp_id'] ?>" role="dialog">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close"
                                                                data-dismiss="modal"></button>
                                                        <h4 style="text-align: center; font-weight: 600"
                                                            class="modal-title"><?= $row['emp_name'] ?></h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="form-group col-md-10 col-md-offset-1">
                                                                <?= $row['emp_details'] ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger btn-raised"
                                                                data-dismiss="modal">বাতিল করুন
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td style="text-align: center; padding-top: 23px">
                                        <a href="<?= site_url('admin/employee_status_change/'.$row['emp_id'])?>">
                                            <?php
                                            if ($row['emp_status'] == 1) { ?>
                                                <span class="label label-success">Active</span>
                                            <?php } else { ?>
                                                <span class="label label-danger">Blocked</span>
                                            <?php }
                                            ?>
                                        </a>
                                    </td>
                                    <td style="text-align: center;">
                                        <a href="<?= site_url('admin/edit_employee') . '/' . $row['emp_id'] ?>"
                                           style="cursor: pointer;">
                                            <span data-toggle="tooltip" data-placement="top"
                                                  title="সদস্যের তথ্য সংশোধন" class="glyphicon glyphicon-edit"></span>
                                        </a>&nbsp;
                                        <a href="<?= site_url('admin/delete_employee') . '/' . $row['emp_id'] ?>"
                                           style="cursor: pointer; color: red">
                                            <span data-toggle="tooltip" data-placement="top"
                                                  title="সদস্য বাতিল" class="glyphicon glyphicon-trash"></span>
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
<!--Show course--->
<div class="modal animated fade" id="show_course_modal" role="dialog">
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
                            <td style="width: 15%; text-align: right; font-weight: 600;">প্রশিক্ষণার্থী সংখ্যা :
                            </td>
                            <td style="width: 20%"><span id="sCTN"></span></td>
                            <td style="width: 15%; text-align: right; font-weight: 600;">মোট খরচ :</td>
                            <td style="width: 20%"><span id="sCTE"></span></td>
                        </tr>
                    </table>
                    <div class="form-group col-md-12 col-md-offset-0">
                        <label for="expense" class="col-md-12 control-label" style="text-align: center">বিস্তারিত
                            বায় বিভাজন</label>
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

</script>
