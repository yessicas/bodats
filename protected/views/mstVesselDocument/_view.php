<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_vessel_document')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_vessel_document),array('view','id'=>$data->id_vessel_document)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('VesselDocumentName')); ?>:</b>
	<?php echo CHtml::encode($data->VesselDocumentName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Information')); ?>:</b>
	<?php echo CHtml::encode($data->Information); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Status')); ?>:</b>
	<?php echo CHtml::encode($data->Status); ?>
	<br />


</div>