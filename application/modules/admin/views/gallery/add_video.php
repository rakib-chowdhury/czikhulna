<?php $bn_digits = array('০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯'); ?>
<div id="load_img" style="position: absolute;z-index: 1000;top: 50%;left: 40%;display:none;"><img
        src="<?= base_url(); ?>assets/img/load_img.gif" alt=""></div>
<style>
    .fixed_width {
        width;
        32%;
    }

</style>
<div class="container-fluid display-table">
    <div class="row display-table-row">
        <?php $this->load->view('layouts/sidebar-nav'); ?>
        <div class="col-md-10 display-table-cell" style="padding-bottom:0px!important;">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-hover ">
                        <h2 style="text-align: center"><?= $page_title ?></h2>
                        <hr>
                        <?php if ($this->session->flashdata('message')) { ?>
                            <p style="text-align: center; color: green"><?= $this->session->flashdata('message') ?></p>
                        <?php } ?>

                        <div class="row">
                            <div class="col-sm-4">
                                <form class="form-horizontal" id="add_user_form"
                                      action="<?php echo site_url('admin/addGalleryPost'); ?>" method="post">
                                    <div class="form-group">
                                        <label for="" class="col-sm-4">ভিডিও আইডি</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="vdo_link" class="form-control" required>
                                            <span style="color: red;" id="details_err"></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-sm-4">বিস্তারিত</label>
                                        <div class="col-sm-8">
                                            <textarea type="text" name="p_des" class="form-control" ></textarea>
                                            <span style="color: red;"></span>
                                        </div>
                                    </div>

                                    <div class="form-group" style="text-align: center">
                                        <button class="btn" type="submit" name="s_btn" value="add"
                                                style="background: #8bc541; color: whitesmoke;">সংযোজন করুন
                                        </button>
                                    </div>

                                </form>
                            </div>
                            <div class="col-sm-8" style="max-height:350px; overflow-y:auto; border-left:1px solid black">
                                <div class="form-group col-md-12">
                                    <label class="form-control" for="">ধাপ ১: ইউটউব এ আপনার ভিডিও টি বের করুন।</label>
                                    <div class="col-md-10 col-md-offset-1">
                                        <img style="width:100%; height:350px;" src="<?= base_url()?>/public_assets/gallery/step1.png" alt="">
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <label class="form-control" for="">ধাপ ২: ভিডিও এর নিচে "Share" লিখায় ক্লিক করুন।</label>
                                    <div class="col-md-10 col-md-offset-1">
                                        <img style="width:100%; height:350px;" src="<?= base_url()?>/public_assets/gallery/step2.png" alt="">
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <label class="form-control" for="">ধাপ ৩: নিচের ছবিতে দেখানো জায়গা থেকে লিংকটি কপি করুন এবং "ভিডিও আইডি" এ পেস্ট করুন ।</label>
                                    <div class="col-md-10 col-md-offset-1">
                                        <img style="width:100%; height:350px;" src="<?= base_url()?>/public_assets/gallery/step3.png" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <footer id="admin-footer">
                    <p class="text-center">Copyright &copy; 2016. All right resereved</p>
                </footer>
            </div>
        </div>
    </div>
</div>


<?php $this->load->view('layouts/footer'); ?>

