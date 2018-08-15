<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_po_category')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_po_category),array('view','id'=>$data->id_po_category)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('code')); ?>:</b>
	<?php echo CHtml::encode($data->code); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('category')); ?>:</b>
	<?php echo CHtml::encode($data->category); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('category_name')); ?>:</b>
	<?php echo CHtml::encode($data->category_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_parent')); ?>:</b>
	<?php echo CHtml::encode($data->id_parent); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('is_end_node')); ?>:</b>
	<?php echo CHtml::encode($data->is_end_node); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('level1')); ?>:</b>
	<?php echo CHtml::encode($data->level1); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('level2')); ?>:</b>
	<?php echo CHtml::encode($data->level2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('level3')); ?>:</b>
	<?php echo CHtml::encode($data->level3); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('num_level')); ?>:</b>
	<?php echo CHtml::encode($data->num_level); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('auth')); ?>:</b>
	<?php echo CHtml::encode($data->auth); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('type_good_issue')); ?>:</b>
	<?php echo CHtml::encode($data->type_good_issue); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dedicated_to')); ?>:</b>
	<?php echo CHtml::encode($data->dedicated_to); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lead_time_from_approval')); ?>:</b>
	<?php echo CHtml::encode($data->lead_time_from_approval); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('request_by')); ?>:</b>
	<?php echo CHtml::encode($data->request_by); ?>
	<br />

	*/ ?>

</div>