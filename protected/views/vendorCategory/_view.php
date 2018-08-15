<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_vendor_category')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_vendor_category),array('view','id'=>$data->id_vendor_category)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_vendor')); ?>:</b>
	<?php echo CHtml::encode($data->id_vendor); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_po_category')); ?>:</b>
	<?php echo CHtml::encode($data->id_po_category); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />


</div>