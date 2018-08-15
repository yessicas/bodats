<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_survey_item')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_survey_item),array('view','id'=>$data->id_survey_item)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('survey_item_name')); ?>:</b>
	<?php echo CHtml::encode($data->survey_item_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('survey_item_code')); ?>:</b>
	<?php echo CHtml::encode($data->survey_item_code); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('category')); ?>:</b>
	<?php echo CHtml::encode($data->category); ?>
	<br />


</div>