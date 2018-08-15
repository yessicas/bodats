<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'part-form',
	'type' => 'horizontal',
	'enableAjaxValidation'=>false,
	'clientOptions'=>array('validateOnSubmit'=>true),
	'enableClientValidation'=>true,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

	<?php /* echo $form->dropDownListRow($model,'id_vessel',CHtml::listData(Vessel::model()->findAll(), 'id_vessel', 'VesselName'),
    array('prompt'=>'--Select--','class'=>'span3'));?>

	<?php //echo $form->textFieldRow($model,'id_vessel',array('class'=>'span5')); ?>

	<?php echo $form->dropDownListRow($model,'id_part_structure',CHtml::listData(PartStructure::model()->findAll(array(
           'condition' => 'id_level = :id_level',
           'params' => array(
               ':id_level' => "4",
           ),
       )), 'id_part_structure','structure_name'),
    array('prompt'=>'--Select--','class'=>'span2')); */ ?>


	<?php /*echo $form->dropDownListRow($model,'id_part_structure',CHtml::listData(PartStructure::model()->findAll(), 'id_part_structure', 'structure_name'),
    array('prompt'=>'--Select--','class'=>'span3')); */ ?>

	<?php //echo $form->textFieldRow($model,'id_part_structure',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'PartNumber',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'PartName',array('class'=>'span5','maxlength'=>150)); ?>

	<?php echo $form->textAreaRow($model,'description',array('rows'=>4, 'cols'=>50, 'class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'LifeTime',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'UsageTime',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'MinStock',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'Quantity',array('class'=>'span5')); ?>

	<?php /* echo $form->dropDownListRow($model,'metric',CHtml::listData(MstMetric::model()->findAll(), 'metric', 'metric_name'),
    array('prompt'=>'--Select--','class'=>'span3'));?>

	<?php //echo $form->textFieldRow($model,'metric',array('class'=>'span5','maxlength'=>20)); ?>

	<div class="control-group ">

	<label class="control-label required" for="Part_ReplaceSchedule"><?php echo $model::model()->getAttributeLabel('ReplaceSchedule'); ?> <span class="required">*</span></label> <!-- label -->
	
	<div class="controls">

	<?php echo $form->textField($model,'ReplaceSchedule',array('style'=>'width:35px','append'=>'days','maxlength'=>3)); ?>
	<?php echo $form->textField($model,'',array('style'=>'width:23px; margin-left:-9px; font-size:9px;','value'=>'days','disabled'=>'disabled')); ?>

	<?php //echo $form->textFieldRow($model,'ReplaceSchedule',array('class'=>'span2')); ?>

</div>
</div>

	<label class="control-label required" for="Part_Last_Replacement_Date"><?php echo $model::model()->getAttributeLabel('LastReplacementDate'); ?> <span class="required">*</span></label> <!-- label -->

	<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
	'model'=>$model,
	//'language'=>Yii::app()->language='id',
	'attribute'=>'LastReplacementDate',
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
	<?php echo $form->error($model,'LastReplacementDate'); ?>

	<?php //echo $form->textFieldRow($model,'LastReplacementDate',array('class'=>'span5')); ?>

	<div class="control-group ">

	<label class="control-label required" for="Part_ReplaceLeadtime"><?php echo $model::model()->getAttributeLabel('ReplaceLeadtime'); ?> <span class="required">*</span></label> <!-- label -->
	
	<div class="controls">

	<?php echo $form->textField($model,'ReplaceLeadtime',array('style'=>'width:35px','append'=>'days','maxlength'=>3)); ?>
	<?php echo $form->textField($model,'',array('style'=>'width:23px; margin-left:-9px; font-size:9px;','value'=>'days','disabled'=>'disabled')); ?>

	<?php //echo $form->textFieldRow($model,'ReplaceSchedule',array('class'=>'span2')); ?>

</div>
</div>

	<?php //echo $form->textFieldRow($model,'ReplaceLeadtime',array('class'=>'span5')); */ ?>

	<div class="control-group ">

	<label class="control-label required" for="Part_StandardPriceUnit"><?php echo $model::model()->getAttributeLabel('StandardPriceUnit'); ?> <span class="required">*</span></label> <!-- label -->
	
	<div class="controls">

	<?php echo $form->textField($model,'StandardPriceUnit',array('style'=>'width:65px','append'=>'IDR','maxlength'=>7)); ?>
	<?php echo $form->dropDownlist($model,'id_currency',CHtml::listData(Currency::model()->findAll(), 'id_currency', 'currency'),
	array('style'=>'width:55px; font-size:10px;')); ?>

	<?php //echo $form->textFieldRow($model,'ReplaceSchedule',array('class'=>'span2')); ?>

</div>
</div>

	<?php //echo $form->textFieldRow($model,'StandardPriceUnit',array('class'=>'span5')); ?>

	<?php //echo $form->dropDownListRow($model,'id_currency',CHtml::listData(Currency::model()->findAll(), 'id_currency', 'currency'),
    //array('prompt'=>'--Select--','class'=>'span2'));?>

	<?php //echo $form->textFieldRow($model,'id_currency',array('class'=>'span5')); ?>

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Save' : 'Save',
		)); ?>
</div>



<?php $this->endWidget(); ?>
