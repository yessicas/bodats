<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_mst_timesheet_summary')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_mst_timesheet_summary),array('view','id'=>$data->id_mst_timesheet_summary)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('timesheet_summary')); ?>:</b>
	<?php echo CHtml::encode($data->timesheet_summary); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('is_active')); ?>:</b>
	<?php echo CHtml::encode($data->is_active); ?>
	<br />


</div>