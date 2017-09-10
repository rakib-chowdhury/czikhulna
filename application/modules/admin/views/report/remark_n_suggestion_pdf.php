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
        <td><p style="font-size:18px">গণপ্রজাতন্ত্রী বাংলাদেশ সরকার<br>আঞ্চলিক সমবায় ইন্সটিটিউট<br>খুলনা।</p></td>
    </tr>
    <tr>
        <td><br></td>
    </tr>
    <tr>
        <td><p style="font-weight: 600">আগ্রহী নাগরিকের মতামত ও পরামর্শ সংক্রান্ত প্রতিবেদন</p></td>
    </tr>
</table>
<br>
<br>
<table style="font-size:12px;" align="center" border="1" width="100%" style="margin: 0px; padding: 0px;"
       cellspacing="0px;" ;>
    <thead>
     <tr>
         <td rowspan="2" style="text-align: center; width: 4%;">ক্রমিক নং</td>
         <td rowspan="2" style="text-align: center; ">নাম</td>
         <td rowspan="2" style="text-align: center; ">পদবী</td>
         <td rowspan="2" style="text-align: center; ">বাসা/সমিতি/অফিস ও ঠিকানা</td>
         <td rowspan="2" style="text-align: center; ">মোবাইল নম্বর</td>
         <td rowspan="2" style="text-align: center; ">ইমেইল</td>
         <td colspan="3" style="text-align: center; ">মতামত</td>
         <td colspan="2" style="text-align: center; ">কর্তৃপক্ষের সাড়া/গৃহীত ব্যবস্থা</td>
     </tr>
     <tr>
         <td style="text-align: center;  ">বিষয়</td>
         <td style="text-align: center;">বিস্তারিত</td>
         <td style="text-align: center;">তারিখ</td>
         <td style="text-align: center;">সাড়া</td>
         <td style="text-align: center;">তারিখ</td>
     </tr>
    </thead>
    <tbody>
    <?php
    foreach ($ideas as $k=>$i){ ?>
        <tr>
           <td style="text-align: center;"><?= str_replace(range(0,9),$bn_digits,($k+1))?></td>
           <td><?= $i['name']?></td>
           <td><?= $i['designation']?></td>
           <td><?= $i['address']?></td>
           <td><?= str_replace(range(0,9),$bn_digits,$i['mobile'])?></td>
           <td><?= $i['email']?></td>
           <td><?= $i['idea_title']?></td>
           <td style=""><?= $i['idea_issue']; ?></td>  
           <td><?php $ddd=explode(' ',$i['idea_created_at'])[0];
                     $ddd=explode('-',$ddd);
                     $dd=$ddd[2].'-'.$ddd[1].'-'.$ddd[0];
                     echo str_replace(range(0,9),$bn_digits,$dd);
               ?></td>   
           <?php
               if($i['idea_reply']==null){ ?>
                  <td style="text-align: center;">
                   সাড়া দেওয়া হয় নাই
                   </td><td>সাড়া দেওয়া হয় নাই</td>
         <?php }else{ ?>
                  <td><?= $i['idea_reply']?></td>   
                  <td><?php $ddd=explode(' ',$i['idea_reply_at'])[0];
                            $ddd=explode('-',$ddd);
                            $dd=$ddd[2].'-'.$ddd[1].'-'.$ddd[0];
                            echo str_replace(range(0,9),$bn_digits,$dd);
                     ?></td>                                                 
         <?php }
         ?>
      </tr>
 <?php }
    ?>
    </tbody>
</table>

</body>
</html>