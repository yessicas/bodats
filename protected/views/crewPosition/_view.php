<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_crew_position')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_crew_position),array('view','id'=>$data->id_crew_position)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('crew_position')); ?>:</b>
	<?php echo CHtml::encode($data->crew_position); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />


</div>