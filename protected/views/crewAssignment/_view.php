<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_crew_assignment')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_crew_assignment),array('view','id'=>$data->id_crew_assignment)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('vessel_id')); ?>:</b>
	<?php echo CHtml::encode($data->vessel_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CrewId')); ?>:</b>
	<?php echo CHtml::encode($data->CrewId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_crew_position')); ?>:</b>
	<?php echo CHtml::encode($data->id_crew_position); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('start_date')); ?>:</b>
	<?php echo CHtml::encode($data->start_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('expired_date')); ?>:</b>
	<?php echo CHtml::encode($data->expired_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status_active')); ?>:</b>
	<?php echo CHtml::encode($data->status_active); ?>
	<br />

	<?php /*
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