<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'good-receive-form',
	'enableAjaxValidation'=>false,
	'type' => 'horizontal',
	'clientOptions'=>array('validateOnSubmit'=>true),
	'enableClientValidation'=>true,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

<?php $orderdetail= $_GET['id'];?>

	<?php echo $form->hiddenfield($model,'id_purchase_order_detail',array('class'=>'span3','value'=>$orderdetail)); ?>

	<?php echo $form->textFieldRow($model,'receive_number',array('class'=>'span2','maxlength'=>3)); ?>	
	
	<div class="control-group ">
	<?php //echo $form->labelEx($model,'QuotationDate'); ?>
	<label class="control-label required" for="goodReceive_received_date"><?php echo $model::model()->getAttributeLabel('received_date'); ?> <span class="required">*</span></label> <!-- label -->
	<div class="controls">
	<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
	'model'=>$model,
	//'language'=>Yii::app()->language='id',
	'attribute'=>'received_date',
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
	
	<?php echo $form->error($model,'received_date'); ?> <!-- error message -->
	</div>
	</div>
	
	<?php echo $form->dropDownListRow($model,'id_vessel',CHtml::listData(Vessel::model()->findAll(), 'id_vessel', 'VesselName'),
    array('prompt'=>'--Select--', 'class'=>'span3'));?>

	<?php echo $form->textFieldRow($model,'receive_by',array('class'=>'span5','maxlength'=>250)); ?>

	<?php echo $form->textFieldRow($model,'quantity',array('class'=>'span2')); ?>

	<?php //echo $form->textFieldRow($model,'amount',array('class'=>'span3')); ?>

	<?php echo $form->dropDownListRow($model,'metric',CHtml::listData(MstMetricPr::model()->findAll(), 'metric', 'metric_name'),
    array('prompt'=>'--Select--', 'class'=>'span2', 'readonly'=>'readonly'));?>

	<?php //echo $form->textFieldRow($model,'metric',array('class'=>'span3','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'condition',array('class'=>'span5','maxlength'=>250)); ?>

	<?php //echo $form->textFieldRow($model,'notes',array('class'=>'span5','maxlength'=>250)); ?>

	<?php 
	//echo $form->dropDownListRow($model,'status_receive',array("PARTIAL"=>"PARTIAL","FINAL"=>"FINAL"),
    //array('prompt'=>'--Select--', 'class'=>'span3'));?>

    <?php /* echo $form->dropDownListRow($model,'dedicated_to',array("VESSEL"=>"VESSEL","VOYAGE"=>"VOYAGE","OTHERS"=>"OTHERS"),
    array('prompt'=>'--Select--', 'class'=>'span3')); */ ?>

	<?php //echo $form->textFieldRow($model,'status_receive',array('class'=>'span5','maxlength'=>0)); ?>



	<?php //echo $form->textFieldRow($model,'id_vessel',array('class'=>'span5','maxlength'=>0)); ?>

	<?php echo $form->textAreaRow($model,'notes',array('rows'=>4, 'cols'=>50, 'class'=>'span5')); ?>


<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Save' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>
