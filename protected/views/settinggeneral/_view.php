<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_setting_general')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_setting_general),array('view','id'=>$data->id_setting_general)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('field_name')); ?>:</b>
	<?php echo CHtml::encode($data->field_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fiel_value')); ?>:</b>
	<?php echo CHtml::encode($data->fiel_value); ?>
	<br />


</div>