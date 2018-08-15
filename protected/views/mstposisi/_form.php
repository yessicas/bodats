<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'mst-posisi-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="help-block"><i><?php echo Yii::t('strings','Fields with') ?> <span class="required">*</span> <?php echo Yii::t('strings','are required') ?></i></p>


<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'nama_posisi',array('class'=>'span3','maxlength'=>150)); ?>

	<?php //echo $form->textFieldRow($model,'userid',array('class'=>'span3','maxlength'=>45)); ?>

	<?php //echo $form->textFieldRow($model,'time_update',array('class'=>'span3')); ?>

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>Yii::t('strings','Save'),
		)); ?>
</div>

<?php $this->endWidget(); ?>
