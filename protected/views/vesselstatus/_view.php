<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_vessel_status')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_vessel_status),array('view','id'=>$data->id_vessel_status)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('vessel_status')); ?>:</b>
	<?php echo CHtml::encode($data->vessel_status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />


</div>