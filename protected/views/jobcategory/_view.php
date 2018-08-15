<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_job_category')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_job_category),array('view','id'=>$data->id_job_category)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('category_indo')); ?>:</b>
	<?php echo CHtml::encode($data->category_indo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('category_eng')); ?>:</b>
	<?php echo CHtml::encode($data->category_eng); ?>
	<br />


</div>