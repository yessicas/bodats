<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_fuel_transaction_type')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_fuel_transaction_type),array('view','id'=>$data->id_fuel_transaction_type)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fuel_transaction_type')); ?>:</b>
	<?php echo CHtml::encode($data->fuel_transaction_type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('category')); ?>:</b>
	<?php echo CHtml::encode($data->category); ?>
	<br />


</div>