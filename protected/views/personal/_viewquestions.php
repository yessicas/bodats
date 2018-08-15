<?php
echo'<table>';



echo'<tr>';
// NonSoal
echo'<td rowspan=2 style="width:10px;vertical-align:top;">';
$no=0;
echo CHtml::encode($data->no_question).'.' ; 
echo'</td>';


if ($data->Question->is_have_picture==0){
echo'<td colspan=2>';
echo Yii::t('strings',$data->Question->question_eng); // Soal
echo'</td>';
}

if ($data->Question->is_have_picture==1){
echo'<td colspan=2>';
//picture
$repo='repository/examquestion/';
echo"<figure class='cap-left' style='margin-right:10px;'>";
echo'<div id="foto" style="width:100px;">';

	if ($data->Question->foto_picture!=''){
echo'<a href="'.$repo.$data->Question->foto_picture.'" class="popup_foto">';
//echo ImageDisplayer::displayDefaultFile($repo , $data->foto_picture);
echo ImageDisplayer::displayCustomFile($repo , $data->Question->foto_picture, "VS");
echo'</a>';
	}

	if ($data->Question->foto_picture==''){
echo ImageDisplayer::displayDefaultFile($repo , 'noimage.jpg');
	}

echo'</div>';
echo"</figure>"; 
//soal
echo Yii::t('strings',$data->Question->question_eng); // Soal
echo'</td>';

}
echo'</tr>';




// Pilihan
echo'<tr>';
echo'<td style="width:500px;">';


$random_numbers=QuestionsDB::getrandomarray($data->Question->number_choice);

//for ($i = 1; $i <= $data->Question->number_choice; $i++){
for ($i = 0; $i < count($random_numbers); ++$i) {
	 $id=$random_numbers[$i]; // kalo random
	 $fieldname='choice'.$id.'_eng';
	 $score='score_choice'.$id;
	 $fieldnameexamdetail='choice'.$id.'_answer';

	 if($data->$fieldnameexamdetail==1){
	 $checked = 'checked="checked"';
	}
	 if($data->$fieldnameexamdetail==0){
	 $checked = '';
	}

	 	if($data->Question->question_type=='MULTIPLE CHOICE'){
	 	echo'<table style="width:500px;margin-bottom:-40px;margin-top:0px;">';
	 	echo'<tr>';

	 	echo'<td style="width:5px;vertical-align:top">';
	 	echo'<input value="'.$data->$fieldnameexamdetail.'"  type="radio" '.$checked.' name="'.$data->id_exam_score_detail.'" id= "'.$data->id_exam_score_detail.$id.'" onClick = "javascript:radiobutton(this.name,this.id,'.$id.','.$data->Question->id_question.')" >';
	 	echo'</td>';


	 	echo'<td>';
	 	echo'<label for="'.$data->Question->$fieldname.'">'.Yii::t('strings',$data->Question->$fieldname).'</label>';
	 	echo'</td>';


	 	echo'</tr>';
	 	echo'</table>';
	 	echo'<br>';
	 	}


	 	if($data->Question->question_type=='CHECKLIST'){
	 	echo'<table style="width:500px;margin-bottom:-40px;margin-top:0px;">';
	 	echo'<tr>';


	 	echo'<td style="width:5px;vertical-align:top">';
	 	echo'<input type="checkbox" value="'.$data->$fieldnameexamdetail.'"  '.$checked.'  name="'.$data->id_exam_score_detail.'" id= "'.$data->id_exam_score_detail.$id.'" onClick = "javascript:checkbox(this.name,this.id,'.$id.','.$data->Question->id_question.','.$data->Question->max_checked.','.$data->Question->number_choice.')">';
	 	echo'</td>';


	 	echo'<td>';
	 	echo'<label for="'.$data->Question->$fieldname.'">'.Yii::t('strings',$data->Question->$fieldname).'</label>';
	 	echo'</td>';

	 

	 	echo'</tr>';
	 	echo'</table>';
	 	echo'<br>';
	 	}



}

echo'</td>';

echo'<td style="text-align:center;">';
echo'<div class="animate'.$data->Question->id_question.'" id ="result'.$data->Question->id_question.'"></div>';
echo'</td>';


echo'</tr>';





echo'</table>';
?>

<div align ="right">
<?php
/*
echo CHtml::link('Update',array('examquestion/update', 'id'=>$data->id_question));
echo '|';
echo'<div style ="float:right;">';
echo CHtml::Label('Hapus','Hapus',array('style'=>'color:#cd5934', 'id'=>'delete'.$data->id_question,'onClick' => 'javascript:deletequestions('.$data->id_question.')'));
echo'</div>';	
*/		
?>
</div>


