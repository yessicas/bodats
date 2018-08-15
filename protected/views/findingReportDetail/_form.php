<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'finding-report-detail-form',
	'type' => 'horizontal',
	'enableAjaxValidation'=>false,
	'clientOptions'=>array('validateOnSubmit'=>true),
	'enableClientValidation'=>true,
	'htmlOptions'=>array('enctype'=>'multipart/form-data')
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

	<?php //echo $form->textFieldRow($model,'id_finding_report',array('class'=>'span2','maxlength'=>20)); ?>

	<?php //echo $form->textFieldRow($model,'TrInventoryTreeId',array('class'=>'span2')); ?>

	<?php //echo $form->dropDownListRow($model,'id_part',CHtml::listData(Part::model()->findAll(), 'id_part', 'PartName'),
    //array('prompt'=>Yii::t('strings','-- Select --'),'class'=>'span2'));?>

    <?php echo $form->textFieldRow($model,'Location',array('class'=>'span2','maxlength'=>32)); ?>

	<?php echo $form->textAreaRow($model,'ProblemIdentification',array('rows'=>3, 'cols'=>50, 'class'=>'span4')); ?>

	<?php echo $form->textFieldRow($model,'PIC',array('class'=>'span2','maxlength'=>32)); ?>

	<?php echo $form->textAreaRow($model,'CorrectiveAction',array('rows'=>3, 'cols'=>50, 'class'=>'span4')); ?>

	<div class="control-group ">
	<?php //echo $form->labelEx($model,'QuotationDate'); ?>
	<label class="control-label required" for="FindingReportDetail_DueDate"><?php echo $model::model()->getAttributeLabel('DueDate'); ?> <span class="required">*</span></label> <!-- label -->
	<div class="controls">
	<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
	'model'=>$model,
	//'language'=>Yii::app()->language='id',
	'attribute'=>'DueDate',
	'options'=>array(
						'showAnim'=>'slideDown',
						'dateFormat'=>'yy-mm-dd',          
						'changeMonth'=>true,
						'changeYear'=>true,
						'showOn'=>'focus',
						'showButtonPanel' => true,
					),
	'htmlOptions'=>array(
	'style'=>'width:80px;'),
	)); ?>	
	<?php echo $form->error($model,'DueDate'); ?> <!-- error message -->
	</div>
	</div>

	<?php //echo $form->textFieldRow($model,'DueDate',array('class'=>'span2')); ?>

	<?php //echo $form->textFieldRow($model,'Status',array('class'=>'span2','maxlength'=>32)); ?>

	<?php echo $form->textAreaRow($model,'PreventiveAction',array('rows'=>3, 'cols'=>50, 'class'=>'span4')); ?>

	<?php //echo $form->textFieldRow($model,'created_date',array('class'=>'span2')); ?>

	<?php echo $form->hiddenField($model,'created_user',array('class'=>'span3','maxlength'=>45,'value'=>Yii::app()->user->id)); ?>

	<?php //echo $form->textFieldRow($model,'ip_user_updated',array('class'=>'span2','maxlength'=>50)); ?>

	<?php echo $form->fileFieldRow($model,'ImageLink',array('style'=>'width:190px','margin-left:-75px','maxlength'=>250)); ?>

	<?php //echo $form->textAreaRow($model,'ImageLink',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Save' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>
