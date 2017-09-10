<?php $bn_digits = array('০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯'); ?>
<div class="container-fluid display-table">
    <div class="row display-table-row">
        <?php $this->load->view('layouts/sidebar-nav'); ?>
        <div class="col-md-10 display-table-cell" id="main-content">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-hover table-responsive">
                        <a href="<?= site_url('admin/courseDetailsPdf/' . $course_id) ?>">
                            <span style="padding-right:15px; padding-top:10px;" class="pull-right">পিডিএফ</span>
                        </a>
                        <br>
                        <?php if ($course_status == 1) { ?>
                            <!--<a href="<?php echo site_url('admin/new_trainee/' . $course_id); ?>">
                            <button class="btn btn-success">প্রশিক্ষণার্থী সংযোজন</button>
                        </a>-->
                        <?php } ?>
                        <hr>
                        
                        <table width="100%" align="center" border='0'>
                            <tr>
                                <td style="width:68%">কোর্স শিরোনাম : <?= $crseInfo[0]['c_name'] ?></td>
                                <td>মেয়াদ : <?= str_replace(range(0, 9), $bn_digits, $crseInfo[0]['run_days']) ?> দিন
                                </td>
                            </tr>
                            <tr>
                                <td>প্রশিক্ষণ বর্ষ
                                    : <?= str_replace(range(0, 9), $bn_digits, $crseInfo[0]['year']) ?></td>
                                <td>অর্থায়ন : <?= $crseInfo[0]['donor_name'] ?></td>
                            </tr>
                            <tr>
                                <td>কোর্স শুরুর তারিখ : <?php
                                    $tDAte = explode('-', $crseInfo[0]['start_date']);
                                    $TdAtE = $tDAte[2] . '-' . $tDAte[1] . '-' . $tDAte[0];
                                    echo str_replace(range(0, 9), $bn_digits, $TdAtE); ?>
                                </td>
                                <td>কোর্স সমাপ্তির তারিখ : <?php
                                    $tDAte = explode('-', $crseInfo[0]['end_date']);
                                    $TdAtE = $tDAte[2] . '-' . $tDAte[1] . '-' . $tDAte[0];
                                    echo str_replace(range(0, 9), $bn_digits, $TdAtE); ?>
                                </td>
                            </tr>
                            <tr>
                                <td>কোর্সের ধরণ : <?= $crseInfo[0]['course_class_name'] ?></td>
                                <td>প্রশিক্ষণার্থীর ধরণ : <?= $crseInfo[0]['class_name'] ?></span></td>
                            </tr>
                            <tr>
                                <td style="width:40%">প্রশিক্ষণার্থীর সংখ্যা মোট
                                    : <?= str_replace(range(0, 9), $bn_digits, $crseInfo[0]['total_student']) ?>
                                    <?php
                                    $man = 0;
                                    $women = 0;
                                    if (sizeof($typeofstudent) == 0) {
                                    } else {
                                        foreach ($typeofstudent as $key5 => $stu) {
                                            if ($stu['gender'] == 1) {
                                                $man = $stu['count'];
                                                //$women=$typeofstudent[1]['count'];
                                            } else {
                                                //$man=$typeofstudent[1]['count']; 
                                                $women = $stu['count'];
                                            }
                                        }

                                    }
                                    ?>
                                    (নারী : <?= str_replace(range(0, 9), $bn_digits, $women) ?>, পুরুষ
                                    : <?= str_replace(range(0, 9), $bn_digits, $man) ?>)
                                </td>
                                <td>গড় মূল্যায়ন
                                    : <?= str_replace(range(0, 9), $bn_digits, $get_avg_review[0]['avg']) ?></span></td>
                            </tr>
                        </table>
                        <br>
                        <!--                        <table id="org-emp-list-table" class="table table-striped table-bordered center"
                                                       cellspacing="0">-->
                        <table class="table table-striped table-bordered center"
                               cellspacing="0">
                            <thead>
                            <tr style="background:#14866f; color:white;">
                                <th style="text-align: center; width: 6%;">ক্রমিক নং</th>
                                <th style="text-align: center; ">প্রশিক্ষণার্থীর নাম</th>
                                <th style="text-align: center; width: 15%;">পদবী</th>
                                <th style="text-align: center; width: 25%;">অফিস/সমিতি</th>
                                <th style="text-align: center; width: 12%;">মোবাইল নং</th>
                                <th style="text-align: center; width: 20%;">ইমেইল</th>
                                <?php if ($course_status == 1) { ?>
                                    <th style="width:10%; text-align: center;">অ্যাকশন</th><?php } ?>
                            </tr>

                            </thead>
                            <tbody>
                            <?php $i = 1;
                            foreach ($trainee as $row) { ?>
                                <tr>
                                    <td style="text-align: center;">
                                        <?php
                                        echo str_replace(range(0, 9), $bn_digits, $i++);
                                        ?>
                                    </td>
                                    <td><?= $row['u_name']; ?></td>
                                    <td><?= $row['des_name']; ?></td>
                                    <td><?= $row['inst_name'].', '.$row['bn_div_name'].', '.$row['bn_dist_name'].', '.$row['bn_upz_name']; ?></td>
                                    <td style="text-align: center;"><?= str_replace(range(0, 9), $bn_digits, $row['mobile']); ?></td>
                                    <td><?= $row['email']; ?></td>

                                    <!--<td ><?= $row['office_name']; ?></td>-->
                                    <!--                                        <a onclick="remove_trainee(<?= $row['u_id']; ?>)">-->
                                    <?php if ($course_status == 1) { ?>
                                        <td style="text-align: center;">
                                            <a href="<?= site_url() . 'admin/add_trainee/' . $course_id . '/' . $row['u_id']; ?>">
                                            <span data-toggle="tooltip" data-placement="top" title="অপসারণ"
                                                  class="glyphicon glyphicon-remove"></span>
                                            </a>
                                        </td>
                                    <?php } ?>

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
        $('[data-toggle="tooltip"]').tooltip();
    });

    function remove_trainee(u_id) {

    }
</script>
