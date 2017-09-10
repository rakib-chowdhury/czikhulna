<div class="col-md-2 hidden-xs display-table-cell" id="side-menu">
    <ul>
        <li class="link active">
            <a href="<?php echo site_url('admin') ?>">
                <span class="glyphicon glyphicon-th" aria-hidden="true"></span>
                <span class="hidden-sm">ড্যাশবোর্ড</span>
            </a>
        </li>
        <?php if ($this->session->userdata('admin_type') == 1) { ?>
            <!----2016-12-15------->            
             <li class="link">
                <a href="#addition" data-toggle="collapse" aria-controls="addition">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    <span class="hidden-sm">সকল তথ্য সংযোজন ও সংশোধন</span>
                    <span class="glyphicon glyphicon-chevron-down pull-right hidden-sm"></span>
                </a>
                <ul class="collapse collapseable" id="addition">
                    <li class="link">
                        <a href="#coursediv" data-toggle="collapse" aria-controls="coursediv">
                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                            <span class="hidden-sm">সকল কোর্সের তথ্য</span>
                            <span class="glyphicon glyphicon-chevron-down pull-right hidden-sm"></span>
                        </a>
                        <ul class="collapse collapseable" id="coursediv">                             
                             <li class="link">                        
                                  <a href="<?php echo site_url('admin/course_list'); ?>">
                                       <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>
                                       <span class="hidden-sm">নতুন কোর্স সংযোজন</span>
                                  </a>
                             </li>
                             <li class="link">                        
                                  <a href="<?php echo site_url('admin/course_list'); ?>">
                                       <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>
                                       <span class="hidden-sm">নির্বাচিত কোর্সের তথ্য সংশোধন</span>
                                  </a>
                             </li>                    
                             <li class="link">                        
                                  <a href="<?php echo site_url('admin/course_list'); ?>">
                                       <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>
                                       <span class="hidden-sm">মূল্যায়নের জন্য কোর্স উন্মুক্তকরণ</span>
                                  </a>
                             </li> 
                             <li class="link">
                                <a href="#traineeAdd" data-toggle="collapse" aria-controls="traineeAdd">
                                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                                    <span class="hidden-sm">নির্বাচিত কোর্সে প্রশিক্ষণার্থী মনোনয়ন</span>
                                    <span class="glyphicon glyphicon-chevron-down pull-right hidden-sm"></span>
                                </a>
                                <ul class="collapse collapseable" id="traineeAdd">                               
                                     <li class="link">
                                         <a href="<?php echo site_url('admin/course_list/dda'); ?>">
                                            <span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span>
                                            <span class="hidden-sm">কোর্সে প্রশিক্ষণার্থী নির্বাচন</span>
                                         </a>
                                     </li>
                                     <li class="link">
                                         <a href="<?php echo site_url('admin/add_user'); ?>">
                                            <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                                            <span class="hidden-sm">প্রশিক্ষণার্থী নিবন্ধন</span>
                                         </a>
                                      </li>
                                      <li class="link">
                                         <a href="<?php echo site_url('admin/course_request'); ?>">
                                             <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                                             <span class="hidden-sm">অপেক্ষমান কোর্সসমূহ</span>
                                         </a>
                                      </li>
                                 </ul>
                              </li>
                        </ul>
                    </li>                   
                    <!--extra-->
                    <li class="link">
                <a href="#budget" data-toggle="collapse" aria-controls="budget">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    <span class="hidden-sm">বাজেট সংক্রান্ত তথ্য</span>
                    <span class="glyphicon glyphicon-chevron-down pull-right hidden-sm"></span>
                </a>
                <ul class="collapse collapseable" id="budget">
                    <!--<li class="link">
                        <a href="<?php echo site_url('admin/donor_list'); ?>">
                            <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>
                            <span class="hidden-sm">বাজেটের তথ্য</span>
                        </a>
                    </li>--->
                    <li class="link">
                        <a href="<?php echo site_url('admin/donor_list'); ?>">
                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                            <span class="hidden-sm">নতুন বাজেট খাত সংযোজন</span>
                        </a>
                    </li>
                    <li class="link">
                        <a href="<?php echo site_url('admin/donor_list'); ?>">
                            <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                            <span class="hidden-sm">নির্বাচিত বাজেট খাতের তথ্য সংশোধন</span>
                        </a>
                    </li>                                    
                </ul>
            </li>
            
                    
                    <!--extra end-->
                    <li class="link">
                        <a href="<?php echo site_url('admin/offices'); ?>">
                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                            <span class="hidden-sm">সমিতি/অফিসের তথ্য সংযোজন ও সংশোধন</span>
                        </a>
                    </li>
                </ul>
            </li>
            
            <!----<li class="link">
            <a href="<?php echo site_url('admin/course_list'); ?>">
                <span class="glyphicon glyphicon-briefcase" aria-hidden="true"></span>
                <span class="hidden-sm">প্রশিক্ষণ কোর্স নিরূপণ</span>
            </a>
        </li>
        <li class="link">
            <a href="<?php echo site_url('admin/donor_list'); ?>">
                <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
                <span class="hidden-sm">প্রশিক্ষণ বাজেটের খাত নিরূপণ</span>
            </a>
        </li>
        <li class="link">
            <a href="<?php echo site_url('admin/add_user'); ?>">
                <span class="glyphicon glyphicon-list" aria-hidden="true"></span>
                <span class="hidden-sm">প্রশিক্ষণার্থী অনলাইন নিবন্ধন</span>
            </a>
        </li>---> 
            <li class="link">
                <a href="<?php echo site_url('admin/notice'); ?>">
                    <span class="glyphicon glyphicon-list" aria-hidden="true"></span>
                    <span class="hidden-sm">নোটিশ</span>
                </a>
            </li>
            <li class="link">
                <a href="<?php echo site_url('admin/teacher'); ?>">
                    <span class="glyphicon glyphicon-list" aria-hidden="true"></span>
                    <span class="hidden-sm">বক্তা/প্রশিক্ষক</span>
                </a>
            </li>
            <li class="link">
                <a href="<?php echo site_url('admin/new_teacher'); ?>">
                    <span class="glyphicon glyphicon-list" aria-hidden="true"></span>
                    <span class="hidden-sm">বক্তা/প্রশিক্ষক সংযোজন</span>
                </a>
            </li>
            <li class="link">
                <a href="<?php echo site_url('admin/all_details'); ?>">
                    <span class="glyphicon glyphicon-th" aria-hidden="true"></span>
                    <span class="hidden-sm">সকল প্রতিবেদন</span>
                </a>
            </li>
            <li class="link">
                <a href="<?php echo site_url('admin/course_review_list'); ?>">
                    <span class="glyphicon glyphicon-th-large" aria-hidden="true"></span>
                    <span class="hidden-sm">মূল্যায়ন প্রতিবেদন এক নজরে</span>
                </a>
            </li>
            <li class="link">
                <a href="<?php echo site_url('admin/user_list'); ?>">
                    <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                    <span class="hidden-sm">প্রশিক্ষণার্থীর প্রোফাইল তালিকা</span>
                </a>
            </li>
            <li class="link">
                <a href="<?php echo site_url('admin/yaerly_details'); ?>">
                    <span class="glyphicon glyphicon-list" aria-hidden="true"></span>
                    <span class="hidden-sm">অনুমোদিত প্রশিক্ষণ বর্ষপঞ্জি</span>
                </a>
            </li>
            <li class="link">
                <a href="#collapse-emp2" data-toggle="collapse" aria-controls="collapse-emp">
                    <span class="glyphicon glyphicon-fire" aria-hidden="true"></span>
                    <span class="hidden-sm">অনলাইন রেজিস্ট্রেশন</span>
                    <span class="glyphicon glyphicon-chevron-down pull-right hidden-sm"></span>
                </a>
                <ul class="collapse collapseable" id="collapse-emp2">
                    <li class="link">
                        <a href="<?php echo site_url('admin/demand'); ?>">
                            <span class="glyphicon glyphicon-adjust" aria-hidden="true"></span>
                            <span class="hidden-sm">চাহিদাসমূহ</span>
                        </a>
                    </li>                   
                </ul>
            </li>
            <li class="link">                        
                                  <a href="http://www.czikhulna.com" target="_blank">
                                       <span class="glyphicon glyphicon-home" aria-hidden="true"></span>
                                       <span class="hidden-sm">হোম প্যানেল</span>
                                  </a>
                             </li>
        <?php } ?>

        <?php
        if ($this->session->userdata('admin_type') == 2) { ?>
            <!---front panel--->
            <li class="link">
                <a href="<?php echo site_url('admin/idea'); ?>">
                    <span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>
                    <span class="hidden-sm">মতামতসমূহ</span>
                </a>
            </li>
            <li class="link">
                <a href="<?php echo site_url('admin/add_information/about_us'); ?>">
                    <span class="fa fa-home" aria-hidden="true"></span>
                    <span class="hidden-sm">প্রতিষ্ঠান সম্পর্কে</span>
                </a>
            </li>            
            <li class="link">
                <a href="<?php echo site_url('admin/add_information/our_mission'); ?>">
                    <span class="fa fa-laptop" aria-hidden="true"></span>
                    <span class="hidden-sm">আমাদের রূপকল্প</span>
                </a>
            </li>
            <li class="link">
                <a href="<?php echo site_url('admin/add_information/our_vision'); ?>">
                    <span class="fa fa-suitcase" aria-hidden="true"></span>
                    <span class="hidden-sm">আমাদের অভিলক্ষ্য</span>
                </a>
            </li>
            <li class="link">
                <a href="<?php echo site_url('admin/team'); ?>">
                    <span class="fa fa-users" aria-hidden="true"></span>
                    <span class="hidden-sm">আমাদের টিম</span>
                </a>
            </li>
            <li class="link">
                <a href="<?php echo site_url('admin/partner'); ?>">
                    <span class="fa fa-film" aria-hidden="true"></span>
                    <span class="hidden-sm">আমাদের পার্টনার</span>
                </a>
            </li>
            <li class="link">
                <a href="<?php echo site_url('admin/add_information/service'); ?>">
                    <span class="glyphicon glyphicon-gift" aria-hidden="true"></span>
                    <span class="hidden-sm">আমাদের সেবাসমূহ</span>
                </a>
            </li>
            <li class="link">
                <a href="<?php echo site_url('admin/add_information/facilities'); ?>">
                    <span class="fa fa-th-list" aria-hidden="true"></span>
                    <span class="hidden-sm">বিদ্যমান সুবিধাসমূহ</span>
                </a>
            </li>
            <li class="link">
                <a href="<?php echo site_url('admin/add_information/stockholder'); ?>">
                    <span class="fa fa-th" aria-hidden="true"></span>
                    <span class="hidden-sm">আমাদের সেবাগ্রহীতা ও স্টেকহোল্ডার</span>
                </a>
            </li>
            <li class="link">
                <a href="<?php echo site_url('admin/add_information/communication'); ?>">
                    <span class="fa fa-asterisk" aria-hidden="true"></span>
                    <span class="hidden-sm">যোগাযোগ ও যাতায়াত</span>
                </a>
            </li>
            <li class="link">
                <a href="<?php echo site_url('admin/add_information/structure'); ?>">
                    <span class="fa fa-anchor" aria-hidden="true"></span>
                    <span class="hidden-sm">সাংগঠনিক কাঠামো</span>
                </a>
            </li>
            <li class="link">
                <a href="<?php echo site_url('admin/add_information/our_achievement'); ?>">
                    <span class="fa fa-css3" aria-hidden="true"></span>
                    <span class="hidden-sm">আমাদের সাফল্য</span>
                </a>
            </li>
            
            <li class="link">
                <a href="<?php echo site_url('admin/apa'); ?>">
                    <span class="glyphicon glyphicon-screenshot" aria-hidden="true"></span>
                    <span class="hidden-sm">এপিএ লক্ষ্যমাত্রা</span>
                </a>
            </li>
        <?php }
        ?>

        <li class="link">
            <a href="<?php echo site_url('logout/index'); ?>">
                <span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>
                <span class="hidden-sm">লগআউট</span>
            </a>
        </li>
        <li class="link">
            <a href="<?php echo site_url('admin/change_login_info'); ?>">
                <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                <span class="hidden-sm">লগইন তথ্য পরিবর্তন</span>
            </a>
        </li>
        <!----2017-01-22------->


    </ul>
</div><!-- /sidebar col-md-2 -->