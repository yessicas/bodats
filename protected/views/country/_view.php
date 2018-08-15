<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_country')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_country),array('view','id'=>$data->id_country)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('country_name')); ?>:</b>
	<?php echo CHtml::encode($data->country_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('code')); ?>:</b>
	<?php echo CHtml::encode($data->code); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_language')); ?>:</b>
	<?php echo CHtml::encode($data->id_language); ?>
	<br />


</div>