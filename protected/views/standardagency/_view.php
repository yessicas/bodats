<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_standard_agency')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_standard_agency),array('view','id'=>$data->id_standard_agency)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('JettyIdStart')); ?>:</b>
	<?php echo CHtml::encode($data->JettyIdStart); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('JettyIdEnd')); ?>:</b>
	<?php echo CHtml::encode($data->JettyIdEnd); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('agency_fix_cost')); ?>:</b>
	<?php echo CHtml::encode($data->agency_fix_cost); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('agency_var_cost')); ?>:</b>
	<?php echo CHtml::encode($data->agency_var_cost); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rent')); ?>:</b>
	<?php echo CHtml::encode($data->rent); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('other')); ?>:</b>
	<?php echo CHtml::encode($data->other); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('id_currency')); ?>:</b>
	<?php echo CHtml::encode($data->id_currency); ?>
	<br />

	*/ ?>

</div>