<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_part_category')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_part_category),array('view','id'=>$data->id_part_category)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PartCategoryName')); ?>:</b>
	<?php echo CHtml::encode($data->PartCategoryName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PartDescription')); ?>:</b>
	<?php echo CHtml::encode($data->PartDescription); ?>
	<br />


</div>