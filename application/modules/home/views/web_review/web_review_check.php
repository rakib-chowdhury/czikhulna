<?php $bn_digits = array('০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯'); ?>
<body>
<!-- Container -->
<div id="container">
    <?php $this->load->view('public_layout/header'); ?>

    <!-- content ================================================== -->
    <div id="content">

        <!-- Page Banner -->
        <div class="page-banner about-banner">
            <div class="container">
                <ul class="page-tree">
                    <li><a href="<?= site_url('home')?>">Czi Khulna</a></li>
                    <li><a href="<?= site_url('home/web_review')?>">কোর্স মূল্যায়ন</a></li>
                </ul>
            </div>
        </div>

        <h1 class="page-title about-title">
            <span style="background: #8bc541; color: whitesmoke;">কোর্স মূল্যায়ন</span>
        </h1>

        <!-- member section -->
        <div class="members-section">
            <div class="title-section">
                <div class="container triggerAnimation animated" data-animate="bounceIn">
                    <div class="row">
                        <div
                            class="col-xs-12 col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3 col-sm-6 col-sm-offset-3">
                            <form action="<?= site_url('home/web_reviews') ?>" method="post">
                                <div class="form-group" style="padding-bottom: 30px;">
                                    <label for="" class="control-label col-md-3 col-sm-3 col-lg-3"
                                           style="text-align: right; padding-top: 5px;">চলমান কোর্স</label>
                                    <div class="col-md-9 col-sm-9 col-lg-9">
                                        <select name="courseID" id="courseID" class="form-control" required>
                                            <?php
                                            foreach ($courseList as $key => $c) {
                                                $tDAte = explode('-', $c['start_date']);
                                                $TdAtE = $tDAte[2] . '/' . $tDAte[1] . '/' . $tDAte[0];
                                                $tDAte1 = explode('-', $c['end_date']);
                                                $TdAtE1 = $tDAte1[2] . '/' . $tDAte1[1] . '/' . $tDAte1[0];
                                                ?>
                                                <option value="<?= $c['id'] ?>"><?= $c['c_name'] ?>
                                                    (<?= str_replace(range(0, 9), $bn_digits, $TdAtE) ?>
                                                    - <?= str_replace(range(0, 9), $bn_digits, $TdAtE1) ?>)
                                                </option>
                                            <?php } ?>
                                        </select>
                                        <span style="color: red" id="c_err"></span>
                                    </div>
                                </div>
                                <!--<div class="form-group" style="padding-bottom: 30px;">
                                    <label for="" class="control-label col-md-3 col-sm-3 col-lg-3"
                                           style="text-align: right; padding-top: 5px;">প্রশিক্ষণার্থী</label>
                                    <div class="col-md-9 col-sm-9 col-lg-9">
                                        <input type="text" minlength="17" maxlength="17" name="nid" id="nid" required
                                               class="form-control" placeholder="প্রশিক্ষণার্থীর জাতীয় পরিচয়পত্র নং">
                                        <span style="color: peru;">প্রশিক্ষণার্থীর জাতীয় পরিচয়পত্র নং</span>
                                    </div>
                                </div>-->
                                <?php if ($this->session->flashdata('msg')) { ?>
                                    <div class="form-group" style="padding-bottom: 10px; padding-top: 30px;">
                                        <p id="err"
                                           style="color: red; text-align: center;"><?php echo $this->session->flashdata('msg'); ?></p>
                                    </div>
                                <?php } ?>
                                <?php if ($this->session->flashdata('msg2')) { ?>
                                    <div class="form-group" style="padding-bottom: 10px; padding-top: 30px;">
                                        <p id="err"
                                           style="color: green; text-align: center;"><?php echo $this->session->flashdata('msg2'); ?></p>
                                    </div>
                                <?php } ?>
                                <div class="form-group" style="text-align: center; margin-top: 50px;">
                                    <button type="submit" class="btn btn-success">কোর্স মূল্যায়ন করুন</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End content -->
    <?php $this->load->view('public_layout/footer'); ?>
</div>
<!-- End Container -->
<?php $this->load->view('public_layout/footerlink'); ?>

</body>
</html>



