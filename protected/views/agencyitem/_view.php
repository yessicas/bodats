<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_agency_item')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_agency_item),array('view','id'=>$data->id_agency_item)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('agency_item')); ?>:</b>
	<?php echo CHtml::encode($data->agency_item); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />


</div>