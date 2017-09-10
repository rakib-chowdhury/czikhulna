<?php $bn_digits = array('০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯'); ?>
<div class="container-fluid display-table">
    <div class="row display-table-row">
        <?php $this->load->view('layouts/sidebar-nav'); ?>
        <div class="col-md-10 display-table-cell" id="main-content">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-hover ">
                        <h2>লগইন তথ্য পরিবর্তন</h2>
                        <?php 
                             if($this->session->flashdata('message')){
                                  echo '<p style="text-align:center; color:peru; font-size:14px;">'.$this->session->flashdata('message').'</p>';
                             }
                        ?>
                        <hr>
                        <form class="form-horizontal" id="add_user_form"
                              action="<?php echo site_url('admin/add_login_change'); ?>" method="post">

                            <div class="form-group ">
                                <label for="email" class="col-md-3 control-label"
                                       style="text-align: right">ইমেইল</label>
                                <div class="col-md-7">
                                    <input  type="email"
                                           name="email"
                                           placeholder="ইমেইল" value="<?= $email; ?>"
                                           class="form-control" id="email"
                                           required>
                                    <span style="color: red;" id="email_err"></span>
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="c_pass" class="col-md-3 control-label" style="text-align: right">বর্তমান
                                    পাসওয়ার্ড</label>
                                <div class="col-md-7">
                                    <input onblur="check_text_field('c_pass','c_pass_err')"
                                           onkeyup="check_text_field('c_pass','c_pass_err')" type="password"
                                           name="c_pass"
                                           placeholder="" class="form-control" id="c_pass"
                                           required>
                                    <span style="color: red;" id="c_pass_err"></span>
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="n_pass" class="col-md-3 control-label" style="text-align: right">নতুন
                                    পাসওয়ার্ড</label>
                                <div class="col-md-7">
                                    <input onblur="check_text_field('n_pass','n_pass_err')"
                                           onkeyup="check_text_field('n_pass','n_pass_err')" type="password"
                                           name="n_pass"
                                           placeholder="" class="form-control" id="n_pass"
                                           required>
                                    <span style="color: red;" id="n_pass_err"></span>
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="n_pass" class="col-md-3 control-label" style="text-align: right">নতুন
                                    পাসওয়ার্ড(পুনরায়)</label>
                                <div class="col-md-7">
                                    <input onblur="check_text_field('rn_pass','rn_pass_err')"
                                           onkeyup="check_text_field('rn_pass','rn_pass_err')" type="password"
                                           name="n_pass"
                                           placeholder="" class="form-control" id="rn_pass"
                                           required>
                                    <span style="color: red;" id="rn_pass_err"></span>
                                </div>
                            </div>

                            <div>
                                <div class="col-md-6" align="right">
                                    <button onclick="login_change_btn()" name="login_change" type="button"
                                            class="btn btn-success">আপডেট
                                    </button>
                                </div>
                                <div class="col-md-6">
                                    <a href="<?php echo site_url('admin/index'); ?>">
                                        <button type="button" class="btn btn-danger">বাতিল করুন</button>
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
    function check_text_field(id, err_id) {
        var tmp_id = $('#' + id).val();
        tmp_id = tmp_id.replace(/\s+/g, '');

        if (tmp_id == '' || tmp_id == null) {
            document.getElementById(err_id).innerText = 'অনুগ্রহ করে সঠিক তথ্য প্রদান করুন';
        } else {
            document.getElementById(err_id).innerText = '';
        }
    }

    function validateEmail(email) {
       var re =/^[-a-z0-9~!$%^&*_=+}{\'?]+(\.[-a-z0-9~!$%^&*_=+}{\'?]+)*@([a-z0-9_][-a-z0-9_]*(\.[-a-z0-9_]+)*\.(aero|arpa|biz|com|coop|edu|gov|info|int|mil|museum|name|net|org|pro|travel|mobi|[a-z][a-z])|([0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}))(:[0-9]{1,5})?$/i;
      return re.test(email);
   }


    function login_change_btn() {
        var flag = true;

        var tmp_email = $('#email').val();
        tmp_email = tmp_email.replace(/\s+/g, '');

       if (validateEmail(tmp_email)) {
            document.getElementById('email').value = tmp_email;
            document.getElementById('email_err').innerText = '';
       } else {
            document.getElementById('email_err').innerText = 'অনুগ্রহ করে ইমেইল সঠিকভাবে প্রদান করুন';
            flag = false;
       }
        
/*
        if (tmp_email1 == '' || tmp_email == null || tmp_emp) {
            document.getElementById('email_err').innerText = 'অনুগ্রহ করে ইমেইল সঠিকভাবে প্রদান করুন';
            flag = false;
        } else {
            //document.getElementById('email').value = tmp_email;
            document.getElementById('email_err').innerText = '';
        }

        var tmp_c_pass = $('#c_pass').val();
        tmp_c_pass = tmp_c_pass.replace(/\s+/g, '');
        var pss='<?= $pass;?>';
        console.log(pss)
        if (tmp_c_pass == pss) {
        console.log('done');
        } else {
            document.getElementById('c_pass_err').innerText = 'অনুগ্রহ করে পাসওয়ার্ড সঠিকভাবে প্রদান করুন';
            flag = false;
        }*/

        var tmp_n_pass = $('#n_pass').val();
        tmp_n_pass = tmp_n_pass.replace(/\s+/g, '');

        var tmp_rn_pass = $('#rn_pass').val();
        tmp_rn_pass = tmp_rn_pass.replace(/\s+/g, '');

        if (tmp_n_pass == '' || tmp_n_pass == null || tmp_n_pass.length<=4){
             flag=false;
             document.getElementById('n_pass_err').innerText = 'অনুগ্রহ করে সঠিকভাবে নতুন পাসওয়ার্ড প্রদান করুন(কমপক্ষে ৫ লেটার)';
        }else{
            if (tmp_n_pass == tmp_rn_pass) {

            } else {
                document.getElementById('rn_pass_err').innerText = 'অনুগ্রহ করে সঠিকভাবে নতুন পাসওয়ার্ড পুনরায় প্রদান করুন';
                flag = false;
            }
        }

        


        console.log(flag);
        if (flag == true) {
           $('#add_user_form').submit()
        }
    }

</script>
