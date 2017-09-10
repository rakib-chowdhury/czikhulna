<?php $bn_digits = array('০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯'); ?>
<body>
<!-- Container -->
<div id="container">
    <?php $this->load->view('public_layout/header'); ?>

    <!-- content ================================================== -->
    <div id="content">
        <div class="members-section" style="padding-top: 30px !important;">
            <div class="title-section">
                <div class="container triggerAnimation animated" data-animate="bounceIn">
                    <div class="col-md-11 col-md-offset-1">
                        <div class=" panel col-md-3 " style="border-color: black; margin-right: 2px;">
                            <div class="row">
                                <div class="col-md-12" style="padding: 0px">
                                    <table class="table-responsive table table-bordered"
                                           style="margin: 5px; width: 95%">
                                        <tr>
                                            <td>
                                                <a>
                                                    <img style="width: 100%; height: 100%; border-radius: 50%"
                                                         src="<?= base_url() ?>uploads/user/no_img.png" alt="">
                                                </a>
                                            </td>
                                        </tr>
                                        <tr style="padding-left: 3px;">
                                            <td>user name</td>
                                        </tr>
                                        <tr style="padding-left: 3px;">
                                            <td><?= str_replace(range(0, 9), $bn_digits, $this->session->userdata('user_nid')) ?></td>
                                        </tr>
                                        <tr style="padding-left: 3px;">
                                            <td><a href="<?= site_url('home/password_change')?>">পাসওয়ার্ড পরিবর্তন</a></td>
                                        </tr>

                                        <tr style="padding-left: 3px;">
                                            <td>
                                                <a style="color: red"
                                                   href="<?= site_url('logout') ?>"><span class="fa fa-sign-out"></span>
                                                    লগআউট</a>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class=" panel col-md-8 " style="border-color: black; margin-left: 2px;">
                            <form onsubmit="return checkSubmit()" action="<?= site_url('home/changePasswordPost') ?>"
                                  method="post">
                                <input type="hidden" name="user_id" value="<?= $this->session->userdata('user_id'); ?>">
                                <div class="row">
                                    <div class="col-md-12" style="padding-top: 8px;">
                                        <h2>পাসওয়ার্ড পরিবর্তন</h2>
                                        <?php if ($this->session->flashdata('message')) { ?>
                                            <p style="font-size:16px; font-weight:600; text-align: center; color: green"><?= $this->session->flashdata('message') ?></p>
                                        <?php } ?>
                                        <?php if ($this->session->flashdata('message2')) { ?>
                                            <p style="font-size:16px; font-weight:600; text-align: center; color: red"><?= $this->session->flashdata('message2') ?></p>
                                        <?php } ?>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="crr_pass" class="col-md-12"
                                                           style="padding-left:0px; text-align: left ">বর্তমান পাসওয়ার্ড</label>
                                                    <input type="password" name="crr_pass" id="crr_pass"
                                                           placeholder="বর্তমান পাসওয়ার্ড"
                                                           class="form-control">
                                                    <span id="crr_pass_err" style="color: red;"></span>
                                                </div>
                                                <div class="form-group">
                                                    <label for="crr_pass" class="col-md-12"
                                                           style="padding-left:0px; text-align: left ">নতুন পাসওয়ার্ড</label>
                                                    <input type="password" name="new_pass" id="new_pass"
                                                           placeholder="নতুন পাসওয়ার্ড"
                                                           class="form-control">
                                                    <span id="new_pass_err" style="color: red;"></span>
                                                </div>
                                                <div class="form-group">
                                                    <label for="crr_pass" class="col-md-12"
                                                           style="padding-left:0px; text-align: left ">নতুন পাসওয়ার্ড (পুনরায়)</label>
                                                    <input type="password" name="re_new_pass" id="re_new_pass"
                                                           placeholder="নতুন পাসওয়ার্ড (পুনরায়)"
                                                           class="form-control">
                                                    <span id="re_new_pass_err" style="color: red;"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div style="text-align: center; margin-bottom: 10px;" class="form-submit">
                                    <button id="myBtn" type="submit" class="btn btn-info"
                                            style="background-color: #8bc541; height: 50px;">আপডেট করুন</button>
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

<script>
    $(document).ready(function () {
       
    });

    function checkSubmit() {
        var flag = true;
        if($('#new_pass').val().length<4){
            $('#new_pass_err').text('কমপক্ষে ৪ অক্ষরের হতে হবে');
            return false;
        }else {
            $('#new_pass_err').text('');
        }
        if($('#new_pass').val()!=$('#re_new_pass').val()){
            flag=false;
            $('#new_pass_err').text('নতুন পাসওয়ার্ড  এবং নতুন পাসওয়ার্ড (পুনরায়) একই হতে হবে ');
            $('#re_new_pass_err').text('নতুন পাসওয়ার্ড  এবং নতুন পাসওয়ার্ড (পুনরায়) একই হতে হবে ');
        }else{
            $('#new_pass_err').text('');
            $('#re_new_pass_err').text('');
        }
        return flag;
    }

</script>

</body>
</html>