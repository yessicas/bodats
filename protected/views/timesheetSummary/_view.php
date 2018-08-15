<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_timesheet_summary')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_timesheet_summary),array('view','id'=>$data->id_timesheet_summary)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_voyage_order')); ?>:</b>
	<?php echo CHtml::encode($data->id_voyage_order); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_mst_timesheet_summary')); ?>:</b>
	<?php echo CHtml::encode($data->id_mst_timesheet_summary); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('value')); ?>:</b>
	<?php echo CHtml::encode($data->value); ?>
	<br />


</div>