<!--
<script type="text/javascript">
/*<![CDATA[*/
jQuery(function($) {


jQuery('body').on('click','#delete<?php echo $data->id_question?>',function(){if(confirm('Are you sure to delete this question?')) {jQuery.ajax({'type':'post','success':allFine,'url':'/careerpath/examquestion/delete/id/<?php echo $data->id_question?>','cache':false,'data':jQuery(this).parents("form").serialize()});return false;} else return false;});




});
/*]]>*/
</script>
-->
<?php /*

echo"<script type='text/javascript'>

jQuery(function($) {



jQuery('body').on('click','#delete$data->id_question',function(){if(confirm('Are you sure to delete this question?')) {jQuery.ajax({'type':'post','success':allFine,'url':'/careerpath/examquestion/delete/id/$data->id_question','cache':false,'data':jQuery(this).parents('form').serialize()});return false;} else return false;});




});

</script>";
*/
?>



<?php 
/*
<br>

<INPUT type="checkbox" NAME="Netscape 3.0" CHECKED>Nestcape 3.0 <BR>
<INPUT type="checkbox" NAME="Explorer">Explorer <BR>
checked="checked"

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_question')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_question),array('view','id'=>$data->id_question)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_exam')); ?>:</b>
	<?php echo CHtml::encode($data->id_exam); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_exam_varians')); ?>:</b>
	<?php echo CHtml::encode($data->id_exam_varians); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('question_sec_code')); ?>:</b>
	<?php echo CHtml::encode($data->question_sec_code); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('no_question')); ?>:</b>
	<?php echo CHtml::encode($data->no_question); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('question_eng')); ?>:</b>
	<?php echo CHtml::encode($data->question_eng); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('question_indo')); ?>:</b>
	<?php echo CHtml::encode($data->question_indo); ?>
	<br />

	
	<b><?php echo CHtml::encode($data->getAttributeLabel('is_have_picture')); ?>:</b>
	<?php echo CHtml::encode($data->is_have_picture); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('foto_picture')); ?>:</b>
	<?php echo CHtml::encode($data->foto_picture); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('question_type')); ?>:</b>
	<?php echo CHtml::encode($data->question_type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('number_choice')); ?>:</b>
	<?php echo CHtml::encode($data->number_choice); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('choice1_eng')); ?>:</b>
	<?php echo CHtml::encode($data->choice1_eng); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('choice1_indo')); ?>:</b>
	<?php echo CHtml::encode($data->choice1_indo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('choice2_eng')); ?>:</b>
	<?php echo CHtml::encode($data->choice2_eng); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('choice2_indo')); ?>:</b>
	<?php echo CHtml::encode($data->choice2_indo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('choice3_eng')); ?>:</b>
	<?php echo CHtml::encode($data->choice3_eng); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('choice3_indo')); ?>:</b>
	<?php echo CHtml::encode($data->choice3_indo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('choice4_eng')); ?>:</b>
	<?php echo CHtml::encode($data->choice4_eng); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('choice4_indo')); ?>:</b>
	<?php echo CHtml::encode($data->choice4_indo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('choice5_eng')); ?>:</b>
	<?php echo CHtml::encode($data->choice5_eng); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('choice5_indo')); ?>:</b>
	<?php echo CHtml::encode($data->choice5_indo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('choice6_eng')); ?>:</b>
	<?php echo CHtml::encode($data->choice6_eng); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('choice6_indo')); ?>:</b>
	<?php echo CHtml::encode($data->choice6_indo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('choice7_eng')); ?>:</b>
	<?php echo CHtml::encode($data->choice7_eng); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('choice7_indo')); ?>:</b>
	<?php echo CHtml::encode($data->choice7_indo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('score_choice1')); ?>:</b>
	<?php echo CHtml::encode($data->score_choice1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('score_choice2')); ?>:</b>
	<?php echo CHtml::encode($data->score_choice2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('score_choice3')); ?>:</b>
	<?php echo CHtml::encode($data->score_choice3); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('score_choice4')); ?>:</b>
	<?php echo CHtml::encode($data->score_choice4); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('score_choice5')); ?>:</b>
	<?php echo CHtml::encode($data->score_choice5); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('score_choice6')); ?>:</b>
	<?php echo CHtml::encode($data->score_choice6); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('score_choice7')); ?>:</b>
	<?php echo CHtml::encode($data->score_choice7); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('max_score')); ?>:</b>
	<?php echo CHtml::encode($data->max_score); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('updated_date')); ?>:</b>
	<?php echo CHtml::encode($data->updated_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('userid_updated')); ?>:</b>
	<?php echo CHtml::encode($data->userid_updated); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ip_user_updated')); ?>:</b>
	<?php echo CHtml::encode($data->ip_user_updated); ?>
	<br />
	*/
?>
	
<hr>