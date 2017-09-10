<?php $bn_digits = array('০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯'); ?>
<!-- Header
================================================== -->
<header class="clearfix header2">
    <!-- Static navbar -->
    <div class="navbar navbar-default navbar-fixed-top">
        <div class="top-line">
            <div class="container">
                <div  class="col-sm-3">
                <ul class="top-menu">
                <a href="#"><img style="height: 49px;" alt="" src="<?= base_url() . 'public_assets/' ?>images/logo.png"></a>
                </ul>
                </div>
                <div  class="col-sm-6 top-table">
                <div class="row">
                    <div class="col-sm-4">
                        <a class="top-menu-link"><strong>২৪ ঘণ্টা/৩৬৫ দিন<br>অবিচ্ছিন্ন সেবা</strong></a>
                    </div>
                    <div class="col-sm-4">
                        <a class="top-menu-link"><i class="fa fa-arrow-circle-right"></i><strong>ভিডিও কনফারেন্স টুল</strong></a>
                    </div>
                    <div class="col-sm-4">
                        <a class="top-menu-link"><i class="fa fa-arrow-circle-right"></i><strong>English</strong></a>
                    </div>
                </div>
                </div>
                <div class="col-sm-3">
                <ul class="top-menu">
                    <?php
                    if($this->session->userdata('admin_type')==3){ ?>
                        <li><a href="<?= site_url('home/user_home')?>" class="top-menu-link2"
                        ><i class="fa fa-arrow-circle-right"></i><?= str_replace(range(0,9),$bn_digits,$this->session->userdata('user_nid'))?></a></li>
                    <?php }elseif($this->session->userdata('admin_type')==1){ ?>
                        <li ><a href="<?= site_url('admin')?>" class="top-menu-link2"
                        "><i class="fa fa-arrow-circle-right"></i>অ্যাডমিন</a></li>
                    <?php }else{ ?>
                    
                        <li><a href="<?= site_url('login')?>" class="top-menu-link2"><i class="fa fa-arrow-circle-right"></i>লগইন</a></li>
                    <?php }
                    ?>
                    <br>
                    <li><a href="<?= site_url('home/online_registration') ?>" class="top-menu-link2"><i class="fa fa-arrow-circle-right"></i>অনলাইন রেজিস্ট্রেশন</a></li>
                </ul>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-left">
                    <li>
                        <a href="<?= site_url('home') ?>"><span></span>হোম</a>
                    </li>


                    <li>
                        <a href="#about"><span></span>আমাদের কথা</a>
                    </li>

                    <li>
                        <a href="#dashboard"><span></span>এক নজরে</a>
                    </li>

                    <li><a href="#course_curriculum"><span></span>প্রশিক্ষণ তথ্য</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                <li><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">মূল্যায়ন<span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="<?= site_url('home/web_review')?>">কোর্স মূল্যায়ন</a></li>
                    <li><a href="#">প্রশিক্ষক মূল্যায়ন</a></li>
                  </ul>
                </li>
                <li><a href="<?= site_url('home/idea_box') ?>"><span></span>মতামত</a></li>
                </ul>
            </div>

        </div>
    </div>
</header>
<!-- End Header -->