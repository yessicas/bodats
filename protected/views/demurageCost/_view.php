<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_demurage_cost')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_demurage_cost),array('view','id'=>$data->id_demurage_cost)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_voyage_order')); ?>:</b>
	<?php echo CHtml::encode($data->id_voyage_order); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('transaction_date')); ?>:</b>
	<?php echo CHtml::encode($data->transaction_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('amount')); ?>:</b>
	<?php echo CHtml::encode($data->amount); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('is_invoice_created')); ?>:</b>
	<?php echo CHtml::encode($data->is_invoice_created); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('invoice_number')); ?>:</b>
	<?php echo CHtml::encode($data->invoice_number); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('id_invoice_voyage')); ?>:</b>
	<?php echo CHtml::encode($data->id_invoice_voyage); ?>
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