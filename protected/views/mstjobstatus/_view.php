<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_mst_job_status')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_mst_job_status),array('view','id'=>$data->id_mst_job_status)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('keterangan')); ?>:</b>
	<?php echo CHtml::encode($data->keterangan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('is_active')); ?>:</b>
	<?php echo CHtml::encode($data->is_active); ?>
	<br />


</div>