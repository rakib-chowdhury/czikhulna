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
                        <li><a href="<?= site_url('home/notice') ?>">নোটিশ</a></li>
                    </ul>
                </div>
            </div>

            <h1 class="page-title about-title"><span style="color: whitesmoke; background: #8bc541;">নোটিশ</span>
            </h1>

            <!-- accord - skills with background image -->
            <div class="accord-skills white-back">
                <div class="title-section">
                    <div class="container triggerAnimation animated" data-animate="bounceIn">
                        <h1>নোটিশ</h1>
                    </div>
                </div>


                <div class="accord-skills-container container">
                    <div class="row">
                        <div
                            class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-lg-10 col-lg-offset-1 col-xs-12">
                            <div class="accordion-box triggerAnimation animated" data-animate="fadeInLeft">
                                <div class="row">
                                    <div class="form-group" style="margin-bottom: 40px;">
                                        <h4><?= $notice[0]['notice_title'] ?></h4>   
                                        <span style="padding-left:8px;"><?php $ddd=explode(' ',$notice[0]['notice_date'])[0];  
                                                    $ddd=explode('-',$ddd);
                                                    $dd=$ddd[2].'-'.$ddd[1].'-'.$ddd[0]; 
                                                    echo str_replace(range(0,9),$bn_digits,$dd); ?></span>
                                        <p style="margin-top: 30px;">
                                            <?php                                            
                                                echo $notice[0]['notice_details'];
                                            ?>
                                        </p>
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
            <a href="<?= site_url('home/notice') ?>">সকল নোটিশ</a>
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