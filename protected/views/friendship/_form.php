<div class="view">

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'friendship-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>
<!--
<p class="help-block"><i>Isian Dengan Tanda  <span class="required">*</span> Tidak Boleh Kosong</i></p>
-->

<div class = "animated flash">
<?php echo $form->errorSummary($model); ?>
</div>

	<?php echo $form->textFieldRow($model,'from_userid',array('class'=>'span5','maxlength'=>250)); ?>

	<?php echo $form->textFieldRow($model,'to_userid',array('class'=>'span5','maxlength'=>250)); ?>

	<?php echo $form->textFieldRow($model,'req_date',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'active_date',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'status',array('class'=>'span5','maxlength'=>0)); ?>

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>

</div>