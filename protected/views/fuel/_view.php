<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_fuel')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_fuel),array('view','id'=>$data->id_fuel)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fuel')); ?>:</b>
	<?php echo CHtml::encode($data->fuel); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fuel_price')); ?>:</b>
	<?php echo CHtml::encode($data->fuel_price); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_currency')); ?>:</b>
	<?php echo CHtml::encode($data->id_currency); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fuel_price_updated')); ?>:</b>
	<?php echo CHtml::encode($data->fuel_price_updated); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fuel_price_updated_by')); ?>:</b>
	<?php echo CHtml::encode($data->fuel_price_updated_by); ?>
	<br />


</div>