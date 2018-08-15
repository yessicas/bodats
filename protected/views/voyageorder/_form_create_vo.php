<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'voyage-order-form',
	'enableAjaxValidation'=>false,
	'type' => 'horizontal',
	'clientOptions'=>array('validateOnSubmit'=>true),
	'enableClientValidation'=>true,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>
	
	<?php 
	
		//$dataformatnumber=NumberingDocumentDBVO::getFormatNumber($model,'id_voyage_order','VONo','VOMonth','VOYear');
		//echo $form->textFieldRow($model,'VoyageOrderNumber',array('class'=>'span4','maxlength'=>32,'value'=>$dataformatnumber['NumberFormat'],'readonly'=>'readonly')); 
		//echo $form->hiddenField($model,'VONo',array('class'=>'span4','maxlength'=>32,'value'=>$dataformatnumber['NoOrder'],'readonly'=>'readonly')); 
		//echo $form->hiddenField($model,'VOMonth',array('class'=>'span4','maxlength'=>32,'value'=> NumberingDocumentDBVO::getMonthNow(),'readonly'=>'readonly')); 
		//echo $form->hiddenField($model,'VOYear',array('class'=>'span4','maxlength'=>32,'value'=> NumberingDocumentDBVO::getYearNow(),'readonly'=>'readonly')); 	
	?>
	<?php echo $form->textFieldRow($model,'VoyageNumber',array('class'=>'span4','maxlength'=>100, 'readonly'=>'readonly')); ?>

	<?php //echo $form->textFieldRow($model,'VoyageOrderNumber',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'VONo',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'VOMonth',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'VOYear',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'id_quotation',array('class'=>'span5','maxlength'=>20)); ?>

	<?php //echo $form->textFieldRow($model,'id_so',array('class'=>'span5','maxlength'=>20)); ?>

	<?php //echo $form->textFieldRow($model,'id_voyage_order_plan',array('class'=>'span5','maxlength'=>20)); ?>

	<?php //echo $form->textFieldRow($model,'status',array('class'=>'span5','maxlength'=>0)); ?>

	<div class="view">
	<h4 style="color:#BD362F;"> Route & Capacity </h4>

	<div class="control-group ">
	<label class="control-label required" ><?php echo 'Customer' ?> <span class="required">*</span></label> <!-- label -->
	<div class="controls">
	<?php echo Chtml::textField('id_quotation',$model->Quotation->Customer->CompanyName,array('class'=>'span4','readonly'=>'readonly')); ?>
	</div>
	</div>

	<div class="control-group ">
	<label class="control-label required" ><?php echo $model::model()->getAttributeLabel('Type Order'); ?> <span class="required">*</span></label> <!-- label -->
	<div class="controls">
	<?php echo Chtml::textField('bussiness_type_order',$model->BussinessTypeOrder->bussiness_type_order,array('class'=>'span4','readonly'=>'readonly')); ?>
	</div>
	</div>

	<div class="control-group ">
	<label class="control-label required" ><?php echo $model::model()->getAttributeLabel('Tug'); ?> <span class="required">*</span></label> <!-- label -->
	<div class="controls">
	<?php echo Chtml::textField('tug',$model->VesselTug->VesselName,array('class'=>'span4','readonly'=>'readonly')); ?>
	</div>
	</div>

	<div class="control-group ">
	<label class="control-label required" ><?php echo $model::model()->getAttributeLabel('Barge'); ?> <span class="required">*</span></label> <!-- label -->
	<div class="controls">
	<?php echo Chtml::textField('barge',$model->VesselBarge->VesselName,array('class'=>'span4','readonly'=>'readonly')); ?>
	</div>
	</div>

	<div class="control-group ">
	<label class="control-label required" ><?php echo $model::model()->getAttributeLabel('Port Of Loading'); ?> <span class="required">*</span></label> <!-- label -->
	<div class="controls">
	<?php echo Chtml::textField('Loading',$model->JettyOrigin->JettyName,array('class'=>'span4','readonly'=>'readonly')); ?>
	</div>
	</div>

	<div class="control-group ">
	<label class="control-label required" ><?php echo $model::model()->getAttributeLabel('Port Of Unloading'); ?> <span class="required">*</span></label> <!-- label -->
	<div class="controls">
	<?php echo Chtml::textField('Unloading',$model->JettyDestination->JettyName,array('class'=>'span4','readonly'=>'readonly')); ?>
	</div>
	</div>
	
	<div class="control-group ">
	<label class="control-label required" >Loading Date</label> <!-- label -->
	<div class="controls">
	<?php //echo Chtml::textField('StartDate',$model->StartDate,array('class'=>'span4','readonly'=>'readonly')); ?>
	<?php echo Chtml::textField('StartDate',$model->Quotation->LoadingDate,array('class'=>'span4','readonly'=>'readonly')); ?>
	</div>
	</div>

	<div class="control-group ">
	<label class="control-label required" ><?php echo $model::model()->getAttributeLabel('Capacity'); ?> <span class="required">*</span></label> <!-- label -->
	<div class="controls">
	<?php echo Chtml::textField('capacity',$model->Capacity,array('class'=>'span4','readonly'=>'readonly')); ?>
	</div>
	</div>

	<div class="control-group ">
	<label class="control-label required" ><?php echo $model::model()->getAttributeLabel('Price'); ?> <span class="required">*</span></label> <!-- label -->
	<div class="controls">
	<?php echo Chtml::textField('Price',$model->Price." ".$model->Currency->currency,array('class'=>'span4','readonly'=>'readonly')); ?>
	</div>
	</div>
	


	<?php 
	echo'<div class="alert in alert-block fade alert-danger">
	If you want to change rute or vessel detail must revised the quotation.
	</div>';
	?>

	</div>

	<div class="control-group ">
	<label class="control-label required" ><?php echo $model::model()->getAttributeLabel('StartDate'); ?> <span class="required">*</span></label> <!-- label -->
	<div class="controls">
	<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
	'model'=>$model,
	//'language'=>Yii::app()->language='id',
	'attribute'=>'StartDate',
	'options'=>array(
						'showAnim'=>'slideDown',
						'dateFormat'=>'yy-mm-dd',          
						'changeMonth'=>true,
						'changeYear'=>true,
						'showOn'=>'focus',
						'showButtonPanel' => true,
					),
	'htmlOptions'=>array(
	'style'=>'width:80px;',
	'value'=>$model->Quotation->QuotationDate),
	)); ?>	
	<?php echo $form->error($model,'StartDate'); ?> <!-- error message -->
	</div>
	</div>


	<div class="control-group ">
	<label class="control-label required" ><?php echo $model::model()->getAttributeLabel('EndDate'); ?> <span class="required">*</span></label> <!-- label -->
	<div class="controls">
	<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
	'model'=>$model,
	//'language'=>Yii::app()->language='id',
	'attribute'=>'EndDate',
	'options'=>array(
						'showAnim'=>'slideDown',
						'dateFormat'=>'yy-mm-dd',          
						'changeMonth'=>true,
						'changeYear'=>true,
						'showOn'=>'focus',
						'showButtonPanel' => true,
					),
	'htmlOptions'=>array(
	'style'=>'width:80px;',
	'value'=>$model->Quotation->QuotationDate),
	)); ?>	
	<?php echo $form->error($model,'EndDate'); ?> <!-- error message -->
	</div>
	</div>


	<?php //echo $form->textFieldRow($model,'bussiness_type_order',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'BargingVesselTug',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'BargingVesselBarge',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'BargeSize',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'Capacity',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'TugPower',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'BargingJettyIdStart',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'BargingJettyIdEnd',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'StartDate',array('class'=>'span2')); ?>

	<?php //echo $form->textFieldRow($model,'EndDate',array('class'=>'span2')); ?>

	<?php //echo $form->textFieldRow($model,'ActualStartDate',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'ActualEndDate',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'period_year',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'period_month',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'period_quartal',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'Price',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'id_currency',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'change_rate',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'fuel_price',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'created_date',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'created_user',array('class'=>'span5','maxlength'=>45)); ?>

	<?php //echo $form->textFieldRow($model,'ip_user_updated',array('class'=>'span5','maxlength'=>50)); ?>

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create VO & Plot To Schedule' : 'Create VO & Plot To Schedule',
		)); ?>
</div>

<?php $this->endWidget(); ?>
