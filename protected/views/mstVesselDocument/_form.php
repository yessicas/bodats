<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'mst-vessel-document-form',
	'type' => 'horizontal',
	'enableAjaxValidation'=>false,
	'clientOptions'=>array('validateOnSubmit'=>true),
	'enableClientValidation'=>true,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

	<?php echo $form->dropDownListRow($model,'VesselType',array('TUG'=>'TUG','BARGE'=>'BARGE'),
	 array('prompt'=>Yii::t('strings','-- Select --'),'class'=>'span2'));?>

	<?php echo $form->textFieldRow($model,'VesselDocumentName',array('class'=>'span5','maxlength'=>32)); ?>

	<?php echo $form->textFieldRow($model,'VesselDocumentNameEng',array('class'=>'span5','maxlength'=>32)); ?>

	<?php echo $form->textFieldRow($model,'Dasar',array('class'=>'span5','maxlength'=>32)); ?>

	<?php //echo $form->textAreaRow($model,'Information',array('rows'=>4, 'cols'=>50, 'class'=>'span3')); ?>

	<?php //echo $form->textFieldRow($model,'Information',array('class'=>'span3','maxlength'=>250)); ?>

	<?php echo $form->dropDownListRow($model,'Status',array('1'=>'Used','0'=>'Unused'),
	 array('class'=>'span2'));?>

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Save' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>
