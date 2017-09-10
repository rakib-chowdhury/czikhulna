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
                        <form onsubmit="return add_emp()" class="form-horizontal" id="add_emp_form" enctype="multipart/form-data"
                              action="<?php echo site_url('admin/new_elearning_post'); ?>" method="post">

                            <div class="form-group ">
                                <label for="course" class="col-md-3 control-label"
                                       style="text-align: right">কোর্স</label>
                                <div class="col-md-7">
                                    <select required name="course"
                                            class="form-control"
                                            id="course">
                                        <?php foreach ($courses as $c) { ?>
                                            <option value="<?= $c['c_id']; ?>"><?= $c['c_name']; ?></option>
                                        <?php } ?>
                                    </select>
                                    <span id="c_err" style="color: red;"></span>
                                </div>
                            </div>

                            <div class="form-group ">
                                <label for="syllabus" class="col-md-3 control-label"
                                       style="text-align: right">সিলেবাস</label>
                                <div class="col-md-7">
                                    <textarea name="syllabus" id="syllabus" class="summernote"></textarea>
                                    <span style="color: red;" id="syllabus_err"></span>
                                </div>
                            </div>

                            <div class="form-group ">
                                <label for="details" class="col-md-3 control-label"
                                       style="text-align: right">বিস্তারিত</label>
                                <div class="col-md-7">
                                    <textarea name="details" id="details" class="summernote"></textarea>
                                    <span style="color: red;" id="details_err"></span>
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="vdo_link" class="col-md-3 control-label"
                                       style="text-align: right">ভিডিও লিংক</label>
                                <div class="col-md-7">
                                    <input type="text" id="vdo_link" name="vdo_link" class="form-control">
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="power_point" class="col-md-3 control-label"
                                       style="text-align: right">পাওয়ার পয়েন্ট</label>
                                <div class="col-md-7">
                                    <input onchange="readURL(this);" type="file" id="power_point"
                                           name="power_point" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6" align="right">
                                    <button id="myBtn" type="submit" class="btn btn-success">সংযোজন করুন
                                    </button>
                                </div>
                                <div class="col-md-6">
                                    <a href="<?php echo site_url('admin/new_elearning'); ?>">
                                        <button type="button"  class="btn btn-danger">বাতিল করুন</button>
                                    </a>

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
    var img_extn = ['png', 'PNG', 'jpg', 'JPG', 'jpeg', 'JPEG', 'ppt','txt'];

    var _URL = window.URL || window.webkitURL;

    function readURL(input) {
        if (input.files && input.files[0]) {
            var i_name = input.files[0]['name'].split('.');
            var img = false;
            $.each(img_extn, function (i, v) {
                //console .log(v);
                if (i_name[i_name.length - 1] == v) {
                    img = true;
                }
            });
            if(input.files[0]['size']>1048576){///1mb=1048576 bytes
                img=false;
            }
            if (img == false) {
                var x = document.getElementById('img_err');
                x.style.color = 'red';
                x.innerText = '"jpg/png/ppt/txt" ফরমেট এ হতে হবে এবং ১ মেগাবাইট আর চেয়ে কম হতে হবে';
                document.getElementById('e_img').value = '';
            } else {
                var x = document.getElementById('img_err');
                x.style.color = 'red';
                x.innerText = '';
                var reader = new FileReader();

                reader.onload = function (e) {
//                    $('#show_img')
//                        .attr('src', e.target.result)
//                        .width(150)
//                        .height(150);
                };
//                var x = document.getElementById('show_img');
//                x.style.display = 'block';

                reader.readAsDataURL(input.files[0]);
            }
        }
    }
    function add_emp() {
        var flag = true;
        return flag;
    }
</script>
