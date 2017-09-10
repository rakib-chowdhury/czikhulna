<?php $bn_digits = array('০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯'); ?>
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
                        <li><a href="<?= site_url('home/elearning_list') ?>">ই-লার্নিং</a></li>
                    </ul>
                </div>
            </div>

<!--            <h1 class="page-title about-title"><span style="color: whitesmoke; background: #8bc541;">ই-লার্নিং</span>-->
<!--            </h1>-->
            <h1 class="page-title about-title"><span style="color: whitesmoke; background: #8bc541;">ই-লার্নিং এ আপনাকে স্বাগতম</span>
            </h1>

            <!-- accord - skills with background image -->
            <div class="accord-skills white-back">
                <div class="title-section">
                    <div class="container triggerAnimation animated" data-animate="bounceIn">
<!--                        <h1>ই-লার্নিং এ আপনাকে স্বাগতম</h1>-->
                        <h1>প্রশিক্ষণ কোর্সের ই-লার্নিং ম্যানুয়াল দেখতে কোর্স পছন্দ করুন</h1>
                    </div>
                </div>


                <div class="accord-skills-container container">
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-lg-10 col-lg-offset-1 col-xs-12">
                            <div class="accordion-box triggerAnimation animated" data-animate="fadeInLeft">
                                <?php
                                if (sizeof($elearning) == 0) { ?>
                                    <h3 style="text-align: center; color: red">কোনো তথ্য নেই</h3>
                                <?php } else { ?>

                                    <div class="row">
                                        <div class="form-group col-md-10 col-md-offset-2" style="margin-bottom: 40px;">
                                            <ul style="list-style-type:circle !important">
                                                <?php foreach ($elearning as $i) { ?>
                                                    <li style="list-style: disc outside none; display: list-item; margin-left: 1em; padding:5px;">
                                                        <a href="<?= site_url('home/elearning_details/' . $i['e_id']) ?>"><?= $i['c_name'] ?></a>
                                                    </li>
                                                <?php } ?>
                                            </ul>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!-- End content -->
    <?php $this->load->view('public_layout/footer'); ?>
</div>


<!-- End Container -->
<?php $this->load->view('public_layout/footerlink'); ?>

</body>
</html>