<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_vessel_maintenance_plan')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_vessel_maintenance_plan),array('view','id'=>$data->id_vessel_maintenance_plan)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_maintenance_type')); ?>:</b>
	<?php echo CHtml::encode($data->id_maintenance_type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_vessel')); ?>:</b>
	<?php echo CHtml::encode($data->id_vessel); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('start_date')); ?>:</b>
	<?php echo CHtml::encode($data->start_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('end_date')); ?>:</b>
	<?php echo CHtml::encode($data->end_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Duration')); ?>:</b>
	<?php echo CHtml::encode($data->Duration); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Description')); ?>:</b>
	<?php echo CHtml::encode($data->Description); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('RunningHour')); ?>:</b>
	<?php echo CHtml::encode($data->RunningHour); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('MaintenanceName')); ?>:</b>
	<?php echo CHtml::encode($data->MaintenanceName); ?>
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