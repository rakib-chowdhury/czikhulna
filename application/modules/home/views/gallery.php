<?php $bn_digits = array('০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯'); ?>
<link rel='stylesheet' href='<?= base_url() ?>/public_assets/unitegallery/css/unite-gallery.css' type='text/css'/>
<link rel='stylesheet' href='<?= base_url() ?>/public_assets/unitegallery/themes/default/ug-theme-default.css'
      type='text/css'/>
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
                    <li><a href="<?= site_url('home') ?>">CZI KHULNA</a></li>
                    <li><a href="<?= site_url('home/elearning_list') ?>">গ্যালারি</a></li>
                </ul>
            </div>
        </div>

        <h1 class="page-title about-title"><span style="color: whitesmoke; background: #8bc541;">গ্যালারি</span>
        </h1>

        <!-- accord - skills with background image -->
        <div class="accord-skills white-back">
            <div class="title-section">
                <div class="container triggerAnimation animated" data-animate="bounceIn">
                    <h1>গ্যালারিতে আপনাকে স্বাগতম</h1>
                </div>
            </div>

            <div class="accord-skills-container container">
                <div class="row" style="text-align: center">
                    <?php if (sizeof($page_info) == 0) { ?>
                        <div class="col-md-12">
                            <p>কোনো তথ্য নেই</p>
                        </div>
                    <?php } else { ?>
                        <div id="gallery" class="center-block" style="display:none;">
                            <?php foreach ($page_info as $row) {
                                if ($row['type'] == 1) { ?>
                                    <img alt="Preview Image 1"
                                         src="<?= base_url() . '/uploads/gallery/thumbs/' . $row['name'] ?>"
                                         data-image="<?= base_url() . '/uploads/gallery/thumbs/' . $row['name'] ?>"
                                         data-description="<?= $row['details'] ?>">
                                <?php } else { 
                                    ?>
                                    <img alt="Youtube Without Images"
                                         data-type="youtube"
                                         data-videoid="<?= explode('/',$row['name'])[3]?>"
                                         data-description="<?=$row['details']?>">
                                <?php }
                            } ?>

                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>

    </div>
    <!-- End content -->
    <?php $this->load->view('public_layout/footer'); ?>
</div>


<!-- End Container -->
<?php $this->load->view('public_layout/footerlink'); ?>
<script type='text/javascript' src='<?= base_url() ?>/public_assets/unitegallery/js/ug-common-libraries.js'></script>
<script type='text/javascript' src='<?= base_url() ?>/public_assets/unitegallery/js/ug-functions.js'></script>
<script type='text/javascript' src='<?= base_url() ?>/public_assets/unitegallery/js/ug-thumbsgeneral.js'></script>
<script type='text/javascript' src='<?= base_url() ?>/public_assets/unitegallery/js/ug-thumbsstrip.js'></script>
<script type='text/javascript' src='<?= base_url() ?>/public_assets/unitegallery/js/ug-touchthumbs.js'></script>
<script type='text/javascript' src='<?= base_url() ?>/public_assets/unitegallery/js/ug-panelsbase.js'></script>
<script type='text/javascript' src='<?= base_url() ?>/public_assets/unitegallery/js/ug-strippanel.js'></script>
<script type='text/javascript' src='<?= base_url() ?>/public_assets/unitegallery/js/ug-gridpanel.js'></script>
<script type='text/javascript' src='<?= base_url() ?>/public_assets/unitegallery/js/ug-thumbsgrid.js'></script>
<script type='text/javascript' src='<?= base_url() ?>/public_assets/unitegallery/js/ug-tiles.js'></script>
<script type='text/javascript' src='<?= base_url() ?>/public_assets/unitegallery/js/ug-tiledesign.js'></script>
<script type='text/javascript' src='<?= base_url() ?>/public_assets/unitegallery/js/ug-avia.js'></script>
<script type='text/javascript' src='<?= base_url() ?>/public_assets/unitegallery/js/ug-slider.js'></script>
<script type='text/javascript' src='<?= base_url() ?>/public_assets/unitegallery/js/ug-sliderassets.js'></script>
<script type='text/javascript' src='<?= base_url() ?>/public_assets/unitegallery/js/ug-touchslider.js'></script>
<script type='text/javascript' src='<?= base_url() ?>/public_assets/unitegallery/js/ug-zoomslider.js'></script>
<script type='text/javascript' src='<?= base_url() ?>/public_assets/unitegallery/js/ug-video.js'></script>
<script type='text/javascript' src='<?= base_url() ?>/public_assets/unitegallery/js/ug-gallery.js'></script>
<script type='text/javascript' src='<?= base_url() ?>/public_assets/unitegallery/js/ug-lightbox.js'></script>
<script type='text/javascript' src='<?= base_url() ?>/public_assets/unitegallery/js/ug-carousel.js'></script>
<script type='text/javascript' src='<?= base_url() ?>/public_assets/unitegallery/js/ug-api.js'></script>
<script type='text/javascript'
        src='<?= base_url() ?>/public_assets/unitegallery/themes/default/ug-theme-default.js'></script>
<script type="text/javascript">

    jQuery(document).ready(function () {

        jQuery("#gallery").unitegallery();

    });

</script>
</body>
</html>