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
        <td><p style="font-size: 16px;">প্রশিক্ষণার্থী নিবন্ধন ফরম<br>TRAINEE REGISTRATION FORM</p></td>
    </tr>
</table>
<table width="80%" align="center" border='0' style="font-size:12px; margin-top:20px;" >
   <tr>
      <td style="width:30%">নাম ( বাংলা NID অনুযায়ী )</td>
      <td>: <?= str_replace(range(0,9),$bn_digits,$trainee_info[0]['name'])?></td>
   </tr>
   <tr>
      <td>নাম ( ইংরেজী NID অনুযায়ী )</td>
      <td>: <?= str_replace(range(0,9),$bn_digits,$trainee_info[0]['name_eng'])?></td>
   </tr>
   <tr>
      <td>জাতীয় পরিচয়পত্র নম্বর</td>
      <td>: <?= str_replace(range(0,9),$bn_digits,$trainee_info[0]['nid'])?></td>
   </tr>
   <tr>
      <td>জন্ম তারিখ ( NID অনুযায়ী )</td>
      <td>: <?= str_replace(range(0,9),$bn_digits,$trainee_info[0]['dob'])?></td>
   </tr>
   <tr>
      <td>লিঙ্গ</td>
      <td>: 
          <?php 
               if($trainee_info[0]['gender']==1){
                  echo 'পুরুষ';
               }elseif($trainee_info[0]['gender']==2){ 
                  echo 'নারী';
               }
          ?>
       </td>
   </tr>
   <tr>
      <td>পিতার নাম</td>
      <td>: <?= str_replace(range(0,9),$bn_digits,$trainee_info[0]['father_name'])?></td>
   </tr>
   <tr>
      <td>মাতার নাম</td>
      <td>: <?= str_replace(range(0,9),$bn_digits,$trainee_info[0]['mother_name'])?></td>
   </tr>
   <tr>
      <td>স্ত্রী/স্বামীর নাম ( Spouse Name )</td>
      <td>: <?= str_replace(range(0,9),$bn_digits,$trainee_info[0]['spouse_name'])?></td>
   </tr>
   <tr>
      <td>রক্তের গ্রুপ</td>
      <td>: <?= str_replace(range(0,9),$bn_digits,$trainee_info[0]['blood_grp_name'])?></td>
   </tr>
   <tr>
      <td>স্থায়ী ঠিকানা</td>
      <td>: বিভাগ : <?= $trainee_info[0]['pDiv'] ?>
          <br>&nbsp;&nbsp;জেলা : <?= $trainee_info[0]['pDist'] ?>
          <br>&nbsp;&nbsp;উপজেলা : <?= $trainee_info[0]['pUpz'] ?>   
          <br>&nbsp;&nbsp;বিস্তারিত : <?= $trainee_info[0]['parmanent_address'] ?>
      </td>
   </tr>
   <tr>
      <td>বর্তমান ঠিকানা</td>
      <td>: <?= str_replace(range(0,9),$bn_digits,$trainee_info[0]['present_address'])?></td>
   </tr>
   <tr>
      <td>ব্যক্তিগত মোবাইল নম্বর (সক্রিয়)</td>
      <td>: <?= str_replace(range(0,9),$bn_digits,$trainee_info[0]['mobile'])?></td>
   </tr>
   <tr>
      <td>জরুরি প্রয়োজনে যোগাযোগের জন্য মোবাইল নম্বর (সক্রিয়)</td>
      <td>: <?= str_replace(range(0,9),$bn_digits,$trainee_info[0]['other_mb'])?></td>
   </tr>
   <tr>
      <td>ব্যক্তিগত ইমেইল</td>
      <td>: <?= str_replace(range(0,9),$bn_digits,$trainee_info[0]['email'])?></td>
   </tr>
   <tr>
      <td>ব্যক্তিগত ফেসবুক আইডি</td>
      <td>: <?= str_replace(range(0,9),$bn_digits,$trainee_info[0]['fb_link'])?></td>
   </tr>
   <tr>
      <td>শিক্ষাগত যোগ্যতা</td>
      <td>: <?= str_replace(range(0,9),$bn_digits,$trainee_info[0]['edu_name'])?></td>
   </tr>
   <tr>
      <td>প্রশিক্ষণার্থী ধরণ</td>
      <td>: <?= str_replace(range(0,9),$bn_digits,$trainee_info[0]['class_name'])?></td>
   </tr>
   <tr>
      <td>বর্তমান পদবী</td>
      <td>: <?= str_replace(range(0,9),$bn_digits,$trainee_info[0]['des_name'])?></td>
   </tr>
   <tr>
      <td>পেশা</td>
      <td>: <?= str_replace(range(0,9),$bn_digits,$trainee_info[0]['prf_name'])?></td>
   </tr>
   <tr>
      <td>অফিসের নাম ও ঠিকানা</td>
      <td>: নাম :<?= $trainee_info[0]['inst_name'] ?>
          <br>&nbsp;&nbsp;বিভাগ : <?= $trainee_info[0]['Idiv'] ?>
          <br>&nbsp;&nbsp;জেলা : <?= $trainee_info[0]['Idist'] ?>
          <br>&nbsp;&nbsp;উপজেলা : <?= $trainee_info[0]['Iupz'] ?>
      </td>
   </tr>
