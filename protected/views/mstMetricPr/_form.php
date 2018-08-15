<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'mst-metric-pr-form',
	'type' => 'horizontal',
	'enableAjaxValidation'=>false,
	'clientOptions'=>array('validateOnSubmit'=>true),
	'enableClientValidation'=>true,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'metric',array('class'=>'span4','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'metric_name',array('class'=>'span4','maxlength'=>250)); ?>

	<?php echo $form->dropDownListRow($model,'id_po_category',CHtml::listData(PoCategory::model()->findAll(), 'id_po_category', 'category_name'),
    array('prompt'=>'--Select--','class'=>'span3'));?>

	<?php //echo $form->textFieldRow($model,'id_po_category',array('class'=>'span4')); ?>

	<?php echo $form->textAreaRow($model,'description',array('rows'=>6, 'cols'=>50, 'class'=>'span5')); ?>

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Save' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>
