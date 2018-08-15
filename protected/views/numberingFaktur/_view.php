<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_numbering_faktur')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_numbering_faktur),array('view','id'=>$data->id_numbering_faktur)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('first_number')); ?>:</b>
	<?php echo CHtml::encode($data->first_number); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('last_number')); ?>:</b>
	<?php echo CHtml::encode($data->last_number); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('notes')); ?>:</b>
	<?php echo CHtml::encode($data->notes); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('taken_date')); ?>:</b>
	<?php echo CHtml::encode($data->taken_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_taken')); ?>:</b>
	<?php echo CHtml::encode($data->user_taken); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('ip_user_taken')); ?>:</b>
	<?php echo CHtml::encode($data->ip_user_taken); ?>
	<br />

	*/ ?>

</div>