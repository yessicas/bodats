<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

		<?php echo $form->textFieldRow($model,'id_standard_agency',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'JettyIdStart',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'JettyIdEnd',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'agency_fix_cost',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'agency_var_cost',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'rent',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'other',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'id_currency',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType' => 'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
