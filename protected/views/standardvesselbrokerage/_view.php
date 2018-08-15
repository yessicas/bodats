<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_standard_vessel_brokerage')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_standard_vessel_brokerage),array('view','id'=>$data->id_standard_vessel_brokerage)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_standard_vessel_cost')); ?>:</b>
	<?php echo CHtml::encode($data->id_standard_vessel_cost); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_brokerage_item')); ?>:</b>
	<?php echo CHtml::encode($data->id_brokerage_item); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('amount')); ?>:</b>
	<?php echo CHtml::encode($data->amount); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_currency')); ?>:</b>
	<?php echo CHtml::encode($data->id_currency); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
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