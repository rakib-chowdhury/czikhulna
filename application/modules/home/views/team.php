<body>
<!-- Container -->
<div id="container">
    <?php $this->load->view('public_layout/header'); ?>

    <!-- content ================================================== -->
    <div id="content">

        <!-- Page Banner -->
        <div class="page-banner about-banner">
            <div class="container">
                <ul class="page-tree">
                    <li><a href="<?= site_url('home')?>">Czi Khulna</a></li>
                    <li><a href="<?= site_url('home/team')?>">আমাদের টিম</a></li>
                </ul>
            </div>
        </div>

        <h1 class="page-title about-title"><span style="background: #8bc541; color: whitesmoke;">আমাদের টিম</span></h1>

        <!-- member section -->
        <div class="members-section">
            <?php
            foreach ($team_info as $k => $team){
            if (sizeof($team['0']) != 0) { ?>
                <div class="title-section">
                    <div class="container triggerAnimation animated" data-animate="bounceIn">
                        <h1 style="text-align: left; font-weight: 900;"><?= $team['des_cat_name'] ?></h1>
                        <!--                        <p style="text-align: left">proin gravida nibh vel velit auctor aliquet aenean sollicitudin-->
                        <!--                            lorem</p>-->
                    </div>
                </div>
                <div class="container triggerAnimation animated" data-animate="fadeInUp">
                    <div class="row">
                        <?php
                        foreach ($team['0'] as $kk => $t) { ?>
                            <div class="col-md-3 col-sm-6 col-xs-12 col-lg-3">
                                <a style="text-decoration: none; cursor: pointer; " data-toggle="modal"
                                   data-target="#details_<?= $t['emp_id']?>">
                                    <div class="staff-post">
                                        <div class="staff-post-gal">
                                            <img style="width: 262px; height: 262px;" alt=""
                                                 src="<?= base_url() ?>/uploads/emp/<?= $t['emp_pic'] ?>">
                                        </div>
                                        <div class="staff-post-content" style="width: 262px; ">
                                            <h5><?= ucfirst($t['emp_name']) ?></h5>
                                            <span><?= ucfirst($t['emp_designation']) ?></span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        <?php }
                        ?>
                    </div>
                </div>
            <?php }
            ?>
        </div>
        <?php }
        ?>

    </div>
    <!-- End content -->
    <?php $this->load->view('public_layout/footer'); ?>
</div>
<!--                                team model -->
<?php
foreach ($team_info as $k => $team) {
    if (sizeof($team['0']) != 0) {
        foreach ($team['0'] as $kk => $t) { ?>
            <div class="modal fade" id="details_<?= $t['emp_id']?>" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close"
                                    data-dismiss="modal"></button>
                            <h4 style="text-align: center; font-weight: 600"
                                class="modal-title"><?= $t['emp_name'] ?></h4>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="form-group col-md-10 col-md-offset-1">
                                    <?= $t['emp_details'] ?>
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
        <?php }
    }
} ?>

<!-- sometime later, probably inside your on load event callback -->


<!-- End Container -->
<?php $this->load->view('public_layout/footerlink'); ?>

</body>
</html>
}