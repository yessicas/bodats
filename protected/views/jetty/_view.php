<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('JettyId')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->JettyId),array('view','id'=>$data->JettyId)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('JettyName')); ?>:</b>
	<?php echo CHtml::encode($data->JettyName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('JettyPosition')); ?>:</b>
	<?php echo CHtml::encode($data->JettyPosition); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Acronym')); ?>:</b>
	<?php echo CHtml::encode($data->Acronym); ?>
	<br />


</div>