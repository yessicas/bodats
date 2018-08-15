<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_vessel_document_validity')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_vessel_document_validity),array('view','id'=>$data->id_vessel_document_validity)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('no')); ?>:</b>
	<?php echo CHtml::encode($data->no); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('vessel_document_validity')); ?>:</b>
	<?php echo CHtml::encode($data->vessel_document_validity); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('color')); ?>:</b>
	<?php echo CHtml::encode($data->color); ?>
	<br />


</div>