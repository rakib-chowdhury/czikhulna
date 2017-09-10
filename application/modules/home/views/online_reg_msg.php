<body>
<?php $bn_digits = array('০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯'); ?>
<!-- Container -->
<div id="container">
    <?php $this->load->view('public_layout/header'); ?>

    <!-- content ================================================== -->
    <div id="content">
        <form onsubmit="return online_reg()" action="<?= site_url('home/online_registration_post') ?>">
            <!-- Page Banner -->
            <div class="page-banner about-banner">
                <div class="container">
                    <ul class="page-tree">
                        <li><a href="<?= site_url('home') ?>">CZI KHULNA</a></li>
                        <li><a href="<?= site_url('home/online_registration') ?>">অনলাইন রেজিস্ট্রেশন</a></li>
                    </ul>
                </div>
            </div>

            <h1 class="page-title about-title"><span
                    style="background: #8bc541; color: whitesmoke;">অনলাইন রেজিস্ট্রেশন</span></h1>

            <!-- accord - skills with background image -->
            <div class="accord-skills white-back">
                <div class="title-section">
                    <div class="container triggerAnimation animated" data-animate="bounceIn">
                        <h1>প্রশিক্ষণার্থী নিবন্ধন ফরম</h1>
                        <p>TRAINEE REGISTRATION FORM(TRF)</p>
                    </div>
                </div>

                <div class="accord-skills-container container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="accordion-box triggerAnimation animated" data-animate="fadeInLeft">
                                <div class="row" style="margin-right: 5px;">
                                    
                                    <!--agreement--->
                                    <?php if($userInfo){?>
                                    <div class="form-group" style="text-align:center;">
                                        <p style="color:red; font-size:16px; text-align:center;">
                                             <?php echo 'কার্যক্রমটি সফলভাবে সম্পন্ন হয়েছে। পরবর্তীতে প্রশিক্ষণের জন্য আবেদন করতে লগইন করুন। লগইন করতে আপনার জাতীয় পরিচয়পত্র নং এবং user(পাসওয়ার্ড) ব্যবহার করুন।'; ?>                                                
                                        </p>                                                                                
                                    </div>
                                    <div class="form-group" style="text-align:center;">
                                         <a href='<?= site_url()?>home/userPDF/<?= $userInfo?>' class="btn btn-info">পিডিএফ</a>
                                    </div>
                                    <?php } ?>
                                </div>
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