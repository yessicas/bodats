<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_shipping_order_detail')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_shipping_order_detail),array('view','id'=>$data->id_shipping_order_detail)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_shipping_order')); ?>:</b>
	<?php echo CHtml::encode($data->id_shipping_order); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_vessel_tug')); ?>:</b>
	<?php echo CHtml::encode($data->id_vessel_tug); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_vessel_barge')); ?>:</b>
	<?php echo CHtml::encode($data->id_vessel_barge); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('IdJettyOrigin')); ?>:</b>
	<?php echo CHtml::encode($data->IdJettyOrigin); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('IdJettyDestination')); ?>:</b>
	<?php echo CHtml::encode($data->IdJettyDestination); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('BargeSize')); ?>:</b>
	<?php echo CHtml::encode($data->BargeSize); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('Capacity')); ?>:</b>
	<?php echo CHtml::encode($data->Capacity); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Price')); ?>:</b>
	<?php echo CHtml::encode($data->Price); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_currency')); ?>:</b>
	<?php echo CHtml::encode($data->id_currency); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('change_rate')); ?>:</b>
	<?php echo CHtml::encode($data->change_rate); ?>
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