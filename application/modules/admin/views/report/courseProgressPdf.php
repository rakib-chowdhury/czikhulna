<?php
$bn_digits = array('০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯');
$list = array('মাসিক', 'ত্রৈমাসিক', 'বার্ষিক');
$months = array('জানুয়ারী', 'ফেব্রুয়ারী', 'মার্চ', 'এপ্রিল', 'মে', 'জুন', 'জুলাই', 'অগাস্ট', 'সেপ্টেম্বর', 'অক্টোবর', 'নভেম্বর', 'ডিসেম্বর');
?>
<!doctype html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Department of Cooperatives-Government of the People's Republic of Bangladesh | সমবায় অধিদপ্তর-গণপ্রজাতন্ত্রী
        বাংলাদেশ সরকার</title>
</head>

<body>
<table align="center" style="text-align: center">
    <tr>
        <td><p style="font-size:18px">গণপ্রজাতন্ত্রী বাংলাদেশ সরকার<br>আঞ্চলিক সমবায় ইন্সটিটিউট<br>খুলনা।</p></td>
    </tr>
    <tr>
        <td><br></td>
    </tr>
    <tr>
        <td><p style="font-weight: 600">প্রশিক্ষণ অগ্রগতি সংক্রান্ত প্রতিবেদন</p></td>
    </tr>
    <tr>
        <td><p><?= $list[$type - 2] ?> :
                <?php
                if ($type == 2) {
                    $tm = explode('-', $mnth)[0];
                    $ty = explode('-', $mnth)[1];
                    echo $months[$tm - 1] . ', ';
                    echo str_replace(range(0, 9), $bn_digits, $ty);
                } elseif ($type == 3) {
                    $tm = explode('-', $mnthf)[0];
                    $ty = explode('-', $mnthf)[1];
                    echo $months[$tm - 1] . ', ';
                    echo str_replace(range(0, 9), $bn_digits, $ty);
                    echo ' থেকে ';
                    $tm = explode('-', $mntht)[0];
                    $ty = explode('-', $mntht)[1];
                    echo $months[$tm - 1] . ', ';
                    echo str_replace(range(0, 9), $bn_digits, $ty);
                } elseif ($type == 4) {
                    echo str_replace(range(0, 9), $bn_digits, $year);
                }
                ?></p></td>
    </tr>
</table>
<br>
<p style="text-align: center; font-size: 16px; font-weight: 600;">কোর্সের ধরণ : সকল</p>
<table style="font-size:12px; margin: 0px; padding: 0px;" align="center" border="1" width="100%" cellspacing="0px;" ;>
    <thead>
    <tr>
        <td style="text-align: center; "></td>
        <td style="text-align: center; ">কোর্স সংখ্যা</td>
        <td style="text-align: center; ">প্রশিক্ষণার্থী সংখ্যা</td>
        <td style="text-align: center; ">পুরুষ</td>
        <td style="text-align: center;">নারী</td>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td> সরকারি কর্মচারী</td>
        <td style="text-align: center;">
            <?php
            $tmpf = 0;
            foreach ($allCrse as $a) {
                if ($a['id'] == 2) {
                    $tmpf = $a['tCrse'];
                }
            }
            echo str_replace(range(0, 9), $bn_digits, $tmpf);
            ?>
        </td>
        <td style="text-align: center;">
            <?php
            $tmpm = 0;
            $tmpfe = 0;
            foreach ($allTraineeMan as $a) {
                if ($a['clssftn'] == 2) {
                    $tmpm = $a['t_stdnt'];
                }
            }
            foreach ($allTraineeWoMan as $a) {
                if ($a['clssftn'] == 2) {
                    $tmpfe = $a['t_stdnt'];
                }
            }
            echo str_replace(range(0, 9), $bn_digits, ($tmpm + $tmpfe));
            ?>
        </td>
        <td style="text-align: center;">
            <?= str_replace(range(0, 9), $bn_digits, ($tmpm)); ?>
        </td>
        <td style="text-align: center;">
            <?= str_replace(range(0, 9), $bn_digits, ($tmpfe)); ?>
        </td>
    </tr>
    <tr>
        <td> সমবায় সমিতির সদস্য</td>
        <td style="text-align: center;">
            <?php
            $tmpf = 0;
            foreach ($allCrse as $a) {
                if ($a['id'] == 1) {
                    $tmpf = $a['tCrse'];
                }
            }
            echo str_replace(range(0, 9), $bn_digits, $tmpf);
            ?>
        </td>
        <td style="text-align: center;">
            <?php
            $tmpm = 0;
            $tmpfe = 0;
            foreach ($allTraineeMan as $a) {
                if ($a['clssftn'] == 1) {
                    $tmpm = $a['t_stdnt'];
                }
            }
            foreach ($allTraineeWoMan as $a) {
                if ($a['clssftn'] == 1) {
                    $tmpfe = $a['t_stdnt'];
                }
            }
            echo str_replace(range(0, 9), $bn_digits, ($tmpm + $tmpfe));
            ?>
        </td>
        <td style="text-align: center;">
            <?= str_replace(range(0, 9), $bn_digits, ($tmpm)); ?>
        </td>
        <td style="text-align: center;">
            <?= str_replace(range(0, 9), $bn_digits, ($tmpfe)); ?>
        </td>
    </tr>
    <tr>
        <td> অন্যান্য</td>
        <td style="text-align: center;">
            <?php
            $tmpf = 0;
            foreach ($allCrse as $a) {
                if ($a['id'] == 3) {
                    $tmpf = $a['tCrse'];
                }
            }
            echo str_replace(range(0, 9), $bn_digits, $tmpf);
            ?>
        </td>
        <td style="text-align: center;">
            <?php
            $tmpm = 0;
            $tmpfe = 0;
            foreach ($allTraineeMan as $a) {
                if ($a['clssftn'] == 3) {
                    $tmpm = $a['t_stdnt'];
                }
            }
            foreach ($allTraineeWoMan as $a) {
                if ($a['clssftn'] == 3) {
                    $tmpfe = $a['t_stdnt'];
                }
            }
            echo str_replace(range(0, 9), $bn_digits, ($tmpm + $tmpfe));
            ?>
        </td>
        <td style="text-align: center;">
            <?= str_replace(range(0, 9), $bn_digits, ($tmpm)); ?>
        </td>
        <td style="text-align: center;">
            <?= str_replace(range(0, 9), $bn_digits, ($tmpfe)); ?>
        </td>
    </tr>
    </tbody>
