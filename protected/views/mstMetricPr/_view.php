<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('metric')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->metric),array('view','id'=>$data->metric)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('metric_name')); ?>:</b>
	<?php echo CHtml::encode($data->metric_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_po_category')); ?>:</b>
	<?php echo CHtml::encode($data->id_po_category); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />


</div>