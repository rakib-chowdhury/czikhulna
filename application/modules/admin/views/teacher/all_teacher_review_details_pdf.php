<?php $bn_digits = array('০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯'); ?>
<!doctype html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Department of Cooperatives-Government of the People's Republic of Bangladesh | সমবায় অধিদপ্তর-গণপ্রজাতন্ত্রী
        বাংলাদেশ সরকার</title>
    <style>
        table td{
            padding:8px;
        }
        .tbl1{
            border: 1px solid black;
            width:100%;
        }
        .tbl1 tr td{
            padding: 8px;
            border: 1px solid black;
        }
    </style>
</head>

<body>
<table align="center" style="text-align: center">
    <tr>
        <td><p style="font-size:18px">গণপ্রজাতন্ত্রী বাংলাদেশ সরকার<br>আঞ্চলিক সমবায় ইন্সটিটিউট<br>খুলনা।</p></td>
    </tr>
    <tr>
        <td><p style="font-size: 16px;">কোর্স অনুযায়ী প্রশিক্ষণার্থীর বক্তা/প্রশিক্ষক মূল্যায়ন প্রতিবেদন</p></td>
    </tr>
</table>
<br>
<table width="100%" align="center" border='0'>
    <tr>
        <td style="width:68%">কোর্স শিরোনাম : <?= $teacher_review[0]['c_name'] ?></td>
        <td>মেয়াদ : <?= str_replace(range(0, 9), $bn_digits, $teacher_review[0]['run_days']) ?> দিন
        </td>
    </tr>
    <tr>
        <td>প্রশিক্ষণ বর্ষ
            : <?= str_replace(range(0, 9), $bn_digits, $teacher_review[0]['year']) ?></td>
        <td>অর্থায়ন : <?= $teacher_review[0]['donor_name'] ?></td>
    </tr>
    <tr>
        <td>কোর্স শুরুর তারিখ : <?php
            $tDAte = explode('-', $teacher_review[0]['start_date']);
            $TdAtE = $tDAte[2] . '-' . $tDAte[1] . '-' . $tDAte[0];
            echo str_replace(range(0, 9), $bn_digits, $TdAtE); ?>
        </td>
        <td>কোর্স সমাপ্তির তারিখ : <?php
            $tDAte = explode('-', $teacher_review[0]['end_date']);
            $TdAtE = $tDAte[2] . '-' . $tDAte[1] . '-' . $tDAte[0];
            echo str_replace(range(0, 9), $bn_digits, $TdAtE); ?>
        </td>
    </tr>
    <tr>
        <td>কোর্সের ধরণ : <?= $teacher_review[0]['course_class_name'] ?></td>
        <td>প্রশিক্ষণার্থীর ধরণ : <?= $teacher_review[0]['class_name'] ?></td>
    </tr>
    <tr>
        <td colspan="2">
            <br><br>
        </td>
    </tr>
    <tr>
        <td colspan="2">বক্তা/প্রশিক্ষকের নাম : <?= $techIn[0]['t_name'] ?></td>
    </tr>
    <tr>
        <td colspan="2">পদবী : <?= $techIn[0]['des_name'] ?></td>
    </tr>
    <tr>
        <td>সেশন সংখ্যা : <?= $techIn[0]['session_num'] ?></td>
        <td>সেশন তারিখ : <?= $techIn[0]['session_date'] ?></td>
    </tr>
    <tr>
        <td colspan="2">সেশনের বিষয়/বিষয়সমূহ : <?= $techIn[0]['subject_name'] ?></td>
    </tr>
</table>
<br>
<table  class="tbl1 "
       cellspacing="0">
    <thead>
    <tr>
        <td style="text-align: center;">ক্রমিক</td>
        <td style="text-align: center;">প্রশিক্ষণার্থীর নাম</td>
        <td style="text-align: center;">মোবাইল নং</td>
        <td style="text-align: center;">মূল্যায়ন নম্বর (পূর্ণ নম্বর ১০০)</td>
        <td style="text-align: center;">গড়</td>
        <td style="text-align: center;">মন্তব্য/পরামর্শ</td>
    </tr>

    </thead>
    <tbody>
    <?php $i = 1;
    foreach ($teacher_review as $row) { ?>
        <tr>
            <td style="text-align: center;">
                <?=str_replace(range(0, 9), $bn_digits, $i++)?>
            </td>
            <td style="text-align: center;">
                <?= $row['u_name']?>
            </td>
            <td style="text-align: center;"><?= str_replace(range(0, 9), $bn_digits, $row['mobile']) ?></td>
            <td style="text-align: center;"><?= str_replace(range(0, 9), $bn_digits, $row['t_review']) ?></td>

            <?php
            if($i==2){ ?>
                <td rowspan="<?= sizeof($teacher_review)?>" style="text-align: center;"><?= str_replace(range(0, 9), $bn_digits, $avg); ?></td>
            <?php }
            ?>

            <td style="text-align: center;"><?= $row['t_comment']?></td>
        </tr>
    <?php } ?>
    </tbody>
</table>
</body>