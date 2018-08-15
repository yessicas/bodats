<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_fuel_price_history')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_fuel_price_history),array('view','id'=>$data->id_fuel_price_history)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_currency')); ?>:</b>
	<?php echo CHtml::encode($data->id_currency); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fuel_price')); ?>:</b>
	<?php echo CHtml::encode($data->fuel_price); ?>
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


</div>