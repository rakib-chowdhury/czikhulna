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
        <td><!--<p style="font-size: 20px;">প্রশিক্ষণার্থীর কোর্স মূল্যায়ন প্রতিবেদন<br></p>--></td>
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
      <td >কোর্সের ধরণ : <?= $crseInfo[0]['course_class_name']?></td>
      <td >প্রশিক্ষণার্থীর ধরণ : <?= $crseInfo[0]['class_name']?></span></td>
   </tr>
    <tr>
        <td style="width:40%">প্রশিক্ষণার্থীর সংখ্যা মোট : <?= str_replace(range(0,9),$bn_digits,$crseInfo[0]['total_student'])?>
            <?php
            $man=0; $women=0;
            if(sizeof($typeofstudent)==0){
            }else{
                foreach($typeofstudent as $key5=>$stu){
                    if($stu['gender']==1){
                        $man=$stu['count'];
                        //$women=$typeofstudent[1]['count'];
                    }else{
                        //$man=$typeofstudent[1]['count'];
                        $women=$stu['count'];
                    }
                }

            }
            ?>
            (নারী : <?= str_replace(range(0,9),$bn_digits,$women)?>, পুরুষ : <?= str_replace(range(0,9),$bn_digits,$man)?>)</td>
        <td >গড় মূল্যায়ন : <?= str_replace(range(0,9),$bn_digits,$get_avg_review[0]['avg'])?></span></td>
    </tr>
</table>
<br>
<table style="font-size:12px;" align="center" border="1" width="100%" style="margin: 0px; padding: 0px;" cellspacing="0px;"; >
    <thead>         
         <tr>
			<td style="text-align: center; width: 6%;">ক্রমিক নং</td>
			<td style="text-align: center; ">প্রশিক্ষণার্থীর নাম</td>
			<td style="text-align: center; width: 15%;">পদবী</td>
			<td style="text-align: center; width: 25%;">অফিস/সমিতি</td>
			<td style="text-align: center; width: 15%;">মোবাইল নং</td>
			<td style="text-align: center; width: 18%;">ইমেইল</td>		 
		 </tr>
    </thead>
    <tbody>
         <?php $i=1; foreach($trainee as $row){ ?> 
            <tr>
				<td style="text-align: center;">
					<?php  echo str_replace(range(0, 9), $bn_digits, $i++);  ?>
				</td>                                    
				<td ><?= $row['u_name']; ?></td>
				<td ><?= $row['des_name']; ?></td>
				<td ><?= $row['inst_name'].', '.$row['bn_div_name'].', '.$row['bn_dist_name'].', '.$row['bn_upz_name']; ?></td>
				<td style="text-align: center;"><?= str_replace(range(0,9),$bn_digits,$row['mobile']); ?></td>
				<td ><?= $row['email']; ?></td>		
            </tr>
         <?php } ?>
    </tbody>
</table>
</body>