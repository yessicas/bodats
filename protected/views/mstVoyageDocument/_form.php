<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'mst-voyage-document-form',
	'type' => 'horizontal',
	'enableAjaxValidation'=>false,
	'clientOptions'=>array('validateOnSubmit'=>true),
	'enableClientValidation'=>true,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'IdVoyageDocument',array('class'=>'span3')); ?>

	<?php echo $form->textAreaRow($model,'DocumentName',array('rows'=>4, 'cols'=>50, 'class'=>'span5')); ?>

	<?php echo $form->dropDownListRow($model,'IsClosedVoyageDocument',array('1'=>'Yes','0'=>'No'),
	 array('class'=>'span2'));?>

	<?php //echo $form->textFieldRow($model,'IsClosedVoyageDocument',array('class'=>'span5')); ?>

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Save' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>
