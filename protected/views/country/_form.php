<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'country-form',
	'enableAjaxValidation'=>false,
	'clientOptions'=>array('validateOnSubmit'=>true),
	'enableClientValidation'=>true,
)); ?>

<div class="view">
<p class="help-block"><i><?php echo Yii::t('strings','Fields with') ?> <span class="required">*</span> <?php echo Yii::t('strings','are required') ?></i></p>

<div class = "animated flash">
<?php echo $form->errorSummary($model); ?>
</div>

<?php //echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'country_name',array('class'=>'span3','maxlength'=>150)); ?>

	<?php echo $form->textFieldRow($model,'code',array('class'=>'span3','maxlength'=>150)); ?>

	<?php //echo $form->textFieldRow($model,'id_language',array('class'=>'span5','maxlength'=>20)); ?>

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>Yii::t('strings','Save'),
		)); ?>
</div>
</div>
<?php $this->endWidget(); ?>
