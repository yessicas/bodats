<?php
/* @var $this VesselController */
/* @var $data Vessel */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_vessel')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_vessel), array('view', 'id'=>$data->id_vessel)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('VesselName')); ?>:</b>
	<?php echo CHtml::encode($data->VesselName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('VesselChecklist')); ?>:</b>
	<?php echo CHtml::encode($data->VesselChecklist); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Status')); ?>:</b>
	<?php echo CHtml::encode($data->Status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('BargeSize')); ?>:</b>
	<?php echo CHtml::encode($data->BargeSize); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('VesselType')); ?>:</b>
	<?php echo CHtml::encode($data->VesselType); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Capacity')); ?>:</b>
	<?php echo CHtml::encode($data->Capacity); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('VesselDate')); ?>:</b>
	<?php echo CHtml::encode($data->VesselDate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('RunningHour')); ?>:</b>
	<?php echo CHtml::encode($data->RunningHour); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('LastDateMaintenance')); ?>:</b>
	<?php echo CHtml::encode($data->LastDateMaintenance); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('LastRHMaintenance')); ?>:</b>
	<?php echo CHtml::encode($data->LastRHMaintenance); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('inventoryid')); ?>:</b>
	<?php echo CHtml::encode($data->inventoryid); ?>
	<br />

	*/ ?>

</div>