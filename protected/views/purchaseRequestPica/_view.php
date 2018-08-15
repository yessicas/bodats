<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_purchase_request_pica')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_purchase_request_pica),array('view','id'=>$data->id_purchase_request_pica)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_purchase_request')); ?>:</b>
	<?php echo CHtml::encode($data->id_purchase_request); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('problem')); ?>:</b>
	<?php echo CHtml::encode($data->problem); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('corrective_action')); ?>:</b>
	<?php echo CHtml::encode($data->corrective_action); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PIC')); ?>:</b>
	<?php echo CHtml::encode($data->PIC); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status_corrective')); ?>:</b>
	<?php echo CHtml::encode($data->status_corrective); ?>
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