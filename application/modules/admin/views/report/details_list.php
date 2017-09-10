<?php $bn_digits = array('০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯'); ?>
<div class="container-fluid display-table">
    <div class="row display-table-row">
        <?php $this->load->view('layouts/sidebar-nav'); ?>
        <div class="col-md-10 display-table-cell" id="main-content">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-hover table-responsive">
                        <h2>প্রতিবেদন তালিকা</h2>
                        <hr>

                        <div class="col-md-6 col-md-offset-3">
                               <ul>
                                  <!--- <li><a href="<?= site_url('admin/all_course_details');?>">প্রশিক্ষণ কোর্স তালিকা (নির্বাচিত কোর্স তালিকা)</a></li>
                                   <li><a href="<?= site_url('admin/all_user_details');?>">প্রশিক্ষণার্থী তালিকা (অফিস/সমিতি/কোর্স ভিত্তিক)</a></li>
                                   <li><a href="<?= site_url('admin/all_trainee_details');?>">প্রশিক্ষণার্থী  তালিকা (অফিস/সমিতি ব্যতীত অন্যান্য বিভাজন অনুযায়ী)</a></li>
                                   <li><a href="<?= site_url('admin/all_budget_details_monthly');?>">প্রশিক্ষণ বাজেট সংক্রান্ত প্রতিবেদন (বছর, খাত ও মাস ভিত্তিক)</a></li>
                                   <li><a href="<?= site_url('admin/teacher');?>">প্রশিক্ষক/অতিথি বক্তার তালিকা</a></li>
                                   <li><a href="<?= site_url('admin/course_progress');?>">প্রশিক্ষণ অগ্রগতি প্রতিবেদন (বাজেট খাত ভিত্তিক মাসিক/ত্রৈমাসিক ও বার্ষিক)</a></li>
                                   <li><a href="<?= site_url('admin/all_course_review_details');?>">প্রশিক্ষণ কোর্স মূল্যায়ন প্রতিবেদন (বছর, কোর্স ও প্রশিক্ষণার্থী ভিত্তিক বিস্তারিত)</a></li>
                                   <li><a href="<?= site_url('admin/all_user_details');?>">প্রশিক্ষক/অতিথি বক্তা মূল্যায়ন প্রতিবেদন</a></li>
                                   <li><a href="<?= site_url('admin/idea');?>">নাগরিক জিজ্ঞাসা, মতামত ও পরামর্শ তালিকা</a></li>
                                   <li><a href="<?= site_url('admin/demand');?>">নাগরিক প্রশিক্ষণ চাহিদার তালিকা</a></li>
                                   <li><a href="<?= site_url('admin/demand');?>">অনলাইন আবেদনপত্রের তালিকা</a></li> --->
                                   
                                   <!--<li><a href="<?= site_url('admin/all_budget_details');?>">বাজেট সংক্রান্ত প্রতিবেদন</a></li>-->
                                   


                                   <li style=""><a href="<?= site_url('admin/all_course_details'); ?>">প্রশিক্ষণ
                            কোর্স তালিকা (নির্বাচিত কোর্স তালিকা)</a></li>
                    <li style=""><a href="<?= site_url('admin/all_user_details'); ?>">প্রশিক্ষণার্থী
                            তালিকা (অফিস/সমিতি/কোর্স ভিত্তিক)</a></li>
                    <li style=""><a href="<?= site_url('admin/all_trainee_details'); ?>">প্রশিক্ষণার্থী
                            তালিকা (অফিস/সমিতি ব্যতীত অন্যান্য বিভাজন অনুযায়ী)</a></li>
                    <li style=""><a
                            href="<?= site_url('admin/all_budget_details_monthly'); ?>">প্রশিক্ষণ বাজেট সংক্রান্ত
                            প্রতিবেদন (বছর, খাত ও মাস ভিত্তিক)</a></li>
                    <li style=""><a href="<?= site_url('admin/teacher'); ?>">প্রশিক্ষক/অতিথি
                            বক্তার তালিকা</a></li>
                    <li style=""><a href="<?= site_url('admin/course_progress'); ?>">প্রশিক্ষণ
                            অগ্রগতি প্রতিবেদন (বাজেট খাত ভিত্তিক মাসিক/ত্রৈমাসিক ও বার্ষিক)</a></li>
                    <li style=""><a
                            href="<?= site_url('admin/all_course_review_details'); ?>">প্রশিক্ষণ কোর্স মূল্যায়ন
                            প্রতিবেদন (বছর, কোর্স ও প্রশিক্ষণার্থী ভিত্তিক বিস্তারিত)</a></li>
                    <li><a href="<?= site_url('admin/all_teacher_review_details') ?>" target="_blank">কোর্স অনুযায়ী প্রশিক্ষণার্থীর বক্তা/প্রশিক্ষক মূল্যায়ন</a></li>
                    <li style=""><a href="<?= site_url('admin/idea'); ?>">নাগরিক জিজ্ঞাসা,
                            মতামত ও পরামর্শ তালিকা</a></li>
                    <li style=""><a href="<?= site_url('admin/demand'); ?>">নাগরিক
                            প্রশিক্ষণ চাহিদার তালিকা</a></li>
                    <li style=""><a href="<?= site_url('admin/course_request'); ?>">অনলাইন
                            আবেদনপত্রের তালিকা</a></li>
                                   
                               </ul>

                        </div>

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
