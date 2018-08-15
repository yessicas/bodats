<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_debit_note_category')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_debit_note_category),array('view','id'=>$data->id_debit_note_category)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('debit_note_category')); ?>:</b>
	<?php echo CHtml::encode($data->debit_note_category); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('is_active')); ?>:</b>
	<?php echo CHtml::encode($data->is_active); ?>
	<br />


</div>