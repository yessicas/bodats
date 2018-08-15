<div class="view">
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'fuel-form',
	'type' => 'horizontal',
	'enableAjaxValidation'=>false,
	'clientOptions'=>array('validateOnSubmit'=>true),
	'enableClientValidation'=>true,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

	<?php //echo $form->textFieldRow($model,'fuel',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'fuel_price',array('class'=>'span3')); ?>

	<?php echo $form->textFieldRow($model,'SK',array('class'=>'span4')); ?>

	<?php //echo $form->textFieldRow($model,'id_currency',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'fuel_price_updated',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'fuel_price_updated_by',array('class'=>'span5','maxlength'=>64)); ?>

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Save' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>
</div>
