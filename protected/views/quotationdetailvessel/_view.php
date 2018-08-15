<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_quotation_detail')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_quotation_detail),array('view','id'=>$data->id_quotation_detail)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_quotation')); ?>:</b>
	<?php echo CHtml::encode($data->id_quotation); ?>
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

	<b><?php echo CHtml::encode($data->getAttributeLabel('Capacity')); ?>:</b>
	<?php echo CHtml::encode($data->Capacity); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Price')); ?>:</b>
	<?php echo CHtml::encode($data->Price); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('id_currency')); ?>:</b>
	<?php echo CHtml::encode($data->id_currency); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('change_rate')); ?>:</b>
	<?php echo CHtml::encode($data->change_rate); ?>
	<br />

	*/ ?>

</div>