</table>
<br>
<p style="text-align: center; font-size: 16px; font-weight: 600;">কোর্সের ধরণ : আইজিএ</p>
<table style="font-size:12px; margin: 0px; padding: 0px;" align="center" border="1" width="100%" cellspacing="0px;" ;>
    <thead>
    <tr>
        <td style="text-align: center; "></td>
        <td style="text-align: center; ">কোর্স সংখ্যা</td>
        <td style="text-align: center; ">প্রশিক্ষণার্থী সংখ্যা</td>
        <td style="text-align: center; ">পুরুষ</td>
        <td style="text-align: center;">নারী</td>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td> সরকারি কর্মচারী</td>
        <td style="text-align: center;">
            <?php
            $tmpf = 0;
            foreach ($igaCrse as $a) {
                if ($a['id'] == 2) {
                    $tmpf = $a['tCrse'];
                }
            }
            echo str_replace(range(0, 9), $bn_digits, $tmpf);
            ?>
        </td>
        <td style="text-align: center;">
            <?php
            $tmpm = 0;
            $tmpfe = 0;
            foreach ($igaTraineeMan as $a) {
                if ($a['clssftn'] == 2) {
                    $tmpm = $a['t_stdnt'];
                }
            }
            foreach ($igaTraineeWoMan as $a) {
                if ($a['clssftn'] == 2) {
                    $tmpfe = $a['t_stdnt'];
                }
            }
            echo str_replace(range(0, 9), $bn_digits, ($tmpm + $tmpfe));
            ?>
        </td>
        <td style="text-align: center;">
            <?= str_replace(range(0, 9), $bn_digits, ($tmpm)); ?>
        </td>
        <td style="text-align: center;">
            <?= str_replace(range(0, 9), $bn_digits, ($tmpfe)); ?>
        </td>
    </tr>
    <tr>
        <td> সমবায় সমিতির সদস্য</td>
        <td style="text-align: center;">
            <?php
            $tmpf = 0;
            foreach ($igaCrse as $a) {
                if ($a['id'] == 1) {
                    $tmpf = $a['tCrse'];
                }
            }
            echo str_replace(range(0, 9), $bn_digits, $tmpf);
            ?>
        </td>
        <td style="text-align: center;">
            <?php
            $tmpm = 0;
            $tmpfe = 0;
            foreach ($igaTraineeMan as $a) {
                if ($a['clssftn'] == 1) {
                    $tmpm = $a['t_stdnt'];
                }
            }
            foreach ($igaTraineeWoMan as $a) {
                if ($a['clssftn'] == 1) {
                    $tmpfe = $a['t_stdnt'];
                }
            }
            echo str_replace(range(0, 9), $bn_digits, ($tmpm + $tmpfe));
            ?>
        </td>
        <td style="text-align: center;">
            <?= str_replace(range(0, 9), $bn_digits, ($tmpm)); ?>
        </td>
        <td style="text-align: center;">
            <?= str_replace(range(0, 9), $bn_digits, ($tmpfe)); ?>
        </td>
    </tr>
    <tr>
        <td> অন্যান্য</td>
        <td style="text-align: center;">
            <?php
            $tmpf = 0;
            foreach ($igaCrse as $a) {
                if ($a['id'] == 3) {
                    $tmpf = $a['tCrse'];
                }
            }
            echo str_replace(range(0, 9), $bn_digits, $tmpf);
            ?>
        </td>
        <td style="text-align: center;">
            <?php
            $tmpm = 0;
            $tmpfe = 0;
            foreach ($igaTraineeMan as $a) {
                if ($a['clssftn'] == 3) {
                    $tmpm = $a['t_stdnt'];
                }
            }
            foreach ($igaTraineeWoMan as $a) {
                if ($a['clssftn'] == 3) {
                    $tmpfe = $a['t_stdnt'];
                }
            }
            echo str_replace(range(0, 9), $bn_digits, ($tmpm + $tmpfe));
            ?>
        </td>
        <td style="text-align: center;">
            <?= str_replace(range(0, 9), $bn_digits, ($tmpm)); ?>
        </td>
        <td style="text-align: center;">
            <?= str_replace(range(0, 9), $bn_digits, ($tmpfe)); ?>
        </td>
    </tr>
    </tbody>
