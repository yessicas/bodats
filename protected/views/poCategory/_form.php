<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'po-category-form',
	'type' => 'horizontal',
	'enableAjaxValidation'=>false,
	'clientOptions'=>array('validateOnSubmit'=>true),
	'enableClientValidation'=>true,
)); ?>

<style>
.form-horizontal .control-label{
	float:left;
	width:180px !important;
	padding-top:5px;
	text-align:right; 
	margin-right:5px;}

</style>


<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'id_po_category',array('class'=>'span4')); ?>

	<?php echo $form->textFieldRow($model,'code',array('class'=>'span4','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'category',array('class'=>'span4','maxlength'=>0)); ?>

	<?php echo $form->textFieldRow($model,'category_name',array('class'=>'span4','maxlength'=>250)); ?>

	<?php echo $form->textFieldRow($model,'id_parent',array('class'=>'span4')); ?>

	<?php echo $form->textFieldRow($model,'is_end_node',array('class'=>'span4')); ?>

	<?php echo $form->textFieldRow($model,'level1',array('class'=>'span4')); ?>

	<?php echo $form->textFieldRow($model,'level2',array('class'=>'span4')); ?>

	<?php echo $form->textFieldRow($model,'level3',array('class'=>'span4')); ?>

	<?php echo $form->textFieldRow($model,'num_level',array('class'=>'span4')); ?>

	<?php echo $form->textFieldRow($model,'auth',array('class'=>'span4','maxlength'=>250)); ?>

	<?php echo $form->textFieldRow($model,'type_good_issue',array('class'=>'span4','maxlength'=>0)); ?>

	<?php echo $form->textFieldRow($model,'dedicated_to',array('class'=>'span4','maxlength'=>0)); ?>

	<?php echo $form->textFieldRow($model,'lead_time_from_approval',array('class'=>'span3')); ?>

	<?php echo $form->textFieldRow($model,'request_by',array('class'=>'span4','maxlength'=>50)); ?>

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Save' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>
