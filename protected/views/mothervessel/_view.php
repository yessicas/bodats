<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_mothervessel')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_mothervessel),array('view','id'=>$data->id_mothervessel)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('MotherVesselCode')); ?>:</b>
	<?php echo CHtml::encode($data->MotherVesselCode); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('MV_Name')); ?>:</b>
	<?php echo CHtml::encode($data->MV_Name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('MV_Type')); ?>:</b>
	<?php echo CHtml::encode($data->MV_Type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('MV_Route')); ?>:</b>
	<?php echo CHtml::encode($data->MV_Route); ?>
	<br />


</div>