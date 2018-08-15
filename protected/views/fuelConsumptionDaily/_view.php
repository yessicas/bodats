<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_fuel_consumption_daily')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_fuel_consumption_daily),array('view','id'=>$data->id_fuel_consumption_daily)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('log_date')); ?>:</b>
	<?php echo CHtml::encode($data->log_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_vessel')); ?>:</b>
	<?php echo CHtml::encode($data->id_vessel); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('last_fuel_remain')); ?>:</b>
	<?php echo CHtml::encode($data->last_fuel_remain); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status_remain')); ?>:</b>
	<?php echo CHtml::encode($data->status_remain); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('last_longitude')); ?>:</b>
	<?php echo CHtml::encode($data->last_longitude); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('last_latitude')); ?>:</b>
	<?php echo CHtml::encode($data->last_latitude); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('NearestJettyId')); ?>:</b>
	<?php echo CHtml::encode($data->NearestJettyId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NearestDistancePoint')); ?>:</b>
	<?php echo CHtml::encode($data->NearestDistancePoint); ?>
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