<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'fuel-consumption-daily-form',
	'type' => 'horizontal',
	'enableAjaxValidation'=>false,
	'clientOptions'=>array('validateOnSubmit'=>true),
	'enableClientValidation'=>true,
	'htmlOptions'=>array('enctype'=>'multipart/form-data')
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

	 <?php $vesel=$_GET['id_vessel']; ?>

	<div class="control-group ">
	<?php //echo $form->labelEx($model,'QuotationDate'); ?>
	<label class="control-label required" for="FuelConsumptionDaily_id_vessel"><?php echo $model::model()->getAttributeLabel('id_vessel'); ?> <span class="required">*</span></label> <!-- label -->
	<div class="controls">
		
	<?php echo Chtml::dropDownList('vessel',$vesel,CHtml::listData(Vessel::model()->findAll(),
    'id_vessel', 'VesselName'),
    array('prompt'=>Yii::t('strings','-- Select --'),'class'=>'span4','disabled'=>'disabled'));?>

    <?php echo $form->hiddenField($model,'id_vessel',array('class'=>'span3','value'=>$vesel)); ?>

    <?php echo $form->error($model,'id_vessel'); ?>

	</div>
	</div>

	<div class="control-group ">
	<?php //echo $form->labelEx($model,'QuotationDate'); ?>
	<label class="control-label required" for="FuelConsumptionDaily_log_date"><?php echo $model::model()->getAttributeLabel('log_date'); ?> <span class="required">*</span></label> <!-- label -->
	<div class="controls">
	<?php $this->widget( 'ext.EJuiTimePicker.EJuiTimePicker', array(
			'model' => $model, // Your model
			'language'=>'id',
			'attribute' => 'log_date', // Attribute for input
			'options' => array(
					'showOn'=>'focus',
					'dateFormat'=>'yy-mm-dd',
					),
			'htmlOptions' => array(
					'style'=>'width:150px;', // styles to be applied
					'size' => '10',    // textField maxlength
					//'onBlur' => 'javascript:cekDate()',
			),
			)); ?>
	<?php echo $form->error($model,'log_date'); ?> <!-- error message -->
	</div>
	</div>

	<?php //echo $form->textFieldRow($model,'log_date',array('class'=>'span3')); ?>

	<?php echo $form->textFieldRow($model,'last_fuel_remain',array('class'=>'span2','append' => 'liter','maxlength'=>6)); ?>

	<?php 
	//echo $form->dropDownlistRow($model,'status_remain',array("CONSUMPTION"=>"CONSUMPTION","BUNKERING"=>"BUNKERING"),
	//array('class'=>'span3','maxlength'=>0, 'readonly'=>'readonly')); 
	?>
	
	<?php 
	echo $form->hiddenField($model,'status_remain',array('class'=>'span3','maxlength'=>0)); 
	?>
	<?php echo $form->textFieldRow($model,'pic',array('class'=>'span4')); ?>
	
	<?php //echo $form->textFieldRow($model,'status_remain',array('class'=>'span3','maxlength'=>0)); ?>

	<?php //echo $form->textFieldRow($model,'last_longitude',array('class'=>'span5','maxlength'=>30)); ?>

	<?php //echo $form->textFieldRow($model,'last_latitude',array('class'=>'span5','maxlength'=>30)); ?>

	<div class="control-group ">

	<label class="control-label required" for="FuelConsumptionDaily_NearestJettyId"><?php echo $model::model()->getAttributeLabel('NearestJettyId'); ?> <span class="required">*</span></label> <!-- label -->
	
	<div class="controls">
	
	<?php echo $form->dropDownList($model,'NearestJettyId',CHtml::listData(Jetty::model()->findAll(), 'JettyId', 'JettyPosition'),
    array('class'=>'span3'));?>
    <?php echo $form->error($model,'NearestJettyId'); ?> <!-- error message -->
	
	for about  <font color="red"> * </font> <?php echo $form->textField($model,'NearestDistancePoint',array('style'=>'width:35px','append'=>'nm','maxlength'=>3)); ?>

	<?php echo $form->textField($model,'',array('style'=>'width:20px; margin-left:-9px;','value'=>'nm','disabled'=>'disabled')); ?>
	
	<?php echo $form->error($model,'NearestDistancePoint'); ?>
	
</div>
	</div>

	<?php echo $form->fileFieldRow($model,'file_attachment',array('style'=>'width:180px','maxlength'=>250)); ?> 

	<?php //echo $form->textFieldRow($model,'NearestJettyId',array('class'=>'span3')); ?>

	<?php //echo $form->textFieldRow($model,'NearestDistancePoint',array('class'=>'span2')); ?>


	<?php //echo $form->textFieldRow($model,'created_date',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'created_user',array('class'=>'span5','maxlength'=>45)); ?>

	<?php //echo $form->textFieldRow($model,'ip_user_updated',array('class'=>'span5','maxlength'=>50)); ?>

<div class="form-actions" style="margin-top:10px; padding:10px 60px;">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'SAVE' : 'SAVE',
		)); ?>
</div>

<?php $this->endWidget(); ?>
