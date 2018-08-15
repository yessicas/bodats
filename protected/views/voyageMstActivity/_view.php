<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_voyage_activity')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_voyage_activity),array('view','id'=>$data->id_voyage_activity)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('voyage_activity')); ?>:</b>
	<?php echo CHtml::encode($data->voyage_activity); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('voyage_activity_desc')); ?>:</b>
	<?php echo CHtml::encode($data->voyage_activity_desc); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('color')); ?>:</b>
	<?php echo CHtml::encode($data->color); ?>
	<br />


</div>