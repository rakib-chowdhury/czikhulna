<body>
<!-- Container -->
<div id="container">
    <?php $this->load->view('public_layout/header'); ?>

    <!-- content ================================================== -->
    <div id="content">
        <form onsubmit="return idea_ckeck()" action="<?= site_url('home/demand_post') ?>" method="post">
            <!-- Page Banner -->
            <div class="page-banner about-banner">
                <div class="container">
                    <ul class="page-tree">
                        <li><a href="<?= site_url('home') ?>">CZI KHULNA</a></li>
                        <li><a href="<?= site_url('home/demand') ?>">চাহিদা</a></li>
                    </ul>
                </div>
            </div>

            <h1 class="page-title about-title"><span style="color: whitesmoke; background: #8bc541;">চাহিদা</span></h1>

            <?php
            if($this->session->flashdata('message')){ ?>
                <p style="text-align: center; color: green; margin-top: 30px; font-size: 20px;"><?= $this->session->flashdata('message')?></p>
            <?php }
            ?>
            <!-- accord - skills with background image -->
            <div class="accord-skills white-back">
                <div class="title-section">
                    <div class="container triggerAnimation animated" data-animate="bounceIn">
                        <h1>প্রশিক্ষণ চাহিদা দাখিল</h1>
                        <p>COURSE DEMAND</p>
                    </div>
                </div>

                <div class="accord-skills-container container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="accordion-box triggerAnimation animated" data-animate="fadeInLeft">
                                <div class="row" style="margin-right: 5px;">
                                    <div class="form-group">
                                        <label for="">নাম</label>
                                        <input type="text" name="name" id="name" class="form-control"
                                               onblur="check_text_field('name','name_err')" required>
                                        <span id="name_err" style="color: red;"></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="mb">মোবাইল নম্বর</label>
                                        <input type="text" name="mb" id="mb" class="form-control" maxlength="11" minlength="11"
                                               onblur="check_mb('mb','mb_err')" required>
                                        <span id="mb_err" style="color: red;"></span>
                                    </div>
                                    <!--                                    <div class="form-group">-->
                                    <!--                                        <label for="">নম্বরে প্রেরিত কোড</label>-->
                                    <!--                                        <input type="text" name="name_bng" id="name_bng" class="form-control" required>-->
                                    <!--                                        <span id="name_bng_err" style="color: red;"></span>-->
                                    <!--                                    </div>-->
                                    <div class="form-group">
                                        <label for="">জাতীয় পরিচয়পত্র নম্বর</label>
                                        <input type="text" name="nid" id="nid" maxlength="17" minlength="17" onblur="check_text_field2('nid','nid_err')" onkeyup="check_text_field2('nid','nid_err')" class="form-control" required>
                                        <span id="nid_err" style="color: red;"></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">ইমেইল</label>
                                        <input type="email" name="email" id="email" class="form-control" required>
                                        <span id="email_err" style="color: red;"></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="">পেশা</label>
                                        <input type="text" name="des" id="des" class="form-control"
                                               onblur="check_text_field('des','des_err')">
                                        <span id="des_err" style="color: red;"></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="address">ঠিকানা</label>
                                        <textarea name="address" id="address" cols="30" rows="8"
                                                  class="form-control"></textarea>
                                        <span id="address_err" style="color: red;"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="accordion-box triggerAnimation animated" data-animate="fadeInLeft">
                                <div class="row" style="margin-right: 5px;">                                   
                                    <div class="form-group">
                                        <label for="idea_issue">চাহিদার বিষয়</label>
                                        <textarea style="height:100px;" name="idea_issue" id="idea_issue" class="summernote"></textarea>                                       
                                        <span id="idea_issue_err" style="color: red;"></span>
                                    </div>                                  
                                    <div class="form-group">
                                        <label for="idea_title">মেয়াদ</label>
                                        <input type="text" name="idea_title" id="idea_title" class="form-control"
                                               onblur="check_text_field('idea_title','idea_title_err')" required>
                                        <span id="idea_title_err" style="color: red;"></span>
                                    </div>  
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div style="text-align: center">
                <button class="btn btn-info" style="background-color: #8bc541; height: 50px;">চাহিদা নিবন্ধন করুন</button>
            </div>
        </form>
    </div>
    <!-- tempcore line -->
    <!--<div class="tempcore-line triggerAnimation animated" data-animate="fadeIn">
        <div class="container">
            <a href="<?= site_url('home/all_idea')?>">সকল মতামত</a>
            <p><i class="fa fa-thumbs-up"></i> আঞ্চলিক সমবায় ইন্সটিটিউট  খুলনা</p>
        </div>
    </div>-->
    <!-- End content -->
    <?php $this->load->view('public_layout/footer'); ?>
