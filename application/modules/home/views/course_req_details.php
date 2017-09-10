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
                        <li><a href="<?= site_url('home/course_requirement') ?>">কোর্স সম্পর্কিত তথ্য</a></li>
                    </ul>
                </div>
            </div>

            <h1 class="page-title about-title"><span style="color: whitesmoke; background: #8bc541;">কোর্স সম্পর্কিত তথ্য</span>
            </h1>

            <!-- accord - skills with background image -->
            <div class="accord-skills white-back">
                <div class="title-section">
                    <div class="container triggerAnimation animated" data-animate="bounceIn">
                        <h1><?=$cName?> সম্পর্কিত তথ্য</h1>
                    </div>
                </div>


                <div class="accord-skills-container container">
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-lg-10 col-lg-offset-1 col-xs-12">
                            <div class="accordion-box triggerAnimation animated" data-animate="fadeInLeft">
                                <?php
                                      if(sizeof($crse_req_dtls)==0){ ?>
                                         <div class="row" style="text-align:center">
                                            <p style="font-size:16px;">প্রশিক্ষণ কোর্স ভিত্তিক শর্ত/যোগ্যতা নির্ধারণ করা হয় নাই</p>
                                         </div>
                                      <?php }else{ ?>
                                         <div class="row">
                                              <div class="form-group" style="margin-bottom: 40px;">                                                                                                         
                                                   <table class="table table-bordered">
                                                        <tr>
                                                            <td>অংশগ্রহণকারী বয়স</td>
                                                            <td><?= str_replace(range(0, 9), $bn_digits, $crse_req_dtls[0]['req_age']); ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>শিক্ষাগত যোগ্যতা</td>
                                                            <td><?= str_replace(range(0, 9), $bn_digits, $crse_req_dtls[0]['req_edu']); ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>কী নিয়ে আসতে হবে তার তালিকা</td>
                                                            <td><?= $crse_req_dtls[0]['req_things'] ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>অন্যান্য বিশেষ যোগ্যতা</td>
                                                            <td><?= $crse_req_dtls[0]['req_other'] ?></td>
                                                        </tr>
                                                   </table>
                                              </div>
                                         </div>
                                      <?php }
                                ?>
                                                                  
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