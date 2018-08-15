<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_timesheet')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_timesheet),array('view','id'=>$data->id_timesheet)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_voyage_order')); ?>:</b>
	<?php echo CHtml::encode($data->id_voyage_order); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_voyage_activity')); ?>:</b>
	<?php echo CHtml::encode($data->id_voyage_activity); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Activity')); ?>:</b>
	<?php echo CHtml::encode($data->Activity); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('StartDate')); ?>:</b>
	<?php echo CHtml::encode($data->StartDate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Duration')); ?>:</b>
	<?php echo CHtml::encode($data->Duration); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Remarks')); ?>:</b>
	<?php echo CHtml::encode($data->Remarks); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('updated_date')); ?>:</b>
	<?php echo CHtml::encode($data->updated_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('updated_user')); ?>:</b>
	<?php echo CHtml::encode($data->updated_user); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ip_user_updated')); ?>:</b>
	<?php echo CHtml::encode($data->ip_user_updated); ?>
	<br />

	*/ ?>

</div>