<?php $bn_digits = array('০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯'); ?>
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
        <td><p style="font-size:20px">গণপ্রজাতন্ত্রী বাংলাদেশ সরকার<br>আঞ্চলিক সমবায় ইন্সটিটিউট<br>খুলনা।</p></td>
    </tr>
    <tr>
        <td><p style="font-size: 18px;"><?= $title?></p></td>
    </tr>
</table>
<br>
<table align="center" border="1" style="margin: 0px; padding: 0px;" cellspacing="0" >
    <thead>
    <tr>
        <td style="text-align: center">ক্রমিক নং</td>
        <td style="text-align: center">কোর্স শিরোনাম</td>
        <td style="text-align: center">প্রশিক্ষণ বর্ষ</td>
        <td style="text-align: center">কোর্স শুরুর তারিখ</td>
        <td style="text-align: center">কোর্স সমাপ্তির তারিখ</td>
        <td style="text-align: center">মেয়াদ<br>(দিন)</td>
        <td style="text-align: center">প্রতিষ্ঠান</td>
        <td style="text-align: center">কোর্স স্ট্যাটাস</td>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($course as $k => $all) { ?>
        <tr>
            <td style="text-align: center"><?= str_replace(range(0,9),$bn_digits,$k+1)?></td>
            <td><?= $all['c_name']?></td>
            <td style="text-align: center"><?= str_replace(range(0,9),$bn_digits,$all['year'])?></td>
            <td style="text-align: center">
                <?php
                $date1=explode('-',$all['start_date']);
                $date2=$date1[2].'-'.$date1[1].'-'.$date1[0];
                echo str_replace(range(0,9),$bn_digits,$date2)
                ?>
            </td>
            <td style="text-align: center">
                <?php
                $date1=explode('-',$all['end_date']);
                $date2=$date1[2].'-'.$date1[1].'-'.$date1[0];
                echo str_replace(range(0,9),$bn_digits,$date2)
                ?>
            </td>
            <td style="text-align: center"><?= str_replace(range(0,9),$bn_digits,$all['run_days'])?></td>
            <td>আঞ্চলিক সমবায় ইনষ্টিটিউট খুলনা</td>
            <td style="text-align: center">
                <?php
                if($all['end_date']<date('Y-m-d')){
                    if($all['course_status']==2){
                       echo 'সম্পাদিত';
                    }else{
                       echo 'পূর্ববর্তী';
                    }                   
                }elseif($all['start_date']>date('Y-m-d')){
                    echo 'পরবর্তী';
                }else{
                    echo 'চলমান';
                }
                ?>
            </td>
        </tr>
    <?php }
    ?>
    </tbody>
</table>
</body>