<body>
<!-- Container -->
<div id="container">
    <?php $this->load->view('public_layout/header'); ?>

    <!-- content ================================================== -->
    <div id="content">
        <form onsubmit="return idea_ckeck()" action="<?= site_url('home/idea_box_post') ?>" method="post">
            <!-- Page Banner -->
            <div class="page-banner about-banner">
                <div class="container">
                    <ul class="page-tree">
                        <li><a href="<?= site_url('home') ?>">CZI KHULNA</a></li>
                        <li><a href="<?= site_url('home/idea_box') ?>">সকল মতামত</a></li>
                    </ul>
                </div>
            </div>

            <h1 class="page-title about-title"><span style="color: whitesmoke; background: #8bc541;">সকল মতামত</span>
            </h1>

            <!-- accord - skills with background image -->
            <div class="accord-skills white-back">
                <div class="title-section">
                    <div class="container triggerAnimation animated" data-animate="bounceIn">
                        <h1>সকল মতামত</h1>
                    </div>
                </div>


                <div class="accord-skills-container container">
                    <div class="row">
                        <div
                            class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-lg-10 col-lg-offset-1 col-xs-12">
                            <div class="accordion-box triggerAnimation animated" data-animate="fadeInLeft">
                                <?php
                                if (sizeof($idea) == 0) { ?>
<h3 style="text-align: center; color: red" >কোনো তথ্য নেই</h3>
                                <?php } else {
                                    foreach ($idea as $i) { ?>
                                        <div class="row">
                                            <div class="form-group" style="margin-bottom: 40px;">
                                                <h4><?= $i['idea_title'] ?></h4>
                                                <span><?= $i['name'] ?></span>
                                                <p style="margin-top: 30px;">
                                                    <?php
                                                    if (strlen($i['idea_issue']) <= 1000) {
                                                        echo $i['idea_issue'];
                                                    } else {
                                                        echo substr_replace($i['idea_issue'], " ", 1000);
                                                    }
                                                    ?>
                                                    <a data-toggle="modal"
                                                       data-target="#idea-issue_<?= $i['idea_id'] ?>"
                                                       class="btn btn-info">বিস্তারিত</a>
                                                </p>
                                            </div>
                                        </div>
                                    <?php }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!-- tempcore line -->
    <div class="tempcore-line triggerAnimation animated" data-animate="fadeIn">
        <div class="container">
            <a href="<?= site_url('home/idea_box') ?>">মতামত নিবন্ধন</a>
            <p><i class="fa fa-thumbs-up"></i> আঞ্চলিক সমবায় ইন্সটিটিউট খুলনা</p>
        </div>
    </div>
    <!-- End content -->
    <?php $this->load->view('public_layout/footer'); ?>
</div>

<?php
foreach ($idea as $i) { ?>
    <!--Show idea details--->
    <div class="modal fade" id="idea-issue_<?= $i['idea_id'] ?>" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"></button>
                    <h4 style="text-align: center; font-weight: 600" class="modal-title"><?= $i['name'] ?> এর
                        মতামত</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-md-12 col-md-offset-0">
                            <label for="expense" class="col-md-12 control-label"
                                   style="text-align: left">বিষয়:</label>
                            <p style="padding-left: 30px;"><span><?= $i['idea_title'] ?></span></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12 col-md-offset-0">
                            <label for="expense" class="col-md-12 control-label"
                                   style="text-align: left">মতামত:</label>
                            <p style="padding-left: 30px;"><span><?= $i['idea_issue'] ?></span></p>
                        </div>
                    </div>                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-raised" data-dismiss="modal">বাতিল করুন</button>
                </div>


            </div>
        </div>
    </div>
<?php }
?>

<!-- End Container -->
<?php $this->load->view('public_layout/footerlink'); ?>

</body>
</html>