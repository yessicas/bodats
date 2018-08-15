<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_part_bom')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_part_bom),array('view','id'=>$data->id_part_bom)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('alias_name')); ?>:</b>
	<?php echo CHtml::encode($data->alias_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('code')); ?>:</b>
	<?php echo CHtml::encode($data->code); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_bom')); ?>:</b>
	<?php echo CHtml::encode($data->id_bom); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_part')); ?>:</b>
	<?php echo CHtml::encode($data->id_part); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_part_parent')); ?>:</b>
	<?php echo CHtml::encode($data->id_part_parent); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('quantity')); ?>:</b>
	<?php echo CHtml::encode($data->quantity); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('metric')); ?>:</b>
	<?php echo CHtml::encode($data->metric); ?>
	<br />

	*/ ?>

</div>