<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_bom')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_bom),array('view','id'=>$data->id_bom)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('bom_name')); ?>:</b>
	<?php echo CHtml::encode($data->bom_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_part_root')); ?>:</b>
	<?php echo CHtml::encode($data->id_part_root); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_date')); ?>:</b>
	<?php echo CHtml::encode($data->created_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_user')); ?>:</b>
	<?php echo CHtml::encode($data->created_user); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ip_user_updated')); ?>:</b>
	<?php echo CHtml::encode($data->ip_user_updated); ?>
	<br />


</div>