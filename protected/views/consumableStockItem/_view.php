<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_consumable_stock_item')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_consumable_stock_item),array('view','id'=>$data->id_consumable_stock_item)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_po_category')); ?>:</b>
	<?php echo CHtml::encode($data->id_po_category); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('consumable_stock_category')); ?>:</b>
	<?php echo CHtml::encode($data->consumable_stock_category); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('consumable_stock_item')); ?>:</b>
	<?php echo CHtml::encode($data->consumable_stock_item); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('parent_level1')); ?>:</b>
	<?php echo CHtml::encode($data->parent_level1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('parent_level2')); ?>:</b>
	<?php echo CHtml::encode($data->parent_level2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('parent_level3')); ?>:</b>
	<?php echo CHtml::encode($data->parent_level3); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('serial_number')); ?>:</b>
	<?php echo CHtml::encode($data->serial_number); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estimated_unit_price')); ?>:</b>
	<?php echo CHtml::encode($data->estimated_unit_price); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('metric')); ?>:</b>
	<?php echo CHtml::encode($data->metric); ?>
	<br />

	*/ ?>

</div>