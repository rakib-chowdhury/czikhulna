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
        <td><p style="font-size: 18px;">প্রশিক্ষণার্থীর কোর্স মূল্যায়ন</p></td>
    </tr>
</table>
<br>
<table width="100%" align="center" border="1" style="margin: 0px; padding: 0px;" >
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
        <td colspan="4" style="text-align: center;">মূল্যায়ন </td>
        <td rowspan="2" style="text-align: center;">গড় </td>
    </tr>
    <tr>
        <td style="text-align: center;">হইতে</td>
        <td style="text-align: center;">পর্যন্ত</td>
        <td style="text-align: center;">পুরুষ</td>
        <td style="text-align: center;">নারী</td>
        <td style="text-align: center;">মোট</td>
        <td style="text-align: center;">ভাল নয়<br>৫০%></td>
        <td style="text-align: center;">ভাল<br>৫১%-<br>৬৫%</td>
        <td style="text-align: center;">খুব<br>ভাল<br>৬৬%-<br>৮০%</td>
        <td style="text-align: center;">অসাধারণ<br>৮১%-<br>১০০%</td>
    </tr>

    </thead>
    <tbody>
    <?php $i = 1; $nt_gd=0; $gd=0; $v_gd=0; $vv_gd=0;
    foreach ($course_review as $row) {  ?>
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
            <td style="text-align: center;"><?php $nt_gd+= $row['2']['not_good']; echo str_replace(range(0, 9), $bn_digits, $row['2']['not_good']); ?></td>
            <td style="text-align: center;"><?php $gd+=$row['2']['good']; echo str_replace(range(0, 9), $bn_digits, $row['2']['good']); ?></td>
            <td style="text-align: center;"><?php $v_gd+=$row['2']['very_good']; echo str_replace(range(0, 9), $bn_digits, $row['2']['very_good']); ?></td>
            <td style="text-align: center;"><?php $vv_gd+=$row['2']['very_very_good']; echo str_replace(range(0, 9), $bn_digits, $row['2']['very_very_good']); ?></td>
            <td style="text-align: center;"><?php echo str_replace(range(0, 9), $bn_digits, $row['3']); ?></td>
        </tr>
    <?php } ?>
    <tr>
        <td colspan="12" style="text-align: right; padding-right: 10px;">মূল্যায়ন</td>
        <td><?php echo str_replace(range(0, 9), $bn_digits, $nt_gd).' জন';?></td>
        <td><?php echo str_replace(range(0, 9), $bn_digits, $gd).' জন';?></td>
        <td><?php echo str_replace(range(0, 9), $bn_digits, $v_gd).' জন';?></td>
        <td><?php echo str_replace(range(0, 9), $bn_digits, $vv_gd).' জন';?></td>
        <td></td>
    </tr>
    </tbody>
</table>
</body>