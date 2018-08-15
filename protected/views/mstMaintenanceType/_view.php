<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_maintenance_type')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_maintenance_type),array('view','id'=>$data->id_maintenance_type)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('MaintenanceTypeName')); ?>:</b>
	<?php echo CHtml::encode($data->MaintenanceTypeName); ?>
	<br />


</div>