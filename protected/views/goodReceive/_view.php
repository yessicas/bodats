<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_good_receive')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_good_receive),array('view','id'=>$data->id_good_receive)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_purchase_order')); ?>:</b>
	<?php echo CHtml::encode($data->id_purchase_order); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_purchase_order_detail')); ?>:</b>
	<?php echo CHtml::encode($data->id_purchase_order_detail); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_po_category')); ?>:</b>
	<?php echo CHtml::encode($data->id_po_category); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('received_date')); ?>:</b>
	<?php echo CHtml::encode($data->received_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('receive_by')); ?>:</b>
	<?php echo CHtml::encode($data->receive_by); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('condition')); ?>:</b>
	<?php echo CHtml::encode($data->condition); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('notes')); ?>:</b>
	<?php echo CHtml::encode($data->notes); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('amount')); ?>:</b>
	<?php echo CHtml::encode($data->amount); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('purchase_item_table')); ?>:</b>
	<?php echo CHtml::encode($data->purchase_item_table); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_item')); ?>:</b>
	<?php echo CHtml::encode($data->id_item); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('item_add_info')); ?>:</b>
	<?php echo CHtml::encode($data->item_add_info); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('quantity')); ?>:</b>
	<?php echo CHtml::encode($data->quantity); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('metric')); ?>:</b>
	<?php echo CHtml::encode($data->metric); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('receive_number')); ?>:</b>
	<?php echo CHtml::encode($data->receive_number); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status_receive')); ?>:</b>
	<?php echo CHtml::encode($data->status_receive); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_user')); ?>:</b>
	<?php echo CHtml::encode($data->created_user); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_date')); ?>:</b>
	<?php echo CHtml::encode($data->created_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ip_user_updated')); ?>:</b>
	<?php echo CHtml::encode($data->ip_user_updated); ?>
	<br />

	*/ ?>

</div>