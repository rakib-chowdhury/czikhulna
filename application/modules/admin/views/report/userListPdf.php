<?php
$bn_digits = array('০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯');
$list = array('নির্দিষ্ট কোর্স', 'প্রশিক্ষণার্থীর ধরণ', 'কোর্সের ধরণ', 'খাত', 'প্রশিক্ষণ বর্ষ', 'জেলা', 'উপজেলা');
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
        <td><p style="font-weight: 600"><?= $list[$type-1]?> অনুযায়ী প্রশিক্ষণার্থী তালিকা</p></td>
    </tr>
</table>
<br>
<br>
<table style="font-size:12px;" align="center" border="1" width="100%" style="margin: 0px; padding: 0px;"
       cellspacing="0px;" ;>
    <thead>
    <tr>
        <td colspan="4" style="text-align: center; width: 50%">পুরুষ</td>
        <td colspan="4" style="text-align: center;">নারী</td>
    </tr>
    <tr>
        <td style="text-align: center;"> ক্রমিক নং</td>
        <td style="text-align: center;">নাম</td>
        <td style="text-align: center;">জাতীয় পরিচয়পত্র নম্বর</td>
        <td style="text-align: center;">মোবাইল</td>
        <!--<td style="text-align: center;"> ক্রমিক নং</td>-->
        <td style="text-align: center;">নাম</td>
        <td style="text-align: center;">জাতীয় পরিচয়পত্র নম্বর</td>
        <td style="text-align: center;">মোবাইল</td>
    </tr>
    </thead>
    <tbody>
    <?php
    $mSize=sizeof($male);
    $feSize=sizeof($female);
    $big=$mSize;
    if($big<=$feSize){
        $big=$feSize;
    }
    for($i=0;$i<$big; $i++){ ?>
        <tr>
            <?php
            if($i<$mSize){ ?>
                <td style="text-align: center; width:5%"><?= str_replace(range(0,9),$bn_digits,($i+1))?></td>
                <td><?= $male[$i]['u_name']?></td>
                <td style="text-align: center; width:19%;"><?= str_replace(range(0,9),$bn_digits,$male[$i]['nid'])?></td>
                <td style="text-align: center; width:14%;"><?= str_replace(range(0,9),$bn_digits,$male[$i]['mobile'])?></td>
            <?php }else{ ?>
                <td> </td>
                <td> </td>
                <td> </td>
                <td> </td>
            <?php }
            ?>
            <?php
            if($i<$feSize){ ?>
                <!--<td style="text-align: center; width:5%"><?= str_replace(range(0,9),$bn_digits,$i)?></td>-->
                <td><?= $female[$i]['u_name']?></td>
                <td style="text-align: center; width:19%;"><?= str_replace(range(0,9),$bn_digits,$female[$i]['nid'])?></td>
                <td style="text-align: center; width:14%;"><?= str_replace(range(0,9),$bn_digits,$female[$i]['mobile'])?></td>
            <?php }else{ ?>
                <!--<td></td>-->
                <td></td>
                <td></td>
                <td></td>
            <?php }
            ?>
        </tr>
    <?php }
    ?>
    </tbody>
</table>

</body>
</html>