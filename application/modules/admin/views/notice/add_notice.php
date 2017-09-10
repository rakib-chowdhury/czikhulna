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
        <div class="col-md-10 display-table-cell" id="main-content">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-hover ">
                        <h2 style="text-align: center">নোটিশ সংযোজন</h2>
                        <?php
                             if($this->session->flashdata('message')){ ?>
                                <p style="text-align: center; color: red; margin-top: 30px; font-size: 20px;"><?= $this->session->flashdata('message')?></p>
                        <?php }
                        ?>
                        <hr>
                        <form action="<?php echo site_url('admin/add_notice_post'); ?>" method="post">
                            <div class="">
                                <div class="row">
                                    <div class="form-group col-md-10 col-md-offset-1">
                                        <label for="notice_title" class="col-md-1 control-label"
                                               style="text-align: right">বিষয়</label>
                                        <div class="col-md-11">
                                            <input type="text" name="notice_title" id="notice_title" class="form-control">
                                            <span style="color: red;" id="crs_err"></span>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-10 col-md-offset-1">
                                        <label for="notice_details" class="col-md-1 control-label"
                                               style="text-align: right">বিস্তারিত</label>
                                        <div class="col-md-11">
                                            <textarea name="notice_details" id="notice_details" class="summernote"></textarea>
                                            <span style="color: red;" id="notice_details_err"></span>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-10 col-md-offset-1" style="text-align: center">
                                        <button type="submit" class="btn btn-success btn-raised">সংযোজন করুন</button>
                                    </div>
                                </div>
                            </div>
                        </form>

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

<script>
   

</script>
