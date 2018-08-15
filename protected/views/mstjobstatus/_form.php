<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'mst-job-status-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="help-block"><i><?php echo Yii::t('strings','Fields with') ?> <span class="required">*</span> <?php echo Yii::t('strings','are required') ?></i></p>

<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'id_mst_job_status',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'status',array('class'=>'span5','maxlength'=>250)); ?>

	<?php echo $form->textAreaRow($model,'keterangan',array('rows'=>6, 'cols'=>50, 'class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'is_active',array('class'=>'span5')); ?>

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>Yii::t('strings','Save'),
		)); ?>
</div>

<?php $this->endWidget(); ?>
