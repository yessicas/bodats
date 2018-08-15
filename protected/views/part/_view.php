<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_part')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_part),array('view','id'=>$data->id_part)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_vessel')); ?>:</b>
	<?php echo CHtml::encode($data->id_vessel); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_part_structure')); ?>:</b>
	<?php echo CHtml::encode($data->id_part_structure); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PartNumber')); ?>:</b>
	<?php echo CHtml::encode($data->PartNumber); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PartName')); ?>:</b>
	<?php echo CHtml::encode($data->PartName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('LifeTime')); ?>:</b>
	<?php echo CHtml::encode($data->LifeTime); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('UsageTime')); ?>:</b>
	<?php echo CHtml::encode($data->UsageTime); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('MinStock')); ?>:</b>
	<?php echo CHtml::encode($data->MinStock); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Quantity')); ?>:</b>
	<?php echo CHtml::encode($data->Quantity); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('metric')); ?>:</b>
	<?php echo CHtml::encode($data->metric); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ReplaceSchedule')); ?>:</b>
	<?php echo CHtml::encode($data->ReplaceSchedule); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('LastReplacementDate')); ?>:</b>
	<?php echo CHtml::encode($data->LastReplacementDate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ReplaceLeadtime')); ?>:</b>
	<?php echo CHtml::encode($data->ReplaceLeadtime); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('StandardPriceUnit')); ?>:</b>
	<?php echo CHtml::encode($data->StandardPriceUnit); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_currency')); ?>:</b>
	<?php echo CHtml::encode($data->id_currency); ?>
	<br />

	*/ ?>

</div>