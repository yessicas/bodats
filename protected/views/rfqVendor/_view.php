<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_rfq_vendor')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_rfq_vendor),array('view','id'=>$data->id_rfq_vendor)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('RFQNumber')); ?>:</b>
	<?php echo CHtml::encode($data->RFQNumber); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NoOrder')); ?>:</b>
	<?php echo CHtml::encode($data->NoOrder); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NoMonth')); ?>:</b>
	<?php echo CHtml::encode($data->NoMonth); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NoYear')); ?>:</b>
	<?php echo CHtml::encode($data->NoYear); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_vendor')); ?>:</b>
	<?php echo CHtml::encode($data->id_vendor); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('From')); ?>:</b>
	<?php echo CHtml::encode($data->From); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('QuotationDate')); ?>:</b>
	<?php echo CHtml::encode($data->QuotationDate); ?>
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