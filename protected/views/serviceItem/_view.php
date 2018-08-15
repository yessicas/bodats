<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_service_item')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_service_item),array('view','id'=>$data->id_service_item)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('service_item')); ?>:</b>
	<?php echo CHtml::encode($data->service_item); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_po_category')); ?>:</b>
	<?php echo CHtml::encode($data->id_po_category); ?>
	<br />


</div>