<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'authitem-form',
	'type' => 'horizontal',
	'enableAjaxValidation'=>false,
	'clientOptions'=>array('validateOnSubmit'=>true),
	'enableClientValidation'=>true,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'name',array('class'=>'span4','maxlength'=>64)); ?>

	<?php //echo $form->textFieldRow($model,'type',array('class'=>'span3')); ?>

	<?php echo $form->textAreaRow($model,'description',array('rows'=>4, 'cols'=>50, 'class'=>'span4')); ?>

	<?php //echo $form->textAreaRow($model,'bizrule',array('rows'=>4, 'cols'=>50, 'class'=>'span3')); ?>

	<?php //echo $form->textAreaRow($model,'data',array('rows'=>4, 'cols'=>50, 'class'=>'span3')); ?>

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>
