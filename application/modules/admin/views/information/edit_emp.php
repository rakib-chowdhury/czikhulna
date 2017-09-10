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
                              action="<?php echo site_url('admin/edit_emp_post'); ?>" method="post">
                            <input type="hidden" name="emp_id" value="<?= $mem_info[0]['emp_id']?>">
                            <div class="form-group ">
                                <label for="user_name" class="col-md-3 control-label"
                                       style="text-align: right">নাম</label>
                                <div class="col-md-7">
                                    <input onblur="check_text_field('u_name','u_name_err')"
                                           onkeyup="check_text_field('u_name','u_name_err')" type="text"
                                           name="user_name" placeholder="সদস্যের নাম"
                                           class="form-control" id="u_name" value="<?= $mem_info[0]['emp_name']?>"
                                           required>
                                    <span style="color: red;" id="u_name_err"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="mobile" class="col-md-3 control-label" style="text-align: right">মোবাইল
                                    নম্বর</label>
                                <div class="col-md-7">                                    
                                    <input onblur="check_mb('mobile','mobile_err')"
                                           onkeyup="check_mb('mobile','mobile_err')" type="text" id="mobile"
                                           name="mobile" placeholder="মোবাইল নম্বর" required
                                           class="form-control" value="<?= str_replace(range(0,9),$bn_digits,$mem_info[0]['emp_phn'])?>"  >
                                    <span style="color: red;" id="mobile_err"></span>
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="classification" class="col-md-3 control-label"
                                       style="text-align: right">পদবী ধরণ</label>
                                <div class="col-md-7">
                                    <select required name="classification"
                                            class="form-control"
                                            id="clsss_add">
                                        <option value="">নির্বাচন করুন</option>
                                        <?php foreach ($des as $c) { ?>
                                            <option <?php if($mem_info[0]['des_cat_id']==$c['des_cat_id']){ echo 'selected';}?> value="<?= $c['des_cat_id']; ?>"><?= $c['des_cat_name']; ?></option>
                                        <?php } ?>
                                    </select>
                                    <span id="class_add_err" style="color: red;"></span>
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="dsgntn" class="col-md-3 control-label"
                                       style="text-align: right">পদবী</label>
                                <div class="col-md-7">
                                    <input onblur="check_text_field('des','des_err')"
                                           onkeyup="check_text_field('des','des_err')" type="text" name="dsgntn"
                                           placeholder="বর্তমান পেশা " class="form-control" id="des"
                                           required value="<?= $mem_info[0]['emp_designation']?>" >
                                    <span id="des_hint" style="color: peru;"></span>
                                    <span style="color: red;" id="des_err"></span>
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="dsgntn" class="col-md-3 control-label"
                                       style="text-align: right">বিস্তারিত</label>
                                <div class="col-md-7">
                                    <textarea name="details" id="details" class="summernote"><?= $mem_info[0]['emp_details']?></textarea>
                                    <span style="color: red;" id="details_err"></span>
                                </div>
                            </div>

                            <div class="form-group ">
                                <label for="dsgntn" class="col-md-3 control-label"
                                       style="text-align: right">ছবি</label>
                                <div class="col-md-7">
                                    <input type="hidden" name="isIMG" id="isIMG" value="0">
                                    <input onchange="readURL(this);" type="file" id="e_img"
                                           name="e_img">
                                </div>
                                <div class="col-md-7">
                                    <img style="height:150px; width:150px; padding-top: 5px;" id="show_img" src="<?= base_url()?>/uploads/emp/<?=$mem_info[0]['emp_pic']?>" alt="no image"><br>
                                    <span style="color: peru;">ছবি অবশ্যই "jpg/png" ফরমেট এ হতে হবে এবং ১ মেগাবাইট আর চেয়ে কম হতে হবে</span>
                                    <br>
                                    <span style="color: red;" id="img_err"></span><br>
                                    <span style="color: red;" id="img_err2"></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6" align="right">
                                    <button id="myBtn" type="submit" class="btn btn-success">আপডেট করুন
                                    </button>
                                </div>
                                <div class="col-md-6">
                                    <a href="<?php echo site_url('admin/team'); ?>">
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
    var img_extn = ['png', 'PNG', 'jpg', 'JPG', 'jpeg', 'JPEG'];

    var _URL = window.URL || window.webkitURL;

    $("#e_img").change(function (e) {
        $('#isIMG').val('1');
        $('#e_img').attr('required','true');

        var file, img;

        if ((file = this.files[0])) {
            img = new Image();
            img.onload = function () {
                imgWidth = this.width;
                imgHeight= this.height;
                if(imgWidth != 500 && imgHeight!= 500){
                    alert('ছবি অবশ্যই ৫০০X৫০০ হতে হবে');
                    $('#img_err2').text('ছবি অবশ্যই ৫০০X৫০০ হতে হবে');
                    document.getElementById('myBtn').disabled = true;
                }
                else{
                    $('#img_err2').text('');
                    document.getElementById('myBtn').disabled = false;
                }

            };
            img.onerror = function () {
                alert("not a valid file: " + file.type);
            };
            img.src = _URL.createObjectURL(file);
        }

    });
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
                x.innerText = 'ছবি অবশ্যই "jpg/png" ফরমেট এ হতে হবে এবং ১ মেগাবাইট আর চেয়ে কম হতে হবে';
                document.getElementById('e_img').value = '';
            } else {
                var x = document.getElementById('img_err');
                x.style.color = 'red';
                x.innerText = '';
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#show_img')
                        .attr('src', e.target.result)
                        .width(150)
                        .height(150);
                };
                var x = document.getElementById('show_img');
                x.style.display = 'block';

                reader.readAsDataURL(input.files[0]);
            }
        }
    }

    function check_text_field(id, err_id) {
        var tmp_id = $('#' + id).val();
        tmp_id = tmp_id.replace(/\s+/g, '');

        if (tmp_id == '' || tmp_id == null) {
            document.getElementById(err_id).innerText = 'অনুগ্রহ করে সঠিক তথ্য প্রদান করুন';
        } else {
            document.getElementById(err_id).innerText = '';
        }
    }

    function check_mb(id, err_id) {
        var tmp_mb = $('#' + id).val().getDigitEnglishFromBangla();
        console.log(tmp_mb.length);
        if (isNaN(tmp_mb) || tmp_mb == '' || tmp_mb == null || tmp_mb.length != 11 || tmp_mb.substr(0, 1) != 0 || tmp_mb.substr(1, 1) != 1) {
            document.getElementById(err_id).innerText = "১১ডিজিট(০১*********)সঠিকভাবে মোবাইল নম্বর প্রদান করুন";
        } else {
            document.getElementById(err_id).innerText = '';
        }
    }

    function add_emp() {
        var flag = true;

        var tmp_name = $('#u_name').val();
        tmp_name = tmp_name.replace(/\s+/g, '');
        if (tmp_name == '' || tmp_name == null) {
            document.getElementById('u_name_err').innerText = 'অনুগ্রহ করে সঠিক তথ্য প্রদান করুন';
            flag = false;
        } else {
            document.getElementById('u_name_err').innerText = '';
        }

        var tmp_mb = $('#mobile').val().getDigitEnglishFromBangla();
        if (isNaN(tmp_mb) || tmp_mb == '' || tmp_mb == null || tmp_mb.length != 11 || tmp_mb.substr(0, 1) != 0 || tmp_mb.substr(1, 1) != 1) {
            flag = false;
            document.getElementById('mobile_err').innerText = "১১ডিজিট(০১*********)সঠিকভাবে মোবাইল নম্বর প্রদান করুন";
        } else {
            document.getElementById('mobile_err').innerText = '';
        }

        var tmp_des = $('#des').val();
        tmp_des = tmp_des.replace(/\s+/g, '');

        if (tmp_des == '' || tmp_des == null) {
            flag = false;
            document.getElementById('des_err').innerText = 'অনুগ্রহ করে সঠিক তথ্য প্রদান করুন';
        } else {
            document.getElementById('des_err').innerText = '';
        }

        var tmp_u_type = $('#clsss_add').val();
        if (tmp_u_type == '' || tmp_u_type == null) {
            flag = false;
            document.getElementById('class_add_err').innerText = 'পদবীর ধরণ নির্বাচন করুন';
        } else {
            document.getElementById('class_add_err').innerText = '';
        }

        var tmp_name=$('#details').val();
        console.log('l'+tmp_name+'l');
        tmp_name = tmp_name.replace(/&nbsp;/g, '');
        tmp_name = tmp_name.replace(/\s+/g, '');

        if (tmp_name == '' || tmp_name == null || tmp_name=='<p><br></p>' || tmp_name=='<p></p>') {
            document.getElementById('details_err').innerText = 'আবশ্যক';
            flag = false;
        } else {
            document.getElementById('details_err').innerText = '';
        }

        console.log(flag);
        if (flag == true) {
            $("html, body").animate({scrollTop: 0}, "slow");
            document.getElementById("load_img").style.display = "block"
            document.getElementById("main-content").style.opacity = "0.1";
        }
        return flag;
    }
</script>
