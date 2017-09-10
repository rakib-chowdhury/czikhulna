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
                        <a href="<?= site_url('admin/new_elearning') ?>">
                            <button class="btn btn-success">ই-লার্নিং সংযোজন</button>
                        </a>

                        <hr>
                        <table id="emp-list" class="table table-striped table-bordered "
                               cellspacing="0">
                            <thead>
                            <tr>
                                <th style="text-align: center;">ক্রমিক</th>
                                <th style="text-align: center;">কোর্সের নাম</th>
                                <th style="text-align: center;">কোর্সের সিলেবাস</th>
                                <th style="text-align: center;">বিস্তারিত</th>
                                <th style="text-align: center;">ভিডিও</th>
                                <th style="text-align: center;">পাওয়ার পয়েন্ট</th>
                                <th style="text-align: center;">অবস্থা</th>
                                <th style="text-align: center;">অ্যাকশন</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($e_learning as $i => $row) { ?>
                                <tr>
                                    <td style="text-align: center;">
                                        <?= str_replace(range(0, 9), $bn_digits, ($i + 1));
                                        ?>
                                    </td>
                                    <td><?= $row['c_name'] ?></td>
                                    <td style="text-align: center;"><?= $row['syllabus'] ?></td>
                                    <td style="text-align: center;"><?= $row['details'] ?></td>
                                    <td style="text-align: center; width: 6%">
                                        <a style="cursor: pointer;" data-toggle="modal" data-target="#myVideo_<?= $i?>">ভিডিও দেখতে ক্লিক করুন</a>
                                        <!-- Modal -->
                                        <div id="myVideo_<?= $i?>" class="modal fade" role="dialog">
                                            <div class="modal-dialog">

                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        <h4 class="modal-title">ভিডিও</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div>
                                                            <?= $row['video']?>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </td>
                                    <td style="text-align: center; width: 6%">
                                        <a style="cursor: pointer;" data-toggle="modal" data-target="#myPpt_<?= $i?>">পাওয়ার পয়েন্ট দেখতে ক্লিক করুন</a>
                                        <!-- Modal -->
                                        <div id="myPpt_<?= $i?>" class="modal fade" role="dialog">
                                            <div class="modal-dialog">
                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        <h4 class="modal-title">পাওয়ার পয়েন্ট</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div>
                                                            <?php if($row['ppt']=='' || $row['ppt']==null){
                                                             echo 'কোনো তথ্য নেই';
                                                            }else{ ?>
                                                            <iframe src="http://docs.google.com/gview?url=http://www.czikhulna.com/uploads/e_learning/<?=$row['ppt']; ?>&embedded=true" style="width:550px; height:450px;" frameborder="0"></iframe> 
                                                            <?php }?>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </td>
                                    <td style="text-align: center; padding-top: 9px">
                                        <a href="<?= site_url('admin/elearning_status_change/'.$row['e_id'])?>">
                                            <?php
                                            if ($row['e_status'] == 1) { ?>
                                                <span class="label label-success">Active</span>
                                            <?php } else { ?>
                                                <span class="label label-danger">Blocked</span>
                                            <?php }
                                            ?>
                                        </a>
                                    </td>
                                    <td style="text-align: center; width: 6%">
<!--                                        <a href="--><?//= site_url('admin/edit_elearning') . '/' . $row['e_id'] ?><!--"-->
<!--                                           style="cursor: pointer;">-->
<!--                                            <span data-toggle="tooltip" data-placement="top"-->
<!--                                                  title="তথ্য সংশোধন" class="glyphicon glyphicon-edit"></span>-->
<!--                                        </a>&nbsp;-->
                                        <a href="<?= site_url('admin/delete_elearning') . '/' . $row['e_id'] ?>"
                                           style="cursor: pointer; color: red">
                                            <span data-toggle="tooltip" data-placement="top"
                                                  title="বাতিল" class="glyphicon glyphicon-trash"></span>
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
