<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_schedule')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_schedule),array('view','id'=>$data->id_schedule)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('VesselTugId')); ?>:</b>
	<?php echo CHtml::encode($data->VesselTugId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('VesselBargeId')); ?>:</b>
	<?php echo CHtml::encode($data->VesselBargeId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_vessel_status')); ?>:</b>
	<?php echo CHtml::encode($data->id_vessel_status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('StartDate')); ?>:</b>
	<?php echo CHtml::encode($data->StartDate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('EndDate')); ?>:</b>
	<?php echo CHtml::encode($data->EndDate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_date')); ?>:</b>
	<?php echo CHtml::encode($data->created_date); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('created_user')); ?>:</b>
	<?php echo CHtml::encode($data->created_user); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ip_user_updated')); ?>:</b>
	<?php echo CHtml::encode($data->ip_user_updated); ?>
	<br />

	*/ ?>

</div>