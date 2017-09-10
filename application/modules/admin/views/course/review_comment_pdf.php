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
        <td><p style="font-size: 16px;">প্রশিক্ষণার্থীর কোর্স মূল্যায়ন প্রতিবেদন<br></p></td>
    </tr>
</table>
<table width="100%" align="center" border='0' style="font-size:12px;" >
   <tr>
      <td style="width:68%">কোর্স শিরোনাম : <?= $crseInfo[0]['c_name']?></td>
      <td style="width:auto">মেয়াদ : <?= str_replace(range(0,9),$bn_digits,$crseInfo[0]['run_days'])?> দিন</td>
   </tr>
   <tr>
      <td >প্রশিক্ষণ বর্ষ : <?= str_replace(range(0,9),$bn_digits,$crseInfo[0]['year'])?></td>
      <td >অর্থায়ন : <?= $crseInfo[0]['donor_name']?></td>
   </tr>
   <tr>
      <td >কোর্স শুরুর তারিখ : <?php
         $tDAte=explode('-',$crseInfo[0]['start_date']);
	 $TdAtE=$tDAte[2].'-'.$tDAte[1].'-'.$tDAte[0];
	 echo str_replace(range(0, 9), $bn_digits, $TdAtE); ?>
      </td>
      <td >কোর্স সমাপ্তির তারিখ : <?php
         $tDAte=explode('-',$crseInfo[0]['end_date']);
	 $TdAtE=$tDAte[2].'-'.$tDAte[1].'-'.$tDAte[0];
	 echo str_replace(range(0, 9), $bn_digits, $TdAtE);?>
      </td>
   </tr>
   <tr>
      <td >কোর্সের ধরণ : <?= str_replace(range(0,9),$bn_digits,$crseInfo[0]['course_class_name'])?></td>
      <td >প্রশিক্ষণার্থীর ধরণ : <?= $crseInfo[0]['class_name']?></span></td>
   </tr>
   <tr>
       <td >প্রশিক্ষণার্থীর সংখ্যা মোট : <?= str_replace(range(0,9),$bn_digits,$crseInfo[0]['total_student'])?>
       <?php 
            $man=0; 
            $women=0;
            foreach($typeofstudent as $v){
               if($v['gender']=='1'){
                   $man=$v['count'];                    
                }else{
                   $women=$v['count'];
                }     
            }
        ?>
        (নারী : <?= str_replace(range(0,9),$bn_digits,$women)?>, পুরুষ : <?= str_replace(range(0,9),$bn_digits,$man)?>)
       </td>
       <td >গড় মূল্যায়ন : <?= str_replace(range(0,9),$bn_digits,$get_avg_review[0]['avg'])?></span></td>
   </tr>
</table>
<br>
<table style="font-size:12px;" align="center" border="1" width="100%" style="margin: 0px; padding: 0px;" cellspacing="0px;"; >
    <thead>
         <tr>
             <td style="text-align: center; width: 8%;">ক্রমিক নং</td>
             <td style="text-align: center; width: 25%;;">প্রশিক্ষণার্থীর নাম</td>
             <td style="text-align: center; width: 12%;">মোবাইল নং</td>
             <td style="text-align: center; width: 12%;">মূল্যায়ন নম্বর<br>(পূর্ণ নম্বর ১০০)</td>
             <td style="text-align: center">মন্তব্য/পরামর্শ</td>
         </tr>
    </thead>
    <tbody>
         <?php $i=1; foreach($review as $r){ ?> 
             <tr>
                 <td style="width:8%; text-align:center; font-size:12px;"><?= str_replace(range(0,9),$bn_digits,$i++);?>
                 </td>                 
                 <td style="width:25%; text-align:left; font-size:12px;"><?= $r['name'];?>
                 </td>
                 <td style="width:12%; text-align:center; font-size:12px;"><?= str_replace(range(0,9),$bn_digits,$r['mobile']);?>
                 </td>
                 <td style="width:12%; text-align:center; font-size:12px;"><?= str_replace(range(0,9),$bn_digits,$r['review']);?>
                 </td>
                 <td style=" text-align:left; font-size:12px; padding-left:10px;"><?= $r['comment'];?>
                 </td>
             </tr>
         <?php } ?>
    </tbody>
</table>
</body>