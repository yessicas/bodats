<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_part_structure')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_part_structure),array('view','id'=>$data->id_part_structure)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('code_number')); ?>:</b>
	<?php echo CHtml::encode($data->code_number); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('structure_name')); ?>:</b>
	<?php echo CHtml::encode($data->structure_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_part_structure_parent')); ?>:</b>
	<?php echo CHtml::encode($data->id_part_structure_parent); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_level')); ?>:</b>
	<?php echo CHtml::encode($data->id_level); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_date')); ?>:</b>
	<?php echo CHtml::encode($data->created_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_user')); ?>:</b>
	<?php echo CHtml::encode($data->created_user); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('ip_user_updated')); ?>:</b>
	<?php echo CHtml::encode($data->ip_user_updated); ?>
	<br />

	*/ ?>

</div>