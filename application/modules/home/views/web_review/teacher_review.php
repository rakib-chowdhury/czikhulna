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
                    <li><a href="<?= site_url('home/teacher_review')?>">প্রশিক্ষক মূল্যায়ন</a></li>
                </ul>
            </div>
        </div>

        <h1 class="page-title about-title"><span style="background: #8bc541; color: whitesmoke;">প্রশিক্ষক মূল্যায়ন</span>
        </h1>

        <!-- member section -->
        <div class="members-section" style="padding-top: 30px !important;">
            <div class="title-section">
                <div class="container triggerAnimation animated" data-animate="bounceIn">
                    <h3 style="font-weight: 900;">প্রশিক্ষক : <?= $teacherDtls[0]['t_name'] ?></h3>
                    <h5 style="font-weight: 900;">কোর্স : <?= $courseDtls[0]['c_name'] ?></h5>                    
                </div>
            </div>
            <div class="container triggerAnimation animated" data-animate="fadeInUp">
                <div class="row">
                    <div class="col-xs-12 col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3 col-sm-6 col-sm-offset-3"
                         style="margin-top: 20px;">
                        <form onsubmit="return check()" action="<?= site_url('home/teacher_review_post2') ?>" method="post" id="review_form">
                            <input type="hidden" name="nid" id="u_nid" >
                            <input type="hidden" name="cid" value="<?= $courseDtls[0]['c_id'] ?>">
                            <input type="hidden" name="tid" value="<?= $teacherDtls[0]['t_id'] ?>">
                            <input type="hidden" name="numOFq" value="<?= sizeof($ques) ?>">
                            <?php foreach ($ques as $key => $q) { ?>
                                <div class="form-group" style="padding-bottom: 30px;">
                                    <label for="" class="control-labe col-md-12"
                                           style="text-align: left; padding-top: 5px;"><?= str_replace(range(0, 9), $bn_digits, ($key + 1)) ?>
                                        ) <?= $q['question'] ?></label>
                                    <div class="col-md-10">
                                        &nbsp;<input type="radio" name="q_<?= $key ?>" value="4" required>অসাধারণ
                                        &nbsp;&nbsp;<input type="radio" name="q_<?= $key ?>" value="3" required>ভাল
                                        &nbsp;&nbsp;<input type="radio" name="q_<?= $key ?>" value="2" required>মোটামুটি ভাল
                                        &nbsp;&nbsp;<input type="radio" name="q_<?= $key ?>" value="1" required>ভাল নয়
                                        <br><span style="color:red" id="err_<?= $key ?>">
                                    </div>
                                </div>
                            <?php } ?>

                            <div class="form-group">
                                <label for="" class="control-labe"
                                       style="text-align: left; padding-top: 5px;">সুনির্দিষ্ট মন্তব্য/পরামর্শ:</label>
                                <div class="col-mod-10">
                                    <textarea name="user_cmmnt" id="user_cmmnt" rows="5" class="form-control"></textarea>
                                </div>
                            </div>   
                            <div class="form-group" style="text-align: center; color:red" id="errDiv">
                            </div>                         
                            <div class="form-group" style="text-align: center">
                                <button data-toggle="modal" data-target="#myModal" type="button" class="btn btn-success">সাবমিট</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- End content -->

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">প্রশিক্ষক মূল্যায়ন</h4>
      </div>
      <div class="modal-body">
        <div class="row">
           <div class="form-group">
                <label for="" class="control-labe">প্রশিক্ষণার্থীর জাতীয় পরিচয়পত্র নং</label>
                <div class="col-mod-10">
                    <input onkeyup="checknidnum()" type="text" minlength="17" maxlength="17" name="nid" id="nid" required
                                               class="form-control" placeholder="প্রশিক্ষণার্থীর জাতীয় পরিচয়পত্র নং">
                    <span style="color: peru;" id="nid_err"></span>
                 </div>
           </div>
        </div>
      </div>
      <div class="modal-footer">
        <button onclick="checknid()" type="button" class="btn btn-default">সাবমিট</button>
      </div>
    </div>

  </div>
</div>


    <?php $this->load->view('public_layout/footer'); ?>
</div>
<!-- End Container -->
<?php $this->load->view('public_layout/footerlink'); ?>

<script>
    var finalEnlishToBanglaNumber = {
        '0': '০',
        '1': '১',
        '2': '২',
        '3': '৩',
        '4': '৪',
        '5': '৫',
        '6': '৬',
        '7': '৭',
        '8': '৮',
        '9': '৯'
    };
    var finalBanglaToEnlishNumber = {
        '০': '0',
        '১': '1',
        '২': '2',
        '৩': '3',
        '৪': '4',
        '৫': '5',
        '৬': '6',
        '৭': '7',
        '৮': '8',
        '৯': '9'
    };

    String.prototype.getDigitBanglaFromEnglish = function () {
        var retStr = this;
        for (var x in finalEnlishToBanglaNumber) {
            retStr = retStr.replace(new RegExp(x, 'g'), finalEnlishToBanglaNumber[x]);
        }
        return retStr;
    };
    String.prototype.getDigitEnglishFromBangla = function () {
        var retStr = this;
        for (var x in finalBanglaToEnlishNumber) {
            retStr = retStr.replace(new RegExp(x, 'g'), finalBanglaToEnlishNumber[x]);
        }
        return retStr;
    };
   function checknidnum(){
       var tmp_num = $('#nid').val().getDigitEnglishFromBangla();       
        if (tmp_num == null || isNaN(tmp_num)) {
            var x = document.getElementById('nid');
            x.value = x.value.replace(/[^0-9]/, '');
        } 
   }
   function checknid(){
       console.log('dfsd');
       var tmp=$('#nid').val();
       if(tmp.length!=17){
           $('#nid_err').text('আবশ্যক');
           return false;
       }else{
           $('#u_nid').val(tmp);
           $('#myModal').modal('hide');
           $('#review_form').submit();
       }
   }

   function check(){
       var flag=0;
       for(var i=0; i<=9; i++){         
          if($("input:radio[name='q_"+i+"']").is(":checked")){
               $('#err_'+i).text('');
          }else{
               flag=1;
               $('#err_'+i).text('আবশ্যক');               
          }
       }
       if(flag==1){
          $('#errDiv').text('অনুগ্রহ করে সকল তথ্য প্রদান করুন');
          return false;
       }else{
         return true;
       }
   }
</script>

</body>
</html>