</div>
<!-- End Container -->
<?php $this->load->view('public_layout/footerlink'); ?>

<script>
    $(document).ready(function() {        
        $('#idea_issue').summernote({
            height: 389,                 // set editor height
            minHeight: null,             // set minimum height of editor
            maxHeight: null,             // set maximum height of editor
            focus: true                  // set focus to editable area after initializing summernote
        });
    });
    
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
    function check_text_field2(id,id2) {
        var tmp_num = $('#' + id).val().getDigitEnglishFromBangla();        
        if (tmp_num == null || isNaN(tmp_num)) {
            var x=document.getElementById(id);
            x.value= x.value.replace(/[^0-9]/, '');
        }
    }
    
    function idea_ckeck() {
        flag = true;

        var tmp_name = $('#name').val();
        tmp_name = tmp_name.replace(/\s+/g, '');
        if (tmp_name == '' || tmp_name == null) {
            document.getElementById('name_err').innerText = 'অনুগ্রহ করে সঠিক তথ্য প্রদান করুন';
            flag = false;
        } else {
            document.getElementById('name_err').innerText = '';
        }

        var tmp_mb = $('#mb').val().getDigitEnglishFromBangla();
        if (isNaN(tmp_mb) || tmp_mb == '' || tmp_mb == null || tmp_mb.length != 11 || tmp_mb.substr(0, 1) != 0 || tmp_mb.substr(1, 1) != 1) {
            flag = false;
            document.getElementById('mb_err').innerText = "১১ডিজিট(০১*********)সঠিকভাবে মোবাইল নম্বর প্রদান করুন";
        } else {
            document.getElementById('mb_err').innerText = '';
        }

        var tmp_nid = $('#nid').val();
        tmp_nid = tmp_nid.replace(/\s+/g, '');
        if (tmp_nid == '' || tmp_nid == null || tmp_nid.length != 17) {
            document.getElementById('nid_err').innerText = 'অনুগ্রহ করে সঠিক তথ্য প্রদান করুন';
            flag = false;
        } else {
            document.getElementById('nid_err').innerText = '';
        }

        var tmp_des = $('#des').val();
        tmp_des = tmp_des.replace(/\s+/g, '');
        if (tmp_des == '' || tmp_des == null ) {
            document.getElementById('des_err').innerText = 'অনুগ্রহ করে সঠিক তথ্য প্রদান করুন';
            flag = false;
        } else {
            document.getElementById('des_err').innerText = '';
        }

        var tmp_address=$('#address').val();
        tmp_address = tmp_address.replace(/&nbsp;/g, '');
        tmp_address = tmp_address.replace(/\s+/g, '');

        if (tmp_address == '' || tmp_address == null || tmp_address=='<p><br></p>' || tmp_address=='<p></p>') {
            document.getElementById('address_err').innerText = 'আবশ্যক';
            flag = false;
        } else {
            document.getElementById('address_err').innerText = '';
        }

        var tmp_title=$('#idea_title').val();
        tmp_title = tmp_title.replace(/&nbsp;/g, '');
        tmp_title = tmp_title.replace(/\s+/g, '');

        if (tmp_title == '' || tmp_title == null || tmp_title=='<p><br></p>' || tmp_title=='<p></p>') {
            document.getElementById('idea_title_err').innerText = 'আবশ্যক';
            flag = false;
        } else {
            document.getElementById('idea_title_err').innerText = '';
        }

        var tmp_issue=$('#idea_issue').val();
        tmp_issue = tmp_issue.replace(/&nbsp;/g, '');
        tmp_issue = tmp_issue.replace(/\s+/g, '');

        if (tmp_issue == '' || tmp_issue == null || tmp_issue=='<p><br></p>' || tmp_issue=='<p></p>') {
            document.getElementById('idea_issue_err').innerText = 'আবশ্যক';
            flag = false;
        } else {
            document.getElementById('idea_issue_err').innerText = '';
        }      

        return flag;
    }
</script>

</body>
</html>