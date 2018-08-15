<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'data-perusahaan-form',
	'enableAjaxValidation'=>false,
	'clientOptions'=>array('validateOnSubmit'=>true),
	'enableClientValidation'=>true,
)); ?>

<div class="view">
<p class="help-block"><i><?php echo Yii::t('strings','Fields with') ?> <span class="required">*</span> <?php echo Yii::t('strings','are required') ?></i></p>

<div class = "animated flash">
<?php echo $form->errorSummary($model); ?>
</div>

	<?php echo $form->textFieldRow($model,'nama_perusahaan',array('class'=>'span3','maxlength'=>150)); ?>

	<?php echo $form->textAreaRow($model,'deskripsi',array('rows'=>6, 'cols'=>50, 'class'=>'span3')); ?>

	<?php echo $form->textFieldRow($model,'alamat',array('class'=>'span3','maxlength'=>250)); ?>

	<?php echo $form->dropDownListRow($model,'id_bidang_usaha',CHtml::listData(BidangUsaha::model()->findAll(), 'id_bidang_usaha', 'bidang_usaha'),
    array('prompt'=>'--Pilih --','class'=>'span3'));?>

    <?php //echo $form->textAreaRow($model,'bidang_usaha',array('rows'=>6, 'cols'=>50, 'class'=>'span3')); ?>


	<?php echo $form->textFieldRow($model,'izin_usaha',array('class'=>'span3','maxlength'=>250)); ?>
	
	
	<?php echo $form->dropDownListRow($model,'id_country',CHtml::listData(Country::model()->findAll(), 'id_country', 'country_name'),
    array('prompt'=>'--Pilih --','class'=>'span3'));?>

	<?php //echo $form->textFieldRow($model,'country',array('class'=>'span3','maxlength'=>50)); ?>

	<?php //echo $form->textFieldRow($model,'foto_logo',array('class'=>'span5','maxlength'=>150)); ?>

	<?php //echo $form->textFieldRow($model,'foto_profil',array('class'=>'span5','maxlength'=>150)); ?>

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? Yii::t('strings','Save') : Yii::t('strings','Save')
		)); ?>
</div>
</div>
<?php $this->endWidget(); ?>
