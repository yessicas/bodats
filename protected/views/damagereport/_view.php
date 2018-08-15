<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_damage_report')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_damage_report),array('view','id'=>$data->id_damage_report)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_vessel')); ?>:</b>
	<?php echo CHtml::encode($data->id_vessel); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Date')); ?>:</b>
	<?php echo CHtml::encode($data->Date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Description')); ?>:</b>
	<?php echo CHtml::encode($data->Description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PIC')); ?>:</b>
	<?php echo CHtml::encode($data->PIC); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Status')); ?>:</b>
	<?php echo CHtml::encode($data->Status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('DamageTime')); ?>:</b>
	<?php echo CHtml::encode($data->DamageTime); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('CausedDamage')); ?>:</b>
	<?php echo CHtml::encode($data->CausedDamage); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('DamagePhoto')); ?>:</b>
	<?php echo CHtml::encode($data->DamagePhoto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Suggestion')); ?>:</b>
	<?php echo CHtml::encode($data->Suggestion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Master')); ?>:</b>
	<?php echo CHtml::encode($data->Master); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ChiefEngineer')); ?>:</b>
	<?php echo CHtml::encode($data->ChiefEngineer); ?>
	<br />

	*/ ?>

</div>