<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_so')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_so),array('view','id'=>$data->id_so)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_quotation')); ?>:</b>
	<?php echo CHtml::encode($data->id_quotation); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ShippingOrderNumber')); ?>:</b>
	<?php echo CHtml::encode($data->ShippingOrderNumber); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('SONo')); ?>:</b>
	<?php echo CHtml::encode($data->SONo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('SOMonth')); ?>:</b>
	<?php echo CHtml::encode($data->SOMonth); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('SOYear')); ?>:</b>
	<?php echo CHtml::encode($data->SOYear); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('period_year')); ?>:</b>
	<?php echo CHtml::encode($data->period_year); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('period_month')); ?>:</b>
	<?php echo CHtml::encode($data->period_month); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('period_quartal')); ?>:</b>
	<?php echo CHtml::encode($data->period_quartal); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('SOQuartal')); ?>:</b>
	<?php echo CHtml::encode($data->SOQuartal); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('SI_Number')); ?>:</b>
	<?php echo CHtml::encode($data->SI_Number); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Consignee')); ?>:</b>
	<?php echo CHtml::encode($data->Consignee); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NotifyAddress')); ?>:</b>
	<?php echo CHtml::encode($data->NotifyAddress); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Marks')); ?>:</b>
	<?php echo CHtml::encode($data->Marks); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('DocumentsRequired')); ?>:</b>
	<?php echo CHtml::encode($data->DocumentsRequired); ?>
	<br />

	*/ ?>

</div>