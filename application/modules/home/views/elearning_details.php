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

            <h1 class="page-title about-title"><span style="color: whitesmoke; background: #8bc541;">ই-লার্নিং</span>
            </h1>

            <!-- accord - skills with background image -->
            <div class="accord-skills white-back">
                <div class="title-section">
                    <div class="container triggerAnimation animated" data-animate="bounceIn">
                        <h1><?= $elearning[0]['c_name']?> এর ই-লার্নিং এ আপনাকে স্বাগতম</h1>
                    </div>
                </div>


                <div class="accord-skills-container container">
                    <div class="row">
                        <div
                            class="col-md-12 col-md-offset-0 col-sm-12 col-sm-offset-0 col-lg-12 col-lg-offset-0 col-xs-12">
                            <div class="accordion-box triggerAnimation animated" data-animate="fadeInLeft">
                                <div class="row">
                                    <div class="form-group col-md-6" style="margin-bottom: 40px;">
                                        <div>
                                            <h4>সিলেবাস</h4>
                                            <p style="margin-top: 30px;">
                                                <?php
                                                echo $elearning[0]['syllabus'];
                                                ?>
                                            </p>
                                        </div>
                                        <div style="margin-top: 30px">
                                            <h4>বিস্তারিত</h4>
                                            <p style="margin-top: 30px;">
                                                <?php
                                                echo $elearning[0]['details'];
                                                ?>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6" style="margin-bottom: 40px;">
                                        <div class="col-md-12">
                                            <?php
                                            echo $elearning[0]['video'];
                                            ?>
                                        </div>
                                        <div class="col-md-12" style="margin-top: 20px;">
                                           <?php if($elearning[0]['ppt']!='' || $elearning[0]['ppt']!=null){ ?>
                                            <iframe src="http://docs.google.com/gview?url=http://www.czikhulna.com/uploads/e_learning/<?=$elearning[0]['ppt']; ?>&embedded=true" style="width:550px; height:450px;" frameborder="0"></iframe>      
                                           <?php } ?>                                      
                                        </div>
                                    </div>
                                </div>                                  
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
            <a href="<?= site_url('home/elearning_list') ?>">ই-লার্নিং</a>
            <p><i class="fa fa-thumbs-up"></i> আঞ্চলিক সমবায় ইন্সটিটিউট খুলনা</p>
        </div>
    </div>
    <!-- End content -->
    <?php $this->load->view('public_layout/footer'); ?>
</div>


<!-- End Container -->
<?php $this->load->view('public_layout/footerlink'); ?>

</body>
</html>