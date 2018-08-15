<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_numbering_faktur_allocation')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_numbering_faktur_allocation),array('view','id'=>$data->id_numbering_faktur_allocation)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('is_active')); ?>:</b>
	<?php echo CHtml::encode($data->is_active); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('first_number')); ?>:</b>
	<?php echo CHtml::encode($data->first_number); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('last_number')); ?>:</b>
	<?php echo CHtml::encode($data->last_number); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('prefix_number')); ?>:</b>
	<?php echo CHtml::encode($data->prefix_number); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('first_number_int')); ?>:</b>
	<?php echo CHtml::encode($data->first_number_int); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('last_number_int')); ?>:</b>
	<?php echo CHtml::encode($data->last_number_int); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('create_date')); ?>:</b>
	<?php echo CHtml::encode($data->create_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_create')); ?>:</b>
	<?php echo CHtml::encode($data->user_create); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ip_user_create')); ?>:</b>
	<?php echo CHtml::encode($data->ip_user_create); ?>
	<br />

	*/ ?>

</div>