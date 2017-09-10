<?php $bn_digits = array('০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯'); ?>
<div class="container-fluid display-table">
    <div class="row display-table-row">
        <?php $this->load->view('layouts/sidebar-nav'); ?>
        <div class="col-md-10 display-table-cell" id="main-content">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-hover table-responsive">
                        <h2 style="text-align: center"><?= $page_title ?></h2>
                        <?php
                        if ($this->session->flashdata('message')) { ?>
                            <p style="text-align: center; color: green;"><?= $this->session->flashdata('message') ?></p>
                        <?php }
                        ?>
                        <br>
                        <a onclick="add_gallery()"  style="cursor: pointer">
                            <button class="btn btn-success">গ্যালারি ছবি সংযোজন</button>
                        </a>
                        <a href="<?= site_url('admin/add_video_gallery')?>">
                            <button class="btn btn-success">গ্যালারি ভিডিও সংযোজন</button>
                        </a>

                        <hr>
                        <table id="emp-list" class="table table-striped table-bordered "
                               cellspacing="0">
                            <thead>
                            <tr>
                                <th style="text-align: center;">ক্রমিক</th>
                                <th style="text-align: center;">ছবি/ভিডিও</th>
                                <th style="text-align: center;">ধরণ</th>
                                <th style="text-align: center;">বিস্তারিত</th>
                                <th style="text-align: center;">অ্যাকশন</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($page_data as $i => $row) { ?>
                                <tr>
                                    <td style="text-align: center;">
                                        <?= str_replace(range(0, 9), $bn_digits, ($i + 1));
                                        ?>
                                    </td>
                                    <td style="text-align: center;">
                                        <?php
                                        if ($row['type'] == 1) { ?>
                                            <img style="width: 50px; height: 50px;"
                                                 src="<?= base_url() ?>/uploads/gallery/thumbs/<?= $row['name'] ?>" alt="">
                                        <?php } else { ?>
                                            <a target="_blank" href="<?=$row['name']?>">ভিডিও দেখুন</a>                                            
                                        <?php }
                                        ?>

                                    </td>
                                    <td style="text-align: center">
                                        <?php
                                        if ($row['type'] == 1) {
                                            echo 'ছবি';
                                        } else {
                                            echo 'ভিডিও';
                                        }
                                        ?>
                                    </td>

                                    <td style="text-align: center;">
                                        <a style="cursor: pointer; text-decoration: none;" data-toggle="modal"
                                           data-target="#details_<?= $row['id'] ?>">বিস্তারিত</a>
                                        <div class="modal fade" id="details_<?= $row['id'] ?>" role="dialog">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close"
                                                                data-dismiss="modal"></button>
                                                        <h4 style="text-align: center; font-weight: 600"
                                                            class="modal-title"><?= $row['name'] ?></h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="form-group col-md-10 col-md-offset-1">
                                                                <?= $row['details'] ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger btn-raised"
                                                                data-dismiss="modal">বাতিল করুন
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td style="text-align: center;">
                                        <a href="<?= site_url('admin/delete_gallery') . '/' . $row['id'] ?>"
                                           style="cursor: pointer; color: red">
                                            <span data-toggle="tooltip" data-placement="top"
                                                  title="বাতিল" class="glyphicon glyphicon-trash"></span>
                                        </a>
                                    </td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
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

<!--Add gallery Modal -->
<div id="add_gallery" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" style="font-weight:700; text-align:center">গ্যালারি সংযোজন</h4>
            </div>
            <form method="post" onsubmit="return checkAddGallery()" action="<?= site_url('admin/add_gallery_post')?>" enctype="multipart/form-data" style="margin-bottom:2px;">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1">
                            <div class="form-group">
                                <label class="label-control col-md-2" style="text-align:right">ছবি</label>
                                <div class="col-md-11">
                                    <input onchange="readURL(this);" type="file" name="p_logo" required id="p_logo" class="form-control">
                                </div>
                                <div class="col-md-11 col-md-offset-1">
                                    <img style="display: none; padding-top: 5px;" id="show_img" src="#" alt="no image">
                                    <span style="color: peru;">ছবি অবশ্যই "jpg/png" ফরমেট এ হতে হবে এবং ১ মেগাবাইট আর চেয়ে কম হতে হবে</span>
                                    <br>
                                    <span style="color: red;" id="img_err"></span>
                                </div>
                            </div>
                            <div class="form-group" style="margin-bottom:45px;">
                                <label class="label-control col-md-2" style="text-align:right">বিস্তারিত</label>
                                <div class="col-md-11">
                                    <textarea name="p_des" id="p_des" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">সংযোজন করুন</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">বাতিল করুন</button>
                </div>
            </form>
        </div>

    </div>
</div>
<?php $this->load->view('layouts/footer'); ?>

<script>
    $(document).ready(function () {
        /////////tooltip starts///////
        $('[data-toggle="tooltip"]').tooltip();
        //////////tooltip ends//////////
        $('#emp-list').DataTable({
            "bSort": false
        });

    });

    var img_extn = ['png', 'PNG', 'jpg', 'JPG', 'jpeg', 'JPEG'];
    function readURL(input) {
        if (input.files && input.files[0]) {
            var i_name = input.files[0]['name'].split('.');
            var img = false;
            $.each(img_extn, function (i, v) {
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
                document.getElementById('p_logo').value = '';
            } else {
                var x = document.getElementById('img_err');
                x.style.color = 'red';
                x.innerText = '';
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#show_img')
                        .attr('src', e.target.result)
                        .width(120)
                        .height(60);
                };
                var x = document.getElementById('show_img');
                x.style.display = 'block';

                reader.readAsDataURL(input.files[0]);
            }
        }
    }
    function add_gallery(){
        $('#p_des').val('');
        $('#p_logo').val('');
        var x = document.getElementById('show_img');
        x.style.display = 'none';
        $('#add_gallery').modal('show');
    }

</script>
