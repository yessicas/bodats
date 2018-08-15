<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

		<?php echo $form->textFieldRow($model,'id_account_coa',array('class'=>'span5','maxlength'=>11)); ?>

		<?php echo $form->textFieldRow($model,'account_name',array('class'=>'span5','maxlength'=>250)); ?>

		<?php echo $form->textFieldRow($model,'account_name_id',array('class'=>'span5','maxlength'=>250)); ?>

		<?php echo $form->textFieldRow($model,'id_account_coa_parent',array('class'=>'span5','maxlength'=>20)); ?>

		<?php echo $form->textFieldRow($model,'level',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType' => 'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
