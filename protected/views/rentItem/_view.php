<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_rent_item')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_rent_item),array('view','id'=>$data->id_rent_item)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rent_item_name')); ?>:</b>
	<?php echo CHtml::encode($data->rent_item_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rent_item_code')); ?>:</b>
	<?php echo CHtml::encode($data->rent_item_code); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('category')); ?>:</b>
	<?php echo CHtml::encode($data->category); ?>
	<br />


</div>