<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_bussiness_type_order')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_bussiness_type_order),array('view','id'=>$data->id_bussiness_type_order)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('bussiness_type_order')); ?>:</b>
	<?php echo CHtml::encode($data->bussiness_type_order); ?>
	<br />


</div>