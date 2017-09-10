<?php
$bn_digits = array('০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯');
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
        <td><p style="font-size: 16px;">বাজেট সংক্রান্ত প্রতিবেদন</p></td>
    </tr>
</table>
<br>
<table align="center" border="1" style="margin: 0px; padding: 0px; text-align: center">
    <thead>
    <tr>
        <td style="width: 8%; text-align: center;">ক্রমিক নং</td>
        <td style="width: 10%; text-align: center;">বর্ষ</td>
        <td style="width: 15%; text-align: center;">খাত</td>
        <td style="text-align: center;">মোট বরাদ্দ প্রাপ্তি</td>
        <td style="text-align: center;"><?= $months[$curr_m-1]?> মাস পর্যন্ত ব্যয় লক্ষ্যমাত্রা</td>
        <td style="text-align: center;"><?= $months[$curr_m-1]?> মাস পর্যন্ত সমাপ্ত কোর্স এর ব্যয় </td>
        <td style="text-align: center;">অবশিষ্ট</td>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($course as $key => $c) { ?>
        <tr>
            <td><?= str_replace(range(0, 9), $bn_digits, ($key + 1)) ?></td>
            <td><?= str_replace(range(0, 9), $bn_digits, $c['donation_year']) ?></td>
            <td><?= str_replace(range(0, 9), $bn_digits, $c['donor_name']) ?></td>
            <td><?= str_replace(range(0, 9), $bn_digits, $c['total_donation']) ?>
                    টাকা </td>
            <td><?= str_replace(range(0, 9), $bn_digits, $c[0]) ?>
                    টাকা</td>
            <td><?= str_replace(range(0, 9), $bn_digits, $c[1]) ?>
                টাকা</td>
            <td><?= str_replace(range(0, 9), $bn_digits, $c['total_donation'] - $c[1]) ?>
                টাকা
            </td>
        </tr>
    <?php }
    ?>
    </tbody>
</table>
</body>