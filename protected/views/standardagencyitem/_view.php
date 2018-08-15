<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_standard_agency_item')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_standard_agency_item),array('view','id'=>$data->id_standard_agency_item)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_standard_agency')); ?>:</b>
	<?php echo CHtml::encode($data->id_standard_agency); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_agency_item')); ?>:</b>
	<?php echo CHtml::encode($data->id_agency_item); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('agency_fix_cost')); ?>:</b>
	<?php echo CHtml::encode($data->agency_fix_cost); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('agency_var_cost')); ?>:</b>
	<?php echo CHtml::encode($data->agency_var_cost); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_currency')); ?>:</b>
	<?php echo CHtml::encode($data->id_currency); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('created_date')); ?>:</b>
	<?php echo CHtml::encode($data->created_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_user')); ?>:</b>
	<?php echo CHtml::encode($data->created_user); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ip_user_updated')); ?>:</b>
	<?php echo CHtml::encode($data->ip_user_updated); ?>
	<br />

	*/ ?>

</div>