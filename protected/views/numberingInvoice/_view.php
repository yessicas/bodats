<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_numbering')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_numbering),array('view','id'=>$data->id_numbering)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('number')); ?>:</b>
	<?php echo CHtml::encode($data->number); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('notes')); ?>:</b>
	<?php echo CHtml::encode($data->notes); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('is_initial')); ?>:</b>
	<?php echo CHtml::encode($data->is_initial); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_invoice_voyage')); ?>:</b>
	<?php echo CHtml::encode($data->id_invoice_voyage); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('taken_date')); ?>:</b>
	<?php echo CHtml::encode($data->taken_date); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('user_taken')); ?>:</b>
	<?php echo CHtml::encode($data->user_taken); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ip_user_taken')); ?>:</b>
	<?php echo CHtml::encode($data->ip_user_taken); ?>
	<br />

	*/ ?>

</div>