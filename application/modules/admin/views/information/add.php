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
                        <h2 style="text-align: center"><?= $page_title ?></h2>
                        <hr>
                        <?php if($this->session->flashdata('message')){ ?>
                            <p style="text-align: center; color: green"><?= $this->session->flashdata('message')?></p>
                        <?php }?>
                        <form onsubmit="return add_info()" class="form-horizontal" id="add_user_form"
                              action="<?php echo site_url('admin/add_information_post'); ?>" method="post">
                            <input type="hidden" name="type" value="<?= $type?>">
                            <div class="form-group">
                                <div class="col-md-10 col-md-offset-1">
                                    <textarea name="details" id="details" class="form-control summernote" style="min-height: 240px"><?php if(sizeof($info)!=0){ echo $info[0]['info_details'];}?></textarea>
                                    <span style="color: red;" id="details_err"></span>
                                </div>
                            </div>

                            <div class="form-group" style="text-align: center">
                                <?php if (sizeof($info) == 0) { ?>
                                    <button class="btn" type="submit" name="s_btn" value="add"
                                            style="background: #8bc541; color: whitesmoke;">সংযোজন করুন
                                    </button>
                                <?php } else { ?>
                                    <button class="btn" type="submit" name="s_btn" value="up"
                                            style="background: #8bc541; color: whitesmoke;">আপডেট করুন
                                    </button>
                                <?php } ?>
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
    function add_info() {
        var flag=true;
        var tmp_name=$('#details').val();
        console.log('l'+tmp_name+'l');
        tmp_name = tmp_name.replace(/&nbsp;/g, '');
        tmp_name = tmp_name.replace(/\s+/g, '');
       // x.value = x.value.replace(/[^0-9.]/, '');
        console.log('l'+tmp_name+'l2');
        if (tmp_name == '' || tmp_name == null || tmp_name=='<p><br></p>' || tmp_name=='<p></p>') {
            document.getElementById('details_err').innerText = 'আবশ্যক';
            flag = false;
        } else {
            document.getElementById('details_err').innerText = '';
        }

        //return false;
        return flag;
    }


</script>
