<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_payroll_item')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_payroll_item),array('view','id'=>$data->id_payroll_item)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('payroll_item')); ?>:</b>
	<?php echo CHtml::encode($data->payroll_item); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('is_active')); ?>:</b>
	<?php echo CHtml::encode($data->is_active); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />


</div>