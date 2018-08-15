<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'account-gl-posting-form',
	'type' => 'horizontal',
	'enableAjaxValidation'=>false,
	'clientOptions'=>array('validateOnSubmit'=>true),
	'enableClientValidation'=>true,
)); ?>

<script>   
    $(function() {
         $( ".calendar" ).datepicker({ dateFormat: 'yy-mm-dd' }); 
         $( ".calendar1" ).datepicker({ dateFormat: 'yy-mm-dd' });   
    }); 
</script>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

	<?php echo $form->dropDownListRow($model,'id_account_gl',CHtml::listData(AccountGl::model()->findAll(), 'id_account_gl', 'gl_name'),
    array('prompt'=>'--Select--', 'class'=>'span2'));?>

	<?php //echo $form->textFieldRow($model,'id_account_gl',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'pair_number',array('class'=>'span5')); ?>

	<label class="control-label required" for="AccountGlPosting_posting_date"><?php echo $model::model()->getAttributeLabel('posting_date'); ?> <span class="required">*</span></label> <!-- label -->

	<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
	'model'=>$model,
	//'language'=>Yii::app()->language='id',
	'attribute'=>'posting_date',
	'options'=>array(
						'showAnim'=>'slideDown',
						'dateFormat'=>'yy-mm-dd',          
						'changeMonth'=>true,
						'changeYear'=>true,
						'showOn'=>'focus',
						'showButtonPanel' => true,
					),
	'htmlOptions'=>array(
	'style'=>'width:100px;'),
	)); ?>	
	<?php echo $form->error($model,'posting_date'); ?>

	<?php //echo $form->textFieldRow($model,'posting_date',array('class'=>'span5')); ?>

	<?php echo $form->textAreaRow($model,'description',array('rows'=>4, 'cols'=>50, 'class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'description',array('class'=>'span5','maxlength'=>250)); ?>

	<?php echo $form->textFieldRow($model,'amount',array('class'=>'span5')); ?>

	<?php echo $form->dropDownListRow($model,'id_currency',CHtml::listData(Currency::model()->findAll(), 'id_currency', 'currency_type'),
    array('prompt'=>'--Select--','class'=>'span2'));?>

	<?php //echo $form->textFieldRow($model,'id_currency',array('class'=>'span5')); ?>

	<?php echo $form->dropDownListRow($model,'drcr',array('Dr'=>'Dr','Cr'=>'Cr'),
	 array('prompt'=>Yii::t('strings','-- Select --'),'class'=>'span2'));?>


	<?php //echo $form->textFieldRow($model,'drcr',array('class'=>'span5','maxlength'=>0)); ?>

	<?php echo $form->textFieldRow($model,'ref',array('class'=>'span5')); ?>


<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Save' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>
