<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'damage-report-repair-form',
	'type' => 'horizontal',
	'enableAjaxValidation'=>false,
	'clientOptions'=>array('validateOnSubmit'=>true),
	'enableClientValidation'=>true,
	'htmlOptions'=>array('enctype'=>'multipart/form-data')
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<script>   
    $(function() {
         $( ".calendar" ).datepicker({ dateFormat: 'yy-mm-dd' }); 
         $( ".calendar1" ).datepicker({ dateFormat: 'yy-mm-dd' });   
    }); 
</script>

<?php echo $form->errorSummary($model); ?>

	<?php 
	if($model->isNewRecord){
		// your code here hehe
		}else {
		echo $form->textFieldRow($model,'DamageReportNumber',array('class'=>'span4','maxlength'=>32,'readonly'=>'readonly')); 
	}
	?>

	<?php //echo $form->textFieldRow($model,'id_damage_report',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'id_request_for_schedule',array('class'=>'span5','maxlength'=>20)); ?>

	<?php //echo $form->textFieldRow($model,'id_vessel',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'StartRepair',array('class'=>'span5','class'=>'calendar',)); ?>

	<?php echo $form->textFieldRow($model,'EndRepair',array('class'=>'span5','class'=>'calendar1',)); ?>

	<?php //echo $form->textFieldRow($model,'DamageReportNumber',array('class'=>'span5','maxlength'=>250)); ?>

	<?php //echo $form->textFieldRow($model,'NoReport',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'NoMonth',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'NoYear',array('class'=>'span5')); ?>

	<?php echo $form->textAreaRow($model,'CausedDamage',array('rows'=>6, 'cols'=>50, 'class'=>'span5')); ?>

	<?php echo $form->textAreaRow($model,'Description',array('rows'=>6, 'cols'=>50, 'class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'RepairPhoto1',array('class'=>'span5','maxlength'=>250)); ?>
	<?php echo $form->fileFieldRow($model,'RepairPhoto1',array('style'=>'width:200px','maxlength'=>100)); ?>

	<?php //echo $form->textFieldRow($model,'RepairPhoto2',array('class'=>'span5','maxlength'=>250)); ?>
	<?php echo $form->fileFieldRow($model,'RepairPhoto2',array('style'=>'width:200px','maxlength'=>100)); ?>

	<?php //echo $form->textFieldRow($model,'RepairPhoto3',array('class'=>'span5','maxlength'=>250)); ?>
	<?php echo $form->fileFieldRow($model,'RepairPhoto3',array('style'=>'width:200px','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'PIC',array('class'=>'span5','maxlength'=>256)); ?>

	<?php //echo $form->textFieldRow($model,'Status',array('class'=>'span5','maxlength'=>0)); ?>

	<?php echo $form->textFieldRow($model,'Master',array('class'=>'span5','maxlength'=>256)); ?>

	<?php echo $form->textFieldRow($model,'ChiefEngineer',array('class'=>'span5','maxlength'=>256)); ?>

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Save' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>
