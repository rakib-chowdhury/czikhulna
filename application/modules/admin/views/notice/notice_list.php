<?php $bn_digits = array('০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯'); ?>
<div class="container-fluid display-table">
    <div class="row display-table-row">
        <?php $this->load->view('layouts/sidebar-nav'); ?>
        <div class="col-md-10 display-table-cell" id="main-content">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-hover table-responsive">
                        <h2 style="text-align:center"><?= $page_title ?></h2>
                        <?php
                             if($this->session->flashdata('message')){ ?>
                                <p style="text-align: center; color: green; margin-top: 30px; font-size: 20px;"><?= $this->session->flashdata('message')?></p>
                        <?php }
                        ?>
                        <!--<div class="" style=" margin-left:5px;">
                            <a href="<?= site_url('admin/add_notice') ?>" class="btn btn-success">নোটিশ সংযোজন</a>
                        </div>-->
                        <hr>
                        <!--<div class="pull-right" style="margin-bottom: 5px;">
                            <a href="<?= site_url('admin/notice_pdf') ?>" class="btn btn-primary">প্রিন্ট/পিডিএফ</a>
                        </div>-->
                        <table id="emp-list" class="table table-striped table-bordered"
                               cellspacing="0">
                            <thead>
                            <tr>
                                <th style="text-align: center; width: 5%;">ক্রমিক নং</th>
                                <th style="text-align: center; width:15%">তারিখ</th>
                                <th style="text-align: center; ">নোটিশের বিষয়</th>                                
                            </tr>                            
                            </thead>
                            <tbody>
                            <?php
                            foreach ($all_notice as $i => $row) { ?>
                                <tr>
                                    <td style="text-align: center;"><?= str_replace(range(0, 9), $bn_digits, ($i + 1)) ?></td>
                                    <td style="text-align:center"><?php $ddd = explode(' ', $row['notice_date'])[0];
                                        $ddd = explode('-', $ddd);
                                        $dd = $ddd[2] . '-' . $ddd[1] . '-' . $ddd[0];
                                        echo str_replace(range(0, 9), $bn_digits, $dd);
                                        ?></td>
                                    <td><a href="<?= site_url('admin/notice_details/'.$row['notice_id'])?>"><?= $row['notice_title'] ?></a></td>
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