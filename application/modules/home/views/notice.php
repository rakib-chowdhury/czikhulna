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
                        <li><a href="<?= site_url('home/notice') ?>">সকল নোটিশ</a></li>
                    </ul>
                </div>
            </div>

            <h1 class="page-title about-title"><span style="color: whitesmoke; background: #8bc541;">সকল নোটিশ</span>
            </h1>

            <!-- accord - skills with background image -->
            <div class="accord-skills white-back">
                <div class="title-section">
                    <div class="container triggerAnimation animated" data-animate="bounceIn">
                        <h1>সকল নোটিশ</h1>
                    </div>
                </div>


                <div class="accord-skills-container container">
                    <div class="row">
                        <div
                            class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-lg-10 col-lg-offset-1 col-xs-12">
                            <div class="accordion-box triggerAnimation animated" data-animate="fadeInLeft">
                                <?php
                                if (sizeof($notice) == 0) { ?>
<h3 style="text-align: center; color: red" >কোনো নোটিশ নেই</h3>
                                <?php } else { ?>
                                        <div class="row">
                                            <div class="form-group col-md-10 col-md-offset-2" style="margin-bottom: 40px;">
                                                <ul style="list-style-type:circle !important">
                                                    <?php foreach ($notice as $i) { 
                                                          $ddd=explode(' ',$i['notice_date'])[0];
                                                          $ddd=explode('-',$ddd);
                                                          $dd=$ddd[2].'-'.$ddd[1].'-'.$ddd[0];
                                                    ?>
                                                        <li style="list-style: disc outside none; display: list-item; margin-left: 1em; padding:5px;"><a href="<?= site_url('home/notice_details/'.$i['notice_id'])?>"><span style="margin-right:20px;"><?= str_replace(range(0,9),$bn_digits,$dd)?></span><?= $i['notice_title']?></a></li>
                                                    <?php  } ?>
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