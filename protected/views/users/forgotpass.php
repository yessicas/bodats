<div class="well">
<h4 class= "header"><img src="repository/icon/pending.png"> <?php echo Yii::t('strings','Forgot Password') ?> <?php //echo $model->nama_menu_ind; ?></h4>
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

	

	<?php echo $form->textFieldRow($model,'email',array('class'=>'span5','maxlength'=>250)); ?>


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
