<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_setting_quotation_report')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_setting_quotation_report),array('view','id'=>$data->id_setting_quotation_report)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('field_name')); ?>:</b>
	<?php echo CHtml::encode($data->field_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('field_value')); ?>:</b>
	<?php echo CHtml::encode($data->field_value); ?>
	<br />


</div>