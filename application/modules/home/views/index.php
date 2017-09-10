<body>
<?php $bn_digits = array('০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯'); ?>
<!-- Container -->
<div id="container">

    <?php $this->load->view('public_layout/header'); ?>

    <!-- slider
        ================================================== -->
    <div id="slider" class="revolution-slider">
        <!--
        #################################
            - THEMEPUNCH BANNER -
        #################################
        -->

        <div class="fullwidthbanner-container">
            <div class="fullwidthbanner">
                <ul>
                    <!-- THE FIRST SLIDE -->
                    <li data-transition="3dcurtain-vertical" data-slotamount="10" data-masterspeed="300">
                        <!-- THE MAIN IMAGE IN THE FIRST SLIDE -->
                        <img alt="" src="<?= base_url() . 'public_assets/' ?>upload/revolution/1.jpg">

                        <!-- THE CAPTIONS IN THIS SLDIE -->
                        <div class="caption large_text lft"
                             data-x="184"
                             data-y="122"
                             data-speed="600"
                             data-start="1200"
                             data-easing="easeOutExpo" data-end="7000" data-endspeed="300" data-endeasing="easeInSine">
                            আঞ্চলিক সমবায় ইন্সটিটিউট, খুলনা
                        </div>

                        <div class="caption big_white lfb stt"
                             data-x="456"
                             data-y="172"
                             data-speed="500"
                             data-start="1500"
                             data-easing="easeOutExpo" data-end="7100" data-endspeed="300" data-endeasing="easeInSine">

                        </div>

                        <div class="caption lfl"
                             data-x="372"
                             data-y="237"
                             data-speed="600"
                             data-start="1800"
                             data-easing="easeOutExpo" data-end="7200" data-endspeed="300" data-endeasing="easeInSine">
                            <img src="<?= base_url() . 'public_assets/' ?>images/revolution/icon1.png" alt="Image 1">
                        </div>

                        <div class="caption modern_small_text_dark lfb"
                             data-x="382"
                             data-y="340"
                             data-speed="600"
                             data-start="2000"
                             data-easing="easeOutExpo" data-end="7350" data-endspeed="300" data-endeasing="easeInSine">
                            <br>
                        </div>

                        <div class="caption lft"
                             data-x="482"
                             data-y="237"
                             data-speed="600"
                             data-start="2300"
                             data-easing="easeOutExpo" data-end="7400" data-endspeed="300" data-endeasing="easeInSine">
                            <img src="<?= base_url() . 'public_assets/' ?>images/revolution/icon2.png" alt="Image 2">
                        </div>

                        <div class="caption modern_small_text_dark lfb"
                             data-x="492"
                             data-y="340"
                             data-speed="600"
                             data-start="2500"
                             data-easing="easeOutExpo" data-end="7450" data-endspeed="300" data-endeasing="easeInSine">
                            <br>
                        </div>

                        <div class="caption lft"
                             data-x="592"
                             data-y="237"
                             data-speed="600"
                             data-start="2800"
                             data-easing="easeOutExpo" data-end="7500" data-endspeed="300" data-endeasing="easeInSine">
                            <img src="<?= base_url() . 'public_assets/' ?>images/revolution/icon3.png" alt="Image 3">
                        </div>

                        <div class="caption modern_small_text_dark lfb"
                             data-x="610"
                             data-y="340"
                             data-speed="600"
                             data-start="3000"
                             data-easing="easeOutExpo" data-end="7550" data-endspeed="300" data-endeasing="easeInSine">
                            <br>
                        </div>

                        <div class="caption lfr"
                             data-x="702"
                             data-y="237"
                             data-speed="600"
                             data-start="3300"
                             data-easing="easeOutExpo" data-end="7600" data-endspeed="300" data-endeasing="easeInSine">
                            <img src="<?= base_url() . 'public_assets/' ?>images/revolution/icon4.png" alt="Image 4">
                        </div>

                        <div class="caption modern_small_text_dark lfb"
                             data-x="705"
                             data-y="340"
                             data-speed="600"
                             data-start="3500"
                             data-easing="easeOutExpo" data-end="7650" data-endspeed="300" data-endeasing="easeInSine">
                            <br>
                        </div>
                    </li>
                    <!-- THE second SLIDE -->
                    <li data-transition="cube" data-slotamount="10" data-masterspeed="300">
                        <!-- THE MAIN IMAGE IN THE second SLIDE -->
                        <img alt="" src="<?= base_url() . 'public_assets/' ?>upload/revolution/2.jpg">

                        <!-- THE CAPTIONS IN THIS SLDIE -->
                        <div class="caption lfb"
                             data-x="803"
                             data-y="54"
                             data-speed="600"
                             data-start="1200"
                             data-easing="easeOutExpo" data-end="7000" data-endspeed="300" data-endeasing="easeInSine">
                            <img src="<?= base_url() . 'public_assets/' ?>images/revolution/icon5.png" alt="Image 1">
                        </div>

                        <div class="caption modern_medium_light lfl stt"
                             data-x="15"
                             data-y="120"
                             data-speed="500"
                             data-start="1600"
                             data-easing="easeOutExpo" data-end="7100" data-endspeed="300" data-endeasing="easeInSine">
                            <a href="<?= site_url(); ?>/home/web_review" style="color:white"><i class="fa fa-list"></i>কোর্স
                                ও প্রশিক্ষক মূল্যায়ন</a>
                        </div>

                        <div class="caption modern_medium_light lft stt"
                             data-x="300"
                             data-y="120"
                             data-speed="600"
                             data-start="1900"
                             data-easing="easeOutExpo" data-end="7300" data-endspeed="300" data-endeasing="easeInSine">
                            <a href="<?= site_url(); ?>/home/online_registration" style="color:white"><i
                                    class="fa fa-building-o"></i>অনলাইন রেজিস্ট্রেশন</a>
                        </div>

                        <div class="caption modern_medium_light lfl stt"
                             data-x="15"
                             data-y="265"
                             data-speed="600"
                             data-start="2100"
                             data-easing="easeOutExpo" data-end="7400" data-endspeed="300" data-endeasing="easeInSine">
                            <a href="<?= site_url(); ?>/home/idea_box" style="color:white"><i class="fa fa-flag-o"></i>নাগরিক
                                প্রশিক্ষণ চাহিদা</a>
                        </div>

                        <div class="caption modern_medium_light lfb stt"
                             data-x="300"
                             data-y="265"
                             data-speed="600"
                             data-start="2300"
                             data-easing="easeOutExpo" data-end="7500" data-endspeed="300" data-endeasing="easeInSine">
                            <a href="<?= site_url(); ?>/home/idea_box" style="color:white"><i class="fa fa-laptop"></i>নাগরিক
                                মতামত</a>
                        </div>
                    </li>


                    <!-- THE third SLIDE -->
                    <li data-transition="flyin" data-slotamount="10" data-masterspeed="300">
                        <!-- THE MAIN IMAGE IN THE third SLIDE -->
                        <img alt="" src="<?= base_url() . 'public_assets/' ?>upload/revolution/3.jpg">

                        <!-- THE CAPTIONS IN THIS SLDIE -->
                        <div class="caption large_text lft"
                             data-x="300"
                             data-y="78"
                             data-speed="600"
                             data-start="1200"
                             data-easing="easeOutExpo" data-end="7000" data-endspeed="300" data-endeasing="easeInSine">
                            আঞ্চলিক সমবায় ইন্সটিটিউট, খুলনা
                        </div>

                        <div class="caption big_white lfr stt"
                             data-x="490"
                             data-y="123"
                             data-speed="500"
                             data-start="1500"
                             data-easing="easeOutExpo" data-end="7100" data-endspeed="300" data-endeasing="easeInSine">

                        </div>

                        <div class="caption lfb"
                             data-x="220"
                             data-y="212"
                             data-speed="600"
                             data-start="1800"
                             data-easing="easeOutExpo" data-end="7200" data-endspeed="300" data-endeasing="easeInSine">
                            <img src="<?= base_url() . 'public_assets/' ?>images/revolution/icon6.png" alt="Image 1">
                        </div>
                    </li>


                    <!-- THE forth SLIDE -->
                    <li data-transition="flyin" data-slotamount="10" data-masterspeed="300">
                        <!-- THE MAIN IMAGE IN THE third SLIDE -->
                        <img alt="" src="<?= base_url() . 'public_assets/' ?>upload/revolution/4.jpg">

                        <!-- THE CAPTIONS IN THIS SLDIE -->
                        <div class="caption large_text lft"
                             data-x="300"
                             data-y="78"
                             data-speed="600"
                             data-start="1200"
                             data-easing="easeOutExpo" data-end="7000" data-endspeed="300" data-endeasing="easeInSine">
                            আঞ্চলিক সমবায় ইন্সটিটিউট, খুলনা
                        </div>

                        <div class="caption big_white lfr stt"
                             data-x="490"
                             data-y="123"
                             data-speed="500"
                             data-start="1500"
                             data-easing="easeOutExpo" data-end="7100" data-endspeed="300" data-endeasing="easeInSine">

                        </div>

                        <div class="caption lfb"
                             data-x="220"
                             data-y="212"
                             data-speed="600"
                             data-start="1800"
                             data-easing="easeOutExpo" data-end="7200" data-endspeed="300" data-endeasing="easeInSine">
                            <img src="<?= base_url() . 'public_assets/' ?>images/revolution/icon6.png" alt="Image 1">
                        </div>
                    </li>


                    <!-- THE fifth SLIDE -->
                    <li data-transition="flyin" data-slotamount="10" data-masterspeed="300">
                        <!-- THE MAIN IMAGE IN THE third SLIDE -->
                        <img alt="" src="<?= base_url() . 'public_assets/' ?>upload/revolution/5.jpg">

                        <!-- THE CAPTIONS IN THIS SLDIE -->
                        <div class="caption large_text lft"
                             data-x="300"
                             data-y="78"
                             data-speed="600"
                             data-start="1200"
                             data-easing="easeOutExpo" data-end="7000" data-endspeed="300" data-endeasing="easeInSine">
                            আঞ্চলিক সমবায় ইন্সটিটিউট, খুলনা
                        </div>

                        <div class="caption big_white lfr stt"
                             data-x="490"
                             data-y="123"
                             data-speed="500"
                             data-start="1500"
                             data-easing="easeOutExpo" data-end="7100" data-endspeed="300" data-endeasing="easeInSine">

                        </div>

                        <div class="caption lfb"
                             data-x="220"
                             data-y="212"
                             data-speed="600"
                             data-start="1800"
                             data-easing="easeOutExpo" data-end="7200" data-endspeed="300" data-endeasing="easeInSine">
                            <img src="<?= base_url() . 'public_assets/' ?>images/revolution/icon6.png" alt="Image 1">
                        </div>
                    </li>


                </ul>
            </div>
        </div>
    </div>
    <!-- End slider -->

    <!-- content
        ================================================== -->
    <div id="content">

        <section id="about">
            <!-- vertical tabs -->
            <div class="vertical-tabs">
                <div class="title-section">
                    <div class="container triggerAnimation animated" data-animate="bounceIn">
                        <h1>আমাদের কথা</h1>
                        <p>আঞ্চলিক সমবায় ইন্সটিটিউট, খুলনা</p>
                    </div>
                </div>

                <div class="vertical-tabs-box triggerAnimation animated" data-animate="bounceIn">
                    <div class="container">

                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs2" id="myTab">
                            <li class="active">
                                <a href="#aboutUS" data-toggle="tab">
                                    <i class="fa fa-home"></i> প্রতিষ্ঠান সম্পর্কে </a>
                            </li>
                            <li>
                                <a href="#achievement" data-toggle="tab">
                                    <i class="fa fa-css3"></i> আমাদের সাফল্য </a>
                            </li>
                            <li>
                                <a href="#mission" data-toggle="tab">
                                    <i class="fa fa-laptop"></i> আমাদের রূপকল্প </a>
                            </li>
                            <li>
                                <a href="#vision" data-toggle="tab">
                                    <i class="fa fa-suitcase"></i> আমাদের অভিলক্ষ্য </a>
                            </li>
                            <li>
                                <a onclick="document.location.href='<?= site_url('home/team') ?>'"
                                   style="cursor:pointer">
                                    <i class="fa fa-users"></i> আমাদের টিম </a>
                            </li>
                            <li>
                                <a href="#partner" data-toggle="tab">
                                    <i class="fa fa-film"></i> আমাদের পার্টনার </a>
                            </li>
                            <li>
                                <a href="#facilities">
                                    <i class="fa fa-th-list"></i> বিদ্যমান সুবিধাসমূহ </a>
                            </li>
                            <li>
                                <a href="#stockholder" data-toggle="tab">
                                    <i class="fa fa-th"></i> সেবাগ্রহীতা ও স্টেকহোল্ডার </a>
                            </li>
                            <li>
                                <a href="#communication" data-toggle="tab">
                                    <i class="fa fa-asterisk"></i> যোগাযোগ ও যাতায়াত </a>
                            </li>
                            <li>
                                <a href="#structure" data-toggle="tab">
                                    <i class="fa fa-anchor"></i> সাংগঠনিক কাঠামো </a>
                            </li>
                            <li>
                                <a href="#service" data-toggle="tab">
                                    <i class="fa fa-adjust"></i> আমাদের সেবাসমূহ </a>
                            </li>
                        </ul>

                        <div class="tab-content">
                            <div class="tab-pane active" id="aboutUS">
                                <!--                                <img alt="" src="-->
                                <? //= base_url() . 'public_assets/' ?><!--images/tablets.png">-->
                                <h3>প্রতিষ্ঠান সম্পর্কে</h3>
                                <p>
                                    <?php
                                    if (sizeof($about_us) != 0) {
                                        echo $about_us[0]['info_details'];
                                    }
                                    ?>
                                </p>
                            </div>
                            <div class="tab-pane" id="mission">
                                <h3>আমাদের রূপকল্প </h3>
                                <p>
                                    <?php
                                    if (sizeof($mission) != 0) {
                                        echo $mission[0]['info_details'];
                                    }
                                    ?>
                                </p>
                            </div>
                            <div class="tab-pane" id="vision">

                                <!-- youtube -->
                                <!--                                <iframe class="videoembed" src="http://www.youtube.com/embed/YE7VzlLtp-4?hd=1"></iframe>-->
                                <!-- End youtube -->

                                <h3> আমাদের অভিলক্ষ্য</h3>
                                <p>
                                    <?php
                                    if (sizeof($vision) != 0) {
                                        echo $vision[0]['info_details'];
                                    }
                                    ?>
                                </p>
                            </div>
                            <div class="tab-pane" id="partner">
                                <h3> আমাদের পার্টনার </h3>
                                <p>
                                <div class='row'>
                                    <div class='form-group'>
                                        <?php
                                        if (sizeof($partner) != 0) {
                                            foreach ($partner as $prtnr) { ?>
                                                <div class='col-md-2' style="margin-bottom:30px;"><img
                                                        data-toggle="tooltip" title="<?= $prtnr['name'] ?>"
                                                        style='width:100px; height:100px; /*border-radious:50%;*/'
                                                        src="<?= base_url() ?>uploads/partner/<?= $prtnr['logo'] ?>">
                                                </div>
                                            <?php }
                                        }
                                        ?>
                                    </div>
                                </div>
                                </p>
                            </div>
                            <div class="tab-pane" id="stockholder">
                                <h3> সেবাগ্রহীতা ও স্টেকহোল্ডার </h3>
                                <p>
                                    <?php
                                    if (sizeof($stockholder) != 0) {
                                        echo $stockholder[0]['info_details'];
                                    }
                                    ?>
                                </p>
                            </div>
                            <div class="tab-pane" id="communication">
                                <h3> যোগাযোগ ও যাতায়াত </h3>
                                <p>
                                    <?php
                                    if (sizeof($communication) != 0) {
                                        echo $communication[0]['info_details'];
                                    }
                                    ?>
                                </p>
                            </div>
                            <div class="tab-pane" id="structure">
                                <h3> সাংগঠনিক কাঠামো </h3>
                                <p>
                                    <?php
                                    if (sizeof($structure) != 0) {
                                        echo $structure[0]['info_details'];
                                    }
                                    ?>
                                </p>
                            </div>
                            <div class="tab-pane" id="achievement">
                                <h3>আমাদের সাফল্য </h3>
                                <p>
                                    <?php
                                    if (sizeof($achievement) != 0) {
                                        echo $achievement[0]['info_details'];
                                    }
                                    ?>
                                </p>
                            </div>
                            <div class="tab-pane" id="service">
                                <h3>আমাদের সেবাসমূহ </h3>
                                <p>
                                    <?php
                                    if (sizeof($services) != 0) {
                                        echo $services[0]['info_details'];
                                    }
                                    ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="dashboard" style="padding-top: 34px;">
            <!-- accord - skills with background image -->
            <div class="accord-skills">
                <div class="title-section white">
                    <div class="container triggerAnimation animated" data-animate="bounceIn">
                        <h1>এক নজরে বর্তমান বছরের <br> এ পি এ লক্ষ্যমাত্রা ও অর্জন</h1>
                        <p>আঞ্চলিক সমবায় ইন্সটিটিউট, খুলনা</p>
                    </div>
                </div>

                <div class="accord-skills-container container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="accordion-box triggerAnimation animated" data-animate="fadeInLeft">
                                <div id="container3" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="skills-bars triggerAnimation animated" data-animate="fadeInRight">
                                <div id="container4" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="title-section white" style="margin-top: 50px;">
                    <div class="container triggerAnimation animated" data-animate="bounceIn">
                        <h1>এক নজরে বর্তমান বছরের <br> নারী ও পুরুষ 
                        ার্থীগণের বিভাজন</h1>
                        <p>আঞ্চলিক সমবায় ইন্সটিটিউট, খুলনা</p>
                    </div>
                </div>

                <div class="accord-skills-container container">
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3">
                            <div class="accordion-box triggerAnimation animated" data-animate="fadeInLeft">
                                <div id="container11" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
                            </div>
                        </div>
                    </div>
                </div>




                <div class="title-section white" style="margin-top: 50px;">
                    <div class="container triggerAnimation animated" data-animate="bounceIn">
                        <h1>এক নজরে বর্তমান বছরের সম্পাদিত <br> প্রশিক্ষণ কোর্সের ধরণ ও প্রশিক্ষণার্থী সংখ্যার বিভাজন</h1>
                        <p>আঞ্চলিক সমবায় ইন্সটিটিউট, খুলনা</p>
                    </div>
                </div>
                <div class="accord-skills-container container">
                    <div class="row" style="margin-top:30px">
                        <div class="col-md-12">
                            <div class="accordion-box triggerAnimation animated" data-animate="fadeInLeft">
                                <div class="col-md-12" style="background:white">
                                    <div id="container5" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
                                </div>
                                <!--<div class="col-md-6" style="background:white; min-height:400px; max-height:400px; y-overflow:auto">
                                    <table style="width: 100%;" >
                                        <?php foreach ($course_per as $key => $c) { ?>
                                            <tr>
                                                <td ><?= $c['c_name']; ?></td>
                                                <td >:
                                                    <?php echo str_replace(range(0, 9), $bn_digits, $c['person']); ?>
                                                    জন
                                                </td>
                                            </tr>

                                        <?php } ?>
                                    </table>
                                </div>-->
                            </div>
                        </div>
                    </div>
                </div>

                <div class="title-section white" style="margin-top: 50px;">
                    <div class="container triggerAnimation animated" data-animate="bounceIn">
                        <h1>এক নজরে ৩ বছরের প্রশিক্ষণ  <br> কোর্স সংখ্যা ও বাজেট বরাদ্দের তুলনামূলক চিত্র</h1>
                        <p>আঞ্চলিক সমবায় ইন্সটিটিউট, খুলনা</p>
                    </div>
                </div>

                <div class="accord-skills-container container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="accordion-box triggerAnimation animated" data-animate="fadeInLeft">
                                <div id="container1" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="skills-bars triggerAnimation animated" data-animate="fadeInRight">
                                <div id="container2" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="course_curriculum">
            <!-- horizontal tabs -->
            <div class="horizontal-tabs">
                <div class="title-section">
                    <div class="container triggerAnimation animated" data-animate="bounceIn">
                        <h1> প্রশিক্ষণ তথ্য </h1>
                        <p>আঞ্চলিক সমবায় ইন্সটিটিউট, খুলনা</p>
                    </div>
                </div>

                <div class="horizontal-tabs-box triggerAnimation animated" data-animate="bounceIn">
                    <div class="container">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" id="myTab2">
                            <li class="active">
                                <a href="#resp-layout-horz" data-toggle="tab">
                                    <i class="fa fa-list"></i>
                                    <span>সকল কোর্স<br>(<?php echo str_replace(range(0, 9), $bn_digits, $curr_y) ?>)</span>
                                </a>
                            </li>
                            <li>
                                <a href="#power-admin-horz" data-toggle="tab">
                                    <i class="fa fa-th"></i>
                                    <span>চলমান কোর্স</span>
                                </a>
                            </li>
                            <li>
                                <a href="#video-support-horz" data-toggle="tab">
                                    <i class="fa fa-th-list"></i>
                                    <span>পরবর্তী কোর্স</span>
                                </a>
                            </li>
                            <li>
                                <a href="#resp-layout-horz2" data-toggle="tab">
                                    <i class="fa fa-archive"></i>
                                    <span>বিগত সকল কোর্স</span>
                                </a>
                            </li>
                            <li>
                                <a onclick="document.location.href='<?= site_url('home/demand') ?>'"
                                   style="cursor:pointer" id="demandID">
                                    <i class="fa fa-users"></i>
                                    <span>প্রশিক্ষণ চাহিদা</span>
                                </a>
                            </li>
                            <li>
                                <a onclick="document.location.href='<?= site_url('home/course_requirement') ?>'"
                                   style="cursor:pointer" id="course-req">
                                    <i class="fa fa-archive"></i>
                                    <span>কোর্স সম্পর্কিত তথ্য</span>
                                </a>
                            </li>
                        </ul>

                        <div class="tab-content">
                            <div class="tab-pane active" id="resp-layout-horz">
                                <img alt="" scr="<?= base_url() . 'public_assets/' ?>images/tablets2.png">
                                <!--                                <h3>Responsive Layout</h3>-->
                                <div class="row" style="max-height:500px; overflow-y:auto">
                                    <p style="text-align: right; padding-right: 20px;">
                                        <a title="প্রিন্ট/পিডিএফ" href="<?= site_url('home/course_list_pdf/0') ?>"
                                           target="_blank" class="btn"><i class="fa fa-print fa-2x"></i></a>
                                    </p>
                                    <div
                                        class="col-md-12 col-md-offset-0 col-sm-12 col-sm-offset-0 col-lg-12 col-lg-offset-0 col-xs-12 table-responsive">
                                        <table class="table table-bordered">
                                            <tr>
                                                <th style="text-align: center">ক্রমিক নং</th>
                                                <th style="text-align: center">কোর্স শিরোনাম</th>
                                                <th style="text-align: center">প্রশিক্ষণ বর্ষ</th>
                                                <th style="text-align: center">অর্থায়ন</th>
                                                <th style="text-align: center">প্রশিক্ষণার্থী ধরণ</th>
                                                <th style="text-align: center">কোর্স শুরুর তারিখ</th>
                                                <th style="text-align: center">কোর্স সমাপ্তির তারিখ</th>
                                                <th style="text-align: center">মেয়াদ<br>(দিন)</th>
                                                <th style="text-align: center">প্রতিষ্ঠান</th>
                                                <th style="text-align: center">কোর্স স্ট্যাটাস</th>
                                            </tr>
                                            <?php
                                            foreach ($all_course as $k => $all) { ?>
                                                <tr>
                                                    <td><?= str_replace(range(0, 9), $bn_digits, $k + 1) ?></td>
                                                    <td><a style="cursor:pointer;" data-toggle="modal"
                                                           data-target="#allCrseMdl_<?= $all['c_id'] ?>"><?= $all['c_name'] ?></a>
                                                    </td>
                                                    <td><?= str_replace(range(0, 9), $bn_digits, $all['year']) ?></td>
                                                    <td><a style="cursor:pointer;" data-toggle="modal"
                                                           data-target="#allCrseDonorMdl_<?= $all['c_id'] ?>"><?= $all['donor_name'] ?></a>
                                                    </td>
                                                    <td><?= $all['class_name'] ?></td>
                                                    <td>
                                                        <?php
                                                        $date1 = explode('-', $all['start_date']);
                                                        $date2 = $date1[2] . '-' . $date1[1] . '-' . $date1[0];
                                                        echo str_replace(range(0, 9), $bn_digits, $date2)
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        $date1 = explode('-', $all['end_date']);
                                                        $date2 = $date1[2] . '-' . $date1[1] . '-' . $date1[0];
                                                        echo str_replace(range(0, 9), $bn_digits, $date2)
                                                        ?>
                                                    </td>
                                                    <td><?= str_replace(range(0, 9), $bn_digits, $all['run_days']) ?></td>
                                                    <td>আঞ্চলিক সমবায় ইন্সটিটিউট, খুলনা</td>
                                                    <td>
                                                        <?php
                                                        if ($all['end_date'] < date('Y-m-d')) {
                                                            if ($all['course_status'] == 2) {
                                                                echo 'সম্পাদিত';
                                                            } else {
                                                                echo 'পূর্ববর্তী';
                                                            }
                                                        } elseif ($all['start_date'] > date('Y-m-d')) {
                                                            echo 'পরবর্তী';
                                                        } else {
                                                            echo 'চলমান';
                                                        }
                                                        ?>
                                                    </td>
                                                </tr>
                                            <?php }
                                            ?>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="power-admin-horz">
                                <div class="row" style="max-height:500px; overflow-y:auto">
                                    <p style="text-align: right; padding-right: 20px;">
                                        <a title="প্রিন্ট/পিডিএফ" href="<?= site_url('home/course_list_pdf/1') ?>"
                                           target="_blank" class="btn;"><i class="fa fa-print fa-2x"></i></a>
                                    </p>
                                    <div
                                        class="col-md-12 col-md-offset-0 col-sm-12 col-sm-offset-0 col-lg-12 col-lg-offset-0 col-xs-12 table-responsive">
                                        <table class="table table-bordered">
                                            <tr>
                                                <th style="text-align: center">ক্রমিক নং</th>
                                                <th style="text-align: center">কোর্স শিরোনাম</th>
                                                <th style="text-align: center">প্রশিক্ষণ বর্ষ</th>
                                                <th style="text-align: center">অর্থায়ন</th>
                                                <th style="text-align: center">প্রশিক্ষণার্থী ধরণ</th>
                                                <th style="text-align: center">কোর্স শুরুর তারিখ</th>
                                                <th style="text-align: center">কোর্স সমাপ্তির তারিখ</th>
                                                <th style="text-align: center">মেয়াদ<br>(দিন)</th>
                                                <th style="text-align: center">প্রতিষ্ঠান</th>
                                                <th style="text-align: center">কোর্স স্ট্যাটাস</th>
                                            </tr>
                                            <?php
                                            foreach ($current_course as $k => $all) { ?>
                                                <tr>
                                                    <td><?= str_replace(range(0, 9), $bn_digits, $k + 1) ?></td>
                                                    <td><a style="cursor:pointer;" data-toggle="modal"
                                                           data-target="#currCrseMdl_<?= $all['c_id'] ?>"><?= $all['c_name'] ?></a>
                                                    </td>
                                                    <td><?= str_replace(range(0, 9), $bn_digits, $all['year']) ?></td>
                                                    <td><a style="cursor:pointer;" data-toggle="modal"
                                                           data-target="#currCrseDonorMdl_<?= $all['c_id'] ?>"><?= $all['donor_name'] ?></a>
                                                    </td>
                                                    <td><?= $all['class_name'] ?></td>
                                                    <td>
                                                        <?php
                                                        $date1 = explode('-', $all['start_date']);
                                                        $date2 = $date1[2] . '-' . $date1[1] . '-' . $date1[0];
                                                        echo str_replace(range(0, 9), $bn_digits, $date2)
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        $date1 = explode('-', $all['end_date']);
                                                        $date2 = $date1[2] . '-' . $date1[1] . '-' . $date1[0];
                                                        echo str_replace(range(0, 9), $bn_digits, $date2)
                                                        ?>
                                                    </td>
                                                    <td><?= str_replace(range(0, 9), $bn_digits, $all['run_days']) ?></td>
                                                    <td>আঞ্চলিক সমবায় ইন্সটিটিউট, খুলনা</td>
                                                    <td>
                                                        <?php
                                                        if ($all['end_date'] < date('Y-m-d')) {
                                                            if ($all['course_status'] == 2) {
                                                                echo 'সম্পাদিত';
                                                            } else {
                                                                echo 'পূর্ববর্তী';
                                                            }
                                                        } elseif ($all['start_date'] > date('Y-m-d')) {
                                                            echo 'পরবর্তী';
                                                        } else {
                                                            echo 'চলমান';
                                                        }
                                                        ?>
                                                    </td>
                                                </tr>
                                            <?php }
                                            ?>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="video-support-horz">
                                <div class="row" style="max-height:500px; overflow-y:auto">
                                    <p style="text-align: right; padding-right: 20px;">
                                        <a title="প্রিন্ট/পিডিএফ" href="<?= site_url('home/course_list_pdf/2') ?>"
                                           target="_blank" class="btn;"><i class="fa fa-print fa-2x"></i></a>
                                    </p>
                                    <div
                                        class="col-md-12 col-md-offset-0 col-sm-12 col-sm-offset-0 col-lg-12 col-lg-offset-0 col-xs-12 table-responsive">
                                        <table class="table table-bordered">
                                            <tr>
                                                <th style="text-align: center">ক্রমিক নং</th>
                                                <th style="text-align: center">কোর্স শিরোনাম</th>
                                                <th style="text-align: center">প্রশিক্ষণ বর্ষ</th>
                                                <th style="text-align: center">অর্থায়ন</th>
                                                <th style="text-align: center">প্রশিক্ষণার্থী ধরণ</th>
                                                <th style="text-align: center">কোর্স শুরুর তারিখ</th>
                                                <th style="text-align: center">কোর্স সমাপ্তির তারিখ</th>
                                                <th style="text-align: center">মেয়াদ<br>(দিন)</th>
                                                <th style="text-align: center">প্রতিষ্ঠান</th>
                                                <th style="text-align: center">কোর্স স্ট্যাটাস</th>
                                            </tr>
                                            <?php
                                            foreach ($future_course as $k => $all) { ?>
                                                <tr>
                                                    <td><?= str_replace(range(0, 9), $bn_digits, $k + 1) ?></td>
                                                    <td><a style="cursor:pointer;" data-toggle="modal"
                                                           data-target="#fuCrseMdl_<?= $all['c_id'] ?>"><?= $all['c_name'] ?></a>
                                                    </td>
                                                    <td><?= str_replace(range(0, 9), $bn_digits, $all['year']) ?></td>
                                                    <td><a style="cursor:pointer;" data-toggle="modal"
                                                           data-target="#fuCrseDonorMdl_<?= $all['c_id'] ?>"><?= $all['donor_name'] ?></a>
                                                    </td>
                                                    <td><?= $all['class_name'] ?></td>
                                                    <td>
                                                        <?php
                                                        $date1 = explode('-', $all['start_date']);
                                                        $date2 = $date1[2] . '-' . $date1[1] . '-' . $date1[0];
                                                        echo str_replace(range(0, 9), $bn_digits, $date2)
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        $date1 = explode('-', $all['end_date']);
                                                        $date2 = $date1[2] . '-' . $date1[1] . '-' . $date1[0];
                                                        echo str_replace(range(0, 9), $bn_digits, $date2)
                                                        ?>
                                                    </td>
                                                    <td><?= str_replace(range(0, 9), $bn_digits, $all['run_days']) ?></td>
                                                    <td>আঞ্চলিক সমবায় ইন্সটিটিউট, খুলনা</td>
                                                    <td>
                                                        <?php
                                                        if ($all['end_date'] < date('Y-m-d')) {
                                                            if ($all['course_status'] == 2) {
                                                                echo 'সম্পাদিত';
                                                            } else {
                                                                echo 'পূর্ববর্তী';
                                                            }
                                                        } elseif ($all['start_date'] > date('Y-m-d')) {
                                                            echo 'পরবর্তী';
                                                        } else {
                                                            echo 'চলমান';
                                                        }
                                                        ?>
                                                    </td>
                                                </tr>
                                            <?php }
                                            ?>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="resp-layout-horz2">
                                <img alt="" scr="<?= base_url() . 'public_assets/' ?>images/tablets2.png">
                                <div class="row" style="max-height:500px; overflow-y:auto">
                                    <p style="text-align: right; padding-right: 20px;">
                                        <a title="প্রিন্ট/পিডিএফ" href="<?= site_url('home/course_list_pdf/3') ?>"
                                           target="_blank" class="btn;"><i class="fa fa-print fa-2x"></i></a>
                                    </p>
                                    <div
                                        class="col-md-12 col-md-offset-0 col-sm-12 col-sm-offset-0 col-lg-12 col-lg-offset-0 col-xs-12 table-responsive">
                                        <table class="table table-bordered">
                                            <tr>
                                                <th style="text-align: center">ক্রমিক নং</th>
                                                <th style="text-align: center">কোর্স শিরোনাম</th>
                                                <th style="text-align: center">প্রশিক্ষণ বর্ষ</th>
                                                <th style="text-align: center">অর্থায়ন</th>
                                                <th style="text-align: center">প্রশিক্ষণার্থী ধরণ</th>
                                                <th style="text-align: center">কোর্স শুরুর তারিখ</th>
                                                <th style="text-align: center">কোর্স সমাপ্তির তারিখ</th>
                                                <th style="text-align: center">মেয়াদ<br>(দিন)</th>
                                                <th style="text-align: center">প্রতিষ্ঠান</th>
                                                <th style="text-align: center">কোর্স স্ট্যাটাস</th>
                                            </tr>
                                            <?php
                                            foreach ($arc_course as $k => $all) { ?>
                                                <tr>
                                                    <td><?= str_replace(range(0, 9), $bn_digits, $k + 1) ?></td>
                                                    <td><a style="cursor:pointer;" data-toggle="modal"
                                                           data-target="#arcCrseMdl_<?= $all['c_id'] ?>"><?= $all['c_name'] ?></a>
                                                    </td>
                                                    <td><?= str_replace(range(0, 9), $bn_digits, $all['year']) ?></td>
                                                    <td><a style="cursor:pointer;" data-toggle="modal"
                                                           data-target="#arcCrseDonorMdl_<?= $all['c_id'] ?>"><?= $all['donor_name'] ?></a>
                                                    </td>
                                                    <td><?= $all['class_name'] ?></td>
                                                    <td>
                                                        <?php
                                                        $date1 = explode('-', $all['start_date']);
                                                        $date2 = $date1[2] . '-' . $date1[1] . '-' . $date1[0];
                                                        echo str_replace(range(0, 9), $bn_digits, $date2)
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        $date1 = explode('-', $all['end_date']);
                                                        $date2 = $date1[2] . '-' . $date1[1] . '-' . $date1[0];
                                                        echo str_replace(range(0, 9), $bn_digits, $date2)
                                                        ?>
                                                    </td>
                                                    <td><?= str_replace(range(0, 9), $bn_digits, $all['run_days']) ?></td>
                                                    <td>আঞ্চলিক সমবায় ইন্সটিটিউট, খুলনা</td>
                                                    <td>
                                                        <?php
                                                        if ($all['end_date'] < date('Y-m-d')) {
                                                            if ($all['course_status'] == 2) {
                                                                echo 'সম্পাদিত';
                                                            } else {
                                                                echo 'পূর্ববর্তী';
                                                            }
                                                        } elseif ($all['start_date'] > date('Y-m-d')) {
                                                            echo 'পরবর্তী';
                                                        } else {
                                                            echo 'চলমান';
                                                        }
                                                        ?>
                                                    </td>
                                                </tr>
                                            <?php }
                                            ?>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="facilities" style="padding-top: 34px;">
            <!-- Choose-tempcore -->
            <div class="choose-tempcore">
                <div class="title-section">
                    <div class="container triggerAnimation animated" data-animate="bounceIn">
                        <h1>সুবিধাসমূহ</h1>
                        <p>আঞ্চলিক সমবায় ইন্সটিটিউট, খুলনা</p>
                    </div>
                </div>
                <div class="container triggerAnimation animated" data-animate="bounceIn">
                    <div class="row">
                        <div class="col-md-4 image-sect">
                            <img alt="" src="<?= base_url() ?>public_assets/images/icon1.png">
                        </div>

                        <div class="col-md-8" style="overflow-y: auto; max-height: 400px;">
                            <p>
                                <?php if (sizeof($facilities) != 0) {
                                    echo $facilities[0]['info_details'];
                                } ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- tempcore line -->
        <div class="tempcore-line triggerAnimation animated" data-animate="fadeIn">
            <div class="container">
                <a href="<?= site_url('home/web_review') ?>">কোর্স মূল্যায়ন</a>
                <p><i class="fa fa-thumbs-up"></i> আঞ্চলিক সমবায় ইন্সটিটিউট, খুলনা</p>
            </div>
        </div>
        <!-- End content -->

        <?php $this->load->view('public_layout/footer'); ?>

    </div>
    <!-- End Container -->
    <?php
    foreach ($all_course as $all) { ?>
        <!-- Modal -->
        <div id="allCrseMdl_<?= $all['c_id'] ?>" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">কোর্সের বিস্তারিত তথ্য</h4>
                    </div>
                    <div class="modal-body" style="max-height: 500px; overflow-y: auto">
                        <div class="row">
                            <div class="col-md-12">
                                <a href="<?= site_url('home/courseDetailsPdf/' . $all['c_id']) ?>" target="_blank">
                                    <span style="padding-right:15px; padding-top:10px;" class="pull-right">পিডিএফ</span>
                                </a>
                                <table width="100%" align="center" border='0' style="font-size: 12px">
                                    <tr>
                                        <td style="width:68%">কোর্স শিরোনাম : <?= $all['c_name'] ?></td>
                                        <td>মেয়াদ : <?= str_replace(range(0, 9), $bn_digits, $all['run_days']) ?>দিন
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>প্রশিক্ষণ বর্ষ
                                            : <?= str_replace(range(0, 9), $bn_digits, $all['year']) ?></td>
                                        <td>অর্থায়ন : <?= $all['donor_name'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>কোর্স শুরুর তারিখ : <?php
                                            $tDAte = explode('-', $all['start_date']);
                                            $TdAtE = $tDAte[2] . '-' . $tDAte[1] . '-' . $tDAte[0];
                                            echo str_replace(range(0, 9), $bn_digits, $TdAtE); ?>
                                        </td>
                                        <td>কোর্স সমাপ্তির তারিখ : <?php
                                            $tDAte = explode('-', $all['end_date']);
                                            $TdAtE = $tDAte[2] . '-' . $tDAte[1] . '-' . $tDAte[0];
                                            echo str_replace(range(0, 9), $bn_digits, $TdAtE); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>কোর্সের ধরণ : <?= $all['course_class_name'] ?></td>
                                        <td>প্রশিক্ষণার্থীর ধরণ : <?= $all['class_name'] ?></span></td>
                                    </tr>
                                    <tr>
                                        <td style="width:40%">প্রশিক্ষণার্থীর সংখ্যা মোট
                                            : <?= str_replace(range(0, 9), $bn_digits, $all['total_student']) ?>
                                            <?php
                                            $man = 0;
                                            $women = 0;
                                            if (sizeof($all['2']) == 0) {
                                            } else {
                                                foreach ($all['2'] as $key5 => $stu) {
                                                    if ($stu['gender'] == 1) {
                                                        $man = $stu['count'];
                                                    } else {
                                                        $women = $stu['count'];
                                                    }
                                                }

                                            }
                                            ?>
                                            (নারী : <?= str_replace(range(0, 9), $bn_digits, $women) ?>, পুরুষ
                                            : <?= str_replace(range(0, 9), $bn_digits, $man) ?>)
                                        </td>
                                        <td>গড় মূল্যায়ন
                                            : <?= str_replace(range(0, 9), $bn_digits, $all['1']['0']['avg']) ?></span></td>
                                    </tr>
                                </table>
                                <br>
                                <h5>প্রশিক্ষণ কোর্স ভিত্তিক শর্ত/যোগ্যতা</h5>
                                <table class="table table-striped table-bordered center"
                                       cellspacing="0" style="font-size: 12px;">

                                    <?php
                                    if (sizeof($all['5']) == 0) {
                                        ?>
                                        <tr>
                                            <td colspan="2">প্রশিক্ষণ কোর্স ভিত্তিক শর্ত/যোগ্যতা নির্ধারণ করা হয় নাই
                                            </td>
                                        </tr>
                                    <?php } else {
                                        foreach ($all['5'] as $row) { ?>
                                            <tr>
                                                <td>অংশগ্রহণকারী বয়স</td>
                                                <td><?= str_replace(range(0, 9), $bn_digits, $row['req_age']); ?></td>
                                            </tr>
                                            <tr>
                                                <td>শিক্ষাগত যোগ্যতা</td>
                                                <td><?= str_replace(range(0, 9), $bn_digits, $row['req_edu']); ?></td>
                                            </tr>
                                            <tr>
                                                <td>কী নিয়ে আসতে হবে তার তালিকা</td>
                                                <td><?= $row['req_things'] ?></td>
                                            </tr>
                                            <tr>
                                                <td>অন্যান্য বিশেষ যোগ্যতা</td>
                                                <td><?= $row['req_other'] ?></td>
                                            </tr>
                                        <?php }
                                    } ?>


                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>


        <!-- Modal -->
        <div id="allCrseDonorMdl_<?= $all['c_id'] ?>" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">অর্থায়ন এর বিস্তারিত তথ্য</h4>
                    </div>
                    <div class="modal-body" style="max-height: 500px; overflow-y: auto">
                        <div class="row">
                            <div class="col-md-12">
                                <table width="100%" align="center" border='0' style="font-size: 12px">
                                    <tr>
                                        <td>প্রশিক্ষণ বর্ষ
                                            : <?= str_replace(range(0, 9), $bn_digits, $all['year']) ?></td>
                                        <td>অর্থায়ন : <?= $all['donor_name'] ?></td>
                                    </tr>
                                </table>
                                <br>
                                <?php
                                //$mmm=  json_decode($all['3'][0]['donation_details']);
                                $str = json_decode($all['3'][0]['donation_details'], true);
                                //$str = json_decode($str,true);
                                ?>
                                <table class="table table-striped table-bordered center"
                                       cellspacing="0" style="font-size: 12px;">
                                    <?php $total = 0;

                                    foreach ($str as $row) { ?>
                                        <tr>
                                            <td style="font-weight: 600; width:35%; text-align: right;">
                                                <?php
                                                if ($row['type'] == 1) {
                                                    echo 'প্রাপ্ত বরাদ্দ :';
                                                } else {
                                                    echo 'বরাদ্দ যোগ :';
                                                }
                                                ?>
                                            </td>
                                            <td style="text-align: left; padding-left: 15px;"><?= str_replace(range(0, 9), $bn_digits, $row["amount"]) ?>
                                                টাকা
                                            </td>
                                            <td style="font-weight: 600; text-align: right; width:12%">তারিখ :</td>
                                            <td style="text-align: left; width:20%;">
                                                <?php
                                                $tdate = explode('-', $row['date']);
                                                $ttdate = $tdate[2] . '-' . $tdate[1] . '-' . $tdate[0];
                                                echo str_replace(range(0, 9), $bn_digits, $ttdate);
                                                ?>
                                            </td>
                                        </tr>
                                        <?php
                                        $total += $row['amount'];
                                    } ?>
                                    <tr>
                                        <td style="text-align: right; font-weight: 600">সর্বমোট অর্থ :</td>
                                        <td colspan="3"
                                            style="text-align: left; padding-left: 15px; font-weight: 700"><?= str_replace(range(0, 9), $bn_digits, $total) ?>
                                            টাকা
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: right; font-weight: 600">সমাপ্ত কোর্স পর্যন্ত ব্যয় :</td>
                                        <td colspan="3"
                                            style="text-align: left; padding-left: 15px; font-weight: 700"><?= str_replace(range(0, 9), $bn_digits, $all['4'][0]['ExpnsE']) ?>
                                            টাকা
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: right; font-weight: 600">অবশিষ্ট :</td>
                                        <td colspan="3"
                                            style="text-align: left; padding-left: 15px; font-weight: 700"><?= str_replace(range(0, 9), $bn_digits, ($total - $all['4'][0]['ExpnsE'])) ?>
                                            টাকা
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    <?php }
    ?>

    <?php
    foreach ($arc_course as $all) { ?>
        <!-- Modal -->
        <div id="arcCrseMdl_<?= $all['c_id'] ?>" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">কোর্সের বিস্তারিত তথ্য</h4>
                    </div>
                    <div class="modal-body" style="max-height: 500px; overflow-y: auto">
                        <div class="row">
                            <div class="col-md-12">
                                <a href="<?= site_url('home/courseDetailsPdf/' . $all['c_id']) ?>" target="_blank">
                                    <span style="padding-right:15px; padding-top:10px;" class="pull-right">পিডিএফ</span>
                                </a>
                                <table width="100%" align="center" border='0' style="font-size: 12px">
                                    <tr>
                                        <td style="width:68%">কোর্স শিরোনাম : <?= $all['c_name'] ?></td>
                                        <td>মেয়াদ : <?= str_replace(range(0, 9), $bn_digits, $all['run_days']) ?>দিন
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>প্রশিক্ষণ বর্ষ
                                            : <?= str_replace(range(0, 9), $bn_digits, $all['year']) ?></td>
                                        <td>অর্থায়ন : <?= $all['donor_name'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>কোর্স শুরুর তারিখ : <?php
                                            $tDAte = explode('-', $all['start_date']);
                                            $TdAtE = $tDAte[2] . '-' . $tDAte[1] . '-' . $tDAte[0];
                                            echo str_replace(range(0, 9), $bn_digits, $TdAtE); ?>
                                        </td>
                                        <td>কোর্স সমাপ্তির তারিখ : <?php
                                            $tDAte = explode('-', $all['end_date']);
                                            $TdAtE = $tDAte[2] . '-' . $tDAte[1] . '-' . $tDAte[0];
                                            echo str_replace(range(0, 9), $bn_digits, $TdAtE); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>কোর্সের ধরণ : <?= $all['course_class_name'] ?></td>
                                        <td>প্রশিক্ষণার্থীর ধরণ : <?= $all['class_name'] ?></span></td>
                                    </tr>
                                    <tr>
                                        <td style="width:40%">প্রশিক্ষণার্থীর সংখ্যা মোট
                                            : <?= str_replace(range(0, 9), $bn_digits, $all['total_student']) ?>
                                            <?php
                                            $man = 0;
                                            $women = 0;
                                            if (sizeof($all['2']) == 0) {
                                            } else {
                                                foreach ($all['2'] as $key5 => $stu) {
                                                    if ($stu['gender'] == 1) {
                                                        $man = $stu['count'];
                                                    } else {
                                                        $women = $stu['count'];
                                                    }
                                                }

                                            }
                                            ?>
                                            (নারী : <?= str_replace(range(0, 9), $bn_digits, $women) ?>, পুরুষ
                                            : <?= str_replace(range(0, 9), $bn_digits, $man) ?>)
                                        </td>
                                        <td>গড় মূল্যায়ন
                                            : <?= str_replace(range(0, 9), $bn_digits, $all['1']['0']['avg']) ?></span></td>
                                    </tr>
                                </table>
                                <br>
                                <h5>প্রশিক্ষণ কোর্স ভিত্তিক শর্ত/যোগ্যতা</h5>
                                <table class="table table-striped table-bordered center"
                                       cellspacing="0" style="font-size: 12px;">

                                    <?php
                                    if (sizeof($all['5']) == 0) {
                                        ?>
                                        <tr>
                                            <td colspan="2">প্রশিক্ষণ কোর্স ভিত্তিক শর্ত/যোগ্যতা নির্ধারণ করা হয় নাই
                                            </td>
                                        </tr>
                                    <?php } else {
                                        foreach ($all['5'] as $row) { ?>
                                            <tr>
                                                <td>অংশগ্রহণকারী বয়স</td>
                                                <td><?= str_replace(range(0, 9), $bn_digits, $row['req_age']); ?></td>
                                            </tr>
                                            <tr>
                                                <td>শিক্ষাগত যোগ্যতা</td>
                                                <td><?= str_replace(range(0, 9), $bn_digits, $row['req_edu']); ?></td>
                                            </tr>
                                            <tr>
                                                <td>কী নিয়ে আসতে হবে তার তালিকা</td>
                                                <td><?= $row['req_things'] ?></td>
                                            </tr>
                                            <tr>
                                                <td>অন্যান্য বিশেষ যোগ্যতা</td>
                                                <td><?= $row['req_other'] ?></td>
                                            </tr>
                                        <?php }
                                    } ?>


                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>


        <!-- Modal -->
        <div id="arcCrseDonorMdl_<?= $all['c_id'] ?>" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">অর্থায়ন এর বিস্তারিত তথ্য</h4>
                    </div>
                    <div class="modal-body" style="max-height: 500px; overflow-y: auto">
                        <div class="row">
                            <div class="col-md-12">
                                <table width="100%" align="center" border='0' style="font-size: 12px">
                                    <tr>
                                        <td>প্রশিক্ষণ বর্ষ
                                            : <?= str_replace(range(0, 9), $bn_digits, $all['year']) ?></td>
                                        <td>অর্থায়ন : <?= $all['donor_name'] ?></td>
                                    </tr>
                                </table>
                                <br>
                                <?php
                                //$mmm=  json_decode($all['3'][0]['donation_details']);
                                $str = json_decode($all['3'][0]['donation_details'], true);
                                //$str = json_decode($str,true);
                                ?>
                                <table class="table table-striped table-bordered center"
                                       cellspacing="0" style="font-size: 12px;">
                                    <?php $total = 0;

                                    foreach ($str as $row) { ?>
                                        <tr>
                                            <td style="font-weight: 600; width:35%; text-align: right;">
                                                <?php
                                                if ($row['type'] == 1) {
                                                    echo 'প্রাপ্ত বরাদ্দ :';
                                                } else {
                                                    echo 'বরাদ্দ যোগ :';
                                                }
                                                ?>
                                            </td>
                                            <td style="text-align: left; padding-left: 15px;"><?= str_replace(range(0, 9), $bn_digits, $row["amount"]) ?>
                                                টাকা
                                            </td>
                                            <td style="font-weight: 600; text-align: right; width:12%">তারিখ :</td>
                                            <td style="text-align: left; width:20%;">
                                                <?php
                                                $tdate = explode('-', $row['date']);
                                                $ttdate = $tdate[2] . '-' . $tdate[1] . '-' . $tdate[0];
                                                echo str_replace(range(0, 9), $bn_digits, $ttdate);
                                                ?>
                                            </td>
                                        </tr>
                                        <?php
                                        $total += $row['amount'];
                                    } ?>
                                    <tr>
                                        <td style="text-align: right; font-weight: 600">সর্বমোট অর্থ :</td>
                                        <td colspan="3"
                                            style="text-align: left; padding-left: 15px; font-weight: 700"><?= str_replace(range(0, 9), $bn_digits, $total) ?>
                                            টাকা
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: right; font-weight: 600">সমাপ্ত কোর্স পর্যন্ত ব্যয় :</td>
                                        <td colspan="3"
                                            style="text-align: left; padding-left: 15px; font-weight: 700"><?= str_replace(range(0, 9), $bn_digits, $all['4'][0]['ExpnsE']) ?>
                                            টাকা
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: right; font-weight: 600">অবশিষ্ট :</td>
                                        <td colspan="3"
                                            style="text-align: left; padding-left: 15px; font-weight: 700"><?= str_replace(range(0, 9), $bn_digits, ($total - $all['4'][0]['ExpnsE'])) ?>
                                            টাকা
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    <?php }
    ?>

    <?php
    foreach ($current_course as $all) { ?>
        <!-- Modal -->
        <div id="currCrseMdl_<?= $all['c_id'] ?>" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">কোর্সের বিস্তারিত তথ্য</h4>
                    </div>
                    <div class="modal-body" style="max-height: 500px; overflow-y: auto">
                        <div class="row">
                            <div class="col-md-12">
                                <a href="<?= site_url('home/courseDetailsPdf/' . $all['c_id']) ?>" target="_blank">
                                    <span style="padding-right:15px; padding-top:10px;" class="pull-right">পিডিএফ</span>
                                </a>
                                <table width="100%" align="center" border='0' style="font-size: 12px">
                                    <tr>
                                        <td style="width:68%">কোর্স শিরোনাম : <?= $all['c_name'] ?></td>
                                        <td>মেয়াদ : <?= str_replace(range(0, 9), $bn_digits, $all['run_days']) ?>দিন
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>প্রশিক্ষণ বর্ষ
                                            : <?= str_replace(range(0, 9), $bn_digits, $all['year']) ?></td>
                                        <td>অর্থায়ন : <?= $all['donor_name'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>কোর্স শুরুর তারিখ : <?php
                                            $tDAte = explode('-', $all['start_date']);
                                            $TdAtE = $tDAte[2] . '-' . $tDAte[1] . '-' . $tDAte[0];
                                            echo str_replace(range(0, 9), $bn_digits, $TdAtE); ?>
                                        </td>
                                        <td>কোর্স সমাপ্তির তারিখ : <?php
                                            $tDAte = explode('-', $all['end_date']);
                                            $TdAtE = $tDAte[2] . '-' . $tDAte[1] . '-' . $tDAte[0];
                                            echo str_replace(range(0, 9), $bn_digits, $TdAtE); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>কোর্সের ধরণ : <?= $all['course_class_name'] ?></td>
                                        <td>প্রশিক্ষণার্থীর ধরণ : <?= $all['class_name'] ?></span></td>
                                    </tr>
                                    <tr>
                                        <td style="width:40%">প্রশিক্ষণার্থীর সংখ্যা মোট
                                            : <?= str_replace(range(0, 9), $bn_digits, $all['total_student']) ?>
                                            <?php
                                            $man = 0;
                                            $women = 0;
                                            if (sizeof($all['2']) == 0) {
                                            } else {
                                                foreach ($all['2'] as $key5 => $stu) {
                                                    if ($stu['gender'] == 1) {
                                                        $man = $stu['count'];
                                                    } else {
                                                        $women = $stu['count'];
                                                    }
                                                }

                                            }
                                            ?>
                                            (নারী : <?= str_replace(range(0, 9), $bn_digits, $women) ?>, পুরুষ
                                            : <?= str_replace(range(0, 9), $bn_digits, $man) ?>)
                                        </td>
                                        <td>গড় মূল্যায়ন
                                            : <?= str_replace(range(0, 9), $bn_digits, $all['1']['0']['avg']) ?></span></td>
                                    </tr>
                                </table>
                                <br>
                                <h5>প্রশিক্ষণ কোর্স ভিত্তিক শর্ত/যোগ্যতা</h5>
                                <table class="table table-striped table-bordered center"
                                       cellspacing="0" style="font-size: 12px;">

                                    <?php
                                    if (sizeof($all['5']) == 0) {
                                        ?>
                                        <tr>
                                            <td colspan="2">প্রশিক্ষণ কোর্স ভিত্তিক শর্ত/যোগ্যতা নির্ধারণ করা হয় নাই
                                            </td>
                                        </tr>
                                    <?php } else {
                                        foreach ($all['5'] as $row) { ?>
                                            <tr>
                                                <td>অংশগ্রহণকারী বয়স</td>
                                                <td><?= str_replace(range(0, 9), $bn_digits, $row['req_age']); ?></td>
                                            </tr>
                                            <tr>
                                                <td>শিক্ষাগত যোগ্যতা</td>
                                                <td><?= str_replace(range(0, 9), $bn_digits, $row['req_edu']); ?></td>
                                            </tr>
                                            <tr>
                                                <td>কী নিয়ে আসতে হবে তার তালিকা</td>
                                                <td><?= $row['req_things'] ?></td>
                                            </tr>
                                            <tr>
                                                <td>অন্যান্য বিশেষ যোগ্যতা</td>
                                                <td><?= $row['req_other'] ?></td>
                                            </tr>
                                        <?php }
                                    } ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>


        <!-- Modal -->
        <div id="currCrseDonorMdl_<?= $all['c_id'] ?>" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">অর্থায়ন এর বিস্তারিত তথ্য</h4>
                    </div>
                    <div class="modal-body" style="max-height: 500px; overflow-y: auto">
                        <div class="row">
                            <div class="col-md-12">
                                <table width="100%" align="center" border='0' style="font-size: 12px">
                                    <tr>
                                        <td>প্রশিক্ষণ বর্ষ
                                            : <?= str_replace(range(0, 9), $bn_digits, $all['year']) ?></td>
                                        <td>অর্থায়ন : <?= $all['donor_name'] ?></td>
                                    </tr>
                                </table>
                                <br>
                                <?php
                                //$mmm=  json_decode($all['3'][0]['donation_details']);
                                $str = json_decode($all['3'][0]['donation_details'], true);
                                //$str = json_decode($str,true);
                                ?>
                                <table class="table table-striped table-bordered center"
                                       cellspacing="0" style="font-size: 12px;">
                                    <?php $total = 0;

                                    foreach ($str as $row) { ?>
                                        <tr>
                                            <td style="font-weight: 600; width:35%; text-align: right;">
                                                <?php
                                                if ($row['type'] == 1) {
                                                    echo 'প্রাপ্ত বরাদ্দ :';
                                                } else {
                                                    echo 'বরাদ্দ যোগ :';
                                                }
                                                ?>
                                            </td>
                                            <td style="text-align: left; padding-left: 15px;"><?= str_replace(range(0, 9), $bn_digits, $row["amount"]) ?>
                                                টাকা
                                            </td>
                                            <td style="font-weight: 600; text-align: right; width:12%">তারিখ :</td>
                                            <td style="text-align: left; width:20%;">
                                                <?php
                                                $tdate = explode('-', $row['date']);
                                                $ttdate = $tdate[2] . '-' . $tdate[1] . '-' . $tdate[0];
                                                echo str_replace(range(0, 9), $bn_digits, $ttdate);
                                                ?>
                                            </td>
                                        </tr>
                                        <?php
                                        $total += $row['amount'];
                                    } ?>
                                    <tr>
                                        <td style="text-align: right; font-weight: 600">সর্বমোট অর্থ :</td>
                                        <td colspan="3"
                                            style="text-align: left; padding-left: 15px; font-weight: 700"><?= str_replace(range(0, 9), $bn_digits, $total) ?>
                                            টাকা
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: right; font-weight: 600">এই খাতে সমাপ্ত কোর্স পর্যন্ত বায়
                                            :
                                        </td>
                                        <td colspan="3"
                                            style="text-align: left; padding-left: 15px; font-weight: 700"><?= str_replace(range(0, 9), $bn_digits, $all['4'][0]['ExpnsE']) ?>
                                            টাকা
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: right; font-weight: 600">অবশিষ্ট :</td>
                                        <td colspan="3"
                                            style="text-align: left; padding-left: 15px; font-weight: 700"><?= str_replace(range(0, 9), $bn_digits, ($total - $all['4'][0]['ExpnsE'])) ?>
                                            টাকা
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    <?php }
    ?>

    <?php
    foreach ($future_course as $all) { ?>
        <!-- Modal -->
        <div id="fuCrseMdl_<?= $all['c_id'] ?>" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">কোর্সের বিস্তারিত তথ্য</h4>
                    </div>
                    <div class="modal-body" style="max-height: 500px; overflow-y: auto">
                        <div class="row">
                            <div class="col-md-12">
                                <a href="<?= site_url('home/courseDetailsPdf/' . $all['c_id']) ?>" target="_blank">
                                    <span style="padding-right:15px; padding-top:10px;" class="pull-right">পিডিএফ</span>
                                </a>
                                <table width="100%" align="center" border='0' style="font-size: 12px">
                                    <tr>
                                        <td style="width:68%">কোর্স শিরোনাম : <?= $all['c_name'] ?></td>
                                        <td>মেয়াদ : <?= str_replace(range(0, 9), $bn_digits, $all['run_days']) ?>দিন
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>প্রশিক্ষণ বর্ষ
                                            : <?= str_replace(range(0, 9), $bn_digits, $all['year']) ?></td>
                                        <td>অর্থায়ন : <?= $all['donor_name'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>কোর্স শুরুর তারিখ : <?php
                                            $tDAte = explode('-', $all['start_date']);
                                            $TdAtE = $tDAte[2] . '-' . $tDAte[1] . '-' . $tDAte[0];
                                            echo str_replace(range(0, 9), $bn_digits, $TdAtE); ?>
                                        </td>
                                        <td>কোর্স সমাপ্তির তারিখ : <?php
                                            $tDAte = explode('-', $all['end_date']);
                                            $TdAtE = $tDAte[2] . '-' . $tDAte[1] . '-' . $tDAte[0];
                                            echo str_replace(range(0, 9), $bn_digits, $TdAtE); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>কোর্সের ধরণ : <?= $all['course_class_name'] ?></td>
                                        <td>প্রশিক্ষণার্থীর ধরণ : <?= $all['class_name'] ?></span></td>
                                    </tr>
                                    <tr>
                                        <td style="width:40%">প্রশিক্ষণার্থীর সংখ্যা মোট
                                            : <?= str_replace(range(0, 9), $bn_digits, $all['total_student']) ?>
                                            <?php
                                            $man = 0;
                                            $women = 0;
                                            if (sizeof($all['2']) == 0) {
                                            } else {
                                                foreach ($all['2'] as $key5 => $stu) {
                                                    if ($stu['gender'] == 1) {
                                                        $man = $stu['count'];
                                                    } else {
                                                        $women = $stu['count'];
                                                    }
                                                }

                                            }
                                            ?>
                                            (নারী : <?= str_replace(range(0, 9), $bn_digits, $women) ?>, পুরুষ
                                            : <?= str_replace(range(0, 9), $bn_digits, $man) ?>)
                                        </td>
                                        <td>গড় মূল্যায়ন
                                            : <?= str_replace(range(0, 9), $bn_digits, $all['1']['0']['avg']) ?></span></td>
                                    </tr>
                                </table>
                                <br>
                                <h5>প্রশিক্ষণ কোর্স ভিত্তিক শর্ত/যোগ্যতা</h5>
                                <table class="table table-striped table-bordered center"
                                       cellspacing="0" style="font-size: 12px;">

                                    <?php
                                    if (sizeof($all['5']) == 0) {
                                        ?>
                                        <tr>
                                            <td colspan="2">প্রশিক্ষণ কোর্স ভিত্তিক শর্ত/যোগ্যতা নির্ধারণ করা হয় নাই
                                            </td>
                                        </tr>
                                    <?php } else {
                                        foreach ($all['5'] as $row) { ?>
                                            <tr>
                                                <td>অংশগ্রহণকারী বয়স</td>
                                                <td><?= str_replace(range(0, 9), $bn_digits, $row['req_age']); ?></td>
                                            </tr>
                                            <tr>
                                                <td>শিক্ষাগত যোগ্যতা</td>
                                                <td><?= str_replace(range(0, 9), $bn_digits, $row['req_edu']); ?></td>
                                            </tr>
                                            <tr>
                                                <td>কী নিয়ে আসতে হবে তার তালিকা</td>
                                                <td><?= $row['req_things'] ?></td>
                                            </tr>
                                            <tr>
                                                <td>অন্যান্য বিশেষ যোগ্যতা</td>
                                                <td><?= $row['req_other'] ?></td>
                                            </tr>
                                        <?php }
                                    } ?>
                                </table>
                                <br>
                                <div style="text-align: center" class="col-md-12">
                                    <a class="btn btn-success" href="<?= site_url('home/online_registration') ?>"
                                       target="_blank">অনলাইন রেজিস্ট্রেশন</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>


        <!-- Modal -->
        <div id="fuCrseDonorMdl_<?= $all['c_id'] ?>" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">অর্থায়ন এর বিস্তারিত তথ্য</h4>
                    </div>
                    <div class="modal-body" style="max-height: 500px; overflow-y: auto">
                        <div class="row">
                            <div class="col-md-12">
                                <table width="100%" align="center" border='0' style="font-size: 12px">
                                    <tr>
                                        <td>প্রশিক্ষণ বর্ষ
                                            : <?= str_replace(range(0, 9), $bn_digits, $all['year']) ?></td>
                                        <td>অর্থায়ন : <?= $all['donor_name'] ?></td>
                                    </tr>
                                </table>
                                <br>
                                <?php
                                //$mmm=  json_decode($all['3'][0]['donation_details']);
                                $str = json_decode($all['3'][0]['donation_details'], true);
                                //$str = json_decode($str,true);
                                ?>
                                <table class="table table-striped table-bordered center"
                                       cellspacing="0" style="font-size: 12px;">
                                    <?php $total = 0;

                                    foreach ($str as $row) { ?>
                                        <tr>
                                            <td style="font-weight: 600; width:35%; text-align: right;">
                                                <?php
                                                if ($row['type'] == 1) {
                                                    echo 'প্রাপ্ত বরাদ্দ :';
                                                } else {
                                                    echo 'বরাদ্দ যোগ :';
                                                }
                                                ?>
                                            </td>
                                            <td style="text-align: left; padding-left: 15px;"><?= str_replace(range(0, 9), $bn_digits, $row["amount"]) ?>
                                                টাকা
                                            </td>
                                            <td style="font-weight: 600; text-align: right; width:12%">তারিখ :</td>
                                            <td style="text-align: left; width:20%;">
                                                <?php
                                                $tdate = explode('-', $row['date']);
                                                $ttdate = $tdate[2] . '-' . $tdate[1] . '-' . $tdate[0];
                                                echo str_replace(range(0, 9), $bn_digits, $ttdate);
                                                ?>
                                            </td>
                                        </tr>
                                        <?php
                                        $total += $row['amount'];
                                    } ?>
                                    <tr>
                                        <td style="text-align: right; font-weight: 600">সর্বমোট অর্থ :</td>
                                        <td colspan="3"
                                            style="text-align: left; padding-left: 15px; font-weight: 700"><?= str_replace(range(0, 9), $bn_digits, $total) ?>
                                            টাকা
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: right; font-weight: 600">এই খাতে সমাপ্ত কোর্স পর্যন্ত বায়
                                            :
                                        </td>
                                        <td colspan="3"
                                            style="text-align: left; padding-left: 15px; font-weight: 700"><?= str_replace(range(0, 9), $bn_digits, $all['4'][0]['ExpnsE']) ?>
                                            টাকা
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: right; font-weight: 600">অবশিষ্ট :</td>
                                        <td colspan="3"
                                            style="text-align: left; padding-left: 15px; font-weight: 700"><?= str_replace(range(0, 9), $bn_digits, ($total - $all['4'][0]['ExpnsE'])) ?>
                                            টাকা
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    <?php }
    ?>

    <?php $this->load->view('public_layout/footerlink'); ?>
    <script type="text/javascript">

        var donors = [];
        <?php
        foreach ($donors as $k=>$d){ ?>
        donors.push('<?=$d['year']?>');
        <?php }
        ?>

        ///////course///////////
        var rajoso = [];
        var cdf = [];
        var other = [];

        //////rajosso///////
        <?php
        foreach ($course_rajosso as $k=>$c){ ?>
        rajoso.push(<?= $c['t']?>);
        <?php }
        ?>
        //////cdf///////
        <?php
        foreach ($course_cdf as $k=>$c){ ?>
        cdf.push(<?= $c['t']?>);
        <?php }
        ?>
        //////other///////
        <?php
        foreach ($course_other as $k=>$c){ ?>
        other.push(<?= $c['t']?>);
        <?php }
        ?>
        ////////////budget/////////
        var b_rajoso = [];
        var b_cdf = [];
        var b_other = [];

        //////rajosso///////
        <?php
        foreach ($budget_rajosso as $k=>$c){
        if ($c['t'] == '' || $c['t'] == null) {
            $c['t'] = 0;
        }
        ?>
        b_rajoso.push(<?= $c['t']?>);
        <?php }
        ?>
        //////cdf///////
        <?php
        foreach ($budget_cdf as $k=>$c){
        if ($c['t'] == '' || $c['t'] == null) {
            $c['t'] = 0;
        }
        ?>
        b_cdf.push(<?= $c['t']?>);
        <?php }
        ?>
        //////other///////
        <?php
        foreach ($budget_other as $k=>$c){
        if ($c['t'] == '' || $c['t'] == null) {
            $c['t'] = 0;
        }
        ?>
        b_other.push(<?= $c['t']?>);
        <?php }
        ?>
        /////course number
        $(function () {
            Highcharts.chart('container1', {

                chart: {
                    type: 'column'
                },

                title: {
                    text: 'কোর্স সংখ্যা'
                },

                xAxis: {
                    categories: donors
                },

                yAxis: {
                    allowDecimals: false,
                    min: 0,
                    title: {
                        text: 'কোর্স সংখ্যা'
                    }
                },

                tooltip: {
                    formatter: function () {
                        return '<b>' + this.x + '</b><br/>' +
                            this.series.name + ': ' + this.y + '<br/>' +
                            'মোট: ' + this.point.stackTotal;
                    }
                },

                plotOptions: {
                    column: {
                        stacking: 'normal'
                    }
                },

                series: [{
                    name: 'রাজস্ব',
                    data: rajoso,
                    stack: 'male'
                }, {
                    name: 'সিডিএফ',
                    data: cdf,
                    stack: 'male'
                }, {
                    name: 'প্রকল্প/অন্যান্য',
                    data: other,
                    stack: 'male'
                }]
            });
        });
        //////course budget
        $(function () {
            Highcharts.chart('container2', {

                chart: {
                    type: 'column'
                },

                title: {
                    text: 'প্রশিক্ষণ বাজেট বরাদ্দ'
                },

                xAxis: {
                    categories: donors
                },

                yAxis: {
                    allowDecimals: false,
                    min: 0,
                    title: {
                        text: 'টাকা'
                    }
                },

                tooltip: {
                    formatter: function () {
                        return '<b>' + this.x + '</b><br/>' +
                            this.series.name + ': ' + this.y + '<br/>' +
                            'মোট: ' + this.point.stackTotal;
                    }
                },

                plotOptions: {
                    column: {
                        stacking: 'normal'
                    }
                },

                series: [{
                    name: 'রাজস্ব',
                    data: b_rajoso,
                    stack: 'male'
                }, {
                    name: 'সিডিএফ',
                    data: b_cdf,
                    stack: 'male'
                }, {
                    name: 'প্রকল্প/অন্যান্য',
                    data: b_other,
                    stack: 'male'
                }]
            });
        });

        //////trainee number
        $(function () {
            Highcharts.chart('container11', {

                chart: {
                    type: 'column'
                },

                title: {
                    text: 'প্রশিক্ষণার্থী সংখ্যা'
                },

                xAxis: {
                    categories: ['<?= str_replace(range(0,9),$bn_digits,$curr_y)?>']
                },

                yAxis: {
                    allowDecimals: false,
                    min: 0,
                    title: {
                        text: 'প্রশিক্ষণার্থী সংখ্যা'
                    }
                },

                tooltip: {
                    formatter: function () {
                        return '<b>' + this.x + '</b><br/>' +
                            this.series.name + ': ' + this.y + '<br/>' +
                            'মোট: ' + this.point.stackTotal;
                    }
                },

                plotOptions: {
                    column: {
                        stacking: 'normal'
                    }
                },

                series: [{
                    name: 'পুরুষ',
                    data: [<?= $trainee_male[0]['t']?>],
                    stack: 'male'
                }, {
                    name: 'নারী',
                    data: [<?= $trainee_female[0]['t']?>],
                    stack: 'male'
                }]
            });
        });
        


        ////apa all course
        var sub1T = [];
        var sub1A = [];
        var sub1P = [];
        var sub2T = [];
        var sub2A = [];
        var sub2P = [];
        <?php
        foreach ($crseTrgt as $k=>$c){
        if ($c['apa_value'] == '' || $c['apa_value'] == null) {
            $c['apa_value'] = 0;
        }
        ?>
        sub1T.push(<?= $c['apa_value']?>);
        <?php }
        ?>

        <?php
        foreach ($crseAchv as $k=>$c){
        if ($c['apa_value'] == '' || $c['apa_value'] == null) {
            $c['apa_value'] = 0;
        }
        ?>
        sub1A.push(<?= $c['apa_value']?>);
        <?php }
        ?>

        <?php
        foreach ($crsePrcntg as $k=>$c){
        if ($c['apa_value'] == '' || $c['apa_value'] == null) {
            $c['apa_value'] = 0;
        }
        ?>
        sub1P.push(<?= $c['apa_value']?>);
        <?php }
        ?>

        <?php
        foreach ($trnTrgt as $k=>$c){
        if ($c['apa_value'] == '' || $c['apa_value'] == null) {
            $c['apa_value'] = 0;
        }
        ?>
        sub2T.push(<?= $c['apa_value']?>);
        <?php }
        ?>
        <?php
        foreach ($trnAchv as $k=>$c){
        if ($c['apa_value'] == '' || $c['apa_value'] == null) {
            $c['apa_value'] = 0;
        }
        ?>
        sub2A.push(<?= $c['apa_value']?>);
        <?php }
        ?>
        <?php
        foreach ($trnPrcntg as $k=>$c){
        if ($c['apa_value'] == '' || $c['apa_value'] == null) {
            $c['apa_value'] = 0;
        }
        ?>
        sub2P.push(<?= $c['apa_value']?>);
        <?php }
        ?>
        $(function () {
            Highcharts.chart('container3', {

                chart: {
                    type: 'column'
                },

                title: {
                    text: 'মোট কোর্স সংখ্যা'
                },

                xAxis: {
                    categories: ['রাজস্ব', 'সিডিএফ', 'প্রকল্প/অন্যান্য']
                },

                yAxis: {
                    allowDecimals: false,
                    min: 0,
                    title: {
                        text: 'কোর্স সংখ্যা'
                    }
                },

                tooltip: {
                    formatter: function () {
                        return '<b>' + this.x + '</b><br/>' +
                            this.series.name + ': ' + this.y + '<br/>';
                        /* +
                         'Total: ' + this.point.stackTotal;*/
                    }
                },

                plotOptions: {
                    column: {
                        stacking: 'normal'
                    }
                },

                series: [{
                    name: 'লক্ষ্যমাত্রা',
                    data: sub1T,
                    stack: 'target'
                }, {
                    name: 'অর্জন',
                    data: sub1A,
                    stack: 'achieve'
                }, {
                    name: 'হার',
                    data: sub1P,
                    stack: 'percentage'
                }]
            });
        });
        /////apa all trainee
        $(function () {
            Highcharts.chart('container4', {

                chart: {
                    type: 'column'
                },

                title: {
                    text: 'মোট প্রশিক্ষণার্থী সংখ্যা'
                },

                xAxis: {
                    categories: ['রাজস্ব', 'সিডিএফ', 'প্রকল্প/অন্যান্য']
                },

                yAxis: {
                    allowDecimals: false,
                    min: 0,
                    title: {
                        text: 'প্রশিক্ষণার্থী সংখ্যা'
                    }
                },

                tooltip: {
                    formatter: function () {
                        return '<b>' + this.x + '</b><br/>' +
                            this.series.name + ': ' + this.y + '<br/>';
                        /* +
                         'Total: ' + this.point.stackTotal;*/
                    }
                },

                plotOptions: {
                    column: {
                        stacking: 'normal'
                    }
                },

                series: [{
                    name: 'লক্ষ্যমাত্রা',
                    data: sub2T,
                    stack: 'target'
                }, {
                    name: 'অর্জন',
                    data: sub2A,
                    stack: 'achieve'
                }, {
                    name: 'হার',
                    data: sub2P,
                    stack: 'percentage'
                }]
            });
        });

        var course_val = new Array();
        <?php foreach($course_per as $key => $val){ ?>
        course_val.push({name: '<?php echo $val['c_name']; ?>', y: <?php echo $val['person']; ?>});
        //console.log(course_val);
        <?php } ?>

        $(function () {
            Highcharts.chart('container5', {
                chart: {
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false,
                    type: 'pie'
                },
                title: {
                    text: 'প্রশিক্ষণের ধরণ ভিত্তিক বিভাজন'
                },
                tooltip: {
                    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                },
                plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: {
                            enabled: true,
                            format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                            style: {
                                color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                            }
                        }
                    }
                },
                series: [{
                    name: 'প্রশিক্ষণার্থী',
                    colorByPoint: true,
                    data: course_val
                }]
            });

        });


    </script>
    <script type="text/javascript">
        var tpj = jQuery;
        tpj.noConflict();
        tpj(document).ready(function () {
            if (tpj.fn.cssOriginal != undefined)
                tpj.fn.css = tpj.fn.cssOriginal;

            var api = tpj('.fullwidthbanner').revolution(
                {
                    delay: 8000,
                    startwidth: 1170,
                    startheight: 500,

                    onHoverStop: "on",						// Stop Banner Timet at Hover on Slide on/off

                    thumbWidth: 100,							// Thumb With and Height and Amount (only if navigation Tyope set to thumb !)
                    thumbHeight: 50,
                    thumbAmount: 3,

                    hideThumbs: 0,
                    navigationType: "none",				// bullet, thumb, none
                    navigationArrows: "solo",				// nexttobullets, solo (old name verticalcentered), none

                    navigationStyle: "round",				// round,square,navbar,round-old,square-old,navbar-old, or any from the list in the docu (choose between 50+ different item), custom


                    navigationHAlign: "center",				// Vertical Align top,center,bottom
                    navigationVAlign: "bottom",					// Horizontal Align left,center,right
                    navigationHOffset: 30,
                    navigationVOffset: 40,

                    soloArrowLeftHalign: "left",
                    soloArrowLeftValign: "center",
                    soloArrowLeftHOffset: 0,
                    soloArrowLeftVOffset: 0,

                    soloArrowRightHalign: "right",
                    soloArrowRightValign: "center",
                    soloArrowRightHOffset: 0,
                    soloArrowRightVOffset: 0,

                    touchenabled: "on",						// Enable Swipe Function : on/off


                    stopAtSlide: -1,							// Stop Timer if Slide "x" has been Reached. If stopAfterLoops set to 0, then it stops already in the first Loop at slide X which defined. -1 means do not stop at any slide. stopAfterLoops has no sinn in this case.
                    stopAfterLoops: -1,						// Stop Timer if All slides has been played "x" times. IT will stop at THe slide which is defined via stopAtSlide:x, if set to -1 slide never stop automatic

                    hideCaptionAtLimit: 0,					// It Defines if a caption should be shown under a Screen Resolution ( Basod on The Width of Browser)
                    hideAllCaptionAtLilmit: 0,				// Hide all The Captions if Width of Browser is less then this value
                    hideSliderAtLimit: 0,					// Hide the whole slider, and stop also functions if Width of Browser is less than this value


                    fullWidth: "on",

                    shadow: 1								//0 = no Shadow, 1,2,3 = 3 Different Art of Shadows -  (No Shadow in Fullwidth Version !)

                });


            // TO HIDE THE ARROWS SEPERATLY FROM THE BULLETS, SOME TRICK HERE:
            // YOU CAN REMOVE IT FROM HERE TILL THE END OF THIS SECTION IF YOU DONT NEED THIS !
            api.bind("revolution.slide.onloaded", function (e) {


                jQuery('.tparrows').each(function () {
                    var arrows = jQuery(this);

                    var timer = setInterval(function () {

                        if (arrows.css('opacity') == 1 && !jQuery('.tp-simpleresponsive').hasClass("mouseisover"))
                            arrows.fadeOut(300);
                    }, 3000);
                })

                jQuery('.tp-simpleresponsive, .tparrows').hover(function () {
                    jQuery('.tp-simpleresponsive').addClass("mouseisover");
                    jQuery('body').find('.tparrows').each(function () {
                        jQuery(this).fadeIn(300);
                    });
                }, function () {
                    if (!jQuery(this).hasClass("tparrows"))
                        jQuery('.tp-simpleresponsive').removeClass("mouseisover");
                })
            });
            //END OF THE SECTION, HIDE MY ARROWS SEPERATLY FROM THE BULLETS
        });
    </script>
</body>
</html>