<style>
    #div_back {
        width: 100%;
        /*background-image: url("<?= base_url().'/assets/img/'?>back_img.png");*//*#5cb85c;*/
        background:#25be42;
        justify-content: center;
        position: fixed;
        top: 0;
        left: 0;

        /* Preserve aspet ratio */
        min-width: 100%;
        min-height: 100%;
        background-size: 100% 100%;
    }

    #inst {
        font-size: 25px;
        margin-bottom: 2px;
        padding-top: 0px;
        padding-bottom: 0px;
        text-align: center;
    }

    #inst p {
        margin-bottom: 0px;
    }

    #err {
        margin-bottom: 3px;
        padding-top: 0px;
        padding-bottom: 0px;
    }

    #div_inner {
        padding-top: 10%;
        max-resolution: 0 auto;
    }
    @media(min-width:992px){
        padding-top:30%;
    }

    #inner {
        background-color: #ddd;
        margin-bottom: 2px;
        padding: 0px;
    }

    #inner1 {
        background-color: #ddd;
        margin-bottom: 5px;
        padding: 0px;
    }

    .panel {
        background-color: #f1f2f4 !important;
        position: relative;
        top: -10px;
    }
</style>
<body>
<div id="div_back" class="col-md-12 ">
    <div id="div_inner" class="col-md-offset-4 col-md-4 col-sm-offset-3 col-sm-6">
        <div class="camera_div">
            <img style="width:100.5%;margin-left: -1px;" src="<?= base_url(); ?>assets/img/camera.png" alt=""/>
        </div>
        <div class="panel panel-hover panel-body">
            <div id="inst" class="panel panel-hover panel-body">
                <div class=" form-froup">
                    <div class="col-md-12">
                        <p>আঞ্চলিক সমবায় ইন্সটিটিউট</p>
                        <p>খুলনা</p>
                    </div>
                </div>
            </div>
            <?php
            if ($this->session->userdata('error') != '' || $this->session->userdata('error') != null) { ?>
                <div id="err" class="panel panel-hover panel-body">
                    <div class=" form-froup">
                        <div class="col-md-12" style="text-align:center">
                            <p style="color: red;" id="err_msg"><?php echo $this->session->userdata('error'); $this->session->unset_userdata('error'); ?></p>
                        </div>
                    </div>
                </div>
            <?php } ?>

            <form style="margin-bottom: 5px" action="<?= site_url('login/login_check') ?>" method="post">
                <div id="inner" class="panel panel-hover panel-body">
                    <div class="form-froup">
                        <div class="col-md-1 col-xs-1">
                            <span style="padding-top:8px;" class="glyphicon glyphicon-envelope"></span>
                        </div>
                        <div style="padding-right: 0px" class="col-md-11 col-xs-11">
                            <input type="text" name="email" class="form-control "
                                   id="email" placeholder="জাতীয় পরিচয়পত্র নং" required>                            
                        </div>
                    </div>
                </div>
                <div id="inner1" class="panel panel-hover panel-body">
                    <div class=" form-froup">
                        <div class="col-md-1 col-xs-1">
                            <span style="padding-top:8px;" class="glyphicon glyphicon-lock"></span>
                        </div>
                        <div style="padding-right: 0px" class="col-md-11 col-xs-11">
                            <input type="password" name="password" class="form-control "
                                   id="password" placeholder="পাসওয়ার্ড" required>
                        </div>
                    </div>
                </div>
                <div>
                    <button type="submit" class="btn btn-success form-control">লগইন</button>
                    <p style=" padding-top:5px; text-align:center;"><span style="font-size:11px; color:blue;">অ্যাডমিন লগইনের জন্য ইমেইল প্রদান করুন</span></p>
                </div>
            </form>


        </div>

    </div>


</div>
</body>
<script>
    //$('#err').hide();
</script>
</html>


