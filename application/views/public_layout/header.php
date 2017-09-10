<?php $bn_digits = array('০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯'); ?>
<!-- Header
================================================== -->
<header class="clearfix header2">
    <!-- Static navbar -->
    <div class="navbar navbar-default navbar-fixed-top">
        <div class="top-line">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <ul class="top-menu top-menu-left">
                            <li class="col-sm-4 col-md-4 col-xs-6"><i class="fa fa-bell"></i>২৪/৭ অবিচ্ছিন্ন সেবা</li>
                            <li class="col-sm-4 col-md-4 col-xs-6"><a href=""><i class="fa fa-video-camera"></i>ভিডিও
                                    কনফারেন্স টুল</a></li>
                            <li class="col-sm-4 col-md-4 col-xs-12"><a href="">English</a></li>
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <ul class="top-menu top-menu-right">
                            <?php
                            if ($this->session->userdata('admin_type') == 3){ ?>
                                <li><a href="<?= site_url('home/user_home') ?>" class="top-menu-link2"
                                    ><i class="fa fa-sign-out"></i><?= str_replace(range(0, 9), $bn_digits, $this->session->userdata('user_nid')) ?>
                                    </a></li>
                            <?php } elseif ($this->session->userdata('admin_type') == 1) { ?>
                                <li><a href="<?= site_url('admin') ?>" class="top-menu-link2"
                                    "><i class="fa fa-user-o"></i>অ্যাডমিন</a></li>
                            <?php }
                            else{ ?>
                            <div class="col-xs-12">
                                <li><a href="<?= site_url('login') ?>" class="top-menu-link2"><i
                                            class="fa fa-sign-in"></i>লগইন</a></li>
                                <?php }
                                ?>
                                <li><a href="<?= site_url('home/online_registration') ?>" class="top-menu-link2"><i
                                            class="fa fa-user"></i>অনলাইন রেজিস্ট্রেশন</a></li>
                            </div>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand logo" href="#"><img alt="" class="img-responsive"
                                                           src="<?= base_url() . 'public_assets/' ?>images/logo.png"></a>
            </div>
            <div class="navbar-collapse collapse">
                <div class="row">
                    <div class="main-menu-top">
                        <ul class="nav navbar-nav navbar-right">
                            <li>
                                <a href="<?= site_url('home') ?>"><span></span>হোম</a>
                            </li>
                            <li>
                                <a href="#about"><span></span>আমাদের কথা</a>
                            </li>
                            <li>
                                <a target="_blank" href="#achievement" data-toggle="tab"><span></span>আমাদের সাফল্য</a>
                            </li>
                            <li>
                                <a href="#dashboard"><span></span>এক নজরে</a>
                            </li>
                            <li><a href="#course_curriculum"><span></span>প্রশিক্ষণ তথ্য</a></li>
                            <li><a href="<?= site_url('home/demand') ?>"><span></span>প্রশিক্ষণ চাহিদা</a></li>
                            <li><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                   aria-haspopup="true" aria-expanded="false">মূল্যায়ন<span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="<?= site_url('home/web_review') ?>">কোর্স মূল্যায়ন</a></li>
                                    <li><a href="<?= site_url('home/teacher_review') ?>">প্রশিক্ষক মূল্যায়ন</a></li>
                                </ul>
                            </li>
                            <li><a href="<?= site_url('home/idea_box') ?>"><span></span>মতামত</a></li>
                            <li class="hidden"><a href="<?= site_url('home/notice') ?>"><span></span>নোটিশ</a></li>
                            <li><a href="<?= site_url('home/elearning_list') ?>"><span></span>ই-লার্নিং</a></li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>
</header>
<!-- End Header -->