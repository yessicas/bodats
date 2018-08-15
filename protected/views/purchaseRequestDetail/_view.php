<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_purchase_request_detail')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_purchase_request_detail),array('view','id'=>$data->id_purchase_request_detail)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_purchase_request')); ?>:</b>
	<?php echo CHtml::encode($data->id_purchase_request); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('purchase_item_table')); ?>:</b>
	<?php echo CHtml::encode($data->purchase_item_table); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_item')); ?>:</b>
	<?php echo CHtml::encode($data->id_item); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('quantity')); ?>:</b>
	<?php echo CHtml::encode($data->quantity); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_metric_pr')); ?>:</b>
	<?php echo CHtml::encode($data->id_metric_pr); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dedicated_to')); ?>:</b>
	<?php echo CHtml::encode($data->dedicated_to); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('id_vessel')); ?>:</b>
	<?php echo CHtml::encode($data->id_vessel); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_voyage_order')); ?>:</b>
	<?php echo CHtml::encode($data->id_voyage_order); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('notes')); ?>:</b>
	<?php echo CHtml::encode($data->notes); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('requested_user')); ?>:</b>
	<?php echo CHtml::encode($data->requested_user); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('requested_date')); ?>:</b>
	<?php echo CHtml::encode($data->requested_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ip_user_requested')); ?>:</b>
	<?php echo CHtml::encode($data->ip_user_requested); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('approved_user')); ?>:</b>
	<?php echo CHtml::encode($data->approved_user); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('approval_date')); ?>:</b>
	<?php echo CHtml::encode($data->approval_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ip_user_approved')); ?>:</b>
	<?php echo CHtml::encode($data->ip_user_approved); ?>
	<br />

	*/ ?>

</div>