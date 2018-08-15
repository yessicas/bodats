<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_crew_payroll_monthly')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_crew_payroll_monthly),array('view','id'=>$data->id_crew_payroll_monthly)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('month')); ?>:</b>
	<?php echo CHtml::encode($data->month); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('year')); ?>:</b>
	<?php echo CHtml::encode($data->year); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CrewId')); ?>:</b>
	<?php echo CHtml::encode($data->CrewId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_payroll_item')); ?>:</b>
	<?php echo CHtml::encode($data->id_payroll_item); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('amount')); ?>:</b>
	<?php echo CHtml::encode($data->amount); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('transfer_date')); ?>:</b>
	<?php echo CHtml::encode($data->transfer_date); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('transfer_type')); ?>:</b>
	<?php echo CHtml::encode($data->transfer_type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_currency')); ?>:</b>
	<?php echo CHtml::encode($data->id_currency); ?>
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