<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_account_gl')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_account_gl),array('view','id'=>$data->id_account_gl)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('coa_level1')); ?>:</b>
	<?php echo CHtml::encode($data->coa_level1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('coa_level2')); ?>:</b>
	<?php echo CHtml::encode($data->coa_level2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('coa_level3')); ?>:</b>
	<?php echo CHtml::encode($data->coa_level3); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('gl_number')); ?>:</b>
	<?php echo CHtml::encode($data->gl_number); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('gl_name')); ?>:</b>
	<?php echo CHtml::encode($data->gl_name); ?>
	<br />


</div>