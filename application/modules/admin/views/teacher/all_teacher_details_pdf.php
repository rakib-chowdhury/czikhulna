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
    </style>
</head>

<body>
<table align="center" style="text-align: center">
    <tr>
        <td><p style="font-size:18px">গণপ্রজাতন্ত্রী বাংলাদেশ সরকার<br>আঞ্চলিক সমবায় ইন্সটিটিউট<br>খুলনা।</p></td>
    </tr>
    <tr>
        <td><p style="font-size: 16px;">বক্তা/প্রশিক্ষকের তথ্য/প্রোফাইল</p></td>
    </tr>
</table>
<table width="70%" align="center" border='1' cellspacing='0' style="font-size:12px; margin-top:20px;" >
   <tr>
      <td style="width:30%">নাম ( বাংলা NID অনুযায়ী )</td>
      <td>: <?= str_replace(range(0,9),$bn_digits,$teacher_info[0]['t_name'])?></td>
   </tr>
   <tr>
      <td>নাম ( ইংরেজী NID অনুযায়ী )</td>
      <td>: <?= str_replace(range(0,9),$bn_digits,$teacher_info[0]['t_name_eng'])?></td>
   </tr>
   <tr>
      <td>জাতীয় পরিচয়পত্র নম্বর</td>
      <td>: <?= str_replace(range(0,9),$bn_digits,$teacher_info[0]['t_nid'])?></td>
   </tr>
   <tr>
      <td>জন্ম তারিখ ( NID অনুযায়ী )</td>
      <td>: <?= str_replace(range(0,9),$bn_digits,$teacher_info[0]['t_dob'])?></td>
   </tr>
   <tr>
      <td>লিঙ্গ</td>
      <td>: 
          <?php 
               if($teacher_info[0]['t_gender']==1){
                  echo 'পুরুষ';
               }elseif($teacher_info[0]['t_gender']==2){ 
                  echo 'নারী';
               }
          ?>
       </td>
   </tr>
   <tr>
      <td>পিতার নাম</td>
      <td>: <?= str_replace(range(0,9),$bn_digits,$teacher_info[0]['t_father_name'])?></td>
   </tr>
   <tr>
      <td>মাতার নাম</td>
      <td>: <?= str_replace(range(0,9),$bn_digits,$teacher_info[0]['t_mother_name'])?></td>
   </tr>
   <tr>
      <td>স্ত্রী/স্বামীর নাম ( Spouse Name )</td>
      <td>: <?= str_replace(range(0,9),$bn_digits,$teacher_info[0]['t_spouse_name'])?></td>
   </tr>
   <tr>
      <td>রক্তের গ্রুপ</td>
      <td>: <?= str_replace(range(0,9),$bn_digits,$teacher_info[0]['blood_grp_name'])?></td>
   </tr>
   <tr>
      <td>স্থায়ী ঠিকানা</td>
      <td>: বিভাগ : <?= $teacher_info[0]['pDiv'] ?>
          <br>&nbsp;&nbsp;জেলা : <?= $teacher_info[0]['pDist'] ?>
          <br>&nbsp;&nbsp;উপজেলা : <?= $teacher_info[0]['pUpz'] ?>   
          <br>&nbsp;&nbsp;বিস্তারিত : <?= $teacher_info[0]['t_parmanent_address'] ?>
      </td>
   </tr>
   <tr>
      <td>বর্তমান ঠিকানা</td>
      <td>: <?= str_replace(range(0,9),$bn_digits,$teacher_info[0]['t_present_address'])?></td>
   </tr>
   <tr>
      <td>ব্যক্তিগত মোবাইল নম্বর (সক্রিয়)</td>
      <td>: <?= str_replace(range(0,9),$bn_digits,$teacher_info[0]['t_mobile'])?></td>
   </tr>
   <tr>
      <td>জরুরি প্রয়োজনে যোগাযোগের জন্য মোবাইল নম্বর (সক্রিয়)</td>
      <td>: <?= str_replace(range(0,9),$bn_digits,$teacher_info[0]['t_other_mobile'])?></td>
   </tr>
   <tr>
      <td>ব্যক্তিগত ইমেইল</td>
      <td>: <?= str_replace(range(0,9),$bn_digits,$teacher_info[0]['t_email'])?></td>
   </tr>
   <tr>
      <td>ব্যক্তিগত ফেসবুক আইডি</td>
      <td>: <?= str_replace(range(0,9),$bn_digits,$teacher_info[0]['t_fb_link'])?></td>
   </tr>
   <tr>
      <td>শিক্ষাগত যোগ্যতা</td>
      <td>: <?= str_replace(range(0,9),$bn_digits,$teacher_info[0]['edu_name'])?></td>
   </tr>
   <tr>
      <td>প্রশিক্ষণার্থী ধরণ</td>
      <td>: <?= str_replace(range(0,9),$bn_digits,$teacher_info[0]['class_name'])?></td>
   </tr>
   <tr>
      <td>বর্তমান পদবী</td>
      <td>: <?= str_replace(range(0,9),$bn_digits,$teacher_info[0]['des_name'])?></td>
   </tr>
   <tr>
      <td>পেশা</td>
      <td>: <?= str_replace(range(0,9),$bn_digits,$teacher_info[0]['prf_name'])?></td>
   </tr>
   <tr>
      <td>অফিসের নাম ও ঠিকানা</td>
      <td>: নাম :<?= $teacher_info[0]['inst_name'] ?>
          <br>&nbsp;&nbsp;বিভাগ : <?= $teacher_info[0]['Idiv'] ?>
          <br>&nbsp;&nbsp;জেলা : <?= $teacher_info[0]['Idist'] ?>
          <br>&nbsp;&nbsp;উপজেলা : <?= $teacher_info[0]['Iupz'] ?>
      </td>
   </tr>   
</table>
</body>