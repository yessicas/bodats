<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'forum-category-form',
	'enableAjaxValidation'=>false,
)); ?>
<div class="view">

	<div class = "animated flash">
	<?php echo $form->errorSummary($model); ?>
	</div>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>


	<?php echo $form->textFieldRow($model,'forum_category',array('class'=>'span5','maxlength'=>150)); ?>

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
</div>
</div>

<?php $this->endWidget(); ?>
