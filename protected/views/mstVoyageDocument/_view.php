<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('IdVoyageDocument')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->IdVoyageDocument),array('view','id'=>$data->IdVoyageDocument)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('DocumentName')); ?>:</b>
	<?php echo CHtml::encode($data->DocumentName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('IsClosedVoyageDocument')); ?>:</b>
	<?php echo CHtml::encode($data->IsClosedVoyageDocument); ?>
	<br />


</div>