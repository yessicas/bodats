<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_leftmenu')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_leftmenu),array('view','id'=>$data->id_leftmenu)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_parent_leftmenu')); ?>:</b>
	<?php echo CHtml::encode($data->id_parent_leftmenu); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('has_child')); ?>:</b>
	<?php echo CHtml::encode($data->has_child); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('menu_name')); ?>:</b>
	<?php echo CHtml::encode($data->menu_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('menu_icon')); ?>:</b>
	<?php echo CHtml::encode($data->menu_icon); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('value_indo')); ?>:</b>
	<?php echo CHtml::encode($data->value_indo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('value_eng')); ?>:</b>
	<?php echo CHtml::encode($data->value_eng); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('url')); ?>:</b>
	<?php echo CHtml::encode($data->url); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('visible')); ?>:</b>
	<?php echo CHtml::encode($data->visible); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('auth')); ?>:</b>
	<?php echo CHtml::encode($data->auth); ?>
	<br />

	*/ ?>

</div>