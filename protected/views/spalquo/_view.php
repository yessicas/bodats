<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_quotation')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_quotation),array('view','id'=>$data->id_quotation)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('QuotationNumber')); ?>:</b>
	<?php echo CHtml::encode($data->QuotationNumber); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_customer')); ?>:</b>
	<?php echo CHtml::encode($data->id_customer); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('QuotationDate')); ?>:</b>
	<?php echo CHtml::encode($data->QuotationDate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('SignName')); ?>:</b>
	<?php echo CHtml::encode($data->SignName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('SignPosition')); ?>:</b>
	<?php echo CHtml::encode($data->SignPosition); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Status')); ?>:</b>
	<?php echo CHtml::encode($data->Status); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('Category')); ?>:</b>
	<?php echo CHtml::encode($data->Category); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('StatusDescription')); ?>:</b>
	<?php echo CHtml::encode($data->StatusDescription); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('attachment')); ?>:</b>
	<?php echo CHtml::encode($data->attachment); ?>
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