<div class="well">
<h4 class= "header"><img src="repository/icon/pending.png"> <?php echo Yii::t('strings','Reset Password') ?> <?php echo $model->userid ?></h4>
</div>

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'users-form',
	'enableAjaxValidation'=>false,
	'clientOptions'=>array('validateOnSubmit'=>true),
	'enableClientValidation'=>true,
)); ?>

<div class="view">
<p class="help-block"><i><?php echo Yii::t('strings','Fields with') ?> <span class="required">*</span> <?php echo Yii::t('strings','are required') ?></i></p>

<div class = "animated flash">
<?php //echo $form->errorSummary($model); ?>
</div>

	<?php echo $form->passwordFieldRow($model,'password',array('class'=>'span5','maxlength'=>150)); ?>

	<?php echo $form->passwordFieldRow($model,'repeatpassword',array('class'=>'span5','maxlength'=>150)); ?>


<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'icon'=>'arrow-right white',
			'label'=>$model->isNewRecord ? Yii::t('strings','Next') : Yii::t('strings','Next'),
		)); ?>
</div>
</div>

<?php $this->endWidget(); ?>
