<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_customor_voice')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_customor_voice),array('view','id'=>$data->id_customor_voice)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_customer')); ?>:</b>
	<?php echo CHtml::encode($data->id_customer); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('userid')); ?>:</b>
	<?php echo CHtml::encode($data->userid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('voice')); ?>:</b>
	<?php echo CHtml::encode($data->voice); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('is_view')); ?>:</b>
	<?php echo CHtml::encode($data->is_view); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_date')); ?>:</b>
	<?php echo CHtml::encode($data->created_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_user')); ?>:</b>
	<?php echo CHtml::encode($data->created_user); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('ip_user_updated')); ?>:</b>
	<?php echo CHtml::encode($data->ip_user_updated); ?>
	<br />

	*/ ?>

</div>