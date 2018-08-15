<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('RouteId')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->RouteId),array('view','id'=>$data->RouteId)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Place_first')); ?>:</b>
	<?php echo CHtml::encode($data->Place_first); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Place_second')); ?>:</b>
	<?php echo CHtml::encode($data->Place_second); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Acronym')); ?>:</b>
	<?php echo CHtml::encode($data->Acronym); ?>
	<br />


</div>