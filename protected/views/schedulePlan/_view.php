<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_schedule_plan')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_schedule_plan),array('view','id'=>$data->id_schedule_plan)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('VesselTugId')); ?>:</b>
	<?php echo CHtml::encode($data->VesselTugId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('VesselBargeId')); ?>:</b>
	<?php echo CHtml::encode($data->VesselBargeId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_voyage_activity_group')); ?>:</b>
	<?php echo CHtml::encode($data->id_voyage_activity_group); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('schedule_date')); ?>:</b>
	<?php echo CHtml::encode($data->schedule_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('schedule_number')); ?>:</b>
	<?php echo CHtml::encode($data->schedule_number); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sch_month')); ?>:</b>
	<?php echo CHtml::encode($data->sch_month); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('sch_year')); ?>:</b>
	<?php echo CHtml::encode($data->sch_year); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_date')); ?>:</b>
	<?php echo CHtml::encode($data->created_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_user')); ?>:</b>
	<?php echo CHtml::encode($data->created_user); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ip_user_updated')); ?>:</b>
	<?php echo CHtml::encode($data->ip_user_updated); ?>
	<br />

	*/ ?>

</div>