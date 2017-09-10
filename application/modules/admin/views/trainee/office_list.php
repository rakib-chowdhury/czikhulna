<?php $bn_digits = array('০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯'); ?>
<div class="container-fluid display-table">
    <div class="row display-table-row">
        <?php $this->load->view('layouts/sidebar-nav'); ?>
        <div class="col-md-10 display-table-cell" id="main-content">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-hover table-responsive">
                        <h2 style="text-align: center">অফিস তালিকা</h2>
                        <!--<a href="<?= site_url('admin/add_offices') ?>">
                            <button class="btn btn-success">অফিস/সমিতি সংযোজন</button>
                        </a>-->

                        <hr>
                        <table id="emp-list" class="table table-striped table-bordered "
                               cellspacing="0">
                            <thead>
                            <tr>
                                <th style="text-align: center;">ক্রমিক</th>
                                <th style="text-align: center;">নাম</th>
                                <th style="text-align: center;">প্রশিক্ষণার্থী ধরণ</th>
                                <th style="text-align: center;">ঠিকানা</th>
                                <th style="text-align: center;">ফোন</th>
                                <th style="text-align: center;">ইমেইল</th>
                                <th style="text-align: center; width: 80px;">অ্যাকশন</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($office as $i=>$row) { ?>
                                <tr>
                                    <td style="text-align: center;">
                                        <?= str_replace(range(0, 9), $bn_digits, ($i+1));
                                        ?>
                                    </td>
                                    <td>                                            
                                       <?= $row['inst_name']; ?>                                            
                                    </td>
                                    <td style="text-align: center;">
                                        <?= $row['class_name']?>
                                    </td>
                                    <td style="text-align: center;"><?= $row['bn_div_name'].', '.$row['bn_dist_name'].', '.$row['bn_upz_name']?></td>
                                    <td style="text-align: center;">
                                         <?php 
                                               echo str_replace(range(0, 9), $bn_digits, $row['inst_phone']); 
                                               if($row['inst_mb']!=null){
                                                  echo ', '.str_replace(range(0, 9), $bn_digits, $row['inst_mb']);
                                                }
                                           ?>
                                    </td>
                                    <td style="text-align: center;"><?= $row['inst_email'] ?></td>                                    
                                    <td style="text-align: center;">
                                        <a href="<?= site_url('admin/edit_office').'/'.$row['inst_id'] ?>" style="cursor: pointer;">
                                            <span data-toggle="tooltip" data-placement="top"
                                                  title="তথ্য সংশোধন" class="glyphicon glyphicon-edit"></span>
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
</script>
