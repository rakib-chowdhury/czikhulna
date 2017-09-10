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
        <td><p style="font-size: 18px;">প্রশিক্ষণ বর্ষপঞ্জি: <?php if($curr_y=='all'){ echo "সকল"; }else{ echo str_replace(range(0,9),$bn_digits,$curr_y);} ?></p></td>
    </tr>
</table>
<br>
<table align="center" border="1" style="margin: 0px; padding: 0px;" >
    <thead>
    <tr>
        <td rowspan="2" style="text-align: center;">কোর্সের<br> ক্রমিক<br> নম্বর</td>
        <td rowspan="2" style="text-align: center;">প্রশিক্ষণ<br> কোর্সের<br> শিরোনাম
        </td>
        <td rowspan="2" style="text-align: center;">প্রশিক্ষণ<br> বর্ষ</td>
        <td rowspan="2" style="text-align: center;">অর্থায়ন</td>
        <td rowspan="2" style="text-align: center;">প্রশিক্ষণার্থী<br> ধরণ</td>
        <td rowspan="2" style="text-align: center;">কোর্সের<br> ধরণ</td>
        <td colspan="2" style="text-align: center;">প্রশিক্ষণ অনুষ্ঠানের<br> তারিখ</td>
        <td rowspan="2" style="text-align: center;">প্রশিক্ষণ<br> দিন সংখ্যা</td>
        <td colspan="3" style="text-align: center;">প্রশিক্ষণার্থী<br>সংখ্যা</td>
        <td rowspan="2" style="text-align: center;">কোর্সের<br> বরাদ্দ /ব্যয়</td>
        <td rowspan="2" style="text-align: center;">খাতের<br>মোট<br>বরাদ্দ</td>
        <td rowspan="2" style="text-align: center;">অবশিষ্ট</td>
        <!--<td rowspan="2" style="text-align: center;">খাতের<br>মোট<br>বরাদ্দ<br>(শতকরা<br>হার)
        </td>-->
        <td rowspan="2" style="text-align: center;">কোর্সের<br>বর্তমান<br>অবস্থা
        </td>
    </tr>
    <tr>
        <td style="text-align: center;">হইতে</td>
        <td style="text-align: center;">পর্যন্ত</td>
        <td style="text-align: center;">পুরুষ</td>
        <td style="text-align: center;">নারী</td>
        <td style="text-align: center;">মোট</td>
    </tr>

    </thead>
    <tbody>
    <?php $i = 1;
    foreach ($course as $row) { ?>
        <tr>
            <td style="text-align: center;">
                <?php
                echo str_replace(range(0, 9), $bn_digits, $i++);
                ?>
            </td>
            <td style="text-align: center;"><?= $row['c_name']; ?></td>
            <td style="text-align: center;"><?= str_replace(range(0, 9), $bn_digits, $row['year']); ?></td>
            <td style="text-align: center;"><?= $row['donor_name']; ?></td>
            <td style="text-align: center;"><?= str_replace(range(0, 9), $bn_digits, $row['class_name']); ?></td>
            <td style="text-align: center;"><?= $row['course_class_name']; ?></td>
            <td style="text-align: center;">
                <?php
                     $tDAte=explode('-',$row['start_date']);
		     $TdAtE=$tDAte[2].'-'.$tDAte[1].'-'.$tDAte[0];
		     echo str_replace(range(0, 9), $bn_digits, $TdAtE);  ?>
            </td>
            <td style="text-align: center;">
                <?php
                     $tDAte=explode('-',$row['end_date']);
		     $TdAtE=$tDAte[2].'-'.$tDAte[1].'-'.$tDAte[0];
		     echo str_replace(range(0, 9), $bn_digits, $TdAtE);  ?>
            </td>
            <td style="text-align: center;"><?= str_replace(range(0, 9), $bn_digits, $row['run_days']) . ' দিন'; ?></td>
            <td style="text-align: center;"><?php echo str_replace(range(0, 9), $bn_digits, $row['0']); ?></td>
            <td style="text-align: center;"><?php echo str_replace(range(0, 9), $bn_digits, $row['1']); ?></td>
            <td style="text-align: center;"><?php echo str_replace(range(0, 9), $bn_digits, $row['total_student']); ?></td>
            <td style="text-align: center;"><?= str_replace(range(0, 9), $bn_digits, $row['expenditure']); ?></td>
            <td style="text-align: center;"><?= str_replace(range(0, 9), $bn_digits, $row['total_donation']); ?></td>
            <td style="text-align: center;"><?= str_replace(range(0, 9), $bn_digits,$row['2']); ?></td>
            <!--<td style="text-align: center;"><?php
                $Pp=number_format($row['expenditure_percentage'],2);
                echo str_replace(range(0, 9), $bn_digits,$Pp).'%'; ?></td>-->
            <td style="text-align: center;">
                <?php
                if ($row['course_status'] == 1) {
                    echo 'সম্পাদনযোগ্য';
                } elseif ($row['course_status'] == 2) {
                    echo 'সম্পাদিত';
                } else {
                    echo $row['course_status'];
                }
                ?>
            </td>
        </tr>
    <?php } ?>
    <tr>
        <td style="text-align: center;" colspan="13">
        </td>
        <td style="text-align: center;"><?= str_replace(range(0, 9), $bn_digits, $donorAmnt[0]['total']); ?></td>
        <td style="text-align: center;"><?= str_replace(range(0, 9), $bn_digits, $donorAmnt[0]['total']-$expnseAmnt[0]['expnse']); ?></td>
        <td></td>
        <!--<td></td>-->
    </tr>
    </tbody>
</table>
</body>