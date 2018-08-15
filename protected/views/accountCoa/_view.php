<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_account_coa')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_account_coa),array('view','id'=>$data->id_account_coa)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('account_name')); ?>:</b>
	<?php echo CHtml::encode($data->account_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('account_name_id')); ?>:</b>
	<?php echo CHtml::encode($data->account_name_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_account_coa_parent')); ?>:</b>
	<?php echo CHtml::encode($data->id_account_coa_parent); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('level')); ?>:</b>
	<?php echo CHtml::encode($data->level); ?>
	<br />


</div>