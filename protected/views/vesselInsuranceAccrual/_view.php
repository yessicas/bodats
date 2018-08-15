<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_vessel_insurance_accrual')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_vessel_insurance_accrual),array('view','id'=>$data->id_vessel_insurance_accrual)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_vessel')); ?>:</b>
	<?php echo CHtml::encode($data->id_vessel); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('year')); ?>:</b>
	<?php echo CHtml::encode($data->year); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('amount')); ?>:</b>
	<?php echo CHtml::encode($data->amount); ?>
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