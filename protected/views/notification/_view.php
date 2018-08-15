<?php /*
<!--
		<b><?php echo CHtml::encode($data->getAttributeLabel('id_notification')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_notification),array('view','id'=>$data->id_notification)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('userid')); ?>:</b>
	<?php echo CHtml::encode($data->userid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('notif_date')); ?>:</b>
	<?php echo CHtml::encode($data->notif_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('notif_message')); ?>:</b>
	<?php echo CHtml::encode($data->notif_message); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('notif_tittle')); ?>:</b>
	<?php echo CHtml::encode($data->notif_tittle); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('notif_status')); ?>:</b>
	<?php echo CHtml::encode($data->notif_status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('grade')); ?>:</b>
	<?php echo CHtml::encode($data->grade); ?>
	<br />
-->
*/
?>
<?php 
if ($data->notif_status=="UNREAD"||$data->notif_status=="NEW"){
	$classview="highlight";
}
if ($data->notif_status=="READ"){
	$classview="white";
}
?>
<div class="<?php echo $classview ?> " >
	<p align ="left" class="notifdate">
	<?php echo Yii::app()->dateFormatter->formatDateTime($data->notif_date, 'medium'); ?>
	</p>
	<table style="margin-bottom:0px;">
	<tr>

	<td style="width:700px;">
	<b>
	<?php echo CHtml::link($data->notif_tittle,array('view','id'=>$data->id_notification,'c'=>SecurityGenerator::SecurityDisplay($data->code_id))); ?>
	</b>
	<br>
	<?php //echo CHtml::encode($data->notif_message); ?>
	</td>

	<td>
		<?php echo CHtml::ajaxLink('delete',$this->createUrl('notification/deletenotification/id/'.$data->id_notification),array('success'=>'allFine'),array('confirm'=>'Are you sure to delete this notification ?','id'=>'notif'.$data->id_notification,'class'=>'notifsdelete'));?>
		
	</td>

	</tr>
	</table>
</div>