</table>
<br>
<p style="text-align: center; font-size: 16px; font-weight: 600;">কোর্সের ধরণ : মানব সম্পদ উন্নয়ন</p>
<table style="font-size:12px; margin: 0px; padding: 0px;" align="center" border="1" width="100%" cellspacing="0px;" ;>
    <thead>
    <tr>
        <td style="text-align: center; "></td>
        <td style="text-align: center; ">কোর্স সংখ্যা</td>
        <td style="text-align: center; ">প্রশিক্ষণার্থী সংখ্যা</td>
        <td style="text-align: center; ">পুরুষ</td>
        <td style="text-align: center;">নারী</td>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td> সরকারি কর্মচারী</td>
        <td style="text-align: center;">
            <?php
            $tmpf = 0;
            foreach ($manCrse as $a) {
                if ($a['id'] == 2) {
                    $tmpf = $a['tCrse'];
                }
            }
            echo str_replace(range(0, 9), $bn_digits, $tmpf);
            ?>
        </td>
        <td style="text-align: center;">
            <?php
            $tmpm = 0;
            $tmpfe = 0;
            foreach ($manTraineeMan as $a) {
                if ($a['clssftn'] == 2) {
                    $tmpm = $a['t_stdnt'];
                }
            }
            foreach ($manTraineeWoMan as $a) {
                if ($a['clssftn'] == 2) {
                    $tmpfe = $a['t_stdnt'];
                }
            }
            echo str_replace(range(0, 9), $bn_digits, ($tmpm + $tmpfe));
            ?>
        </td>
        <td style="text-align: center;">
            <?= str_replace(range(0, 9), $bn_digits, ($tmpm)); ?>
        </td>
        <td style="text-align: center;">
            <?= str_replace(range(0, 9), $bn_digits, ($tmpfe)); ?>
        </td>
    </tr>
    <tr>
        <td> সমবায় সমিতির সদস্য</td>
        <td style="text-align: center;">
            <?php
            $tmpf = 0;
            foreach ($manCrse as $a) {
                if ($a['id'] == 1) {
                    $tmpf = $a['tCrse'];
                }
            }
            echo str_replace(range(0, 9), $bn_digits, $tmpf);
            ?>
        </td>
        <td style="text-align: center;">
            <?php
            $tmpm = 0;
            $tmpfe = 0;
            foreach ($manTraineeMan as $a) {
                if ($a['clssftn'] == 1) {
                    $tmpm = $a['t_stdnt'];
                }
            }
            foreach ($manTraineeWoMan as $a) {
                if ($a['clssftn'] == 1) {
                    $tmpfe = $a['t_stdnt'];
                }
            }
            echo str_replace(range(0, 9), $bn_digits, ($tmpm + $tmpfe));
            ?>
        </td>
        <td style="text-align: center;">
            <?= str_replace(range(0, 9), $bn_digits, ($tmpm)); ?>
        </td>
        <td style="text-align: center;">
            <?= str_replace(range(0, 9), $bn_digits, ($tmpfe)); ?>
        </td>
    </tr>
    <tr>
        <td> অন্যান্য</td>
        <td style="text-align: center;">
            <?php
            $tmpf = 0;
            foreach ($manCrse as $a) {
                if ($a['id'] == 3) {
                    $tmpf = $a['tCrse'];
                }
            }
            echo str_replace(range(0, 9), $bn_digits, $tmpf);
            ?>
        </td>
        <td style="text-align: center;">
            <?php
            $tmpm = 0;
            $tmpfe = 0;
            foreach ($manTraineeMan as $a) {
                if ($a['clssftn'] == 3) {
                    $tmpm = $a['t_stdnt'];
                }
            }
            foreach ($manTraineeWoMan as $a) {
                if ($a['clssftn'] == 3) {
                    $tmpfe = $a['t_stdnt'];
                }
            }
            echo str_replace(range(0, 9), $bn_digits, ($tmpm + $tmpfe));
            ?>
        </td>
        <td style="text-align: center;">
            <?= str_replace(range(0, 9), $bn_digits, ($tmpm)); ?>
        </td>
        <td style="text-align: center;">
            <?= str_replace(range(0, 9), $bn_digits, ($tmpfe)); ?>
        </td>
    </tr>
    </tbody>
</table>
</body>
</html>