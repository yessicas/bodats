<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_voyage_activity_group')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_voyage_activity_group),array('view','id'=>$data->id_voyage_activity_group)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('voyage_activity_group_short')); ?>:</b>
	<?php echo CHtml::encode($data->voyage_activity_group_short); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('voyage_activity_group')); ?>:</b>
	<?php echo CHtml::encode($data->voyage_activity_group); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('voyage_activity_group_desc')); ?>:</b>
	<?php echo CHtml::encode($data->voyage_activity_group_desc); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('color')); ?>:</b>
	<?php echo CHtml::encode($data->color); ?>
	<br />


</div>