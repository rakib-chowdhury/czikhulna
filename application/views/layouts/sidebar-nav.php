<div class="col-md-2 col-xs-2 display-table-cell" id="side-menu">
    <ul>
        <li class="link active">
            <a href="<?php echo site_url('admin') ?>">
                <span class="glyphicon glyphicon-th" aria-hidden="true"></span>
                <span class="hidden-xs">ড্যাশবোর্ড</span>
            </a>
        </li>
        <?php if ($this->session->userdata('admin_type') == 1) { ?>
            <!---new left menu--->
            <!--online reg-->
            <li class="custom-dropdown"><a><span class="glyphicon glyphicon-user"></span><span class="hidden-xs">অনলাইন রেজিস্ট্রেশন</span><span
                        class="glyphicon glyphicon-chevron-right pull-right hidden-xs"></span></a>
                <ul class="custom-dropdown-menu">
                    <li><a href="<?= site_url('admin/add_user') ?>" target="_blank">অনলাইন রেজিস্ট্রেশন
                            ফরম</a></li>
                </ul>
            </li>
            <!---add--->
            <li class="custom-dropdown"><a><span class="glyphicon glyphicon-plus"></span><span class="hidden-xs">তথ্য সংযোজন ও সংশোধন</span><span
                        class="glyphicon glyphicon-chevron-right pull-right hidden-xs"></span></a>
                <ul class="custom-dropdown-menu">
                    <!--course-->
                    <li style="border-bottom: 1px solid grey" class="custom-dropdown2"><a>সকল কোর্সের তথ্য <span
                                class="glyphicon glyphicon-chevron-right pull-right"></span></a>
                        <ul class="custom-dropdown-menu2">
                            <li style="border-bottom: 1px solid grey"><a href="<?= site_url('admin/add_courses') ?>">নতুন
                                    কোর্স সংযোজন</a></li>
                            <li style="border-bottom: 1px solid grey"><a
                                    href="<?= site_url('admin/course_list/edit') ?>">নির্বাচিত কোর্সের তথ্য সংশোধন</a>
                            </li>
                            <li style="border-bottom: 1px solid grey"><a
                                    href="<?= site_url('admin/course_list/status') ?>">মূল্যায়নের জন্য কোর্স
                                    উন্মুক্তকরণ</a></li>
                            <li class="custom-dropdown3" style="border-bottom: 1px solid grey"><a>নির্বাচিত কোর্সে প্রশিক্ষণার্থী মনোনয়ন<span class="glyphicon glyphicon-chevron-right pull-right"></span></a>
                                <ul class="custom-dropdown-menu3">
                                    <li style="border-bottom: 1px solid grey"><a href="<?= site_url('admin/add_user') ?>">প্রশিক্ষণার্থী নিবন্ধন</a></li>
                                    <li style="border-bottom: 1px solid grey"><a href="<?= site_url('admin/course_list/dda') ?>">কোর্সে প্রশিক্ষণার্থী নির্বাচন</a></li>
                                    <li style="border-bottom: 1px solid grey"><a href="<?= site_url('admin/course_request') ?>">অনলাইনে প্রাপ্ত আবেদনপত্র তালিকা</a></li>
                                </ul>
                            </li>

                            <li class="custom-dropdown3"><a>নির্বাচিত কোর্সে প্রশিক্ষক/বক্তা মনোনয়ন<span class="glyphicon glyphicon-chevron-right pull-right"></span></a>
                                <ul class="custom-dropdown-menu3">
                                    <li style="border-bottom: 1px solid grey"><a href="<?= site_url('admin/new_teacher') ?>">বক্তা/প্রশিক্ষক সংযোজন</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <!--donor--->
                    <li style="border-bottom: 1px solid grey" class="custom-dropdown2"><a>বাজেট সংক্রান্ত তথ্য
                            <span class="glyphicon glyphicon-chevron-right pull-right"></span></a>
                        <ul class="custom-dropdown-menu2">
                            <li style="border-bottom: 1px solid grey"><a href="<?= site_url('admin/donor_list') ?>">নতুন
                                    বাজেট খাত সংযোজন</a></li>
                            <li style="border-bottom: 1px solid grey"><a href="<?= site_url('admin/donor_list') ?>">নির্বাচিত
                                    বাজেট খাতের তথ্য সংশোধন</a></li>
                        </ul>
                    </li>
                    <!--office-->
                    <li class="custom-dropdown2"><a>সমিতি/অফিসের তথ্য সংযোজন ও সংশোধন<span
                                class="glyphicon glyphicon-chevron-right pull-right"></span></a>
                        <ul class="custom-dropdown-menu2">
                            <li style="border-bottom: 1px solid grey"><a href="<?= site_url('admin/add_offices') ?>">নতুন
                                    সমিতি/অফিসের তথ্য সংযোজন</a></li>
                            <li style="border-bottom: 1px solid grey"><a href="<?= site_url('admin/offices') ?>">সমিতি/অফিসের
                                    তথ্য সংশোধন</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <!--report-->
            <li class="link"><a href="<?php echo site_url('admin/all_details'); ?>"><span class="glyphicon glyphicon-th"></span><span class="hidden-xs">সকল প্রতিবেদন</span><span
                        class="glyphicon glyphicon-chevron-right pull-right hidden-xs"></span></a>
                <ul class="custom-dropdown-menu">
                    <!--- <li style=""><a href="<?= site_url('admin/all_course_details'); ?>">প্রশিক্ষণ
                            কোর্স তালিকা (নির্বাচিত কোর্স তালিকা)</a></li>
                    <li style="border-bottom: 1px solid grey"><a href="<?= site_url('admin/all_user_details'); ?>">প্রশিক্ষণার্থী
                            তালিকা (অফিস/সমিতি/কোর্স ভিত্তিক)</a></li>
                    <li style="border-bottom: 1px solid grey"><a href="<?= site_url('admin/all_trainee_details'); ?>">প্রশিক্ষণার্থী
                            তালিকা (অফিস/সমিতি ব্যতীত অন্যান্য বিভাজন অনুযায়ী)</a></li>
                    <li style="border-bottom: 1px solid grey"><a
                            href="<?= site_url('admin/all_budget_details_monthly'); ?>">প্রশিক্ষণ বাজেট সংক্রান্ত
                            প্রতিবেদন (বছর, খাত ও মাস ভিত্তিক)</a></li>
                    <li style="border-bottom: 1px solid grey"><a href="<?= site_url('admin/teacher'); ?>">প্রশিক্ষক/অতিথি
                            বক্তার তালিকা</a></li>
                    <li style="border-bottom: 1px solid grey"><a href="<?= site_url('admin/course_progress'); ?>">প্রশিক্ষণ
                            অগ্রগতি প্রতিবেদন (বাজেট খাত ভিত্তিক মাসিক/ত্রৈমাসিক ও বার্ষিক)</a></li>
                    <li style=""><a
                            href="<?= site_url('admin/all_course_review_details'); ?>">প্রশিক্ষণ কোর্স মূল্যায়ন
                            প্রতিবেদন (বছর, কোর্স ও প্রশিক্ষণার্থী ভিত্তিক বিস্তারিত)</a></li>
                    <li class="custom-dropdown2" style="border-bottom: 1px solid grey"><a>প্রশিক্ষক/অতিথি বক্তা মূল্যায়ন প্রতিবেদন<span
                                class="glyphicon glyphicon-chevron-right pull-right"></span></a>
                        <ul class="custom-dropdown-menu2">
                            <li><a href="<?= site_url('admin/all_teacher_review_details') ?>" target="_blank">কোর্স অনুযায়ী প্রশিক্ষণার্থীর বক্তা/প্রশিক্ষক মূল্যায়ন</a></li>
                        </ul>
                    </li>
                    <li style="border-bottom: 1px solid grey"><a href="<?= site_url('admin/idea'); ?>">নাগরিক জিজ্ঞাসা,
                            মতামত ও পরামর্শ তালিকা</a></li>
                    <li style="border-bottom: 1px solid grey"><a href="<?= site_url('admin/demand'); ?>">নাগরিক
                            প্রশিক্ষণ চাহিদার তালিকা</a></li>
                    <li style="border-bottom: 1px solid grey"><a href="<?= site_url('admin/course_request'); ?>">অনলাইন
                            আবেদনপত্রের তালিকা</a></li> --->
                </ul>
            </li>
            <!--all review-->
            <li class="custom-dropdown"><a><span class="glyphicon glyphicon-th-large"></span><span class="hidden-xs">সকল মূল্যায়ন প্রতিবেদন</span><span
                        class="glyphicon glyphicon-chevron-right pull-right hidden-xs"></span></a>
                <ul class="custom-dropdown-menu">
                    <li style="border-bottom: 1px solid grey"><a href="<?= site_url('admin/course_review_list') ?>">প্রশিক্ষণ
                            কোর্স মূল্যায়ন প্রতিবেদন </a></li>
                    <li style="border-bottom: 1px solid grey"><a href="<?= site_url('admin/all_teacher_review_details') ?>">প্রশিক্ষক
                            মূল্যায়ন প্রতিবেদন </a></li>
                </ul>
            </li>
            <!--trainee details-->
            <li class="custom-dropdown"><a><span class="glyphicon glyphicon-user"></span><span class="hidden-xs">প্রশিক্ষণার্থীদের প্রোফাইল
                    তালিকা</span><span class="glyphicon glyphicon-chevron-right pull-right hidden-xs"></span></a>
                <ul class="custom-dropdown-menu">
                    <li style="border-bottom: 1px solid grey"><a href="<?= site_url('admin/user_list') ?>">প্রশিক্ষণার্থীদের
                            প্রোফাইল তালিকা</a></li>
                </ul>
            </li>
            <!--trainer details-->
            <li class="custom-dropdown"><a><span class="glyphicon glyphicon-user"></span><span class="hidden-xs">প্রশিক্ষক/বক্তার প্রোফাইল
                    তালিকা</span><span class="glyphicon glyphicon-chevron-right pull-right hidden-xs"></span></a>
                <ul class="custom-dropdown-menu">
                    <li style="border-bottom: 1px solid grey"><a href="<?= site_url('admin/teacher') ?>">প্রশিক্ষক/বক্তার
                            প্রোফাইল তালিকা</a></li>
                </ul>
            </li>
            <!--online reg req list-->
            <li class="custom-dropdown"><a><span class="glyphicon glyphicon-fire"></span><span class="hidden-xs">অনলাইনে প্রাপ্ত আবেদনপত্র
                    তালিকা</span><span class="glyphicon glyphicon-chevron-right pull-right hidden-xs"></span></a>
                <ul class="custom-dropdown-menu">
                    <li style="border-bottom: 1px solid grey"><a href="<?= site_url('admin/course_request') ?>">অনলাইনে
                            প্রাপ্ত আবেদনপত্র তালিকা</a></li>
                </ul>
            </li>
            <!--demand nd idea-->
            <li class="custom-dropdown"><a><span class="glyphicon glyphicon-adjust"></span><span class="hidden-xs">নাগরিক মতামত ও প্রশিক্ষণ
                    চাহিদা</span><span class="glyphicon glyphicon-chevron-right pull-right hidden-xs"></span></a>
                <ul class="custom-dropdown-menu">
                    <li style="border-bottom: 1px solid grey"><a href="<?= site_url('admin/idea') ?>">নাগরিক মতামত</a>
                    </li>
                    <li style="border-bottom: 1px solid grey"><a href="<?= site_url('admin/demand') ?>">নাগরিক প্রশিক্ষণ
                            চাহিদা</a></li>
                </ul>
            </li>
            <!--yearly report-->
            <li class="custom-dropdown"><a><span class="glyphicon glyphicon-list"></span><span class="hidden-xs">প্রশিক্ষণ বর্ষপঞ্জি</span><span
                        class="glyphicon glyphicon-chevron-right pull-right hidden-xs"></span></a>
                <ul class="custom-dropdown-menu">
                    <li style="border-bottom: 1px solid grey"><a href="<?= site_url('admin/yearly_details') ?>">
                            প্রশিক্ষণ বর্ষপঞ্জি </a></li>
                </ul>
            </li>
            <!--yearly notice-->
            <li class="custom-dropdown"><a><span class="glyphicon glyphicon-asterisk"></span><span class="hidden-xs">নোটিশ</span><span
                        class="glyphicon glyphicon-chevron-right pull-right hidden-xs"></span></a>
                <ul class="custom-dropdown-menu">
                    <li style="border-bottom: 1px solid grey"><a href="<?= site_url('admin/add_notice') ?>">নোটিশ
                            সংযোজন</a></li>
                    <li style="border-bottom: 1px solid grey"><a href="<?= site_url('admin/notice') ?>">নোটিশ সংশোধন</a>
                    </li>
                </ul>
            </li>
        <?php } ?>

        <?php
        if ($this->session->userdata('admin_type') == 2) { ?>
            <!---front panel--->
            <li class="link">
                <a href="<?php echo site_url('admin/gallery'); ?>">
                    <span class="glyphicon glyphicon glyphicon-film" aria-hidden="true"></span>
                    <span class="hidden-xs">গ্যালারি</span>
                </a>
            </li>
            <li class="link">
                <a href="<?php echo site_url('admin/elearning_show'); ?>">
                    <span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>
                    <span class="hidden-xs">ই-লার্নিং</span>
                </a>
            </li>
            <li class="link">
                <a href="<?php echo site_url('admin/idea'); ?>">
                    <span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>
                    <span class="hidden-xs">মতামতসমূহ</span>
                </a>
            </li>
            <li class="link">
                <a href="<?php echo site_url('admin/add_information/about_us'); ?>">
                    <span class="fa fa-home" aria-hidden="true"></span>
                    <span class="hidden-xs">প্রতিষ্ঠান সম্পর্কে</span>
                </a>
            </li>
            <li class="link">
                <a href="<?php echo site_url('admin/add_information/our_mission'); ?>">
                    <span class="fa fa-laptop" aria-hidden="true"></span>
                    <span class="hidden-xs">আমাদের রূপকল্প</span>
                </a>
            </li>
            <li class="link">
                <a href="<?php echo site_url('admin/add_information/our_vision'); ?>">
                    <span class="fa fa-suitcase" aria-hidden="true"></span>
                    <span class="hidden-xs">আমাদের অভিলক্ষ্য</span>
                </a>
            </li>
            <li class="link">
                <a href="<?php echo site_url('admin/team'); ?>">
                    <span class="fa fa-users" aria-hidden="true"></span>
                    <span class="hidden-xs">আমাদের টিম</span>
                </a>
            </li>
            <li class="link">
                <a href="<?php echo site_url('admin/partner'); ?>">
                    <span class="fa fa-film" aria-hidden="true"></span>
                    <span class="hidden-xs">আমাদের পার্টনার</span>
                </a>
            </li>
            <li class="link">
                <a href="<?php echo site_url('admin/add_information/service'); ?>">
                    <span class="glyphicon glyphicon-gift" aria-hidden="true"></span>
                    <span class="hidden-xs">আমাদের সেবাসমূহ</span>
                </a>
            </li>
            <li class="link">
                <a href="<?php echo site_url('admin/add_information/facilities'); ?>">
                    <span class="fa fa-th-list" aria-hidden="true"></span>
                    <span class="hidden-xs">বিদ্যমান সুবিধাসমূহ</span>
                </a>
            </li>
            <li class="link">
                <a href="<?php echo site_url('admin/add_information/stockholder'); ?>">
                    <span class="fa fa-th" aria-hidden="true"></span>
                    <span class="hidden-xs">আমাদের সেবাগ্রহীতা ও স্টেকহোল্ডার</span>
                </a>
            </li>
            <li class="link">
                <a href="<?php echo site_url('admin/add_information/communication'); ?>">
                    <span class="fa fa-asterisk" aria-hidden="true"></span>
                    <span class="hidden-xs">যোগাযোগ ও যাতায়াত</span>
                </a>
            </li>
            <li class="link">
                <a href="<?php echo site_url('admin/add_information/structure'); ?>">
                    <span class="fa fa-anchor" aria-hidden="true"></span>
                    <span class="hidden-xs">সাংগঠনিক কাঠামো</span>
                </a>
            </li>
            <li class="link">
                <a href="<?php echo site_url('admin/add_information/our_achievement'); ?>">
                    <span class="fa fa-css3" aria-hidden="true"></span>
                    <span class="hidden-xs">আমাদের সাফল্য</span>
                </a>
            </li>

            <li class="link">
                <a href="<?php echo site_url('admin/apa'); ?>">
                    <span class="glyphicon glyphicon-screenshot" aria-hidden="true"></span>
                    <span class="hidden-xs">এপিএ লক্ষ্যমাত্রা</span>
                </a>
            </li>
        <?php }
        ?>
        <li class="link">
            <a href="http://www.czikhulna.com" target="_blank">
                <span class="glyphicon glyphicon-home" aria-hidden="true"></span>
                <span class="hidden-xs">হোম প্যানেল</span>
            </a>
        </li>
        <li class="link">
            <a href="<?php echo site_url('logout/index'); ?>">
                <span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>
                <span class="hidden-xs">লগআউট</span>
            </a>
        </li>
        <li class="link">
            <a href="<?php echo site_url('admin/change_login_info'); ?>">
                <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                <span class="hidden-xs">লগইন তথ্য পরিবর্তন</span>
            </a>
        </li>
        <!----2017-01-22------->


    </ul>
</div><!-- /sidebar col-md-2 -->