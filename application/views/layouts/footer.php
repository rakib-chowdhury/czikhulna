<!--footer start-->
<!--<hr>-->
<!--<div class="row">-->
<!--        <footer id="admin-footer">-->
<!--                <p class="text-center">Copyright &copy; 2016. All right resereved</p>-->
<!--        </footer>-->
<!--</div><!-- /row -->

<!--footer ends-->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="<?php echo base_url();?>assets/js/vendor/jquery-1.11.2.min.js"><\/script>')</script>
<script src="<?php echo base_url(); ?>assets/select2.js"></script>

<script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/vendor/summernote.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/vendor/datepicker.js"></script>
<script src="<?php echo base_url(); ?>assets/js/vendor/daterangepicker.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/vendor/jquery.validate.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/vendor/localize.js"></script>
<script src="<?php echo base_url(); ?>assets/js/vendor/canvasjs.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/vendor/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/vendor/dataTables.bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/vendor/jquery.tabSlideOut.js"></script>

<script src="<?php echo base_url(); ?>assets/js/main.js"></script>


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

    function checkNumber(id) {
        var tmp_num = $('#' + id).val().getDigitEnglishFromBangla();
        if (tmp_num == null || tmp_num <= 0 || isNaN(tmp_num)) {
            var x = document.getElementById(id);
            x.value = x.value.replace(/[^0-9]/, '');
        }
    }
    function checkAmount(id) {
        var tmp_num = $('#' + id).val().getDigitEnglishFromBangla();
        //console.log(tmp_num);
        if (tmp_num == null || tmp_num <= 0 || isNaN(tmp_num)) {
            var x = document.getElementById(id);
            x.value = x.value.replace(/[^0-9.]/, '');
        }
    }

    function validateEmail(email) {
        var re = /^[-a-z0-9~!$%^&*_=+}{\'?]+(\.[-a-z0-9~!$%^&*_=+}{\'?]+)*@([a-z0-9_][-a-z0-9_]*(\.[-a-z0-9_]+)*\.(aero|arpa|biz|com|coop|edu|gov|info|int|mil|museum|name|net|org|pro|travel|mobi|[a-z][a-z])|([0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}))(:[0-9]{1,5})?$/i;
        return re.test(email);
    }
</script>


</body>
</html>