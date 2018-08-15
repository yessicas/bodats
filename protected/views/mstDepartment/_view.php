<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('DepartmentId')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->DepartmentId),array('view','id'=>$data->DepartmentId)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('DepartmentName')); ?>:</b>
	<?php echo CHtml::encode($data->DepartmentName); ?>
	<br />


</div>