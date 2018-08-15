<style>
.form-horizontal .control-label {
    float: left;
    width: 150px;
    padding-top: 5px;
    text-align: right;
    margin-right: 5px;
}
</style>



<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'bussiness-type-order-form',
	'type' => 'horizontal',
	'enableAjaxValidation'=>false,
	'clientOptions'=>array('validateOnSubmit'=>true),
	'enableClientValidation'=>true,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'id_bussiness_type_order',array('class'=>'span3')); ?>

	<?php echo $form->textFieldRow($model,'bussiness_type_order',array('class'=>'span3','maxlength'=>100)); ?>

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Save' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>