</table>
<br>

<?php if($crs_stt==3){ ?>
<p style="text-align:center; font-size:14px;">প্রশিক্ষণ তথ্য</p>
<table width="80%;" align="center" border="1" style="font-size:12px;" cellspacing='0'>
    <tr>       
       <td style="text-align: center">কোর্স শিরোনাম</td>
       <td style="text-align: center">প্রশিক্ষণ বর্ষ</td>
       <td style="text-align: center">কোর্স শুরুর তারিখ</td>
       <td style="text-align: center">কোর্স সমাপ্তির তারিখ</td>
       <td style="text-align: center">মেয়াদ<br>(দিন)</td>
       <td style="text-align: center">প্রতিষ্ঠান</td>
       <td style="text-align: center">কোর্স স্ট্যাটাস</td>
    </tr>
    <tr>
       <td><?= $course_info[0]['c_name']?></td>
       <td><?= str_replace(range(0,9),$bn_digits,$course_info[0]['year'])?></td>
      <td >
         <?php
         $tDAte=explode('-',$course_info[0]['start_date']);
	 $TdAtE=$tDAte[2].'-'.$tDAte[1].'-'.$tDAte[0];
	 echo str_replace(range(0, 9), $bn_digits, $TdAtE); ?>
      </td>
      <td >
        <?php
         $tDAte=explode('-',$course_info[0]['end_date']);
	 $TdAtE=$tDAte[2].'-'.$tDAte[1].'-'.$tDAte[0];
	 echo str_replace(range(0, 9), $bn_digits, $TdAtE);?>
      </td>
      <td><?= str_replace(range(0,9),$bn_digits,$course_info[0]['run_days'])?></td>
      <td><?= str_replace(range(0,9),$bn_digits,$training_inst[0]['name'])?></td>
      <td>অপেক্ষমান</td>
   </tr>   
</table>
<?php }elseif($crs_stt==4){?>
<p style="text-align:center; font-size:14px;">চাহিদা তথ্য</p>
<table width="80%" align="center" border='0' style="font-size:12px;" >
    <tr>       
       <td style="text-align: center; width:15%;">চাহিদার বিষয়</td> 
       <td><?= $course_info[0]['demand_details']?></td>      
    </tr>     
</table>

<?php } ?>

<p style="margin-left:70px;">
স্বাক্ষর:<br>
<img style="height:40px; width:200px;" src="<?= base_url()?>uploads/sign/<?= $trainee_info[0]['sign']?>">
</p>
</body>