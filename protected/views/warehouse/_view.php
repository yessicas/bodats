<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_warehouse')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_warehouse),array('view','id'=>$data->id_warehouse)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('warehouse_name')); ?>:</b>
	<?php echo CHtml::encode($data->warehouse_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('address')); ?>:</b>
	<?php echo CHtml::encode($data->address); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('is_active')); ?>:</b>
	<?php echo CHtml::encode($data->is_active); ?>
	<br />


</div>