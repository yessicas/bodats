<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_brokerage_item')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_brokerage_item),array('view','id'=>$data->id_brokerage_item)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('brokerage_item')); ?>:</b>
	<?php echo CHtml::encode($data->brokerage_item); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />


</div>