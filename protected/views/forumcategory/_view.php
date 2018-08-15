<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_forum_category')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_forum_category),array('view','id'=>$data->id_forum_category)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('forum_category')); ?>:</b>
	<?php echo CHtml::encode($data->forum_category); ?>
	<br />


</div>