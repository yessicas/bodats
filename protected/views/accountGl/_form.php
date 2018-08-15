<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'account-gl-form',
	'type' => 'horizontal',
	'enableAjaxValidation'=>false,
	'clientOptions'=>array('validateOnSubmit'=>true),
	'enableClientValidation'=>true,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

	

	<?php echo $form->textFieldRow($model,'gl_number',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'gl_name',array('class'=>'span5','maxlength'=>250)); ?>

	<?php echo $form->dropDownListRow($model,'coa_level1',CHtml::listData(AccountCoa::model()->findAll(array(
           'condition' => 'level = :level',
           'params' => array(
               ':level' => "1",
           ),
       )), 'id_account_coa','account_name_id'),
    array('prompt'=>'--Select--','class'=>'span2'));?>

	<?php //echo $form->textFieldRow($model,'coa_level1',array('class'=>'span5')); ?>

	<?php echo $form->dropDownListRow($model,'coa_level2',CHtml::listData(AccountCoa::model()->findAll(array(
           'condition' => 'level = :level',
           'params' => array(
               ':level' => "2",
           ),
       )), 'id_account_coa','account_name_id'),
    array('prompt'=>'--Select--','class'=>'span2'));?>

	<?php //echo $form->textFieldRow($model,'coa_level2',array('class'=>'span5')); ?>

	<?php echo $form->dropDownListRow($model,'coa_level3',CHtml::listData(AccountCoa::model()->findAll(array(
           'condition' => 'level = :level',
           'params' => array(
               ':level' => "3",
           ),
       )), 'id_account_coa','account_name_id'),
    array('prompt'=>'--Select--','class'=>'span2'));?>

	<?php //echo $form->textFieldRow($model,'coa_level3',array('class'=>'span5')); ?>

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Save' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>
