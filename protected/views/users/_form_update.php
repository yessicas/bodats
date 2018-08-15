<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'users-form',
	'type' => 'horizontal',
	'enableAjaxValidation'=>false,
	'clientOptions'=>array('validateOnSubmit'=>true),
	'enableClientValidation'=>true,
)); ?>


<p class="help-block"><i><?php echo Yii::t('strings','Fields with') ?> <span class="required">*</span> <?php echo Yii::t('strings','are required') ?></i></p>

<div class = "animated flash">
<?php echo $form->errorSummary($model); ?>
</div>

	<?php echo $form->textFieldRow($model,'userid',array('class'=>'span4','maxlength'=>45)); ?>

	<?php //echo $form->textFieldRow($model,'code_id',array('class'=>'span5','maxlength'=>14)); ?>

	<?php echo $form->textFieldRow($model,'full_name',array('class'=>'span4','maxlength'=>45)); ?>

	<?php //echo $form->textFieldRow($model,'full_name',array('class'=>'span3','maxlength'=>250)); ?>

	<?php echo $form->textFieldRow($model,'email',array('class'=>'span4','maxlength'=>250)); ?>

	<?php echo $form->dropDownListRow($model,'type',CHtml::listData(Authitem::model()->findAll(), 'name', 'description'),
    array('prompt'=>'--Pilih --','class'=>'span3'));?>


<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			//'icon'=>'ok white',
			'label'=>$model->isNewRecord ? Yii::t('strings','Save') : Yii::t('strings','Save'),
		)); ?>
</div>


<?php $this->endWidget(); ?>
