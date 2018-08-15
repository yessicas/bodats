<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_rfq_vendor_detail')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_rfq_vendor_detail),array('view','id'=>$data->id_rfq_vendor_detail)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_rfq_vendor')); ?>:</b>
	<?php echo CHtml::encode($data->id_rfq_vendor); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_part')); ?>:</b>
	<?php echo CHtml::encode($data->id_part); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('quantity')); ?>:</b>
	<?php echo CHtml::encode($data->quantity); ?>
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


</div>