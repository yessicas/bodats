
<div class="view">

<?php
$modeluser=Users::model()->findByAttributes(array('userid'=>$data->userid));
echo'<table style="margin-bottom:0px;">';
echo'<tr>';
echo'<td width = "50" style="vertical-align:top;">';
echo'<div  style="width:50px;">';
echo $this->renderPartial('../friend/list_data_foto_user', array('userid'=>$modeluser->userid,'type'=>$modeluser->type));	
echo'</div>';
echo'</td>';
echo'<td style="vertical-align:top;text-align:left;">';
echo $this->renderPartial('../friend/list_data_nama_user', array('userid'=>$modeluser->userid,'type'=>$modeluser->type));
echo"commented on '".'<b>'.CHtml::link($data->ForumTopic->judul_topic,array('forumtopic/view','id'=>$data->ForumTopic->id_forum_topic,'c'=>SecurityGenerator::SecurityDisplay($data->ForumTopic->code_id) )).'</b>'."'<br>";
echo '<font size=2>'.$data->comment.'</font><br>';
echo'</td>';
echo '</tr>';
echo'</table>';			 
?>

<?php //echo "<b>".CHtml::encode($data->userid)."</b>"." Mengomentari Topik "."<b>".CHtml::link(CHtml::encode($data->ForumTopic->judul_topic),array('forumtopic/view','id'=>$data->id_forum_topic,'c'=>SecurityGenerator::SecurityDisplay($data->ForumTopic->code_id)))."</b>"." Pada ".CHtml::encode($data->update_date);?>
<?php //echo " ' ".CHtml::link(CHtml::encode($data->comment),array('forumtopic/view','id'=>$data->id_forum_topic,'c'=>SecurityGenerator::SecurityDisplay($data->ForumTopic->code_id),'#'=>'comment'.$data->id_forum_comment))." ' "?>

</div>

<!--
	<br>
	<b><?php echo CHtml::encode($data->getAttributeLabel('id_forum_topic')); ?>:</b>
	<?php echo CHtml::encode($data->id_forum_topic); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('comment')); ?>:</b>
	<?php echo CHtml::encode($data->comment); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('userid')); ?>:</b>
	<?php echo CHtml::encode($data->userid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('update_date')); ?>:</b>
	<?php echo CHtml::encode($data->update_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ip_address')); ?>:</b>
	<?php echo CHtml::encode($data->ip_address); ?>
	<br />
-->

