<?php $this->load->view('layouts/footer'); ?>
<?php $bn_digits = array('০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯'); ?>
<div class="container-fluid display-table">
    <div class="row display-table-row">
        <?php $this->load->view('layouts/sidebar-nav'); ?>
        <div class="col-md-10 display-table-cell" id="main-content">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-hover table-responsive">
                        <h2>প্রশিক্ষণার্থী সংযোজন</h2>
                        <hr>
                        <form action="<?php echo site_url('admin/new_trainee_post'); ?>" method="post">
                            <input type="hidden" name="course_id" value="<?= $course_id; ?>">
                            <div class="col-md-6 col-md-offset-3">
                                <table class="table table-bordered table-striped " id="trainee"
                                       cellspacing="0">
                                    <tr>
                                        <td colspan="3">
                                            <a onclick="add_tt()" style="width: 100%; cursor:pointer;"
                                                    class="btn btn-success" id="add_t">প্রশিক্ষণার্থী সংযোজন
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: center;">প্রশিক্ষণার্থীর নাম</td>
                                        <td style="width:10%; text-align: center;">অ্যাকশন</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <select onclick="add_user(1)" name="user[]" class="form-control user_search" id="states_1">
                                                <?php if (sizeof($user) == 0) {
                                                    echo '<option value="0">নির্বাচন করুন</option>';
                                                } ?>
                                                <?php foreach ($user as $u) { ?>
                                                    <option value="<?= $u['id']; ?>"><?= $u['name'].'('.str_replace(range(0,9),$bn_digits,$u['nid']).')'; ?></option>
                                                <?php } ?>
                                                <option value="add">প্রশিক্ষণার্থী সংযোজন করুন</option>
                                            </select>
                                        </td>
                                        <td style="width:10%">
                                            <a style="cursor:pointer;" class="btn btn-danger rmv">বাতিল</a>
                                        </td>
                                    </tr>
                                </table>

                                <div align="center">
                                    <a href="<?= site_url('admin/add_trainee/' . $course_id); ?>">
                                        <button type="button" class="btn btn-danger">বাতিল</button>
                                    </a>
                                    <button type="submit" class="btn btn-success">সেভ</button>
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
 <!-- <script>
        $(document).ready(function() {
             $("#states").select2();  
        });
    </script>-->
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
    String.prototype.getDigitBanglaFromEnglish = function () {
        var retStr = this;
        for (var x in finalEnlishToBanglaNumber) {
            retStr = retStr.replace(new RegExp(x, 'g'), finalEnlishToBanglaNumber[x]);
        }
        return retStr;
    };
    var counte=2;
    $(document).ready(function () {
       
       $(".user_search").select2();
    });
   
   $(document).on('mouseover',".user_search",function () {
	$(this).select2();
   });



    $(document).on('click', '.rmv', function (event) {
        event.preventDefault();
        $(this).closest('tr').remove();

    });
    function add_tt() {
        var tmp_user_val = $("[name^='user']");

        var rmv_user = [];
        $(tmp_user_val).each(function () {
            console.log($(this).val());
            rmv_user.push($(this).val());
        });

        var user_array = new Array();
        <?php foreach($user as $key => $val){ ?>
        user_array.push([{id: '<?php echo $val['id']; ?>'}, {name: '<?php echo $val['name']; ?>'},{nid: '<?php echo $val['nid']; ?>'}]);
        <?php } ?>

        console.log(rmv_user);
        console.log(user_array);

        var trow = '<tr>'
            + '<td>'
            + '<select onclick="add_user('+counte+')" id="states_'+counte+'" name="user[]" class="form-control user_search">'
            +'<option value="0">নির্বাচন করুন</option>';
        $.each(user_array, function (i, v) {
            var u_add=true;
            $.each(rmv_user, function (i2, v2) {
                console.log('v'+v[0]['id']);
                console.log('v2'+v2);
                if(v[0]['id']==v2){
                    u_add=false;
                    console.log('gh');
                }
            });
            if(u_add==true){
trow +='<option value="'+v[0]["id"]+'">'+v[1]["name"]+'('+v[2]['nid'].getDigitBanglaFromEnglish()+')</option>';
            }
        });
        trow +='<option value="add">প্রশিক্ষণার্থী সংযোজন করুন</option>' 
            +'</select>'
            + '</td>'
            + '<td>'
            + '<button class="btn btn-danger rmv">বাতিল</button>'
            + '</td>'
            + '</tr>';
           counte++;
        $('#trainee').append(trow);
    }

    function add_user(iid) {
        console.log(iid);
        id = $('#states_'+iid).val();
        console.log(id);
        if (id == 'add') {
            window.location.href = '<?php echo site_url() . "/admin/add_user/" . $this->uri->segment(3);?>';
        }

    }
    
</script>
