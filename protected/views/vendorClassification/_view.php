<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_vendor_classification')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_vendor_classification),array('view','id'=>$data->id_vendor_classification)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_vendor')); ?>:</b>
	<?php echo CHtml::encode($data->id_vendor); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('type')); ?>:</b>
	<?php echo CHtml::encode($data->type); ?>
	<br />


</div>