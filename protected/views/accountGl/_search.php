<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

		<?php echo $form->textFieldRow($model,'id_account_gl',array('class'=>'span5','maxlength'=>20)); ?>

		<?php echo $form->textFieldRow($model,'coa_level1',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'coa_level2',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'coa_level3',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'gl_number',array('class'=>'span5','maxlength'=>20)); ?>

		<?php echo $form->textFieldRow($model,'gl_name',array('class'=>'span5','maxlength'=>250)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType' => 'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
