


<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'customer-users-form',
	'type' => 'horizontal',
	'enableAjaxValidation'=>false,
	'clientOptions'=>array('validateOnSubmit'=>true),
	'enableClientValidation'=>true,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>



	<?php echo $form->textFieldRow($model,'userid',array('class'=>'span4','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'full_name',array('class'=>'span4','maxlength'=>45)); ?>

	<?php /*echo CHtml::dropDownList('CompanyName',' ', 
              CHtml::listData(Customer::model()->findAll(), 'id_customer', 'CompanyName'),
    array('prompt'=>'--Pilih --','class'=>'span4')); */ ?>

	<?php echo $form->dropDownListRow($model,'CompanyName',CHtml::listData(Customer::model()->findAll(), 'id_customer', 'CompanyName'),
    array('prompt'=>'--Pilih --','class'=>'span4'));?>

	<?php //echo $form->textFieldRow($model,'full_name',array('class'=>'span3','maxlength'=>250)); ?>

	<?php echo $form->textFieldRow($model,'email',array('class'=>'span4','maxlength'=>250)); ?>

	<div style="color:#3b73af">
		<?php echo Yii::t('strings','Please Use 8 - 32 characters Upper and lowercase letters and Number') ?>
	</div>
	<?php echo $form->passwordFieldRow($model,'password',array('class'=>'span4','maxlength'=>150)); ?>

	<?php echo $form->passwordFieldRow($model,'repeatpassword',array('class'=>'span4','maxlength'=>150)); ?>



	<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Save' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>