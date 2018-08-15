<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_purchase_request')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_purchase_request),array('view','id'=>$data->id_purchase_request)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PRNumber')); ?>:</b>
	<?php echo CHtml::encode($data->PRNumber); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PRDate')); ?>:</b>
	<?php echo CHtml::encode($data->PRDate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PRNo')); ?>:</b>
	<?php echo CHtml::encode($data->PRNo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PRMonth')); ?>:</b>
	<?php echo CHtml::encode($data->PRMonth); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PRYear')); ?>:</b>
	<?php echo CHtml::encode($data->PRYear); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_po_category')); ?>:</b>
	<?php echo CHtml::encode($data->id_po_category); ?>
	<br />


</div>