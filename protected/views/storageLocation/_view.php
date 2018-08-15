<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('StorageLocationId')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->StorageLocationId),array('view','id'=>$data->StorageLocationId)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('LocationName')); ?>:</b>
	<?php echo CHtml::encode($data->LocationName); ?>
	<br />


</div>