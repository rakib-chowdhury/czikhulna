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
        <td><p style="font-size:18px">গণপ্রজাতন্ত্রী বাংলাদেশ সরকার<br>আঞ্চলিক সমবায় ইন্সটিটিউট<br>খুলনা।<br></p></td>
    </tr>
    <tr>
        <td><p style="font-size: 17px;"><br>কোর্সের বিস্তারিত ব্যয় বিভাজন<br></p></td>
    </tr>
</table>
<table width="100%" align="center" border='0' style="font-size:14px;">
    <tr>
        <td style="width:68%">কোর্স শিরোনাম : <?= $course[0]['c_name'] ?></td>
        <td>কোর্স শুরুর তারিখ : <?php
            $tDAte = explode('-', $course[0]['start_date']);
            $TdAtE = $tDAte[2] . '-' . $tDAte[1] . '-' . $tDAte[0];
            echo str_replace(range(0, 9), $bn_digits, $TdAtE); ?>
        </td>
    </tr>
    <tr>
        <td>অর্থায়ন : <?= $course[0]['donor_name'] ?> (<?= str_replace(range(0, 9), $bn_digits, $course[0]['year']) ?>)
        </td>
        <td>কোর্স সমাপ্তির তারিখ : <?php
            $tDAte = explode('-', $course[0]['end_date']);
            $TdAtE = $tDAte[2] . '-' . $tDAte[1] . '-' . $tDAte[0];
            echo str_replace(range(0, 9), $bn_digits, $TdAtE); ?>
        </td>
    </tr>
    <tr>
        <td>প্রশিক্ষণার্থীর ধরণ : <?= $course[0]['class_name'] ?></td>
        <td>কোর্সের ধরণ : <?= $course[0]['course_class_name'] ?></td>
    </tr>
    <tr>
        <td >প্রশিক্ষণার্থীর সংখ্যা  : <?= str_replace(range(0,9),$bn_digits,$course[0]['total_student'])?>
            <?php $man=0; $women=0;
            foreach ($typeofstudent as $ty){
                if($ty['gender']==1){
                    $man=$ty['count'];
                }
                if($ty['gender']==2){
                    $women=$ty['count'];
                }
            }
            ?>
            (নারী : <?= str_replace(range(0,9),$bn_digits,$women)?>, পুরুষ : <?= str_replace(range(0,9),$bn_digits,$man)?>)
        </td>
        <td>মোট খরচ : <?= str_replace(range(0, 9), $bn_digits, $course[0]['expenditure']) ?> টাকা</td>
    </tr>
</table>
<br>
<?php
if(sizeof($details)==0){?>
<p style="text-align: center; font-size: 14px;">ব্যয় বিভাজন সংযোজন করা হয় নাই</p>
<?php }else{?>
<!--p style="text-align: center; font-weight: 600; font-size: 16px"></p>-->
<table style="font-size:12px;" align="center" border="1" width="100%" style="margin: 0px; padding: 0px;"
       cellspacing="0px;" ;>
    <thead>
    <tr>
        <td style="text-align: center">ক্রমিক নং</td>
        <td style="text-align: center">খাতের নাম</td>
        <td style="text-align: center">ইউনিট সংখ্যা</td>
        <td style="text-align: center">একক দর</td>
        <td style="text-align: center">মোট টাকা</td>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($details as $i => $row) { ?>
        <tr>
            <td style="text-align: center;">
                <?php echo str_replace(range(0, 9), $bn_digits, ($i+1)); ?>
            </td>
            <td style="padding-left: 10px;"><?= $row['details']; ?></td>
            <td style="text-align: center"><?= str_replace(range(0, 9), $bn_digits, $row['unit_quantity']); ?></td>
            <td style="text-align: center"><?= str_replace(range(0, 9), $bn_digits, $row['unit_price']); ?></td>
            <td style="text-align: right; padding-right: 30px"><?= str_replace(range(0, 9), $bn_digits, ($row['unit_quantity'] * $row['unit_price'])); ?></td>
        </tr>
    <?php } ?>
    <tr>
        <td colspan="4" style="text-align: center">সর্বমোট </td>
        <td style="text-align: right; padding-right: 30px"><?= str_replace(range(0, 9), $bn_digits, $course[0]['expenditure']) ?></td>
    </tr>
    </tbody>
</table>

<?php }
?>
</body>