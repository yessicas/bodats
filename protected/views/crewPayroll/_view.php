<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_crew_payroll')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_crew_payroll),array('view','id'=>$data->id_crew_payroll)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_crew_payroll_history')); ?>:</b>
	<?php echo CHtml::encode($data->id_crew_payroll_history); ?>
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

	<b><?php echo CHtml::encode($data->getAttributeLabel('effective_date')); ?>:</b>
	<?php echo CHtml::encode($data->effective_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('legal_document')); ?>:</b>
	<?php echo CHtml::encode($data->legal_document); ?>
	<br />

	<?php /*
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