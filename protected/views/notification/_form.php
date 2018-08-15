<div class="view">

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'notification-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>
<!--
<p class="help-block"><i>Isian Dengan Tanda  <span class="required">*</span> Tidak Boleh Kosong</i></p>
-->

<div class = "animated flash">
<?php echo $form->errorSummary($model); ?>
</div>

	<?php echo $form->textFieldRow($model,'userid',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'notif_date',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'notif_message',array('class'=>'span5','maxlength'=>250)); ?>

	<?php echo $form->textFieldRow($model,'notif_tittle',array('class'=>'span5','maxlength'=>250)); ?>

	<?php echo $form->textFieldRow($model,'notif_status',array('class'=>'span5','maxlength'=>0)); ?>

	<?php echo $form->textFieldRow($model,'grade',array('class'=>'span5','maxlength'=>250)); ?>

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>

</div>